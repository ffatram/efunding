<?php
date_default_timezone_set('Asia/Makassar');
if (!isset($_SESSION['level'])) {
    header('Location:' . BASEURL . '/login');
    exit;
} elseif ($_SESSION['level'] !== 'CS') {
    header('Location:' . BASEURL . '/login');
    exit;
}

require 'vendor/autoload.php';

class cs_funding extends Controller
{

    public function index()
    {
        $data['approval_baru'] = $this->model('m_cs_funding')->lihat_approval_terbaru();
        $data['jumlah_pencairan'] = $this->model('m_cs_funding')->jumlah_data_permohonan_pencairan();
        $data['jumlah_suku_bunga'] = $this->model('m_cs_funding')->jumlah_data_permohonan_suku_bunga();
        // $data['data_dilanjutkan'] = $this->model('m_cs_funding')->
        $this->view('cs_funding/beranda', $data);
    }

    public function data_nasabah()
    {
        $data = $this->model('m_cs_funding')->lihat_data_nasabah();
        $this->view('cs_funding/data_nasabah', $data);
    }
    public function pencairan_sebelum_jatuh_tempo()
    {
        $data['lihat_pencairan'] = $this->model('m_cs_funding')->lihat_permohonan_pencairan();
        $this->view('cs_funding/pencairan_sebelum_jatuh_tempo', $data);
    }
    public function suku_bunga()
    {
        $data['lihat_data'] = $this->model('m_cs_funding')->lihat_data();
        $this->view('cs_funding/suku_bunga', $data);
    }

    public function permohonan_disetujui()
    {
        $data['data_disetujui'] = $this->model('m_cs_funding')->lihat_data_disetujui();
        $this->view('cs_funding/permohonan_disetujui', $data);
    }

    public function form_suku_bunga()
    {
        $data['data_produk'] = $this->model('m_cs_funding')->get_data_produk();
        $data['jangka_waktu'] = $this->model('m_cs_funding')->get_data_jangka_waktu();
        $data['id_terbesar'] = $this->model('m_cs_funding')->kode_terbesar_suku_bunga();
        $data['data_funding'] = $this->model('m_cs_funding')->nama_funding();
        $this->view('cs_funding/form_suku_bunga', $data);
    }

    public function permohonan_pencairan()
    {
        $data['produk_pencairan'] = $this->model('m_cs_funding')->get_data_produk_pencairan();
        $data['jangka_waktu'] = $this->model('m_cs_funding')->get_data_jangka_waktu_pencairan();
        $data['jw_golden_age'] = $this->model('m_cs_funding')->get_jangka_waktu();
        $data['jw'] = $this->model('m_cs_funding')->jangka_waktu();
        $data['jw_prima'] = $this->model('m_cs_funding')->jangka_waktu_prima();
        $data['id_terbesar'] = $this->model('m_cs_funding')->kode_terbesar_pencairan();
        $data['data_funding'] = $this->model('m_cs_funding')->nama_funding();

        $this->view('cs_funding/permohonan_pencairan', $data);
    }

    public function cek_nasabah_priority()
    {
        // Pastikan Anda mendapatkan nomor KTP dari inputan yang sesuai
        $nomor_identitas = $_POST['nomor_identitas'];

        // Memanggil model untuk memeriksa keberadaan nomor KTP
        $simpan = $this->model('m_cs_funding')->cek_nasabah_priority($nomor_identitas);

        // Memeriksa hasil dan menampilkan pesan
        if ($simpan > 0) {
            echo "ada"; // Nomor KTP sudah terdaftar
        } else {
            echo "tidak"; // Nomor KTP belum terdaftar
        }
    }

    // ini jadi untuk tambah id otomatis
    // public function simpan_data_pencairan()
    // {
    //     $targetDir = "upload/funding/"; // Direktori untuk menyimpan file yang diunggah

    //     $uploadOk = true;

    //     // Mendapatkan ekstensi file yang diunggah
    //     $fileType = strtolower(pathinfo($_FILES["bilyet"]["name"], PATHINFO_EXTENSION));

    //     // Path lengkap ke file yang diunggah
    //     $targetFile = $targetDir . basename($_FILES["bilyet"]["name"]);

    //     // Function untuk menangani unggahan file
    //     function handleFileUpload($targetFile, $fileType)
    //     {
    //         global $uploadOk;

    //         // Check if it's a PDF file
    //         if ($fileType === 'pdf') {
    //             // Simpan nama file PDF ke dalam variabel $_POST['bilyet']
    //             $_POST['bilyet'] = $_FILES["bilyet"]["name"];

    //             // Move the PDF file to the specific directory
    //             if (move_uploaded_file($_FILES["bilyet"]["tmp_name"], $targetFile)) {
    //                 echo "The PDF file has been uploaded.";
    //             } else {
    //                 echo "Sorry, there was an error uploading your PDF file.";
    //             }
    //         } else {
    //             // Check if it's an image file
    //             if (!getimagesize($_FILES["bilyet"]["tmp_name"])) {
    //                 echo "File is not a valid image.";
    //                 $uploadOk = false;
    //             } else {
    //                 // Simpan nama file gambar ke dalam variabel $_POST['bilyet']
    //                 $_POST['bilyet'] = $_FILES["bilyet"]["name"];

    //                 // Move the image file to the specific directory if uploadOk is still true
    //                 if (move_uploaded_file($_FILES["bilyet"]["tmp_name"], $targetFile)) {
    //                     echo "The image file has been uploaded.";
    //                 } else {
    //                     echo "Sorry, there was an error uploading your image file.";
    //                 }
    //             }
    //         }
    //     }

    //     // Check if file already exists
    //     if (file_exists($targetFile)) {
    //         echo "Sorry, the file already exists.";
    //         $uploadOk = false;
    //     }

    //     // Check file size (adjust as needed)
    //     if ($_FILES["bilyet"]["size"] > 10 * 1024 * 1024) { // 10 MB
    //         echo "Sorry, your file is too large.";
    //         $uploadOk = false;
    //     }

    //     // Allow only certain file formats (you can customize this)
    //     $allowedFileTypes = array("jpg", "jpeg", "png", "gif", "pdf");
    //     if (!in_array($fileType, $allowedFileTypes)) {
    //         echo "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
    //         $uploadOk = false;
    //     }

