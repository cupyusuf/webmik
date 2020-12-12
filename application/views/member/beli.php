<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Beli Paket</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Beli Paket</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box" id="pay-button">
                    <span class="info-box-icon bg-info elevation-1"><i class="fab fa-wolf-pack-battalion"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Hemat</span>
                        <span class="info-box-number">
                            Rp. 10.000
                            <small>/ 1 hari</small>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-secondary elevation-1"><i
                            class="fab fa-wolf-pack-battalion"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Silver</span>
                        <span class="info-box-number">Rp. 20.000
                            <small>/ 3 hari</small>
                        </span>
                    </div>
                </div>
            </div>
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fab fa-wolf-pack-battalion"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Gold</span>
                        <span class="info-box-number">
                            Rp. 50.000
                            <small>/ 7 hari</small>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-dark elevation-1"><i class="fab fa-wolf-pack-battalion"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Platinum</span>
                        <span class="info-box-number">Rp. 90.000
                            <small>/ 15 hari</small>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="container-fluid">
        <form id="payment-form" method="post" action="<?=base_url('member/bayar')?>/snap/finish">
            <input type="hidden" name="result_type" id="result-type" value="">
            <input type="hidden" name="result_data" id="result-data" value="">
        </form>

        <form>
            <label hidden>item id :</label>
            <input type="text" id="id" name="id" value="a1" hidden>
            <label hidden>price :</label>
            <input type="text" id="price" name="price" value="10000" hidden>
            <label hidden>quantity :</label>
            <input type="text" id="quantity" name="quantity" value="1" hidden>
            <label hidden>Nama Paket :</label>
            <input type="text" id="name" name="name" value="Hemat" hidden>
            <label hidden>Total :</label>
            <input type="text" id="gross_amount" name="gross_amount" value="10000" hidden>
            <button id="pay-button" hidden>Bayar</button>
        </form>
    </div> -->


    <div class="container">
        <form id="payment-form" method="post" action="<?=base_url('member/')?>snap/finish">
            <input type="hidden" name="result_type" id="result-type" value="">
            <input type="hidden" name="result_data" id="result-data" value="">
        </form>
    </div>

    <form>
        <input hidden type="text" id="id" name="id" value="a1">
        <input hidden type="text" id="price" name="price" value="10000">
        <input hidden type="text" id="quantity" name="quantity" value="1">
        <input hidden type="text" id="name" name="name" value="Hemat">
        <input hidden type="text" id="gross_amount" name="gross_amount" value="10000">
    </form>
</section>