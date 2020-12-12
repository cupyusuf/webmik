<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-indigo elevation-4 bg-pink">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('member/home') ?>" class="brand-link">
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
                <a href="<?php echo base_url('member/profile') ?>"
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
                    <a href="<?= base_url('member/home') ?>"
                        class="nav-link <?php if ($this->uri->segment(2) == 'home') {echo "active";} ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dasbor</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('member/beli') ?>"
                        class="nav-link <?php if ($this->uri->segment(2) == 'beli') {echo "active";} ?>">
                        <i class="nav-icon fas fa-cart-plus"></i>
                        <p>Beli Paket</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('member/genre') ?>"
                        class="nav-link <?php if ($this->uri->segment(2) == 'genre') {echo "active";} ?>">
                        <i class="nav-icon fas fas fa-database"></i>
                        <p>Genre</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('member/manga') ?>"
                        class="nav-link <?php if ($this->uri->segment(2) == 'manga') {echo "active";} ?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Manga</p>
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