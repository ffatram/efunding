<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Permohonan Suku Bunga Khusus</title>

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
    <style>
        /* mengatur ukuran canvas tanda tangan  */
        canvas {
            border: 1px solid #ccc;
            border-radius: 0.5rem;
            width: 100%;
            height: 140px;
        }
    </style>


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
                            <h3 class="m-0">Form Suku Bunga Khusus</h3>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <!-- container fluid -->
                <div class="container-fluid">
                    <form id="form_funding_suku_bunga" id="form_update" type='submit' action="<?= BASEURL ?>/cs_funding/simpan_data_suku_bunga" method="POST"  enctype="multipart/form-data">
                        <main class="content">
                            <div class="container-fluid p-0">
                                <div class="row ">
                                    <div class="col-12 col-lg-6 col-xxl-6 ">
                                        <div class="card flex-fill">
                                            <!-- <div class="card-header">
                                                <h1 class="h4 mb-0"><strong>Bebas Finalty</strong></h1>
                                            </div> -->
                                            <div class="card-body">
                                                <div class="form-group">

                                                    <!-- <input type="hidden" class="form-control" name="no_permohonan_kredit" value="<?= $data['data_kredit']['no_permohonan_kredit'] ?>" /> -->
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" value="<?= $_COOKIE['nama_cabang']  ?>" name="kantor_cabang" required>
                                                        <input type="hidden" class="form-control" value="<?= $_COOKIE['username'] ?>" name="user_create" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Nama AO</label>
                                                        <select name="nama_ao" class="form-control" onchange="AOLainnya(this)">
                                                            <option value="" disabled selected>- SILAHKAN PILIH -</option>

                                                            <?php
                                                            foreach ($data['data_funding'] as $row) :
                                                            ?>
                                                                <option value="<?= $row['username'] ?>"><?= $row['username'] ?> </option>
                                                            <?php endforeach; ?>
                                                            <option value="LAINNYA">LAINNYA</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" style="display:none" id="hidden_AO_lainnya">
                                                        <label class="col-form-label">Nama AO Lainnya</label>
                                                        <input type="text" class="form-control" name="ao_lain" oninput="hanyaHuruf(event); this.value = this.value.toUpperCase()"">
                                                    </div>

                                                    <div class=" form-group">
                                                        <label class="col-form-label">Jenis Produk </label><span class="ml-1" style="color:red;">*</span>
                                                        <select name="jenis_produk" class="form-control" onchange="showDiv2(this)" required>
                                                            <option value="" disabled selected>- SILAHKAN PILIH -</option>

                                                            <?php
                                                            foreach ($data['data_produk'] as $row) :
                                                            ?>
                                                                <option value="<?= $row['nama_produk'] ?>"><?= $row['nama_produk'] ?> </option>
                                                            <?php endforeach; ?>
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
                                                        <label class="col-form-label">Nomor Kartu Identitas Lainnya<span class="ml-1" style="color:red;">*</span></label><span style="font-style: italic; margin-left: 5px; font-size: 8px; color: green;"></span></label>
                                                        <input type="text" class="form-control" id="nomor_identitas_lain" name="nomor_identitas_lain" oninput="hanyaAngkaHuruf(event);" maxlength="18">
                                                    </div>
                                                    <div class="form-group" style="display:none" id="hidden_nomor_ktp">
                                                        <label class="col-form-label">Nomor KTP</label><span class="ml-1" style="color:red;">*</span>
                                                        <input type="text" class="form-control" id="nomor_ktp" name="nomor_ktp" oninput="hanyaAngka(event); validateKTP(event)" maxlength="16">
                                                        <span id="ktpWarning" style="color:red; display:none;">Nomor KTP harus terdiri dari 16 digit !</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Nama Nasabah</label><span class="ml-1" style="color:red;">*</span>
                                                        <input type="text" class="form-control" name="nama_nasabah" oninput="hanyaHuruf(event); this.value = this.value.toUpperCase()" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Status Nasabah</label><span class="ml-1" style="color:red;">*</span>
                                                        <select name="status_nasabah" class="form-control" onchange="showDiv3(this)" required>
                                                            <option value="" disabled selected>- SILAHKAN PILIH -</option>
                                                            <option value="NASABAH BARU"> NASABAH BARU </option>
                                                            <option value="NASABAH REGULER"> NASABAH REGULER </option>
                                                            <option value="NASABAH LOYAL"> NASABAH LOYAL </option>
                                                        </select>
                                                    </div>
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
                                                    <div class="form-group" style="display:none" id="hidden_div3">
                                                        <label class="col-form-label">Jangka Waktu</label><span class="ml-1" style="color:red;">*</span>
                                                        <select name="jangka_waktu" id="jangka_waktu" class="form-control">
                                                            <option value="" disabled selected>- SILAHKAN PILIH -</option>
                                                            <?php
                                                            foreach ($data['jangka_waktu'] as $row) :
                                                            ?>
                                                                <option value="<?= $row['jangka_waktu'] ?>"> <?= $row['jangka_waktu'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>

                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-form-label">Suku Bunga pengajuan</label><span class="ml-1" style="color:red;">*</span>
                                                        <input type="text" class="form-control" name="suku_bunga_pengajuan" id="suku_bunga_pengajuan" oninput="hanyaAngka(event)" placeholder="Ex. 0.50" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Suku Bunga Rate Counter</label><span class="ml-1" style="color:red;">*</span>
                                                        <input type="text" class="form-control" name="suku_bunga_counter" id="suku_bunga_counter" oninput="hanyaAngka(event)" required>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xxl-6 ">
                                        <div class="card flex-fill">
                                            <div class="card-body">
                                                <!-- data affiliasi keluarga -->
                                                <div class="form-group">
                                                    <label class="col-form-label">Nama Keluarga</label>
                                                    <input type="text" class="form-control" name="nama_keluarga" oninput="hanyaHuruf(event); this.value = this.value.toUpperCase()">
                                                </div>

                                                <div class="form-group">
                                                    <label for="alamat-text" class="col-form-label">Nilai Akumulasi Simpanan</label>
                                                    <input type="text" class="form-control" name="nilai_akumulasi_simpanan" oninput="hanyaAngka(event); tandaPemisahTitik(this)">
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label">CIF Keluarga</label>
                                                    <input type="text" class="form-control" name="cif_keluarga" oninput="hanyaAngka(event)">
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-form-label">Nomor Telepon Keluarga</label>
                                                    <input type="text" class="form-control" name="nomor_telepon_keluarga" oninput="hanyaAngka(event)">
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat-text" class="col-form-label">Keterangan Funding</label>
                                                    <textarea class="form-control" name="keterangan_funding" placeholder="ex. Referensi Keluarga" oninput="this.value = this.value.toUpperCase()"></textarea>
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
                                                            <input type="file" class="custom-file-input" id="customFile" name="bukti_ttd" accept=".jpg, .jpeg, .png .pdf" onchange="validateInput()">
                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <input type="hidden" name='tombol' value='btn_simpan_kredit_lama'> -->
                                                <button id="btn_form_funding_suku_bunga" type="submit" name='btn_simpan_kredit_lama' value='btn_simpan_kredit_lama' class="btn btn-primary btn-lg">Simpan</button>
                                                <a onclick="btn_batal_input_suku_bunga(event); return false" href="<?= BASEURL; ?>/cs_funding/suku_bunga" class="btn btn-secondary btn-lg">Batal</a>

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
                    </script>
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

    <script>
        function showIdentitasLainnya(select) {
            var identitas_lain = document.getElementById("identitas_lain");
            var nomor_identitas_lain = document.getElementById("nomor_identitas_lain");
            var nomor_ktp = document.getElementById("nomor_ktp");
            if (select.value === 'LAINNYA') {
                document.getElementById('hidden_identitas_lain').style.display = "block";
                document.getElementById('hidden_nomor_ktp').style.display = "none";
                identitas_lain.setAttribute('required', 'true');
                nomor_identitas_lain.setAttribute('required', 'true');
                // nomor_ktp.setAttribute('required', 'false');

            } else {
                document.getElementById('hidden_identitas_lain').style.display = "none";
                document.getElementById('hidden_nomor_ktp').style.display = "block";
                nomor_ktp.setAttribute('required', 'true');
                // identitas_lain.setAttribute('required', 'false');
                // nomor_identitas_lain.setAttribute('required', 'false');

            }
        }
    </script>
    <script>
        // Custom file input label
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);

        });
    </script>
    <script>
        // Mendapatkan elemen input file yang tersembunyi
        var fileInput = document.getElementById('fileInput');

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
        function validateInput() {
            var fileInput = document.getElementById('customFile');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;

            if (!allowedExtensions.exec(filePath)) {
                alert('Hanya file dengan ekstensi .jpg, .jpeg, .png atau .pdf yang diizinkan!');
                fileInput.value = ''; // Clear the input field
            }
        }
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
            var fileInput = document.getElementById('customFile');
            fileInput.value = ""; // Set nilai input file menjadi kosong

            // Mengambil label yang sesuai dengan input file dan mengubahnya kembali menjadi default
            var label = fileInput.nextElementSibling; // Dapatkan label yang sesuai dengan input file
            label.classList.remove("selected"); // Hapus kelas 'selected'
            label.innerHTML = "Choose file"; // Atur teks label kembali ke default
            // Mengubah status customFileInput.required kembali menjadi false
            document.getElementById('customFile').required = false;
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

    <!-- javascript -->
    <script type="text/javascript">
        function showDiv(select) {
            if (select.value == 'SI DEKA') {
                document.getElementById('hidden_div').style.display = "block";
                document.getElementById('hidden_div').required = "true";
            } else {
                document.getElementById('hidden_div').style.display = "none";
                document.getElementById('hidden_div').required = "false";
            }
        }

        function showDiv1(select) {
            if (select.value == 'SI DEKA') {
                document.getElementById('hidden_div1').style.display = "block";
                document.getElementById('hidden_div').required = "true";
            } else {
                document.getElementById('hidden_div1').style.display = "none";
                document.getElementById('hidden_div').required = "false";
            }
        }

        function showDiv2(select) {
            var hiddenDiv = document.getElementById('jangka_waktu'); // Mengubah id yang diambil sesuai dengan id pada elemen HTML

            if (select.value === 'SI DEKA') {
                document.getElementById('hidden_div3').style.display = "block";
                hiddenDiv.required = true; // Mengubah ke boolean true agar jangka waktu menjadi required
            } else {
                document.getElementById('hidden_div3').style.display = "none";
                hiddenDiv.required = false; // Mengubah ke boolean false agar jangka waktu tidak wajib diisi
            }
        }

        function showPembayaran(select) {
            if (select.value == 'transfer') {
                document.getElementById('hidden_div2').style.display = "block";
            } else {
                document.getElementById('hidden_div2').style.display = "none";
            }
        }
    </script>

    <script>
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

        function hanyaAngka1(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;

            // CharCode 46 adalah kode untuk simbol titik (.)
            if ((charCode < 48 || charCode > 57) && charCode !== 46) {
                alert("Inputan Hanya Angka atau Simbol Titik");
                return false;
            }

            return true;
        }

        function hanyaAngkaHuruf(event) {
            var input = event.target.value;
            var formattedInput = input.replace(/[^\w]/g, ''); // Hanya membiarkan angka dan huruf

            if (input !== formattedInput) {
                event.target.value = formattedInput; // Mengganti nilai input dengan yang divalidasi
                alert("Inputan hanya boleh angka dan huruf");
            }
        }
    </script>
    <!-- untuk menampilkan titik otomatis saat input nilai rupiah -->
    <script type="text/javascript">
        function numbersonly(ini, e) {
            if (e.key >= "0" && e.key <= "9") {
                a = ini.value.replace(".", "") + e.key;
                b = a.replace(/[^\d]/g, "");
                if (parseFloat(b) != 0) {
                    ini.value = tandaPemisahTitik(b);
                    return false;
                } else {
                    return false;
                }
            } else if (e.keyCode == 8 || e.keyCode == 46) {
                a = ini.value.replace(".", "");
                b = a.replace(/[^\d]/g, "");
                b = b.substr(0, b.length - 1);
                if (tandaPemisahTitik(b) != "") {
                    ini.value = tandaPemisahTitik(b);
                } else {
                    ini.value = "";
                }
                return false;
            } else if (e.keyCode == 9 || e.keyCode == 17) {
                return true;
            } else {
                alert("Inputan Hanya Angka!");
                return false;
            }
        }
    </script>

    <script>
        $("#form_funding_suku_bunga").on('submit', function(e, params) {
            var localParams = params || {};

            if (!localParams.send) {
                e.preventDefault();
            }
            // Validasi tanda tangan kosong
            // var canvas = document.getElementById('signature-pad');
            // var context = canvas.getContext('2d');
            // var isCanvasEmpty = context.getImageData(0, 0, canvas.width, canvas.height).data.every(p => p === 0);
            // var isLastClear = canvas.getAttribute('data-cleared') === 'true';


            // if (isCanvasEmpty || isLastClear) {
            //     e.preventDefault(); // Mencegah submit jika tanda tangan kosong, dihapus, atau hanya coretan titik
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
                        $("#form_funding_suku_bunga").off("submit").submit();
                    })

                }

            })
        })

        signaturePad.onBegin = function() {
            canvas.setAttribute('data-cleared', 'false');
        };
    </script>

    <script>
        function btn_batal_input_suku_bunga(ev) {
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

    <script>
        var canvas = document.getElementById('signature-pad');
        var ctx = canvas.getContext('2d');

        // Kode untuk menggambar di canvas akan ada di sini
        document.getElementById('form_funding_suku_bunga').addEventListener('submit', function(e) {
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