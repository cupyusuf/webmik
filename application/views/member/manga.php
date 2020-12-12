<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Manga</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Manga</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="card col-12">
    <div class="card-header" style="background-color: #ea97ad;">
        <h3 class="card-title">Manga Pilihan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Sampul</th>
                    <th>Judul</th>
                    <th>Genre</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($manga as $key => $value) { ?>
                <tr>
                    <td><img src="<?= base_url('assets/uploads/cover-manga/'.$value->sampul_manga) ?>" width="150px"
                            alt="Foto" class="img-fluid">
                    </td>
                    <td><?= $value->name_manga ?></td>
                    <td>
                        <span class="badge badge-info"><?= $value->name_genre ?></span>
                    </td>
                    <td>
                        <a href="<?= base_url('member/manga/detail/' . $value->id_manga) ?>"
                            class="btn btn-success btn-sm">
                            <i class="fa fa-eye">
                                <span class="ml-2 d-none d-lg-inline">Detail</span>
                            </i>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Sampul</th>
                    <th>Judul</th>
                    <th>Genre</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->