
<?php
require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

date_default_timezone_set('Asia/Makassar');

if (!isset($_SESSION['level']) || $_SESSION['level'] !== 'INQUIRY') {
    header('Location:' . BASEURL . '/login');
    exit;
}

class inquiry extends Controller
{


    public function index()
    {
        $data['jumlah_pencairan'] = $this->model('m_inquiry')->jumlah_data_permohonan_pencairan();
        $data['jumlah_suku_bunga'] = $this->model('m_inquiry')->jumlah_data_permohonan_suku_bunga();
        $data['jumlah_permohonan'] = $this->model('m_inquiry')->jumlah_data_permohonan();
        $data['jumlah_disetujui'] = $this->model('m_inquiry')->jumlah_data_disetujui();
        $data['jumlah_ditolak'] = $this->model('m_inquiry')->jumlah_data_ditolak();
        $this->view('inquiry/beranda', $data);
    }
   

    public function modal_detail()
    {

        $data['detail'] = $this->model('m_inquiry')->modal_detail($_POST);
        if ($data['detail']['status_permohonan'] == 'DIBATALKAN') {
            $this->view('inquiry/v_modal_suku_batal', $data);
        } else {
            $this->view('inquiry/v_modal_detail', $data);
        }
    }

    public function modal_detail_pencairan()
    {
        $data['detail'] = $this->model('m_inquiry')->modal_detail($_POST);
        if ($data['detail']['status_permohonan'] == 'DIBATALKAN') {
            $this->view('inquiry/v_modal_pencairan_batal', $data);
        } else {
            $this->view('inquiry/v_modal_detail_pencairan', $data);
        }
    }

    public function modal_log()
    {
        $data['detail'] = $this->model('m_inquiry')->modal_log($_POST);
        $this->view('inquiry/v_modal_log', $data);
    }



    public function cari_data_permohonan()
    {
        if (isset($_POST['btn_cari'])) {
            $_SESSION['btn_cari'] = 'btn_cari';
            header('Location:' . BASEURL . '/inquiry/permintaan');
            exit;
        } else {
            header('Location:' . BASEURL . '/inquiry/permintaan');
        }
    }

    // public function permintaan()
    // {

    //     $data['lihat_data'] = $this->model('m_inquiry')->lihat_data();
    //     $data['detail'] = $this->model('m_inquiry')->get_data_permohonan($_POST);
    //     $this->view('inquiry/permintaan', $data);
    // }

    public function get_data_permohonan()
    {
        if (isset($_POST['tanggal_awal']) && isset($_POST['tanggal_akhir'])) {
            $tanggalAwal = $_POST['tanggal_awal'];
            $tanggalAkhir = $_POST['tanggal_akhir'];

            $data['detail'] = $this->model('m_inquiry')->get_data_permohonan($tanggalAwal, $tanggalAkhir);
        } else {

            $data['detail'] = array(); // Atau atur data kosong jika tidak ada data yang difilter
        }
    }

    public function permintaan()
    {
        // Memuat data tanpa filter
        $data['lihat_data'] = $this->model('m_inquiry')->lihat_data();
        $this->view('inquiry/permintaan', $data);
    }


    public function download()
    {
        // Memuat data tanpa filter
        $data['cabang'] = $this->model('m_inquiry')->data_cabang();
        $this->view('inquiry/download', $data);
    }

    // public function get_data_daftar_permohonan(){
    //     $this->db = new Database;
    //     $columns = array(
    //         0 => 'id',
    //         1 => 'id_permohonan'
    //         // 2 => 'nama_pemohon',
    //         // 3 => 'nama_instansi',
    //         // 4 => 'plafond_dimohon',
    //         // 5 => 'jangka_waktu',
    //         // 6 => 'tanggal_wawancara',
    //         // 7 => 'id_analis',
    //     );
    //     $this->db->query('SELECT * FROM tbl_rc_permohonan WHERE tgl_permohonan IS NOT NULL');
    //     $total_data = count($this->db->resultSet());
    //     $total_filtered = $total_data;
    //     $limit = $_POST['length'];
    //     $start = $_POST['start'];
    //     $order = $columns[$_POST['order']['0']['column']];
    //     $dir = $_POST['order']['0']['dir'];

