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
            <div class="card card-outline">
                <div class="card-header" style="background-color: #ea97ad;">
                    <h3 class="card-title">
                        Postingan Manga Gratis
                    </h3>

                    <div class="card-tools">
                        <a href="<?= base_url('admin/postingan/add') ?>" type="button" class="btn bg-pink btn-sm"
                            data-card="collapse">
                            <i class="fas fa-plus">
                                <span class="ml-2 d-none d-lg-inline">Add Post</span>
                            </i>
                        </a>
                    </div>
                    <!-- /.card-tools -->
                    <!-- /. tools -->
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    <table id="example1" class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Judul Manga</th>
                                <th>Tipe</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($fmanga as $key => $value) { ?>
                            <tr>
                                <th><?= $value->judul ?></th>
                                <th><?= $value->tipe ?></th>
                                <td>
                                    <a href="<?= base_url('admin/postingan/edit/' . $value->id_article) ?>"
                                        class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit">
                                            <span class="ml-2 d-none d-lg-inline">Edit</span>
                                        </i>
                                    </a>
                                    <a href="<?= base_url('admin/postingan/delete/' . $value->id_article) ?>"
                                        class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash">
                                            <span class="ml-2 d-none d-lg-inline">Delete</span>
                                        </i>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Judul Manga</th>
                                <th>Tipe</th>
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