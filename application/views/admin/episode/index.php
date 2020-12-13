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
<div id="myalert">
    <?php
                echo validation_errors('<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>', '</div>');

                if ($this->session->flashdata('alerts')) {
                    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Peringatan !!!</h5>';
                    echo $this->session->flashdata('alerts');
                    echo '</div>';
                }
        ?>
</div>


<div class="col-md-12">
    <div class="card">
        <div class="card-header" style="background-color: #ea97ad;">
            <h3 class="card-title">Data Manga</h3>

            <div class="card-tools">
                <a href="<?= base_url('admin/manga/add') ?>" type="button" class="btn btn-light bg-pink btn-sm"
                    data-card="collapse"><i class="fas fa-plus">
                        <span class="ml-2 d-none d-lg-inline">Add Manga</span></i></a>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            if ($this->session->set_flashdata('msg')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
                echo $this->session->set_flashdata('msg');
                echo '</h5></div>';
            }
            ?>
            <table class="table table-bordered table-hover" id="example1">
                <thead class="text-center">
                    <tr>
                        <th>Sampul</th>
                        <th>Judul / Volume</th>
                        <th>Genre</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php foreach ($manga as $key => $value) { ?>
                    <tr>
                        <td><img src="<?= base_url('assets/uploads/cover-manga/'.$value->sampul_manga) ?>" width="150px"
                                alt="Foto" class="img-fluid">
                        </td>
                        <td><?= $value->name_manga ?></td>
                        <td><?= $value->name_genre ?></td>
                        <td>
                            <a href="<?= base_url('admin/manga/edit/' . $value->id_manga) ?>"
                                class="btn btn-warning btn-sm">
                                <i class="fa fa-edit">
                                    <span class="ml-2 d-none d-lg-inline">Edit</span>
                                </i>
                            </a>
                            <button class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#Delete<?= $value->id_manga ?>"><i class="fa fa-trash"><span
                                        class="ml-2 d-none d-lg-inline">Delete</span></i></button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center">
                    <tr>
                        <th>Sampul</th>
                        <th>Judul / Volume</th>
                        <th>Genre</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- Modal Delete -->
<?php foreach ($manga as $key => $value) { ?>
<div class="modal fade" id="Delete<?= $value->id_manga ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete <?= $value->name_manga ?></h4>
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
                <a href="<?= base_url('admin/manga/Delete/'.$value->id_manga) ?>" class="btn btn-danger">Delete</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- /.modal -->