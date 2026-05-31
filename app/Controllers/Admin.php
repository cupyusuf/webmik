<?php

namespace App\Controllers;

use App\Models\MangaModel;
use App\Models\PostModel;
use App\Services\ContentService;
use Config\Database;
use Config\Services;

class Admin extends \App\Controllers\BaseController
{
    public function index()
    {
        $service = new ContentService();
        $data = $service->dashboard();
        $session = Services::session();

        $data['flash_success'] = $session->getFlashdata('flash_success');
        $data['flash_error'] = $session->getFlashdata('flash_error');

        return view('admin/dashboard', $data);
    }

    public function uploadCover()
    {
        $type = $this->request->getPost('content_type');
        $slug = trim((string) $this->request->getPost('slug'));
        $coverFile = $this->request->getFile('cover_file');

        if (! in_array($type, ['manga', 'posts'], true) || $slug === '' || ! $coverFile || ! $coverFile->isValid()) {
            return redirect()->back()->with('flash_error', 'Form upload belum lengkap atau file tidak valid.');
        }

        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/webp'];
        $mimeType = $coverFile->getMimeType();

        if (! in_array($mimeType, $allowedMimeTypes, true)) {
            return redirect()->back()->with('flash_error', 'Format cover harus JPG, PNG, atau WEBP.');
        }

        $publicPath = $this->storeCoverAsset($type, $slug, $coverFile);
        if ($publicPath === null) {
            return redirect()->back()->with('flash_error', 'Gagal menyimpan cover.');
        }

        $db = Database::connect();
        $db->table($type)->where('slug', $slug)->update(['cover' => $publicPath]);

        return redirect()->to(site_url('admin'))->with('flash_success', 'Cover berhasil diunggah dan data diperbarui.');
    }

    public function editManga(string $slug)
    {
        helper('form');

        $session = Services::session();
        $model = new MangaModel();
        $item = $model->where('slug', $slug)->first();

        if (! $item) {
            return redirect()->to(site_url('admin'))->with('flash_error', 'Manga tidak ditemukan.');
        }

        if ($this->request->getMethod() === 'post') {
            $title = trim((string) $this->request->getPost('title'));
            $newSlug = trim((string) $this->request->getPost('slug'));
            $synopsis = trim((string) $this->request->getPost('synopsis'));
            $author = trim((string) $this->request->getPost('author'));
            $status = trim((string) $this->request->getPost('status'));
            $coverFile = $this->request->getFile('cover_file');

            if ($title === '' || $newSlug === '' || $synopsis === '' || $author === '' || $status === '') {
                return redirect()->back()->withInput()->with('flash_error', 'Semua field manga wajib diisi.');
            }

            $updateData = [
                'title' => $title,
                'slug' => $newSlug,
                'synopsis' => $synopsis,
                'author' => $author,
                'status' => $status,
            ];

            if ($coverFile && $coverFile->isValid() && $coverFile->getSize() > 0) {
                $coverPath = $this->storeCoverAsset('manga', $newSlug, $coverFile);
                if ($coverPath === null) {
                    return redirect()->back()->withInput()->with('flash_error', 'Cover manga gagal disimpan.');
                }
                $updateData['cover'] = $coverPath;
            }

            $model->update($item['id'], $updateData);

            return redirect()->to(site_url('admin'))->with('flash_success', 'Manga berhasil diperbarui.');
        }

        return view('admin/manga_edit', [
            'item' => $item,
            'flash_success' => $session->getFlashdata('flash_success'),
            'flash_error' => $session->getFlashdata('flash_error'),
        ]);
    }

