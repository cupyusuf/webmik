<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Albums Manga</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Albums Manga</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="col-md-12">
    <div class="card">
        <div class="card-header" style="background-color: #ea97ad;">
            <h3 class="card-title">Data Albums Manga</h3>
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
            <table class="table table-bordered table-hover text-center" id="example1">
                <thead class="text-center">
                    <tr>
                        <th>Cover</th>
                        <th>Judul / Volume</th>
                        <th>Total</th>
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
                        <td><span class="badge bg-primary">
                                <h6><?= $value->total_image ?></h6>
                            </span></td>
                        <td>
                            <a href="<?= base_url('admin/albums/add/' . $value->id_manga) ?>"
                                class="btn btn-default btn-sm bg-pink">
                                <i class="fa fa-plus"> Add Image</i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>

                <tfoot class="text-center">
                    <tr>
                        <th>Cover</th>
                        <th>Judul / Volume</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </tfoot>

            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>