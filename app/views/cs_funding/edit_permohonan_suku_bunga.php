<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Daftar Pengajuan</title>

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
                            <h1 class="m-0">Edit Data Permohonan Suku Bunga Khusus</h1>
                        </div>

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <!-- container fluid -->
                <div class="container-fluid">




                    <form id="form_funding_edit_data_suku_bunga" id="form_update" action="<?= BASEURL; ?>/cs_funding/update_data_suku_bunga" method="POST">
                        <main class="content">
                            <div class="container-fluid p-0">
                                <div class="row ">
                                    <div class="col-12 col-lg-6 col-xxl-6 ">
                                        <div class="card flex-fill">
                                            <!-- <div class="card-header">
                                                <h1 class="h4 mb-0"><strong>Data Pemohon</strong></h1>
                                            </div> -->
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" name="id_permohonan" value="<?= $data['data_suku_bunga']['id_permohonan'] ?>" />
                                                    <label class="col-form-label">Nama AO</label>
                                                    <select name="nama_ao" class="form-control" id="nama_ao" onchange="AOLainnya(this)">
                                                        <option value="" <?= ($data['data_suku_bunga']['nama_ao'] === '' || $data['data_suku_bunga']['nama_ao'] === null) ? 'selected' : ''; ?>>- SILAHKAN PILIH -</option>
                                                        <?php
                                                        $foundMatch = false; // Inisialisasi variabel untuk menandai apakah ada kecocokan nilai
                                                        foreach ($data['data_funding'] as $row) :
                                                            if ($row['username'] == $data['data_suku_bunga']['nama_ao']) {
                                                                $foundMatch = true; // Setel kecocokan nilai menjadi true
                                                        ?>
                                                                <option value="<?= $row['username'] ?>" selected><?= $row['username'] ?></option>
                                                            <?php } else { ?>
                                                                <option value="<?= $row['username'] ?>"><?= $row['username'] ?></option>
                                                        <?php }
                                                        endforeach;
                                                        ?>
                                                        <option value="LAINNYA" <?= (!$foundMatch && $data['data_suku_bunga']['nama_ao'] !== '' && $data['data_suku_bunga']['nama_ao'] !== null) ? 'selected' : ''; ?>>LAINNYA</option>
                                                    </select>
                                                    <div class="form-group" style="display: <?= ($data['data_suku_bunga']['nama_ao'] === 'LAINNYA' || (!$foundMatch && $data['data_suku_bunga']['nama_ao'] !== '' && $data['data_suku_bunga']['nama_ao'] !== null)) ? 'block' : 'none'; ?>" id="hidden_AO_lainnya">
                                                        <label class="col-form-label">Nama AO Lainnya</label>
                                                        <input type="text" class="form-control" name="ao_lain" value="<?= $data['data_suku_bunga']['nama_ao'] === 'LAINNYA' ? '' : $data['data_suku_bunga']['nama_ao']; ?>" oninput="hanyaHuruf(event); this.value = this.value.toUpperCase()">
                                                    </div>
                                                    <label class="col-form-label">Jenis Produk</label>
                                                    <select name="jenis_produk" class="form-control" onchange="showDiv2(this)">
                                                        <option value="" disabled selected>- Silahkan Pilih -</option>
                                                        <?php
                                                        foreach ($data['data_produk'] as $row) :
                                                        ?>
                                                            <option value="<?= $row['nama_produk'] ?>" <?= $row['nama_produk'] == $data['data_suku_bunga']['jenis_produk'] ? 'selected="selected"' : ''; ?>><?= $row['nama_produk'] ?> </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label">Jenis Kartu Identitas</label>
                                                    <select name="jenis_kartu_identitas" class="form-control" id="jenis_kartu_identitas" onchange="showIdentitasLainnya(this)" required>
                                                        <?php
                                                        $selectedValue = $data['data_suku_bunga']['jenis_kartu_identitas'];
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
                                                </div>
                                                <div class="form-group" style="display:none" id="hidden_identitas_lain">
                                                    <label class="col-form-label">Kartu Identitas Lainnya <span class="ml-1" style="color:red;">*</span></label>
                                                    <input type="text" class="form-control" id="identitas_lain" name="identitas_lain" value="<?= $data['data_suku_bunga']['jenis_kartu_identitas']  ?>" placeholder="ex: AKTA KELAHIRAN" oninput="hanyaHuruf(event);this.value = this.value.toUpperCase()">
                                                    <label class="col-form-label">Nomor Kartu Identitas Lainnya<span class="ml-1" style="color:red;">*</span></label>
                                                    <input type="text" class="form-control" id="nomor_identitas_lain" name="nomor_identitas_lain" value="<?= $data['data_suku_bunga']['nomor_identitas']  ?>" oninput="hanyaAngkaHuruf(event);this.value = this.value.toUpperCase()" maxlength="16">
                                                </div>

                                                <div class="form-group" style="display:none" id="hidden_nomor_ktp">
                                                    <label class="col-form-label">Nomor KTP</label><span class="ml-1" style="color:red;">*</span>
                                                    <input type="text" class="form-control" id="nomor_ktp" name="nomor_ktp" value="<?= $data['data_suku_bunga']['nomor_identitas']  ?>" oninput="hanyaAngka(event); validateKTP(event)" maxlength="16">
                                                    <span id="ktpWarning" style="color:red; display:none;">Nomor KTP harus terdiri dari 16 digit !</span>
                                                </div>
                                                <div>
                                                    <label class="col-form-label">Nama Nasabah</label>
                                                    <input type="text" class="form-control" name="nama_nasabah" oninput="hanyaHuruf(event); this.value = this.value.toUpperCase()" value="<?= $data['data_suku_bunga']['nama_nasabah']  ?>">
                                                    <label class="col-form-label">Status Nasabah</label>
                                                    <select name="status_nasabah" class="form-control">
                                                        <!-- <option value="$data['data_suku_bunga']['status_nasabah']" <?= $data['data_suku_bunga']['status_nasabah'] ? 'selected="selected"' : ''; ?> > <?= $data['data_suku_bunga']['status_nasabah'] ?></option> -->
                                                        <option value="<?= $data['data_suku_bunga']['status_nasabah'] ?>" <?= $data['data_suku_bunga']['status_nasabah'] ? 'selected="selected"' : ''; ?>><?= $data['data_suku_bunga']['status_nasabah'] ?></option>
                                                        <option value="Nasabah Baru"> NASABAH BARU </option>
                                                        <option value="Nasabah Reguler"> NASABAH REGULER </option>
                                                        <option value="Nasabah Loyal"> NASABAH LOYAL </option>
                                                    </select>
                                                    <label for="alamat-text" class="col-form-label">Alamat</label>
                                                    <textarea class="form-control" name="alamat" required oninput="this.value = this.value.toUpperCase()"><?= $data['data_suku_bunga']['alamat']  ?></textarea>
                                                    <label class="col-form-label">Nomor Telepon</label>
                                                    <input type="text" class="form-control" name="nomor_telepon" oninput="hanyaAngka(event)" value="<?= $data['data_suku_bunga']['nomor_telepon']  ?>">
                                                    <label class="col-form-label">Nominal</label>
                                                    <input type="text" class="form-control" name="nominal" id="nominal" oninput="hanyaAngka(event); tandaPemisahTitik(this)" value="<?= number_format($data['data_suku_bunga']['nominal'], 0, ',', '.')  ?>" required>
                                                    <!-- <input type="text" class="form-control" name="nominal" value="<?= number_format($data['data_suku_bunga']['nominal'], 0, ',', '.')  ?>"  onkeypress="return hanyaAngka(event)"  onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"> -->
                                                </div>
                                                <div class="form-group" style="display:none" id="hidden_div">
                                                    <label class="col-form-label">Jangka Waktu</label>
                                                    <select name="jangka_waktu" class="form-control">
                                                        <option value="" disabled selected>- Silahkan Pilih -</option>
                                                        <?php
                                                        foreach ($data['jangka_waktu'] as $row) :
                                                        ?>
                                                            <option value="<?= $row['jangka_waktu'] ?>" <?= $row['jangka_waktu'] == $data['data_suku_bunga']['jangka_waktu'] ? 'selected="selected"' : ''; ?>><?= $row['jangka_waktu'] ?> </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <!-- <label class="col-form-label">Nomor Rekening Deposito</label>
                                                    <input type="text" class="form-control" name="norek_deposito" onkeypress="return hanyaAngka(event)" value="<?= $data['data_suku_bunga']['nomor_rekening_deposito']  ?>"> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xxl-6 ">
                                        <div class="card flex-fill">
                                            <!-- <div class="card-header">
                                                            <h1 class="h4 mb-0"><strong>Data Pekerjaan</strong></h1>
                                                        </div> -->
                                            <div class="card-body">
                                                <div class="form-group">

                                                    <label class="col-form-label">Suku Bunga pengajuan</label>
                                                    <input type="text" class="form-control" name="suku_bunga_pengajuan" id="suku_bunga_pengajuan" value="<?= $data['data_suku_bunga']['nilai_suku_bunga_pengajuan']  ?>" oninput="hanyaAngka(event)">
                                                    <label class="col-form-label">Suku Bunga Counter</label>
                                                    <input type="text" class="form-control" name="suku_bunga_counter" id="suku_bunga_counter" value="<?= $data['data_suku_bunga']['suku_bunga_counter']  ?>" oninput="hanyaAngka(event)">

                                                    <label class="col-form-label">Nama Keluarga</label>
                                                    <input type="text" class="form-control" name="nama_keluarga" value="<?= $data['data_suku_bunga']['nama_keluarga']  ?>" oninput="hanyaHuruf(event)">
                                                    <label for="alamat-text" class="col-form-label">Nilai Akumulasi Simpanan</label>
                                                    <input type="text" class="form-control" value="<?= number_format($data['data_suku_bunga']['nilai_akumulasi_simpanan'], 0, ',', '.')  ?>" name="nilai_akumulasi_simpanan" oninput="hanyaAngka(event); tandaPemisahTitik(this)">
                                                    <label class="col-form-label">CIF Keluarga</label>
                                                    <input type="text" class="form-control" name="cif_keluarga" value="<?= $data['data_suku_bunga']['cif_keluarga']  ?>" oninput="hanyaAngka(event)">
                                                    <label class="col-form-label">Nomor Telepon Keluarga</label>
                                                    <input type="text" class="form-control" name="nomor_telepon_keluarga" value="<?= $data['data_suku_bunga']['nomor_telepon_keluarga']  ?>" oninput="hanyaAngka(event)">
                                                    <label for="alamat-text" class="col-form-label">Keterangan Funding</label>
                                                    <textarea class="form-control" name="keterangan_funding" required oninput="this.value = this.value.toUpperCase()"> <?= $data['data_suku_bunga']['keterangan_funding']  ?></textarea>
                                                </div>
                                                <button id="btn_form_funding_edit_data_suku_bunga" type="submit" class="btn btn-primary btn-lg">Update</button>
                                                <a onclick="btn_batal_edit_suku_bunga(event); return false" href="<?= BASEURL; ?>/cs_funding/suku_bunga" class="btn btn-secondary btn-lg">Batal</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </main>

                    </form>

                    <?php
                    if ($data['data_suku_bunga']['jenis_produk'] == 'SI DEKA') {
                    ?>
                        <script>
                            document.getElementById('hidden_div').style.display = "block";
                        </script>
                    <?php
                    } else {
                    ?>
                        <script>
                            document.getElementById('hidden_div').style.display = "none";
                        </script>
                    <?php
                    }

                    ?>
                    <!-- untuk menampilkan titik otomatis saat input nilai rupiah -->
                    <script>
                        function showDiv2(select) {
                            if (select.value == 'SI DEKA') {
                                document.getElementById('hidden_div').style.display = "block";
                            } else {
                                document.getElementById('hidden_div').style.display = "none";
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
                        document.getElementById("suku_bunga_pengajuan").addEventListener("input", function(e) {
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
                        document.getElementById("suku_bunga_pengajuan").addEventListener("blur", function(e) {
                            let inputValue = this.value;
                            addZeroesIfRequired.call(this, inputValue);
                        });

                        document.getElementById("suku_bunga_pengajuan").addEventListener("change", function(e) {
                            let inputValue = this.value;
                            addZeroesIfRequired.call(this, inputValue);
                        });
                    </script>

                    <script>
                        // Function to add "00" if no digits are present after the decimal point
                        function addZeroesIfRequired(inputValue) {
                            if (inputValue.endsWith(".")) {
                                this.value = inputValue + "00";
                            }
                        }

                        // Existing event listener
                        document.getElementById("suku_bunga_counter").addEventListener("input", function(e) {
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
                        document.getElementById("suku_bunga_counter").addEventListener("blur", function(e) {
                            let inputValue = this.value;
                            addZeroesIfRequired.call(this, inputValue);
                        });

                        document.getElementById("suku_bunga_counter").addEventListener("change", function(e) {
                            let inputValue = this.value;
                            addZeroesIfRequired.call(this, inputValue);
                        });
                    </script>




                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
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

    <script>
        function AOLainnya(select) {
            if (select.value == 'LAINNYA') {
                document.getElementById('hidden_AO_lainnya').style.display = "block";
            } else {
                document.getElementById('hidden_AO_lainnya').style.display = "none";
            }
        }
    </script>
     <script>
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
    </script>

    <script>
        //  function hanyaHuruf(evt) {
        //     var charCode = (evt.which) ? evt.which : event.keyCode
        //     if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode > 32) {
        //         alert("Inputan Hanya Huruf");
        //         return false;
        //     }
        //     return true;
        // }

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
    </script>

    <script>
        function btn_batal_edit_suku_bunga(ev) {
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




        $("#form_funding_edit_data_suku_bunga").on('submit', function(e, params) {
            var localParams = params || {};

            if (!localParams.send) {
                e.preventDefault();
            }
            Swal.fire({
                title: "Yakin update data ?",
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
                        title: 'Data berhasil Diupdate',
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        $("#form_funding_edit_data_suku_bunga").off("submit").submit();
                    })


                }
            })
        })

        function btn_batal_update_kredit(ev) {
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