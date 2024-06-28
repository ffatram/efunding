<?php

class m_approval
{
    public function __construct()
    {
        $this->db = new Database;
    }
    // public function lihat_data()
    // {
    //     // jika login sebagai komite pusat
    //     $komite = $_COOKIE['tipe_komite'];
    //     $jabatan = $_COOKIE['kd_jabatan'];
    //     if ($komite == 'PUSAT') {
    //         if ($jabatan == 'DIR') {
    //             $this->db->query('SELECT * FROM tbl_rc_permohonan Where (jenis_permohonan = "PENCAIRAN SEBELUM JATUH TEMPO" AND status_permohonan="DIAJUKAN" ) OR ((nilai_suku_bunga_pengajuan > 6.25  AND nilai_suku_bunga_pengajuan <= 6.75) AND status_permohonan ="DIAJUKAN")');
    //             // $this->db->bind('limit_min', $_COOKIE['limit_min']);
    //             // $this->db->bind('limit_max', $_COOKIE['limit_max']);
    //             return $this->db->resultSet();
    //         }
    //     } else if ($komite == 'CABANG') {
    //         if ($jabatan == 'BM') {
    //             $this->db->query('SELECT * FROM tbl_rc_permohonan Where jenis_permohonan = "SUKU BUNGA KHUSUS " AND status_permohonan ="DIAJUKAN" AND kantor_cabang = :kantor_cabang AND nilai_suku_bunga_pengajuan > 6.00  AND nilai_suku_bunga_pengajuan <= 6.25');
    //             $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
    //             return $this->db->resultSet();
    //         } else if ($jabatan == 'AM' || $jabatan == 'BAM') {
    //             $this->db->query('SELECT * FROM tbl_rc_permohonan Where jenis_permohonan = "SUKU BUNGA KHUSUS " AND status_permohonan ="DIAJUKAN" AND kantor_cabang = :kantor_cabang AND nilai_suku_bunga_pengajuan > 5.75  AND nilai_suku_bunga_pengajuan <= 6.00');
    //             $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
    //             return $this->db->resultSet();
    //         } else {
    //             $this->db->query('SELECT * FROM tbl_rc_permohonan Where jenis_permohonan = "SUKU BUNGA KHUSUS" AND status_permohonan ="DIAJUKAN" AND kantor_cabang = :kantor_cabang AND nilai_suku_bunga_pengajuan <= 5.75 ');
    //             $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
    //             return $this->db->resultSet();
    //         }
    //     }
    // }
    public function lihat_data()
    {
        if ($_COOKIE['kd_jabatan'] == 'DIR') {
            // $this->db->query('SELECT * from tbl_rc_permohonan where (jenis_permohonan = "PENCAIRAN SEBELUM JATUH TEMPO" AND status_nasabah IS NULL AND status_permohonan="DIAJUKAN" ) OR (nilai_suku_bunga_pengajuan > 6.25  AND status_permohonan ="DIAJUKAN")');
            $this->db->query('SELECT * from tbl_rc_permohonan where (jenis_permohonan = "PENCAIRAN SEBELUM JATUH TEMPO" AND status_nasabah IS NULL AND status_permohonan="DIVERIFIKASI" )');
            return $this->db->resultSet();
        } else {
            if ($_COOKIE['nama_cabang'] == "CABANG UTAMA") {
                if ($_COOKIE['kd_jabatan'] == 'BM' || $_COOKIE['kd_jabatan'] == 'BAM') {
                    $this->db->query('SELECT * from tbl_rc_permohonan where status_permohonan="Diajukan" AND (kantor_cabang = :kantor_cabang OR kantor_cabang = :kantor_cabang1)');
                    $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
                    $this->db->bind('kantor_cabang1', "KANTOR KAS");
                    return $this->db->resultSet();
                } else {
                    $this->db->query('SELECT * from tbl_rc_permohonan where status_permohonan="Diajukan" AND kantor_cabang = :kantor_cabang');
                    $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
                    return $this->db->resultSet();
                }
            } else {
                $this->db->query('SELECT * from tbl_rc_permohonan where status_permohonan="Diajukan" AND kantor_cabang = :kantor_cabang');
                $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
                return $this->db->resultSet();
            }
        }
    }

    public function lihat_view_jabatan()
    {
        $this->db->query('SELECT DISTINCT limit_min,limit_max FROM view_jabatan WHERE kd_jabatan = :kd_jabatan');
        $this->db->bind('kd_jabatan', $_COOKIE['kd_jabatan']);
        return $this->db->single();
    }

    public function lihat_semua_data()
    {
        $this->db->query('SELECT * FROM tbl_rc_permohonan where status_permohonan = "DIAJUKAN"');
        return $this->db->resultSet();
    }

