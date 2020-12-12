<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-indigo elevation-4 bg-pink">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="<?php echo base_url('assets/vendor/AdminLTE-3');?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">WebMik</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url('assets/vendor/AdminLTE-3');?>/dist/img/user3-128x128.jpg"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?php echo base_url('admin/profile') ?>"
                    class="d-block"><?php echo $this->session->userdata('first_name')?>
                    <?php echo $this->session->userdata('last_name')?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('admin/home') ?>"
                        class="nav-link <?php if ($this->uri->segment(2) == 'home') {echo "active";} ?>"
                        class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dasbor</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/postingan') ?>"
                        class="nav-link <?php if ($this->uri->segment(2) == 'postingan') {echo "active";} ?>"
                        class="nav-link active">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>Postingan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/akses') ?>"
                        class="nav-link <?php if ($this->uri->segment(2) == 'akses') {echo "active";} ?>"
                        class="nav-link active">
                        <i class="nav-icon fas fa-low-vision"></i>
                        <p>Hak Akses</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#"
                        class="nav-link <?php if ($this->uri->segment(2) == 'genre' ) {echo "active";} ?> <?php if ($this->uri->segment(2) == 'manga' ) {echo "active";} ?> <?php if ($this->uri->segment(2) == 'albums' ) {echo "active";} ?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Kelola Manga
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/albums') ?>"
                                class="nav-link <?php if ($this->uri->segment(2) == 'albums') {echo "active";} ?>"
                                class="nav-link active">
                                <i class="fas fa-images nav-icon"></i>
                                <p>Album Manga</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/genre') ?>"
                                class="nav-link <?php if ($this->uri->segment(2) == 'genre') {echo "active";} ?>"
                                class="nav-link active">
                                <i class="fas fa-database nav-icon"></i>
                                <p>Genre</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/manga') ?>"
                                class="nav-link <?php if ($this->uri->segment(2) == 'manga') {echo "active";} ?>"
                                class="nav-link active">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Manga</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/kelolauser') ?>"
                        class="nav-link <?php if ($this->uri->segment(2) == 'kelolauser') {echo "active";} ?>"
                        class="nav-link active">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Kelola Pengguna</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() ?>logout" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>