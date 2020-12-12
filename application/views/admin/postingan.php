<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Postingan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Postingan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        Postingan
                    </h3>
                    <!-- tools box -->
                    <div class="card-tools">
                        <a href="<?= base_url('admin/tpostingan') ?>" type="button" class="btn btn-tool btn-sm">
                            <i class="fas fa-plus">Tambah</i></a>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    <table id="example1" class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Sampul</th>
                                <th>Judul</th>
                                <th>Volume</th>
                                <th>Penulis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="<?= base_url('/assets/uploads/manga') ?>/dragonball/cover/20959.jpg"
                                        alt="Sampul" width="150px"></td>
                                <td>Dragon Ball</td>
                                <td>Vol. 74</td>
                                <td>Akira Toriyama</td>
                                <th>
                                    <a href="<?= base_url('admin/epostingan') ?>" class="btn btn-warning bt-sm">Edit</a>
                                    <a href="#" class="btn btn-danger bt-sm">Hapus</a>
                                </th>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sampul</th>
                                <th>Judul</th>
                                <th>Volume</th>
                                <th>Penulis</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
</section>
<!-- /.content -->