    // public function lihat_data_approval()
    // {
    //     if ($_COOKIE['kd_jabatan'] == 'DIR') {
    //         // $this->db->query('SELECT * FROM tbl_rc_permohonan Where (username_approval = :username_approval AND status_permohonan !="Diajukan" OR status_permohonan !="DIPENDING")  OR status_permohonan !="Diajukan Ulang"');
    //         $this->db->query('SELECT * FROM tbl_rc_permohonan WHERE status_permohonan ="DISETUJUI" OR status_permohonan ="DITOLAK" OR status_permohonan ="DILANJUTKAN" OR status_permohonan ="TELAH DIPROSES"');
    //         // $this->db->bind('username_approval', $_COOKIE['username']);
    //         return $this->db->resultSet();
    //     } else if ($_COOKIE['kd_jabatan'] == 'BM' || $_COOKIE['kd_jabatan'] == 'BAM' || $_COOKIE['kd_jabatan'] == 'AM') {
    //         if ($_COOKIE['nama_cabang'] == "CABANG UTAMA") {
    //             $this->db->query('SELECT * FROM tbl_rc_permohonan WHERE(status_permohonan ="DISETUJUI" OR status_permohonan ="DITOLAK" OR status_permohonan ="DILANJUTKAN" OR status_permohonan ="TELAH DIPROSES") AND (kantor_cabang = :kantor_cabang OR kantor_cabang = :kantor_cabang1)');
    //             $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
    //             $this->db->bind('kantor_cabang1', "KANTOR KAS");
    //             return $this->db->resultSet();
    //         }else{
    //             $this->db->query('SELECT * FROM tbl_rc_permohonan WHERE(status_permohonan ="DISETUJUI" OR status_permohonan ="DITOLAK" OR status_permohonan ="DILANJUTKAN" OR status_permohonan ="TELAH DIPROSES") AND kantor_cabang = :kantor_cabang');
    //             $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
    //             return $this->db->resultSet();
    //         }
    //     } else {
    //         $this->db->query('SELECT * FROM tbl_rc_permohonan Where jenis_permohonan = "SUKU BUNGA KHUSUS" AND (status_permohonan ="Disetujui" OR status_permohonan ="DITOLAK" OR status_permohonan ="DILANJUTKAN" OR status_permohonan ="TELAH DIPROSES") AND username_approval = :username_approval AND kantor_cabang = :kantor_cabang');
    //         $this->db->bind('username_approval', $_COOKIE['username']);
    //         $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
    //         return $this->db->resultSet();
    //     }
    // }

    public function lihat_data_pending()
    {
        $this->db->query('SELECT * FROM tbl_rc_permohonan Where username_approval = :username_approval AND (status_permohonan="DIAJUKAN ULANG" OR status_permohonan ="DIPENDING") ');
        $this->db->bind('username_approval', $_COOKIE['nama_lengkap']);
        return $this->db->resultSet();
    }

    public function modal_detail()
    {
        $this->db->query('SELECT * FROM tbl_rc_permohonan WHERE id_permohonan = :id_permohonan');
        $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
        return $this->db->single();
    }

    public function lihat_data_permohonan_id()
    {
        $this->db->query('SELECT * FROM tbl_suku_bunga_khusus WHERE CIF = :cif ');
        $this->db->bind('CIF', $_POST['cif']);
        return $this->db->resulset();
    }

