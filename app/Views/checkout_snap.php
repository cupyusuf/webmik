<?= $this->include('partials/head') ?>

<div class="min-h-screen bg-base-200/80">
    <section class="max-w-7xl mx-auto px-4 sm:px-6 py-12 lg:py-16 space-y-8">
        <div class="grid gap-8 lg:grid-cols-[1.08fr_0.92fr] items-stretch">
            <div class="rounded-3xl bg-gradient-to-br from-slate-950 via-slate-900 to-slate-800 text-slate-100 shadow-2xl overflow-hidden border border-slate-700 relative">
                <div class="absolute inset-0 opacity-70 bg-[radial-gradient(circle_at_top_left,rgba(56,189,248,0.24),transparent_28%),radial-gradient(circle_at_bottom_right,rgba(250,204,21,0.18),transparent_32%)]"></div>
                <div class="relative z-10 p-6 md:p-10 h-full flex flex-col justify-between gap-8">
                    <div class="space-y-4 max-w-2xl">
                        <div class="inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1 text-xs font-semibold tracking-[0.2em] uppercase text-white/80">
                            Comic Pass Checkout
                        </div>
                        <h1 class="text-4xl md:text-5xl font-black tracking-tight leading-tight text-white">Pilih akses baca yang terasa lebih cocok untuk komik.</h1>
                        <p class="text-slate-300 text-lg max-w-xl">Checkout ini dibuat seperti etalase pass baca, bukan form pembayaran umum. Pilih paket, cek ringkasan, lalu lanjutkan ke Midtrans Snap.</p>
                    </div>

                    <div class="grid gap-3 sm:grid-cols-3">
                        <div class="rounded-2xl bg-white/10 border border-white/10 p-4 backdrop-blur">
                            <div class="text-xs uppercase tracking-wide text-slate-300">Speed</div>
                            <div class="mt-1 font-semibold text-white">Snap checkout</div>
                            <div class="text-sm text-slate-300 mt-1">Alur singkat dan langsung.</div>
                        </div>
                        <div class="rounded-2xl bg-white/10 border border-white/10 p-4 backdrop-blur">
                            <div class="text-xs uppercase tracking-wide text-slate-300">Theme</div>
                            <div class="mt-1 font-semibold text-white">Comic-first UI</div>
                            <div class="text-sm text-slate-300 mt-1">Lebih serasi dengan katalog.</div>
                        </div>
                        <div class="rounded-2xl bg-white/10 border border-white/10 p-4 backdrop-blur">
                            <div class="text-xs uppercase tracking-wide text-slate-300">Trust</div>
                            <div class="mt-1 font-semibold text-white">Midtrans ready</div>
                            <div class="text-sm text-slate-300 mt-1">Pembayaran tetap resmi.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rounded-3xl overflow-hidden border border-base-300 shadow-xl bg-base-100">
                <img src="<?= base_url('assets/images/illustrations/checkout-comic.svg') ?>" alt="Checkout comic illustration" class="w-full h-full object-cover">
            </div>
        </div>

        <div class="grid gap-8 xl:grid-cols-[1.15fr_0.85fr] items-start">
            <div class="space-y-4">
                <div class="flex items-center justify-between gap-3 flex-wrap">
                    <div>
                        <div class="inline-flex items-center gap-2 rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary mb-3">Pilih paket</div>
                        <h2 class="text-2xl md:text-3xl font-black tracking-tight">Pass yang paling pas untuk kebiasaan baca.</h2>
                    </div>
                    <div class="badge badge-outline">3 opsi</div>
                </div>

                <div class="grid gap-4 sm:grid-cols-3">
                    <button type="button" class="package-card rounded-3xl border border-base-300 bg-base-100 p-5 text-left shadow-sm hover:-translate-y-1 hover:shadow-xl transition-all" data-name="Volume 1 - Starter Pack" data-price="10000" data-quantity="1" data-id="comic-volume-1">
                        <div class="flex items-center justify-between gap-3">
                            <div class="text-xs uppercase tracking-wide text-base-content/50">Starter</div>
                            <span class="badge badge-primary badge-sm">Best entry</span>
                        </div>
                        <div class="mt-3 font-semibold text-xl">Volume 1</div>
                        <div class="text-sm text-base-content/60 mt-2 leading-relaxed">Satu volume untuk mulai membaca tanpa komitmen besar.</div>
                        <div class="mt-5 font-black text-2xl text-primary">Rp10.000</div>
                    </button>
                    <button type="button" class="package-card rounded-3xl border border-base-300 bg-base-100 p-5 text-left shadow-sm hover:-translate-y-1 hover:shadow-xl transition-all" data-name="Comic Pass 30 Hari" data-price="25000" data-quantity="1" data-id="comic-pass-30d">
                        <div class="flex items-center justify-between gap-3">
                            <div class="text-xs uppercase tracking-wide text-base-content/50">Popular</div>
                            <span class="badge badge-secondary badge-sm">Most chosen</span>
                        </div>
                        <div class="mt-3 font-semibold text-xl">Pass 30 Hari</div>
                        <div class="text-sm text-base-content/60 mt-2 leading-relaxed">Akses membaca selama sebulan untuk ritme yang lebih nyaman.</div>
                        <div class="mt-5 font-black text-2xl text-secondary">Rp25.000</div>
                    </button>
                    <button type="button" class="package-card rounded-3xl border border-base-300 bg-base-100 p-5 text-left shadow-sm hover:-translate-y-1 hover:shadow-xl transition-all" data-name="Support Creator" data-price="50000" data-quantity="1" data-id="support-creator">
                        <div class="flex items-center justify-between gap-3">
                            <div class="text-xs uppercase tracking-wide text-base-content/50">Support</div>
                            <span class="badge badge-accent badge-sm">Boost</span>
                        </div>
                        <div class="mt-3 font-semibold text-xl">Support Creator</div>
                        <div class="text-sm text-base-content/60 mt-2 leading-relaxed">Dukung pengembangan platform dan seri berikutnya.</div>
                        <div class="mt-5 font-black text-2xl text-accent">Rp50.000</div>
                    </button>
                </div>

                <div class="grid gap-4 sm:grid-cols-3">
                    <div class="rounded-2xl border border-base-300 bg-base-100 p-4">
                        <div class="text-xs uppercase tracking-wide text-base-content/50">Benefit</div>
                        <div class="font-semibold mt-1">Baca lebih fokus</div>
                        <p class="text-sm text-base-content/60 mt-1">Paket terasa seperti akses cerita, bukan barang umum.</p>
                    </div>
                    <div class="rounded-2xl border border-base-300 bg-base-100 p-4">
                        <div class="text-xs uppercase tracking-wide text-base-content/50">Delivery</div>
                        <div class="font-semibold mt-1">Digital access</div>
                        <p class="text-sm text-base-content/60 mt-1">Semua proses langsung ke checkout resmi Snap.</p>
                    </div>
                    <div class="rounded-2xl border border-base-300 bg-base-100 p-4">
                        <div class="text-xs uppercase tracking-wide text-base-content/50">Support</div>
                        <div class="font-semibold mt-1">Future-ready</div>
                        <p class="text-sm text-base-content/60 mt-1">Mudah diperluas kalau nanti ada membership lain.</p>
                    </div>
                </div>
            </div>

            <div class="card bg-base-100 shadow-xl border border-base-300 sticky top-6 overflow-hidden">
                <div class="card-body p-6 md:p-8 gap-6">
                    <div class="space-y-2">
                        <div class="badge badge-primary">Snap Checkout</div>
                        <h2 class="card-title text-2xl">Ringkasan pesanan</h2>
                        <p class="text-sm text-base-content/70">Data ini dipakai untuk memanggil Midtrans Snap secara langsung.</p>
                    </div>

                    <form id="order-form" class="space-y-4">
                        <input type="hidden" id="idk" value="comic-volume-1">
                        <div class="form-control">
                            <label class="label"><span class="label-text">Paket terpilih</span></label>
                            <input id="name" class="input input-bordered w-full bg-base-200/60" value="Volume 1 - Starter Pack" readonly>
                        </div>
                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="form-control">
                                <label class="label"><span class="label-text">Harga</span></label>
                                <input id="price" type="number" class="input input-bordered w-full bg-base-200/60" value="10000" readonly>
                            </div>
                            <div class="form-control">
                                <label class="label"><span class="label-text">Jumlah</span></label>
                                <input id="quantity" type="number" class="input input-bordered w-full bg-base-200/60" value="1" readonly>
                            </div>
                        </div>

                        <div class="rounded-3xl bg-gradient-to-br from-base-200 via-base-100 to-base-200 p-4 border border-base-300">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-base-content/60">Total</span>
                                <span class="font-black text-2xl" id="gross-preview">Rp10.000</span>
                            </div>
                            <p class="mt-2 text-xs text-base-content/50">Total ini akan dipakai sebagai gross amount untuk Snap.</p>
                        </div>

                        <input type="hidden" id="gross_amount" value="10000">

                        <button id="pay-button" class="btn btn-primary btn-lg w-full">Lanjutkan ke Pembayaran</button>
                    </form>

                    <form id="payment-form" method="post" action="<?= site_url('payment/vtdirect_cc_charge') ?>">
                        <input type="hidden" name="result_type" id="result-type">
                        <input type="hidden" name="result_data" id="result-data">
                    </form>

                    <div class="grid gap-3 sm:grid-cols-2 text-sm text-base-content/60">
                        <div class="rounded-2xl border border-base-300 bg-base-200/60 p-4">
                            <div class="font-semibold text-base-content">Akses komik</div>
                            <div class="mt-1">Checkout ini khusus untuk paket baca, bukan produk umum.</div>
                        </div>
                        <div class="rounded-2xl border border-base-300 bg-base-200/60 p-4">
                            <div class="font-semibold text-base-content">Payment flow</div>
                            <div class="mt-1">Setelah pilih paket, Snap akan terbuka seperti flow resmi.</div>
                        </div>
                    </div>
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