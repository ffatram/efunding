<?php

class m_administrator
{
    public function __construct()
    {
        $this->db = new Database;
    }


    public function tampil_user()
    {
        $this->db->query('SELECT a.id_user, a.username, a.nama_lengkap, a.level,a.tipe_komite, a.kd_jabatan, a.kode_cabang,a.date_create, b.nama_cabang FROM tbl_user a INNER JOIN tbl_cabang b ON a.kode_cabang = b.kode_cabang  order by a.date_create DESC');
        return $this->db->resultSet();
    }
    public function level_user()
    {
        $this->db->query('SELECT * FROM tbl_ref_level_user order by level ASC');
        return $this->db->resultSet();
    }

    public function tampil_jabatan()
    {
        $this->db->query('SELECT * FROM tbl_rc_jabatan order by max_limit_dibawah_lps DESC');
        return $this->db->resultSet();
    }

    public function cabang()
    {
        $this->db->query('SELECT * FROM tbl_cabang order by kode_cabang ASC');
        return $this->db->resultSet();
    }



    public function jabatan()
    {
        $this->db->query('SELECT * FROM tbl_rc_jabatan order by kd_jabatan ASC');
        return $this->db->resultSet();
    }

    public function tipe_komite()
    {
        $this->db->query('SELECT * FROM tbl_ref_tipe_komite order by tipe_komite ASC');
        return $this->db->resultSet();
    }

    public function simpan_user()
    {

        $query = "INSERT INTO tbl_user
                (
                username,
                password_default,
                password,
                nama_lengkap,
                kd_jabatan,
                level,
                kode_cabang,
                tipe_komite,
                date_create
                ) 
                VALUES
                ( 
                :username,
                :password_default,
                :password,
                :nama_lengkap,
                :kd_jabatan,
                :level,
                :kode_cabang,
                :tipe_komite,
                :date_create
                )";


        $this->db->query($query);

        $this->db->bind('username',  $_POST['username']);
        $this->db->bind('password_default',  $_POST['password_default']);
        $this->db->bind('password',  $_POST['password']);
        $this->db->bind('nama_lengkap',  $_POST['nama_lengkap']);
        $this->db->bind('level',  $_POST['level']);
        $this->db->bind('kode_cabang',  $_POST['kode_cabang']);
        $this->db->bind('kd_jabatan',  $_POST['kd_jabatan']);
        $this->db->bind('tipe_komite',  $_POST['tipe_komite']);
        $this->db->bind('date_create',  date('Y-m-d H:i:s'));
        $this->db->execute();
        return $this->db->rowCount();
    }


    public function simpan_jabatan()
    {

        $query = "INSERT INTO tbl_rc_jabatan
                (
                kd_jabatan,
                nama_jabatan,
                suku_bunga_lps,
                max_limit_dibawah_lps,
                limit_min,
                limit_max
                ) 
                VALUES
                ( 
                :kd_jabatan,
                :nama_jabatan,
                :suku_bunga_lps,
                :max_limit_dibawah_lps,
                :limit_min,
                :limit_max
                )";


        $this->db->query($query);

        $this->db->bind('kd_jabatan',  $_POST['kd_jabatan']);
        $this->db->bind('nama_jabatan',  $_POST['nama_jabatan']);
        $this->db->bind('suku_bunga_lps',  $_POST['suku_bunga_lps']);
        $this->db->bind('max_limit_dibawah_lps',  $_POST['max_limit_lps']);
        $this->db->bind('limit_min',  $_POST['limit_min']);
        $this->db->bind('limit_max',  $_POST['limit_max']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function simpan_level()
    {
        $query = "INSERT INTO tbl_ref_level_user 
        (level)
        values
        (:level)";
        $this->db->query($query);

        $this->db->bind('level',  $_POST['level']);
        $this->db->execute();
        return $this->db->rowCount();
    }


    public function update_user()
    {
        $query = "UPDATE tbl_user SET
        username = :username,
        nama_lengkap = :nama_lengkap,
        level = :level,
        kode_cabang = :kode_cabang,
        tipe_komite = :tipe_komite,
        kd_jabatan = :kd_jabatan,
        date_create = :date_create
        WHERE id_user=:id_user";


        $this->db->query($query);
        $this->db->bind('id_user',  $_POST['id_user']);
        $this->db->bind('username',  $_POST['username']);
        $this->db->bind('nama_lengkap',  $_POST['nama_lengkap']);
        $this->db->bind('level',  $_POST['level']);
        $this->db->bind('kode_cabang',  $_POST['kode_cabang']);
        $this->db->bind('kd_jabatan',  $_POST['kd_jabatan']);
        $this->db->bind('tipe_komite',  $_POST['tipe_komite']);

        $this->db->bind('date_create',  date('Y-m-d H:i:s'));
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function update_jabatan()
    {
        $query = "UPDATE tbl_rc_jabatan SET
        nama_jabatan = :nama_jabatan,
        suku_bunga_lps = :suku_bunga_lps,
        max_limit_dibawah_lps = :max_limit_dibawah_lps,
        limit_min = :limit_min,
        limit_max = :limit_max
        WHERE kd_jabatan = :kd_jabatan";

        $this->db->query($query);
        $this->db->bind('kd_jabatan',  $_POST['kd_jabatan']);
        $this->db->bind('nama_jabatan',  $_POST['nama_jabatan']);
        $this->db->bind('suku_bunga_lps',  $_POST['suku_bunga_lps']);
        $this->db->bind('max_limit_dibawah_lps',  $_POST['max_limit_lps']);
        $this->db->bind('limit_min',  $_POST['limit_min']);
        $this->db->bind('limit_max',  $_POST['limit_max']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapus_user()
    {
        $query = "DELETE FROM tbl_user WHERE id_user= :id_user";
        $this->db->query($query);
        $this->db->bind('id_user', $_POST['id_user']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapus_jabatan()
    {
        $query = "DELETE FROM tbl_rc_jabatan WHERE kd_jabatan= :kd_jabatan";
        $this->db->query($query);
        $this->db->bind('kd_jabatan', $_POST['kd_jabatan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function reset_password()
    {

        $query = "UPDATE tbl_user SET
        password = :password
        WHERE id_user=:id_user";
        $this->db->query($query);
        $this->db->bind('id_user',  $_POST['id_user']);
        $this->db->bind('password',  $_POST['password']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
