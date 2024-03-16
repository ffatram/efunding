<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= BASEURL ?>/assets/dist/img/logo-hasamitra.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">E-FUNDING</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">

                <a href="#" class="d-block"><?= $_COOKIE['level'] . ' (' . $_COOKIE['nama_cabang'] . ')' ?> </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= BASEURL ?>/funding" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= BASEURL ?>/funding/data_nasabah" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Data Nasabah Priority
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= BASEURL ?>/funding/pencairan_sebelum_jatuh_tempo" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <?php
                        $this->db = new Database;
                        $this->db->query('SELECT * FROM tbl_rc_permohonan where jenis_permohonan = "PENCAIRAN SEBELUM JATUH TEMPO" AND (status_permohonan="DISETUJUI" OR status_permohonan="DIPENDING") AND username =:username ');
                        // $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
                        $this->db->bind('username', $_COOKIE['username']);
                        $this->db->execute();
                        $jumlah_setuju =  $this->db->rowCount();
                        ?>
                        <p>
                            Pencairan Sebelum Jatuh Tempo
                            <span class="badge badge-light"><?= $jumlah_setuju ?></span>
                            <span class="sr-only">unread messages</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= BASEURL ?>/funding/suku_bunga" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <?php
                        $this->db = new Database;
                        $this->db->query('SELECT * FROM tbl_rc_permohonan where jenis_permohonan ="SUKU BUNGA KHUSUS" AND (status_permohonan="DISETUJUI" OR status_permohonan="DIPENDING") AND username =:username ');
                        // $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
                        $this->db->bind('username', $_COOKIE['username']);
                        $this->db->execute();
                        $jumlah_setuju =  $this->db->rowCount();
                        ?>
                        <p>
                            Suku Bunga Khusus
                            <span class="badge badge-light"><?= $jumlah_setuju ?></span>
                            <span class="sr-only">unread messages</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>