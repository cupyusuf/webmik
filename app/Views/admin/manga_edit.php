<?= $this->include('partials/head') ?>

<?php
$item = $item ?? [];
$cover = $item['cover'] ?? base_url('assets/images/placeholder-cover.svg');
?>

<div class="min-h-screen bg-base-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-12 lg:py-16 space-y-8">
        <div class="grid gap-6 lg:grid-cols-[0.95fr_1.05fr] items-stretch">
            <div class="rounded-3xl overflow-hidden border border-base-300 shadow-xl bg-gradient-to-br from-base-100 via-base-100 to-base-200">
                <div class="p-6 md:p-8 h-full flex flex-col justify-between gap-6">
                    <div class="space-y-4 max-w-xl">
                        <div class="inline-flex items-center gap-2 rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">
                            Manga editor
                        </div>
                        <h1 class="text-3xl md:text-4xl font-black tracking-tight">Edit manga</h1>
                        <p class="text-base-content/70">Perbarui metadata, sinopsis, dan cover tanpa memutus bahasa visual katalog.</p>

                        <div class="grid gap-3 sm:grid-cols-3">
                            <div class="rounded-2xl border border-base-300 bg-base-100/80 p-4">
                                <div class="text-xs uppercase tracking-wide text-base-content/50">Current slug</div>
                                <div class="mt-1 font-semibold break-all"><?= esc($item['slug'] ?? '') ?></div>
                            </div>
                            <div class="rounded-2xl border border-base-300 bg-base-100/80 p-4">
                                <div class="text-xs uppercase tracking-wide text-base-content/50">Author</div>
                                <div class="mt-1 font-semibold"><?= esc($item['author'] ?? '') ?></div>
                            </div>
                            <div class="rounded-2xl border border-base-300 bg-base-100/80 p-4">
                                <div class="text-xs uppercase tracking-wide text-base-content/50">Status</div>
                                <div class="mt-1 font-semibold"><?= esc($item['status'] ?? '') ?></div>
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
                            <h2 class="card-title text-2xl">Form manga</h2>
                            <p class="text-sm text-base-content/70">Preview cover akan mengikuti file yang Anda pilih.</p>
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

                        <div class="grid gap-4 md:grid-cols-2">
                            <label class="form-control">
                                <span class="label-text">Author</span>
                                <input type="text" name="author" class="input input-bordered w-full" value="<?= esc(old('author', $item['author'] ?? '')) ?>" required>
                            </label>

                            <label class="form-control">
                                <span class="label-text">Status</span>
                                <select name="status" class="select select-bordered w-full" required>
                                    <?php $statusValue = old('status', $item['status'] ?? 'Ongoing'); ?>
                                    <?php foreach (['Ongoing', 'Featured', 'New', 'Completed'] as $statusOption): ?>
                                        <option value="<?= esc($statusOption) ?>" <?= $statusValue === $statusOption ? 'selected' : '' ?>><?= esc($statusOption) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </label>
                        </div>

                        <label class="form-control">
                            <span class="label-text">Synopsis</span>
                            <textarea name="synopsis" rows="6" class="textarea textarea-bordered w-full" required><?= esc(old('synopsis', $item['synopsis'] ?? '')) ?></textarea>
                        </label>

                        <div class="grid gap-4 lg:grid-cols-[1fr_0.9fr] items-start">
                            <label class="form-control">
                                <span class="label-text">Cover Image</span>
                                <input type="file" name="cover_file" class="file-input file-input-bordered w-full" accept="image/png,image/jpeg,image/webp" data-cover-preview-input data-cover-preview-target="#manga-cover-preview">
                                <span class="label-text-alt text-base-content/50 mt-1">Opsional. Jika diisi, cover lama akan diganti.</span>
                            </label>

                            <div class="rounded-3xl overflow-hidden border border-dashed border-base-300 bg-base-200/60 p-3">
                                <img id="manga-cover-preview" data-cover-preview-target src="<?= esc($cover) ?>" alt="Manga cover preview" class="w-full aspect-[4/5] object-cover rounded-2xl">
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-3 pt-2">
                            <button type="submit" class="btn btn-primary">Save manga</button>
                            <a href="<?= site_url('admin') ?>" class="btn btn-outline">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('partials/foot') ?>