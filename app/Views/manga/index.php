<?= $this->include('partials/head') ?>

<?php
$title = $title ?? 'Koleksi Manga';
$subtitle = $subtitle ?? '';
$items = $items ?? [];
$isAdmin = (bool) session()->get('is_admin');
?>

<div class="min-h-screen bg-base-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-12">
        <div class="flex items-end justify-between flex-wrap gap-4 mb-8">
            <div>
                <div
                    class="inline-flex items-center gap-2 rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary mb-3">
                    <span class="h-2 w-2 rounded-full bg-primary"></span>
                    Public Catalog
                </div>
                <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight"><?= esc($title) ?></h1>
                <p class="text-base-content/70 mt-2 text-lg md:text-base max-w-2xl"><?= esc($subtitle) ?></p>
                <?php if ($isAdmin): ?>
                    <div class="mt-3 inline-flex items-center gap-2 rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">
                        <span class="h-2 w-2 rounded-full bg-primary"></span>
                        Admin mode aktif
                    </div>
                <?php endif; ?>
            </div>
            <div class="flex gap-2">
                <a href="<?= site_url('/') ?>" class="btn btn-ghost">Home</a>
                <a href="<?= site_url('posts') ?>" class="btn btn-outline">Posts</a>
            </div>
        </div>

        <?php if (! empty($items)): ?>
            <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                <?php foreach ($items as $item): ?>
                    <article class="card bg-base-100 shadow hover:shadow-lg transition-shadow rounded-2xl overflow-hidden">
                        <?php $cover = $item['cover'] ?? null; ?>
                        <?php if ($cover): ?>
                            <figure><img src="<?= esc($cover) ?>" alt="<?= esc($item['title']) ?> cover"
                                    class="w-full h-44 object-cover" /></figure>
                        <?php else: ?>
                            <figure><img src="<?= base_url('assets/images/placeholder-cover.svg') ?>" alt="placeholder"
                                    class="w-full h-44 object-cover" /></figure>
                        <?php endif; ?>
                        <div class="card-body">
                            <div class="flex items-center justify-between gap-3 flex-wrap">
                                <div class="badge badge-secondary"><?= esc($item['status'] ?? 'Featured') ?></div>
                                <?php if ($isAdmin && ! empty($item['slug'])): ?>
                                    <a href="<?= site_url('admin/manga/edit/' . $item['slug']) ?>" class="btn btn-xs btn-outline">Edit</a>
                                <?php endif; ?>
                                <span
                                    class="text-xs uppercase tracking-wide text-base-content/40"><?= esc($item['author'] ?? '') ?></span>
                            </div>
                            <h2 class="card-title mt-2 text-lg font-semibold"><?= esc($item['title'] ?? '') ?></h2>
                            <p class="text-sm text-base-content/70 line-clamp-3"><?= esc($item['synopsis'] ?? '') ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="rounded-3xl border border-dashed border-base-300 bg-base-100 p-10 text-center text-base-content/60">
                Belum ada manga yang tersedia.
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->include('partials/foot') ?>