<?= $this->include('partials/head') ?>

<?php
$stats = $stats ?? [];
$featured_manga = $featured_manga ?? [];
$featured_posts = $featured_posts ?? [];
?>

<div class="min-h-screen bg-base-200">
    <section class="bg-gradient-to-br from-base-100 via-base-200 to-base-300 border-b border-base-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-14 md:py-16 grid gap-10 lg:grid-cols-[1.2fr_0.8fr] items-center">
            <div>
                <div class="inline-flex items-center gap-2 rounded-full bg-primary/10 px-4 py-2 text-xs font-semibold tracking-wide text-primary mb-5">
                    <span class="h-2 w-2 rounded-full bg-primary"></span>
                    WebMik Rebuilt
                </div>
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold leading-[1.05] tracking-tight">Baca manga, cek update, dan
                    bayar
                    dengan alur yang rapi.</h1>
                <p class="mt-5 text-base-content/70 max-w-2xl text-lg md:text-xl">Desain diperbarui menggunakan Tailwind
                    dan
                    daisyUI. Autentikasi tersimpan di database, dan alur pembayaran Midtrans sudah tersedia tanpa terasa berat.</p>

                <div class="mt-8 flex flex-wrap gap-3 items-center">
                    <a href="<?= site_url('manga') ?>" class="btn btn-primary btn-lg">Lihat Manga</a>
                    <a href="<?= site_url('posts') ?>" class="btn btn-outline btn-lg">Baca Artikel</a>
                    <a href="<?= site_url('checkout') ?>" class="btn btn-ghost btn-lg">Checkout Snap</a>
                </div>
            </div>

            <div class="grid gap-4">
                <?php foreach ($stats as $label => $text): ?>
                    <div class="card bg-base-100 shadow hover:shadow-lg transition-shadow rounded-3xl border border-base-300">
                        <div class="card-body py-5">
                            <div class="text-sm uppercase tracking-wide text-base-content/50"><?= esc($label) ?></div>
                            <div class="text-lg font-semibold"><?= esc($text) ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 py-12 grid gap-8 lg:grid-cols-2">
        <div class="card bg-base-100 shadow-xl border border-base-300">
            <div class="card-body">
                <div class="flex items-center justify-between gap-3 mb-4">
                    <div>
                        <h2 class="card-title text-2xl">Featured Manga</h2>
                        <p class="text-sm text-base-content/60">Pilihan judul yang paling menonjol saat ini.</p>
                    </div>
                    <a href="<?= site_url('manga') ?>" class="link link-primary">View all</a>
                </div>
                <?php if (! empty($featured_manga)): ?>
                    <div class="grid gap-4 md:grid-cols-2">
                        <?php foreach ($featured_manga as $item): ?>
                            <?php $cover = $item['cover'] ?? null; ?>
                            <div class="rounded-3xl border border-base-300 bg-base-200 p-4 hover:scale-[1.01] transition-transform shadow-sm">
                                <?php if ($cover): ?>
                                    <div class="w-full h-44 mb-3 overflow-hidden rounded-2xl"><img src="<?= esc($cover) ?>" alt="<?= esc($item['title']) ?>" class="w-full h-full object-cover" /></div>
                                <?php else: ?>
                                    <div class="w-full h-44 mb-3 overflow-hidden rounded-2xl"><img src="<?= base_url('assets/images/placeholder-cover.svg') ?>" alt="placeholder" class="w-full h-full object-cover" /></div>
                                <?php endif; ?>
                                <div class="badge badge-secondary badge-sm mb-3"><?= esc($item['status'] ?? 'Featured') ?></div>
                                <h3 class="font-semibold text-lg"><?= esc($item['title'] ?? '') ?></h3>
                                <p class="text-sm text-base-content/70 mt-2 line-clamp-3"><?= esc($item['synopsis'] ?? '') ?></p>
                                <div class="mt-4 text-xs uppercase tracking-wide text-base-content/50"><?= esc($item['author'] ?? '') ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="rounded-3xl border border-dashed border-base-300 bg-base-200/60 p-8 text-center text-base-content/60">Belum ada manga yang ditampilkan.</div>
                <?php endif; ?>
            </div>
        </div>

        <div class="card bg-base-100 shadow-xl border border-base-300">
            <div class="card-body">
                <div class="flex items-center justify-between gap-3 mb-4">
                    <div>
                        <h2 class="card-title text-2xl">Latest Posts</h2>
                        <p class="text-sm text-base-content/60">Update editorial terbaru dan catatan rilis.</p>
                    </div>
                    <a href="<?= site_url('posts') ?>" class="link link-primary">View all</a>
                </div>
                <?php if (! empty($featured_posts)): ?>
                    <div class="space-y-4">
                        <?php foreach ($featured_posts as $item): ?>
                            <article class="rounded-3xl border border-base-300 p-4 hover:shadow-lg transition-shadow bg-base-200/40">
                                <h3 class="font-semibold text-lg"><?= esc($item['title'] ?? '') ?></h3>
                                <p class="text-sm text-base-content/70 mt-2 line-clamp-3"><?= esc($item['excerpt'] ?? '') ?></p>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="rounded-3xl border border-dashed border-base-300 bg-base-200/60 p-8 text-center text-base-content/60">Belum ada artikel yang ditampilkan.</div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<?= $this->include('partials/foot') ?>