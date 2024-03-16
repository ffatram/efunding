<?php

class m_admin
{
    public function __construct()
    {
        $this->db = new Database;
    }


    public function tambah_cabang($data)
    {


        $query = "INSERT INTO tbl_cabang VALUES('',:kode_cabang, :nama_cabang, :alamat, :kota, :telephone)";
        // date_default_timezone_set('Asia/Makassa r');
        // $dibuat = date('Y-m-d H:i:s');
        // $diubah = '00-00-0000 00:00:00';

        $this->db->query($query);



        $kode_cabang = $_POST['kode_cabang'];
        $nama_cabang = $_POST['nama_cabang'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];
        $telephone = $_POST['telephone'];




        $this->db->bind('kode_cabang', $kode_cabang);
        $this->db->bind('nama_cabang', $nama_cabang);
        $this->db->bind('alamat', $alamat);
        $this->db->bind('kota', $kota);
        $this->db->bind('telephone', $telephone);
        $this->db->execute();
        return $this->db->rowCount();
    }




    public function lihat_cabang()
    {
        $this->db->query('SELECT * FROM tbl_cabang');
        return $this->db->resultSet();
    }

    public function lihat_cabang_id()
    {
        $id = $_POST['btn_edit'];

        $this->db->query('SELECT * FROM tbl_cabang WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function update_cabang_id()
    {

        $id             = $_POST['id'];
        $kode_cabang    = $_POST['kode_cabang'];
        $nama_cabang    = $_POST['nama_cabang'];
        $alamat         = $_POST['alamat'];
        $kota           = $_POST['kota'];
        $telephone      = $_POST['telephone'];


        $query = "UPDATE tbl_cabang SET kode_cabang =:kode_cabang, nama_cabang=:nama_cabang, alamat=:alamat, kota=:kota, telephone=:telephone WHERE id= :id";
        date_default_timezone_set('Asia/Makassar');
        $diubah = date('Y-m-d H:i:s');
        $this->db->query($query);

        $this->db->bind('id', $id);
        $this->db->bind('kode_cabang', $kode_cabang);
        $this->db->bind('nama_cabang', $nama_cabang);
        $this->db->bind('alamat', $alamat);
        $this->db->bind('kota', $kota);
        $this->db->bind('telephone', $telephone);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function delete_cabang_id()
    {
        $id             = $_POST['id'];

        $query = "DELETE FROM tbl_cabang WHERE id= :id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function tambah_user()
    {

        $username       = $_POST['username'];
        // $password       = $_POST['password'];
        $password_default = "bhm123";
        $password         = "bhm123";

        $nama_lengkap   = $_POST['nama_lengkap'];
        $level          = $_POST['level'];
        $kode_cabang    = $_POST['kode_cabang'];


        $query = "INSERT INTO tbl_user (username,password_default, password,nama_lengkap,level,kode_cabang) VALUES( :username, :password_default, :password, :nama_lengkap, :level, :kode_cabang)";
        // date_default_timezone_set('Asia/Makassa r');
        // $dibuat = date('Y-m-d H:i:s');
        // $diubah = '00-00-0000 00:00:00';


        $this->db->query($query);
        $password = password_hash($password, PASSWORD_DEFAULT);

        $this->db->bind('username', $username);
        $this->db->bind('password_default', $password_default);
        $this->db->bind('password', $password);
        $this->db->bind('nama_lengkap', $nama_lengkap);
        $this->db->bind('level', $level);
        $this->db->bind('kode_cabang', $kode_cabang);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function lihat_user()
    {
        $this->db->query('SELECT a.*, b.nama_cabang from tbl_user a INNER JOIN tbl_cabang b ON a.kode_cabang = b.kode_cabang ORDER BY a.username ASC');
        return $this->db->resultSet();
    }

    public function lihat_user_id()
    {

        $id = $_POST['id_user'];

        $this->db->query('SELECT * FROM tbl_user WHERE id_user = :id_user');
        $this->db->bind('id_user', $id);
        return $this->db->single();
    }



    public function update_user_id()
    {

        $id_user             = $_POST['id_user'];
        $username            = $_POST['username'];
        $password            = $_POST['password'];
        $nama_lengkap        = $_POST['nama_lengkap'];
        $level               = $_POST['level'];
        $kode_cabang         = $_POST['kode_cabang'];




        $query = "UPDATE tbl_user SET username =:username, password=:password, nama_lengkap=:nama_lengkap,  level=:level, kode_cabang=:kode_cabang WHERE id_user= :id_user";
        date_default_timezone_set('Asia/Makassar');
        $diubah = date('Y-m-d H:i:s');
        $this->db->query($query);

        $this->db->bind('id_user', $id_user);
        $this->db->bind('username', $username);
        $this->db->bind('password', $password);
        $this->db->bind('nama_lengkap', $nama_lengkap);
        $this->db->bind('level', $level);
        $this->db->bind('kode_cabang', $kode_cabang);
        $this->db->execute();
        return $this->db->rowCount();
    }
a
    public function delete_user_id()
    {
        $id             = $_POST['id_user'];

        $query = "DELETE FROM tbl_user WHERE id_user= :id_user";

        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function reset_user_id()
    {
        $id             = $_POST['id_user'];
        $password_reset = "bhm123";

        $query = "UPDATE tbl_user SET password = :password WHERE id_user= :id_user";
        
        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->bind('password', $password_reset);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
