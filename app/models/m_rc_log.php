<?php

date_default_timezone_set('Asia/Makassar');

class m_rc_log
{

    public function __construct()
    {
        $this->db = new Database;
    }


    public function simpan_pemohon()
    {
        $query = "INSERT INTO tbl_rc_log (id_permohonan,nama_pemohon,kode_cabang,id_log,username,update_date) VALUES(:id_permohonan, :nama_pemohon, :kode_cabang,:id_log,:username,:update_date)";
        $this->db->query($query);
        $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
        $this->db->bind('id_log', "1");
        $this->db->bind('username', $_COOKIE['username']);
        $this->db->bind('nama_pemohon', $_POST['nama_nasabah']);
        $this->db->bind('kode_cabang', $_COOKIE['kode_cabang']);
        $this->db->bind('update_date', date('Y-m-d H:i:s'));
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function update_pemohon()
    {
        $query = "INSERT INTO tbl_rc_log (id_permohonan,nama_pemohon,kode_cabang,id_log,username,update_date) VALUES(:id_permohonan, :nama_pemohon, :kode_cabang,:id_log,:username,:update_date)";
        $this->db->query($query);
        $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
        $this->db->bind('id_log', "2");
        $this->db->bind('username', $_COOKIE['username']);
        $this->db->bind('nama_pemohon', $_POST['nama_nasabah']);
        $this->db->bind('kode_cabang', $_COOKIE['kode_cabang']);
        $this->db->bind('update_date', date('Y-m-d H:i:s'));
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapus_pemohon()
    {
        $query = "INSERT INTO tbl_rc_log (id_permohonan,nama_pemohon,kode_cabang,id_log,username,update_date) VALUES(:id_permohonan, :nama_pemohon, :kode_cabang,:id_log,:username,:update_date)";
        $this->db->query($query);
        $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
        $this->db->bind('id_log', "3");
        $this->db->bind('username', $_COOKIE['username']);
        $this->db->bind('nama_pemohon', $_POST['nama_nasabah']);
        $this->db->bind('kode_cabang', $_COOKIE['kode_cabang']);
        $this->db->bind('update_date', date('Y-m-d H:i:s'));
        $this->db->execute();
        return $this->db->rowCount();
    }





    public function pending_pemohon()
    {

        $query = "INSERT INTO tbl_rc_log (id_permohonan,nama_pemohon,kode_cabang,id_log,username,update_date) VALUES(:id_permohonan, :nama_pemohon, :kode_cabang,:id_log,:username,:update_date)";
        $this->db->query($query);
        $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
        $this->db->bind('id_log', "4");
        $this->db->bind('username', $_COOKIE['username']);
        $this->db->bind('nama_pemohon', $_POST['nama_pemohon']);
        $this->db->bind('kode_cabang', $_COOKIE['kode_cabang']);
        $this->db->bind('update_date', date('Y-m-d H:i:s'));
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ajukan_ulang()
    {
        $query = "INSERT INTO tbl_rc_log (id_permohonan,nama_pemohon,kode_cabang,id_log,username,update_date) VALUES(:id_permohonan, :nama_pemohon, :kode_cabang,:id_log,:username,:update_date)";
        $this->db->query($query);
        $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
        $this->db->bind('id_log', "5");
        $this->db->bind('username', $_COOKIE['username']);
        $this->db->bind('nama_pemohon', $_POST['nama_nasabah']);
        $this->db->bind('kode_cabang', $_COOKIE['kode_cabang']);
        $this->db->bind('update_date', date('Y-m-d H:i:s'));
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function reject_pemohon()
    {
        $query = "INSERT INTO tbl_rc_log (id_permohonan, nama_pemohon,kode_cabang,id_log,username,update_date) VALUES(:id_permohonan, :nama_pemohon, :kode_cabang,:id_log,:username,:update_date)";
        $this->db->query($query);
        $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
        $this->db->bind('id_log', "6");
        $this->db->bind('username', $_COOKIE['username']);
        $this->db->bind('nama_pemohon', $_POST['nama_pemohon']);
        $this->db->bind('kode_cabang', $_COOKIE['kode_cabang']);
        $this->db->bind('update_date', date('Y-m-d H:i:s'));
        $this->db->execute();
        return $this->db->rowCount();
    }


    public function approve_pemohon()
    {
        $query = "INSERT INTO tbl_rc_log (id_permohonan,nama_pemohon,kode_cabang,id_log,username,update_date) VALUES(:id_permohonan, :nama_pemohon, :kode_cabang,:id_log,:username,:update_date)";
        $this->db->query($query);
        $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
        $this->db->bind('id_log', "7");
        $this->db->bind('username', $_COOKIE['username']);
        $this->db->bind('nama_pemohon', $_POST['nama_pemohon']);
        $this->db->bind('kode_cabang', $_COOKIE['kode_cabang']);
        $this->db->bind('update_date', date('Y-m-d H:i:s'));
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function lanjut_cs()
    {
        $query = "INSERT INTO tbl_rc_log (id_permohonan,nama_pemohon,kode_cabang,id_log,username,update_date) VALUES(:id_permohonan, :nama_pemohon, :kode_cabang,:id_log,:username,:update_date)";
        $this->db->query($query);
        $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
        $this->db->bind('id_log', "8");
        $this->db->bind('username', $_COOKIE['username']);
        $this->db->bind('nama_pemohon', $_POST['nama_pemohon']);
        $this->db->bind('kode_cabang', $_COOKIE['kode_cabang']);
        $this->db->bind('update_date', date('Y-m-d H:i:s'));
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function proses_cbs()
    {
        $query = "INSERT INTO tbl_rc_log (id_permohonan,nama_pemohon,kode_cabang,id_log,username,update_date) VALUES(:id_permohonan, :nama_pemohon, :kode_cabang,:id_log,:username,:update_date)";
        $this->db->query($query);
        $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
        $this->db->bind('id_log', "9");
        $this->db->bind('username', $_COOKIE['username']);
        $this->db->bind('nama_pemohon', $_POST['nama_pemohon']);
        $this->db->bind('kode_cabang', $_COOKIE['kode_cabang']);
        $this->db->bind('update_date', date('Y-m-d H:i:s'));
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cetak_formulir()
    {
        $query = "INSERT INTO tbl_rc_log (id_permohonan,nama_pemohon,kode_cabang,id_log,username,update_date) VALUES(:id_permohonan, :nama_pemohon, :kode_cabang,:id_log,:username,:update_date)";
        $this->db->query($query);
        $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
        $this->db->bind('id_log', "10");
        $this->db->bind('username', $_COOKIE['username']);
        $this->db->bind('nama_pemohon', $_POST['nama_pemohon']);
        $this->db->bind('kode_cabang', $_COOKIE['kode_cabang']);
        $this->db->bind('update_date', date('Y-m-d H:i:s'));
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function tambah_user_baru()
    {
        $query = "INSERT INTO tbl_rc_log (nama_pemohon,kode_cabang,id_log,username,update_date) VALUES(:nama_pemohon, :kode_cabang, :id_log, :username, :update_date)";
        $this->db->query($query);
        // $this->db->bind('id_permohonan',  $_POST['id_user']);
        $this->db->bind('nama_pemohon', $_POST['nama_lengkap']);
        $this->db->bind('kode_cabang', $_COOKIE['kode_cabang']);
        $this->db->bind('id_log', "11");
        $this->db->bind('username', $_COOKIE['username']);
        $this->db->bind('update_date', date('Y-m-d H:i:s'));
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function edit_data_user()
    {
        $query = "INSERT INTO tbl_rc_log (id_permohonan,nama_pemohon,kode_cabang,id_log,username,update_date) VALUES(:id_permohonan, :nama_pemohon, :kode_cabang,:id_log,:username,:update_date)";
        $this->db->query($query);
        $this->db->bind('id_permohonan',  $_POST['id_user']);
        $this->db->bind('id_log', "12");
        $this->db->bind('username', $_COOKIE['username']);
        $this->db->bind('nama_pemohon', $_POST['nama_lengkap']);
        $this->db->bind('kode_cabang', $_COOKIE['kode_cabang']);
        $this->db->bind('update_date', date('Y-m-d H:i:s'));
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function reset_password()
    {
        $query = "INSERT INTO tbl_rc_log (id_permohonan,nama_pemohon,kode_cabang,id_log,username,update_date) VALUES(:id_permohonan, :nama_pemohon, :kode_cabang,:id_log,:username,:update_date)";
        $this->db->query($query);
        $this->db->bind('id_permohonan',  $_POST['id_user']);
        $this->db->bind('id_log', "13");
        $this->db->bind('username', $_COOKIE['username']);
        $this->db->bind('nama_pemohon', $_POST['nama_lengkap']);
        $this->db->bind('kode_cabang', $_COOKIE['kode_cabang']);
        $this->db->bind('update_date', date('Y-m-d H:i:s'));
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function hapus_data_user()
    {
        $query = "INSERT INTO tbl_rc_log (id_permohonan,nama_pemohon,kode_cabang,id_log,username,update_date) VALUES(:id_permohonan, :nama_pemohon, :kode_cabang,:id_log,:username,:update_date)";
        $this->db->query($query);
        $this->db->bind('id_permohonan',  $_POST['id_user']);
        $this->db->bind('nama_pemohon', $_POST['nama_lengkap']);
        $this->db->bind('kode_cabang', $_COOKIE['kode_cabang']);
        $this->db->bind('id_log', "14");
        $this->db->bind('username', $_COOKIE['username']);
        $this->db->bind('update_date', date('Y-m-d H:i:s'));
        $this->db->execute();
        return $this->db->rowCount();
    }
}