    public function jumlah_data_permohonan_pencairan()
    {
        if ($_COOKIE['tipe_komite'] == "PUSAT") {
            $this->db->query('SELECT COUNT(*) as jumlah_data_pencairan from tbl_rc_permohonan WHERE jenis_permohonan="PENCAIRAN SEBELUM JATUH TEMPO" AND status_permohonan != "DIBATALKAN"');
            return $this->db->single();
        } else {
            if ($_COOKIE['nama_cabang'] == "CABANG UTAMA") {
                $this->db->query('SELECT COUNT(*) as jumlah_data_pencairan from tbl_rc_permohonan where jenis_permohonan="PENCAIRAN SEBELUM JATUH TEMPO" AND (kantor_cabang = :kantor_cabang OR kantor_cabang = :kantor_cabang1)AND  status_permohonan != "DIBATALKAN"');
                $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
                $this->db->bind('kantor_cabang1', "KANTOR KAS");
                return $this->db->single();
            } else {
                $this->db->query('SELECT COUNT(*) as jumlah_data_pencairan from tbl_rc_permohonan where jenis_permohonan="PENCAIRAN SEBELUM JATUH TEMPO" AND kantor_cabang = :kantor_cabang AND status_permohonan != "DIBATALKAN"');
                $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
                return $this->db->single();
            }
        }
        // if ($_COOKIE['kd_jabatan'] == 'DIR') {
        //     $this->db->query('SELECT COUNT(*) as jumlah_data_pencairan from tbl_rc_permohonan WHERE jenis_permohonan="PENCAIRAN SEBEBLUM JATUH TEMPO"');
        //     return $this->db->single();
        // } else if ($_COOKIE['kd_jabatan'] == 'BM' || $_COOKIE['kd_jabatan'] == 'BAM' || $_COOKIE['kd_jabatan'] == 'AM'){
        //     $this->db->query('SELECT COUNT(*) as jumlah_data_pencairan from tbl_rc_permohonan where jenis_permohonan="PENCAIRAN SEBELUM JATUH TEMPO" AND kantor_cabang = :kantor_cabang');
        //     $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
        //     return $this->db->single();
        // }else if($_COOKIE['kd_jabatan'] == 'COH'){
        //     $this->db->query('SELECT COUNT(*) as jumlah_data_pencairan from tbl_rc_permohonan where jenis_permohonan="Pencairan Sebelum Jatuh Tempo" AND kantor_cabang = :kantor_cabang');
        //     $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
        //     return $this->db->single();
        // }else {
        //     $this->db->query('SELECT COUNT(*) as jumlah_data_pencairan from tbl_rc_permohonan where jenis_permohonan="Pencairan Sebelum Jatuh Tempo" AND status_permohonan="Diajukan" AND kantor_cabang = :kantor_cabang');
        //     $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
        //     return $this->db->single();
        // }
    }
    public function jumlah_data_permohonan_suku_bunga()
    {
        if ($_COOKIE['tipe_komite'] == "PUSAT") {
            $this->db->query('SELECT COUNT(*) as jumlah_data_suku_bunga from tbl_rc_permohonan WHERE jenis_permohonan="SUKU BUNGA KHUSUS"');
            return $this->db->single();
        } else {
            if ($_COOKIE['nama_cabang'] == "CABANG UTAMA") {
                $this->db->query('SELECT COUNT(*) as jumlah_data_suku_bunga from tbl_rc_permohonan where jenis_permohonan="SUKU BUNGA KHUSUS" AND (kantor_cabang = :kantor_cabang OR kantor_cabang = :kantor_cabang1)');
                $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
                $this->db->bind('kantor_cabang1', "KANTOR KAS");
                return $this->db->single();
            } else {
                $this->db->query('SELECT COUNT(*) as jumlah_data_suku_bunga from tbl_rc_permohonan where jenis_permohonan="SUKU BUNGA KHUSUS" AND kantor_cabang = :kantor_cabang');
                $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
                return $this->db->single();
            }
        }
        // if ($_COOKIE['kd_jabatan'] == 'DIR') {
        //     $this->db->query('SELECT COUNT(*) as jumlah_data_suku_bunga from tbl_rc_permohonan where jenis_permohonan="Suku Bunga Khusus" AND status_permohonan="Diajukan"');
        //     return $this->db->single();
        // } else if ($_COOKIE['kd_jabatan'] == 'BM' || $_COOKIE['kd_jabatan'] == 'BAM' || $_COOKIE['kd_jabatan'] == 'AM') {
        //     $this->db->query('SELECT COUNT(*) as jumlah_data_suku_bunga from tbl_rc_permohonan where jenis_permohonan="SUKU BUNGA KHUSUS" AND kantor_cabang = :kantor_cabang');
        //     $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
        //     return $this->db->single();
        // } else if ($_COOKIE['kd_jabatan'] == 'COH') {
        //     $this->db->query('SELECT COUNT(*) as jumlah_data_suku_bunga from tbl_rc_permohonan where jenis_permohonan="SUKU BUNGA KHUSUS" AND kantor_cabang = :kantor_cabang');
        //     $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
        //     return $this->db->single();
        // } else {
        //     $this->db->query('SELECT COUNT(*) as jumlah_data_suku_bunga from tbl_rc_permohonan where jenis_permohonan="SUKU BUNGA KHUSUS" AND kantor_cabang = :kantor_cabang AND username_approval = :username');
        //     $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
        //     $this->db->bind('username', $_COOKIE['username']);
        //     return $this->db->single();
        // }
    }