    //     // Handle file upload if uploadOk is still true
    //     if ($uploadOk) {
    //         handleFileUpload($targetFile, $fileType);
    //     }

    //     // Simpan tanda tangan digital ke dalam folder di htdocs
    //     if (!empty($_POST['ttd_nasabah'])) {
    //         // Jika tanda tangan diambil dari canvas
    //         $imgData = $_POST['ttd_nasabah'];
    //         $imgData = str_replace('data:image/png;base64,', '', $imgData);
    //         $imgData = str_replace(' ', '+', $imgData);
    //         $imgBinary = base64_decode($imgData);

    //         $filePath = 'upload/ttd/';
    //         $nama = str_replace(' ', '', $_POST['nama_nasabah']);
    //         $ttdName = uniqid('ttd_' . $nama) . '.png';

    //         file_put_contents($filePath . $ttdName, $imgBinary);
    //         echo 'Tanda tangan dari canvas berhasil disimpan dengan nama file: ' . $ttdName;
    //     } elseif (!empty($_FILES['hiddenFileTtd']['tmp_name'])) {
    //         // Jika tanda tangan diambil dari file input tersembunyi
    //         $uploadDir = 'upload/ttd/';
    //         $nama = str_replace(' ', '', $_POST['nama_nasabah']);
    //         $ttdName = uniqid('ttd_' . $nama) . '.png';
    //         $filePath = $uploadDir . $ttdName;

    //         if (move_uploaded_file($_FILES['hiddenFileTtd']['tmp_name'], $filePath)) {
    //             echo 'Tanda tangan dari file berhasil disimpan dengan nama file: ' . $ttdName;
    //         } else {
    //             echo 'Gagal menyimpan tanda tangan dari file.';
    //         }
    //     } else {
    //         echo 'Data tanda tangan tidak diterima.';
    //     }

    //     $data['id_terbesar'] = $this->model('m_cs_funding')->kode_terbesar_pencairan();
    //     $kode = $data['id_terbesar']['kode_terbesar'];
    //     $urutan = (int) substr($kode, 4, 6);
    //     $urutan++;
    //     $huruf = "PSJT";
    //     $id_permohonan = $huruf . sprintf("%06s", $urutan);
    //     $_POST['id_permohonan'] = $id_permohonan;

    //     $_POST['bilyet'] = $_FILES["bilyet"]["name"];

    //     echo $_POST['bilyet'];
    //     $_POST['ttd_nasabah'] = $ttdName;
       
    //     $_POST['nama_nasabah'] = $_POST['nama_nasabah'];
    //     $_POST['status_nasabah'] = isset($_POST['status_nasabah']) ? $_POST['status_nasabah'] : null;
    //     $_POST['user_create'] = $_COOKIE['username'];

    //     $simpan_data = $this->model('m_cs_funding')->simpan_data_pencairan();

    //     // Menyimpan data pemohon
    //     $simpan_pemohon = $this->model('m_rc_log')->simpan_pemohon($_POST);
    //     if ($simpan_data > 0 && $simpan_pemohon > 0) {
    //         //  Jika kedua simpanan berhasil, arahkan ke halaman tertentu
    //         header('Location:' . BASEURL . '/cs_funding/pencairan_sebelum_jatuh_tempo');
    //     } else {
    //         echo "gagal";
    //     }
    // }

