<?= $this->include('partials/head') ?>

<?php
$total_users = $total_users ?? 0;
$total_posts = $total_posts ?? 0;
$total_manga = $total_manga ?? 0;
$recent_posts = $recent_posts ?? [];
$recent_manga = $recent_manga ?? [];
?>

<div class="min-h-screen bg-base-200 p-6">
    <div class="max-w-7xl mx-auto space-y-8">
        <div class="flex items-center justify-between gap-4 flex-wrap">
            <div>
                <h1 class="text-3xl font-black">Admin Dashboard</h1>
                <p class="text-base-content/70 mt-1">Ringkasan cepat untuk konten dan pengguna.</p>
            </div>
            <div class="flex gap-2">
                <a href="<?= site_url('/') ?>" class="btn btn-ghost">View Site</a>
                <a href="<?= site_url('auth/logout') ?>" class="btn btn-outline">Logout</a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <span class="text-sm uppercase tracking-wide text-base-content/50">Users</span>
                    <p class="text-4xl font-black"><?= esc($total_users) ?></p>
                </div>
            </div>
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <span class="text-sm uppercase tracking-wide text-base-content/50">Posts</span>
                    <p class="text-4xl font-black"><?= esc($total_posts) ?></p>
                </div>
            </div>
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <span class="text-sm uppercase tracking-wide text-base-content/50">Manga</span>
                    <p class="text-4xl font-black"><?= esc($total_manga) ?></p>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-2 gap-6">
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Recent Posts</h2>
                    <div class="space-y-3 mt-2">
                        <?php foreach ($recent_posts as $item): ?>
                            <div class="rounded-xl border border-base-300 p-3">
                                <div class="font-semibold"><?= esc($item['title'] ?? 'Untitled post') ?></div>
                                <div class="text-sm text-base-content/70 mt-1"><?= esc($item['excerpt'] ?? '') ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Recent Manga</h2>
                    <div class="space-y-3 mt-2">
                        <?php foreach ($recent_manga as $item): ?>
                            <div class="rounded-xl border border-base-300 p-3">
                                <div class="font-semibold"><?= esc($item['title'] ?? 'Untitled manga') ?></div>
                                <div class="text-sm text-base-content/70 mt-1"><?= esc($item['synopsis'] ?? '') ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('partials/foot') ?>