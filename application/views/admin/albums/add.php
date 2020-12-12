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

<div class="col-md-12">
    <div class="card">
        <div class="card-header" style="background-color: #ea97ad;">
            <h3 class="card-title">Add Image Manga : <?= $manga->name_manga ?></h3>
            <div class="card-tools">
                <a href="<?= base_url('admin/albums') ?>" type="button" class="btn btn-light bg-pink btn-sm"
                    data-card="collapse"><i class="fas fa-angle-left"> Back</i></a>
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

            <?php 
            // notification form is empty
            echo validation_errors('<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-info"></i>','</div>');
            
            // upload failed notification
            if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fas fa-info"></i>' . $error_upload . '</div>';
            }

            echo form_open_multipart('admin/albums/add/' .$manga->id_manga) ?>

            <div class="form-group">
                <label>Info Image</label>
                <input name="info" class="form-control" placeholder="Enter Info Image" value="<?= set_value('info') ?>">
            </div>

            <div class="row">
                <div class="col-xl-9">
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" id="preview_img" required>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="form-group">
                        <img src="<?= base_url('assets/uploads/images/noimage.png') ?>" alt="Image" id="img_load"
                            width="240px">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Save</button>
                <button type="reset" class="btn btn-warning">Reset</button>
                <a href="<?= base_url('admin/albums') ?>" class="btn btn-default">Back</a>
            </div>

            <?php echo form_close() ?>
            <hr>

            <!-- Testing -->
            <div class="card-body pb-0">
                <div class="row d-flex align-items-stretch">
                    <?php foreach ($albums as $key => $value) { ?>
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                        <div class="card bg-light">
                            <img src="<?= base_url('assets/uploads/albums/' . $value->image) ?>"
                                class="card-img-top img-fluid card-image" alt="<?= $value->info ?>">
                            <div class="card-body pt-1">
                                <div class="row">
                                    <div class="col-7">
                                        <p class="card-text"><strong>Info : </strong><?= $value->info ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-center">
                                    <button data-toggle="modal" data-target="#Delete<?= $value->id_image ?>"
                                        href="<?= base_url('admin/albums') ?>" class="btn btn-danger btn-xs btn-block">
                                        <i class="fas fa-trash"> Delete</i></button>
                                </div>
                            </div>
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

    <!-- Modal Delete -->
    <?php foreach ($albums as $key => $value) { ?>
    <div class="modal fade" id="Delete<?= $value->id_image ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $value->info ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card">
                    <center>
                        <img src="<?= base_url('assets/uploads/albums/' . $value->image) ?>"
                            class="card-img-top img-fluid card-image" alt="<?= $value->info ?>">
                    </center>
                </div>
                <div class="modal-body">
                    <center>
                        <h5>Are you sure ?</h5>
                    </center>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('admin/albums/Delete/' .$value->id_manga .'/' .$value->id_image) ?>"
                        class="btn btn-danger">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <?php } ?>
    <!-- /.modal -->