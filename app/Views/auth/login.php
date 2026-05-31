<?= $this->include('partials/head') ?>

<div class="min-h-screen bg-base-200/90">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-12 lg:py-16">
        <div class="grid gap-8 lg:grid-cols-[1fr_1.08fr] items-stretch">
            <div class="rounded-3xl overflow-hidden border border-base-300 shadow-xl bg-gradient-to-br from-slate-950 via-slate-900 to-slate-800 text-slate-100 relative">
                <div class="absolute inset-0 opacity-70 bg-[radial-gradient(circle_at_top_left,rgba(34,211,238,0.22),transparent_30%),radial-gradient(circle_at_bottom_right,rgba(250,204,21,0.16),transparent_30%)]"></div>
                <div class="relative h-full p-6 md:p-8 flex flex-col justify-between gap-6">
                    <div class="space-y-4 max-w-md">
                        <div class="inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1 text-xs font-semibold tracking-wide uppercase text-white/80">
                            Admin gate
                        </div>
                        <img src="<?= base_url('assets/images/illustrations/login-comic.svg') ?>" alt="Login comic illustration" class="w-full max-h-[340px] object-contain drop-shadow-2xl">
                        <div>
                            <h1 class="text-3xl md:text-4xl font-black tracking-tight text-white">Masuk ke control room</h1>
                            <p class="mt-3 text-slate-300">Akses khusus untuk mengatur katalog, cover, dan ritme update tanpa mengganggu pengalaman pembaca.</p>
                        </div>
                    </div>

                    <div class="grid gap-3 sm:grid-cols-2 text-slate-900">
                        <div class="rounded-2xl bg-white/90 p-4 shadow-lg">
                            <div class="text-xs uppercase tracking-wide text-slate-500">Fast access</div>
                            <div class="font-semibold mt-1">Login cepat, tetap aman</div>
                        </div>
                        <div class="rounded-2xl bg-white/90 p-4 shadow-lg">
                            <div class="text-xs uppercase tracking-wide text-slate-500">Admin only</div>
                            <div class="font-semibold mt-1">Bukan halaman pembaca biasa</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body p-6 md:p-8 gap-6">
                    <div class="space-y-2">
                        <div class="inline-flex items-center rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">Returning reader</div>
                        <h2 class="card-title text-2xl md:text-3xl">Admin Login</h2>
                        <p class="text-sm text-base-content/70">Gunakan akun admin untuk mengelola katalog dan pembaruan konten.</p>
                    </div>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-error">
                            <div><?= esc(session()->getFlashdata('error')) ?></div>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success">
                            <div><?= esc(session()->getFlashdata('success')) ?></div>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="<?= site_url('auth/login') ?>" class="space-y-4">
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

                    <div class="grid gap-3 sm:grid-cols-2">
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