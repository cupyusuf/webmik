<?= $this->include('partials/head') ?>

<?php
$item = $item ?? [];
$cover = $item['cover'] ?? base_url('assets/images/placeholder-cover.svg');
?>

<div class="min-h-screen bg-base-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-12 lg:py-16 space-y-8">
        <div class="grid gap-6 lg:grid-cols-[0.92fr_1.08fr] items-stretch">
            <div class="rounded-3xl overflow-hidden border border-base-300 shadow-xl bg-gradient-to-br from-base-100 via-base-100 to-base-200">
                <div class="p-6 md:p-8 h-full flex flex-col justify-between gap-6">
                    <div class="space-y-4 max-w-xl">
                        <div class="inline-flex items-center gap-2 rounded-full bg-secondary/10 px-3 py-1 text-xs font-semibold text-secondary">
                            Editorial editor
                        </div>
                        <h1 class="text-3xl md:text-4xl font-black tracking-tight">Edit post</h1>
                        <p class="text-base-content/70">Rapikan headline, excerpt, dan body agar tetap serasi dengan gaya komik WebMik.</p>

                        <div class="grid gap-3 sm:grid-cols-2">
                            <div class="rounded-2xl border border-base-300 bg-base-100/80 p-4">
                                <div class="text-xs uppercase tracking-wide text-base-content/50">Slug</div>
                                <div class="mt-1 font-semibold break-all"><?= esc($item['slug'] ?? '') ?></div>
                            </div>
                            <div class="rounded-2xl border border-base-300 bg-base-100/80 p-4">
                                <div class="text-xs uppercase tracking-wide text-base-content/50">Preview tone</div>
                                <div class="mt-1 font-semibold">Editorial spotlight</div>
                            </div>
                        </div>
                    </div>

                    <a href="<?= site_url('admin') ?>" class="btn btn-ghost w-fit">Back to dashboard</a>
                </div>
            </div>

            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body gap-6">
                    <div class="flex items-start justify-between gap-3 flex-wrap">
                        <div>
                            <h2 class="card-title text-2xl">Form post</h2>
                            <p class="text-sm text-base-content/70">Preview cover mengikuti file yang Anda pilih.</p>
                        </div>
                        <span class="badge badge-outline">Live preview</span>
                    </div>

                    <?php if (session()->getFlashdata('flash_error')): ?>
                        <div class="alert alert-error">
                            <span><?= esc(session()->getFlashdata('flash_error')) ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('flash_success')): ?>
                        <div class="alert alert-success">
                            <span><?= esc(session()->getFlashdata('flash_success')) ?></span>
                        </div>
                    <?php endif; ?>

                    <form method="post" enctype="multipart/form-data" class="space-y-5">
                        <?= csrf_field() ?>

                        <div class="grid gap-4 md:grid-cols-2">
                            <label class="form-control">
                                <span class="label-text">Title</span>
                                <input type="text" name="title" class="input input-bordered w-full" value="<?= esc(old('title', $item['title'] ?? '')) ?>" required>
                            </label>

                            <label class="form-control">
                                <span class="label-text">Slug</span>
                                <input type="text" name="slug" class="input input-bordered w-full" value="<?= esc(old('slug', $item['slug'] ?? '')) ?>" required>
                            </label>
                        </div>

                        <label class="form-control">
                            <span class="label-text">Excerpt</span>
                            <textarea name="excerpt" rows="4" class="textarea textarea-bordered w-full" required><?= esc(old('excerpt', $item['excerpt'] ?? '')) ?></textarea>
                        </label>

                        <label class="form-control">
                            <span class="label-text">Body</span>
                            <textarea name="body" rows="8" class="textarea textarea-bordered w-full" required><?= esc(old('body', $item['body'] ?? '')) ?></textarea>
                        </label>

                        <div class="grid gap-4 lg:grid-cols-[1fr_0.9fr] items-start">
                            <label class="form-control">
                                <span class="label-text">Cover Image</span>
                                <input type="file" name="cover_file" class="file-input file-input-bordered w-full" accept="image/png,image/jpeg,image/webp" data-cover-preview-input data-cover-preview-target="#post-cover-preview">
                                <span class="label-text-alt text-base-content/50 mt-1">Opsional. Jika diisi, cover lama akan diganti.</span>
                            </label>

                            <div class="rounded-3xl overflow-hidden border border-dashed border-base-300 bg-base-200/60 p-3">
                                <img id="post-cover-preview" data-cover-preview-target src="<?= esc($cover) ?>" alt="Post cover preview" class="w-full aspect-[4/5] object-cover rounded-2xl">
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-3 pt-2">
                            <button type="submit" class="btn btn-primary">Save post</button>
                            <a href="<?= site_url('admin') ?>" class="btn btn-outline">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('partials/foot') ?>