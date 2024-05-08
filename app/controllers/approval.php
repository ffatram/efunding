<?php
date_default_timezone_set('Asia/Makassar');
if (!isset($_SESSION['level'])) {
    header('Location:' . BASEURL . '/login');
    exit;
} elseif ($_SESSION['level'] !== 'KOMITE') {
    header('Location:' . BASEURL . '/login');
    exit;
}

class approval extends Controller
{
    public function index()
    {
        $data['jumlah_pencairan'] = $this->model('m_approval')->jumlah_data_permohonan_pencairan();
        $data['jumlah_suku_bunga'] = $this->model('m_approval')->jumlah_data_permohonan_suku_bunga();
        $data['jumlah_permohonan'] = $this->model('m_approval')->jumlah_data_permohonan();
        $data['jumlah_disetujui'] = $this->model('m_approval')->jumlah_data_disetujui();
        $data['jumlah_ditolak'] = $this->model('m_approval')->jumlah_data_ditolak();
        $this->view('approval/beranda', $data);
    }

    public function form_rekomendasi_suku_bunga($id)
    {
        $_POST['id_permohonan'] =  $id;
        $data['data_permohonan'] =  $this->model('m_approval')->lihat_data_id($_POST);
        $this->view('approval/form_rekomendasi_suku_bunga', $data);
    }
    public function form_rekomendasi_pencairan($id)
    {
        $_POST['id_permohonan'] =  $id;
        $data['data_permohonan'] =  $this->model('m_approval')->lihat_data_id($_POST);
        $this->view('approval/form_rekomendasi_pencairan', $data);
    }

    public function form_approval($id)
    {
        $_POST['id_permohonan'] =  $id;
        $data['data_permohonan'] =  $this->model('m_approval')->lihat_data_id($_POST);
        $this->view('approval/form_approval', $data);
    }

    public function approval_ulang_suku_bunga($id)
    {
        $_POST['id_permohonan'] =  $id;
        $data['data_permohonan'] =  $this->model('m_approval')->lihat_data_id($_POST);
        $this->view('approval/approval_ulang_suku_bunga', $data);
    }
    function form_approval_pencairan($id)
    {
        $_POST['id_permohonan'] =  $id;
        $data['data_permohonan'] =  $this->model('m_approval')->lihat_data_id($_POST);
        $this->view('approval/form_approval_pencairan', $data);
    }

    public function daftar_belum_approve()
    {
        $data['data_diajukan'] = $this->model('m_approval')->jumlah_data_permohonan();
        $data['lihat_data'] = $this->model('m_approval')->lihat_data();
        $data['lihat_semua'] = $this->model('m_approval')->lihat_semua_data();
        $data['view'] = $this->model('m_approval')->lihat_view_jabatan();

        $this->view('approval/daftar_belum_approve', $data);
    }


    public function data_persetujuan()
    {
        // $data['lihat_data'] = $this->model('m_approval')->lihat_data_approval();
        $this->view('approval/data_persetujuan');
    }

    public function modal_detail()
    {
        $data['detail'] = $this->model('m_approval')->modal_detail($_POST);
        $this->view('approval/v_modal_detail', $data);
    }

    public function modal_pencairan()
    {
        $data['detail'] = $this->model('m_approval')->modal_detail($_POST);
        $this->view('approval/v_modal_pencairan', $data);
    }
    public function modal_suku_bunga()
    {
        $data['detail'] = $this->model('m_approval')->modal_detail($_POST);
        $this->view('approval/v_modal_suku_bunga', $data);
    }

    public function modal_detail_approve()
    {
        $data['detail'] = $this->model('m_approval')->modal_detail($_POST);
        $this->view('approval/v_modal_detail_approve', $data);
    }

    public function modal_detail_pencairan()
    {
        $data['detail'] = $this->model('m_approval')->modal_detail($_POST);
        $this->view('approval/v_modal_detail_pencairan', $data);
    }

    //lihat data
    function lihat_data()
    {
        $data['lihat_data'] = $this->model('m_approval')->lihat_data();
        return $data['lihat_data'];
    }
    function daftar_pending()
    {
        $data['lihat_data'] = $this->model('m_approval')->lihat_data_pending();
        $this->view('approval/daftar_pending', $data);
    }
    // ini jadi
    // public function update_data_suku_bunga()
    // {
    //     $_POST['username'] = $_COOKIE['username'];
    //     $_POST['tgl_approval'] = date("Y-m-d H:i:s");
    //     if ($_POST['approval'] == $_POST['suku_bunga_pengajuan']) {
    //         $_POST['status_permohonan'] = "DISETUJUI";
    //         $_POST['tgl_pending'] = null;
    //     } else if ($_POST['approval'] != $_POST['suku_bunga_pengajuan']) {
    //         $_POST['status_permohonan'] = "DIPENDING";
    //         $_POST['tgl_pending'] = date("Y-m-d H:i:s");
    //     }
    //     $proses = $this->model('m_approval')->update_data_suku_bunga();