    //coba upload bukti_ttd
    public function simpan_data_pencairan()
    {
        //upload bilyet
        $targetDir = "upload/funding/"; // Direktori untuk menyimpan file yang diunggah
        $uploadOk = true;

        // Mendapatkan ekstensi file yang diunggah
        $fileType = strtolower(pathinfo($_FILES["bilyet"]["name"], PATHINFO_EXTENSION));

        // Path lengkap ke file yang diunggah
        $targetFile = $targetDir . basename($_FILES["bilyet"]["name"]);

        // Function untuk menangani unggahan file
        function handleFileUpload($targetFile, $fileType)
        {
            global $uploadOk;

            // Check if it's a PDF file
            if ($fileType === 'pdf') {
                // Simpan nama file PDF ke dalam variabel $_POST['bilyet']
                $_POST['bilyet'] = $_FILES["bilyet"]["name"];

                // Move the PDF file to the specific directory
                if (move_uploaded_file($_FILES["bilyet"]["tmp_name"], $targetFile)) {
                    echo "The PDF file has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your PDF file.";
                }
            } else {
                // Check if it's an image file
                if (!getimagesize($_FILES["bilyet"]["tmp_name"])) {
                    echo "File is not a valid image.";
                    $uploadOk = false;
                } else {
                    // Simpan nama file gambar ke dalam variabel $_POST['bilyet']
                    $_POST['bilyet'] = $_FILES["bilyet"]["name"];

                    // Move the image file to the specific directory if uploadOk is still true
                    if (move_uploaded_file($_FILES["bilyet"]["tmp_name"], $targetFile)) {
                        echo "The image file has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your image file.";
                    }
                }
            }
        }

        // Check if file already exists
        if (file_exists($targetFile)) {
            echo "Sorry, the file already exists.";
            $uploadOk = false;
        }

        // Check file size (adjust as needed)
        if ($_FILES["bilyet"]["size"] > 10 * 1024 * 1024) { // 10 MB
            echo "Sorry, your file is too large.";
            $uploadOk = false;
        }

        // Allow only certain file formats (you can customize this)
        $allowedFileTypes = array("jpg", "jpeg", "png", "gif", "pdf");
        if (!in_array($fileType, $allowedFileTypes)) {
            echo "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
            $uploadOk = false;
        }

        // Handle file upload if uploadOk is still true
        if ($uploadOk) {
            handleFileUpload($targetFile, $fileType);
        }
        //upload bukti_ttd
        $targetDirBukti = "upload/funding/bukti/"; // Direktori untuk menyimpan file yang diunggah
        $uploadOkBukti = true;

        // Mendapatkan ekstensi file yang diunggah
        $fileTypeBukti = strtolower(pathinfo($_FILES["bukti_ttd"]["name"], PATHINFO_EXTENSION));

        // Path lengkap ke file yang diunggah
        $targetFileBukti = $targetDirBukti . basename($_FILES["bukti_ttd"]["name"]);

        // Function untuk menangani unggahan file
        function handleFileUpload1($targetFileBukti, $fileTypeBukti)
        {
            global $uploadOkBukti;
            // Pengecekan apakah ada file yang diunggah
            if (!empty($_FILES["bukti_ttd"]["name"])) {
                // Check if it's a PDF file
                if ($fileTypeBukti === 'pdf') {
                    // Simpan nama file PDF ke dalam variabel $_POST['bilyet']
                    $_POST['bukti_ttd'] = $_FILES["bukti_ttd"]["name"];

                    // Move the PDF file to the specific directory
                    if (move_uploaded_file($_FILES["bukti_ttd"]["tmp_name"], $targetFileBukti)) {
                        echo "The PDF file has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your PDF file.";
                    }
                } else {
                    // Check if it's an image file
                    $image_info = @getimagesize($_FILES["bukti_ttd"]["tmp_name"]);
                    if (!$image_info) {
                        echo "File is not a valid image.";
                        $uploadOkBukti = false;
                    } else {
                        // Simpan nama file gambar ke dalam variabel $_POST['bilyet']
                        $_POST['bukti_ttd'] = $_FILES["bukti_ttd"]["name"];

                        // Move the image file to the specific directory if uploadOk is still true
                        if (move_uploaded_file($_FILES["bukti_ttd"]["tmp_name"], $targetFileBukti)) {
                            echo "The image file has been uploaded.";
                        } else {
                            echo "Sorry, there was an error uploading your image file.";
                        }
                    }
                }
            }
        }

        // Check if file already exists
        if (file_exists($targetFileBukti)) {
            echo "Sorry, the file already exists.";
            $uploadOk = false;
        }

        // Check file size (adjust as needed)
        if ($_FILES["bukti_ttd"]["size"] > 10 * 1024 * 1024) { // 10 MB
            echo "Sorry, your file is too large.";
            $uploadOk = false;
        }

        // Allow only certain file formats (you can customize this)
        $allowedFileTypes = array("jpg", "jpeg", "png", "gif", "pdf");
        if (!in_array($fileTypeBukti, $allowedFileTypes)) {
            echo "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
            $uploadOk = false;
        }

        // Handle file upload if uploadOk is still true
        if ($uploadOkBukti) {
            handleFileUpload1($targetFileBukti, $fileTypeBukti);
        }

        // Simpan tanda tangan digital ke dalam folder di htdocs
        if (!empty($_POST['ttd_nasabah'])) {
            // Jika tanda tangan diambil dari canvas
            $imgData = $_POST['ttd_nasabah'];
            $imgData = str_replace('data:image/png;base64,', '', $imgData);
            $imgData = str_replace(' ', '+', $imgData);
            $imgBinary = base64_decode($imgData);

            $filePath = 'upload/ttd/';
            $nama = str_replace(' ', '', $_POST['nama_nasabah']);
            $ttdName = uniqid('ttd_' . $nama) . '.png';

            file_put_contents($filePath . $ttdName, $imgBinary);
            echo 'Tanda tangan dari canvas berhasil disimpan dengan nama file: ' . $ttdName;
        } elseif (!empty($_FILES['hiddenFileTtd']['tmp_name'])) {
            // Jika tanda tangan diambil dari file input tersembunyi
            $uploadDir = 'upload/ttd/';
            $nama = str_replace(' ', '', $_POST['nama_nasabah']);
            $ttdName = uniqid('ttd_' . $nama) . '.png';
            $filePath = $uploadDir . $ttdName;

            if (move_uploaded_file($_FILES['hiddenFileTtd']['tmp_name'], $filePath)) {
                echo 'Tanda tangan dari file berhasil disimpan dengan nama file: ' . $ttdName;
            } else {
                echo 'Gagal menyimpan tanda tangan dari file.';
            }
        } else {
            echo 'Data tanda tangan tidak diterima.';
        }

        $data['id_terbesar'] = $this->model('m_cs_funding')->kode_terbesar_pencairan();
        $kode = $data['id_terbesar']['kode_terbesar'];
        $urutan = (int) substr($kode, 4, 6);
        $urutan++;
        $huruf = "PSJT";
        $id_permohonan = $huruf . sprintf("%06s", $urutan);
        $_POST['id_permohonan'] = $id_permohonan;

        $_POST['bilyet'] = $_FILES["bilyet"]["name"];
        $_POST['bukti_ttd'] = $_FILES["bukti_ttd"]["name"];

        echo $_POST['bilyet'];
        $_POST['ttd_nasabah'] = $ttdName;
       
        $_POST['nama_nasabah'] = $_POST['nama_nasabah'];
        $_POST['status_nasabah'] = isset($_POST['status_nasabah']) ? $_POST['status_nasabah'] : null;
        $_POST['user_create'] = $_COOKIE['username'];

        $simpan_data = $this->model('m_cs_funding')->simpan_data_pencairan();

        // Menyimpan data pemohon
        $simpan_pemohon = $this->model('m_rc_log')->simpan_pemohon($_POST);
        if ($simpan_data > 0 && $simpan_pemohon > 0) {
            //  Jika kedua simpanan berhasil, arahkan ke halaman tertentu
            header('Location:' . BASEURL . '/cs_funding/pencairan_sebelum_jatuh_tempo');
        } else {
            echo "gagal";
        }
    }

    public function edit_permohonan_pencairan($id)
    {
        $_POST['id_permohonan'] =  $id;
        $data['data_produk'] = $this->model('m_cs_funding')->get_data_produk_pencairan();
        $data['jangka_waktu'] = $this->model('m_cs_funding')->get_data_jangka_waktu_pencairan();
        $data['jw_golden_age'] = $this->model('m_cs_funding')->get_jangka_waktu();
        $data['jw'] = $this->model('m_cs_funding')->jangka_waktu();
        $data['jw_prima'] = $this->model('m_cs_funding')->jangka_waktu_prima();
        $data['data_id'] =  $this->model('m_cs_funding')->lihat_data_id($_POST);
        $data['data_funding'] = $this->model('m_cs_funding')->nama_funding();
        $this->view('cs_funding/edit_permohonan_pencairan', $data);
    }

    public function pengajuan_ulang_suku_bunga($id)
    {
        $_POST['id_permohonan'] =  $id;
        $data['data_id'] =  $this->model('m_cs_funding')->lihat_data_id($_POST);
        $data['jangka_waktu'] = $this->model('m_cs_funding')->get_data_jangka_waktu_pencairan();
        $this->view('cs_funding/pengajuan_ulang_suku_bunga', $data);
    }

