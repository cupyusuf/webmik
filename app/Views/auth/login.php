<?= $this->include('partials/head') ?>

<div class="min-h-screen bg-base-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-12 lg:py-16">
        <div class="grid gap-8 lg:grid-cols-[1.1fr_0.9fr] items-stretch">
            <div class="rounded-3xl bg-gradient-to-br from-primary/90 via-primary to-secondary p-8 md:p-10 text-primary-content shadow-2xl overflow-hidden relative">
                <div class="absolute inset-0 opacity-20 bg-[radial-gradient(circle_at_top_right,_white_0,_transparent_35%),radial-gradient(circle_at_bottom_left,_white_0,_transparent_28%)]"></div>
                <div class="relative z-10 max-w-xl space-y-6">
                    <a href="<?= site_url('/') ?>" class="inline-flex items-center gap-3 rounded-full bg-white/10 px-4 py-2 backdrop-blur">
                        <img src="<?= base_url('assets/images/logo.svg') ?>" alt="WebMik" class="h-8 w-8" />
                        <span class="font-bold">WebMik Reader Hub</span>
                    </a>

                    <div class="space-y-3">
                        <div class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-semibold tracking-wide">Admin Login</div>
                        <h1 class="text-4xl md:text-5xl font-black leading-tight tracking-tight">Masuk ke panel untuk mengelola koleksi komik dan artikel.</h1>
                        <p class="text-white/80 text-lg max-w-lg">Tampilan dibuat lebih tenang dan rapi supaya terasa seperti bagian dari sebuah reader, bukan halaman admin yang kaku.</p>
                    </div>

                    <div class="grid gap-3 sm:grid-cols-3 text-sm">
                        <div class="rounded-2xl bg-white/10 p-4 backdrop-blur">
                            <div class="font-semibold">Admin Panel</div>
                            <div class="text-white/70 mt-1">Kontrol konten</div>
                        </div>
                        <div class="rounded-2xl bg-white/10 p-4 backdrop-blur">
                            <div class="font-semibold">Reader Flow</div>
                            <div class="text-white/70 mt-1">Lebih nyaman dibaca</div>
                        </div>
                        <div class="rounded-2xl bg-white/10 p-4 backdrop-blur">
                            <div class="font-semibold">Fast Access</div>
                            <div class="text-white/70 mt-1">Login ringan</div>
                        </div>
                    </div>
                </div>
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

                        <div class="pt-2 text-sm text-base-content/60 flex items-center justify-between gap-3">
                            <a href="<?= site_url('/') ?>" class="link link-hover">Back to home</a>
                            <span>Reader-first layout</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('partials/foot') ?>