    //     if (empty($_POST['search']['value'])) {
    //         $this->db->query("SELECT * FROM tbl_rc_permohonan WHERE tgl_permohonan IS NOT NULL 
    //         ORDER BY tgl_permohonan DESC,  $order $dir LIMIT $limit OFFSET $start");
    //         // $this->db->bind('kode_cabang', $_COOKIE['kode_cabang']);
    //         $query =  $this->db->resultSet();
    //     }else {
    //         $search = $_POST['search']['value'];
    //         $this->db->query("SELECT * FROM tbl_rc_permohonan WHERE tgl_permohonan IS NOT NULL AND (id_permohonan
    //         LIKE '%$search%' OR nama_nasabah LIKE '%$search%') ORDER BY tgl_permohonan DESC,  $order $dir LIMIT $limit OFFSET $start");
    //         // $this->db->bind('kode_cabang', $_COOKIE['kode_cabang']);
    //         $query =  $this->db->resultSet();

    //         $this->db->query("SELECT * FROM tbl_rc_permohonan WHERE tgl_permohonan IS NOT NULL AND (id_permohonan 
    //         LIKE '%$search%' OR nama_nasabah LIKE '%$search%')");
    //         // $this->db->bind('kode_cabang', $_COOKIE['kode_cabang']);
    //         $query2 =  $this->db->resultSet();
    //         $total_filtered = count($query2);
    //     }
    //     $data = array();

    //     if (!empty($query)) {
    //         $no = $start + 1;

    //         foreach ($query as $i) {
    //             $res_data['id'] =  $no;
    //             $res_data['id_permohonan'] = $i['id_permohonan'];
    //             $res_data['jenis_permohonan'] = $i['jenis_permohonan'];
    //             $res_data['tgl_permohonan'] = isset($i['tgl_permohonan']) ? date('d-m-Y', strtotime($i['tgl_permohonan'])) : '';
    //             $res_data['nama_nasabah'] = $i['nama_nasabah'];
    //             $res_data['jenis_produk'] = $i['jenis_produk'];
    //             $res_data['nominal'] = number_format($i['nominal'], 0, ',', '.');
    //             $res_data['status_approval'] = $i['status_approval'];

    //             $btn_detail= "<button type='button' style='background: " . w_orange . ";  color:white;' class='btn btn-sm mr-1 detail_slik' data-toggle='modal' data-target='#modal_detail' data-id='" . $i['id'] . "' data-id_permohonan='" . $i['id_permohonan'] . "'>Detail</button>";
    //             // $btn_edit = "<a href=' " . BASEURL . "/slik/input_data_slik/" . $i['no_permohonan_kredit'] . "' class='btn btn-sm btn-primary mr-1'>Edit</a>";
    //             // $btn_cetak = "<a href='" . BASEURL . "/slik/cetak_daftar_sudah_slik/" . $i['no_permohonan_kredit'] . "' class='btn btn-sm mr-1' style='background: " . w_ungu . " ;  color:white;' target='_blank'>Cetak</a>";
    //             // $btn_hapus = "<button type='button' class='btn btn-danger btn-sm btn_hapus_slik'  data-no_permohonan_kredit='" . $i['no_permohonan_kredit'] . "' data-nama_pemohon='" . $i['nama_pemohon'] . "  '  data-nama_instansi='" . $i['nama_instansi'] . "  '>Hapus</button>";





    //             // $batas_btn = "<span class='mr-0'> </span>";


    //             $res_data['aksi']   = "$btn_detail";
    //             $data[] = $res_data;
    //             $no++;
    //         }
    //     }
    // }

    // public function get_data_permintaan(){
    //     $_POST['tanggal_awal'] = $_POST['tanggal_awal'];
    //     $_POST['tanggal_akhir'] = $_POST['tanggal_akhir'];
    //     $this->model('m_inquiry')->get_data_permintaan($_POST);
    // }

