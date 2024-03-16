<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Permohonan Pencairan Sebelum Jatuh Tempo</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href=" <?= BASEURL ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href=" <?= BASEURL ?>/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href=" <?= BASEURL ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href=" <?= BASEURL ?>/assets/plugins/jqvmap/jqvmap.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href=" <?= BASEURL ?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href=" <?= BASEURL ?>/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href=" <?= BASEURL ?>/assets/plugins/summernote/summernote-bs4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="<?= BASEURL ?>/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.3.1/fabric.min.js"></script>

    <style>
        /* mengatur ukuran canvas tanda tangan  */
        canvas {
            border: 1px solid #ccc;
            border-radius: 0.5rem;
            width: 100%;
            height: 150px;
            /* height: 100%; */
        }

        .label-custom {
            display: block;
            white-space: nowrap;
            /* Untuk memastikan label tetap dalam satu baris */
        }

        .bintang-custom {
            display: inline-block;
            vertical-align: top;
            /* Untuk mengatur posisi vertikal dengan label */
        }
    </style>

</head>



<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">



        <!-- Navbar -->
        <?php $this->view('funding/navbar') ?>
        <!-- Navbar -->


        <!-- Side Bar -->
        <?php $this->view('funding/side_bar') ?>
        <!-- Side Bar -->




        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h3 class="m-0">Form Pencairan Sebelum Jatuh Tempo</h3>
                        </div>

                    </div>


                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <!-- container fluid -->
                <div class="container-fluid">




                    <form id="form_funding_tambah_permohonan_pencairan" id="form_update" action="<?= BASEURL ?>/funding/simpan_data_pencairan" method="POST" enctype="multipart/form-data">
                        <main class="content">
                            <div class="container-fluid p-0">
                                <div class="row ">
                                    <div class="col-12 col-lg-6 col-xxl-6 ">
                                        <div class="card flex-fill">
                                            <div class="card-body">
                                                <div class="form-group">

                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" value="<?= $_COOKIE['nama_cabang']  ?>" name="kantor_cabang" required>
                                                        <input type="hidden" class="form-control" value="<?= $_COOKIE['username'] ?>" name="nama_funding" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Alasan Pengajuan Permohonan</label><span class="ml-1" style="color:red;">*</span>
                                                        <select name="alasan_pengajuan" id="alasan_pengajuan" class="form-control" onchange="showDivLainnya(this)" required>
                                                            <option value="" disabled selected>- SILAHKAN PILIH -</option>
                                                            <option value="SUDAH LEBIH DARI 1 BULAN"> SUDAH LEBIH DARI 1 BULAN </option>
                                                            <option value="SUDAH JATUH TEMPO & DIPERPANJANG"> SUDAH JATUH TEMPO & DIPERPANJANG </option>
                                                            <option value="NASABAH REGULER"> NASABAH REGULER </option>
                                                            <option value="NASABAH LOYAL"> NASABAH LOYAL </option>
                                                            <option value="LAINNYA"> LAINNYA </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" style="display:none" id="hidden_div_lainnya">
                                                        <label class="col-form-label">Alasan Lainnya</label>
                                                        <input type="text" class="form-control" name="alasan_lain" oninput="this.value = this.value.toUpperCase()">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Jenis Produk</label><span class="ml-1" style="color:red;">*</span>
                                                        <!-- <select name="jenis_produk" class="form-control" id="jenis_produk" onchange="showDiv(this)" required> -->
                                                        <select name="jenis_produk" class="form-control" id="jenis_produk" onchange="loadData(this)" required>
                                                            <option value="" disabled selected>- SILAHKAN PILIH -</option>
                                                            <?php
                                                            foreach ($data['produk_pencairan'] as $row) :
                                                            ?>
                                                                <option value="<?= $row['nama_produk'] ?>" id="Si Mitra"><?= $row['nama_produk'] ?> </option>

                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Jenis Permohonan Pencairan Sebelum Jatuh Tempo<span class="ml-1" style="color:red;">*</span></label>
                                                        <select name="jenis_pencairan" class="form-control" id="jenis_pencairan" required>
                                                            <option value="" disabled selected>- SILAHKAN PILIH -</option>
                                                            <option value="DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN" id="DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN"> DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN </option>
                                                            <option value="DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN" id="DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN"> DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN </option>
                                                            <option value="TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN" id="TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN"> TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN </option>
                                                            <option value="TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN" id="TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN"> TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Jenis Kartu Identitas<span class="ml-1" style="color:red;">*</span></label>
                                                        <select name="jenis_kartu_identitas" class="form-control" id="jenis_kartu_identitas" onchange="showIdentitasLainnya(this)" required>
                                                            <option value="" disabled selected>- SILAHKAN PILIH -</option>
                                                            <option value="KTP" id="KTP"> KTP </option>
                                                            <option value="LAINNYA"> LAINNYA </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" style="display:none" id="hidden_identitas_lain">
                                                        <label class="col-form-label">Kartu Identitas Lainnya <span class="ml-1" style="color:red;">*</span></label>
                                                        <input type="text" class="form-control" id="identitas_lain" name="identitas_lain" placeholder="ex: AKTA KELAHIRAN" oninput="hanyaHuruf(event);this.value = this.value.toUpperCase()">
                                                        <label class="col-form-label">Nomor Kartu Identitas Lainnya<span class="ml-1" style="color:red;">*</span></label><span style="font-style: italic; margin-left: 5px; font-size: 8px; color: green;">(Nomor Identitas yang terdaftar di CBS)</span></label>
                                                        <input type="text" class="form-control" id="nomor_identitas_lain" name="nomor_identitas_lain" oninput="hanyaAngkaHuruf(event);this.value = this.value.toUpperCase()" maxlength="18">
                                                    </div>

                                                    <div class="form-group" style="display:none" id="hidden_nomor_ktp">
                                                        <label class="col-form-label">Nomor KTP</label><span class="ml-1" style="color:red;">*</span>
                                                        <input type="text" class="form-control" id="nomor_ktp" name="nomor_ktp" oninput="hanyaAngka(event); validateKTP(event)" maxlength="16">
                                                        <span id="ktpWarning" style="color:red; display:none;">Nomor KTP harus terdiri dari 16 digit !</span>
                                                    </div>

                                                    <div class="form-group" style="display: flex; align-items: center;">
                                                        <div style="flex-grow: 1;">
                                                            <label class="col-form-label">Nama Nasabah</label><span class="ml-1" style="color:red;">*</span>
                                                            <input type="text" class="form-control" name="nama_nasabah" oninput="hanyaHuruf(event);this.value = this.value.toUpperCase()" required>
                                                        </div>
                                                    </div>
                                                    <div style="display:none" id="hidden_status_nasabah">
                                                        <label class="col-form-label">Status Nasabah</label><span style="font-style: italic; margin-left: 5px; font-size: 8px; color: green;">(Dicentang jika nasabah yang mengajukan sudah disetujui oleh Direksi sebelumnya)</span>
                                                        <div class="input-group-text">
                                                            <label style="vertical-align: middle;">
                                                                <input type="checkbox" id="status_nasabah" name="status_nasabah" value="Nasabah Priority" aria-label="Checkbox for following text input" style="vertical-align: middle;">
                                                                Nasabah Priority
                                                            </label>

                                                        </div>
                                                    </div>


                                                    <!-- <div class="form-group" style="display: flex; align-items: center; margin-top: 10px;">
                                                        <div style="flex-grow: 1;">
                                                            <label class="col-form-label" style="margin-right: 5px;">Status Nasabah :</label>
                                                            <input type="checkbox" id="status_nasabah" name="status_nasabah" value="Nasabah Priority" ">
                                                            <label for="prioritas" style="margin-left: 3px;">Nasabah Priority</label>
                                                        </div>
                                                    </div> -->

                                                    <div class="form-group">
                                                        <label for="alamat-text" class="col-form-label">Alamat</label><span class="ml-1" style="color:red;">*</span>
                                                        <textarea class="form-control" name="alamat" oninput="this.value = this.value.toUpperCase()" required></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Nomor Telepon</label><span class="ml-1" style="color:red;">*</span>
                                                        <input type="text" class="form-control" name="nomor_telepon" oninput="hanyaAngka(event)" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Nominal</label><span class="ml-1" style="color:red;">*</span>
                                                        <input type="text" class="form-control" name="nominal" id="nominal" oninput="hanyaAngka(event); tandaPemisahTitik(this)" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label label_custom" style="display:none" id="label_suku_bunga_deposito">Suku Bunga Deposito<span class="ml-1 bintang-custom" id="bintang_suku_bunga" style="color:red;">*</span> </label>
                                                        <input type="hidden" class="form-control" name="suku_bunga_deposito" id="hidden_suku_bunga_deposito" placeholder="Ex. 0.50" oninput="hanyaAngka(event)" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tgl_pembentukan" class="col-form-label label_costum" id="label_tgl_pembentukan" style="display: none">Tanggal Pembentukan <span class="ml-1 bintang-custom" id="bintang_tgl_pembentukan" style="color:red;">*</span></label>
                                                        <label for="tgl_pembentukan" class="col-form-label label_costum" id="label_tgl_perpanjangan" style="display: none">Tanggal Perpanjangan <span class="ml-1 bintang-custom" id="bintang_tgl_perpanjangan" style="color:red;">*</span></label>

                                                        <input type="date" class="form-control" id="tgl_pembentukan_visible" style="display: none" name="tgl_pembentukan_visible" onchange="myFunction(this.value)" max="" required>
                                                        <input type="hidden" id="tgl_pembentukan_hidden" name="tgl_pembentukan_hidden">
                                                    </div>
                                                    <div class="form-group">
                                                        <label id="label_jangka_Waktu" class="col-form-label" style="display: none">Jangka Waktu <span class="ml-1 bintang_custom" id="bintang_jangka_waktu" style="color:red;">*</span></label>
                                                        <select id="jangka_waktu" name="jangka_waktu" style="display: none" class="form-control" required>
                                                        </select>
                                                        <!-- <label id="label_jangka_Waktu" class="col-form-label">Jangka Waktu <span class="ml-1 bintang_custom" id="bintang_jangka_waktu" style="color:red;">*</span></label>
                                                        <select id="jangka_waktu" name="jangka_waktu" class="form-control" required>

                                                        </select> -->
                                                    </div>
                                                    <div>
                                                        <label class="col-form-label label-custom" id="label_norek_deposito" style="display: none">Nomor Rekening Deposito<span class="bintang-custom" style="color:red"> *</span></label>
                                                        <input type="hidden" id="norek_deposito" class="form-control" name="norek_deposito" oninput="hanyaAngka(event)" required>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xxl-6 ">
                                        <div class="card flex-fill">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label class="col-form-label label-custom" style="display:none" id="label_nominal_penalti">Nominal Penalti<span class="ml-1 bintang-custom" id="bintang_penalti" style="color:red">*</span></label>
                                                    <input type="hidden" class="form-control" name="nominal_penalti" id="hidden_nominal_penalti" oninput="hanyaAngka(event); tandaPemisahTitik(this)" required>
                                                    <label class="col-form-label label-custom" style="display:none" id="label_jumlah_hari_mengendap">Jumlah Hari Mengendap<span class="ml-1 bintang-custom" id="bintang_jumlah_hari_mengendap" style="color:red">*</span></label>
                                                    <input type="hidden" class="form-control" name="jumlah_hari_mengendap" value="" id="hidden_jumlah_hari_mengendap" oninput="hanyaAngka(event)" required>

                                                    <label class="col-form-label label-custom" style="display:none" id="label_jumlah_hari">Jumlah Hari Bunga Berjalan<span class="ml-1 bintang-custom" id="bintang_jumlah_hari" style="color:red">*</span></label>
                                                    <input type="hidden" class="form-control" name="jumlah_hari" value="" id="hidden_jumlah_hari" oninput="hanyaAngka(event)" required>

                                                    <label class="col-form-label label-custom" style="display:none" id="label_nominal_bunga">Nominal Bunga Berjalan <span class="ml-1 bintang-custom" id="bintang_nominal_bunga" style="color:red;">*</span></label>
                                                    <input type="hidden" class="form-control" name="nominal_bunga_berjalan" id="hidden_nominal_bunga_berjalan" oninput="hanyaAngka(event); tandaPemisahTitik(this)" required>
                                                </div>
                                                <!-- <div class="form-group" style="display:none" id="hidden_rekening_pencairan"> -->
                                                <label class="col-form-label label-custom" style="display:none" id="label_norek_pencairan">Nomor Rekening Pencairan<span class="ml-1 bintang-custom" style="color:red;">*</span></label>
                                                <input type="hidden" class="form-control" id="hidden_norek_pencairan" name="norek_pencairan" oninput="hanyaAngka(event)">
                                                <!-- </div> -->
                                                <div class=" form-group">
                                                    <label for="alamat-text" class="col-form-label">Keterangan Funding</label>
                                                    <textarea class="form-control" name="keterangan_funding" placeholder="alasan untuk lebih menyakinkan approval" oninput="this.value = this.value.toUpperCase()"></textarea>
                                                </div>
                                                <div class="form-group" style="display:none" id="hidden_upload_bilyet">
                                                    <!-- <label for="alamat-text" class="col-form-label">Upload Bilyet<span style="font-style: italic; margin-left: 5px; font-size: 8px; color: green;">(Tambahkan Lampiran Bukti Nasabah Melakukan Ttd Jika Gunakan Fitur Upload Ttd)</span> </label> -->
                                                    <label for="alamat-text" class="col-form-label">Upload Bilyet </label>
                                                    <div class="input-group">
                                                        <div class="custom-file mb-3">
                                                            <input type="file" class="custom-file-input" id="customFile" name="bilyet" accept=".jpg, .jpeg, .png, .pdf" onchange="validateInput()">
                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <label class="col-form-label">Tanda Tangan Nasabah</label><span class="ml-1" style="color:red;">*</span>

                                                    </div>
                                                    <div class="card-body">
                                                        <!-- canvas tanda tangan  -->
                                                        <canvas id="signature-pad" class="signature-pad" name="ttd_nasabah"></canvas>
                                                        <div style="float: left;">
                                                            <button type="button" class="btn btn-primary" id="uploadBtn">
                                                                <span class="fas fa-upload"></span>
                                                                Upload TTD
                                                            </button>
                                                            <span id="uploadedFileName"></span>
                                                            <input type="file" id="fileInput" name="file_ttd" accept="image/*" style="display: none;">
                                                        </div>
                                                        <div style="float: right;">
                                                            <!-- tombol hapus tanda tangan  -->
                                                            <button type="button" class="btn btn-danger" id="clear">
                                                                <span class="fas fa-eraser"></span>
                                                                Clear
                                                            </button>


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group" style="display:none" id="hidden_bukti_ttd">
                                                    <label for="alamat-text" class="col-form-label">Upload Bukti Nasabah Melakukan Ttd</label><span class="ml-1" style="color:red;">*</span>
                                                    <div class="input-group">
                                                        <div class="custom-file mb-3">
                                                            <input type="file" class="custom-file-input" id="customFileBukti" name="bukti_ttd" accept=".jpg, .jpeg, .png, .pdf" onchange="validateInput1()">
                                                            <label class="custom-file-label" for="customFileBukti">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <input type="submit" name='tombol' value='btn_simpan_kredit_lama'> -->
                                                <button id="form_funding_tambah_permohonan_pencairan" type="submit" name='btn_simpan_kredit_lama' value='btn_simpan_kredit_lama' class="btn btn-primary btn-lg">Simpan</button>
                                                <a onclick="btn_batal_update_kredit(event); return false" href="<?= BASEURL; ?>/funding/pencairan_sebelum_jatuh_tempo" class="btn btn-secondary btn-lg">Batal</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </main>

                    </form>
                    <script>
                        document.getElementById('fileInput').addEventListener('change', function() {
                            var fileInput = document.getElementById('fileInput');
                            var hiddenFileTtd = document.getElementById('hiddenFilTtd');
                            var uploadedFileName = document.getElementById('uploadedFileName');

                            if (fileInput.files.length > 0) {
                                uploadedFileName.textContent = fileInput.files[0].name;
                                hiddenFileTtd.value = fileInput.files[0].name;
                            }
                        });
                        document.getElementById('uploadBtn').addEventListener('click', function() {
                            // Klik secara otomatis elemen input file tersembunyi
                            document.getElementById('fileInput').click();

                            // Aktifkan tombol undo dan clear
                            document.getElementById('undo').disabled = false;
                            document.getElementById('clear').disabled = false;
                        });

                        // document.getElementById('fileInput').addEventListener('change', function(event) {
                        //     var file = event.target.files[0];
                        //     var reader = new FileReader();
                        //     reader.onload = function(event) {
                        //         var img = new Image();
                        //         img.onload = function() {
                        //             var canvas = document.getElementById('signature-pad');
                        //             var context = canvas.getContext('2d');

                        //             // Bersihkan canvas sebelum menggambar gambar
                        //             context.clearRect(0, 0, canvas.width, canvas.height);

                        //             // Tentukan ukuran canvas sesuai dengan ukuran gambar
                        //             canvas.width = 645; // Tentukan lebar canvas
                        //             canvas.height = 229; // Tentukan tinggi canvas

                        //             // Gambar gambar di canvas (skala ulang jika diperlukan)
                        //             var scale = Math.min(canvas.width / img.width, canvas.height / img.height);
                        //             var x = (canvas.width / 2) - (img.width / 2) * scale;
                        //             var y = (canvas.height / 2) - (img.height / 2) * scale;
                        //             context.drawImage(img, x, y, img.width * scale, img.height * scale);
                        //         };
                        //         img.src = event.target.result;
                        //     };
                        //     reader.readAsDataURL(file);
                        // });

                        document.getElementById('fileInput').addEventListener('change', function(event) {
                            var file = event.target.files[0];
                            var reader = new FileReader();
                            reader.onload = function(event) {
                                var img = new Image();
                                img.onload = function() {
                                    var canvas = document.getElementById('signature-pad');
                                    var context = canvas.getContext('2d');

                                    // Bersihkan canvas sebelum menggambar gambar
                                    context.clearRect(0, 0, canvas.width, canvas.height);

                                    // Tentukan ukuran canvas sesuai dengan ukuran gambar
                                    canvas.width = 645; // Tentukan lebar canvas
                                    canvas.height = 229; // Tentukan tinggi canvas

                                    // Gambar gambar di canvas (skala ulang jika diperlukan)
                                    var scale = Math.min(canvas.width / img.width, canvas.height / img.height);
                                    var x = (canvas.width / 2) - (img.width / 2) * scale;
                                    var y = (canvas.height / 2) - (img.height / 2) * scale;
                                    context.drawImage(img, x, y, img.width * scale, img.height * scale);
                                };
                                img.src = event.target.result;
                            };
                            reader.readAsDataURL(file);
                        });

                        // // Tambahkan script untuk menyesuaikan ukuran canvas berdasarkan ukuran layar perangkat
                        // window.addEventListener('resize', function() {
                        //     var canvas = document.getElementById('signature-pad');
                        //     var width = window.innerWidth;
                        //     var height = window.innerHeight;
                        //     canvas.width = width;
                        //     canvas.height = height;
                        // });

                        // // Panggil ulang saat halaman dimuat untuk memastikan ukuran canvas sesuai saat pertama kali dimuat
                        // window.dispatchEvent(new Event('resize'));
                    </script>
                    <script>
                        // JavaScript
                        const today = new Date().toISOString().split('T')[0];
                        document.getElementById('tgl_pembentukan_visible').max = today;
                    </script>

                    <script>
                        // Fungsi untuk menampilkan/menyembunyikan simbol bintang
                        function toggleBintangVisibility(labelId, bintangId) {
                            var label = document.getElementById(labelId);
                            var bintang = document.getElementById(bintangId);
                            if (label.style.display === 'block') {
                                bintang.style.display = 'block';
                            } else {
                                bintang.style.display = 'nonek'; // Ganti 'inline' dengan 'block' jika perlu
                            }
                        }

                        // Panggil fungsi untuk setiap elemen pada halaman yang terkait dengan simbol bintang
                        toggleBintangVisibility('label_suku_bunga_deposito', 'bintang_suku_bunga');
                        toggleBintangVisibility('label_tgl_pembentukan', 'bintang_tgl_pembentukan');
                        toggleBintangVisibility('label_jangka_Waktu', 'bintang_jangka_waktu');
                        toggleBintangVisibility('label_norek_deposito', 'bintang_norek');
                        toggleBintangVisibility('label_nominal_penalti', 'bintang_penalti');
                        toggleBintangVisibility('label_jumlah_hari', 'bintang_jumlah_hari');
                        toggleBintangVisibility('label_nominal_bunga', 'bintang_nominal_bunga');
                        toggleBintangVisibility('label_jumlah_hari_mengendap', 'bintang_jumlah_hari_mengendap');
                    </script>
                    <script>
                        // Function to add "00" if no digits are present after the decimal point
                        function addZeroesIfRequired(inputValue) {
                            if (inputValue.endsWith(".")) {
                                this.value = inputValue + "00";
                            }
                        }

                        // Existing event listener
                        document.getElementById("hidden_suku_bunga_deposito").addEventListener("input", function(e) {
                            let inputValue = this.value;

                            // Cek jika tombol yang ditekan adalah backspace
                            if (e.inputType === 'deleteContentBackward') {
                                return;
                            }

                            // Cek apakah nilai input hanya terdiri dari angka
                            if (/^\d*\.?\d{0,2}$/.test(inputValue)) {
                                // Jika hanya satu angka diikuti oleh titik, tambahkan angka 0 di belakangnya
                                if (/^\d$/.test(inputValue)) {
                                    this.value = inputValue + ".";
                                }

                                // Jika input selesai dan karakter terakhir adalah titik, tambahkan "00"
                                if (inputValue.endsWith(".") && inputValue.indexOf(".") !== inputValue.length - 1) {
                                    this.value = inputValue + "00";
                                }
                            } else {
                                alert("Hanya 2 Angka di Belakang Koma");
                                // Jika format input tidak sesuai, hapus karakter terakhir dari nilai input
                                this.value = inputValue.slice(0, -1);
                            }
                        });

                        // Event listener for blur/change to add "00" if no digits are present after the decimal point
                        document.getElementById("hidden_suku_bunga_deposito").addEventListener("blur", function(e) {
                            let inputValue = this.value;
                            addZeroesIfRequired.call(this, inputValue);
                        });

                        document.getElementById("hidden_suku_bunga_deposito").addEventListener("change", function(e) {
                            let inputValue = this.value;
                            addZeroesIfRequired.call(this, inputValue);
                        });
                    </script>

                    <script>
                        function loadData() {
                            var select1 = document.getElementById("jenis_produk");
                            var select2 = document.getElementById("jangka_waktu");
                            var selectedOption = select1.value;

                            // Menghapus pilihan sebelumnya dari select2
                            select2.innerHTML = '<option value="" disabled selected>- SILAHKAN PILIH -</option>';

                            // Tambahkan atribut "required" ke select2
                            select2.setAttribute('required', 'required');

                            select2.addEventListener('change', function() {
                                var selectedValue = this.value;
                                if (selectedValue === '') {
                                    // Jika nilai masih default, tampilkan pesan atau lakukan tindakan yang sesuai
                                    alert('Silakan pilih opsi yang valid!');
                                    // Lakukan tindakan lain seperti mengosongkan atau fokus kembali pada select
                                    // this.value = ''; // Opsional: mengosongkan nilai
                                    // this.focus(); // Opsional: fokus kembali pada select
                                } else {
                                    console.log('Nilai yang dipilih:', selectedValue);
                                }
                            });

                            // Contoh sederhana tanpa pengambilan data dari database
                            if (selectedOption == "SI DEKA") {
                                <?php foreach ($data['jw'] as $row) : ?>
                                    var option1 = document.createElement("option");
                                    option1.value = "<?= $row['jangka_waktu'] ?>";
                                    option1.text = "<?= $row['jangka_waktu'] ?>";
                                    select2.appendChild(option1);
                                <?php endforeach; ?>
                            } else if (selectedOption == "PRIMA") {
                                <?php foreach ($data['jw_prima'] as $row) : ?>
                                    var option1 = document.createElement("option");
                                    option1.value = "<?= $row['jangka_waktu'] ?>";
                                    option1.text = "<?= $row['jangka_waktu'] ?>";
                                    select2.appendChild(option1);
                                <?php endforeach; ?>
                            } else if (selectedOption == "SI DEKO") {
                                <?php foreach ($data['jangka_waktu'] as $row) : ?>
                                    var option1 = document.createElement("option");
                                    option1.value = "<?= $row['jangka_waktu'] ?>";
                                    option1.text = "<?= $row['jangka_waktu'] ?>";
                                    select2.appendChild(option1);
                                <?php endforeach; ?>
                            } else if (selectedOption == "GOLDEN AGE") {
                                <?php foreach ($data['jw_golden_age'] as $row) : ?>
                                    var option1 = document.createElement("option");
                                    option1.value = "<?= $row['jangka_waktu'] ?>";
                                    option1.text = "<?= $row['jangka_waktu'] ?>";
                                    select2.appendChild(option1);
                                <?php endforeach; ?>
                            }
                        }


                        var visibleDateInput = document.getElementById("tgl_pembentukan_visible");
                        var hiddenDateInput = document.getElementById("tgl_pembentukan_hidden");

                        visibleDateInput.addEventListener("change", function() {
                            hiddenDateInput.value = visibleDateInput.value;
                        });

                        var selectJenisProduk = document.getElementById("jenis_produk");
                        var selectJenisPencairan = document.getElementById("jenis_pencairan");
                        var selectJangkaWaktu = document.getElementById("jangka_waktu");
                        var alasanPengajuan = document.getElementById("alasan_pengajuan");
                        var hiddenLabelJangkaWaktu = document.getElementById("label_jangka_Waktu");
                        var hiddenLabelPembentukan = document.getElementById("label_tgl_pembentukan");
                        var hiddenLabelPerpanjangan = document.getElementById("label_tgl_perpanjangan");
                        var hiddenTglPembentukan = document.getElementById("tgl_pembentukan_visible");
                        var hiddenLabelSukuBunga = document.getElementById("label_suku_bunga_deposito");
                        var hiddenSukuBunga = document.getElementById("hidden_suku_bunga_deposito");
                        var hiddenLabelNominalPenalti = document.getElementById("label_nominal_penalti");
                        var hiddenNominalPenalti = document.getElementById("hidden_nominal_penalti");
                        var hiddenLabelJumlahHari = document.getElementById("label_jumlah_hari");
                        var hiddenJumlahHari = document.getElementById("hidden_jumlah_hari");
                        var hiddenLabelJumlahHariMengendap = document.getElementById("label_jumlah_hari_mengendap");
                        var hiddenJumlahHariMengendap = document.getElementById("hidden_jumlah_hari_mengendap");

                        var hiddenLabelNominalBunga = document.getElementById("label_nominal_bunga");
                        var hiddenNominalBungaBerjalan = document.getElementById("hidden_nominal_bunga_berjalan");
                        var hiddenLabelNorekDeposito = document.getElementById("label_norek_deposito");
                        var hiddenNorekDeposito = document.getElementById("norek_deposito");
                        var hiddenBintangNorek = document.getElementById("bintang_norek");
                        var hiddenBintangPenalti = document.getElementById("bintang_penalti");
                        var hiddenBintangHari = document.getElementById("bintang_jumlah_hari");
                        var hiddenBintangBunga = document.getElementById("bintang_nominal_bunga");
                        var hiddenLabelNorekPencairan = document.getElementById("label_norek_pencairan");
                        var hiddenNorekPencairan = document.getElementById("hidden_norek_pencairan");
                        var hiddenStatusNasabah = document.getElementById("hidden_status_nasabah");
                        alasanPengajuan.addEventListener("change", function() {
                            if (alasanPengajuan.value == 'SUDAH JATUH TEMPO & DIPERPANJANG') {
                                hiddenLabelPerpanjangan.style.display = "block";
                                hiddenStatusNasabah.style.display = "block";
                                hiddenLabelPembentukan.style.display = "none";
                            } else {
                                hiddenLabelPerpanjangan.style.display = "none";
                                hiddenStatusNasabah.style.display = "none";
                                hiddenLabelPembentukan.style.display = "block";
                            }
                            hiddenTglPembentukan.style.display = "block";
                        });
                        selectJenisProduk.addEventListener("change", function() {
                            if (selectJenisProduk.value == 'SI DEKO' || selectJenisProduk.value == 'SI DEKA' || selectJenisProduk.value == 'PRIMA' || selectJenisProduk.value == 'GOLDEN AGE') {
                                if (alasanPengajuan.value == 'SUDAH JATUH TEMPO & DIPERPANJANG') {
                                    hiddenLabelPerpanjangan.style.display = "block";
                                    hiddenLabelPembentukan.style.display = "none";
                                } else {
                                    hiddenLabelPerpanjangan.style.display = "none";
                                    hiddenLabelPembentukan.style.display = "block";
                                }
                                hiddenTglPembentukan.style.display = "block";
                                hiddenLabelJangkaWaktu.style.display = "block";
                                selectJangkaWaktu.style.display = "block";
                                selectJangkaWaktu.setAttribute('required', 'true');
                                hiddenLabelNorekDeposito.style.display = "block";
                                hiddenNorekDeposito.type = "text";
                                // hiddenBintangNorek.style.display = "block";
                                document.getElementById('hidden_upload_bilyet').style.display = "block";
                            } else {
                                hiddenLabelPembentukan.style.display = "none";
                                hiddenTglPembentukan.style.display = "none";
                                hiddenLabelJangkaWaktu.style.display = "none";
                                selectJangkaWaktu.style.visibility = "hidden";
                                hiddenLabelNorekDeposito.style.display = "none";
                                hiddenNorekDeposito.style.display = "none";
                                document.getElementById('hidden_upload_bilyet').style.display = "none";
                            }
                        });
                        // Sembunyikan elemen NorekPencairan saat dokumen dimuat
                        hiddenLabelNorekPencairan.style.display = "none";
                        hiddenNorekPencairan.style.display = "none";

                        selectJenisPencairan.addEventListener("change", function() {
                            hiddenLabelSukuBunga.style.display = "block";
                            hiddenSukuBunga.type = "text";
                            hiddenLabelNominalPenalti.style.display = "block";
                            hiddenNominalPenalti.type = "text";
                            hiddenLabelJumlahHari.style.display = "block";
                            hiddenJumlahHari.type = "text";
                            hiddenLabelJumlahHariMengendap.style.display = "block";
                            hiddenJumlahHariMengendap.type = "text";
                            hiddenLabelNominalBunga.style.display = "block";
                            hiddenNominalBungaBerjalan.type = "text";
                            // Tampilkan elemen NorekPencairan jika kondisi terpenuhi
                            if (selectJenisPencairan.value.includes('BUNGA BERJALAN DIBAYARKAN')) {
                                hiddenLabelNorekPencairan.style.display = "block";
                                hiddenNorekPencairan.style.display = "block";
                                hiddenNorekPencairan.type = "text";
                                hiddenNorekPencairan.required = true;
                            } else {
                                // Sembunyikan elemen NorekPencairan jika kondisi tidak terpenuhi
                                hiddenLabelNorekPencairan.style.display = "none";
                                hiddenNorekPencairan.style.display = "none";
                                hiddenNorekPencairan.value = ""; // Reset the value or take any appropriate action
                                hiddenNorekPencairan.required = false;
                            }
                        });


                        var dateInput = document.getElementById("tgl_pembentukan_visible");
                        var outputField = document.getElementById("hidden_jumlah_hari");
                        var outputFieldMengendap = document.getElementById("hidden_jumlah_hari_mengendap");
                        var inputNominal = document.getElementById("nominal");
                        dateInput.addEventListener("input", function() {
                            var nominalValue = inputNominal.value;
                            var tanggalAwal = new Date(dateInput.value);
                            tanggalAwal.setDate(tanggalAwal.getDate() + 1);
                            var tanggalAkhir = new Date();
                            var selisihWaktu = tanggalAkhir.getTime() - tanggalAwal.getTime();
                            var selisihHari = Math.ceil(selisihWaktu / (1000 * 3600 * 24));
                            outputFieldMengendap.value = selisihHari;

                            var tanggalHariIni = new Date();


                            var tanggalJatuhTempoTerakhir = new Date(tanggalAwal);
                            tanggalJatuhTempoTerakhir.setDate(tanggalJatuhTempoTerakhir.getDate());

                            var selisihBulan = (tanggalHariIni.getFullYear() - tanggalJatuhTempoTerakhir.getFullYear()) * 12 + tanggalHariIni.getMonth() - tanggalJatuhTempoTerakhir.getMonth();
                            tanggalJatuhTempoTerakhir.setMonth(tanggalJatuhTempoTerakhir.getMonth() + selisihBulan);

                            if (tanggalHariIni < tanggalJatuhTempoTerakhir) {
                                tanggalJatuhTempoTerakhir.setMonth(tanggalJatuhTempoTerakhir.getMonth() - 1);
                            }

                            // if (tanggalAwal.getDate() >= 30) {
                            // Pengecekan jika tanggal bentuk jatuh pada bulan Februari
                            if (tanggalJatuhTempoTerakhir.getMonth() == 1 && tanggalJatuhTempoTerakhir.getDate() == 29) {
                                var tahunKabisat = (tanggalJatuhTempoTerakhir.getFullYear() % 4 == 0 && tanggalJatuhTempoTerakhir.getFullYear() % 100 != 0) || (tanggalJatuhTempoTerakhir.getFullYear() % 400 == 0);
                                if (!tahunKabisat) {
                                    // Jika bukan tahun kabisat, kembalikan tanggal ke 28 Februari
                                    tanggalJatuhTempoTerakhir = new Date(tanggalJatuhTempoTerakhir.getFullYear(), 1, 28);
                                }
                            }
                            // }

                            var selisihWaktu = tanggalHariIni.getTime() - tanggalJatuhTempoTerakhir.getTime();
                            var selisihHari = Math.ceil(selisihWaktu / (1000 * 3600 * 24));




                            // if (tanggalHariIni.getDate() === 1 && tanggalHariIni.getMonth() === tanggalJatuhTempoTerakhir.getMonth()) {
                            //     selisihHari++;
                            // }

                            // if (selisihBulan === 0) {
                            //     if (tanggalJatuhTempoTerakhir.getMonth() === 1) {
                            //         var tahun = tanggalJatuhTempoTerakhir.getFullYear();
                            //         var tahunKabisat = (tahun % 4 == 0 && (tahun % 100 != 0 || tahun % 400 == 0));
                            //         selisihHari += (tahunKabisat && tanggalJatuhTempoTerakhir.getDate() === 29) ? 1 : 0;
                            //     } else {
                            //         selisihHari -= 1;
                            //     }
                            // } else {
                            //     selisihHari += (selisihBulan > 0 && tanggalJatuhTempoTerakhir.getMonth() === 1) ? 1 : 0;
                            // }



                            var tambahanHari = 0;
                            console.log("Tanggal Jatuh Tempo Terakhir: " + tanggalJatuhTempoTerakhir);

                            // if (tanggalAwal.getDate() >= 30 || tanggalAwal.getDate() === 1) {
                            //     if (tanggalJatuhTempoTerakhir.getMonth() === 1) {

                            //         var tahunKabisat = (tanggalJatuhTempoTerakhir.getFullYear() % 4 == 0 && tanggalJatuhTempoTerakhir.getFullYear() % 100 != 0) || (tanggalJatuhTempoTerakhir.getFullYear() % 400 == 0);
                            //         tambahanHari = (tahunKabisat) ? 0 : 1;
                            //     }
                            // }
                            // selisihHari += tambahanHari;

                            if (tanggalAwal.getMonth() === tanggalHariIni.getMonth() && tanggalAwal.getFullYear() === tanggalHariIni.getFullYear()) {
                                outputField.value = outputFieldMengendap.value;
                            } else {
                                outputField.value = selisihHari;
                            }

                        });



                        function calculateInterest() {
                            var tanggalBentuk = new Date(dateInput.value);
                            var nominalValue = parseInt(inputNominal.value.replace(/\./g, ''));
                            var sukuBunga = parseFloat(hiddenSukuBunga.value);
                            // tanggalBentuk.setDate(tanggalBentuk.getDate() + 1);
                            // var tanggalAkhir = new Date();
                            // var selisihWaktu = tanggalAkhir.getTime() - tanggalBentuk.getTime();
                            // var selisihHari = Math.ceil(selisihWaktu / (1000 * 3600 * 24));

                            tanggalBentuk.setDate(tanggalBentuk.getDate() + 2);
                            tanggalBentuk.setHours(12, 0, 0, 0); // Set waktu pada tengah hari
                            var tanggalAkhir = new Date();

                            // Mendapatkan tahun untuk tanggal bentuk dan tanggal akhir
                            var tahunBentuk = tanggalBentuk.getFullYear();
                            var tahunAkhir = tanggalAkhir.getFullYear();

                            // Pengecekan jika tanggal bentuk jatuh pada bulan Februari
                            if (tanggalBentuk.getMonth() == 1 && tanggalBentuk.getDate() == 29) {
                                var tahunKabisat = (tahunBentuk % 4 == 0 && tahunBentuk % 100 != 0) || (tahunBentuk % 400 == 0);
                                if (!tahunKabisat) {
                                    // Jika bukan tahun kabisat, kembalikan tanggal ke 28 Februari
                                    tanggalBentuk = new Date(tahunBentuk, 1, 28);
                                }
                            }

                            // Menghitung selisih waktu dalam milidetik
                            var selisihWaktu = tanggalAkhir.getTime() - tanggalBentuk.getTime();
                            // Menghitung selisih hari dari selisih waktu
                            var selisihHari = Math.ceil(selisihWaktu / (1000 * 3600 * 24));

                            console.log(selisihHari); // Output selisih hari


                            if (selectJangkaWaktu.value == '1 BULAN') {
                                var tglJatuhTempo = new Date(tanggalBentuk.getFullYear(), tanggalBentuk.getMonth() + 1, tanggalBentuk.getDate());
                            } else if (selectJangkaWaktu.value == '2 BULAN') {
                                var tglJatuhTempo = new Date(tanggalBentuk.getFullYear(), tanggalBentuk.getMonth() + 2, tanggalBentuk.getDate());
                            } else if (selectJangkaWaktu.value == '3 BULAN') {
                                var tglJatuhTempo = new Date(tanggalBentuk.getFullYear(), tanggalBentuk.getMonth() + 3, tanggalBentuk.getDate());
                            } else if (selectJangkaWaktu.value == '6 BULAN') {
                                var tglJatuhTempo = new Date(tanggalBentuk.getFullYear(), tanggalBentuk.getMonth() + 6, tanggalBentuk.getDate());
                            } else if (selectJangkaWaktu.value == '12 BULAN') {
                                var tglJatuhTempo = new Date(tanggalBentuk.getFullYear(), tanggalBentuk.getMonth() + 12, tanggalBentuk.getDate());
                            } else {
                                var tglJatuhTempo = new Date(tanggalBentuk.getFullYear(), tanggalBentuk.getMonth() + 24, tanggalBentuk.getDate());
                            }

                            if ((tglJatuhTempo.getMonth() == '2') && (tanggalBentuk.getDate() >= 29 && tanggalBentuk.getDate() < 31)) {
                                var tahunKabisat = (tglJatuhTempo.getFullYear() % 4 == 0 && tglJatuhTempo.getFullYear() % 100 != 0) || (tglJatuhTempo.getFullYear() % 400 == 0);
                                var jumlahHariFebruari = tahunKabisat ? 29 : 28;
                                // Dapatkan tanggal terakhir di bulan Februari
                                var tglJatuhTempo = new Date(tglJatuhTempo.getFullYear(), 1, jumlahHariFebruari + 1);
                            }
                            var selisihWaktu = (tglJatuhTempo.getTime() - tanggalBentuk.getTime()) - 1;
                            var jumlahHari = Math.ceil(selisihWaktu / (1000 * 3600 * 24));
                            // hiddenNominalPenalti.value = tglJatuhTempo.toISOString().split('T')[0];
                            jumlahHariDilalui = selisihHari;

                            console.log("Jumlah Hari berjalan " + jumlahHariDilalui);
                            var sisaHari = jumlahHari - jumlahHariDilalui;

                            console.log("total hari : " + jumlahHari);
                            //sisaHari-1 artinya sisahari dikurangi 1 hari, krn tgl bentuknya sudah dhitung berjalan 1 hari padahal besoknya baru terhitung 1 hari, begitupun dengan jumlahHari kenapa dikurangi 1
                            var nominalPenalti = (nominalValue * 0.005 * (sisaHari)) / (jumlahHari);
                            // var bungaBerjalan = ((nominalValue * persentasePenalti * jumlahHari)/365) * 0.2;
                            if (alasanPengajuan.value === 'SUDAH JATUH TEMPO & DIPERPANJANG') {
                                var angka = 0;
                                hiddenNominalPenalti.value = angka.toLocaleString('id-ID');
                            } else {
                                if (selectJenisProduk.value == 'SI DEKA') {
                                    if ((selectJangkaWaktu.value == '1 BULAN' && jumlahHariDilalui >= 20) || (selectJangkaWaktu.value == '3 BULAN' && jumlahHariDilalui >= 60) || (selectJangkaWaktu.value == '6 BULAN' && jumlahHariDilalui >= 120) || (selectJangkaWaktu.value == '12 BULAN' && jumlahHariDilalui >= 210)) {
                                        var angka = 0;
                                        hiddenNominalPenalti.value = angka.toLocaleString('id-ID');
                                    } else {
                                        hiddenNominalPenalti.value = Math.floor(nominalPenalti).toLocaleString('id-ID');
                                    }
                                } else if (selectJenisProduk.value == 'GOLDEN AGE') {
                                    if (jumlahHariDilalui >= 45) {
                                        var angka = 0;
                                        // let angkaContainer = document.getElementById('hidden_nominal_penalti');
                                        hiddenNominalPenalti.value = angka.toLocaleString('id-ID');
                                    } else {
                                        hiddenNominalPenalti.value = Math.floor(nominalPenalti).toLocaleString('id-ID');
                                    }
                                } else if ((selectJenisProduk.value == 'PRIMA')) {
                                    var tanggalAwal = new Date(dateInput.value);
                                    tanggalAwal.setDate(tanggalAwal.getDate() + 1); // Menggeser tanggal awal satu hari ke depan

                                    // Mendapatkan tanggal satu bulan setelah tanggal awal
                                    var tanggalSatuBulanSetelah = new Date(tanggalAwal);
                                    tanggalSatuBulanSetelah.setMonth(tanggalSatuBulanSetelah.getMonth() + 1);
                                    console.log("Lebih dari satu bulan" + tanggalSatuBulanSetelah + tanggalSekarang);
                                    var tanggalSekarang = new Date(); // Tanggal sekarang

                                    // Pengecekan apakah sudah lebih dari satu bulan sejak satu hari setelah tanggal awal
                                    if (tanggalSekarang > tanggalSatuBulanSetelah) {
                                        // console.log("Lebih dari satu bulan");
                                        var angka = 0;
                                        // let angkaContainer = document.getElementById('hidden_nominal_penalti');
                                        hiddenNominalPenalti.value = angka.toLocaleString('id-ID');
                                    } else {
                                        // console.log("Belum satu bulan");
                                        hiddenNominalPenalti.value = Math.floor(nominalPenalti).toLocaleString('id-ID');
                                    }
                                } else if (selectJenisProduk.value === "SI DEKO") {
                                    var tanggal_hari_ini = new Date(); // Tanggal hari ini
                                    var angka = 0;
                                    if (tanggal_hari_ini > new Date(tglJatuhTempo.getTime())) {
                                        hiddenNominalPenalti.value = angka.toLocaleString('id-ID');
                                    } else {
                                        hiddenNominalPenalti.value = Math.floor(nominalPenalti).toLocaleString('id-ID');
                                    }
                                }
                            }

                            jumlahHariBerjalan = outputField.value;
                            var rate = sukuBunga / 100;
                            // Perhitungan bunga
                            var bungaHarian = (nominalValue * rate * jumlahHariBerjalan) / 365;
                            var pajak = bungaHarian * 0.2;
                            var bungaBerjalan = bungaHarian - pajak;
                            hiddenNominalBungaBerjalan.value = Math.floor(bungaBerjalan).toLocaleString('id-ID');
                            // hiddenNominalBungaBerjalan.value =sisaHari;
                        }
                        var selectJangkaWaktu = document.getElementById("jangka_waktu");
                        var hiddenTglPembentukan = document.getElementById("tgl_pembentukan_visible");
                        var hiddenSukuBunga = document.getElementById("hidden_suku_bunga_deposito");
                        var inputNominal = document.getElementById("nominal");
                        var alasanPengajuan = document.getElementById("alasan_pengajuan");
                        var jenisProduk = document.getElementById("jenis_produk");
                        var jumlahHariBungaBerjalan = document.getElementById("hidden_jumlah_hari");
                        // Event listeners for fields
                        inputNominal.addEventListener('input', calculateInterest);
                        hiddenTglPembentukan.addEventListener('change', calculateInterest);
                        selectJangkaWaktu.addEventListener('change', calculateInterest);
                        hiddenSukuBunga.addEventListener('input', calculateInterest);
                        alasanPengajuan.addEventListener('input', calculateInterest);
                        jenisProduk.addEventListener('input', calculateInterest);
                        jumlahHariBungaBerjalan.addEventListener('input', calculateInterest);

                        function showDivLainnya(select) {
                            if (select.value === 'LAINNYA') {
                                document.getElementById('hidden_div_lainnya').style.display = "block";
                            } else {
                                document.getElementById('hidden_div_lainnya').style.display = "none";
                                // Jika nilai bukan 'LAINNYA' atau 'SUDAH JATUH TEMPO & DIPERPANJANG'
                                // Lakukan sesuatu jika diperlukan
                            }
                        }

                        function showIdentitasLainnya(select) {
                            var identitas_lain = document.getElementById("identitas_lain");
                            var nomor_identitas_lain = document.getElementById("nomor_identitas_lain");
                            var nomor_ktp = document.getElementById("nomor_ktp");
                            if (select.value === 'LAINNYA') {
                                document.getElementById('hidden_identitas_lain').style.display = "block";
                                document.getElementById('hidden_nomor_ktp').style.display = "none";
                                identitas_lain.setAttribute('required', 'true');
                                nomor_identitas_lain.setAttribute('required', 'true');

                            } else {
                                document.getElementById('hidden_identitas_lain').style.display = "none";
                                document.getElementById('hidden_nomor_ktp').style.display = "block";
                                nomor_ktp.setAttribute('required', 'true');

                            }
                        }

                        function hanyaHuruf(evt) {
                            var input = evt.target.value;
                            var formattedInput = input.replace(/[^A-Za-z\s]/g, ''); // Hanya membiarkan huruf dan spasi

                            if (input !== formattedInput) {
                                evt.target.value = formattedInput; // Mengganti nilai input dengan yang divalidasi
                                alert("Inputan hanya boleh huruf");
                            }
                        }

                        function hanyaAngka(evt) {
                            var input = evt.target.value;
                            var formattedInput = input.replace(/[^\d.]/g, ''); // Hanya membiarkan angka dan titik

                            if (input !== formattedInput) {
                                evt.target.value = formattedInput; // Mengganti nilai input dengan yang divalidasi
                                alert("Inputan hanya boleh angka");
                            }
                        }

                        function tandaPemisahTitik(input) {
                            var num = input.value.replace(/\./g, ''); // Menghilangkan tanda pemisah titik
                            var formattedNum = addThousandSeparator(num); // Panggil fungsi addThousandSeparator

                            input.value = formattedNum; // Menetapkan nilai input yang diformat
                        }

                        // Fungsi untuk menambahkan tanda titik sebagai pemisah ribuan
                        function addThousandSeparator(num) {
                            var parts = num.toString().split(".");
                            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                            return parts.join(".");
                        }

                        // function hanyaAngka(evt) {
                        //     var charCode = (evt.which) ? evt.which : event.keyCode
                        //     if ((charCode < 48 || charCode > 57) && charCode > 32 || charCode == 190) {
                        //         alert("Inputan Hanya Angka");
                        //         return false;

                        //     }

                        //     return true;
                        // }
                        function hanyaAngkaHuruf(evt) {
                            var input = evt.target.value;
                            var formattedInput = input.replace(/[^A-Za-z0-9\s]/g, ''); // Hanya membiarkan huruf, angka, dan spasi

                            if (input !== formattedInput) {
                                evt.target.value = formattedInput; // Mengganti nilai input dengan yang divalidasi
                                alert("Inputan hanya boleh huruf dan angka");
                            }
                        }
                        
                        function hanyaAngka1(evt) {
                            var charCode = (evt.which) ? evt.which : event.keyCode;

                            // CharCode 46 adalah kode untuk simbol titik (.)
                            if ((charCode < 48 || charCode > 57) && charCode !== 46) {
                                alert("Inputan Hanya Angka atau Simbol Titik");
                                return false;
                            }

                            return true;
                        }



                        $("#form_funding_tambah_permohonan_pencairan").on('submit', function(e, params) {
                            var localParams = params || {};

                            if (!localParams.send) {
                                e.preventDefault();
                            }
                            // Validasi tanda tangan kosong
                            // var canvas = document.getElementById('signature-pad');
                            // var context = canvas.getContext('2d');
                            // var isCanvasEmpty = context.getImageData(0, 0, canvas.width, canvas.height).data.every(p => p === 0);
                            // // Check conditions before submitting
                            // if (isCanvasEmpty) {
                            //     e.preventDefault(); // Prevent form submission if signature and hidden file are empty
                            //     Swal.fire({
                            //         icon: 'error',
                            //         title: 'Tanda tangan masih kosong',
                            //         text: 'Harap lengkapi tanda tangan Pemohon.',
                            //         confirmButtonColor: "#3EC59D",
                            //     });
                            //     return;
                            // }

                            var canvas = document.getElementById('signature-pad');
                            var context = canvas.getContext('2d');
                            var isCanvasEmpty = context.getImageData(0, 0, canvas.width, canvas.height).data.every(p => p === 0);

                            // Menambahkan variabel untuk melacak apakah tanda tangan sebelumnya telah dihapus
                            var isLastClear = false;

                            // Menentukan batas jumlah piksel yang dianggap sebagai tanda tangan
                            var signatureThreshold = 50; // Sesuaikan sesuai kebutuhan

                            canvas.addEventListener('mouseup', function() {
                                // Memeriksa apakah ada perubahan pada canvas setelah event mouseup
                                isCanvasEmpty = context.getImageData(0, 0, canvas.width, canvas.height).data.every(p => p === 0);
                            });

                            // Event listener untuk tombol hapus
                            document.getElementById('clear').addEventListener('click', function() {
                                // Menghapus isi canvas
                                context.clearRect(0, 0, canvas.width, canvas.height);
                                // Menandai bahwa tanda tangan telah dihapus
                                isLastClear = true;
                            });

                            // Memeriksa apakah tanda tangan hanya coretan titik
                            var imageData = context.getImageData(0, 0, canvas.width, canvas.height);
                            var data = imageData.data;
                            var nonTransparentColorCount = 0;
                            for (var i = 0; i < data.length; i += 4) {
                                // Memeriksa apakah piksel bukan warna hitam
                                if (data[i] !== 0 || data[i + 1] !== 0 || data[i + 2] !== 0 || data[i + 3] !== 0) {
                                    nonTransparentColorCount++;
                                }
                            }
                            var isOnlyDot = nonTransparentColorCount <= signatureThreshold; // Memeriksa apakah jumlah piksel tanda tangan hanya beberapa

                            if (isCanvasEmpty || isLastClear || isOnlyDot) {
                                e.preventDefault(); // Mencegah submit jika tanda tangan kosong, dihapus, atau hanya coretan titik
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Tanda tangan masih kosong',
                                    text: 'Harap lengkapi tanda tangan Pemohon.',
                                    confirmButtonColor: "#3EC59D",
                                });
                                return;
                            }

                            var nilaiPenalti = parseFloat($("#hidden_nominal_penalti").val().replace(/\./g, '').replace(',', '.')) || 0;
                            var jenisPencairan = $("#jenis_pencairan").val();

                            if (nilaiPenalti === 0) {
                                if (jenisPencairan === "TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN" ||
                                    jenisPencairan === "TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN") {
                                    Swal.fire({
                                        title: "Yakin data sudah benar?",
                                        showCancelButton: true,
                                        confirmButtonText: "Ya",
                                        cancelButtonText: "Batal",
                                        confirmButtonColor: "#3EC59D",
                                        cancelButtonColor: "#BB2D3B",
                                        showLoaderOnConfirm: true,
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Data berhasil Disimpan',
                                                showConfirmButton: false,
                                                timer: 1500
                                            }).then((result) => {
                                                $("#form_funding_tambah_permohonan_pencairan").off("submit").submit();
                                            })
                                        }
                                    });
                                } else {
                                    // Tampilkan pesan bahwa jenis pencairan yang dipilih tidak sesuai
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Jenis permohonan pencairan yang dipilih tidak sesuai',
                                        text: 'Pilih opsi yang sesuai untuk penalti 0',
                                        confirmButtonColor: "#3EC59D",
                                    });
                                    e.preventDefault(); // Mencegah pengajuan jika jenis pencairan tidak sesuai
                                }
                            } else {
                                // Tampilkan pesan bahwa nilai penalti bukan 0
                                Swal.fire({
                                    title: "Yakin data sudah benar?",
                                    showCancelButton: true,
                                    confirmButtonText: "Ya",
                                    cancelButtonText: "Batal",
                                    confirmButtonColor: "#3EC59D",
                                    cancelButtonColor: "#BB2D3B",
                                    showLoaderOnConfirm: true,
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Data berhasil Disimpan',
                                            showConfirmButton: false,
                                            timer: 1500
                                        }).then((result) => {
                                            $("#form_funding_tambah_permohonan_pencairan").off("submit").submit();
                                        })
                                    }
                                });
                            }
                        });


                        function btn_batal_update_kredit(ev) {
                            var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
                            console.log(urlToRedirect); // verify if this is the right URL
                            Swal.fire({
                                title: "Yakin batal simpan?",
                                // icon: 'success',
                                showCancelButton: true,
                                confirmButtonText: "Ya",
                                cancelButtonText: "Tidak",
                                confirmButtonColor: "#3EC59D",
                                cancelButtonColor: "#BB2D3B",

                                showLoaderOnConfirm: true,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = urlToRedirect;
                                } else {

                                }
                            })

                        }
                    </script>

                    <!-- untuk menampilkan titik otomatis saat input nilai rupiah -->
                    <script type="text/javascript">
                        // function tandaPemisahTitik(b) {
                        //     var _minus = false;
                        //     if (b < 0) _minus = true;
                        //     b = b.toString();
                        //     b = b.replace(".", "");
                        //     b = b.replace("-", "");
                        //     c = "";
                        //     panjang = b.length;
                        //     j = 0;
                        //     for (i = panjang; i > 0; i--) {
                        //         j = j + 1;
                        //         if (((j % 3) == 1) && (j != 1)) {
                        //             c = b.substr(i - 1, 1) + "." + c;
                        //         } else {
                        //             c = b.substr(i - 1, 1) + c;
                        //         }
                        //     }
                        //     if (_minus) c = "-" + c;
                        //     return c;
                        // }

                        document.getElementById('nominal').addEventListener('input', function() {
                            let angka = this.value.replace(/\./g, ''); // Hilangkan titik yang sudah ada
                            this.value = tambahkanTitik(angka);
                        });

                        function tambahkanTitik(angka) {
                            return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                        }

                        document.getElementById('hidden_nominal_bunga_berjalan').addEventListener('input', function() {
                            let angka = this.value.replace(/\./g, ''); // Hilangkan titik yang sudah ada
                            this.value = tambahkanTitik(angka);
                        });

                        function tambahkanTitik(angka) {
                            return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                        }
                    </script>
                </div><!-- /.container-fluid -->
            </section>
        </div>
        <!-- /.content-wrapper -->
        <!-- <footer class="main-footer">
            <strong>Copyright &copy; 2022 <a href="<?= BASEURL ?>">LOS HASAMITRA</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer> -->
        <!-- footer -->
        <?php $this->view('funding/footer') ?>
        <!-- footer -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= BASEURL ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= BASEURL ?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <!-- Bootstrap 4 -->
    <script src="<?= BASEURL ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= BASEURL ?>/assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?= BASEURL ?>/assets/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?= BASEURL ?>/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= BASEURL ?>/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= BASEURL ?>/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?= BASEURL ?>/assets/plugins/moment/moment.min.js"></script>
    <script src="<?= BASEURL ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= BASEURL ?>/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?= BASEURL ?>/assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= BASEURL ?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= BASEURL ?>/assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= BASEURL ?>/assets/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= BASEURL ?>/assets/dist/js/pages/dashboard.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= BASEURL ?>/assets/plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="<?= BASEURL ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= BASEURL ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= BASEURL ?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= BASEURL ?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= BASEURL ?>/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= BASEURL ?>/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= BASEURL ?>/assets/plugins/jszip/jszip.min.js"></script>
    <script src="<?= BASEURL ?>/assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= BASEURL ?>/assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= BASEURL ?>/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= BASEURL ?>/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= BASEURL ?>/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>




    <!-- jquery untuk mask tanggal -->
    <script src="<?= BASEURL ?>/assets/plugins/jquery/jquery.mask.min.js"></script>
    <script src="<?= BASEURL ?>/assets/plugins/moment/moment-with-locales.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= BASEURL ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- handlde select  -->
    <script src="<?= BASEURL ?>/assets/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad"></script>
    <script type="text/javascript" src="js/jquery.signature.min.js"></script>
    <script type="text/javascript" src="js/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>

    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            var nomorKTPInput = document.getElementsByName('nomor_ktp')[0];
            var statusNasabahCheckbox = document.getElementById('status_nasabah');

            nomorKTPInput.addEventListener('blur', function(event) {
                var no_ktp = event.target.value;
                if (no_ktp.length === 16) {
                    $.ajax({
                        type: 'post',
                        url: '<?= BASEURL . '/funding/cek_nasabah_priority' ?>',
                        data: {
                            nomor_identitas: no_ktp // Menggunakan nomor_identitas sebagai key untuk data POST
                        },
                        success: function(response) {
                            console.log("cek_respon : " + response);
                            if (response.trim() === "ada") {
                                statusNasabahCheckbox.disabled = false;
                            } else {
                                statusNasabahCheckbox.disabled = true;
                                statusNasabahCheckbox.checked = false;
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Terdapat kesalahan saat memuat data: ', error);
                        }
                    });
                } else {
                    statusNasabahCheckbox.disabled = true;
                    statusNasabahCheckbox.checked = false;
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            var nomorKTPInput = document.getElementsByName('nomor_identitas_lain')[0];
            var statusNasabahCheckbox = document.getElementById('status_nasabah');

            nomorKTPInput.addEventListener('blur', function(event) {
                var no_ktp = event.target.value;
                if (no_ktp.length === 16) {
                    $.ajax({
                        type: 'post',
                        url: '<?= BASEURL . '/funding/cek_nasabah_priority' ?>',
                        data: {
                            nomor_identitas: no_ktp // Menggunakan nomor_identitas sebagai key untuk data POST
                        },
                        success: function(response) {
                            console.log("cek_respon : " + response);
                            if (response.trim() === "ada") {
                                statusNasabahCheckbox.disabled = false;
                            } else {
                                statusNasabahCheckbox.disabled = true;
                                statusNasabahCheckbox.checked = false;
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Terdapat kesalahan saat memuat data: ', error);
                        }
                    });
                } else {
                    statusNasabahCheckbox.disabled = true;
                    statusNasabahCheckbox.checked = false;
                }
            });
        });
    </script> -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var nomorKTPInputs = document.querySelectorAll('input[name="nomor_ktp"], input[name="nomor_identitas_lain"]');
            var statusNasabahCheckbox = document.getElementById('status_nasabah');

            nomorKTPInputs.forEach(function(nomorKTPInput) {
                nomorKTPInput.addEventListener('blur', function(event) {
                    var no_ktp = event.target.value;
                    if (no_ktp.length >= 5 && no_ktp.length <= 20) {
                        $.ajax({
                            type: 'post',
                            url: '<?= BASEURL . '/funding/cek_nasabah_priority' ?>',
                            data: {
                                nomor_identitas: no_ktp // Menggunakan nomor_identitas sebagai key untuk data POST
                            },
                            success: function(response) {
                                console.log("cek_respon : " + response);
                                if (response.trim() === "ada") {
                                    statusNasabahCheckbox.disabled = false;
                                } else {
                                    statusNasabahCheckbox.disabled = true;
                                    statusNasabahCheckbox.checked = false;
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error('Terdapat kesalahan saat memuat data: ', error);
                            }
                        });
                    } else {
                        statusNasabahCheckbox.disabled = true;
                        statusNasabahCheckbox.checked = false;
                    }
                });
            });
        });
    </script>










    <script>
        function validateKTP(event) {
            let input = event.target.value;
            let warning = document.getElementById("ktpWarning");

            if (input.length < 16) {
                warning.style.display = "block";
            } else {
                warning.style.display = "none";
            }
        }
    </script>
    <script>
        function validateInput() {
            var fileInput = document.getElementById('customFile');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;

            if (!allowedExtensions.exec(filePath)) {
                alert('Hanya file dengan ekstensi .jpg, .jpeg, .png atau .pdf yang diizinkan!');
                fileInput.value = ''; // Clear the input field
            }
        }

        function validateInput1() {
            var fileInputTtd = document.getElementById('customFileBukti');
            var filePath = fileInputTtd.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;

            if (!allowedExtensions.exec(filePath)) {
                alert('Hanya file dengan ekstensi .jpg, .jpeg, .png atau .pdf yang diizinkan!');
                fileInput.value = ''; // Clear the input field
            }
        }
    </script>
    <script>
        // Mendapatkan elemen input file yang tersembunyi
        var fileInputTtd = document.getElementById('fileInput');

        // Mendapatkan elemen yang ingin ditampilkan
        var hiddenElement = document.getElementById('hidden_bukti_ttd');

        // Mendapatkan elemen input file di dalam elemen yang tersembunyi
        var customFileInput = hiddenElement.querySelector('.custom-file-input');

        // Memeriksa apakah input file memiliki nilai saat berubah
        fileInput.addEventListener('change', function() {
            // Jika input file memiliki nilai (file dipilih), tampilkan elemen tersembunyi
            if (fileInput.files.length > 0) {
                hiddenElement.style.display = 'block';
                customFileInput.required = true; // Mengatur input yang tersembunyi sebagai wajib diisi
            } else {
                hiddenElement.style.display = 'none';
                customFileInput.required = false; // Menghapus atribut required
            }
        });
    </script>

    <script>
        // script di dalam ini akan dijalankan pertama kali saat dokumen dimuat
        document.addEventListener('DOMContentLoaded', function() {
            resizeCanvas();
        })

        //script ini berfungsi untuk menyesuaikan tanda tangan dengan ukuran canvas
        function resizeCanvas() {
            var ratio = Math.max(window.devicePixelRatio || 1, 1);
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d").scale(ratio, ratio);
        }


        var canvas = document.getElementById('signature-pad');

        //warna dasar signaturepad
        var signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(255, 255, 255)'
        });


        // document.getElementById('clear').addEventListener('click', function() {
        //     // Menghapus semua gambar dari kanvas
        //     const context = canvas.getContext('2d');
        //     context.clearRect(0, 0, canvas.width, canvas.height);

        //     // Setelah menghapus, status clear menjadi true
        //     canvas.setAttribute('data-cleared', 'true');
        //     document.getElementById('uploadedFileName').innerText = "";
        // });
        document.getElementById('clear').addEventListener('click', function() {
            // Menghapus semua gambar dari kanvas
            const context = canvas.getContext('2d');
            context.clearRect(0, 0, canvas.width, canvas.height);

            // Setelah menghapus, status clear menjadi true
            canvas.setAttribute('data-cleared', 'true');
            document.getElementById('uploadedFileName').innerText = "";

            // Menyembunyikan kembali elemen hidden_bukti_ttd
            document.getElementById('hidden_bukti_ttd').style.display = 'none';

            // Mengosongkan nilai input file
            var fileInput = document.getElementById('customFileTtd');
            fileInputTtd.value = ""; // Set nilai input file menjadi kosong

            // Mengambil label yang sesuai dengan input file dan mengubahnya kembali menjadi default
            var label = fileInput.nextElementSibling; // Dapatkan label yang sesuai dengan input file
            label.classList.remove("selected"); // Hapus kelas 'selected'
            label.innerHTML = "Choose file"; // Atur teks label kembali ke default
            // Mengubah status customFileInput.required kembali menjadi false
            document.getElementById('customFileTtd').required = false;
        });


        //saat tombol change color diklik maka akan merubah warna pena
        document.getElementById('change-color').addEventListener('click', function() {

            //jika warna pena biru maka buat menjadi hitam dan sebaliknya
            if (signaturePad.penColor == "rgba(0, 0, 255, 1)") {

                signaturePad.penColor = "rgba(0, 0, 0, 1)";
            } else {
                signaturePad.penColor = "rgba(0, 0, 255, 1)";
            }
        })
    </script>

    <script>
        var canvas = document.getElementById('signature-pad');
        var ctx = canvas.getContext('2d');

        // Kode untuk menggambar di canvas akan ada di sini

        document.getElementById('form_funding_tambah_permohonan_pencairan').addEventListener('submit', function(e) {
            // Mendapatkan data URL dari canvas
            var dataURL = canvas.toDataURL();

            // Membuat elemen input baru untuk menyimpan data URL
            var input = document.createElement('input');
            input.setAttribute('type', 'hidden');
            input.setAttribute('name', 'ttd_nasabah');
            input.setAttribute('value', dataURL);

            // Menambahkan elemen input ke dalam form
            this.appendChild(input);
        });
    </script>


    <script>
        // Custom file input label
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);

        });

        $(".custom-file-input-ttd").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label_ttd").addClass("selected").html(fileName);

        });
    </script>



    <!-- untuk ubah tampilan inputan tanggal  -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('.date').mask('00/00/0000');
            $('.date2').val(moment().format("DD/MM/YYYY"))
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
    </script>

    <!-- cek jika terjadi perubahan di kode_instansi -->

    <!-- // tambahkan titik jika yang di input sudah menjadi angka ribuan -->
    <script>
        function ubah_input(angka, prefix) {
            if (parseFloat(angka) >= 0) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    plafond = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    plafond += separator + ribuan.join('.');
                }
                plafond = split[1] != undefined ? plafond + ',' + split[1] : plafond;
                return prefix == undefined ? plafond : (plafond ? plafond : '');
            } else {
                angka = angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                return prefix == undefined ? angka : (angka ? angka : '');
            }
        }
    </script>
</body>

</html>