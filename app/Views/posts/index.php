<?= $this->include('partials/head') ?>

<?php
$title = $title ?? 'Artikel & Update';
$subtitle = $subtitle ?? '';
$items = $items ?? [];
?>

<div class="min-h-screen bg-base-200">
    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="flex items-end justify-between flex-wrap gap-4 mb-8">
            <div>
                <div class="badge badge-secondary mb-3">Editorial</div>
                <h1 class="text-3xl md:text-4xl font-extrabold"><?= esc($title) ?></h1>
                <p class="text-base-content/70 mt-2 text-lg md:text-base"><?= esc($subtitle) ?></p>
            </div>
            <div class="flex gap-2">
                <a href="<?= site_url('/') ?>" class="btn btn-ghost">Home</a>
                <a href="<?= site_url('manga') ?>" class="btn btn-outline">Manga</a>
            </div>
        </div>

        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
            <?php foreach ($items as $item): ?>
                <article class="card bg-base-100 shadow hover:shadow-lg transition-shadow rounded-2xl overflow-hidden">
                    <?php $cover = $item['cover'] ?? null; ?>
                    <?php if ($cover): ?>
                        <figure><img src="<?= esc($cover) ?>" alt="<?= esc($item['title']) ?>" class="w-full h-44 object-cover" /></figure>
                    <?php else: ?>
                        <figure><img src="<?= base_url('assets/images/placeholder-cover.svg') ?>" alt="placeholder" class="w-full h-44 object-cover" /></figure>
                    <?php endif; ?>
                    <div class="card-body">
                        <h2 class="card-title text-lg font-semibold"><?= esc($item['title'] ?? '') ?></h2>
                        <p class="text-sm text-base-content/70 line-clamp-3"><?= esc($item['excerpt'] ?? '') ?></p>
                        <div class="card-actions justify-end mt-2">
                            <a href="#" class="btn btn-link btn-sm px-0">Read more</a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->include('partials/foot') ?>