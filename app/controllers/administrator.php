<?php


date_default_timezone_set('Asia/Makassar');
if (!isset($_SESSION['level'])) {
    header('Location:' . BASEURL . '/login');
    exit;
} elseif ($_SESSION['level'] !== 'ADMINISTRATOR') {
    header('Location:' . BASEURL . '/login');
    exit;
}

class administrator extends Controller
{


    public function index()
    {


        $this->view('administrator/v_beranda');
    }



    public function pengelolaan_user()
    {
        $data['tampil_user'] = $this->model('m_administrator')->tampil_user();
        $data['level_user']  = $this->model('m_administrator')->level_user();
        $data['cabang']      = $this->model('m_administrator')->cabang();
        $data['jabatan'] = $this->model('m_administrator')->jabatan();

        $data['tipe_komite'] = $this->model('m_administrator')->tipe_komite();

        $this->view('administrator/v_pengelolaan_user', $data);
    }

    public function tampil_tabel()
    {
        $data = $this->model('m_administrator')->tampil_user();
        $data['jabatan'] = $this->model('m_administrator')->jabatan();
        $data['tipe_komite'] = $this->model('m_administrator')->tipe_komite();
        $this->view('administrator/v_tabel_pengelolaan_user', $data);
    }

    public function data_level()
    {
        $data = $this->model('m_administrator')->level_user();
        $this->view('administrator/v_data_level', $data);
    }

    public function tampil_level()
    {
        $data = $this->model('m_administrator')->level_user();
        $this->view('administrator/v_tabel_pengelolaan_level', $data);
    }

    public function tampil_jabatan()
    {
        $data = $this->model('m_administrator')->tampil_jabatan();
        $this->view('administrator/v_tabel_pengelolaan_jabatan', $data);
    }
    public function data_jabatan()
    {
        $data = $this->model('m_administrator')->tampil_jabatan();
        $this->view('administrator/v_pengelolaan_jabatan', $data);
    }



    public function simpan_user()
    {

        // $_POST['id_user'] = $_POST['id_user'];
        $_POST['nama_lengkap'] = $_POST['nama_lengkap'];
        $pass = "bhm123";
        $_POST['password_default'] = $pass;
        $password = password_hash($pass, PASSWORD_DEFAULT);
        $_POST['password'] = $password;

        if ($_POST['level'] != 'KOMITE') {
            $_POST['tipe_kredit'] = '-';
            $_POST['tipe_komite'] = '-';
            $_POST['limit_direksi_awal']  = NULL;
            $_POST['limit_direksi_akhir'] = NULL;
        }

        $simpan = $this->model('m_administrator')->simpan_user($_POST);
        $simpan_pemohon = $this->model('m_rc_log')->tambah_user_baru($_POST);
        var_dump($_POST);
        // if ($simpan > 0) {
        if ($simpan > 0 && $simpan_pemohon > 0) {
            echo "sukses";
            // header('Location:' . BASEURL . '/administrator/v_tabel_pengelolaan_user');
        } else {
            echo "gagal";
        }
    }

    public function simpan_level()
    {
        $simpan = $this->model('m_administrator')->simpan_level($_POST);
        if ($simpan > 0) {
            echo "sukses";
        } else {
            echo "gagal";
        }
    }

    public function simpan_jabatan()
    {
        if (empty($_POST['suku_bunga_lps'])) {
            $_POST['suku_bunga_lps'] = null;
            $_POST['max_limit_lps'] = null;
            $_POST['limit_max'] = null;
            $_POST['limit_min'] = null;
        }
        $simpan = $this->model('m_administrator')->simpan_jabatan($_POST);
        if ($simpan > 0) {
            echo "sukses";
        } else {
            echo "gagal";
        }
    }




    public function update_user()
    {
        if ($_POST['level'] != 'KOMITE') {
            $_POST['tipe_kredit'] = '-';
            $_POST['tipe_komite'] = '-';
            $_POST['limit_direksi_awal']  = NULL;
            $_POST['limit_direksi_akhir'] = NULL;
        }

        $update = $this->model('m_administrator')->update_user($_POST);
        $update_user = $this->model('m_rc_log')->edit_data_user($_POST);
        if ($update > 0 && $update_user > 0) {
            echo "sukses";
        } else {
            echo "gagal";
        }
    }

    public function update_jabatan()
    {
        if (empty($_POST['suku_bunga_lps'])) {
            $_POST['suku_bunga_lps'] = null;
            $_POST['max_limit_lps'] = null;
            $_POST['limit_max'] = null;
            $_POST['limit_min'] = null;
        }
        $simpan = $this->model('m_administrator')->update_jabatan($_POST);
        if ($simpan > 0) {
            echo "sukses";
        } else {
            echo "gagal";
        }
    }


    // public function hapus_user()
    // {
    //     // $simpan = $this->model('m_administrator')->hapus_user($_POST);
    //     // if ($simpan > 0) {
    //         if ($this->model('m_administrator')->hapus_user($_POST) > 0) {
    //         echo "sukses";
    //     } else {
    //         echo "gagal";
    //     }
    // }

    public function hapus_user()
    {
        // Mengambil nilai id_user dari $_POST
        $_POST['nama_lengkap'] =  $_POST['nama_lengkap'];
        $deleted_administrator = $this->model('m_administrator')->hapus_user($_POST); // Menghapus user pada model m_administrator
        $deleted_rc_log = $this->model('m_rc_log')->hapus_data_user($_POST); // Menghapus pemohon pada model m_rc_log

        // Memeriksa apakah kedua penghapusan berhasil
        if ($deleted_administrator > 0 && $deleted_rc_log > 0) {
            echo "sukses";
        } else {
            echo "gagal";
        }
    }


    public function hapus_jabatan()
    {

        $simpan = $this->model('m_administrator')->hapus_jabatan($_POST);
        if ($simpan > 0) {
            echo "sukses";
        } else {
            echo "gagal";
        }
    }

    public function reset_password()
    {
        $pass = "bhm123";
        $password = password_hash($pass, PASSWORD_DEFAULT);
        $_POST['password'] = $password;

        $data = $this->model('m_administrator')->reset_password();
        $data_reset = $this->model('m_rc_log')->reset_password();
        if ($data > 0 && $data_reset > 0) {
            echo "berhasil";
        } else {
            echo "gagal reset password";
        }
    }
}