    public function editPost(string $slug)
    {
        helper('form');

        $session = Services::session();
        $model = new PostModel();
        $item = $model->where('slug', $slug)->first();

        if (! $item) {
            return redirect()->to(site_url('admin'))->with('flash_error', 'Post tidak ditemukan.');
        }

        if ($this->request->getMethod() === 'post') {
            $title = trim((string) $this->request->getPost('title'));
            $newSlug = trim((string) $this->request->getPost('slug'));
            $excerpt = trim((string) $this->request->getPost('excerpt'));
            $body = trim((string) $this->request->getPost('body'));
            $coverFile = $this->request->getFile('cover_file');

            if ($title === '' || $newSlug === '' || $excerpt === '' || $body === '') {
                return redirect()->back()->withInput()->with('flash_error', 'Semua field post wajib diisi.');
            }

            $updateData = [
                'title' => $title,
                'slug' => $newSlug,
                'excerpt' => $excerpt,
                'body' => $body,
            ];

            if ($coverFile && $coverFile->isValid() && $coverFile->getSize() > 0) {
                $coverPath = $this->storeCoverAsset('posts', $newSlug, $coverFile);
                if ($coverPath === null) {
                    return redirect()->back()->withInput()->with('flash_error', 'Cover post gagal disimpan.');
                }
                $updateData['cover'] = $coverPath;
            }

            $model->update($item['id'], $updateData);

            return redirect()->to(site_url('admin'))->with('flash_success', 'Post berhasil diperbarui.');
        }

        return view('admin/post_edit', [
            'item' => $item,
            'flash_success' => $session->getFlashdata('flash_success'),
            'flash_error' => $session->getFlashdata('flash_error'),
        ]);
    }

    private function resizeAndStoreCover(string $sourcePath, string $mimeType, string $targetBasePath): ?string
    {
        [$width, $height] = getimagesize($sourcePath) ?: [0, 0];
        if ($width <= 0 || $height <= 0) {
            return null;
        }

        $maxWidth = 900;
        $ratio = min(1, $maxWidth / $width);
        $newWidth = (int) round($width * $ratio);
        $newHeight = (int) round($height * $ratio);

        $sourceImage = match ($mimeType) {
            'image/jpeg' => imagecreatefromjpeg($sourcePath),
            'image/png' => imagecreatefrompng($sourcePath),
            'image/webp' => function_exists('imagecreatefromwebp') ? imagecreatefromwebp($sourcePath) : null,
            default => null,
        };

        if (! $sourceImage) {
            return null;
        }

        $canvas = imagecreatetruecolor($newWidth, $newHeight);
        if ($mimeType === 'image/png' || $mimeType === 'image/webp') {
            imagealphablending($canvas, false);
            imagesavealpha($canvas, true);
            $transparent = imagecolorallocatealpha($canvas, 0, 0, 0, 127);
            imagefilledrectangle($canvas, 0, 0, $newWidth, $newHeight, $transparent);
        }

        imagecopyresampled($canvas, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        $extension = $mimeType === 'image/jpeg' ? '.jpg' : ($mimeType === 'image/png' ? '.png' : '.webp');
        $finalPath = $targetBasePath . $extension;

        $saved = match ($mimeType) {
            'image/jpeg' => imagejpeg($canvas, $finalPath, 82),
            'image/png' => imagepng($canvas, $finalPath, 7),
            'image/webp' => function_exists('imagewebp') ? imagewebp($canvas, $finalPath, 82) : false,
            default => false,
        };

        imagedestroy($sourceImage);
        imagedestroy($canvas);

        return $saved ? $finalPath : null;
    }

    private function storeCoverAsset(string $type, string $slug, $coverFile): ?string
    {
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/webp'];
        $mimeType = $coverFile->getMimeType();

        if (! in_array($mimeType, $allowedMimeTypes, true)) {
            return null;
        }

        $uploadDir = FCPATH . 'assets' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'covers';
        if (! is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $safeSlug = preg_replace('/[^a-z0-9\-]+/i', '-', strtolower($slug));
        $fileName = $type . '-' . $safeSlug . '-' . time();
        $targetPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;

        $resultPath = $this->resizeAndStoreCover($coverFile->getTempName(), $mimeType, $targetPath);
        if ($resultPath === null) {
            return null;
        }

        return base_url('assets/images/covers/' . basename($resultPath));
    }
}
