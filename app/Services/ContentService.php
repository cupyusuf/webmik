<?php

namespace App\Services;

use App\Models\MangaModel;
use App\Models\PostModel;
use App\Models\UserModel;
use CodeIgniter\Model;

class ContentService
{
    public function dashboard(): array
    {
        return [
            'total_users' => $this->safeCount(new UserModel()),
            'total_posts' => $this->safeCount(new PostModel()),
            'total_manga' => $this->safeCount(new MangaModel()),
            'recent_posts' => $this->safeLatest(new PostModel(), 4),
            'recent_manga' => $this->safeLatest(new MangaModel(), 4),
        ];
    }

    public function landing(): array
    {
        return [
            'stats' => [
                'Bacaan cepat' => 'Komik, manga, dan artikel dalam satu alur yang rapi.',
                'Checkout siap' => 'Midtrans Snap, VTWeb, dan vtdirect sudah dipasang.',
                'Admin aman' => 'Login berbasis database dengan remember-me.',
            ],
            'featured_manga' => $this->safeLatest(new MangaModel(), 6, $this->sampleManga()),
            'featured_posts' => $this->safeLatest(new PostModel(), 3, $this->samplePosts()),
        ];
    }

    public function mangaPage(): array
    {
        return [
            'title' => 'Koleksi Manga',
            'subtitle' => 'Daftar manga yang dipilih untuk halaman publik utama.',
            'items' => $this->safeLatest(new MangaModel(), 12, $this->sampleManga()),
        ];
    }

    public function postsPage(): array
    {
        return [
            'title' => 'Artikel & Update',
            'subtitle' => 'Konten editorial, pengumuman, dan update terbaru.',
            'items' => $this->safeLatest(new PostModel(), 12, $this->samplePosts()),
        ];
    }

    private function safeCount(Model $model): int
    {
        try {
            return $model->countAllResults();
        } catch (\Throwable $e) {
            return 0;
        }
    }

    private function safeLatest(Model $model, int $limit, array $fallback = []): array
    {
        try {
            $rows = $model->orderBy('created_at', 'DESC')->findAll($limit);
            return $rows ?: $fallback;
        } catch (\Throwable $e) {
            return $fallback;
        }
    }

    private function sampleManga(): array
    {
        return [
            ['title' => 'Moonlit Archive', 'slug' => 'moonlit-archive', 'synopsis' => 'Ritme cerita tenang dengan visual besar dan atmosfer kuat.', 'author' => 'Studio Polaris', 'status' => 'Ongoing'],
            ['title' => 'Iron Bloom', 'slug' => 'iron-bloom', 'synopsis' => 'Aksi cepat dengan fokus pada karakter dan konflik kota.', 'author' => 'Vera Tan', 'status' => 'Featured'],
            ['title' => 'Sora Loop', 'slug' => 'sora-loop', 'synopsis' => 'Dunia futuristik yang bergerak di antara teknologi dan memori.', 'author' => 'Team Sora', 'status' => 'New'],
        ];
    }

    private function samplePosts(): array
    {
        return [
            ['title' => 'Mengapa WebMik pindah ke CI4', 'slug' => 'mengapa-webmik-pindah-ke-ci4', 'excerpt' => 'Struktur baru membuat auth, payment, dan konten lebih mudah dipelihara.'],
            ['title' => 'Midtrans Snap dan VTWeb dalam satu alur', 'slug' => 'midtrans-snap-vtweb', 'excerpt' => 'Checkout sekarang memakai konfigurasi yang terpusat di environment.'],
            ['title' => 'Tailwind + daisyUI untuk UI yang konsisten', 'slug' => 'tailwind-daisyui-ui', 'excerpt' => 'Komponen publik dan admin dirapikan tanpa bergantung pada AdminLTE.'],
        ];
    }
}
