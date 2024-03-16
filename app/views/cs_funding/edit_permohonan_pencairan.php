<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Pencairan Sebelum Jatuh Tempo</title>

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


</head>



<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">



        <!-- Navbar -->
        <?php $this->view('cs_funding/navbar') ?>
        <!-- Navbar -->


        <!-- Side Bar -->
        <?php $this->view('cs_funding/side_bar') ?>
        <!-- Side Bar -->




        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h3 class="m-0">Form Edit Pencairan Sebelum Jatuh Tempo</h3>
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
                    <form id="form_funding_edit_data_pencairan" id="form_update" action="<?= BASEURL; ?>/cs_funding/update_data_pencairan" method="POST" enctype="multipart/form-data">
                        <main class="content">
                            <div class="container-fluid p-0">
                                <div class="row ">
                                    <div class="col-12 col-lg-6 col-xxl-6 ">
                                        <div class="card flex-fill">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" name="id_permohonan" value="<?= $data['data_id']['id_permohonan'] ?>" />
                                                    <div class="form-group">

                                                        <label class="col-form-label">Nama AO</label>
                                                        <select name="nama_ao" class="form-control" id="nama_ao" onchange="AOLainnya(this)">
                                                            <option value="" <?= ($data['data_id']['nama_ao'] === '' || $data['data_id']['nama_ao'] === null) ? 'selected' : ''; ?>>- SILAHKAN PILIH -</option>
                                                            <?php
                                                            $foundMatch = false; // Inisialisasi variabel untuk menandai apakah ada kecocokan nilai
                                                            foreach ($data['data_funding'] as $row) :
                                                                if ($row['username'] == $data['data_id']['nama_ao']) {
                                                                    $foundMatch = true; // Setel kecocokan nilai menjadi true
                                                            ?>
                                                                    <option value="<?= $row['username'] ?>" selected><?= $row['username'] ?></option>
                                                                <?php } else { ?>
                                                                    <option value="<?= $row['username'] ?>"><?= $row['username'] ?></option>
                                                            <?php }
                                                            endforeach;
                                                            ?>
                                                            <option value="LAINNYA" <?= (!$foundMatch && $data['data_id']['nama_ao'] !== '' && $data['data_id']['nama_ao'] !== null) ? 'selected' : ''; ?>>LAINNYA</option>
                                                        </select>
                                                        <div class="form-group" style="display: <?= ($data['data_id']['nama_ao'] === 'LAINNYA' || (!$foundMatch && $data['data_id']['nama_ao'] !== '' && $data['data_id']['nama_ao'] !== null)) ? 'block' : 'none'; ?>" id="hidden_AO_lainnya">
                                                            <label class="col-form-label">Nama AO Lainnya</label>
                                                            <input type="text" class="form-control" name="ao_lain" value="<?= $data['data_id']['nama_ao'] === 'LAINNYA' ? '' : $data['data_id']['nama_ao']; ?>" oninput="hanyaHuruf(event); this.value = this.value.toUpperCase()">
                                                        </div>


                                                    </div>
                                                    <label class="col-form-label">Alasan Pengajuan Permohonan</label>
                                                    <select name="alasan_pengajuan" id="alasan_pengajuan" class="form-control" onchange="showDivLainnya(this)" required>
                                                        <?php
                                                        $selectedValue = $data['data_id']['alasan_pengajuan'];
                                                        $options = [
                                                            "SUDAH LEBIH DARI 1 BULAN",
                                                            "SUDAH JATUH TEMPO & DIPERPANJANG",
                                                            "NASABAH REGULER",
                                                            "NASABAH LOYAL",
                                                            "LAINNYA"
                                                        ];

                                                        $found = false;

                                                        foreach ($options as $option) {
                                                            if ($selectedValue === $option) {
                                                                echo '<option value="' . $option . '" selected="selected">' . $option . '</option>';
                                                                $found = true;
                                                            } else {
                                                                echo '<option value="' . $option . '">' . $option . '</option>';
                                                            }
                                                        }

                                                        // Jika nilai tidak ditemukan dalam opsi, tambahkan sebagai opsi terakhir
                                                        if (!$found && $selectedValue !== '') {
                                                            echo '<option value="' . $selectedValue . '" selected="selected">' . $selectedValue . '</option>';
                                                        }
                                                        ?>
                                                    </select>

                                                </div>
                                                <div class="form-group" style="display:none" id="hidden_div_lainnya">
                                                    <label class="col-form-label">Alasan Lainnya</label>
                                                    <input type="text" class="form-control" name="alasan_lain" value="<?= $data['data_id']['alasan_pengajuan'] ?>" oninput=" this.value=this.value.toUpperCase()">
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label">Jenis Produk</label>
                                                    <select name="jenis_produk" class="form-control" id="jenis_produk" onchange="loadData(this)" required>
                                                        <option value="" disabled selected>- SILAHKAN PILIH -</option>
                                                        <?php
                                                        foreach ($data['data_produk'] as $row) :
                                                        ?>
                                                            <option value="<?= $row['nama_produk'] ?>" <?= $row['nama_produk'] == $data['data_id']['jenis_produk'] ? 'selected="selected"' : ''; ?>><?= $row['nama_produk'] ?> </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label">Jenis Permohonan Pencairan Sebelum Jatuh Tempo</label>
                                                    <select name="jenis_pencairan" class="form-control" id="jenis_pencairan" required>
                                                        <?php
                                                        $selectedValue = $data['data_id']['jenis_permohonan_pencairan_sebelum_jt_pengajuan'];
                                                        $options = [
                                                            "DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN",
                                                            "DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN",
                                                            "TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN",
                                                            "TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN"
                                                        ];

                                                        $found = false;

                                                        foreach ($options as $option) {
                                                            if ($selectedValue === $option) {
                                                                echo '<option value="' . $option . '" selected="selected">' . $option . '</option>';
                                                                $found = true;
                                                            } else {
                                                                echo '<option value="' . $option . '">' . $option . '</option>';
                                                            }
                                                        }

                                                        // Jika nilai tidak ditemukan dalam opsi, tambahkan sebagai opsi terakhir
                                                        if (!$found && $selectedValue !== '') {
                                                            echo '<option value="' . $selectedValue . '" selected="selected">' . $selectedValue . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <label class="col-form-label">Jenis Kartu Identitas</label>
                                                <select name="jenis_kartu_identitas" class="form-control" id="jenis_kartu_identitas" onchange="showIdentitasLainnya(this)" required>
                                                    <?php
                                                    $selectedValue = $data['data_id']['jenis_kartu_identitas'];
                                                    $options = [
                                                        "KTP",
                                                        "LAINNYA"
                                                    ];

                                                    foreach ($options as $option) {
                                                        if ($selectedValue === $option) {
                                                            echo '<option value="' . $option . '" selected="selected">' . $option . '</option>';
                                                        } else {
                                                            echo '<option value="' . $option . '">' . $option . '</option>';
                                                        }
                                                    }

                                                    // Jika nilai awal bukan "KTP", pilih opsi "LAINNYA"
                                                    if ($selectedValue !== "KTP") {
                                                        echo '<script>document.getElementById("jenis_kartu_identitas").value = "LAINNYA";</script>';
                                                    }
                                                    ?>
                                                </select>

                                                <script>
                                                    // Panggil fungsi saat halaman dimuat
                                                    window.onload = function() {
                                                        // Panggil fungsi dengan parameter yang sesuai
                                                        showIdentitasLainnya(document.getElementById("jenis_kartu_identitas"));
                                                    };
                                                </script>
                                                <div class="form-group" style="display:none" id="hidden_identitas_lain">
                                                    <label class="col-form-label">Kartu Identitas Lainnya <span class="ml-1" style="color:red;">*</span></label>
                                                    <input type="text" class="form-control" id="identitas_lain" name="identitas_lain" value="<?= $data['data_id']['jenis_kartu_identitas']  ?>" placeholder="ex: AKTA KELAHIRAN" oninput="hanyaHuruf(event);this.value = this.value.toUpperCase()">
                                                    <label class="col-form-label">Nomor Kartu Identitas Lainnya<span class="ml-1" style="color:red;">*</span></label><span style="font-style: italic; margin-left: 5px; font-size: 8px; color: green;">(Nomor Identitas yang terdaftar di CBS)</span></label>
                                                    <input type="text" class="form-control" id="nomor_identitas_lain" name="nomor_identitas_lain" value="<?= $data['data_id']['nomor_identitas']  ?>"oninput="hanyaAngkaHuruf(event); if(this.value.length > 0) { this.value = this.value.toUpperCase(); }" maxlength="18">
                                                </div>

                                                <div class="form-group" style="display:none" id="hidden_nomor_ktp">
                                                    <label class="col-form-label">Nomor KTP</label><span class="ml-1" style="color:red;">*</span>
                                                    <input type="text" class="form-control" id="nomor_ktp" name="nomor_ktp" value="<?= $data['data_id']['nomor_identitas']  ?>" oninput="hanyaAngka(event); validateKTP(event)" maxlength="16">
                                                    <span id="ktpWarning" style="color:red; display:none;">Nomor KTP harus terdiri dari 16 digit !</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label">Nama Nasabah</label>
                                                    <input type="text" class="form-control" name="nama_nasabah" oninput="hanyaHuruf(event); this.value = this.value.toUpperCase()" value="<?= $data['data_id']['nama_nasabah']  ?>">
                                                </div>
                                                <div style="display:none" id="hidden_status_nasabah">
                                                    <label class="col-form-label">Status Nasabah</label>
                                                    <span style="font-style: italic; margin-left: 5px; font-size: 8px; color: green;">(Dicentang jika nasabah yang mengajukan sudah disetujui oleh Direksi)</span>
                                                    <div class="input-group-text">
                                                        <label style="vertical-align: middle;">
                                                            <input type="checkbox" id="status_nasabah" name="status_nasabah" value="<?= $data['data_id']['status_nasabah'] ?>" aria-label="Checkbox for following text input" style="vertical-align: middle;" <?php if ($data['data_id']['status_nasabah'] === "NASABAH PRIORITY") echo "checked"; ?>>
                                                            Nasabah Priority
                                                        </label>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="alamat-text" class="col-form-label">Alamat</label>
                                                    <textarea class="form-control" name="alamat" oninput="this.value = this.value.toUpperCase()"><?= $data['data_id']['alamat']  ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label">Nomor Telepon</label>
                                                    <input type="text" class="form-control" name="nomor_telepon" oninput="hanyaAngka(event)" value="<?= $data['data_id']['nomor_telepon']  ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label">Nominal</label>
                                                    <input type="text" class="form-control" name="nominal" id="nominal" value="<?= number_format($data['data_id']['nominal'], 0, ',', '.')  ?>" oninput="hanyaAngka(event); tandaPemisahTitik(this)">
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label" style="display:none" id="label_suku_bunga_deposito">Suku Bunga Deposito</label>
                                                    <input type="hidden" class="form-control" name="suku_bunga_deposito" id="hidden_suku_bunga_deposito" value="<?= $data['data_id']['suku_bunga_deposito']  ?>" oninput="hanyaAngka(event)">
                                                </div>

                                                <!-- <div class="form-group" style="display:none" id="hidden_deposito"> -->

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6 col-xxl-6 ">
                                        <div class="card flex-fill">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="tgl_pembentukan" class="col-form-label" id="label_tgl_pembentukan" style="display: none">Tanggal Pembentukan</label>
                                                    <label for="tgl_perpanjangan" class="col-form-label" id="label_tgl_perpanjangan" style="display: none">Tanggal Perpanjangan</label>
                                                    <input type="date" class="form-control" id="tgl_pembentukan_visible" style="display: none" name="tgl_pembentukan_visible" required onchange="myFunction(this.value)" value="<?= $data['data_id']['tgl_pembentukan'] ?>" max="">
                                                    <input type="hidden" id="tgl_pembentukan_hidden" name="tgl_pembentukan_hidden">
                                                </div>
                                                <div class="form-group">
                                                    <label id="label_jangka_Waktu" class="col-form-label" style="display: none">Jangka Waktu</label>
                                                    <select id="jangka_waktu" name="jangka_waktu" style="display: none" class="form-control" required>
                                                        <?php
                                                        foreach ($data['jangka_waktu'] as $row) :
                                                        ?>
                                                            <option value="<?= $row['jangka_waktu'] ?>" <?= $row['jangka_waktu'] == $data['data_id']['jangka_waktu'] ? 'selected="selected"' : ''; ?>><?= $row['jangka_waktu'] ?> </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label class="col-form-label" id="label_norek_deposito" style="display: none">Nomor Rekening Deposito</label>
                                                    <input type="hidden" id="norek_deposito" class="form-control" name="norek_deposito" oninput="hanyaAngka(event)" value="<?= $data['data_id']['nomor_rekening_deposito']  ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label" style="display:none" id="label_nominal_penalti">Nominal Penalti</label>
                                                    <input type="hidden" class="form-control" name="nominal_penalti" id="hidden_nominal_penalti" oninput="hanyaAngka(event); tandaPemisahTitik(this)" value="<?= number_format($data['data_id']['nominal_penalti'], 0, ',', '.')  ?>" onkeypress="return hanyaAngka(event)">
                                                    <label class="col-form-label" style="display:none" id="label_jumlah_hari_mengendap">Jumlah Hari Mengendap</label>
                                                    <input type="hidden" class="form-control" name="jumlah_hari_mengendap" id="hidden_jumlah_hari_mengendap" value="<?= $data['data_id']['jumlah_hari_mengendap']  ?>" oninput="hanyaAngka(event)">

                                                    <label class="col-form-label" style="display:none" id="label_jumlah_hari">Jumlah Hari</label>
                                                    <input type="hidden" class="form-control" name="jumlah_hari" id="hidden_jumlah_hari" value="<?= $data['data_id']['jumlah_hari']  ?>" oninput="hanyaAngka(event)">
                                                    <label class="col-form-label" style="display:none" id="label_nominal_bunga">Nominal Bunga Berjalan</label>
                                                    <input type="hidden" class="form-control" name="nominal_bunga_berjalan" id="hidden_nominal_bunga_berjalan" oninput="hanyaAngka(event); tandaPemisahTitik(this)" value="<?= number_format($data['data_id']['nominal_bunga_berjalan'], 0, ',', '.')  ?>" onkeypress="return hanyaAngka(event)">
                                                </div>
                                                <div class="form-group" style="display:none" id="hidden_rekening_pencairan">
                                                    <label class="col-form-label">Nomor Rekening Pencairan</label>
                                                    <input type="text" class="form-control" name="norek_pencairan" oninput="hanyaAngka(event)" value="<?= $data['data_id']['nomor_rekening_pencairan']  ?>">
                                                </div>
                                                <div class=" form-group">
                                                    <label for="alamat-text" class="col-form-label">Keterangan Funding</label>
                                                    <textarea class="form-control" name="keterangan_funding" placeholder="alasan untuk lebih meyakinkan approval" oninput="this.value = this.value.toUpperCase()"> <?= $data['data_id']['keterangan_funding']  ?> </textarea>
                                                </div>


                                                <div class="form-group" style="display:none" id="hidden_upload_bilyet">
                                                    <!-- <label class="col-form-label">Nama Bilyet</label>
                                                    <input type="text" class="form-control" name="nama_bilyet" onkeypress="return hanyaAngka(event)" value="<?= $data['data_id']['nama_gambar']  ?>"> -->

                                                    <!-- <label for="alamat-text" class="col-form-label">Upload Bilyet</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="customFile" name="bilyet" value="<?= $data['data_id']['nama_gambar']  ?>" aria-describedby="inputGroupFileAddon04">
                                                            <label class=" custom-file-label" for="customFile"><?= $data['data_id']['nama_gambar']  ?></label>
                                                        </div>
                                                    </div> -->
                                                </div>
                                                <button id="btn_form_funding_edit_data_pencairan" type="submit" class="btn btn-primary btn-lg">Update</button>
                                                <a onclick="btn_batal_update_pencairan(event); return false" href="<?= BASEURL; ?>/cs_funding/pencairan_sebelum_jatuh_tempo" class="btn btn-secondary btn-lg">Batal</a>
                                                <!-- <button id="form_funding_edit_permohonan_pencairan" type="submit" name='btn_simpan_kredit_lama' value='btn_simpan_kredit_lama' class="btn btn-primary btn-lg">Simpan</button>
                                            <a onclick="btn_batal_update_kredit(event); return false" href="<?= BASEURL; ?>/funding/permohonan_pencairan" class="btn btn-secondary btn-lg">Batal</a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </main>

                    </form>
                    <script>
                        // JavaScript
                        const today = new Date().toISOString().split('T')[0];
                        document.getElementById('tgl_pembentukan_visible').max = today;
                    </script>
                    <script>
                        var alasanPengajuan = document.getElementById("alasan_pengajuan");
                        var hiddenLabelPembentukan = document.getElementById("label_tgl_pembentukan");
                        var hiddenLabelPerpanjangan = document.getElementById("label_tgl_perpanjangan");
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
                    </script>

                    <?php
                    if ($data['data_id']['jenis_produk'] == 'SI DEKA' || $data['data_id']['jenis_produk'] == 'SI DEKO' || $data['data_id']['jenis_produk'] == 'PRIMA' || $data['data_id']['jenis_produk'] == 'GOLDEN AGE') {
                        if ($data['data_id']['alasan_pengajuan'] == 'SUDAH JATUH TEMPO & DIPERPANJANG') {
                    ?>
                            <script>
                                document.getElementById("label_tgl_perpanjangan").style.display = "block";
                                hiddenStatusNasabah.style.display = "block";
                                document.getElementById("label_tgl_pembentukan").style.display = "none";
                            </script>
                        <?php
                        } else {
                        ?>
                            <script>
                                document.getElementById("label_tgl_perpanjangan").style.display = "none";
                                hiddenStatusNasabah.style.display = "none";
                                document.getElementById("label_tgl_pembentukan").style.display = "block";
                            </script>
                        <?php
                        }
                        ?>
                        <script>
                            document.getElementById("tgl_pembentukan_visible").style.display = "block";
                            document.getElementById("label_jangka_Waktu").style.display = "block";
                            document.getElementById("jangka_waktu").style.display = "block";
                            document.getElementById("label_norek_deposito").style.display = "block";
                            document.getElementById("norek_deposito").type = "text";
                            document.getElementById('hidden_upload_bilyet').style.display = "block";
                        </script>
                    <?php
                    } else {
                    ?>
                        <!-- <script>
                            hiddenLabelPembentukan.style.display = "none";
                            hiddenTglPembentukan.style.display = "none";
                            hiddenLabelJangkaWaktu.style.display = "none";
                            selectJangkaWaktu.style.display = "none";
                            hiddenLabelNorekDeposito.style.display = "none";
                            hiddenNorekDeposito.style.display = "none";
                            document.getElementById('hidden_upload_bilyet').style.display = "none";
                        </script> -->
                    <?php
                    }
                    ?>



                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- footer -->
        <?php $this->view('cs_funding/footer') ?>
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
    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            var nomorKTPInputs = document.querySelectorAll('input[name="nomor_ktp"], input[name="nomor_identitas_lain"]');
            var statusNasabahCheckbox = document.getElementById('status_nasabah');

            nomorKTPInputs.forEach(function(nomorKTPInput) {
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
        });
    </script> -->

    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fungsi pengecekan saat halaman pertama kali dimuat
            checkInitialNasabahStatus();

            var nomorKTPInputs = document.querySelectorAll('input[name="nomor_ktp"], input[name="nomor_identitas_lain"]');
            var statusNasabahCheckbox = document.getElementById('status_nasabah');

            nomorKTPInputs.forEach(function(nomorKTPInput) {
                nomorKTPInput.addEventListener('blur', function(event) {
                    // Fungsi pengecekan saat input berubah
                    checkNasabahStatus();
                });
            });

            // Fungsi untuk melakukan pengecekan status nasabah saat halaman pertama kali dimuat
            function checkInitialNasabahStatus() {
                var nomorKTPInputValue = document.querySelector('input[name="nomor_ktp"]').value;
                var nomorIdentitasLainInputValue = document.querySelector('input[name="nomor_identitas_lain"]').value;
                var no_ktp = nomorKTPInputValue || nomorIdentitasLainInputValue;

                if (no_ktp.length === 16) {
                    $.ajax({
                        type: 'post',
                        url: '<?= BASEURL . '/cs_funding/cek_nasabah_priority' ?>',
                        data: {
                            nomor_identitas: no_ktp // Menggunakan nomor_identitas sebagai key untuk data POST
                        },
                        success: function(response) {
                            console.log("cek_respon : " + response);
                            console.log("Checkbox ditemukan: ", statusNasabahCheckbox);
                            if (response.trim() === "ada") {
                                console.log("Checkbox akan diaktifkan");
                                statusNasabahCheckbox.disabled = false;
                            } else {
                                console.log("Checkbox akan dinonaktifkan");
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
            }

            // Fungsi untuk melakukan pengecekan status nasabah saat input nomor KTP berubah
            function checkNasabahStatus() {
                var nomorKTPInputs = document.querySelectorAll('input[name="nomor_ktp"], input[name="nomor_identitas_lain"]');
                var statusNasabahCheckbox = document.getElementById('status_nasabah');

                nomorKTPInputs.forEach(function(nomorKTPInput) {
                    nomorKTPInput.addEventListener('blur', function(event) {
                        var no_ktp = event.target.value;
                        if (no_ktp.length === 16) {
                            $.ajax({
                                type: 'post',
                                url: '<?= BASEURL . '/cs_funding/cek_nasabah_priority' ?>',
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

            }
        });
    </script> -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fungsi pengecekan saat halaman pertama kali dimuat
            checkInitialNasabahStatus();

            var nomorKTPInputs = document.querySelectorAll('input[name="nomor_ktp"], input[name="nomor_identitas_lain"]');
            var statusNasabahCheckbox = document.getElementById('status_nasabah');

            nomorKTPInputs.forEach(function(nomorKTPInput) {
                nomorKTPInput.addEventListener('blur', function(event) {
                    // Fungsi pengecekan saat input berubah
                    checkNasabahStatus();
                });
            });

            // Fungsi untuk melakukan pengecekan status nasabah saat halaman pertama kali dimuat
            function checkInitialNasabahStatus() {
                var nomorKTPInputValue = document.querySelector('input[name="nomor_ktp"]').value;
                var nomorIdentitasLainInputValue = document.querySelector('input[name="nomor_identitas_lain"]').value;
                var no_ktp = nomorKTPInputValue || nomorIdentitasLainInputValue;

                checkNasabahStatusWithAjax(no_ktp);
            }

            // Fungsi untuk melakukan pengecekan status nasabah saat input nomor KTP berubah
            function checkNasabahStatus() {
                var nomorKTPInputValue = document.querySelector('input[name="nomor_ktp"]').value;
                var nomorIdentitasLainInputValue = document.querySelector('input[name="nomor_identitas_lain"]').value;
                var no_ktp = nomorKTPInputValue || nomorIdentitasLainInputValue;

                checkNasabahStatusWithAjax(no_ktp);
            }

            function checkNasabahStatusWithAjax(no_ktp) {
                var statusNasabahCheckbox = document.getElementById('status_nasabah');

                if (no_ktp.length >= 5 && no_ktp.length <= 20) {
                    $.ajax({
                        type: 'post',
                        url: '<?= BASEURL . '/cs_funding/cek_nasabah_priority' ?>',
                        data: {
                            nomor_identitas: no_ktp // Menggunakan nomor_identitas sebagai key untuk data POST
                        },
                        success: function(response) {
                            // console.log("cek_respon : " + response);
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
            }
        });
    </script>



    <script>
        function AOLainnya(select) {
            if (select.value == 'LAINNYA') {
                document.getElementById('hidden_AO_lainnya').style.display = "block";
            } else {
                document.getElementById('hidden_AO_lainnya').style.display = "none";
            }
        }
    </script>




    <!-- jquery untuk mask tanggal -->
    <script src="<?= BASEURL ?>/assets/plugins/jquery/jquery.mask.min.js"></script>
    <script src="<?= BASEURL ?>/assets/plugins/moment/moment-with-locales.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= BASEURL ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- handlde select  -->
    <script src="<?= BASEURL ?>/assets/plugins/select2/js/select2.full.min.js"></script>

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
        var selectJenisProduk = document.getElementById("jenis_produk");
        var selectJenisPencairan = document.getElementById("jenis_pencairan");
        var selectJangkaWaktu = document.getElementById("jangka_waktu");
        var hiddenLabelJangkaWaktu = document.getElementById("label_jangka_Waktu");
        var hiddenLabelPembentukan = document.getElementById("label_tgl_pembentukan");
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
        var alasanPengajuan = document.getElementById("alasan_pengajuan");
    </script>
    <?php
    if ($data['data_id']['jenis_permohonan_pencairan_sebelum_jt_pengajuan']  == 'DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN') {
    ?>
        <script>
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
            document.getElementById('hidden_rekening_pencairan').style.display = "block";
        </script>
    <?php
    } else if ($data['data_id']['jenis_permohonan_pencairan_sebelum_jt_pengajuan']  == 'TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN') {
    ?>
        <script>
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
            document.getElementById('hidden_rekening_pencairan').style.display = "block";
        </script>
    <?php
    } else if ($data['data_id']['jenis_permohonan_pencairan_sebelum_jt_pengajuan']  == 'DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN') {
    ?>
        <script>
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
            document.getElementById('hidden_rekening_pencairan').style.display = "none";
        </script>
    <?php
    } else {
    ?>
        <script>
            // document.getElementById('hidden_persentase_finalty').style.display = "none";
            // document.getElementById('hidden_div').style.display = "block";
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
            document.getElementById('hidden_rekening_pencairan').style.display = "none";
        </script>
    <?php
    }
    ?>

    <?php
    if ($data['data_id']['alasan_pengajuan']  != 'SUDAH LEBIH DARI 1 BULAN' || $data['data_id']['alasan_pengajuan']  != 'NASABAH REGULER' || $data['data_id']['alasan_pengajuan']  != 'NASABAH LOYAL') {
    ?>
        <script>
            document.getElementById('hidden_div_lainnya').style.display = "none";
        </script>
    <?php
    } else {
    ?>
        <!-- <script>
                            hiddenLabelSukuBunga.style.display = "none";
                            hiddenPersentase.style.display = "none";
                            hiddenLabelNominalPenalti.style.display = "block";
                            hiddenNominalPenalti.type = "text";
                            hiddenLabelJumlahHari.style.display = "block";
                            hiddenJumlahHari.type = "text";
                            hiddenLabelNominalBunga.style.display = "block";
                            hiddenNominalBungaBerjalan.type = "text";
                            document.getElementById('hidden_rekening_pencairan').style.display = "none";
                        </script> -->
    <?php
    }
    ?>
    <script>
        function loadData() {
            var select1 = document.getElementById("jenis_produk");
            var select2 = document.getElementById("jangka_waktu");
            var selectedOption = select1.options[select1.selectedIndex].value;

            // Menghapus pilihan sebelumnya dari select2
            select2.innerHTML = '<option value="default">-SILAHKAN PILIH-</option>';

            // Memperbarui pilihan jangka waktu berdasarkan opsi yang dipilih pada jenis_produk
            var jangkaWaktuOptions = [];

            // Menentukan pilihan jangka waktu berdasarkan opsi jenis_produk yang dipilih
            switch (selectedOption) {
                case "SI DEKA":
                    jangkaWaktuOptions = <?= json_encode($data['jw']) ?>;
                    break;
                case "PRIMA":
                    jangkaWaktuOptions = <?= json_encode($data['jw_prima']) ?>;
                    break;
                case "SI DEKO":
                    jangkaWaktuOptions = <?= json_encode($data['jangka_waktu']) ?>;
                    break;
                case "GOLDEN AGE":
                    jangkaWaktuOptions = <?= json_encode($data['jw_golden_age']) ?>;
                    break;
                    // Tambahkan kasus lain jika diperlukan
                default:
                    break;
            }

            // Tambahkan opsi jangka waktu yang baru ke select2
            jangkaWaktuOptions.forEach(function(row) {
                var option = document.createElement("option");
                option.value = row['jangka_waktu'];
                option.text = row['jangka_waktu'];
                select2.appendChild(option);
            });
        }


        var visibleDateInput = document.getElementById("tgl_pembentukan_visible");
        var hiddenDateInput = document.getElementById("tgl_pembentukan_hidden");

        visibleDateInput.addEventListener("change", function() {
            hiddenDateInput.value = visibleDateInput.value;
        });


        selectJenisProduk.addEventListener("change", function() {
            if (selectJenisProduk.value == 'SI DEKO' || selectJenisProduk.value == 'SI DEKA' || selectJenisProduk.value == 'PRIMA' || selectJenisProduk.value == 'GOLDEN AGE') {
                hiddenLabelPembentukan.style.display = "block";
                hiddenTglPembentukan.style.display = "block";
                hiddenLabelJangkaWaktu.style.display = "block";
                selectJangkaWaktu.style.display = "block";
                hiddenLabelNorekDeposito.style.display = "block";
                hiddenNorekDeposito.type = "text";
                document.getElementById('hidden_upload_bilyet').style.display = "block";
            } else {
                hiddenLabelPembentukan.style.display = "none";
                hiddenTglPembentukan.style.display = "none";
                hiddenLabelJangkaWaktu.style.display = "none";
                selectJangkaWaktu.style.display = "none";
                hiddenLabelNorekDeposito.style.display = "none";
                hiddenNorekDeposito.style.display = "none";
                document.getElementById('hidden_upload_bilyet').style.display = "none";
            }
        });

        selectJenisPencairan.addEventListener("change", function() {
            if (selectJenisPencairan.value == 'DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN') {
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
                document.getElementById('hidden_rekening_pencairan').style.display = "block";
            } else if (selectJenisPencairan.value == 'TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN') {
                hiddenLabelSukuBunga.style.display = "block";
                hiddenSukuBunga.type = "text";
                hiddenLabelNominalPenalti.style.display = "block";
                hiddenNominalPenalti.style.display = "block";
                hiddenLabelJumlahHari.style.display = "block";
                hiddenJumlahHari.type = "text";
                hiddenLabelJumlahHariMengendap.style.display = "block";
                hiddenJumlahHariMengendap.type = "text";
                hiddenLabelNominalBunga.style.display = "block";
                hiddenNominalBungaBerjalan.style.display = "block";
                document.getElementById('hidden_rekening_pencairan').style.display = "block";
            } else if (selectJenisPencairan.value == 'DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN') {
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
                document.getElementById('hidden_rekening_pencairan').style.display = "none";
            } else {
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
                document.getElementById('hidden_rekening_pencairan').style.display = "none";
            }
        });

        var dateInput = document.getElementById("tgl_pembentukan_visible");
        var outputField = document.getElementById("hidden_jumlah_hari");
        var outputFieldMengendap = document.getElementById("hidden_jumlah_hari_mengendap");
        var inputNominal = document.getElementById("nominal");
        // Tambahkan event listener ke elemen input teks
        dateInput.addEventListener("input", function() {
            var nominalValue = inputNominal.value;
            var tanggalAwal = new Date(dateInput.value);
            tanggalAwal.setDate(tanggalAwal.getDate() + 1);
            var tanggalAkhir = new Date();
            var selisihWaktu = tanggalAkhir.getTime() - tanggalAwal.getTime();
            var selisihHari = Math.ceil(selisihWaktu / (1000 * 3600 * 24));

            // Output selisih hari ke outputFieldMengendap
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

            var tambahanHari = 0;

            // Jika tanggal awal adalah 30 atau 31
            console.log("Tanggal Awal: " + tanggalAwal.getDate());

            // tanggalAwal.getDate() === 1 bukan === 31 karena tanggalAwal + 1 (besoknya baru dihitung 1 hari)
            if (tanggalAwal.getDate() >= 30 || tanggalAwal.getDate() === 1) {
                // Jika bulan terakhir adalah Februari
                if (tanggalJatuhTempoTerakhir.getMonth() === 1) {

                    // Jika periode mencakup bulan Februari
                    var tahunKabisat = (tanggalJatuhTempoTerakhir.getFullYear() % 4 == 0 && tanggalJatuhTempoTerakhir.getFullYear() % 100 != 0) || (tanggalJatuhTempoTerakhir.getFullYear() % 400 == 0);
                    tambahanHari = (tahunKabisat) ? 2 : 1; // Menambahkan 2 hari jika tahun kabisat, jika tidak, tambahkan 1 hari
                }
            }

            // Menambahkan tambahan hari ke selisihHari
            selisihHari += tambahanHari;

            if (tanggalAwal.getMonth() === tanggalHariIni.getMonth() && tanggalAwal.getFullYear() === tanggalHariIni.getFullYear()) {
                outputField.value = outputFieldMengendap.value;
            } else {
                // Output selisih hari ke outputField
                outputField.value = selisihHari;
            }

        });


        function calculateInterest() {
            var tanggalBentuk = new Date(dateInput.value);
            var nominalValue = parseInt(inputNominal.value.replace(/\./g, ''));
            var sukuBunga = parseFloat(hiddenSukuBunga.value);


            tanggalBentuk.setDate(tanggalBentuk.getDate() + 1);
            var tanggalAkhir = new Date();
            var selisihWaktu = tanggalAkhir.getTime() - tanggalBentuk.getTime();
            var selisihHari = Math.ceil(selisihWaktu / (1000 * 3600 * 24));

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
        var selectAlasan = document.getElementById("alasan_pengajuan");
        var jumlahHariBungaBerjalan = document.getElementById("hidden_jumlah_hari");
        // Event listeners for fields
        inputNominal.addEventListener('input', calculateInterest);
        hiddenTglPembentukan.addEventListener('change', calculateInterest);
        selectJangkaWaktu.addEventListener('change', calculateInterest);
        selectAlasan.addEventListener('change', calculateInterest);
        hiddenSukuBunga.addEventListener('input', calculateInterest);
        jumlahHariBungaBerjalan.addEventListener('input', calculateInterest);


        function showIdentitasLainnya(select) {
            var identitas_lain = document.getElementById("hidden_identitas_lain");
            var nomor_identitas_lain = document.getElementById("nomor_identitas_lain");
            var nomor_ktp = document.getElementById("hidden_nomor_ktp");
            var selectedValue = select.value;
            if (selectedValue === 'KTP') {
                nomor_ktp.style.display = "block";
                document.getElementById('hidden_identitas_lain').style.display = "none";
                identitas_lain.setAttribute('required', 'false');
                nomor_identitas_lain.setAttribute('required', 'false');
            } else {
                nomor_ktp.style.display = "none";
                identitas_lain.setAttribute('required', 'true');
                nomor_identitas_lain.setAttribute('required', 'true');
                identitas_lain.style.display = "block";
            }
        }



        function showDivLainnya(select) {
            if (select.value == 'LAINNYA') {
                document.getElementById('hidden_div_lainnya').style.display = "block";
            } else {
                document.getElementById('hidden_div_lainnya').style.display = "none";
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

        function hanyaAngkaHuruf(evt) {
            var input = evt.target.value;
            var formattedInput = input.replace(/[^A-Za-z0-9\s]/g, ''); // Hanya membiarkan huruf, angka, dan spasi

            if (input !== formattedInput) {
                evt.target.value = formattedInput; // Mengganti nilai input dengan yang divalidasi
                alert("Inputan hanya boleh huruf dan angka");
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

        $("#form_funding_edit_data_pencairan").on('submit', function(e, params) {
            var localParams = params || {};

            if (!localParams.send) {
                e.preventDefault();
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
                                $("#form_funding_edit_data_pencairan").off("submit").submit();
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
                            $("#form_funding_edit_data_pencairan").off("submit").submit();
                        })
                    }
                });
            }
        })

        function btn_batal_update_pencairan(ev) {
            var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
            console.log(urlToRedirect); // verify if this is the right URL
            Swal.fire({
                title: "Yakin batal update?",
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



        // function hanyaHuruf(evt) {
        //     var charCode = (evt.which) ? evt.which : event.keyCode
        //     if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode > 32) {
        //         alert("Inputan Hanya Huruf");
        //         return false;
        //     }
        //     return true;
        // }
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

    <!-- javascript -->
    <script type="text/javascript">
        function showDiv(select) {
            if (select.value == 'Mitra Rencana') {
                document.getElementById('hidden_deposito').style.display = "none";
                document.getElementById('hidden_upload_bilyet').style.display = "none";
                document.getElementById('hidden_persentase_finalty').style.display = "none";
                document.getElementById('hidden_div_tgl').style.display = "block";
                document.getElementById('hidden_div_tmr').style.display = "block";
                document.getElementById('hidden_div_sabar').style.display = "none";
            } else if (select.value == 'Si Mitra Bagi Rezeki') {
                document.getElementById('hidden_deposito').style.display = "none";
                document.getElementById('hidden_upload_bilyet').style.display = "none";
                document.getElementById('hidden_persentase_finalty').style.display = "none";
                document.getElementById('hidden_div_tmr').style.display = "none";
                document.getElementById('hidden_div_tgl').style.display = "block";
                document.getElementById('hidden_div_sabar').style.display = "block";
            } else if (select.value == 'SI DEKO' || select.value == 'SI DEKA' || select.value == 'PRIMA' || select.value == 'GOLDEN AGE') {
                document.getElementById('hidden_div_tgl').style.display = "block";
                document.getElementById('hidden_deposito').style.display = "block";
                document.getElementById('hidden_upload_bilyet').style.display = "block";
                document.getElementById('hidden_persentase_finalty').style.display = "none";
                document.getElementById('hidden_div_tmr').style.display = "none";
                document.getElementById('hidden_div_sabar').style.display = "none";
            } else {
                document.getElementById('hidden_deposito').style.display = "none";
                document.getElementById('hidden_upload_bilyet').style.display = "none";
                document.getElementById('hidden_persentase_finalty').style.display = "none";
                document.getElementById('hidden_div_tgl').style.display = "none";
                document.getElementById('hidden_div_tmr').style.display = "none";
                document.getElementById('hidden_div_sabar').style.display = "none";
            }
        }

        function showDiv1(select) {
            if (select.value == 'DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN') {
                document.getElementById('hidden_persentase_finalty').style.display = "block";
                document.getElementById('hidden_div').style.display = "block";
                document.getElementById('hidden_rekening_pencairan').style.display = "block";
            } else if (select.value == 'TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN') {
                document.getElementById('hidden_persentase_finalty').style.display = "none";
                document.getElementById('hidden_div').style.display = "block";
                document.getElementById('hidden_rekening_pencairan').style.display = "block";
            } else if (select.value == 'DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN') {
                document.getElementById('hidden_persentase_finalty').style.display = "block";
                document.getElementById('hidden_div').style.display = "block";
                document.getElementById('hidden_rekening_pencairan').style.display = "none";
            } else {
                document.getElementById('hidden_persentase_finalty').style.display = "none";
                document.getElementById('hidden_div').style.display = "block";
                document.getElementById('hidden_rekening_pencairan').style.display = "none";
            }
        }

        function showDiv2(select) {
            if (select.value == 'deposito') {
                document.getElementById('hidden_div3').style.display = "block";
            } else {
                document.getElementById('hidden_div3').style.display = "none";
            }
        }

        function showDivLainnya(select) {
            if (select.value == 'LAINNYA') {
                document.getElementById('hidden_div_lainnya').style.display = "block";
            } else {
                document.getElementById('hidden_div_lainnya').style.display = "none";
            }
        }
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

    <script>
        var kode_instansi = $('.kode_instansi')
        var nama_instansi = $('.nama_instansi')

        kode_instansi.on('change', function() {
            var instansi = kode_instansi.val().split('##')
            nama_instansi.val(instansi[1])
        })
    </script>




    <!-- daftar nasabah lama -->
    <script>
        $(".modal_no_ktp").modal("show");

        $(".modal_cetak_laporan_cs").modal("show");

        $(".modal_cetak_laporan_cs").modal("show");

        $(document).ready(function() {
            $('#tabel_data_kredit').DataTable({
                "oLanguage": {

                    "sSearch": "Cari Data:",
                    "sShow": "Cari Data:",
                },

                responsive: true,
            });
        });




        // $("#form_funding_edit_permohonan_pencairan").on('submit', function(e, params) {
        //     var localParams = params || {};

        //     if (!localParams.send) {
        //         e.preventDefault();
        //     }

        //     var nilaiPenalti = parseFloat($("#hidden_nominal_penalti").val().replace(/\./g, '').replace(',', '.')) || 0;
        //     var jenisPencairan = $("#jenis_pencairan").val();

        //     if (nilaiPenalti === 0) {
        //         if (jenisPencairan === "TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN" ||
        //             jenisPencairan === "TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN") {
        //             Swal.fire({
        //                 title: "Yakin data sudah benar?",
        //                 showCancelButton: true,
        //                 confirmButtonText: "Ya",
        //                 cancelButtonText: "Batal",
        //                 confirmButtonColor: "#3EC59D",
        //                 cancelButtonColor: "#BB2D3B",
        //                 showLoaderOnConfirm: true,
        //             }).then((result) => {
        //                 if (result.isConfirmed) {
        //                     Swal.fire({
        //                         icon: 'success',
        //                         title: 'Data berhasil Disimpan',
        //                         showConfirmButton: false,
        //                         timer: 1500
        //                     }).then((result) => {
        //                         $("#form_funding_tambah_permohonan_pencairan").off("submit").submit();
        //                     })
        //                 }
        //             });
        //         } else {
        //             // Tampilkan pesan bahwa jenis pencairan yang dipilih tidak sesuai
        //             Swal.fire({
        //                 icon: 'error',
        //                 title: 'Jenis permohonan pencairan yang dipilih tidak sesuai',
        //                 text: 'Pilih opsi yang sesuai untuk penalti 0',
        //                 confirmButtonColor: "#3EC59D",
        //             });
        //             e.preventDefault(); // Mencegah pengajuan jika jenis pencairan tidak sesuai
        //         }
        //     } else {
        //         // Tampilkan pesan bahwa nilai penalti bukan 0
        //         Swal.fire({
        //             title: "Yakin data sudah benar?",
        //             showCancelButton: true,
        //             confirmButtonText: "Ya",
        //             cancelButtonText: "Batal",
        //             confirmButtonColor: "#3EC59D",
        //             cancelButtonColor: "#BB2D3B",
        //             showLoaderOnConfirm: true,
        //         }).then((result) => {
        //             if (result.isConfirmed) {
        //                 Swal.fire({
        //                     icon: 'success',
        //                     title: 'Data berhasil Disimpan',
        //                     showConfirmButton: false,
        //                     timer: 1500
        //                 }).then((result) => {
        //                     $("#form_funding_tambah_permohonan_pencairan").off("submit").submit();
        //                 })
        //             }
        //         });
        //     }
        // })

        // function btn_batal_update_kredit(ev) {
        //     var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
        //     console.log(urlToRedirect); // verify if this is the right URL
        //     Swal.fire({
        //         title: "Yakin batal simpan?",
        //         // icon: 'success',
        //         showCancelButton: true,
        //         confirmButtonText: "Ya",
        //         cancelButtonText: "Tidak",
        //         confirmButtonColor: "#3EC59D",
        //         cancelButtonColor: "#BB2D3B",

        //         showLoaderOnConfirm: true,
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             window.location.href = urlToRedirect;
        //         } else {

        //         }
        //     })

        // }
    </script>

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