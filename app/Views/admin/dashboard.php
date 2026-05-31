<?= $this->include('partials/head') ?>

<?php
$total_users = $total_users ?? 0;
$total_posts = $total_posts ?? 0;
$total_manga = $total_manga ?? 0;
$recent_posts = $recent_posts ?? [];
$recent_manga = $recent_manga ?? [];
$all_posts = $all_posts ?? [];
$all_manga = $all_manga ?? [];

$catalog_total = max(1, (int) $total_users + (int) $total_posts + (int) $total_manga);
$users_pct = (int) round(((int) $total_users / $catalog_total) * 100);
$posts_pct = (int) round(((int) $total_posts / $catalog_total) * 100);
$manga_pct = (int) round(((int) $total_manga / $catalog_total) * 100);
$balance_score = max(0, 100 - abs($posts_pct - $manga_pct));
$freshness_score = min(100, (count($recent_posts) + count($recent_manga)) * 15);
$readiness_score = min(100, 35 + ((int) $total_users * 3) + ((int) $total_manga * 2));

$activity_feed = [];
foreach (array_slice($recent_posts, 0, 3) as $item) {
    $activity_feed[] = [
        'type' => 'Post',
        'title' => $item['title'] ?? 'Untitled post',
        'detail' => $item['excerpt'] ?? 'Editorial update',
        'tone' => 'secondary',
    ];
}

foreach (array_slice($recent_manga, 0, 3) as $item) {
    $activity_feed[] = [
        'type' => 'Manga',
        'title' => $item['title'] ?? 'Untitled manga',
        'detail' => $item['synopsis'] ?? 'Catalog update',
        'tone' => 'primary',
    ];
}
?>

