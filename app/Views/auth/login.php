<?= $this->include('partials/head') ?>

<div class="min-h-screen bg-base-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-12 lg:py-16">
        <div class="grid gap-8 lg:grid-cols-[0.95fr_1.05fr] items-stretch">
            <div class="rounded-3xl overflow-hidden border border-base-300 shadow-xl bg-base-100">
                <img src="<?= base_url('assets/images/illustrations/admin-comic.svg') ?>" alt="Admin comic illustration" class="w-full h-full object-cover">
            </div>

            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body p-6 md:p-8">
                    <div class="space-y-2 mb-4">
                        <h2 class="card-title text-2xl">Admin Login</h2>
                        <p class="text-sm text-base-content/70">Gunakan akun admin untuk mengelola katalog dan pembaruan konten.</p>
                    </div>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-error mt-2">
                            <div><?= esc(session()->getFlashdata('error')) ?></div>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success mt-2">
                            <div><?= esc(session()->getFlashdata('success')) ?></div>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="<?= site_url('auth/login') ?>" class="space-y-4 mt-4">
                        <?= csrf_field() ?>
                        <div class="form-control">
                            <label class="label"><span class="label-text">Email</span></label>
                            <input type="email" name="email" class="input input-bordered w-full" placeholder="admin@webmik.local" required>
                        </div>
                        <div class="form-control">
                            <label class="label"><span class="label-text">Password</span></label>
                            <input type="password" name="password" class="input input-bordered w-full" placeholder="••••••••" required>
                        </div>

                        <label class="label cursor-pointer justify-start gap-3">
                            <input type="checkbox" name="remember" class="checkbox checkbox-sm">
                            <span class="label-text">Remember me</span>
                        </label>

                        <div class="flex flex-col sm:flex-row gap-3 pt-2">
                            <button type="submit" class="btn btn-primary flex-1">Login</button>
                            <a href="<?= site_url('auth/register') ?>" class="btn btn-outline flex-1">Create account</a>
                        </div>

                        <div class="pt-2 text-sm text-base-content/60 flex items-center justify-between gap-3 flex-wrap">
                            <a href="<?= site_url('/') ?>" class="link link-hover">Back to home</a>
                            <span>Reader-first layout</span>
                        </div>
                    </form>

                    <div class="mt-6 grid gap-3 sm:grid-cols-2">
                        <div class="rounded-2xl border border-base-300 bg-base-200/60 p-4">
                            <div class="text-xs uppercase tracking-wide text-base-content/50">Secure access</div>
                            <div class="font-semibold mt-1">Controlled admin panel</div>
                        </div>
                        <div class="rounded-2xl border border-base-300 bg-base-200/60 p-4">
                            <div class="text-xs uppercase tracking-wide text-base-content/50">Reader tone</div>
                            <div class="font-semibold mt-1">Matches the comic theme</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('partials/foot') ?>