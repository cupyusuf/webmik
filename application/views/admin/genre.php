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

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #ea97ad;">
                    <h3 class="card-title">
                        Genre
                    </h3>
                    <!-- tools box -->
                    <div class="card-tools">
                        <button data-toggle="modal" data-target="#Add" type="button"
                            class="btn btn-light bg-pink btn-sm" data-card="collapse"><i class="fas fa-plus"><span
                                    class="ml-2 d-none d-lg-inline text-white">
                                    Add Genre</span></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    <table id="example1" class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Genre</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($genre as $key => $value) { ?>
                            <tr>
                                <td><?= $value->name_genre ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#Edit<?= $value->id_genre ?>"><i class="fa fa-edit">
                                            <span class="ml-2 d-none d-lg-inline text-black">Edit</span></i></button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#Delete<?= $value->id_genre ?>"><i class="fa fa-trash"><span
                                                class="ml-2 d-none d-lg-inline"> Delete</span></i></button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Genre</th>
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

<!-- Modal Add -->
<div class="modal fade" id="Add">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Genre</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('admin/genre/add')
                ?>
                <div class="form-group">
                    <label>Genre</label>
                    <input type="text" name="name_genre" class="form-control" placeholder="Masukan Genre" required>
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
<!-- /.modal -->

<!-- Modal Edit -->
<?php foreach ($genre as $key => $value) { ?>
<div class="modal fade" id="Edit<?= $value->id_genre ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Genre</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('admin/genre/edit/' .$value->id_genre);
                ?>
                <div class="form-group">
                    <label>Genre</label>
                    <input type="text" name="name_genre" value="<?= $value->name_genre ?>" class="form-control"
                        placeholder="Masukan Genre" required>
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
<?php foreach ($genre as $key => $value) { ?>
<div class="modal fade" id="Delete<?= $value->id_genre ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete <?= $value->name_genre ?></h4>
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
                <a href="<?= base_url('admin/genre/Delete/'.$value->id_genre) ?>" class="btn btn-danger">Delete</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- /.modal -->