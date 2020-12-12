<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Manga</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Tambah Manga</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="card">
        <div class="card-header" style="background-color: #ea97ad;">
            <h3 class="card-title">Form Add Manga</h3>
            <div class="card-tools">
                <a href="<?= base_url('admin/manga') ?>" type="button" class="btn btn-light bg-pink btn-sm"
                    data-card="collapse"><i class="fas fa-angle-left"> Back</i></a>
            </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
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

            echo form_open_multipart('admin/manga/add') ?>
            <div class="form-group">
                <label>Judul Manga</label>
                <input name="name_manga" class="form-control" placeholder="Masukan Judul Manga"
                    value="<?= set_value('name_manga') ?>">
            </div>
            <!-- text input -->
            <div class="form-group">
                <label>Genre</label>
                <select name="id_genre" class="form-control">
                    <option value=""> -- Pilih Genre -- </option>
                    <?php foreach ($genre as $key => $value) { ?>
                    <option value="<?= $value->id_genre ?>"><?= $value->name_genre ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="textarea" placeholder="Place some text here"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= set_value('description') ?></textarea>
            </div>
            <div class="row">
                <div class="col-xl-9">
                    <div class="form-group">
                        <label>Sampul</label>
                        <input type="file" name="sampul_manga" class="form-control" id="preview_img" required>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="form-group">
                        <img src="<?= base_url('assets/uploads/images/noimage.png') ?>" alt="Image" id="img_load"
                            width="240px" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Save</button>
                <button type="reset" class="btn btn-warning">Reset</button>
                <a href="<?= base_url('admin/manga') ?>" class="btn btn-default">Back</a>
            </div>
            <?php echo form_close()?>
        </div>
    </div>
</div>