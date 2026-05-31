<?php

namespace App\Controllers;

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

        $uploadDir = FCPATH . 'assets' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'covers';
        if (! is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $safeSlug = preg_replace('/[^a-z0-9\-]+/i', '-', strtolower($slug));
        $fileName = $type . '-' . $safeSlug . '-' . time();
        $targetPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;

        $resultPath = $this->resizeAndStoreCover($coverFile->getTempName(), $mimeType, $targetPath);
        if ($resultPath === null) {
            return redirect()->back()->with('flash_error', 'Gagal menyimpan cover.');
        }

        $publicPath = base_url('assets/images/covers/' . basename($resultPath));
        $db = Database::connect();
        $db->table($type)->where('slug', $slug)->update(['cover' => $publicPath]);

        return redirect()->to(site_url('admin'))->with('flash_success', 'Cover berhasil diunggah dan data diperbarui.');
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
}
