<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Kelola Pengguna</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Kelola User</li>
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
            <div class="card">
                <div class="card-header" style="background-color: #ea97ad;">
                    <h3 class="card-title">
                        Kelola Pengguna
                    </h3>
                    <!-- tools box -->
                    <!-- <div class="card-tools">
                        <a href="#" type="button" class="btn btn-tool btn-sm">
                            <i class="fas fa-plus">Tambah</i></a>
                    </div> -->
                    <!-- /. tools -->
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    <table id="example1" class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Wewenang</th>
                                <th>Paket</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($user as $key => $value) { ?>
                            <tr>
                                <td><?= $value->username ?></td>
                                <td><?php
                                if ($value->id_role == 1) {
                                    echo '<span class="badge bg-purple">Administrator</span>';
                                } else {
                                    echo '<span class="badge bg-pink">Member</span>';
                                }
                                ?>
                                </td>
                                <td><?php
                                if ($value->id_paket == 1) {
                                    echo '<span class="badge bg-primary">Hemat</span>';
                                } else {
                                    echo '<span class="badge bg-gray">Silver</span>';
                                }
                                ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#Edit<?= $value->id ?>"><i class="fa fa-edit">
                                            <span class="ml-2 d-none d-lg-inline text-black">Edit</span></i></button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#Delete<?= $value->id ?>"><i class="fa fa-trash"><span
                                                class="ml-2 d-none d-lg-inline"> Delete</span></i></button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Username</th>
                                <th>Wewenang</th>
                                <th>Paket</th>
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

<!-- Modal Edit -->
<?php foreach ($user as $key => $value) { ?>
<div class="modal fade" id="Edit<?= $value->id ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Pengguna</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('admin/kelolaUser/edit/' .$value->id);
                ?>
                <div class="form-group">
                    <label>Username</label>
                    <input type="username" name="username" value="<?= $value->username ?>" class="form-control"
                        placeholder="Masukan Username" required>
                </div>
                <div class="form-group">
                    <label>Wewenang</label>
                    <select class="form-control" name="id_role">
                        <option value="1">Administrator</option>
                        <option value="2">Member</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Paket</label>
                    <select class="form-control" name="id_paket">
                        <option value="1">Hemat</option>
                        <option value="2">Silver</option>
                        <option>Gold</option>
                        <option>Platinum</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save changes</button>
            </div>
            <?php
            echo form_close()
            ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- /.modal -->

<!-- Modal Delete -->
<?php foreach ($user as $key => $value) { ?>
<div class="modal fade" id="Delete<?= $value->id ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete <?= $value->username ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center>
                    <h5>Are you sure ?</h5>
                </center>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="<?= base_url('admin/kelolaUser/Delete/'.$value->id) ?>" class="btn btn-danger">Delete</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- /.modal -->