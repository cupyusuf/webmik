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

        <?php if (! empty($flash_success)): ?>
            <div class="alert alert-success shadow-md">
                <span><?= esc($flash_success) ?></span>
            </div>
        <?php endif; ?>

        <?php if (! empty($flash_error)): ?>
            <div class="alert alert-error shadow-md">
                <span><?= esc($flash_error) ?></span>
            </div>
        <?php endif; ?>

        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title">Upload Cover</h2>
                <p class="text-sm text-base-content/70">Unggah JPG, PNG, atau WEBP untuk manga/post, lalu update record berdasarkan slug.</p>

                <form action="<?= site_url('admin/covers/upload') ?>" method="post" enctype="multipart/form-data" class="grid gap-4 md:grid-cols-4 mt-4">
                    <?= csrf_field() ?>
                    <label class="form-control">
                        <span class="label-text">Content Type</span>
                        <select name="content_type" class="select select-bordered w-full" required>
                            <option value="manga">Manga</option>
                            <option value="posts">Posts</option>
                        </select>
                    </label>

                    <label class="form-control">
                        <span class="label-text">Slug</span>
                        <input type="text" name="slug" class="input input-bordered w-full" placeholder="tales-of-the-blue-sea" required>
                    </label>

                    <label class="form-control md:col-span-2">
                        <span class="label-text">Cover Image</span>
                        <input type="file" name="cover_file" class="file-input file-input-bordered w-full" accept="image/png,image/jpeg,image/webp" required>
                    </label>

                    <div class="md:col-span-4 flex justify-end">
                        <button type="submit" class="btn btn-primary">Upload Cover</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <span class="text-sm uppercase tracking-wide text-base-content/50">Users</span>
                    <p class="text-4xl font-black"><?= (int) $total_users ?></p>
                </div>
            </div>
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <span class="text-sm uppercase tracking-wide text-base-content/50">Posts</span>
                    <p class="text-4xl font-black"><?= (int) $total_posts ?></p>
                </div>
            </div>
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <span class="text-sm uppercase tracking-wide text-base-content/50">Manga</span>
                    <p class="text-4xl font-black"><?= (int) $total_manga ?></p>
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