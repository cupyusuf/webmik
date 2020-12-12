<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container">
        <div id="carouselExampleSlidesOnly" class="carousel slide pt-3" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= base_url('assets/vendor/AdminLTE-3') ?>/dist/img/bego.png" class="d-block w-100">
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-3">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row d-flex align-items-stretch">
                        <?php foreach ($fmanga as $key => $value) { ?>
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                            <div class="card bg-light">
                                <a href="<?= base_url('welcome/vmanga/' . $value->id_article) ?>" class="card-body">
                                    <div class="row">
                                        <div class="col-7">
                                            <p class="text-md">
                                                <b>Judul :
                                                </b><?= $value->judul ?>
                                            </p>
                                            <p class="text-md">
                                                <b>Tipe :
                                                </b>
                                                <span class="badge bg-info"><?= $value->tipe ?></span>
                                            </p>
                                        </div>
                                        <div class="col-5 text-center">
                                            <img src="<?= base_url('assets/uploads/images/noimage.png') ?>" alt="Image"
                                                style="height: 80px">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ./wrapper -->