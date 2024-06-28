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


        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <!-- <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div> -->
        </div>










        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= BASEURL ?>/approval/beranda" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= BASEURL ?>/approval/daftar_belum_approve" class="nav-link">
                        <i class="nav-icon fas fa-file-signature"></i>
                        <?php

                        $this->db = new Database;
                        if ($_COOKIE['kd_jabatan'] == 'DIR') {
                            $this->db->query('SELECT * FROM tbl_rc_permohonan WHERE (jenis_permohonan ="PENCAIRAN SEBELUM JATUH TEMPO" AND status_nasabah IS NULL AND status_permohonan = "DIVERIFIKASI")');
                            $this->db->execute();
                            $jumlah_diajukan =  $this->db->rowCount();
                        } else if ($_COOKIE['kd_jabatan'] == 'BM') {
                            if ($_COOKIE['nama_cabang'] == "CABANG UTAMA") {
                                // $this->db->query('SELECT * FROM tbl_rc_permohonan WHERE (nilai_suku_bunga_pengajuan <= 6.25 OR (jenis_permohonan = "PENCAIRAN SEBELUM JATUH TEMPO" AND status_nasabah="NASABAH PRIORITY")) AND (kantor_cabang = :kantor_cabang OR kantor_cabang = :kantor_cabang1) AND status_permohonan ="DIAJUKAN"');
                                $this->db->query('SELECT * FROM tbl_rc_permohonan WHERE (kantor_cabang = :kantor_cabang OR kantor_cabang = :kantor_cabang1) AND status_permohonan ="DIAJUKAN"');
                                $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
                                $this->db->bind('kantor_cabang1', "KANTOR KAS");
                                $this->db->execute();
                                $jumlah_diajukan =  $this->db->rowCount();
                            } else {
                                // $this->db->query('SELECT * FROM tbl_rc_permohonan WHERE (nilai_suku_bunga_pengajuan <= 6.25 OR (jenis_permohonan = "PENCAIRAN SEBELUM JATUH TEMPO" AND status_nasabah="NASABAH PRIORITY")) AND kantor_cabang = :kantor_cabang  AND status_permohonan ="DIAJUKAN"');
                                $this->db->query('SELECT * FROM tbl_rc_permohonan WHERE kantor_cabang = :kantor_cabang  AND status_permohonan ="DIAJUKAN"');
                                $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
                                $this->db->execute();
                                $jumlah_diajukan =  $this->db->rowCount();
                            }
                        } else if ($_COOKIE['kd_jabatan'] == 'AM' || $_COOKIE['kd_jabatan'] == 'BAM') {
                            if ($_COOKIE['nama_cabang'] == "CABANG UTAMA") {
                                // $this->db->query('SELECT * FROM tbl_rc_permohonan WHERE nilai_suku_bunga_pengajuan <= 6.00 AND (kantor_cabang = :kantor_cabang OR kantor_cabang = :kantor_cabang1) AND status_permohonan ="DIAJUKAN"');
                                $this->db->query('SELECT * FROM tbl_rc_permohonan WHERE ((nilai_suku_bunga_pengajuan <= 6.00 OR nilai_suku_bunga_pengajuan > 6.25) OR (jenis_permohonan ="PENCAIRAN SEBELUM JATUH TEMPO" AND status_nasabah is null)) AND (kantor_cabang = :kantor_cabang OR kantor_cabang = :kantor_cabang1) AND status_permohonan ="DIAJUKAN"');
                                $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
                                $this->db->bind('kantor_cabang1', "KANTOR KAS");
                                $this->db->execute();
                                $jumlah_diajukan =  $this->db->rowCount();
                            } else {
                                $this->db->query('SELECT * FROM tbl_rc_permohonan WHERE ((nilai_suku_bunga_pengajuan <= 6.00 OR nilai_suku_bunga_pengajuan > 6.25) OR (jenis_permohonan ="PENCAIRAN SEBELUM JATUH TEMPO" AND status_nasabah is null)) AND kantor_cabang = :kantor_cabang AND status_permohonan ="DIAJUKAN"');
                                $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
                                $this->db->execute();
                                $jumlah_diajukan =  $this->db->rowCount();
                            }
                        } else {
                            // $this->db->query('SELECT * FROM tbl_rc_permohonan WHERE nilai_suku_bunga_pengajuan <= 5.75   AND kantor_cabang = :kantor_cabang AND status_permohonan ="DIAJUKAN"');
                            $this->db->query('SELECT * FROM tbl_rc_permohonan 
                            WHERE (nilai_suku_bunga_pengajuan <= 5.75 
                            OR (jenis_permohonan ="PENCAIRAN SEBELUM JATUH TEMPO" AND status_nasabah is null))
                            AND kantor_cabang = :kantor_cabang 
                            AND status_permohonan ="DIAJUKAN"');

                            $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
                            $this->db->execute();
                            $jumlah_diajukan =  $this->db->rowCount();
                        }
                        ?>
                        <p>
                            Daftar Belum Diputuskan
                            <span class="badge badge-light"><?= $jumlah_diajukan ?></span>
                            <span class="sr-only">unread messages</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= BASEURL ?>/approval/daftar_pending" class="nav-link">
                        <i class="nav-icon fas fa-file-signature"></i>
                        <?php

                        $this->db = new Database;
                        $this->db->query('SELECT * FROM tbl_rc_permohonan WHERE status_permohonan = "Diajukan Ulang" AND username_approval = :username');
                        $this->db->bind('username', $_COOKIE['nama_lengkap']);
                        $this->db->execute();
                        $jumlah_pending =  $this->db->rowCount();
                        ?>
                        <p>
                            Daftar Pending
                            <span class="badge badge-light"><?= $jumlah_pending ?></span>
                            <span class="sr-only">unread messages</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= BASEURL ?>/approval/data_persetujuan" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                            Daftar Sudah Diputuskan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

</aside>