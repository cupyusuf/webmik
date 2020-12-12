<!-- Content Wrapper. Contains page content -->
<!-- <div class="content-wrapper pt-3">
    <div class="container">
        <div class="row justify-content-center">
        <?php foreach ($manga as $key => $value) { ?>
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title"><b>Judul : </b><?= $value->judul ?></h2>
                        <p class="card-text"><?= $value->content ?></p>
                        <a class="btn btn-primary" href="<?= base_url('welcome/manga'); ?>">Kembali</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div> -->
<!-- ./wrapper -->
<div class="col-12 pt-3">
    <div class="card card-pink">
        <?php foreach ($manga as $key => $value) { ?>
        <div class="card-header">
            <h3 class="card-title">Judul Manga : <?= $value->judul ?></h3>
        </div>
        <!-- Testing -->
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="card bg-light">
                        <p class="card-text text-center"><?= $value->content ?></p>
                    </div>
                </div>
                <a class="btn btn-primary" href="<?= base_url('welcome/manga'); ?>">Kembali</a>
                <?php } ?>
            </div>
        </div>
        <!-- end testing -->
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>