    public function form_pengajuan_ulang($id)
    {
        $_POST['id_permohonan'] =  $id;
        $data['data_produk'] = $this->model('m_cs_funding')->get_data_produk_pencairan();
        $data['jangka_waktu'] = $this->model('m_cs_funding')->get_data_jangka_waktu();
        $data['data_id'] =  $this->model('m_cs_funding')->lihat_data_id($_POST);
        $this->view('cs_funding/form_pengajuan_ulang', $data);
    }

    function update_pengajuan_ulang_suku_bunga()
    {
        // $update = $this->model('m_cs_funding')->update_pengajuan_ulang_suku_bunga();

        // if ($update > 0) {
        $_POST['id_permohonan'] = $_POST['id_permohonan'];
        $_POST['nama_pemohon'] = $_POST['nama_nasabah'];
        if ($this->model('m_cs_funding')->update_pengajuan_ulang_suku_bunga() > 0 && $this->model('m_rc_log')->ajukan_ulang($_POST) > 0) {
            header('Location:' . BASEURL . '/cs_funding/suku_bunga');
        } else {

            header('Location:' . BASEURL . '/cs_funding/pengajuan_ulang_suku_bunga');
        }
    }

    function update_pengajuan_ulang_pencairan()
    {
        // $update = $this->model('m_cs_funding')->update_pengajuan_ulang_pencairan();

        // if ($update > 0) {
        $_POST['id_permohonan'] = $_POST['id_permohonan'];
        $_POST['nama_pemohon'] = $_POST['nama_nasabah'];
        if ($this->model('m_cs_funding')->update_pengajuan_ulang_pencairan() > 0 && $this->model('m_rc_log')->ajukan_ulang($_POST) > 0) {
            header('Location:' . BASEURL . '/cs_funding/pencairan_sebelum_jatuh_tempo');
        } else {

            header('Location:' . BASEURL . '/cs_funding/form_pengajuan_ulang');
        }
    }

    public function update_data_pencairan()
    {
        $targetDir = "upload/funding/bukti/"; // Direktori untuk menyimpan file yang diunggah

        $uploadOk = true;

        // Mendapatkan ekstensi file yang diunggah
        $fileType = strtolower(pathinfo($_FILES["bukti_manual"]["name"], PATHINFO_EXTENSION));

        // Path lengkap ke file yang diunggah
        $targetFile = $targetDir . basename($_FILES["bukti_manual"]["name"]);

        // Function untuk menangani unggahan file
        function handleFileUploadBuktiManualPencairan($targetFile, $fileType)
        {
            global $uploadOk;

            // Check if it's a PDF file
            if ($fileType === 'pdf') {
                // Move the PDF file to the specific directory
                if (move_uploaded_file($_FILES["bukti_manual"]["tmp_name"], $targetFile)) {
                    $_POST['bukti_manual'] = basename($_FILES["bukti_manual"]["name"]);
                    return true;
                } else {
                    echo "Sorry, there was an error uploading your PDF file.";
                    $uploadOk = false;
                    return false;
                }
            } else {
                // Check if it's an image file
                if (!getimagesize($_FILES["bukti_manual"]["tmp_name"])) {
                    echo "File is not a valid image.";
                    $uploadOk = false;
                    return false;
                } else {
                    // Move the image file to the specific directory if uploadOk is still true
                    if (move_uploaded_file($_FILES["bukti_manual"]["tmp_name"], $targetFile)) {
                        $_POST['bukti_manual'] = basename($_FILES["bukti_manual"]["name"]);
                        return true;
                    } else {
                        echo "Sorry, there was an error uploading your image file.";
                        $uploadOk = false;
                        return false;
                    }
                }
            }
        }

        // Check if file already exists
        if (file_exists($targetFile)) {
            echo "Sorry, the file already exists.";
            $uploadOk = false;
        }

        // Check file size (adjust as needed)
        if ($_FILES["bukti_manual"]["size"] > 10 * 1024 * 1024) { // 10 MB
            echo "Sorry, your file is too large.";
            $uploadOk = false;
        }

        // Allow only certain file formats (you can customize this)
        $allowedFileTypes = array("jpg", "jpeg", "png", "gif", "pdf");
        if (!in_array($fileType, $allowedFileTypes)) {
            echo "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
            $uploadOk = false;
        }

        // Handle file upload if uploadOk is still true
        if ($uploadOk) {
            if (handleFileUploadBuktiManualPencairan($targetFile, $fileType)) {
                echo "Nama file yang diunggah: " . $_POST['bukti_ttd'];
            }
        }
        $_POST['bukti_manual'] = $_FILES["bukti_manual"]["name"];
        $_POST['bukti_persetujuan_manual'] = $_POST['bukti_persetujuan_manual'];
        if (isset($_POST['status_nasabah'])) {
            $_POST['status_nasabah'] = 'NASABAH PRIORITY';
        } else {
            $_POST['status_nasabah'] = null;
        }
        
        // $update = $this->model('m_cs_funding')->update_data_pencairan();
        // if ($update > 0) {
        if ($this->model('m_cs_funding')->update_data_pencairan() > 0 && $this->model('m_rc_log')->update_pemohon($_POST) > 0) {
            header('Location:' . BASEURL . '/cs_funding/pencairan_sebelum_jatuh_tempo');
        } else {

            header('Location:' . BASEURL . '/cs_funding/edit_permohonan_pencairan');
        }
    }
    

