<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Genre</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Genre</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="card col-12">
    <div class="card-header">
        <h3 class="card-title">Manga Pilihan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Sampul</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Genre</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tr>
                <td>
                    <img src="<?= base_url('/assets/uploads/manga') ?>/dragonball/cover/20959.jpg" alt="Sampul"
                        width="150px">
                </td>
                <td>Dragon Ball</td>
                <td>Akira Toriyama</td>
                <td>Shounen</td>
                <td>
                    <span class="badge badge-info">Action</span>
                    <span class="badge badge-info">Advanture</span>
                    <span class="badge badge-info">Comedy</span>
                    <span class="badge badge-info">Fantasy</span>
                </td>
                <th>
                    <a href="<?php echo base_url('member/detail') ?>" class="btn btn-sm btn-success">
                        <i class="fas fa-eye"></i>
                        Detail
                    </a>
                    <a href="#" class="btn btn-sm btn-info">Bagikan</a>
                </th>
            </tr>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <th>Sampul</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Genre</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->