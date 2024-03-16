<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= BASEURL ?>/assets/dist/img/logo-hasamitra.png" alt="LOS" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">E-FUNDING HASAMITRA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">

                <a href="#" class="d-block"><?= $_COOKIE['level'] . ' (' . $_COOKIE['nama_cabang'] . ')' ?> </a>
            </div>
        </div>


        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= BASEURL ?>/administrator/index" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= BASEURL ?>/administrator/pengelolaan_user" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Data User
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Data Master
                            <i class="fas fa-angle-left right"></i> <!-- Penanda panah dropdown -->
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="margin-left: 20px;"> <!-- Submenu untuk Data Master -->
                        <li class="nav-item">
                            <a href="<?= BASEURL ?>/administrator/data_level" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Data Level
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASEURL ?>/administrator/data_jabatan" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Data Jabatan
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>