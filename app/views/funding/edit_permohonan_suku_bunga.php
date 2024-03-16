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




                    <form id="form_funding_edit_data_suku_bunga" id="form_update" action="<?= BASEURL; ?>/funding/update_data_suku_bunga" method="POST">
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
                                                    <!-- <label class="mt-2 mb-2">Nama Funding</label><span class="ml-1" style="color:red;"></span>
                                                    <input type="text" class="form-control" name="nama_funding" value="<?= $data['data_suku_bunga']['username']  ?>" required oninput="this.value = this.value.toUpperCase()" /> -->
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
                                                    <input type="text" class="form-control" name="nama_nasabah" required oninput="hanyaHuruf(event); this.value = this.value.toUpperCase()" value="<?= $data['data_suku_bunga']['nama_nasabah']  ?>">
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
                                                    <input type="text" class="form-control" name="nominal" value="<?= number_format($data['data_suku_bunga']['nominal'], 0, ',', '.')  ?>" oninput="hanyaAngka(event); tandaPemisahTitik(this)">
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
                                                    <input type="text" class="form-control" name="suku_bunga_pengajuan" value="<?= $data['data_suku_bunga']['nilai_suku_bunga_pengajuan']  ?>" id="suku_bunga_pengajuan" oninput="hanyaAngka(event)">
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
                                                    <textarea class="form-control" name="keterangan_funding" oninput="this.value = this.value.toUpperCase()"> <?= $data['data_suku_bunga']['keterangan_funding']  ?></textarea>
                                                </div>
                                                <button id="btn_form_funding_edit_data_suku_bunga" type="submit" class="btn btn-primary btn-lg">Update</button>
                                                <a onclick="btn_batal_update_kredit(event); return false" href="<?= BASEURL; ?>/funding/suku_bunga" class="btn btn-secondary btn-lg">Batal</a>
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

                        function numbersonly(ini, e) {
                            if (e.keyCode >= 49) {
                                if (e.keyCode <= 57) {
                                    a = ini.value.toString().replace(".", "");
                                    b = a.replace(/[^\d]/g, "");
                                    b = (b == "0") ? String.fromCharCode(e.keyCode) : b + String.fromCharCode(e.keyCode);
                                    ini.value = tandaPemisahTitik(b);
                                    return false;
                                } else if (e.keyCode <= 105) {
                                    if (e.keyCode >= 96) {
                                        //e.keycode = e.keycode - 47;
                                        a = ini.value.toString().replace(".", "");
                                        b = a.replace(/[^\d]/g, "");
                                        b = (b == "0") ? String.fromCharCode(e.keyCode - 48) : b + String.fromCharCode(e.keyCode - 48);
                                        ini.value = tandaPemisahTitik(b);
                                        return false;
                                    } else {
                                        alert("Hanya inputan angka");
                                        return false;
                                    }
                                } else {
                                    return false;
                                }
                            } else if (e.keyCode == 48) {
                                a = ini.value.replace(".", "") + String.fromCharCode(e.keyCode);
                                b = a.replace(/[^\d]/g, "");
                                if (parseFloat(b) != 0) {
                                    ini.value = tandaPemisahTitik(b);
                                    return false;
                                } else {
                                    alert("Hanya inputan angka");
                                    return false;
                                }
                            } else if (e.keyCode == 95) {
                                a = ini.value.replace(".", "") + String.fromCharCode(e.keyCode - 48);
                                b = a.replace(/[^\d]/g, "");
                                if (parseFloat(b) != 0) {
                                    ini.value = tandaPemisahTitik(b);
                                    return false;
                                } else {
                                    alert("Hanya inputan angka");
                                    return false;
                                }
                            } else if (e.keyCode == 8 || e.keycode == 46) {
                                a = ini.value.replace(".", "");
                                b = a.replace(/[^\d]/g, "");
                                b = b.substr(0, b.length - 1);
                                if (tandaPemisahTitik(b) != "") {
                                    ini.value = tandaPemisahTitik(b);
                                } else {
                                    ini.value = "";
                                }

                                return false;
                            } else if (e.keyCode == 9) {
                                return true;
                            } else if (e.keyCode == 17) {
                                return true;
                            } else {
                                alert("Hanya inputan angka");
                                return false;
                            }

                        }


                        function showDiv2(select) {
                            if (select.value == 'SI DEKA') {
                                document.getElementById('hidden_div').style.display = "block";
                            } else {
                                document.getElementById('hidden_div').style.display = "none";
                            }
                        }
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

        function hanyaAngkaHuruf(evt) {
            var input = evt.target.value;
            var formattedInput = input.replace(/[^A-Za-z0-9\s]/g, ''); // Hanya membiarkan huruf, angka, dan spasi

            if (input !== formattedInput) {
                evt.target.value = formattedInput; // Mengganti nilai input dengan yang divalidasi
                alert("Inputan hanya boleh huruf dan angka");
            }
        }
        // function hanyaAngka(evt) {
        //     var charCode = (evt.which) ? evt.which : event.keyCode
        //     if ((charCode < 48 || charCode > 57) && charCode > 32 || charCode == 190) {
        //         alert("Inputan Hanya Angka");
        //         return false;

        //     }

        //     return true;
        // }

        // function hanyaHuruf(evt) {
        //     var charCode = (evt.which) ? evt.which : event.keyCode
        //     if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode > 32) {
        //         alert("Inputan Hanya Huruf");
        //         return false;
        //     }
        //     return true;
        // }
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


    <!-- daftar nasabah lama -->
    <script>
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



    <!-- ubah inputan ke dalam bentuk rupiah -->
    <script>
        var plafond = $('.plafond');
        var nilai_jaminan = $('.nilai_jaminan');

        var penghasilan_pemohon = $('.penghasilan_pemohon');
        var penghasilan_pasangan = $('.penghasilan_pasangan');
        var penghasilan_tambahan = $('.penghasilan_tambahan');
        var penghasilan_tambahan_lainnya = $('.penghasilan_tambahan_lainnya');

        var biaya_hidup_perbulan = $('.biaya_hidup_perbulan');
        var biaya_pendidikan = $('.biaya_pendidikan');
        var biaya_pam_listrik_telepon = $('.biaya_pam_listrik_telepon');
        var biaya_transport = $('.biaya_transport');
        var angsuran_bank_lain = $('.angsuran_bank_lain');
        var angsuran_perumahan = $('.angsuran_perumahan');
        var angsuran_kendaraan = $('.angsuran_kendaraan');
        var angsuran_barang_elektronik = $('.angsuran_barang_elektronik');
        var angsuran_koperasi = $('.angsuran_koperasi');
        var biaya_lainnya = $('.biaya_lainnya');


        $(document).ready(function() {
            plafond.val(ubah_input(plafond.val().toString()))
            nilai_jaminan.val(ubah_input(nilai_jaminan.val().toString()))
            penghasilan_pemohon.val(ubah_input(penghasilan_pemohon.val().toString()))
            penghasilan_pasangan.val(ubah_input(penghasilan_pasangan.val().toString()))
            penghasilan_tambahan.val(ubah_input(penghasilan_tambahan.val().toString()))
            penghasilan_tambahan_lainnya.val(ubah_input(penghasilan_tambahan_lainnya.val().toString()))
            biaya_hidup_perbulan.val(ubah_input(biaya_hidup_perbulan.val().toString()))
            biaya_pendidikan.val(ubah_input(biaya_pendidikan.val().toString()))
            biaya_pam_listrik_telepon.val(ubah_input(biaya_pam_listrik_telepon.val().toString()))
            biaya_transport.val(ubah_input(biaya_transport.val().toString()))
            angsuran_bank_lain.val(ubah_input(angsuran_bank_lain.val().toString()))
            angsuran_perumahan.val(ubah_input(angsuran_perumahan.val().toString()))
            angsuran_kendaraan.val(ubah_input(angsuran_kendaraan.val().toString()))
            angsuran_barang_elektronik.val(ubah_input(angsuran_barang_elektronik.val().toString()))
            angsuran_koperasi.val(ubah_input(angsuran_koperasi.val().toString()))
            biaya_lainnya.val(ubah_input(biaya_lainnya.val().toString()))
        })





        plafond.keyup(function() {
            plafond.val(ubah_input(plafond.val().toString()))
        })

        nilai_jaminan.keyup(function() {
            nilai_jaminan.val(ubah_input(nilai_jaminan.val().toString()))
        })

        penghasilan_pemohon.keyup(function() {
            penghasilan_pemohon.val(ubah_input(penghasilan_pemohon.val().toString()))
        })
        penghasilan_pasangan.keyup(function() {
            penghasilan_pasangan.val(ubah_input(penghasilan_pasangan.val().toString()))
        })
        penghasilan_tambahan.keyup(function() {
            penghasilan_tambahan.val(ubah_input(penghasilan_tambahan.val().toString()))
        })
        penghasilan_tambahan_lainnya.keyup(function() {
            penghasilan_tambahan_lainnya.val(ubah_input(penghasilan_tambahan_lainnya.val().toString()))
        })
        biaya_hidup_perbulan.keyup(function() {
            biaya_hidup_perbulan.val(ubah_input(biaya_hidup_perbulan.val().toString()))
        })
        biaya_pendidikan.keyup(function() {
            biaya_pendidikan.val(ubah_input(biaya_pendidikan.val().toString()))
        })
        biaya_pam_listrik_telepon.keyup(function() {
            biaya_pam_listrik_telepon.val(ubah_input(biaya_pam_listrik_telepon.val().toString()))
        })
        biaya_transport.keyup(function() {
            biaya_transport.val(ubah_input(biaya_transport.val().toString()))
        })
        angsuran_bank_lain.keyup(function() {
            angsuran_bank_lain.val(ubah_input(angsuran_bank_lain.val().toString()))
        })
        angsuran_perumahan.keyup(function() {
            angsuran_perumahan.val(ubah_input(angsuran_perumahan.val().toString()))
        })
        angsuran_kendaraan.keyup(function() {
            angsuran_kendaraan.val(ubah_input(angsuran_kendaraan.val().toString()))
        })
        angsuran_barang_elektronik.keyup(function() {
            angsuran_barang_elektronik.val(ubah_input(angsuran_barang_elektronik.val().toString()))
        })
        angsuran_koperasi.keyup(function() {
            angsuran_koperasi.val(ubah_input(angsuran_koperasi.val().toString()))
        })
        biaya_lainnya.keyup(function() {
            biaya_lainnya.val(ubah_input(biaya_lainnya.val().toString()))
        })
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







    <!-- sttus perkawinan jika belum menikah maka disable inputan data pasangan -->
    <script>
        var status_perkawinan = $('.status_perkawinan')
        var a1 = $('.a1');
        var a2 = $('.a2');
        var a3 = $('.a3');
        var a4 = $('.a4');
        var a5 = $('.a5');
        var a6 = $('.a6');
        var a7 = $('.a7');
        var a8 = $('.a8');
        var a9 = $('.a9');
        var a10 = $('.a10');
        var a11 = $('.a11');
        var a12 = $('.a12');
        var a13 = $('.a13');
        var a14 = $('.a14');










        $(document).change(function() {

            if (status_perkawinan.val() != "MENIKAH") {
                a1.prop('disabled', true)
                a2.prop('disabled', true)
                a3.prop('disabled', true)
                a4.prop('disabled', true)
                a5.prop('disabled', true)
                a6.prop('disabled', true)
                a7.prop('disabled', true)
                a8.prop('disabled', true)
                a9.prop('disabled', true)
                a10.prop('disabled', true)
                a11.prop('disabled', true)
                a12.prop('disabled', true)
                a13.prop('disabled', true)
                a14.prop('disabled', true)
            } else {
                a1.prop('disabled', false)
                a2.prop('disabled', false)
                a3.prop('disabled', false)
                a4.prop('disabled', false)
                a5.prop('disabled', false)
                a6.prop('disabled', false)
                a7.prop('disabled', false)
                a8.prop('disabled', false)
                a9.prop('disabled', false)
                a10.prop('disabled', false)
                a11.prop('disabled', false)
                a12.prop('disabled', false)
                a13.prop('disabled', false)
                a14.prop('disabled', false)
            }
        })
    </script>

</body>

</html>