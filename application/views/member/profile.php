<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Profle</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- Profile Image -->
                <div class="card card-pink card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="<?php echo base_url('assets/vendor/AdminLTE-3');?>/dist/img/user3-128x128.jpg"
                                alt="User profile picture">
                        </div>
                        <br>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Full Name</b> <a
                                    class="float-right"><?php echo $this->session->userdata('first_name')?>
                                    <?php echo $this->session->userdata('last_name')?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Username</b> <a
                                    class="float-right"><?php echo $this->session->userdata('username')?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right"><?php echo $this->session->userdata('email')?></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->