    public function get_data_daftar_permohonan()
    {
        $this->db = new Database;

        $columns = array(
            0 => 'id',
            1 => 'id_permohonan'
            //         // 2 => 'nama_pemohon',
            //         // 3 => 'nama_instansi',
            //         // 4 => 'plafond_dimohon',
            //         // 5 => 'jangka_waktu',
            //         // 6 => 'tanggal_wawancara',
            //         // 7 => 'id_analis',
        );

        // Fetch necessary data from $_POST
        $limit = $_POST['length'];
        $start = $_POST['start'];
        $order = $columns[$_POST['order']['0']['column']];
        $dir = $_POST['order']['0']['dir'];
        try {

            // Fetch total data (total baris dalam tabel)
            $this->db->query('SELECT COUNT(*) as total FROM tbl_rc_permohonan');
            $row = $this->db->single();
            $total_data = $row['total'];

            // Sanitize and store search value
            $searchValue = isset($_POST['search']['value']) ? $_POST['search']['value'] : '';
            $searchValue = $this->sanitize($searchValue);


            // Build query
            $whereClause = (!empty($searchValue)) ? "AND (id_permohonan LIKE '%$searchValue%' OR nama_nasabah LIKE '%$searchValue%')" : '';
            $query = "SELECT COUNT(*) as total_filtered FROM tbl_rc_permohonan WHERE tgl_permohonan IS NOT NULL $whereClause";
            $result = $this->db->query($query);
            $total_filtered = $result->fetch_assoc()['total_filtered'];

            $query = "SELECT * FROM tbl_rc_permohonan WHERE tgl_permohonan IS NOT NULL $whereClause ORDER BY tgl_permohonan DESC, $order $dir LIMIT $limit OFFSET $start";
            $result = $this->db->query($query);
            $queryResults = $result->fetch_all(MYSQLI_ASSOC);

            // Process $queryResults to prepare $data array
            $data = [];

            foreach ($queryResults as $i) {
                // Process each row and create $res_data
                $res_data['id'] =  $no;
                $res_data['id_permohonan'] = $i['id_permohonan'];
                $res_data['jenis_permohonan'] = $i['jenis_permohonan'];
                $res_data['tgl_permohonan'] = isset($i['tgl_permohonan']) ? date('d-m-Y', strtotime($i['tgl_permohonan'])) : '';
                $res_data['nama_nasabah'] = $i['nama_nasabah'];
                $res_data['jenis_produk'] = $i['jenis_produk'];
                $res_data['nominal'] = number_format($i['nominal'], 0, ',', '.');
                $res_data['status_approval'] = $i['status_approval'];

                $btn_detail = "<button type='button' style='background: " . w_orange . ";  color:white;' class='btn btn-sm mr-1 detail_slik' data-toggle='modal' data-target='#modal_detail' data-id='" . $i['id'] . "' data-id_permohonan='" . $i['id_permohonan'] . "'>Detail</button>";

                $res_data['aksi'] = $btn_detail; // Assign buttons
                $data[] = $res_data;
            }

            // Return JSON response
            echo json_encode([
                "draw" => intval($_POST['draw']),
                "recordsTotal" => $total_data, // Total records (total baris dalam tabel)
                "recordsFiltered" => $total_filtered, // Filtered records
                "data" => $data // Data for DataTable
            ]);
        } catch (Exception $e) {
            // Handle the error, log it, or return an error message
            echo "Error: " . $e->getMessage();
        }
    }

