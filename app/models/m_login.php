<?php

class m_login
{
    public function __construct()
    {
        $this->db = new Database;
    }


    public function cek_login()
    {
        $username = $_POST['username'];

        $password = $_POST['password'];
        // $query = "SELECT * FROM tbl_user a  INNER JOIN tbl_cabang b ON a.kode_cabang = b.kode_cabang WHERE a.username = :username";
        $query = "SELECT * FROM tbl_user a INNER JOIN tbl_cabang b ON a.kode_cabang = b.kode_cabang INNER JOIN tbl_rc_jabatan c ON a.kd_jabatan = c.kd_jabatan WHERE a.username = :username";
        $this->db->query($query);
        $this->db->bind('username', $username);

        $data = $this->db->single();



        if ($data && password_verify($password, $data['password'])) {

            if ($data && password_verify("bhm123", $data['password'])) {
                setcookie('username', $username, time() + (60 * 60 * 60), '/');
                return "ubah_password";
            } else {
                return $data;
            }
        } else {
            return "login_gagal";
        }
    }

    public function cek_ubah_password()
    {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT * FROM tbl_user a  INNER JOIN tbl_cabang b ON a.kode_cabang = b.kode_cabang WHERE a.username = :username";
        $this->db->query($query);
        $this->db->bind('username', $username);

        $data = $this->db->single();

        if ($data && password_verify($password, $data['password'])) {
            return $data;
        } else {
            return "salah";
        }
    }




    public function cek_ubah_pin()
    {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT * FROM tbl_user a  INNER JOIN tbl_cabang b ON a.kode_cabang = b.kode_cabang WHERE a.username = :username";
        $this->db->query($query);
        $this->db->bind('username', $username);

        $data = $this->db->single();

        if ($data && password_verify($password, $data['pin'])) {
            return $data;
        } else {
            return "salah";
        }
    }




    public function set_ubah_password()
    {
        $query = "UPDATE tbl_user SET 
        password = :password
        WHERE username= :username";
        $this->db->query($query);
        $this->db->bind('username', $_POST['username']);
        $this->db->bind('password', $_POST['password']);
        $this->db->execute();
        return $this->db->rowCount();
    }


    public function set_ubah_pin()
    {




        $query = "UPDATE tbl_user SET 
        pin = :pin
        WHERE username= :username";
        $this->db->query($query);
        $this->db->bind('username', $_POST['username']);
        $this->db->bind('pin', $_POST['password']);
        $this->db->execute();
        return $this->db->rowCount();
    }


    public function cek_login_pass_default()
    {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT * FROM tbl_user a  INNER JOIN tbl_cabang b ON a.kode_cabang = b.kode_cabang WHERE a.username = :username";
        $this->db->query($query);
        $this->db->bind('username', $username);

        $data = $this->db->single();

        $password_default = password_verify($password, $data['password']);




        if ($data && password_verify($password, $data['password'])) {
            return $data;
        } else {
            return "login_gagal";
        }
    }



    public function cek_pin_komite()
    {





        $username = $_POST['username'];
        $query = "SELECT * FROM tbl_user WHERE username = :username";
        $this->db->query($query);
        $this->db->bind('username', $username);
        $data = $this->db->single();

        if ($data && password_verify("bhm123", $data['pin'])) {
            return "pin_sama";
        } else {
            return "pin_beda";
        }
    }
}
