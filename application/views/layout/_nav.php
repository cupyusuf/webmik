<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light" style="background-color: #ea97ad;">
    <div class="container">
        <a href="<?= base_url() ?>" class="navbar-brand">
            <img src="<?php echo base_url('assets/vendor/AdminLTE-3');?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">WebMik</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?= base_url() ?>" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>contact" class="nav-link">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>manga" class="nav-link">Gratis</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>donasi" class="nav-link">Donasi</a>
                </li>
            </ul>

            <form class="form-inline ml-3" action="<?= base_url() ?>login">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <li class="nav-item">
                <a href="<?= base_url() ?>login" class="nav-link">Log In</a>
            </li>
        </ul>
    </div>
</nav>
<!-- /.navbar -->