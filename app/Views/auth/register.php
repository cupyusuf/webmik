<?= $this->include('partials/head') ?>

<div class="min-h-screen bg-gradient-to-br from-base-200 via-base-100 to-base-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-12 lg:py-16">
        <div class="grid gap-8 lg:grid-cols-[0.9fr_1.02fr_0.98fr] items-stretch">
            <div class="rounded-3xl overflow-hidden border border-base-300 shadow-xl bg-base-100">
                <img src="<?= base_url('assets/images/illustrations/register-comic.svg') ?>" alt="Register comic illustration" class="w-full h-full object-cover">
            </div>

            <div class="rounded-3xl bg-base-100 shadow-xl border border-base-300 p-8 md:p-10 flex flex-col justify-between">
                <div>
                    <div class="space-y-3 mb-6">
                        <div class="inline-flex items-center rounded-full bg-secondary/10 px-3 py-1 text-xs font-semibold text-secondary">Reader Account</div>
                        <h1 class="text-3xl md:text-4xl font-black tracking-tight">Buat akun pembaca</h1>
                        <p class="text-base-content/70">Daftar untuk menyimpan akses dan menyiapkan pengalaman baca yang lebih rapi.</p>
                    </div>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-error mb-4">
                            <div><?= esc(session()->getFlashdata('error')) ?></div>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="<?= site_url('auth/register') ?>" class="space-y-4">
                        <?= csrf_field() ?>
                        <div class="form-control">
                            <label class="label"><span class="label-text">Nama</span></label>
                            <input type="text" name="name" class="input input-bordered w-full" placeholder="Nama pembaca" required>
                        </div>
                        <div class="form-control">
                            <label class="label"><span class="label-text">Email</span></label>
                            <input type="email" name="email" class="input input-bordered w-full" placeholder="nama@email.com" required>
                        </div>
                        <div class="grid gap-4 md:grid-cols-2">
                            <div class="form-control">
                                <label class="label"><span class="label-text">Password</span></label>
                                <input type="password" name="password" class="input input-bordered w-full" placeholder="Minimal 8 karakter" required>
                            </div>
                            <div class="form-control">
                                <label class="label"><span class="label-text">Konfirmasi Password</span></label>
                                <input type="password" name="password_confirm" class="input input-bordered w-full" placeholder="Ulangi password" required>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-3 pt-2">
                            <button type="submit" class="btn btn-primary flex-1">Daftar</button>
                            <a href="<?= site_url('auth/login') ?>" class="btn btn-ghost flex-1">Sudah punya akun</a>
                        </div>
                    </form>
                </div>

                <div class="mt-8 rounded-3xl bg-base-200/70 border border-base-300 p-5">
                    <div class="flex items-center gap-3">
                        <div class="avatar placeholder">
                            <div class="bg-secondary text-secondary-content rounded-full w-12">
                                <span class="text-sm font-bold">RD</span>
                            </div>
                        </div>
                        <div>
                            <div class="font-semibold">Alur pembaca yang lebih ringan</div>
                            <div class="text-sm text-base-content/60">Akun baru dipakai untuk pengalaman baca yang lebih terarah dan nyaman.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rounded-3xl bg-gradient-to-br from-base-100 via-base-200 to-base-300 border border-base-300 shadow-xl p-8 md:p-10 flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="flex flex-wrap gap-2">
                        <div class="badge badge-primary badge-lg">WebMik Reader</div>
                        <div class="badge badge-outline badge-lg">Illustrated onboarding</div>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-black tracking-tight">Lebih dekat ke katalog komik dan update terbaru.</h2>
                    <p class="text-base-content/70 text-lg max-w-xl">Akun pembaca ini dirancang agar alurnya tetap terasa ringan, konsisten, dan sesuai dengan tema membaca komik.</p>
                </div>

                <div class="grid gap-4 sm:grid-cols-2 mt-8">
                    <div class="rounded-2xl border border-base-300 bg-base-100/80 p-4">
                        <div class="font-semibold">Akses cepat</div>
                        <div class="text-sm text-base-content/60 mt-1">Login tetap sederhana dan bersih.</div>
                    </div>
                    <div class="rounded-2xl border border-base-300 bg-base-100/80 p-4">
                        <div class="font-semibold">Tema komik</div>
                        <div class="text-sm text-base-content/60 mt-1">Warna dan layout diselaraskan.</div>
                    </div>
                    <div class="rounded-2xl border border-base-300 bg-base-100/80 p-4">
                        <div class="font-semibold">Siap berkembang</div>
                        <div class="text-sm text-base-content/60 mt-1">Bisa dipakai untuk fitur berikutnya.</div>
                    </div>
                    <div class="rounded-2xl border border-base-300 bg-base-100/80 p-4">
                        <div class="font-semibold">Responsive</div>
                        <div class="text-sm text-base-content/60 mt-1">Nyaman di desktop dan mobile.</div>
                    </div>
                </div>

                <div class="mt-8 rounded-3xl bg-base-100/70 border border-base-300 p-5">
                    <div class="flex items-center gap-3">
                        <img src="<?= base_url('assets/images/logo.svg') ?>" alt="WebMik" class="h-10 w-10">
                        <div>
                            <div class="font-semibold">Reader-first experience</div>
                            <div class="text-sm text-base-content/60">Desain dibuat supaya terasa seperti portal baca komik, bukan form biasa.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('partials/foot') ?>