    //     echo $proses;
    // }

    public function tambah_rekomendasi_pejabat()
    {
        $_POST['rekomendasi_pejabat'] = $_POST['rekomendasi_pejabat_cabang'];
        $_POST['user_verifikator'] = $_COOKIE['nama_lengkap'];
        $_POST['tgl_verifikasi'] = date("Y-m-d H:i:s");
        $_POST['status_permohonan'] = "DIVERIFIKASI";
        // if ($this->model('m_approval')->tambah_data_rekomendasi() > 0) {
        if ($this->model('m_approval')->tambah_data_rekomendasi() > 0) {
            header('Location:' . BASEURL . '/approval/daftar_belum_approve');
        } else {
            header('Location:' . BASEURL . '/approval/form_rekomendasi_pencairan');
        }
    }

    public function tambah_rekomendasi_suku_bunga()
    {
        $_POST['rekomendasi_pejabat'] = $_POST['rekomendasi_pejabat_cabang'];
        $_POST['user_verifikator'] = $_COOKIE['nama_lengkap'];
        $_POST['tgl_verifikasi'] = date("Y-m-d H:i:s");
        $_POST['status_permohonan'] = "DIVERIFIKASI";
        if ($this->model('m_approval')->tambah_rekomendasi_suku_bunga() > 0) {
            header('Location:' . BASEURL . '/approval/daftar_belum_approve');
        } else {
            header('Location:' . BASEURL . '/approval/form_rekomendasi_suku_bunga');
        }
    }
    // ini coba
    public function update_data_suku_bunga()
    {
        $_POST['username'] = $_COOKIE['nama_lengkap'];
        $_POST['nama_pemohon'] = $_POST['nama_nasabah'];
        $_POST['tgl_approval'] = date("Y-m-d H:i:s");
        if ($_POST['approval'] == $_POST['suku_bunga_pengajuan']) {
            $_POST['status_permohonan'] = "DISETUJUI";
            $_POST['tgl_pending'] = null;
            $proses = $this->model('m_rc_log')->approve_pemohon($_POST);
        } else if ($_POST['approval'] != $_POST['suku_bunga_pengajuan']) {
            $_POST['status_permohonan'] = "DIPENDING";
            $_POST['tgl_pending'] = date("Y-m-d H:i:s");
            $proses = $this->model('m_rc_log')->pending_pemohon($_POST);
        }
        $proses = $this->model('m_approval')->update_data_suku_bunga();
        echo $proses;
    }

    //ini jadi
    // public function update_data_pencairan()
    // {
    //     if ($_POST['approval'] == $_POST['permohonan_pencairan']) {
    //         $_POST['status_permohonan'] = "DISETUJUI";
    //         $_POST['tgl_pending'] = null;
    //     } else if ($_POST['approval'] != $_POST['permohonan_pencairan']) {
    //         $_POST['status_permohonan'] = "DIPENDING";
    //         $_POST['tgl_pending'] = date("Y-m-d H:i:s");
    //     }

    //     $_POST['username'] = $_COOKIE['username'];
    //     $_POST['tgl_approval'] = date("Y-m-d H:i:s");
    //     $proses = $this->model('m_approval')->update_data_pencairan();

    //     echo $proses;
    // }

    //ini dicoba
    public function update_data_pencairan()
    {
        $_POST['username'] = $_COOKIE['nama_lengkap'];
        $_POST['nama_pemohon'] = $_POST['nama_nasabah'];
        $_POST['tgl_approval'] = date("Y-m-d H:i:s");
        if ($_POST['approval'] == $_POST['permohonan_pencairan']) {
            $_POST['status_permohonan'] = "DISETUJUI";
            $_POST['tgl_pending'] = null;
            $proses = $this->model('m_rc_log')->approve_pemohon($_POST);
        } else if ($_POST['approval'] != $_POST['permohonan_pencairan']) {
            $_POST['status_permohonan'] = "DIPENDING";
            $_POST['tgl_pending'] = date("Y-m-d H:i:s");
            $proses = $this->model('m_rc_log')->pending_pemohon($_POST);
        }
        $_POST['ket_approval'] = $_POST['ket_approval'];
        $proses = $this->model('m_approval')->update_data_pencairan();
        echo $proses;
    }

    public function form_approval_ulang($id)
    {
        $_POST['id_permohonan'] =  $id;
        $data['data_permohonan'] =  $this->model('m_approval')->lihat_data_id($_POST);
        $this->view('approval/form_approval_ulang', $data);
    }

    public function cek_btn_reject()
    {
        $data['1'] = $this->model('m_approval')->cek_btn_reject();
        if ($data['1'] > 0) {
            echo '1';
        } else {
            echo "0";
        }
    }