    public function jumlah_data_disetujui()
    {
        if ($_COOKIE['kd_jabatan'] == 'DIR') {
            $this->db->query('SELECT COUNT(*) as jumlah_data_disetujui from tbl_rc_permohonan where status_permohonan="Disetujui" OR status_permohonan="Dilanjutkan" OR status_permohonan="Telah Diproses"');
            return $this->db->single();
        } else {
            if ($_COOKIE['nama_cabang'] == "CABANG UTAMA") {
                $this->db->query('SELECT COUNT(*) as jumlah_data_disetujui from tbl_rc_permohonan where status_permohonan="Disetujui" OR status_permohonan="Dilanjutkan" OR status_permohonan="Telah Diproses" AND (kantor_cabang = :kantor_cabang OR kantor_cabang = :kantor_cabang1)');
                $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
                $this->db->bind('kantor_cabang1', "KANTOR KAS");
                return $this->db->single();
            } else {
                $this->db->query('SELECT COUNT(*) as jumlah_data_disetujui from tbl_rc_permohonan where (status_permohonan="Disetujui" OR status_permohonan="Dilanjutkan" OR status_permohonan="Telah Diproses") AND kantor_cabang = :kantor_cabang');
                $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
                return $this->db->single();
            }
        }
    }

    public function jumlah_data_ditolak()
    {
        if ($_COOKIE['kd_jabatan'] == 'DIR') {
            $this->db->query('SELECT COUNT(*) as jumlah_data_ditolak from tbl_rc_permohonan where status_permohonan="Ditolak"');
            return $this->db->single();
        } else {
            if ($_COOKIE['nama_cabang'] == "CABANG UTAMA") {
                $this->db->query('SELECT COUNT(*) as jumlah_data_ditolak from tbl_rc_permohonan where status_permohonan="Ditolak" AND (kantor_cabang = :kantor_cabang OR kantor_cabang = :kantor_cabang1)');
                $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
                $this->db->bind('kantor_cabang1', "KANTOR KAS");
                return $this->db->single();
            } else {
                $this->db->query('SELECT COUNT(*) as jumlah_data_ditolak from tbl_rc_permohonan where status_permohonan="Ditolak" AND kantor_cabang = :kantor_cabang');
                $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
                return $this->db->single();
            }
        }
    }

    public function jumlah_data_permohonan()
    {
        if ($_COOKIE['kd_jabatan'] == 'DIR') {
            $this->db->query('SELECT COUNT(*) as jumlah_data_permohonan from tbl_rc_permohonan where status_permohonan ="Diajukan" OR status_permohonan ="Diajukan Ulang" OR status_permohonan ="Dipending"');
            return $this->db->single();
        } else {
            if ($_COOKIE['nama_cabang'] == "CABANG UTAMA") {
                $this->db->query('SELECT COUNT(*) as jumlah_data_permohonan from tbl_rc_permohonan where (status_permohonan="Diajukan"  OR status_permohonan ="Diajukan Ulang" OR status_permohonan ="Dipending") AND (kantor_cabang = :kantor_cabang OR kantor_cabang = :kantor_cabang1)');
                $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
                $this->db->bind('kantor_cabang1', "KANTOR KAS");
                return $this->db->single();
            } else {
                $this->db->query('SELECT COUNT(*) as jumlah_data_permohonan from tbl_rc_permohonan where (status_permohonan="Diajukan"  OR status_permohonan ="Diajukan Ulang" OR status_permohonan ="Dipending") AND kantor_cabang = :kantor_cabang');
                $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
                return $this->db->single();
            }
        }
    }

    public function lihat_data_id()
    {
        $this->db->query('SELECT * FROM tbl_rc_permohonan WHERE id_permohonan = :id_permohonan');
        $this->db->bind('id_permohonan', $_POST['id_permohonan']);
        return $this->db->single();
    }

