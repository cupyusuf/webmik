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
                        <?php foreach ($manga as $key => $value) { ?>
                        <a href="<?= base_url('welcome/bacamanga/' . $value->id_manga) ?>"
                            class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-7">
                                            <p class="text-md">
                                                <b>Judul :
                                                </b><?= $value->name_manga ?>
                                            </p>
                                            <p class="text-md">
                                                <b>Genre :
                                                </b><?= $value->name_genre ?>
                                            </p>
                                            <p class="text-md">
                                                <b>Description :
                                                </b><?= strip_tags(substr($value->description, 0, 50)) ?>
                                            </p>
                                        </div>
                                        <div class="col-5 text-center">
                                            <img src="<?= base_url('assets/uploads/cover-manga/' .$value->sampul_manga) ?>"
                                                alt="<?= $value->name_manga ?>" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ./wrapper -->