<div class="min-h-screen bg-base-200/80 p-4 md:p-6">
    <div class="max-w-7xl mx-auto space-y-8">
        <section class="grid gap-6 lg:grid-cols-[1.1fr_0.9fr] items-stretch">
            <div class="rounded-3xl bg-gradient-to-br from-base-100 via-base-100 to-base-200 border border-base-300 shadow-xl overflow-hidden relative">
                <div class="absolute inset-0 pointer-events-none opacity-60 bg-[linear-gradient(135deg,rgba(37,99,235,0.06),transparent_35%,rgba(6,182,212,0.08))]"></div>
                <div class="p-6 md:p-8 flex flex-col gap-6 h-full justify-between relative z-10">
                    <div class="max-w-3xl space-y-4">
                        <div class="inline-flex items-center gap-2 rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">
                            <span class="h-2 w-2 rounded-full bg-primary animate-pulse"></span>
                            Control room active
                        </div>
                        <h1 class="text-3xl md:text-5xl font-black tracking-tight leading-tight">Comic Control Room</h1>
                        <p class="text-base-content/70 max-w-2xl text-lg">Panel ini mengawasi katalog, pembaruan konten, dan cover upload seperti ruang kontrol untuk seri komik yang aktif.</p>

                        <div class="grid gap-3 sm:grid-cols-3 pt-2">
                            <div class="rounded-2xl bg-base-100/80 border border-base-300 p-4 shadow-sm">
                                <div class="text-xs uppercase tracking-wide text-base-content/50">Live content</div>
                                <div class="mt-1 font-semibold">Manga & posts</div>
                            </div>
                            <div class="rounded-2xl bg-base-100/80 border border-base-300 p-4 shadow-sm">
                                <div class="text-xs uppercase tracking-wide text-base-content/50">Cover pipeline</div>
                                <div class="mt-1 font-semibold">Upload + preview</div>
                            </div>
                            <div class="rounded-2xl bg-base-100/80 border border-base-300 p-4 shadow-sm">
                                <div class="text-xs uppercase tracking-wide text-base-content/50">Reader tone</div>
                                <div class="mt-1 font-semibold">UI lebih serasi</div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-2">
                        <a href="<?= site_url('/') ?>" class="btn btn-ghost">View Site</a>
                        <a href="<?= site_url('auth/logout') ?>" class="btn btn-outline">Logout</a>
                    </div>
                </div>
            </div>

            <div class="rounded-3xl overflow-hidden border border-base-300 shadow-xl bg-base-100">
                <img src="<?= base_url('assets/images/illustrations/admin-comic.svg') ?>" alt="Admin comic illustration" class="w-full h-full object-cover">
            </div>
        </section>

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

        <div class="card bg-base-100 shadow-xl border border-base-300">
            <div class="card-body gap-6">
                <div class="flex flex-col gap-2 md:flex-row md:items-end md:justify-between">
                    <div>
                        <h2 class="card-title text-2xl">Upload Cover</h2>
                        <p class="text-sm text-base-content/70">Unggah JPG, PNG, atau WEBP untuk manga/post, lalu update record berdasarkan slug.</p>
                    </div>
                    <div class="text-xs text-base-content/50">Ukuran akan diperkecil otomatis agar ringan.</div>
                </div>

                <div class="grid gap-4 xl:grid-cols-[1.15fr_0.85fr] items-start">
                    <div class="grid gap-2 md:grid-cols-2">
                        <div class="rounded-2xl border border-base-300 bg-base-200/60 p-4">
                            <div class="text-xs uppercase tracking-wide text-base-content/50">Contoh manga slug</div>
                            <div class="mt-2 font-semibold">tales-of-the-blue-sea</div>
                        </div>
                        <div class="rounded-2xl border border-base-300 bg-base-200/60 p-4">
                            <div class="text-xs uppercase tracking-wide text-base-content/50">Contoh post slug</div>
                            <div class="mt-2 font-semibold">introducing-webmik-redesign</div>
                        </div>
                        <div class="rounded-2xl border border-base-300 bg-base-200/60 p-4">
                            <div class="text-xs uppercase tracking-wide text-base-content/50">Format file</div>
                            <div class="mt-2 font-semibold">JPG / PNG / WEBP</div>
                        </div>
                        <div class="rounded-2xl border border-base-300 bg-base-200/60 p-4">
                            <div class="text-xs uppercase tracking-wide text-base-content/50">Output</div>
                            <div class="mt-2 font-semibold">Resize + save ke assets</div>
                        </div>
                    </div>

                    <div class="rounded-3xl border border-base-300 bg-base-200/50 p-4 md:p-5">
                        <div class="flex items-center justify-between gap-3 mb-4">
                            <div>
                                <div class="text-xs uppercase tracking-wide text-base-content/50">Preview</div>
                                <div class="font-semibold">Cover yang dipilih</div>
                            </div>
                            <span class="badge badge-outline">Live</span>
                        </div>
                        <div class="rounded-2xl overflow-hidden border border-dashed border-base-300 bg-base-100 shadow-sm">
                            <img id="cover-preview" data-cover-preview-target src="<?= base_url('assets/images/placeholder-cover.svg') ?>" alt="Cover preview" class="w-full aspect-[4/5] object-cover">
                        </div>
                        <p class="mt-3 text-xs text-base-content/50">Preview akan berubah saat Anda memilih file cover dari komputer.</p>
                    </div>
                </div>

                <form action="<?= site_url('admin/covers/upload') ?>" method="post" enctype="multipart/form-data" class="grid gap-4 md:grid-cols-4" id="cover-upload-form">
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
                        <input type="file" name="cover_file" id="cover_file_input" class="file-input file-input-bordered w-full" accept="image/png,image/jpeg,image/webp" data-cover-preview-input data-cover-preview-target="#cover-preview" required>
                    </label>

                    <div class="md:col-span-4 flex justify-end">
                        <button type="submit" class="btn btn-primary">Upload Cover</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body">
                    <span class="text-sm uppercase tracking-wide text-base-content/50">Users</span>
                    <p class="text-4xl font-black leading-none"><?= (int) $total_users ?></p>
                    <div class="text-xs text-base-content/50">Registered accounts</div>
                    <progress class="progress progress-primary mt-4" value="<?= $users_pct ?>" max="100"></progress>
                    <div class="text-[11px] text-base-content/50 mt-1"><?= $users_pct ?>% of current content volume</div>
                </div>
            </div>
            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body">
                    <span class="text-sm uppercase tracking-wide text-base-content/50">Posts</span>
                    <p class="text-4xl font-black leading-none"><?= (int) $total_posts ?></p>
                    <div class="text-xs text-base-content/50">Editorial content</div>
                    <progress class="progress progress-secondary mt-4" value="<?= $posts_pct ?>" max="100"></progress>
                    <div class="text-[11px] text-base-content/50 mt-1"><?= $posts_pct ?>% of current content volume</div>
                </div>
            </div>
            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body">
                    <span class="text-sm uppercase tracking-wide text-base-content/50">Manga</span>
                    <p class="text-4xl font-black leading-none"><?= (int) $total_manga ?></p>
                    <div class="text-xs text-base-content/50">Public catalog</div>
                    <progress class="progress progress-accent mt-4" value="<?= $manga_pct ?>" max="100"></progress>
                    <div class="text-[11px] text-base-content/50 mt-1"><?= $manga_pct ?>% of current content volume</div>
                </div>
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-[0.95fr_1.05fr]">
            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body gap-5">
                    <div class="flex items-start justify-between gap-3 flex-wrap">
                        <div>
                            <h2 class="card-title text-2xl">System metrics</h2>
                            <p class="text-sm text-base-content/70">Gambaran cepat komposisi konten di control room.</p>
                        </div>
                        <span class="badge badge-outline">Live</span>
                    </div>

                    <div class="space-y-4">
                        <div class="space-y-2">
                            <div class="flex items-center justify-between text-sm">
                                <span class="font-medium">Manga catalog</span>
                                <span class="text-base-content/50"><?= $manga_pct ?>%</span>
                            </div>
                            <progress class="progress progress-primary w-full" value="<?= $manga_pct ?>" max="100"></progress>
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-center justify-between text-sm">
                                <span class="font-medium">Editorial posts</span>
                                <span class="text-base-content/50"><?= $posts_pct ?>%</span>
                            </div>
                            <progress class="progress progress-secondary w-full" value="<?= $posts_pct ?>" max="100"></progress>
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-center justify-between text-sm">
                                <span class="font-medium">Active users</span>
                                <span class="text-base-content/50"><?= $users_pct ?>%</span>
                            </div>
                            <progress class="progress progress-accent w-full" value="<?= $users_pct ?>" max="100"></progress>
                        </div>
                    </div>

                    <div class="rounded-3xl border border-base-300 bg-base-200/60 p-4">
                        <div class="text-xs uppercase tracking-wide text-base-content/50">Control room note</div>
                        <p class="mt-2 text-sm text-base-content/70">Gunakan upload cover untuk menjaga identitas visual setiap seri tetap seragam di halaman publik.</p>
                    </div>
                </div>
            </div>

            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body gap-5">
                    <div class="flex items-start justify-between gap-3 flex-wrap">
                        <div>
                            <h2 class="card-title text-2xl">Recent activity</h2>
                            <p class="text-sm text-base-content/70">Aktivitas terbaru di katalog dan editorial.</p>
                        </div>
                        <span class="badge badge-outline">Timeline</span>
                    </div>

                    <div class="space-y-4">
                        <?php if (! empty($activity_feed)): ?>
                            <?php foreach ($activity_feed as $index => $item): ?>
                                <div class="flex gap-4">
                                    <div class="flex flex-col items-center">
                                        <div class="h-3 w-3 rounded-full bg-<?= esc($item['tone']) ?> mt-2"></div>
                                        <?php if ($index < count($activity_feed) - 1): ?>
                                            <div class="w-px flex-1 bg-base-300 mt-1"></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="flex-1 rounded-2xl border border-base-300 bg-base-200/50 p-4">
                                        <div class="flex items-center justify-between gap-3 flex-wrap">
                                            <span class="badge badge-<?= esc($item['tone']) ?> badge-sm"><?= esc($item['type']) ?></span>
                                            <span class="text-[11px] uppercase tracking-wide text-base-content/40">Recent</span>
                                        </div>
                                        <div class="mt-2 font-semibold"><?= esc($item['title']) ?></div>
                                        <p class="text-sm text-base-content/70 mt-1 line-clamp-3"><?= esc($item['detail']) ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="rounded-3xl border border-dashed border-base-300 bg-base-200/50 p-6 text-sm text-base-content/60">Belum ada aktivitas terbaru.</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid gap-4 md:grid-cols-3">
            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body items-center text-center gap-4">
                    <div class="radial-progress text-primary" style="--value:<?= $balance_score ?>;" role="progressbar"><?= $balance_score ?>%</div>
                    <div>
                        <div class="font-semibold">Catalog balance</div>
                        <div class="text-sm text-base-content/60">Perbandingan manga dan posts tetap seimbang.</div>
                    </div>
                </div>
            </div>
            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body items-center text-center gap-4">
                    <div class="radial-progress text-secondary" style="--value:<?= $freshness_score ?>;" role="progressbar"><?= $freshness_score ?>%</div>
                    <div>
                        <div class="font-semibold">Freshness</div>
                        <div class="text-sm text-base-content/60">Update terbaru terlihat aktif di timeline.</div>
                    </div>
                </div>
            </div>
            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body items-center text-center gap-4">
                    <div class="radial-progress text-accent" style="--value:<?= $readiness_score ?>;" role="progressbar"><?= $readiness_score ?>%</div>
                    <div>
                        <div class="font-semibold">Readiness</div>
                        <div class="text-sm text-base-content/60">Siap untuk diisi konten dan cover baru.</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-2 gap-6">
            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body">
                    <h2 class="card-title">Recent Posts</h2>
                    <div class="space-y-3 mt-2">
                        <?php foreach ($recent_posts as $item): ?>
                            <div class="rounded-2xl border border-base-300 bg-base-200/50 p-4 transition-colors hover:bg-base-200">
                                <div class="flex items-center justify-between gap-3 flex-wrap">
                                    <div class="font-semibold"><?= esc($item['title'] ?? 'Untitled post') ?></div>
                                    <?php if (! empty($item['slug'])): ?>
                                        <a href="<?= site_url('admin/posts/edit/' . $item['slug']) ?>" class="btn btn-xs btn-outline">Edit</a>
                                    <?php endif; ?>
                                </div>
                                <div class="text-sm text-base-content/70 mt-1 line-clamp-3"><?= esc($item['excerpt'] ?? '') ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body">
                    <h2 class="card-title">Recent Manga</h2>
                    <div class="space-y-3 mt-2">
                        <?php foreach ($recent_manga as $item): ?>
                            <div class="rounded-2xl border border-base-300 bg-base-200/50 p-4 transition-colors hover:bg-base-200">
                                <div class="flex items-center justify-between gap-3 flex-wrap">
                                    <div class="font-semibold"><?= esc($item['title'] ?? 'Untitled manga') ?></div>
                                    <?php if (! empty($item['slug'])): ?>
                                        <a href="<?= site_url('admin/manga/edit/' . $item['slug']) ?>" class="btn btn-xs btn-outline">Edit</a>
                                    <?php endif; ?>
                                </div>
                                <div class="text-sm text-base-content/70 mt-1 line-clamp-3"><?= esc($item['synopsis'] ?? '') ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-2">
            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body gap-4">
                    <div class="flex items-start justify-between gap-3 flex-wrap">
                        <div>
                            <h2 class="card-title text-2xl">All Manga</h2>
                            <p class="text-sm text-base-content/70">Daftar lengkap manga yang tampil di situs publik.</p>
                        </div>
                        <span class="badge badge-primary">CRUD</span>
                    </div>

                    <div class="max-h-[28rem] overflow-auto pr-1 space-y-3">
                        <?php foreach ($all_manga as $item): ?>
                            <div class="rounded-2xl border border-base-300 bg-base-200/50 p-4 flex items-center justify-between gap-4">
                                <div class="min-w-0">
                                    <div class="font-semibold truncate"><?= esc($item['title'] ?? 'Untitled manga') ?></div>
                                    <div class="text-xs text-base-content/50 truncate"><?= esc($item['slug'] ?? '') ?></div>
                                </div>
                                <?php if (! empty($item['slug'])): ?>
                                    <a href="<?= site_url('admin/manga/edit/' . $item['slug']) ?>" class="btn btn-sm btn-outline">Edit</a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body gap-4">
                    <div class="flex items-start justify-between gap-3 flex-wrap">
                        <div>
                            <h2 class="card-title text-2xl">All Posts</h2>
                            <p class="text-sm text-base-content/70">Daftar lengkap editorial post yang bisa diedit dari sini.</p>
                        </div>
                        <span class="badge badge-secondary">CRUD</span>
                    </div>

                    <div class="max-h-[28rem] overflow-auto pr-1 space-y-3">
                        <?php foreach ($all_posts as $item): ?>
                            <div class="rounded-2xl border border-base-300 bg-base-200/50 p-4 flex items-center justify-between gap-4">
                                <div class="min-w-0">
                                    <div class="font-semibold truncate"><?= esc($item['title'] ?? 'Untitled post') ?></div>
                                    <div class="text-xs text-base-content/50 truncate"><?= esc($item['slug'] ?? '') ?></div>
                                </div>
                                <?php if (! empty($item['slug'])): ?>
                                    <a href="<?= site_url('admin/posts/edit/' . $item['slug']) ?>" class="btn btn-sm btn-outline">Edit</a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('partials/foot') ?>