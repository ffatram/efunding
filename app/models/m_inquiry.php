<?php

class m_inquiry
{
    public function __construct()
    {
        $this->db = new Database;
    }

    public function lihat_data()
    {
        $this->db->query('SELECT nama_nasabah,kantor_cabang,tgl_permohonan FROM tbl_rc_permohonan');
        return $this->db->resultSet();
    }

    public function data_cabang()
    {
        $this->db->query('SELECT * FROM tbl_cabang');
        return $this->db->resultSet();
    }

    public function lihat_data_periode()
    {
        $this->db->query('SELECT * FROM tbl_rc_permohonan where tgl_permohonan between = :tgl_awal and =: tgl_akhir');
        $this->db->bind('tgl_awal', $_POST['dari']);
        $this->db->bind('tgl_akhir', $_POST['ke']);
        return $this->db->resultSet();
    }
    public function jumlah_data_permohonan_pencairan()
    {
        $this->db->query('SELECT COUNT(*) as jumlah_data_pencairan from tbl_rc_permohonan where jenis_permohonan="PENCAIRAN SEBELUM JATUH TEMPO" AND status_permohonan != "DIBATALKAN"');
        return $this->db->single();
    }
    public function jumlah_data_permohonan_suku_bunga()
    {
        $this->db->query('SELECT COUNT(*) as jumlah_data_suku_bunga from tbl_rc_permohonan where jenis_permohonan="SUKU BUNGA KHUSUS" AND status_permohonan != "DIBATALKAN"');
        return $this->db->single();
    }

    public function jumlah_data_disetujui()
    {
        $this->db->query('SELECT COUNT(*) as jumlah_data_disetujui from tbl_rc_permohonan where status_permohonan="DISETUJUI" OR status_permohonan="Dilanjutkan" OR status_permohonan="Telah Diproses"');
        return $this->db->single();
    }

    public function jumlah_data_ditolak()
    {
        $this->db->query('SELECT COUNT(*) as jumlah_data_ditolak from tbl_rc_permohonan where status_permohonan="DITOLAK"');
        return $this->db->single();
    }

    public function jumlah_data_permohonan()
    {
        $this->db->query('SELECT COUNT(*) as jumlah_data_permohonan from tbl_rc_permohonan where status_permohonan="DIAJUKAN" OR status_permohonan ="Diajukan Ulang" OR status_permohonan ="Dipending"');
        return $this->db->single();
    }

    public function modal_detail()
    {
        $this->db->query('SELECT * FROM tbl_rc_permohonan WHERE id_permohonan = :id_permohonan');
        $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
        return $this->db->single();
    }

    public function modal_log()
    {
        $this->db->query('SELECT A.*, B.nama_nasabah, C.* FROM tbl_rc_log A JOIN tbl_rc_permohonan B ON A.id_permohonan = B.id_permohonan JOIN tbl_rc_ref_log C ON A.id_log = C.id WHERE A.id_permohonan =:id_permohonan ORDER BY A.update_date ASC ');
        $this->db->bind('id_permohonan', $_POST['id_permohonan']);
        return $this->db->resultSet();
    }

    public function get_daftar_permohonan()
    {
        // $this->db->query("SELECT  id_permohonan, jenis_permohonan, tgl_permohonan, nama_nasabah, jenis_produk, nominal, status_permohonan FROM tbl_rc_permohonan WHERE date(tgl_permohonan) >= :tgl_awal AND date(tgl_permohonan) <= :tgl_akhir");
        $this->db->query("SELECT  id_permohonan, jenis_permohonan, tgl_permohonan, nama_nasabah, jenis_produk, nominal, status_permohonan FROM tbl_rc_permohonan WHERE date(tgl_permohonan) >= :tgl_awal AND date(tgl_permohonan) <= :tgl_akhir");
        $this->db->bind('tgl_awal', $_POST['tanggal_awal']);
        $this->db->bind('tgl_akhir', $_POST['tanggal_akhir']);
        return $this->db->resultSet();
    }

    public function cetak_permohonan($startDate, $endDate, $branch)
    {
        $query = 'SELECT * FROM tbl_rc_permohonan WHERE tgl_permohonan BETWEEN :start_date AND :end_date AND kantor_cabang = :branch';
        $this->db->query($query);
        $this->db->bind(':start_date', $startDate);
        $this->db->bind(':end_date', $endDate);
        $this->db->bind(':branch', $branch);
        return $this->db->resultSet();
    }

    public function export_csv()
    {
        if ($_COOKIE['level'] == "INQUIRY") {
            $this->db->query('SELECT * FROM tbl_rc_permohonan WHERE tgl_permohonan >= :dari_tanggal  AND tgl_permohonan <= :sampai_tanggal AND kantor_cabang =:kantor_cabang');
            $this->db->bind('dari_tanggal', $_POST['dari_tanggal']);
            $this->db->bind('sampai_tanggal', $_POST['sampai_tanggal']);
            $this->db->bind('kantor_cabang', $_POST['kode_cabang']);
            return $this->db->resultSet();
        }
    }
    // public function export_csv_all()
    // {
    //     if ($_COOKIE['level'] == "INQUIRY" ){
    //         $this->db->query('SELECT * FROM tbl_rc_permohonan WHERE tgl_permohonan >= :dari_tanggal  AND tgl_permohonan <= :sampai_tanggal');
    //         $this->db->bind('dari_tanggal', $_POST['dari_tanggal']);
    //         $this->db->bind('sampai_tanggal', $_POST['sampai_tanggal']);
    //         return $this->db->resultSet();
    //     }
    // }
    public function export_csv_all()
    {
        // Pastikan kuki 'level' ada sebelum mencoba mengaksesnya
        if (isset($_COOKIE['level']) && $_COOKIE['level'] == "INQUIRY") {
            // Pastikan tanggal yang diberikan ada sebelum menggunakannya
            if (isset($_POST['dari_tanggal']) && isset($_POST['sampai_tanggal'])) {
                $this->db->query('SELECT * FROM tbl_rc_permohonan WHERE tgl_permohonan >= :dari_tanggal AND tgl_permohonan <= :sampai_tanggal');
                $this->db->bind('dari_tanggal', $_POST['dari_tanggal']);
                $this->db->bind('sampai_tanggal', $_POST['sampai_tanggal']);
                return $this->db->resultSet();
            } else {
                // Tanggal tidak diberikan, berikan respons atau lakukan sesuatu sesuai kebutuhan
                // Misalnya, Anda bisa melempar suatu exception atau memberikan pesan kesalahan
                // tergantung pada kebutuhan aplikasi Anda.
                return null; // Atau lakukan sesuatu yang sesuai dengan logika aplikasi Anda
            }
        } else {
            // Level tidak sesuai, berikan respons atau lakukan sesuatu sesuai kebutuhan
            // Misalnya, Anda bisa melempar suatu exception atau memberikan pesan kesalahan
            // tergantung pada kebutuhan aplikasi Anda.
            return null; // Atau lakukan sesuatu yang sesuai dengan logika aplikasi Anda
        }
    }
}
