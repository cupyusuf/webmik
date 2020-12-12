<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Baca Manga</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Baca Manga</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="col-md-12">
    <div class="card">
        <div class="card-header" style="background-color: #ea97ad;">
            <h3 class="card-title">Judul Manga : <?= $manga->name_manga ?></h3>
        </div>
        <!-- Testing -->
        <div class="card-body">
            <div class="row">
                <?php foreach ($albums as $key => $value) { ?>
                <div class="col-12">
                    <div class="card bg-light">
                        <img src="<?= base_url('assets/uploads/albums/' . $value->image) ?>"
                            class="card-img-top img-fluid card-image" alt="<?= $value->info ?>">
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <!-- end testing -->
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>