    public function update_data_suku_bunga()
    {
        $query = "UPDATE tbl_rc_permohonan SET 
        nilai_suku_bunga_approval = :nilai_suku_bunga_approval,
        keterangan_approval = :keterangan_approval,
        status_permohonan = :status_permohonan,
        tgl_pending = :tgl_pending,
        tgl_approval = :tgl_approval,
        username_approval = :username_approval
        WHERE id_permohonan = :id_permohonan";
        $this->db->query($query);
        $this->db->bind('id_permohonan', $_POST['id_permohonan']);
        $this->db->bind('nilai_suku_bunga_approval', $_POST['approval']);
        $this->db->bind('keterangan_approval', $_POST['ket_approval']);
        $this->db->bind('status_permohonan', $_POST['status_permohonan']);
        $this->db->bind('tgl_approval', $_POST['tgl_approval']);
        $this->db->bind('tgl_pending',  $_POST['tgl_pending']);
        $this->db->bind('username_approval', $_POST['username']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function update_data_pencairan()
    {
        $query = "UPDATE tbl_rc_permohonan SET 
                jenis_permohonan_pencairan_sebelum_jt_approval = :jenis_permohonan_pencairan_sebelum_jt_approval,
                keterangan_approval = :keterangan_approval,
                status_permohonan = :status_permohonan,
                tgl_pending = :tgl_pending,
                tgl_approval = :tgl_approval,
                username_approval = :username_approval
                WHERE id_permohonan = :id_permohonan";
        $this->db->query($query);
        $this->db->bind('id_permohonan', $_POST['id_permohonan']);
        $this->db->bind('jenis_permohonan_pencairan_sebelum_jt_approval', $_POST['approval']);
        $this->db->bind('keterangan_approval', $_POST['ket_approval']);
        $this->db->bind('status_permohonan', $_POST['status_permohonan']);
        $this->db->bind('tgl_approval', $_POST['tgl_approval']);
        $this->db->bind('tgl_pending',  $_POST['tgl_pending']);
        $this->db->bind('username_approval', $_POST['username']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function tambah_data_rekomendasi()
    {
        $query = "UPDATE tbl_rc_permohonan SET 
                user_verifikator = :user_verifikator,
                rekomendasi_pejabat_cabang = :rekomendasi_pejabat_cabang,
                tgl_verifikasi = :tgl_verifikasi,
                status_permohonan = :status_permohonan
                WHERE id_permohonan = :id_permohonan";
        $this->db->query($query);
        $this->db->bind('id_permohonan', $_POST['id_permohonan']);
        $this->db->bind('user_verifikator', $_POST['user_verifikator']);
        $this->db->bind('rekomendasi_pejabat_cabang', $_POST['rekomendasi_pejabat']);
        $this->db->bind('tgl_verifikasi', $_POST['tgl_verifikasi']);
        $this->db->bind('status_permohonan', $_POST['status_permohonan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function tambah_rekomendasi_suku_bunga()
    {
        $query = "UPDATE tbl_rc_permohonan SET 
                user_verifikator = :user_verifikator,
                rekomendasi_pejabat_cabang = :rekomendasi_pejabat_cabang,
                tgl_verifikasi = :tgl_verifikasi,
                status_permohonan = :status_permohonan
                WHERE id_permohonan = :id_permohonan";
        $this->db->query($query);
        $this->db->bind('id_permohonan', $_POST['id_permohonan']);
        $this->db->bind('user_verifikator', $_POST['user_verifikator']);
        $this->db->bind('rekomendasi_pejabat_cabang', $_POST['rekomendasi_pejabat']);
        $this->db->bind('tgl_verifikasi', $_POST['tgl_verifikasi']);
        $this->db->bind('status_permohonan', $_POST['status_permohonan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cek_btn_reject()
    {
        $this->db->query('SELECT * FROM tbl_rc_permohonan WHERE id_permohonan = :id_permohonan');
        $this->db->bind('id_permohonan', $_POST['id_permohonan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    //untuk button ditolak form approval pencairan
    public function reject()
    {
        $query = "UPDATE tbl_rc_permohonan SET 
                jenis_permohonan_pencairan_sebelum_jt_approval = :jenis_permohonan_pencairan_sebelum_jt_approval,
                keterangan_approval = :keterangan_approval,
                status_permohonan = :status_permohonan,
                tgl_approval = :tgl_approval,
                username_approval = :username_approval
                WHERE id_permohonan = :id_permohonan";
        $this->db->query($query);
        $this->db->bind('id_permohonan', $_POST['id_permohonan']);
        $this->db->bind('jenis_permohonan_pencairan_sebelum_jt_approval', $_POST['approval']);
        $this->db->bind('keterangan_approval', $_POST['ket_approval']);
        $this->db->bind('status_permohonan', $_POST['status_permohonan']);
        $this->db->bind('tgl_approval', $_POST['tgl_approval']);
        $this->db->bind('username_approval', $_POST['username']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function reject_suku_bunga()
    {
        $query = "UPDATE tbl_rc_permohonan SET 
                nilai_suku_bunga_approval = :nilai_suku_bunga_approval,
                keterangan_approval = :keterangan_approval,
                status_permohonan = :status_permohonan,
                tgl_approval = :tgl_approval,
                username_approval = :username_approval
                WHERE id_permohonan = :id_permohonan";
        $this->db->query($query);
        $this->db->bind('id_permohonan', $_POST['id_permohonan']);
        $this->db->bind('nilai_suku_bunga_approval', $_POST['approval']);
        $this->db->bind('keterangan_approval', $_POST['ket_approval']);
        $this->db->bind('status_permohonan', $_POST['status_permohonan']);
        $this->db->bind('tgl_approval', $_POST['tgl_approval']);
        $this->db->bind('username_approval', $_POST['username']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function pending_suku_bunga()
    {
        $query = "UPDATE tbl_rc_permohonan SET 
                nilai_suku_bunga_approval = :nilai_suku_bunga_approval,
                keterangan_approval = :keterangan_approval,
                status_permohonan = :status_permohonan,
                tgl_approval = :tgl_approval,
                username_approval = :username_approval
                WHERE id_permohonan = :id_permohonan";
        $this->db->query($query);
        $this->db->bind('id_permohonan', $_POST['id_permohonan']);
        $this->db->bind('nilai_suku_bunga_approval', $_POST['approval']);
        $this->db->bind('keterangan_approval', $_POST['ket_approval']);
        $this->db->bind('status_permohonan', $_POST['status_permohonan']);
        $this->db->bind('tgl_approval', $_POST['tgl_approval']);
        $this->db->bind('username_approval', $_POST['username']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function pending_pencairan()
    {
        $query = "UPDATE tbl_rc_permohonan SET 
                jenis_permohonan_pencairan_sebelum_jt_approval = :jenis_permohonan_pencairan_sebelum_jt_approval,
                keterangan_approval = :keterangan_approval,
                status_permohonan = :status_permohonan,
                tgl_approval = :tgl_approval,
                username_approval = :username_approval
                WHERE id_permohonan = :id_permohonan";
        $this->db->query($query);
        $this->db->bind('id_permohonan', $_POST['id_permohonan']);
        $this->db->bind('jenis_permohonan_pencairan_sebelum_jt_approval', $_POST['approval']);
        $this->db->bind('keterangan_approval', $_POST['ket_approval']);
        $this->db->bind('status_permohonan', $_POST['status_permohonan']);
        $this->db->bind('tgl_approval', $_POST['tgl_approval']);
        $this->db->bind('username_approval', $_POST['username']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function update_status()
    {
        $query = "UPDATE tbl_rc_permohonan SET 
        nilai_suku_bunga_approval = :nilai_suku_bunga_approval,
        keterangan_approval = :keterangan_approval,
        status_permohonan = :status_permohonan,
        username_approval = :username_approval,
        tgl_approval = :tgl_approval
        WHERE id_permohonan = :id_permohonan";
        $this->db->query($query);
        $this->db->bind('id_permohonan', $_POST['id_permohonan']);
        $this->db->bind('nilai_suku_bunga_approval', $_POST['suku_bunga_approval']);
        $this->db->bind('keterangan_approval', $_POST['keterangan_approval']);
        $this->db->bind('username_approval', $_POST['nama_approval']);
        $this->db->bind('status_permohonan', 'DITOLAK');
        $this->db->bind('tgl_approval', date("Y-m-d H:i:s"));
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function cek_pass_approval()
    {
        $username_komite = $_POST['username_komite'];
        $password_komite = $_POST['password_komite'];

        $this->db->query('SELECT * FROM tbl_user WHERE username=:username');
        $this->db->bind('username', $username_komite);

        $pass_komite = $this->db->single();

        if ($pass_komite && password_verify($password_komite, $pass_komite['pin'])) {
            return 'sukses';
        } else {
            return "pass_approval_salah";
        }
    }

    public function cek_status_tbl_permohonan()
    {

        $this->db->query('SELECT id_permohonan, status_permohonan from tbl_rc_permohonan where id_permohonan =:id_permohonan');
        $this->db->bind('id_permohonan', $_POST['id_permohonan']);
        return $this->db->single();
    }

    // belum berfungsi 
    public function cari_data_permintaan()
    {
        $this->db->query('SELECT * from tbl_rc_permohonan where tgl_permohonan >= :tgl_awal AND tgl_permohonan <= :tgl_akhir ');
        $this->db->bind('tgl_awal', $_POST['dari']);
        $this->db->bind('tgl_akhir', $_POST['ke']);
        return $this->db->single();
    }

    // public function get_daftar_permohonan()
    // {
    //     if ($_COOKIE['tipe_komite'] == 'PUSAT') {
    //         // $this->db->query("SELECT  id_permohonan, jenis_permohonan, tgl_permohonan, nama_nasabah, jenis_produk, nominal, status_permohonan FROM tbl_rc_permohonan WHERE date(tgl_permohonan) >= :tgl_awal AND date(tgl_permohonan) <= :tgl_akhir");
    //         $this->db->query('SELECT  id_permohonan, jenis_permohonan, tgl_permohonan, nama_nasabah, jenis_produk, nominal,tgl_approval, status_permohonan FROM tbl_rc_permohonan WHERE date(tgl_approval) >= :tgl_awal AND date(tgl_approval) <= :tgl_akhir AND (status_permohonan ="DISETUJUI" OR status_permohonan ="DITOLAK" OR status_permohonan ="DILANJUTKAN" OR status_permohonan ="TELAH DIPROSES") ORDER BY tgl_approval DESC');
    //         $this->db->bind('tgl_awal', $_POST['tanggal_awal']);
    //         $this->db->bind('tgl_akhir', $_POST['tanggal_akhir']);
    //         return $this->db->resultSet();
    //     }else{
    //         // $this->db->query("SELECT  id_permohonan, jenis_permohonan, tgl_permohonan, nama_nasabah, jenis_produk, nominal, status_permohonan FROM tbl_rc_permohonan WHERE date(tgl_permohonan) >= :tgl_awal AND date(tgl_permohonan) <= :tgl_akhir");
    //         $this->db->query('SELECT  id_permohonan, jenis_permohonan, tgl_permohonan, nama_nasabah, jenis_produk, nominal,tgl_approval, status_permohonan FROM tbl_rc_permohonan WHERE date(tgl_approval) >= :tgl_awal AND date(tgl_approval) <= :tgl_akhir AND (status_permohonan ="DISETUJUI" OR status_permohonan ="DITOLAK" OR status_permohonan ="DILANJUTKAN" OR status_permohonan ="TELAH DIPROSES") AND kantor_cabang = :kantor_cabang  ORDER BY date(tgl_approval) DESC');
    //         $this->db->bind('tgl_awal', $_POST['tanggal_awal']);
    //         $this->db->bind('tgl_akhir', $_POST['tanggal_akhir']);
    //         $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
    //         return $this->db->resultSet();
    //     }
    // }
    // public function get_daftar_permohonan()
    // {
    //     if ($_COOKIE['kd_jabatan'] == 'DIR') {
    //         // $this->db->query('SELECT * FROM tbl_rc_permohonan Where (username_approval = :username_approval AND status_permohonan !="Diajukan" OR status_permohonan !="DIPENDING")  OR status_permohonan !="Diajukan Ulang"');
    //         $this->db->query('SELECT id_permohonan, jenis_permohonan, tgl_permohonan, nama_nasabah, jenis_produk, nominal, status_permohonan FROM tbl_rc_permohonan WHERE (status_permohonan ="DISETUJUI" OR status_permohonan ="DITOLAK" OR status_permohonan ="DILANJUTKAN" OR status_permohonan ="TELAH DIPROSES") AND date(tgl_permohonan) >= :tgl_awal AND date(tgl_permohonan) <= :tgl_akhir"');
    //         $this->db->bind('tgl_awal', $_POST['tanggal_awal']);
    //         $this->db->bind('tgl_akhir', $_POST['tanggal_akhir']);
    //         return $this->db->resultSet();
    //     } else if ($_COOKIE['kd_jabatan'] == 'BM' || $_COOKIE['kd_jabatan'] == 'BAM' || $_COOKIE['kd_jabatan'] == 'AM') {
    //         if ($_COOKIE['nama_cabang'] == "CABANG UTAMA") {
    //             $this->db->query('SELECT id_permohonan, jenis_permohonan, tgl_permohonan, nama_nasabah, jenis_produk, nominal, status_permohonan FROM tbl_rc_permohonan WHERE (status_permohonan ="DISETUJUI" OR status_permohonan ="DITOLAK" OR status_permohonan ="DILANJUTKAN" OR status_permohonan ="TELAH DIPROSES") AND date(tgl_permohonan) >= :tgl_awal AND date(tgl_permohonan) <= :tgl_akhir" AND (kantor_cabang = :kantor_cabang OR kantor_cabang = :kantor_cabang1)');
    //             $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
    //             $this->db->bind('kantor_cabang1', "KANTOR KAS");
    //             $this->db->bind('tgl_awal', $_POST['tanggal_awal']);
    //             $this->db->bind('tgl_akhir', $_POST['tanggal_akhir']);
    //             return $this->db->resultSet();
    //         }else{
    //             $this->db->query('SELECT id_permohonan, jenis_permohonan, tgl_permohonan, nama_nasabah, jenis_produk, nominal, status_permohonan FROM tbl_rc_permohonan WHERE (status_permohonan ="DISETUJUI" OR status_permohonan ="DITOLAK" OR status_permohonan ="DILANJUTKAN" OR status_permohonan ="TELAH DIPROSES") AND date(tgl_permohonan) >= :tgl_awal AND date(tgl_permohonan) <= :tgl_akhir" AND kantor_cabang = :kantor_cabang');
    //             $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
    //             $this->db->bind('tgl_awal', $_POST['tanggal_awal']);
    //             $this->db->bind('tgl_akhir', $_POST['tanggal_akhir']);
    //             return $this->db->resultSet();
    //         }
    //     } else {
    //         $this->db->query('SELECT * FROM tbl_rc_permohonan Where jenis_permohonan = "SUKU BUNGA KHUSUS" AND (status_permohonan ="Disetujui" OR status_permohonan ="DITOLAK" OR status_permohonan ="DILANJUTKAN" OR status_permohonan ="TELAH DIPROSES") AND username_approval = :username_approval AND kantor_cabang = :kantor_cabang AND date(tgl_permohonan) >= :tgl_awal AND date(tgl_permohonan) <= :tgl_akhir" ');
    //         $this->db->bind('username_approval', $_COOKIE['username']);
    //         $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
    //         $this->db->bind('tgl_awal', $_POST['tanggal_awal']);
    //         $this->db->bind('tgl_akhir', $_POST['tanggal_akhir']);
    //         return $this->db->resultSet();
    //     }
    // }

    public function get_daftar_permohonan()
    {
        if ($_COOKIE['kd_jabatan'] == 'DIR') {
            $this->db->query('SELECT id_permohonan, jenis_permohonan, tgl_permohonan, nama_nasabah, jenis_produk, nominal, status_permohonan FROM tbl_rc_permohonan WHERE (status_permohonan ="DISETUJUI" OR status_permohonan ="DITOLAK" OR status_permohonan ="DILANJUTKAN" OR status_permohonan ="TELAH DIPROSES") AND date(tgl_permohonan) >= :tgl_awal AND date(tgl_permohonan) <= :tgl_akhir');
            $this->db->bind('tgl_awal', $_POST['tanggal_awal']);
            $this->db->bind('tgl_akhir', $_POST['tanggal_akhir']);
            return $this->db->resultSet();
        } else if ($_COOKIE['kd_jabatan'] == 'BM' || $_COOKIE['kd_jabatan'] == 'BAM' || $_COOKIE['kd_jabatan'] == 'AM') {
            if ($_COOKIE['nama_cabang'] == "CABANG UTAMA") {
                $this->db->query('SELECT id_permohonan, jenis_permohonan, tgl_permohonan, nama_nasabah, jenis_produk, nominal, status_permohonan FROM tbl_rc_permohonan WHERE (status_permohonan ="DISETUJUI" OR status_permohonan ="DITOLAK" OR status_permohonan ="DILANJUTKAN" OR status_permohonan ="TELAH DIPROSES") AND date(tgl_permohonan) >= :tgl_awal AND date(tgl_permohonan) <= :tgl_akhir AND (kantor_cabang = :kantor_cabang OR kantor_cabang = :kantor_cabang1)');
                $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
                $this->db->bind('kantor_cabang1', "KANTOR KAS");
                $this->db->bind('tgl_awal', $_POST['tanggal_awal']);
                $this->db->bind('tgl_akhir', $_POST['tanggal_akhir']);
                return $this->db->resultSet();
            } else {
                $this->db->query('SELECT id_permohonan, jenis_permohonan, tgl_permohonan, nama_nasabah, jenis_produk, nominal, status_permohonan FROM tbl_rc_permohonan WHERE (status_permohonan ="DISETUJUI" OR status_permohonan ="DITOLAK" OR status_permohonan ="DILANJUTKAN" OR status_permohonan ="TELAH DIPROSES") AND date(tgl_permohonan) >= :tgl_awal AND date(tgl_permohonan) <= :tgl_akhir AND kantor_cabang = :kantor_cabang');
                $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
                $this->db->bind('tgl_awal', $_POST['tanggal_awal']);
                $this->db->bind('tgl_akhir', $_POST['tanggal_akhir']);
                return $this->db->resultSet();
            }
        } else {
            $this->db->query('SELECT id_permohonan, jenis_permohonan, tgl_permohonan, nama_nasabah, jenis_produk, nominal, status_permohonan FROM tbl_rc_permohonan WHERE (status_permohonan ="Disetujui" OR status_permohonan ="DITOLAK" OR status_permohonan ="DILANJUTKAN" OR status_permohonan ="TELAH DIPROSES") AND date(tgl_permohonan) >= :tgl_awal AND date(tgl_permohonan) <= :tgl_akhir AND kantor_cabang = :kantor_cabang' );
            $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
            $this->db->bind('tgl_awal', $_POST['tanggal_awal']);
            $this->db->bind('tgl_akhir', $_POST['tanggal_akhir']);
            return $this->db->resultSet();
        }
    }
}