    // ada bukti upload ttd
    public function simpan_data_suku_bunga()
    {
        $targetDir = "upload/funding/bukti/"; // Direktori untuk menyimpan file yang diunggah

        $uploadOk = true;

        // Mendapatkan ekstensi file yang diunggah
        $fileType = strtolower(pathinfo($_FILES["bukti_ttd"]["name"], PATHINFO_EXTENSION));

        // Path lengkap ke file yang diunggah
        $targetFile = $targetDir . basename($_FILES["bukti_ttd"]["name"]);

        // Function untuk menangani unggahan file
        function handleFileUploadBukti($targetFile, $fileType)
        {
            global $uploadOk;

            // Check if it's a PDF file
            if ($fileType === 'pdf') {
                // Move the PDF file to the specific directory
                if (move_uploaded_file($_FILES["bukti_ttd"]["tmp_name"], $targetFile)) {
                    $_POST['bukti_ttd'] = basename($_FILES["bukti_ttd"]["name"]);
                    return true;
                } else {
                    echo "Sorry, there was an error uploading your PDF file.";
                    $uploadOk = false;
                    return false;
                }
            } else {
                // Check if it's an image file
                if (!getimagesize($_FILES["bukti_ttd"]["tmp_name"])) {
                    echo "File is not a valid image.";
                    $uploadOk = false;
                    return false;
                } else {
                    // Move the image file to the specific directory if uploadOk is still true
                    if (move_uploaded_file($_FILES["bukti_ttd"]["tmp_name"], $targetFile)) {
                        $_POST['bukti_ttd'] = basename($_FILES["bukti_ttd"]["name"]);
                        return true;
                    } else {
                        echo "Sorry, there was an error uploading your image file.";
                        $uploadOk = false;
                        return false;
                    }
                }
            }
        }

        // Check if file already exists
        if (file_exists($targetFile)) {
            echo "Sorry, the file already exists.";
            $uploadOk = false;
        }

        // Check file size (adjust as needed)
        if ($_FILES["bukti_ttd"]["size"] > 10 * 1024 * 1024) { // 10 MB
            echo "Sorry, your file is too large.";
            $uploadOk = false;
        }

        // Allow only certain file formats (you can customize this)
        $allowedFileTypes = array("jpg", "jpeg", "png", "gif", "pdf");
        if (!in_array($fileType, $allowedFileTypes)) {
            echo "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
            $uploadOk = false;
        }

        // Handle file upload if uploadOk is still true
        if ($uploadOk) {
            if (handleFileUploadBukti($targetFile, $fileType)) {
                echo "Nama file yang diunggah: " . $_POST['bukti_ttd'];
            }
        }

        // Simpan tanda tangan digital ke dalam folder di htdocs
        if (!empty($_POST['ttd_nasabah'])) {
            // Jika tanda tangan diambil dari canvas
            $imgData = $_POST['ttd_nasabah'];
            $imgData = str_replace('data:image/png;base64,', '', $imgData);
            $imgData = str_replace(' ', '+', $imgData);
            $imgBinary = base64_decode($imgData);

            $filePath = 'upload/ttd/';
            $nama = str_replace(' ', '', $_POST['nama_nasabah']);
            $ttdName = uniqid('ttd_' . $nama) . '.png';

            file_put_contents($filePath . $ttdName, $imgBinary);
            echo 'Tanda tangan dari canvas berhasil disimpan dengan nama file: ' . $ttdName;
        } elseif (!empty($_FILES['hiddenFileTtd']['tmp_name'])) {
            // Jika tanda tangan diambil dari file input tersembunyi
            $uploadDir = 'upload/ttd/';
            $nama = str_replace(' ', '', $_POST['nama_nasabah']);
            $ttdName = uniqid('ttd_' . $nama) . '.png';
            $filePath = $uploadDir . $ttdName;

            if (move_uploaded_file($_FILES['hiddenFileTtd']['tmp_name'], $filePath)) {
                echo 'Tanda tangan dari file berhasil disimpan dengan nama file: ' . $ttdName;
            } else {
                echo 'Gagal menyimpan tanda tangan dari file.';
            }
        } else {
            echo 'Data tanda tangan tidak diterima.';
        }

        $data['id_terbesar'] = $this->model('m_cs_funding')->kode_terbesar_suku_bunga();
        $kode = $data['id_terbesar']['kode_terbesar'];
        $urutan = (int) substr($kode, 4, 6);
        $urutan++;
        $huruf = "SBK";
        $id_permohonan = $huruf . sprintf("%06s", $urutan);

        $_POST['nama_gambar_bukti'] = $_FILES["bukti_ttd"]["name"];
        $_POST['id_permohonan'] = $id_permohonan;
        $_POST['ttd_nasabah'] = $ttdName;
        $_POST['kode_cabang'] = $_COOKIE['kode_cabang'];
        $_POST['username'] = $_COOKIE['username'];
        $_POST['nama_nasabah'] = $_POST['nama_nasabah'];

        if ($this->model('m_cs_funding')->simpan_data_suku_bunga() > 0 && $this->model('m_rc_log')->simpan_pemohon($_POST) > 0) {
            header('Location:' . BASEURL . '/cs_funding/suku_bunga');
        } else {
            header('Location:' . BASEURL . '/cs_funding/form_suku_bunga');
        }
    }

    public function edit_permohonan_suku_bunga($id)
    {
        $_POST['id_permohonan'] =  $id;
        $data['data_produk'] = $this->model('m_funding')->get_data_produk();
        $data['jangka_waktu'] = $this->model('m_funding')->get_data_jangka_waktu();
        $data['data_suku_bunga'] =  $this->model('m_funding')->lihat_data_id($_POST);
        $data['data_funding'] = $this->model('m_cs_funding')->nama_funding();
        $this->view('cs_funding/edit_permohonan_suku_bunga', $data);
    }

    // public function update_data_suku_bunga()
    // {
    //     $_POST['id_permohonan'] = $_POST['id_permohonan'];
    //     $_POST['nama_nasabah'] = $_POST['nama_nasabah'];
    //     if ($this->model('m_cs_funding')->update_data_suku_bunga() > 0 && $this->model('m_rc_log')->update_pemohon($_POST) > 0) {

    //         header('Location:' . BASEURL . '/cs_funding/suku_bunga');
    //     } else {

    //         header('Location:' . BASEURL . '/cs_funding/edit_permohonan_suku_bunga');
    //     }
    // }

