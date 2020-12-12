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

<div class="col-md-12">
    <div class="card">
        <div class="card-header" style="background-color: #ea97ad;">
            <h3 class="card-title">
                <i class="fas fa-edit"></i>
                Genre
            </h3>
        </div>
        <div class="card-body pad table-responsive">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <?php foreach ($genre as $key => $value) { ?>
                <div class="col-3 pt-2">
                    <a href="#" class="btn btn-default btn-block"><?= $value->name_genre; ?></a>
                </div>
                <?php } ?>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.col -->