<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Postingan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Tambah Postingan</li>
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
                <a href="<?= base_url('admin/postingan') ?>" type="button" class="btn btn-light bg-pink btn-sm"
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

            echo form_open('admin/postingan/add') ?>
            <div class="form-group">
                <label>Judul Manga</label>
                <input type="text" name="judul" class="form-control" placeholder="Masukan Judul" required>
            </div>
            <!-- text input -->
            <div class="form-group">
                <label>Tipe</label>
                <select name="tipe" class="form-control">
                    <option value="Gratis">Gratis</option>
                </select>
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea name="content" id="summernote" class="textarea" placeholder="Place some text here"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Save</button>
                <button type="reset" class="btn btn-warning">Reset</button>
                <a href="<?= base_url('admin/postingan') ?>" class="btn btn-default">Back</a>
            </div>
            <?php echo form_close()?>
        </div>
    </div>
</div>