    public function get_daftar_permohonan()
    {

        $data = $this->model('m_inquiry')->get_daftar_permohonan();


        $rows2 = array();
        foreach ($data as $i) :

            $res_data['id_permohonan'] = $i['id_permohonan'];
            $res_data['jenis_permohonan'] = $i['jenis_permohonan'];
            $res_data['tgl_permohonan'] = isset($i['tgl_permohonan']) ? date('d-m-Y', strtotime($i['tgl_permohonan'])) : '';
            $res_data['nama_nasabah'] = $i['nama_nasabah'];
            $res_data['jenis_produk'] = $i['jenis_produk'];
            $res_data['nominal'] = number_format($i['nominal'], 0, ',', '.');
            $res_data['status_permohonan'] = $i['status_permohonan'];

            // $res_data['plafond'] = number_format($i['plafond_dimohon'], 0, ',', '.');

            // $res_data['tanggal_slik'] = isset($i['tanggal_slik']) ? date('d-m-Y', strtotime($i['tanggal_slik'])) : '';
            // $res_data['user_create'] = $i['user_create'];
            if ($i['jenis_permohonan'] == 'SUKU BUNGA KHUSUS') {
                $btn_detail = "<button type='button' class='btn btn-outline-info' id='btn_modal_detail' data-id='" . $i['id_permohonan'] . "' data-id_permohonan='" . $i['id_permohonan'] . "'>Detail</button>";
            } else {
                $btn_detail = "<button type='button' class='btn btn-outline-info' id='btn_modal_pencairan' data-id='" . $i['id_permohonan'] . "' data-id_permohonan='" . $i['id_permohonan'] . "'>Detail</button>";
            }
            $btn_log = "<button type='button' class='btn btn-outline-warning' id='btn_modal_log' data-id='" . $i['id_permohonan'] . "' data-id_permohonan='" . $i['id_permohonan'] . "'>Log</button>";


            // $res_data['aksi']   = "$btn_detail_slik" . "$btn_edit" . "$btn_cetak" . "$btn_hapus";
            $res_data['aksi']   = "$btn_detail" . "$btn_log";
            $rows2[] = $res_data;


        endforeach;
        echo json_encode($rows2);
    }

