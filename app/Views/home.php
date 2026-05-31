<?= $this->include('partials/head') ?>

<?php
$stats = $stats ?? [];
$featured_manga = $featured_manga ?? [];
$featured_posts = $featured_posts ?? [];
?>

<div class="min-h-screen bg-base-200">
    <section class="bg-gradient-to-br from-base-100 via-base-200 to-base-300 border-b border-base-300">
        <div class="max-w-7xl mx-auto px-6 py-16 grid gap-10 lg:grid-cols-[1.2fr_0.8fr] items-center">
            <div>
                <div class="badge badge-primary badge-lg mb-4">WebMik Rebuilt</div>
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold leading-tight">Baca manga, cek update, dan
                    bayar
                    dengan alur yang rapi.</h1>
                <p class="mt-5 text-base-content/70 max-w-2xl text-lg md:text-xl">Desain diperbarui menggunakan Tailwind
                    dan
                    daisyUI. Autentikasi sekarang tersimpan di database, dan integrasi pembayaran Midtrans untuk Snap,
                    VTWeb, serta vtdirect telah tersedia.</p>

                <div class="mt-8 flex flex-wrap gap-3 items-center">
                    <a href="<?= site_url('manga') ?>" class="btn btn-primary btn-lg">Lihat Manga</a>
                    <a href="<?= site_url('posts') ?>" class="btn btn-outline btn-lg">Baca Artikel</a>
                    <a href="<?= site_url('checkout') ?>" class="btn btn-ghost btn-lg">Checkout Snap</a>
                </div>
            </div>

            <div class="grid gap-4">
                <?php foreach ($stats as $label => $text): ?>
                    <div class="card bg-base-100 shadow hover:shadow-lg transition-shadow rounded-2xl">
                        <div class="card-body py-5">
                            <div class="text-sm uppercase tracking-wide text-base-content/50"><?= esc($label) ?></div>
                            <div class="text-lg font-semibold"><?= esc($text) ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 py-12 grid gap-8 lg:grid-cols-2">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="card-title">Featured Manga</h2>
                    <a href="<?= site_url('manga') ?>" class="link link-primary">View all</a>
                </div>
                <div class="grid gap-4 md:grid-cols-2">
                    <?php foreach ($featured_manga as $item): ?>
                        <?php $cover = $item['cover'] ?? null; ?>
                        <div class="rounded-2xl border border-base-300 bg-base-200 p-4 hover:scale-[1.01] transition-transform">
                            <?php if ($cover): ?>
                                <div class="w-full h-40 mb-3 overflow-hidden rounded-lg"><img src="<?= esc($cover) ?>" alt="<?= esc($item['title']) ?>" class="w-full h-full object-cover" /></div>
                            <?php else: ?>
                                <div class="w-full h-40 mb-3 overflow-hidden rounded-lg"><img src="<?= base_url('assets/images/placeholder-cover.svg') ?>" alt="placeholder" class="w-full h-full object-cover" /></div>
                            <?php endif; ?>
                            <div class="badge badge-secondary badge-sm mb-3"><?= esc($item['status'] ?? 'Featured') ?></div>
                            <h3 class="font-semibold text-lg"><?= esc($item['title'] ?? '') ?></h3>
                            <p class="text-sm text-base-content/70 mt-2 line-clamp-3"><?= esc($item['synopsis'] ?? '') ?></p>
                            <div class="mt-4 text-xs uppercase tracking-wide text-base-content/50"><?= esc($item['author'] ?? '') ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="card-title">Latest Posts</h2>
                    <a href="<?= site_url('posts') ?>" class="link link-primary">View all</a>
                </div>
                <div class="space-y-4">
                    <?php foreach ($featured_posts as $item): ?>
                        <article class="rounded-2xl border border-base-300 p-4 hover:shadow-lg transition-shadow">
                            <h3 class="font-semibold text-lg"><?= esc($item['title'] ?? '') ?></h3>
                            <p class="text-sm text-base-content/70 mt-2 line-clamp-3"><?= esc($item['excerpt'] ?? '') ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->include('partials/foot') ?>