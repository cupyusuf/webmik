<?= $this->include('partials/head') ?>

<div class="min-h-screen flex items-center justify-center bg-base-200">
    <div class="max-w-2xl w-full p-6">
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <h2 class="card-title">Checkout (Midtrans Snap)</h2>

                <form id="order-form">
                    <input type="hidden" id="idk" value="item-123">
                    <div class="form-control">
                        <label class="label"><span class="label-text">Item name</span></label>
                        <input id="name" class="input input-bordered" value="Sample Item">
                    </div>
                    <div class="form-control mt-2">
                        <label class="label"><span class="label-text">Price</span></label>
                        <input id="price" type="number" class="input input-bordered" value="10000">
                    </div>
                    <div class="form-control mt-2">
                        <label class="label"><span class="label-text">Quantity</span></label>
                        <input id="quantity" type="number" class="input input-bordered" value="1">
                    </div>

                    <input type="hidden" id="gross_amount" value="10000">

                    <div class="mt-4">
                        <button id="pay-button" class="btn btn-primary">Pay with Snap</button>
                    </div>
                </form>

                <form id="payment-form" method="post" action="<?= site_url('payment/vtdirect_cc_charge') ?>">
                    <input type="hidden" name="result_type" id="result-type">
                    <input type="hidden" name="result_data" id="result-data">
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->include('partials/foot') ?>