    public function cetak_permohonan()
    {
        // Validasi atau bersihkan data input sesuai kebutuhan
        $startDate = isset($_POST['start_date']) ? htmlspecialchars($_POST['start_date']) : '';
        $endDate = isset($_POST['end_date']) ? htmlspecialchars($_POST['end_date']) : '';
        $branch = isset($_POST['branch']) ? htmlspecialchars($_POST['branch']) : '';

        // Query untuk mendapatkan data dari database berdasarkan kondisi
        $data = $this->model('m_inquiry')->lihat_data($startDate, $endDate, $branch);

        // Buat objek Spreadsheet baru
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Tambahkan header ke file Excel
        $sheet->setCellValue('A1', 'Nama Nasabah');
        $sheet->setCellValue('B1', 'Kantor Cabang');
        $sheet->setCellValue('C1', 'Tanggal Permohonan');

        // Isi data ke file Excel
        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item['nama_nasabah']);
            $sheet->setCellValue('B' . $row, $item['kantor_cabang']);
            $sheet->setCellValue('C' . $row, $item['tgl_permohonan']);
            $row++;
        }

        // Simpan file Excel di folder server
        $filename = 'data_' . date('YmdHis') . '.xlsx';
        $filepath = __DIR__ . '/cetak_funding/' . $filename; // Menggunakan __DIR__

        // Tambahkan try-catch untuk menangani kesalahan penyimpanan file
        try {
            $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
            $writer->save($filepath);
        } catch (\Exception $e) {
            die('Error saving the file: ' . $e->getMessage());
        }

        // Hapus file setelah diunduh
        unlink($filepath);

        // Berikan URL yang dapat diakses untuk mengunduh file
        $download_url = BASEURL . '/cetak_funding/' . $filename;

        // Header yang tepat
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Baca file dan kirimkan isinya ke output
        readfile($filepath);

        // Keluar untuk menghindari output tambahan
        exit;
    }


    public function get_load_csv()
    {
        $data = $this->model('m_inquiry')->export_csv();
        $rows = array();
        $rows2 = array();
        foreach ($data as $row) :
            $rows['id_permohonan'] = $row['id_permohonan'];
            $rows['username'] = $row['username'];
            $rows['kantor_cabang'] = $row['kantor_cabang'];
            $rows['jenis_permohonan'] = $row['jenis_permohonan'];
            $rows['tgl_permohonan'] = isset($row['tgl_permohonan']) ? date('d-m-Y', strtotime($row['tgl_permohonan'])) : '';
            $rows['alasan_pengajuan'] = $row['alasan_pengajuan'];
            $rows['nama_nasabah'] = $row['nama_nasabah'];
            $rows['nomor_telepon'] = $row['nomor_telepon'];
            $rows['alamat'] = $row['alamat'];
            $rows['status_nasabah'] = $row['status_nasabah'];
            $rows['jenis_produk'] = $row['jenis_produk'];
            $rows['nominal'] = number_format(($row['nominal']), 0, ",", ".");
            $rows['jangka_waktu'] = $row['jangka_waktu'];
            $rows['nilai_suku_bunga_pengajuan'] = $row['nilai_suku_bunga_pengajuan'];
            $rows['suku_bunga_counter'] = $row['suku_bunga_counter'];
            $rows['nama_keluarga'] = $row['nama_keluarga'];
            $rows['nilai_akumulasi_simpanan'] = isset($row['nilai_akumulasi_simpanan']) ? number_format(($row['nilai_akumulasi_simpanan']), 0, ",", ".") : '';
            $rows['jenis_permohonan_pencairan_sebelum_jt_pengajuan'] = $row['jenis_permohonan_pencairan_sebelum_jt_pengajuan'];
            $rows['suku_bunga_deposito'] = $row['suku_bunga_deposito'];
            $rows['tgl_pembentukan'] = isset($row['tgl_pembentukan']) ? date('d-m-Y', strtotime($row['tgl_pembentukan'])) : '';
            $rows['jumlah_hari'] = $row['jumlah_hari'];
            $rows['nominal_penalti'] = isset($row['nominal_penalti']) ? number_format(($row['nominal_penalti']), 0, ",", ".") : '';
            $rows['nominal_bunga_berjalan'] = isset($row['nominal_bunga_berjalan']) ? number_format(($row['nominal_bunga_berjalan']), 0, ",", ".") : '';
            $rows['nomor_rekening_pencairan'] = $row['nomor_rekening_pencairan'];
            $rows['keterangan_funding'] = $row['keterangan_funding'];
            
            $rows['rekomendasi_pejabat_cabang'] = $row['rekomendasi_pejabat_cabang'];
            $rows['user_verifikator'] = $row['user_verifikator'];

            $rows['nilai_suku_bunga_approval'] = $row['nilai_suku_bunga_approval'];
            $rows['jenis_permohonan_pencairan_sebelum_jt_approval'] = $row['jenis_permohonan_pencairan_sebelum_jt_approval'];
            $rows['keterangan_approval'] = $row['keterangan_approval'];

            $rows['tgl_verifikasi'] = isset($row['tgl_verifikasi']) ? date('d-m-Y', strtotime($row['tgl_verifikasi'])) : '';

            $rows['tgl_batal'] = isset($row['tgl_batal']) ? date('d-m-Y', strtotime($row['tgl_batal'])) : '';
            $rows['tgl_pending'] = isset($row['tgl_pending']) ? date('d-m-Y', strtotime($row['tgl_pending'])) : '';
            $rows['tgl_pengajuan_ulang'] = isset($row['tgl_pengajuan_ulang']) ? date('d-m-Y', strtotime($row['tgl_pengajuan_ulang'])) : '';
            $rows['tgl_approval'] = isset($row['tgl_approval']) ? date('d-m-Y', strtotime($row['tgl_approval'])) : '';
            $rows['tgl_dilanjutkan'] = isset($row['tgl_dilanjutkan']) ? date('d-m-Y', strtotime($row['tgl_dilanjutkan'])) : '';
            $rows['tgl_telah_diproses'] = isset($row['tgl_telah_diproses']) ? date('d-m-Y', strtotime($row['tgl_telah_diproses'])) : '';
            $rows['user_cbs'] = $row['user_cbs'];
            $rows['history_permohonan'] = $row['history_permohonan'];
            $rows['status_permohonan'] = $row['status_permohonan'];
            $rows2[] = $rows;
        endforeach;
        echo json_encode($rows2);
    }

    public function get_load_csv_all()
    {

        $data = $this->model('m_inquiry')->export_csv_all();
        $rows = array();
        $rows2 = array();
        foreach ($data as $row) :
            $rows['id_permohonan'] = $row['id_permohonan'];
            $rows['username'] = $row['username'];
            $rows['kantor_cabang'] = $row['kantor_cabang'];
            $rows['jenis_permohonan'] = $row['jenis_permohonan'];
            $rows['tgl_permohonan'] = isset($row['tgl_permohonan']) ? date('d-m-Y', strtotime($row['tgl_permohonan'])) : '';
            $rows['alasan_pengajuan'] = $row['alasan_pengajuan'];
            $rows['nama_nasabah'] = $row['nama_nasabah'];
            $rows['nomor_telepon'] = $row['nomor_telepon'];
            $rows['alamat'] = $row['alamat'];
            $rows['status_nasabah'] = $row['status_nasabah'];
            $rows['jenis_produk'] = $row['jenis_produk'];
            $rows['nominal'] = number_format(($row['nominal']), 0, ",", ".");
            $rows['jangka_waktu'] = $row['jangka_waktu'];
            $rows['nilai_suku_bunga_pengajuan'] = $row['nilai_suku_bunga_pengajuan'];
            $rows['suku_bunga_counter'] = $row['suku_bunga_counter'];
            $rows['nama_keluarga'] = $row['nama_keluarga'];
            $rows['nilai_akumulasi_simpanan'] = isset($row['nilai_akumulasi_simpanan']) ? number_format(($row['nilai_akumulasi_simpanan']), 0, ",", ".") : '';
            $rows['jenis_permohonan_pencairan_sebelum_jt_pengajuan'] = $row['jenis_permohonan_pencairan_sebelum_jt_pengajuan'];
            $rows['suku_bunga_deposito'] = $row['suku_bunga_deposito'];
            $rows['tgl_pembentukan'] = isset($row['tgl_pembentukan']) ? date('d-m-Y', strtotime($row['tgl_pembentukan'])) : '';
            $rows['jumlah_hari'] = $row['jumlah_hari'];
            $rows['nominal_penalti'] = isset($row['nominal_penalti']) ? number_format(($row['nominal_penalti']), 0, ",", ".") : '';
            $rows['nominal_bunga_berjalan'] = isset($row['nominal_bunga_berjalan']) ? number_format(($row['nominal_bunga_berjalan']), 0, ",", ".") : '';
            $rows['nomor_rekening_pencairan'] = $row['nomor_rekening_pencairan'];
            $rows['keterangan_funding'] = $row['keterangan_funding'];

            $rows['rekomendasi_pejabat_cabang'] = $row['rekomendasi_pejabat_cabang'];
            $rows['user_verifikator'] = $row['user_verifikator'];

            $rows['nilai_suku_bunga_approval'] = $row['nilai_suku_bunga_approval'];
            $rows['jenis_permohonan_pencairan_sebelum_jt_approval'] = $row['jenis_permohonan_pencairan_sebelum_jt_approval'];
            $rows['keterangan_approval'] = $row['keterangan_approval'];

            $rows['tgl_verifikasi'] = isset($row['tgl_verifikasi']) ? date('d-m-Y', strtotime($row['tgl_verifikasi'])) : '';
            
            $rows['tgl_batal'] = isset($row['tgl_batal']) ? date('d-m-Y', strtotime($row['tgl_batal'])) : '';
            $rows['tgl_pending'] = isset($row['tgl_pending']) ? date('d-m-Y', strtotime($row['tgl_pending'])) : '';
            $rows['tgl_pengajuan_ulang'] = isset($row['tgl_pengajuan_ulang']) ? date('d-m-Y', strtotime($row['tgl_pengajuan_ulang'])) : '';
            $rows['tgl_approval'] = isset($row['tgl_approval']) ? date('d-m-Y', strtotime($row['tgl_approval'])) : '';
            $rows['tgl_dilanjutkan'] = isset($row['tgl_dilanjutkan']) ? date('d-m-Y', strtotime($row['tgl_dilanjutkan'])) : '';
            $rows['tgl_telah_diproses'] = isset($row['tgl_telah_diproses']) ? date('d-m-Y', strtotime($row['tgl_telah_diproses'])) : '';
            $rows['user_cbs'] = $row['user_cbs'];
            $rows['history_permohonan'] = $row['history_permohonan'];
            $rows['status_permohonan'] = $row['status_permohonan'];
            $rows2[] = $rows;
        endforeach;
        echo json_encode($rows2);
    }
}