    public function update_data_suku_bunga()
    {
        $targetDir = "upload/funding/bukti/"; // Direktori untuk menyimpan file yang diunggah
        $uploadOk = true;
        $fileType = strtolower(pathinfo($_FILES["bukti_manual"]["name"], PATHINFO_EXTENSION));
        $targetFile = $targetDir . basename($_FILES["bukti_manual"]["name"]);
        function handleFileUploadBuktiManual($targetFile, $fileType)
        {
            global $uploadOk;
            if ($fileType === 'pdf') {
                // Move the PDF file to the specific directory
                if (move_uploaded_file($_FILES["bukti_manual"]["tmp_name"], $targetFile)) {
                    $_POST['bukti_manual'] = basename($_FILES["bukti_manual"]["name"]);
                    return true;
                } else {
                    echo "Sorry, there was an error uploading your PDF file.";
                    $uploadOk = false;
                    return false;
                }
            } else {
                // Check if it's an image file
                if (!getimagesize($_FILES["bukti_manual"]["tmp_name"])) {
                    echo "File is not a valid image.";
                    $uploadOk = false;
                    return false;
                } else {
                    // Move the image file to the specific directory if uploadOk is still true
                    if (move_uploaded_file($_FILES["bukti_manual"]["tmp_name"], $targetFile)) {
                        $_POST['bukti_manual'] = basename($_FILES["bukti_manual"]["name"]);
                        return true;
                    } else {
                        echo "Sorry, there was an error uploading your image file.";
                        $uploadOk = false;
                        return false;
                    }
                }
            }
        }

        // Check if file already exists
        if (file_exists($targetFile)) {
            echo "Sorry, the file already exists.";
            $uploadOk = false;
        }

        // Check file size (adjust as needed)
        if ($_FILES["bukti_manual"]["size"] > 10 * 1024 * 1024) { // 10 MB
            echo "Sorry, your file is too large.";
            $uploadOk = false;
        }

        // Allow only certain file formats (you can customize this)
        $allowedFileTypes = array("jpg", "jpeg", "png", "gif", "pdf");
        if (!in_array($fileType, $allowedFileTypes)) {
            echo "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
            $uploadOk = false;
        }

        // Handle file upload if uploadOk is still true
        if ($uploadOk) {
            if (handleFileUploadBuktiManual($targetFile, $fileType)) {
                echo "Nama file yang diunggah: " . $_POST['bukti_manual'];
            }
        }
        $_POST['bukti_manual'] = $_FILES["bukti_manual"]["name"];
        $_POST['bukti_persetujuan_manual'] = $_POST['bukti_persetujuan_manual'];
        $_POST['id_permohonan'] = $_POST['id_permohonan'];
        $_POST['nama_nasabah'] = $_POST['nama_nasabah'];
        if ($this->model('m_cs_funding')->update_data_suku_bunga() > 0 && $this->model('m_rc_log')->update_pemohon($_POST) > 0) {
            header('Location:' . BASEURL . '/cs_funding/suku_bunga');
        } else {
            header('Location:' . BASEURL . '/cs_funding/edit_permohonan_suku_bunga');
        }
    }
    public function  cek_btn_hapus()
    {

        $data['1'] = $this->model('m_cs_funding')->cek_btn_hapus();
        if ($data['1'] > 0) {
            echo '1';
        } else {
            echo "0";
        }
    }

    public function  cek_btn_telah_proses()
    {
        $data['1'] = $this->model('m_cs_funding')->cek_btn_telah_proses();
        if ($data['1'] > 0) {
            echo '1';
        } else {
            echo "0";
        }
    }

    public function delete()
    {
        // $_POST['id'] = $id;
        $_POST['id_permohonan'];


        if ($this->model('m_cs_funding')->delete($_POST) > 0 && $this->model('m_rc_log')->hapus_pemohon($_POST) > 0) {
            echo "sukses";
        } else {
            echo "gagal";
        }
    }

    public function update()
    {
        // $_POST['id'] = $id;
        $_POST['id_permohonan'] = $_POST['id_permohonan'];
        $_POST['nama_pemohon'] = $_POST['nama_nasabah'];


        if ($this->model('m_cs_funding')->update($_POST) > 0 && $this->model('m_rc_log')->proses_cbs($_POST) > 0) {
            echo "sukses";
        } else {
            echo "gagal";
        }
    }
    public function  cek_btn_lanjutkan()
    {
        $data['1'] = $this->model('m_cs_funding')->cek_btn_lanjutkan();
        if ($data['1'] > 0) {
            echo '1';
        } else {
            echo "0";
        }
    }

    public function  cek_btn_tolak()
    {
        $data['1'] = $this->model('m_cs_funding')->cek_btn_tolak();
        if ($data['1'] > 0) {
            echo '1';
        } else {
            echo "0";
        }
    }

    public function tolak()
    {
        // $_POST['id'] = $id;
        $_POST['id_permohonan'];
        if ($this->model('m_cs_funding')->tolak($_POST) > 0) {
            echo "sukses";
        } else {
            echo "gagal";
        }
    }

    public function modal_detail()
    {
        $data['detail'] = $this->model('m_funding')->modal_detail($_POST);
        if ($data['detail']['status_permohonan'] == 'DIBATALKAN') {
            $this->view('cs_funding/v_modal_suku_batal', $data);
        } else {
            $this->view('cs_funding/v_modal_detail', $data);
        }
    }

    public function modal_detail_pencairan()
    {
        $data['detail'] = $this->model('m_funding')->modal_detail($_POST);
        if ($data['detail']['status_permohonan'] == 'DIBATALKAN') {
            $this->view('cs_funding/v_modal_pencairan_batal', $data);
        } else {
            $this->view('cs_funding/v_modal_detail_pencairan', $data);
        }
    }

    public function permohonan_pencairan_disetujui()
    {
        $this->view('cs_funding/permohonan_pencairan_disetujui');
    }
    public function suku_bunga_disetujui()
    {
        $this->view('cs_funding/suku_bunga_disetujui');
    }

