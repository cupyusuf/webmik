<?= $this->include('partials/head') ?>

<div class="min-h-screen bg-base-200">
    <section class="max-w-7xl mx-auto px-4 sm:px-6 py-12 lg:py-16 grid gap-8 lg:grid-cols-[1.1fr_0.9fr] items-start">
        <div class="space-y-6">
            <div class="rounded-3xl bg-gradient-to-br from-primary via-primary to-secondary text-primary-content shadow-2xl p-8 md:p-10 relative overflow-hidden">
                <div class="absolute inset-0 opacity-20 bg-[radial-gradient(circle_at_top_right,_white_0,_transparent_35%),radial-gradient(circle_at_bottom_left,_white_0,_transparent_28%)]"></div>
                <div class="relative z-10 max-w-2xl space-y-4">
                    <div class="inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1 text-xs font-semibold tracking-wide">Comic Pass Checkout</div>
                    <h1 class="text-4xl md:text-5xl font-black leading-tight tracking-tight">Beli akses baca komik dengan tampilan yang lebih pas.</h1>
                    <p class="text-white/80 text-lg max-w-xl">Pilih paket volume atau pass membaca, lalu lanjutkan pembayaran lewat Midtrans Snap tanpa terasa seperti form pembayaran generik.</p>
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-3">
                <button type="button" class="package-card rounded-3xl border border-base-300 bg-base-100 p-5 text-left shadow-sm hover:shadow-lg transition-shadow" data-name="Volume 1 - Starter Pack" data-price="10000" data-quantity="1" data-id="comic-volume-1">
                    <div class="text-xs uppercase tracking-wide text-base-content/50">Starter</div>
                    <div class="mt-2 font-semibold text-lg">Volume 1</div>
                    <div class="text-sm text-base-content/60 mt-1">Satu volume untuk mulai membaca.</div>
                    <div class="mt-4 font-black text-primary">Rp10.000</div>
                </button>
                <button type="button" class="package-card rounded-3xl border border-base-300 bg-base-100 p-5 text-left shadow-sm hover:shadow-lg transition-shadow" data-name="Comic Pass 30 Hari" data-price="25000" data-quantity="1" data-id="comic-pass-30d">
                    <div class="text-xs uppercase tracking-wide text-base-content/50">Popular</div>
                    <div class="mt-2 font-semibold text-lg">Pass 30 Hari</div>
                    <div class="text-sm text-base-content/60 mt-1">Akses membaca selama sebulan.</div>
                    <div class="mt-4 font-black text-secondary">Rp25.000</div>
                </button>
                <button type="button" class="package-card rounded-3xl border border-base-300 bg-base-100 p-5 text-left shadow-sm hover:shadow-lg transition-shadow" data-name="Support Creator" data-price="50000" data-quantity="1" data-id="support-creator">
                    <div class="text-xs uppercase tracking-wide text-base-content/50">Support</div>
                    <div class="mt-2 font-semibold text-lg">Support Creator</div>
                    <div class="text-sm text-base-content/60 mt-1">Dukung pengembangan platform.</div>
                    <div class="mt-4 font-black text-accent">Rp50.000</div>
                </button>
            </div>
        </div>

        <div class="card bg-base-100 shadow-xl border border-base-300 sticky top-6">
            <div class="card-body p-6 md:p-8">
                <div class="space-y-2 mb-4">
                    <div class="badge badge-primary">Snap Checkout</div>
                    <h2 class="card-title text-2xl">Ringkasan pesanan</h2>
                    <p class="text-sm text-base-content/70">Data di bawah akan dipakai untuk memanggil Midtrans Snap.</p>
                </div>

                <form id="order-form" class="space-y-4">
                    <input type="hidden" id="idk" value="comic-volume-1">
                    <div class="form-control">
                        <label class="label"><span class="label-text">Paket terpilih</span></label>
                        <input id="name" class="input input-bordered w-full" value="Volume 1 - Starter Pack" readonly>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="form-control">
                            <label class="label"><span class="label-text">Harga</span></label>
                            <input id="price" type="number" class="input input-bordered w-full" value="10000" readonly>
                        </div>
                        <div class="form-control">
                            <label class="label"><span class="label-text">Jumlah</span></label>
                            <input id="quantity" type="number" class="input input-bordered w-full" value="1" readonly>
                        </div>
                    </div>

                    <div class="rounded-2xl bg-base-200/70 p-4 border border-base-300">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-base-content/60">Total</span>
                            <span class="font-black text-lg" id="gross-preview">Rp10.000</span>
                        </div>
                    </div>

                    <input type="hidden" id="gross_amount" value="10000">

                    <button id="pay-button" class="btn btn-primary btn-lg w-full">Lanjutkan ke Pembayaran</button>
                </form>

                <form id="payment-form" method="post" action="<?= site_url('payment/vtdirect_cc_charge') ?>">
                    <input type="hidden" name="result_type" id="result-type">
                    <input type="hidden" name="result_data" id="result-data">
                </form>

                <div class="mt-5 text-xs text-base-content/50">
                    Pembayaran ini ditujukan untuk akses komik, bukan checkout produk umum.
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.querySelectorAll('.package-card').forEach(function(card) {
        card.addEventListener('click', function() {
            var name = this.dataset.name;
            var price = parseInt(this.dataset.price, 10);
            var quantity = parseInt(this.dataset.quantity, 10);
            var id = this.dataset.id;

            document.getElementById('idk').value = id;
            document.getElementById('name').value = name;
            document.getElementById('price').value = price;
            document.getElementById('quantity').value = quantity;
            document.getElementById('gross_amount').value = price * quantity;
            document.getElementById('gross-preview').textContent = 'Rp' + (price * quantity).toLocaleString('id-ID');

            document.querySelectorAll('.package-card').forEach(function(item) {
                item.classList.remove('ring-2', 'ring-primary', 'border-primary');
            });

            this.classList.add('ring-2', 'ring-primary', 'border-primary');
        });
    });

    const firstPackage = document.querySelector('.package-card');
    if (firstPackage) {
        firstPackage.classList.add('ring-2', 'ring-primary', 'border-primary');
    }
</script>

<?= $this->include('partials/foot') ?>