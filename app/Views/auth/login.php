<?= $this->include('partials/head') ?>

<div class="min-h-screen flex items-center justify-center bg-base-200">
    <div class="w-full max-w-md p-6">
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <h2 class="card-title">Admin Login</h2>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-error mt-2">
                        <div><?= session()->getFlashdata('error') ?></div>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?= site_url('auth/login') ?>">
                    <div class="form-control">
                        <label class="label"><span class="label-text">Email</span></label>
                        <input type="email" name="email" class="input input-bordered" required>
                    </div>
                    <div class="form-control mt-2">
                        <label class="label"><span class="label-text">Password</span></label>
                        <input type="password" name="password" class="input input-bordered" required>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <label class="ml-4 inline-flex items-center">
                            <input type="checkbox" name="remember" class="checkbox checkbox-sm mr-2">Remember me
                        </label>
                        <a href="/" class="btn btn-ghost ml-2">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->include('partials/foot') ?>