    public function formulir_persetujuan($id)
    {
        $detail = $this->model('m_funding')->formulir_persetujuan($id);
        // Ambil data yang diperlukan dari hasil query
        $id_permohonan = $detail[0]['id_permohonan'];
        $kantor_cabang = $detail[0]['kantor_cabang'];
        $nama = $detail[0]['nama_nasabah'];
        $produk = $detail[0]['jenis_produk'];
        $jenis_rekening = ($produk == 'SI MITRA') ? 'TABUNGAN' : 'DEPOSITO';

        $nomor_identitas = $detail[0]['nomor_identitas'];
        $alamat = $detail[0]['alamat'];
        $nomor_telepon = $detail[0]['nomor_telepon'];
        $nominal = $detail[0]['nominal'];
        $norek = $detail[0]['nomor_rekening_deposito'];
        $jangka_waktu = $detail[0]['jangka_waktu'];
        $nominal_penalti = $detail[0]['nominal_penalti'];
        $jumlah_hari = $detail[0]['jumlah_hari'];
        $nominal_bunga_berjalan = $detail[0]['nominal_bunga_berjalan'];
        $permohonan_pencairan = $detail[0]['jenis_permohonan_pencairan_sebelum_jt_pengajuan'];
        $approval = $detail[0]['jenis_permohonan_pencairan_sebelum_jt_approval'];
        $user_approval = $detail[0]['username_approval'];
        $waktu_approve = $detail[0]['tgl_approval'];
        $status = $detail[0]['status_permohonan'];
        $tgl_permohonan = $detail[0]['tgl_permohonan'];
        $ttd = $detail[0]['ttd_nasabah'];

        // untuk data function cetak_formulir
        $_POST['id_permohonan'] = $id_permohonan;
        $_POST['kode_cabang'] = $_COOKIE['kode_cabang'];
        $_POST['username'] = $_COOKIE['username'];
        $_POST['nama_pemohon'] = $nama;
        // Menggunakan file gambar.docx sebagai template
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('cetak_funding/persetujuan.docx');
        try {
            // Proses penggantian nilai pada template
            $templateProcessor->setValue('nama_cabang', $kantor_cabang);
            $templateProcessor->setValue('nomor_identitas', $nomor_identitas);
            $templateProcessor->setValue('nama_nasabah', $nama);
            $templateProcessor->setValue('alamat', $alamat);
            $templateProcessor->setValue('nomor_telepon', $nomor_telepon);
            $templateProcessor->setValue('produk', $produk);
            $templateProcessor->setValue('nominal', number_format($nominal, 0, ',', '.'));
            $templateProcessor->setValue('norek', $norek);
            $templateProcessor->setValue('jangka_waktu', $jangka_waktu);
            $templateProcessor->setValue('nom_penalti',  number_format($nominal_penalti, 0, ',', '.'));
            $templateProcessor->setValue('jumlah_hari',  $jumlah_hari);
            $templateProcessor->setValue('bunga_berjalan', number_format($nominal_bunga_berjalan, 0, ',', '.'));
            $templateProcessor->setValue('tgl_permohonan', date('j F Y', strtotime($tgl_permohonan)));
            $templateProcessor->setValue('nama_approval', $user_approval);
            $templateProcessor->setValue('approve', $approval);
            $templateProcessor->setValue('apa', $jenis_rekening);
            $templateProcessor->setValue('permohonan_pencairan', $permohonan_pencairan);
            $templateProcessor->setValue('waktu_approve', date('j F Y', strtotime($waktu_approve)));
            $templateProcessor->setValue('status', $status);
            $imagePath = 'upload/ttd/' . $ttd;
            $templateProcessor->setImageValue('gambar_ttd', array('path' => $imagePath, 'width' => 220, 'height' => 300));
            ob_start();
            $templateProcessor->saveAs('php://output');
            $content = ob_get_clean();
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: inline; filename="formulir_persetujuan.docx"');
            header('Content-Length: ' . strlen($content));
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Expires: 0');
            header('Pragma: public');
            echo $content;
            if ($this->model('m_funding')->formulir_persetujuan($_POST) > 0 && $this->model('m_rc_log')->cetak_formulir($_POST) > 0) {
                echo "sukses";
            } else {
                echo "gagal";
            }
            exit;
        } catch (\Exception $e) {
            echo 'Terjadi kesalahan: ' . $e->getMessage();
        }
    }

    public function formulir_persetujuan_suku_bunga($id)
    {
        $detail = $this->model('m_cs_funding')->formulir_persetujuan($id);
        // Ambil data yang diperlukan dari hasil query
        $id_permohonan = $detail[0]['id_permohonan'];
        $kantor_cabang = $detail[0]['kantor_cabang'];
        $nama = $detail[0]['nama_nasabah'];
        $status_nasabah = $detail[0]['status_nasabah'];
        $produk = $detail[0]['jenis_produk'];
        $jenis_rekening = ($produk == 'SI MITRA') ? 'TABUNGAN' : 'DEPOSITO';
        $nomor_identitas = $detail[0]['nomor_identitas'];
        $alamat = $detail[0]['alamat'];
        $nomor_telepon = $detail[0]['nomor_telepon'];
        $nominal = $detail[0]['nominal'];
        $norek = $detail[0]['nomor_rekening_deposito'] !== '' ? $detail[0]['nomor_rekening_deposito'] : '-';

        $jangka_waktu = $detail[0]['jangka_waktu'];
        $suku_bunga = $detail[0]['nilai_suku_bunga_pengajuan'];
        $jenis_rekening = ($produk == 'SI MITRA') ? 'TABUNGAN' : 'DEPOSITO';
        $approval = $detail[0]['nilai_suku_bunga_approval'];
        $user_approval = $detail[0]['username_approval'];
        $tgl_permohonan = $detail[0]['tgl_permohonan'];
        $waktu_approve = $detail[0]['tgl_approval'];
        $status = $detail[0]['status_permohonan'];
        $ttd = $detail[0]['ttd_nasabah'];

        // untuk data function cetak_formulir
        $_POST['id_permohonan'] = $id_permohonan;
        $_POST['kode_cabang'] = $_COOKIE['kode_cabang'];
        $_POST['username'] = $_COOKIE['username'];
        $_POST['nama_pemohon'] = $nama;

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('cetak_funding/formulir_persetujuan_suku_bunga.docx');
        try {
            // Proses penggantian nilai pada template
            $templateProcessor->setValue('kantor_cabang', $kantor_cabang);
            $templateProcessor->setValue('nomor_identitas', $nomor_identitas);
            $templateProcessor->setValue('apa', $jenis_rekening);
            $templateProcessor->setValue('nama_nasabah', $nama);
            $templateProcessor->setValue('alamat', $alamat);
            $templateProcessor->setValue('status_nasabah', $status_nasabah);
            $templateProcessor->setValue('nomor_telepon', $nomor_telepon);
            $templateProcessor->setValue('produk', $produk);
            $templateProcessor->setValue('nominal', number_format($nominal, 0, ',', '.'));
            $templateProcessor->setValue('norek', $norek);
            $templateProcessor->setValue('jangka_waktu', $jangka_waktu);
            $templateProcessor->setValue('suku_bunga',  $suku_bunga);
            $templateProcessor->setValue('tgl_permohonan', date('j F Y', strtotime($tgl_permohonan)));
            $templateProcessor->setValue('nama_approval', $user_approval);
            $templateProcessor->setValue('apa', $jenis_rekening);
            $templateProcessor->setValue('approve', $approval);
            $templateProcessor->setValue('waktu_approve', date('j F Y', strtotime($waktu_approve)));
            $templateProcessor->setValue('status', $status);

            // Path gambar yang akan dimasukkan
            $imagePath = 'upload/ttd/' . $ttd;

            // Mengganti placeholder dengan gambar
            $templateProcessor->setImageValue('ttd', array('path' => $imagePath, 'width' => 220, 'height' => 300));

            // // Simpan hasilnya ke dalam file output.docx
            // $outputFilePath = 'cetak_funding/formulir_persetujuan.docx';
            // $templateProcessor->saveAs($outputFilePath);

            // Simpan hasilnya ke dalam output buffer
            ob_start();
            $templateProcessor->saveAs('php://output');
            $content = ob_get_clean();

            // Atur header untuk menampilkan dokumen Word
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: inline; filename="formulir_persetujuan.docx"');
            header('Content-Length: ' . strlen($content));
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Expires: 0');
            header('Pragma: public');
            // Keluarkan konten dokumen
            echo $content;
            if ($this->model('m_funding')->formulir_persetujuan($_POST) > 0 && $this->model('m_rc_log')->cetak_formulir($_POST) > 0) {
                echo "sukses";
            } else {
                echo "gagal";
            }
            exit;
        } catch (\Exception $e) {
            echo 'Terjadi kesalahan: ' . $e->getMessage();
        }
    }
    // OUTPUT FILE PDT (TAPI BELUM JADI)
    // public function formulir_persetujuan_suku_bunga($id)
    // {
    //     $detail = $this->model('m_cs_funding')->formulir_persetujuan($id);
    //     // Ambil data yang diperlukan dari hasil query
    //     // $id_permohonan = $detail[0]['id_permohonan'];
    //     $kantor_cabang = $detail[0]['kantor_cabang'];
    //     $nama = $detail[0]['nama_nasabah'];
    //     $status_nasabah = $detail[0]['status_nasabah'];
    //     $produk = $detail[0]['jenis_produk'];
    //     $jenis_rekening = ($produk == 'SI MITRA') ? 'TABUNGAN' : 'DEPOSITO';
    //     $cif = $detail[0]['cif'];
    //     $alamat = $detail[0]['alamat'];
    //     $nomor_telepon = $detail[0]['nomor_telepon'];
    //     $nominal = $detail[0]['nominal'];
    //     $norek = $detail[0]['nomor_rekening_deposito'] !== '' ? $detail[0]['nomor_rekening_deposito'] : '-';

