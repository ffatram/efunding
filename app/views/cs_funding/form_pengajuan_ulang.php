<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan Ulang</title>

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
                            <h1 class="m-0">Form Pengajuan Ulang Permohonan Pencairan Sebelum Jatuh Tempo</h1>
                        </div>

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <!-- container fluid -->
                <div class="container-fluid">




                    <form id="form_funding_edit_data_pencairan" id="form_update" action="<?= BASEURL; ?>/cs_funding/update_pengajuan_ulang_pencairan" method="POST">
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
                                                    <!-- pengambilan data awal -->
                                                    <input type="hidden" class="form-control" name="tgl_permohonan_awal" value="<?= $data['data_id']['tgl_permohonan'] ?>" />
                                                    <input type="hidden" class="form-control" name="tgl_pengajuan_awal" value="<?= $data['data_id']['tgl_pengajuan_ulang'] ?>" />
                                                    <input type="hidden" class="form-control" name="tgl_approval_awal" value="<?= $data['data_id']['tgl_approval'] ?>" />
                                                    <input type="hidden" class="form-control" name="id_permohonan" value="<?= $data['data_id']['id_permohonan'] ?>" />

                                                    <label class="mt-2 mb-2">Nama Funding</label>
                                                    <input type="text" class="form-control" name="nama_funding" value="<?= $data['data_id']['username']  ?>" disabled />
                                                    <label class="col-form-label">Alasan Pengajuan Permohonan</label>
                                                    <input type="text" class="form-control" name="alasan_pengajuan" value="<?= $data['data_id']['alasan_pengajuan'] ?>" disabled />

                                                </div>
                                                <div class="form-group" style="display:none" id="hidden_div_lainnya">
                                                    <label class="col-form-label">Alasan Lainnya</label>
                                                    <input type="text" class="form-control" name="alasan_lain" value="<?= $data['data_id']['alasan_pengajuan'] ?>" disabled />
                                                </div>
                                                <label class="col-form-label">Jenis Produk</label>
                                                <input type="text" class="form-control" name="jenis_produk" value="<?= $data['data_id']['jenis_produk'] ?>" disabled />
                                                <label class="mt-2 mb-2">Nomor KTP</label><span class="ml-1" style="color:red;"></span>
                                                <input type="text" class="form-control" name="nomor_ktp" value="<?= $data['data_id']['nomor_ktp']  ?>" disabled oninput="this.value = this.value.toUpperCase()" onkeypress="return hanyaAngka(event)" />
                                                <label class="col-form-label">Nama Nasabah</label>
                                                <input type="text" class="form-control" name="nama_nasabah" disabled oninput="this.value = this.value.toUpperCase()" onkeypress="return hanyaHuruf(event)" value="<?= $data['data_id']['nama_nasabah']  ?>">
                                                <input type="hidden" class="form-control" name="nama_nasabah" value="<?= $data['data_id']['nama_nasabah'] ?>" />

                                                <label for="alamat-text" class="col-form-label">Alamat</label>
                                                <textarea class="form-control" name="alamat" disabled oninput="this.value = this.value.toUpperCase()"><?= $data['data_id']['alamat']  ?></textarea>
                                                <label class="col-form-label">Nomor Telepon</label>
                                                <input type="text" class="form-control" name="nomor_telepon" onkeypress="return hanyaAngka(event)" value="<?= $data['data_id']['nomor_telepon']  ?>" disabled>
                                                <label class="col-form-label">Nominal</label>
                                                <input type="text" class="form-control" name="nominal" value="<?= "Rp " . number_format($data['data_id']['nominal'], 0, ',', '.')  ?>" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" disabled>

                                                <div class="form-group" style="display:none" id="hidden_deposito">
                                                    <label class="col-form-label">Jangka Waktu</label>
                                                    <input type="text" class="form-control" name="jangka_waktu" value="<?= $data['data_id']['jangka_waktu']  ?>" disabled>
                                                    <label class="col-form-label">Nomor Rekening Deposito</label>
                                                    <input type="text" class="form-control" name="norek_deposito" onkeypress="return hanyaAngka(event)" value="<?= $data['data_id']['nomor_rekening_deposito']  ?>" disabled>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xxl-6 ">
                                        <div class="card flex-fill">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <div class="form-group" style="display:none" id="hidden_div_tgl">
                                                    <?php if ($data['data_id']['alasan_pengajuan'] === 'SUDAH JATUH TEMPO & DIPERPANJANG') { ?>
                                                            <label class="mt-2 mb-2">Tanggal Perpanjangan</label><span class="ml-1" style="color:red;"></span>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <label class="mt-2 mb-2">Tanggal Pembentukan </label><span class="ml-1" style="color:red;"></span>
                                                        <?php
                                                        }
                                                        ?>
                                                        <input type="date" class="form-control" id="tgl_pembentukan" name="tgl_pembentukan" disabled onchange="myFunction(this.value)" value="<?= $data['data_id']['tgl_pembentukan'] ?>">
                                                    </div>
                                                    <div class="form-group" style="display:none" id="hidden_persentase_finalty">
                                                        <label class="col-form-label">Persentase Penalti (%)</label>
                                                        <input type="text" class="form-control" name="persentase_penalti" value="<?= $data['data_id']['persentase_penalti']  ?>" disabled>
                                                    </div>
                                                    <div class="form-group" style="display:none" id="hidden_div">
                                                        <label class="col-form-label">Nominal Penalti</label>
                                                        <input type="text" class="form-control" name="nominal_penalti" id="nominal_penalti" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" value="<?="Rp " . $data['data_id']['nominal_penalti']  ?>" disabled>
                                                        <?php
                                                        // $tgl1 = new DateTime($tgl_pembentukan);
                                                        // $tgl2 = new DateTime();
                                                        // $selisih = $tgl2->diff($tgl1);
                                                        // $selisih->days;
                                                        ?>
                                                        <label class="col-form-label">Jumlah Hari</label>
                                                        <input type="text" class="form-control" name="jumlah_hari" value="<?= $data['data_id']['jumlah_hari']  ?>" disabled>
                                                        <label class="col-form-label">Nominal Bunga Berjalan</label>
                                                        <input type="text" class="form-control" name="nominal_bunga_berjalan" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" value="<?= "Rp " .$data['data_id']['nominal_bunga_berjalan']  ?>" disabled>
                                                        <label class="col-form-label">Pengajuan Awal</label>
                                                        <input type="text" class="form-control" name="pengajuan_awal" value="<?= $data['data_id']['jenis_permohonan_pencairan_sebelum_jt_pengajuan']  ?>" disabled />
                                                        <label class="col-form-label">Approval Awal</label>
                                                        <input type="text" class="form-control" name="approval_awal" value="<?= $data['data_id']['jenis_permohonan_pencairan_sebelum_jt_approval'] ?>" disabled />

                                                        <!-- pengambilan data awal -->
                                                        <input type="hidden" class="form-control" name="approval_awal" id="approval_awal" value="<?= $data['data_id']['jenis_permohonan_pencairan_sebelum_jt_approval'] ?>">
                                                        <input type="hidden" class="form-control" name="tgl_approval_awal" id="tgl_approval_awal" value="<?= $data['data_id']['tgl_approval']  ?>">
                                                        <input type="hidden" class="form-control" name="pengajuan_awal" id="pengajuan_awal" value="<?= $data['data_id']['jenis_permohonan_pencairan_sebelum_jt_pengajuan']  ?>">


                                                        <label class="col-form-label">Jenis Permohonan Yang Diajukan Kembali</label>
                                                        <!-- <select name="pengajuan_ulang" id="pengajuan_ulang" class="form-control" onchange="showDiv1(this)" required> -->
                                                        <select name="jenis_pencairan" class="form-control" id="jenis_pencairan" required>
                                                            <option value="" disabled selected>- SILAHKAN PILIH -</option>
                                                            <?php if ($data['data_id']['nominal_penalti'] == 0) { ?>
                                                                <option value="TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN">TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN</option>
                                                                <option value="TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN">TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN</option>
                                                            <?php } else { ?>
                                                                <option value="DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN">DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN</option>
                                                                <option value="DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN">DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN</option>
                                                                <option value="TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN">TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN</option>
                                                                <option value="TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN">TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN</option>
                                                            <?php } ?>
                                                        </select>

                                                    </div>
                                                    <div class="form-group" style="display:none" id="hidden_rekening_pencairan">
                                                        <label class="col-form-label">Nomor Rekening Pencairan</label>
                                                        <input type="text" class="form-control" name="norek_pencairan" onkeypress="return hanyaAngka(event)" value="<?= $data['data_id']['nomor_rekening_pencairan']  ?>" disabled>
                                                    </div>
                                                    <div class=" form-group">
                                                        <label for="alamat-text" class="col-form-label">Keterangan Funding</label>
                                                        <input type="hidden" class="form-control" name="keterangan_awal" value=" <?= $data['data_id']['keterangan_funding'] ?>" />
                                                        <textarea class="form-control" name="keterangan_funding" placeholder="alasan untuk lebih meyakinkan approval" oninput="this.value = this.value.toUpperCase()"></textarea>

                                                        <!-- pengambilan data awal -->
                                                        <textarea class="form-control" name="keterangan_awal" hidden> <?= $data['data_id']['keterangan_funding']  ?></textarea>
                                                        <textarea class="form-control" name="keterangan_approval_awal" hidden> <?= $data['data_id']['keterangan_approval'] ?></textarea>
                                                        <textarea class="form-control" name="history_permohonan" hidden> <?= $data['data_id']['history_permohonan'] ?> </textarea>

                                                    </div>


                                                    <!-- <div class="form-group" style="display:none" id="hidden_upload_bilyet">
                                                        <label for="alamat-text" class="col-form-label">Gambar Bilyet</label>
                                                        <input type="text" class="form-control" name="bilyet" value="<?= $data['data_id']['nama_gambar']  ?>" disabled>
                                                    </div> -->
                                                </div>
                                                <button id="btn_form_funding_edit_data_pencairan" type="submit" class="btn btn-primary btn-lg">Ajukan Ulang</button>
                                                <!-- <button type='submit' class="btn btn-secondary btn-lg btn_tolak" data-id_permohonan="<?= $data['data_id']['id_permohonan'] ?>" data-nama_nasabah="<?= $data['data_id']['nama_nasabah'] ?>" data-jenis_permohonan="<?= $data['data_id']['jenis_permohonan'] ?>">Ditolak</button> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </main>

                    </form>

                    <?php
                    if ($data['data_id']['jenis_produk'] == 'SI DEKA' || $data['data_id']['jenis_produk'] == 'SI DEKO' || $data['data_id']['jenis_produk'] == 'PRIMA' || $data['data_id']['jenis_produk'] == 'GOLDEN AGE') {
                    ?>
                        <script>
                            document.getElementById('hidden_div_tgl').style.display = "block";
                            document.getElementById('hidden_deposito').style.display = "block";
                            document.getElementById('hidden_upload_bilyet').style.display = "block";
                            document.getElementById('hidden_persentase_finalty').style.display = "none";
                        </script>
                    <?php
                    } else {
                    ?>
                        <script>
                            document.getElementById('hidden_deposito').style.display = "none";
                            document.getElementById('hidden_upload_bilyet').style.display = "none";
                            document.getElementById('hidden_persentase_finalty').style.display = "none";
                            document.getElementById('hidden_div_tgl').style.display = "none";
                        </script>
                    <?php
                    }
                    ?>

                    <?php
                    if ($data['data_id']['jenis_permohonan_pencairan_sebelum_jt_pengajuan']  == 'Dikenakan Finalty, Bunga Berjalan Dibayarkan') {
                    ?>
                        <script>
                            document.getElementById('hidden_persentase_finalty').style.display = "block";
                            document.getElementById('hidden_div').style.display = "block";
                            document.getElementById('hidden_rekening_pencairan').style.display = "block";
                        </script>
                    <?php
                    } else if ($data['data_id']['jenis_permohonan_pencairan_sebelum_jt_pengajuan']  == 'Tidak Dikenakan Finalty, Bunga Berjalan Dibayarkan') {
                    ?>
                        <script>
                            document.getElementById('hidden_persentase_finalty').style.display = "none";
                            document.getElementById('hidden_div').style.display = "block";
                            document.getElementById('hidden_rekening_pencairan').style.display = "block";
                        </script>
                    <?php
                    } else if ($data['data_id']['jenis_permohonan_pencairan_sebelum_jt_pengajuan']  == 'Dikenakan Finalty, Bunga Berjalan Tidak Dibayarkan') {
                    ?>
                        <script>
                            document.getElementById('hidden_persentase_finalty').style.display = "block";
                            document.getElementById('hidden_div').style.display = "block";
                            document.getElementById('hidden_rekening_pencairan').style.display = "none";
                        </script>
                    <?php
                    } else {
                    ?>
                        <script>
                            document.getElementById('hidden_persentase_finalty').style.display = "none";
                            document.getElementById('hidden_div').style.display = "block";
                            document.getElementById('hidden_rekening_pencairan').style.display = "none";
                        </script>
                    <?php
                    }
                    ?>

                    <?php
                    if ($data['data_id']['alasan_pengajuan']  != 'Sudah Lebih Dari 1 Bulan' || $data['data_id']['alasan_pengajuan']  != 'Nasabah Reguler' || $data['data_id']['alasan_pengajuan']  != 'Nasabah Loyal') {
                    ?>
                        <script>
                            document.getElementById('hidden_div_lainnya').style.display = "none";
                        </script>
                    <?php
                    } else {
                    ?>
                        <script>
                            document.getElementById('hidden_div_lainnya').style.display = "block";
                        </script>
                    <?php
                    }
                    ?>


                    <script>
                        function showDiv1(select) {
                            if (select.value == 'Dikenakan Finalty, Bunga Berjalan Dibayarkan') {
                                document.getElementById('hidden_persentase_finalty').style.display = "block";
                                document.getElementById('hidden_div').style.display = "block";
                                document.getElementById('hidden_rekening_pencairan').style.display = "block";
                            } else if (select.value == 'Tidak Dikenakan Finalty, Bunga Berjalan Dibayarkan') {
                                document.getElementById('hidden_persentase_finalty').style.display = "none";
                                document.getElementById('hidden_div').style.display = "block";
                                document.getElementById('hidden_rekening_pencairan').style.display = "block";
                            } else if (select.value == 'Dikenakan Finalty, Bunga Berjalan Tidak Dibayarkan') {
                                document.getElementById('hidden_persentase_finalty').style.display = "block";
                                document.getElementById('hidden_div').style.display = "block";
                                document.getElementById('hidden_rekening_pencairan').style.display = "none";
                            } else {
                                document.getElementById('hidden_persentase_finalty').style.display = "none";
                                document.getElementById('hidden_div').style.display = "block";
                                document.getElementById('hidden_rekening_pencairan').style.display = "none";
                            }
                        }

                        function showDivLainnya(select) {
                            if (select.value == 'Lainnya') {
                                document.getElementById('hidden_div_lainnya').style.display = "block";
                            } else {
                                document.getElementById('hidden_div_lainnya').style.display = "none";
                            }
                        }
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


    <!-- daftar nasabah lama -->
    <script>

        $("#form_funding_edit_data_pencairan").on('submit', function(e, params) {
            var localParams = params || {};

            if (!localParams.send) {
                e.preventDefault();
            }
            
            var nilaiPenalti = parseFloat($("#nominal_penalti").val().replace(/\./g, '').replace(',', '.')) || 0;
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


        var btn_tolak = $('.btn_tolak')
        btn_tolak.on('click', function(event) {
            var id_permohonan = $(this).data('id_permohonan')
            var nama_nasabah = $(this).data('nama_nasabah')
            var jenis_permohonan = $(this).data('jenis_permohonan')
            $.ajax({
                type: 'POST',
                url: '<?= BASEURL . '/cs_funding/cek_btn_tolak' ?>',
                data: 'id_permohonan=' + id_permohonan,
                success: function(res) {
                    var a = res.trim()

                    console.log(res.trim())
                    if (res.trim() == '0') {
                        // jika nilai 0 maka ada data di tbl slik dan tidak di izinkan untuk hapus
                        Swal.fire({
                            icon: 'warning',
                            title: 'Data pemohon ini tidak bisa dihapus karena sudah terelasi dengan tabel lain ',
                            showConfirmButton: false,
                            timer: 5000
                        })

                    } else if (res.trim() == '1') {



                        Swal.fire({
                            icon: 'info',
                            title: '<strong>Apakah Permohonan Ini Ditolak ? </strong>',
                            html: 'Id Permohonan : <b> ' + id_permohonan + '</b>' +
                                '<br>' +
                                'Nama Nasabah : <b> ' + nama_nasabah + '</b>' +
                                '<br>' +
                                'Jenis Permohonan : <b> ' + jenis_permohonan + '</b>' +
                                '<br>',
                            showCancelButton: true,
                            confirmButtonText: "Ya",
                            cancelButtonText: "Batal",
                            confirmButtonColor: "#3EC59D",
                            cancelButtonColor: "#BB2D3B",

                            showLoaderOnConfirm: true,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    type: 'post',
                                    url: '<?= BASEURL . '/cs_funding/tolak' ?>',
                                    data: {
                                        'id_permohonan': id_permohonan,
                                        'nama_nasabah': nama_nasabah
                                    },
                                    success: function(res) {
                                        var a = res.trim()
                                        if (res.trim() == 'sukses') {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Data Permohonan Ditolak',
                                                showConfirmButton: false,
                                                timer: 1500
                                            }).then((result) => {
                                                window.location.href = "<?= BASEURL; ?>/cs_funding/pencairan_sebelum_jatuh_tempo";
                                            })

                                        } else if (res.trim() == 'gagal') {
                                            Swal.fire({
                                                icon: 'info',
                                                title: 'Gagal',
                                                showConfirmButton: false,
                                                timer: 1500
                                            })
                                        }
                                        console.log(res.trim())

                                    }
                                })

                            } else {}
                        })
                    } else {
                        alert('erorr kode 001')
                    }
                }
            })
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



    <script>
        // onkeypress="return hanyaAngka(event)" 
        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;
            return true;
        }
    </script>

</body>

</html>