    //btn tolak form permohonan approval pencairan  
    public function reject()
    {
        $_POST['nama_pemohon'] = $_POST['nama_nasabah'];
        // $_POST['approval'] = $_POST['approval'];
        $_POST['status_permohonan'] = "DITOLAK";
        // $_POST['ket_approval'] =  $_POST['ket_approval'];
        $_POST['username'] = $_COOKIE['nama_lengkap'];
        $_POST['tgl_approval'] = date("Y-m-d H:i:s");

        $proses = $this->model('m_rc_log')->reject_pemohon($_POST);
        $proses = $this->model('m_approval')->reject();
        echo $proses;
    }

    public function reject_suku_bunga()
    {
        $_POST['nama_pemohon'] = $_POST['nama_nasabah'];
        // $_POST['approval'] = $_POST['approval'];
        $_POST['status_permohonan'] = "DITOLAK";
        // $_POST['ket_approval'] =  $_POST['ket_approval'];
        $_POST['username'] = $_COOKIE['nama_lengkap'];
        $_POST['tgl_approval'] = date("Y-m-d H:i:s");

        $proses = $this->model('m_rc_log')->reject_pemohon($_POST);
        $proses = $this->model('m_approval')->reject_suku_bunga();
        echo $proses;
    }

    public function pending_suku_bunga()
    {
        $_POST['nama_pemohon'] = $_POST['nama_nasabah'];
        // $_POST['approval'] = $_POST['approval'];
        $_POST['status_permohonan'] = "DIPENDING";
        // $_POST['ket_approval'] =  $_POST['ket_approval'];
        $_POST['username'] = $_COOKIE['nama_lengkap'];
        $_POST['tgl_approval'] = date("Y-m-d H:i:s");

        $proses = $this->model('m_rc_log')->pending_pemohon($_POST);
        $proses = $this->model('m_approval')->pending_suku_bunga();
        echo $proses;
    }

    public function pending_pencairan()
    {
        $_POST['nama_pemohon'] = $_POST['nama_nasabah'];
        // $_POST['approval'] = $_POST['approval'];
        $_POST['status_permohonan'] = "DIPENDING";
        // $_POST['ket_approval'] =  $_POST['ket_approval'];
        $_POST['username'] = $_COOKIE['nama_lengkap'];
        $_POST['tgl_approval'] = date("Y-m-d H:i:s");

        $proses = $this->model('m_rc_log')->pending_pemohon($_POST);
        $proses = $this->model('m_approval')->pending_pencairan();
        echo $proses;
    }


    public function update_status()
    {
        // $_POST['id'] = $id;
        $_POST['id_permohonan'];
        if ($this->model('m_approval')->update($_POST) > 0) {
            echo "sukses";
        } else {
            echo "gagal";
        }
    }

    public function modal_proses_komite()
    {
        $data['detail'] = $this->model('m_cs_funding')->modal_detail();
        $data['get_data_id'] = $this->model('m_approval')->lihat_data_id()($_POST);
    }

    public function cek_pass_approval()
    {
        $data = $this->model('m_approval')->cek_pass_approval($_POST);
        if ($data == 'sukses') {
            echo "pass_benar";
        } else {
            echo "pass_salah";
        }
    }

    public function cek_status_tbl_permohonan()
    {

        $data = $this->model('m_komite')->cek_status_tbl_permohonan();
        echo $data['status'];
    }

    public function cari_data_permintaan()
    {
        $data = $this->model('m_approval')->cari_data_permintaan();
        $this->view('approval/data_permintaan', $data);
    }

    public function get_daftar_permohonan()
    {

        $data = $this->model('m_approval')->get_daftar_permohonan();
        $rows2 = array();
        foreach ($data as $i) :

            $res_data['id_permohonan'] = $i['id_permohonan'];
            $res_data['jenis_permohonan'] = $i['jenis_permohonan'];
            $res_data['tgl_permohonan'] = isset($i['tgl_permohonan']) ? date('d-m-Y', strtotime($i['tgl_permohonan'])) : '';
            $res_data['nama_nasabah'] = $i['nama_nasabah'];
            $res_data['jenis_produk'] = $i['jenis_produk'];
            $res_data['nominal'] = number_format($i['nominal'], 0, ',', '.');
            $res_data['tgl_approval'] = isset($i['tgl_approval']) ? date('d-m-Y', strtotime($i['tgl_approval'])) : '';
            $res_data['status_permohonan'] = $i['status_permohonan'];

            if ($i['jenis_permohonan'] == 'SUKU BUNGA KHUSUS') {
                $btn_detail = "<button type='button' class='btn btn-outline-info' id='btn_modal_detail' data-id='" . $i['id_permohonan'] . "' data-id_permohonan='" . $i['id_permohonan'] . "'>Detail</button>";
            } else {
                $btn_detail = "<button type='button' class='btn btn-outline-info' id='btn_modal_pencairan' data-id='" . $i['id_permohonan'] . "' data-id_permohonan='" . $i['id_permohonan'] . "'>Detail</button>";
            }
            $res_data['aksi']   = "$btn_detail";
            $rows2[] = $res_data;


        endforeach;
        echo json_encode($rows2);
    }
}