    //     $jangka_waktu = $detail[0]['jangka_waktu'];
    //     $suku_bunga = $detail[0]['nilai_suku_bunga_pengajuan'];
    //     $jenis_rekening = ($produk == 'SI MITRA') ? 'TABUNGAN' : 'DEPOSITO';
    //     $approval = $detail[0]['nilai_suku_bunga_approval'];
    //     $user_approval = $detail[0]['username_approval'];
    //     $tgl_permohonan = $detail[0]['tgl_permohonan'];
    //     $waktu_approve = $detail[0]['tgl_approval'];
    //     $status = $detail[0]['status_permohonan'];
    //     $ttd = $detail[0]['ttd_nasabah'];

    //     $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('cetak_funding/formulir_persetujuan_suku_bunga.docx');
    //     try {
    //         // Proses penggantian nilai pada template
    //         $templateProcessor->setValue('kantor_cabang', $kantor_cabang);
    //         $templateProcessor->setValue('cif', $cif);
    //         $templateProcessor->setValue('apa', $jenis_rekening);
    //         $templateProcessor->setValue('nama_nasabah', $nama);
    //         $templateProcessor->setValue('alamat', $alamat);
    //         $templateProcessor->setValue('status_nasabah', $status_nasabah);
    //         $templateProcessor->setValue('nomor_telepon', $nomor_telepon);
    //         $templateProcessor->setValue('produk', $produk);
    //         $templateProcessor->setValue('nominal', number_format($nominal, 0, ',', '.'));
    //         $templateProcessor->setValue('norek', $norek);
    //         $templateProcessor->setValue('jangka_waktu', $jangka_waktu);
    //         $templateProcessor->setValue('suku_bunga',  $suku_bunga);
    //         $templateProcessor->setValue('tgl_permohonan', date('j F Y', strtotime($tgl_permohonan)));
    //         $templateProcessor->setValue('nama_approval', $user_approval);
    //         $templateProcessor->setValue('apa', $jenis_rekening);
    //         $templateProcessor->setValue('approve', $approval);
    //         $templateProcessor->setValue('waktu_approve', date('j F Y', strtotime($waktu_approve)));
    //         $templateProcessor->setValue('status', $status);

    //         // Path gambar yang akan dimasukkan
    //         $imagePath = 'upload/ttd/' . $ttd;

    //         // Mengganti placeholder dengan gambar
    //         $templateProcessor->setImageValue('ttd', array('path' => $imagePath, 'width' => 220, 'height' => 300));

    //         $wordFile = 'output.docx';
    //         $templateProcessor->saveAs($wordFile); // Simpan dokumen Word

    //         // Set Dompdf sebagai renderer PDF
    //         \PhpOffice\PhpWord\Settings::setPdfRendererName(\PhpOffice\PhpWord\Settings::PDF_RENDERER_DOMPDF);
    //         \PhpOffice\PhpWord\Settings::setPdfRendererPath('C:\composer\vendor\dompdf>'); // Ganti dengan jalur yang sesuai


    //         // Convert Word ke PDF menggunakan PHPWord dan Dompdf
    //         $phpWord = \PhpOffice\PhpWord\IOFactory::load($wordFile);
    //         $pdfWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'PDF');
    //         $pdfFile = 'output.pdf';
    //         $pdfWriter->save($pdfFile);

    //         // Output PDF untuk diunduh
    //         header('Content-Description: File Transfer');
    //         header('Content-Type: application/pdf');
    //         header('Content-Disposition: inline; filename="formulir_persetujuan.pdf"');
    //         header('Content-Length: ' . filesize($pdfFile));
    //         header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    //         header('Expires: 0');
    //         header('Pragma: public');

    //         readfile($pdfFile);

    //         // Hapus file sementara setelah pengiriman
    //         unlink($wordFile);
    //         unlink($pdfFile);
    //         exit;
    //     } catch (\Exception $e) {
    //         echo 'Terjadi kesalahan: ' . $e->getMessage();
    //     }
    // }
}
