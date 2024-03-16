<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Approval</title>

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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">

    </head>

    <body class="hold-transition sidebar-mini layout-fixed">

        <div class="wrapper">
            <!-- Navbar -->
            <?php $this->view('approval/navbar') ?>
            <!-- Navbar -->
            <!-- Side Bar -->
            <?php $this->view('approval/side_bar') ?>
            <!-- Side Bar -->
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Form Approval Ulang Permohonan Pencairan Sebelum Jatuh Tempo</h1>
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
                        <form id="form_approval_edit_data_approval">
                            <!-- <form id="form_approval_edit_data_approval" action="<?= BASEURL; ?>/approval/update_data_pencairan" method="POST"> -->
                            <main class="content">
                                <div class="container-fluid p-0">
                                    <div class="row ">
                                        <div class="col-12 col-lg-6 col-xxl-6 ">
                                            <div class="card flex-fill">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <div class="validate-error"></div>
                                                        <input type="hidden" class="form-control" name="id_permohonan" id="id_permohonan" value="<?= $data['data_permohonan']['id_permohonan'] ?>" />
                                                        <input type="hidden" class="form-control" value="<?= $_COOKIE['username'] ?>" name="username_approval" required>
                                                        <label class="mt-2 mb-2">Kantor Cabang</label><span class="ml-1" style="color:red;"></span>
                                                        <input type="text" class="form-control" name="kantor_cabang" value="<?= $data['data_permohonan']['kantor_cabang'] ?>" disabled />
                                                        <label class="mt-2 mb-2">Nama Inputer</label><span class="ml-1" style="color:red;"></span>
                                                        <input type="text" class="form-control" name="nama_funding" value="<?= $data['data_permohonan']['username'] ?>" disabled />
                                                        <label class="mt-2 mb-2">Alasan Pengajuan Permohonan</label><span class="ml-1" style="color:red;"></span>
                                                        <input type="text" class="form-control" name="nama_funding" value="<?= $data['data_permohonan']['alasan_pengajuan'] ?>" disabled />
                                                        <label class="mt-2 mb-2">Jenis Produk</label><span class="ml-1" style="color:red;"></span>
                                                        <input type="text" class="form-control" name="jenis_produk" value="<?= $data['data_permohonan']['jenis_produk'] ?>" disabled />

                                                        <label class="mt-2 mb-2">Nomor Identitas</label><span class="ml-1" style="color:red;"></span>
                                                        <input type="text" class="form-control" name="nomor_ktp" value="<?= $data['data_permohonan']['nomor_identitas'] ?>" disabled />
                                                        <label class="mt-2 mb-2">Nama Nasabah</label><span class="ml-1" style="color:red;"></span>
                                                        <input type="text" class="form-control" id="nama_nasabah" name="nama_nasabah" value="<?= $data['data_permohonan']['nama_nasabah'] ?>" disabled />
                                                        <label class="mt-2 mb-2">Alamat</label><span class="ml-1" style="color:red;"></span>
                                                        <textarea class="form-control" name="alamat" oninput="this.value = this.value.toUpperCase()" disabled><?= $data['data_permohonan']['alamat'] ?></textarea>
                                                        <label class="mt-2 mb-2">Nominal</label><span class="ml-1" style="color:red;"></span>
                                                        <input type="text" class="form-control" name="nominal" value="<?="Rp ". number_format($data['data_permohonan']['nominal'], 0, ',', '.')  ?>" disabled />
                                                        <label class="mt-2 mb-2">Suku Bunga Deposito</label><span class="ml-1" style="color:red;"></span>
                                                        <input type="text" class="form-control" name="permohonan" value="<?= $data['data_permohonan']['suku_bunga_deposito'] . ' %' ?>" disabled />
                                                        <div class="form-group" id="history" <?php echo empty($data['data_permohonan']['history_permohonan']) ? 'style="display:none;"' : 'style="display:block;"'; ?>>
                                                            <label class="mt-2 mb-2">History Permohonan</label><span class="ml-1" style="color:red;"></span>
                                                            <textarea class="form-control" name="history_permohonan" style="height: 100px;" disabled><?= $data['data_permohonan']['history_permohonan'] ?></textarea>
                                                        </div>
                                                       

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 col-xxl-6 ">
                                            <div class="card flex-fill">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                    <?php if ($data['data_permohonan']['alasan_pengajuan'] === 'SUDAH JATUH TEMPO & DIPERPANJANG') { ?>
                                                            <label class="mt-2 mb-2">Tanggal Perpanjangan Deposito</label><span class="ml-1" style="color:red;"></span>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <label class="mt-2 mb-2">Tanggal Pembentukan Deposito</label><span class="ml-1" style="color:red;"></span>
                                                        <?php
                                                        }

                                                        ?>
                                                        <input type="text" class="form-control" name="tgl_pembentukan" value="<?= date('d-m-Y', strtotime($data['data_permohonan']['tgl_pembentukan']))  ?>" disabled />


                                                        <label class="mt-2 mb-2">Jangka Waktu</label><span class="ml-1" style="color:red;"></span>
                                                        <input type="text" class="form-control" name="jangka_waktu" value="<?= $data['data_permohonan']['jangka_waktu'] ?>" disabled />

                                                        <label class="mt-2 mb-2">Nominal Penalti</label><span class="ml-1" style="color:red;"></span>
                                                        <input type="text" class="form-control" name="nominal_penalti" value="<?= "Rp " . number_format($data['data_permohonan']['nominal_penalti'], 0, ',', '.') ?>" disabled />
                                                       
                                                        <label class="mt-2 mb-2">Jumlah Hari</label><span class="ml-1" style="color:red;"></span>
                                                        <input type="text" class="form-control" name="jumlah_hari" value="<?= $data['data_permohonan']['jumlah_hari'] ?>" disabled />
                                                        <!-- <input type="text" class="form-control" name="jumlah_hari" oninput="this.value = this.value.toUpperCase()" value="<?php echo $selisih->m . ' Bulan, ';
                                                                                                                                                                                echo $selisih->d . ' Hari '; ?>" disabled /> -->

                                                        <label class="mt-2 mb-2">Nominal Bunga Berjalan</label><span class="ml-1" style="color:red;"></span>
                                                        <input type="text" class="form-control" name="nominal_bunga_berjalan" value="<?= "Rp " . number_format($data['data_permohonan']['nominal_bunga_berjalan'], 0, ',', '.')  ?>" disabled />
                                                        <label class="mt-2 mb-2">Jenis Permohonan Pencairan Sebelum Jatuh Tempo</label><span class="ml-1" style="color:red;"></span>
                                                        <input type="text" class="form-control" name="permohonan_diajukan" id="permohonan_diajukan" value="<?= $data['data_permohonan']['jenis_permohonan_pencairan_sebelum_jt_pengajuan'] ?>" disabled />
                                                        <label class="mt-2 mb-2">Keterangan Funding</label><span class="ml-1" style="color:red;"></span>
                                                        <textarea class="form-control" name="keterangan_funding" disabled><?= $data['data_permohonan']['keterangan_funding'] ?></textarea>
                                                        <div style="display:none" id="hidden_bilyet">
                                                            <label class="mt-2 mb-2">Bilyet</label><span class="ml-1" style="color:red;"></span>
                                                            <br>
                                                            <?php
                                                            $file = $data['data_permohonan']['nama_gambar'];
                                                            $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
                                                            if ($fileExtension === 'pdf') {
                                                                // Jika file adalah PDF, tampilkan menggunakan tag iframe
                                                                // echo '<a href="' . BASEURL . '/upload/funding/' . $file . '" download>Buka File Bilyet</a>';
                                                                echo '<a href="' . BASEURL . '/upload/funding/' . $file . '" target="_blank">Lihat File</a>';
                                                            } else {
                                                                echo '<a href="' . BASEURL . '/upload/funding/' . $file . '" target="_blank">Lihat File</a>';
                                                            }
                                                            ?>
                                                            <br>
                                                            <!-- <?= $file ?> -->
                                                         </div>



                                                        <!-- <label class="mt-2 mb-2">Keterangan Approval</label></span>
                                                        <textarea class="form-control" name="keterangan_approval" id="keterangan_approval" oninput="this.value = this.value.toUpperCase()"></textarea> -->
                                                    </div>

                                                    <button class="btn btn-primary btn-lg" type="submit" id="btn_form_approval_edit_data_approval" value="approve" data-id_permohonan="<?= $row['id_permohonan'] ?>">Approve</button>
                                                    <button class="btn btn-lg btn-danger" type='submit' id="btn_reject" value="reject" data-id_permohonan="<?= $row['id_permohonan'] ?>">Reject</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </main>
                        </form>

                         <?php
                            if (!empty($data['data_permohonan']['nama_gambar'])) {
                            ?>
                                <script>
                                    document.getElementById("hidden_bilyet").style.display = "block";
                                </script>
                            <?php
                            } else {
                            ?>
                                <script>
                                document.getElementById("hidden_bilyet").style.display = "none";
                                </script>
                            <?php
                            }
                         ?>
                    </div>
                </section>
            </div>
        </div><!-- /.container-fluid -->
        <!-- /.content-wrapper -->
        <?php $this->view('approval/footer') ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- bagian modal ketika tekan tombol  proses komite -->
        <div class="modal fade modal_1" id="modal_approve" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-m modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="h4"><strong>Approve Permohonan</strong></h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body data_modal">
                        <div class="form-group">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table">
                                            <!-- <table class="table table-bordered table-hover "> -->
                                            <tbody>
                                                <tr>
                                                    <td style=" width: 200px;  background-color: #F4F4F4; ">Id Permohonan</td>
                                                    <td class='modal1_id_permohonan'><?= $data['data_permohonan']['id_permohonan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Alasan Pengajuan</td>
                                                    <td><?= $data['data_permohonan']['alasan_pengajuan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Permohonan Nasabah</td>
                                                    <td id="permohonan_pencairan"><?= $data['data_permohonan']['jenis_permohonan_pencairan_sebelum_jt_pengajuan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Nominal Penalti</td>
                                                    <td><?= "Rp " . number_format($data['data_permohonan']['nominal_penalti'], 0, ',', '.')  ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Nominal Bunga Berjalan</td>
                                                    <td><?= "Rp " . number_format($data['data_permohonan']['nominal_bunga_berjalan'], 0, ',', '.')  ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Keterangan Funding</td>
                                                    <td><?= $data['data_permohonan']['keterangan_funding'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Permohonan Yang Diapprove</td>
                                                    <td id='approval'>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Keterangan Approval</td>
                                                    <td>
                                                        <textarea class="form-control" name="keterangan_approval" id="keterangan_approval" oninput="this.value = this.value.toUpperCase()"></textarea>


                                                    </td>
                                                    <td style="display: none;" id='ket_approval'>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>


                            <div class="form-group">
                                <label for="password">Masukkan PIN</label>
                                <div class="input-group" id="show_hide_password">
                                    <input type="password" name='password_approve' class="form-control password_approve" required autocomplete="current-password">
                                    <div class="input-group-append">
                                        <a href="" class="btn btn-outline-primary"><i class="bi bi-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <button id='btn_modal_approve' type="submit" class="btn btn-lg btn-primary p-3 btn-block">Approve</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- bagian modal ketika tekan tombol  Rejct -->
        <div class="modal fade modal_1" id="modal_reject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-m modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="h4"><strong>Reject Permohonan</strong></h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body data_modal">
                        <div class="form-group">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td style=" width: 200px;  background-color: #F4F4F4; ">Id Permohonan</td>
                                                    <td class='modal2_id_permohonan'><?= $data['data_permohonan']['id_permohonan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Jumlah Hari Berjalan</td>
                                                    <td><?= $data['data_permohonan']['jumlah_hari'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Permohonan Nasabah</td>
                                                    <td><?= $data['data_permohonan']['jenis_permohonan_pencairan_sebelum_jt_pengajuan'] ?></td>
                                                </tr>

                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Nominal Penalti</td>
                                                    <td><?= "Rp " . number_format($data['data_permohonan']['nominal_penalti'], 0, ',', '.')  ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Nominal Bunga Berjalan</td>
                                                    <td><?= "Rp " . number_format($data['data_permohonan']['nominal_bunga_berjalan'], 0, ',', '.')  ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Keterangan Funding</td>
                                                    <td><?= $data['data_permohonan']['keterangan_funding'] ?></td>
                                                </tr>
                                                </tr>
                                                <td style="width: 200px; background-color: #F4F4F4;">Permohonan Yang Diapprove <span style="color: red;">&#9733;</span></td>
                                                </td>
                                                <td>
                                                    <select name="approval_pencairan" id="approval_pencairan" class="form-control" required data-nilai="<?php echo $data['data_permohonan']['jenis_permohonan_pencairan_sebelum_jt_pengajuan']; ?>">
                                                        <option value="" disabled selected>- SILAHKAN PILIH -</option>
                                                        <?php if ($data['data_permohonan']['nominal_penalti'] == 0) { ?>
                                                            <option value="TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN">TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN</option>
                                                            <option value="TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN">TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN</option>
                                                        <?php } else { ?>
                                                            <option value="DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN">DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN</option>
                                                            <option value="DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN">DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN</option>
                                                            <option value="TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN">TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN</option>
                                                            <option value="TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN">TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN</option>
                                                        <?php } ?>
                                                    </select>
                                                </td>


                                                <td id='reject'>

                                                </td>

                                                </tr>

                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Keterangan Approval <span style="color: red;">&#9733;</span></td>
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan_approval" id="keterangan_approval_reject" oninput="this.value = this.value.toUpperCase()" required></textarea>
                                                    </td>
                                                    <td id='ket_reject'>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>


                            <div class="form-group">
                                <label for="password">Masukkan PIN</label>
                                <div class="input-group" id="show_hide_password">
                                    <input type="password" name='password_approve' class="form-control password_reject" required autocomplete="current-password">
                                    <div class="input-group-append">
                                        <a href="" class="btn btn-outline-primary"><i class="bi bi-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <button id='btn_modal_reject' type="submit" class="btn btn-lg btn-danger p-3" style="width: 45%; margin-right: 5px;">Reject</button>
                                        <button id='btn_modal_pending' type="submit" class="btn btn-lg btn-info p-3" style="width: 45%;">Pending</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
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

        <script>
            // Cek jika history_permohonan kosong, maka sembunyikan elemen
            if ('<?= $data['data_permohonan']['history_permohonan'] ?>' === '') {
                document.getElementById('history').style.display = "none";
            }
        </script>

        <!-- hide password modal apporove-->
        <script>
            $(document).ready(function() {
                $("#show_hide_password a").on('click', function(event) {
                    event.preventDefault();
                    if ($('#show_hide_password input').attr("type") == "text") {
                        $('#show_hide_password input').attr('type', 'password');
                        $('#show_hide_password i').addClass("bi bi-eye-slash");
                        $('#show_hide_password i').removeClass("bi bi-eye");
                    } else if ($('#show_hide_password input').attr("type") == "password") {
                        $('#show_hide_password input').attr('type', 'text');
                        $('#show_hide_password i').removeClass("bi bi-eye-slash");
                        $('#show_hide_password i').addClass("bi bi-eye");
                    }
                });
            });
        </script>

        <script>
            const permohonanDiajukan = document.getElementById('permohonan_diajukan');
            const permohonanDiapprove = document.getElementById('approval_pencairan');
            const textarea = document.getElementById('keterangan_approval');
            const valDiajukan = permohonanDiajukan.value;
            const valDiapprove = permohonanDiapprove.value;
            $(document).ready(function() {
                $('#form_approval_edit_data_approval').submit(function(e) {
                    e.preventDefault()
                    var id_permohonan = $(this).data('id_permohonan')
                    var approval_pencairan = document.getElementById('approval_pencairan').value;

                    var submitValue = $(document.activeElement).val()
                    if (submitValue === 'approve') {
                        // if (valDiajukan === approval_pencairan || textarea.value.trim() !== '') {
                        var keterangan = document.getElementById('keterangan_approval').value;
                        document.getElementById('approval').textContent = valDiajukan;
                        document.getElementById('ket_approval').textContent = keterangan;

                        $.ajax({
                            type: 'post',
                            url: '<?= BASEURL . '/approval/modal_detail_approve' ?>',
                            data: {
                                'id_permohonan': id_permohonan
                            },
                            success: function(res) {
                                $('.modal_approve').html(res)
                                $("#modal_approve").modal('show')
                            }
                        })
                        event.preventDefault();
                        header("Location: form_approval_pencairan.php");
                        return false;
                    }else if (submitValue === "reject") {
                        var approval_pencairan = document.getElementById('approval_pencairan').value;

                        // Menentukan nilai yang ingin Anda jadikan sebagai kondisi untuk filter opsi
                        var nilaiSama = "<?= $data['data_permohonan']['jenis_permohonan_pencairan_sebelum_jt_pengajuan'] ?>"; // Ganti dengan nilai variabel Anda

                        // Mendapatkan semua opsi di dalam select
                        var select = document.getElementById('approval_pencairan');
                        var options = select.getElementsByTagName('option');

                        // Mendapatkan nilai dari variabel tersebut dan menyingkirkannya dari opsi
                        for (var i = 0; i < options.length; i++) {
                            if (options[i].value === nilaiSama) {
                                options[i].style.display = 'none'; // Menyembunyikan opsi yang memiliki nilai yang sama
                            }
                        }

                        // Memasukkan nilai yang dipilih ke dalam elemen yang sesuai di modal
                        document.getElementById('reject').textContent = approval_pencairan;
                        var keterangan = document.getElementById('keterangan_approval').value;
                        document.getElementById('ket_reject').textContent = keterangan;

                        // Menampilkan modal dengan menggunakan AJAX
                        $.ajax({
                            type: 'post',
                            url: '<?= BASEURL . '/approval/modal_detail_approve' ?>',
                            data: {
                                'id_permohonan': id_permohonan
                            },
                            success: function(res) {
                                $('.modal_reject').html(res);
                                $("#modal_reject").modal('show');
                            }
                        });

                        // Event preventDefault untuk menghentikan peristiwa bawaan dari event
                        event.preventDefault();
                        return false;
                    }


                })
            })
        </script>

        <script type="text/javascript">
            function cekInput() {
                var pilihApprove = document.getElementById("approval_pencairan").value;
                var ketApprove = document.getElementById("keterangan_approval").value;
                var reject = document.getElementById("btn_reject");

                if ((pilihApprove === "" || ketApprove === "") && reject.clicked) {
                    alert("Input tidak boleh kosong!");
                    return false;
                }
            }

            function markButtonClicked() {
                document.getElementById("btn_reject").clicked = true;
            }
        </script>
        <!-- bagian modal approve ketika tekan tombol approve  -->
        <script>
            $(document).on('click', '#btn_modal_approve', function(event) {
                event.preventDefault()
                var id_permohonan = $('.modal1_id_permohonan').text()
                var permohonan_pencairan = "<?= $data['data_permohonan']['jenis_permohonan_pencairan_sebelum_jt_pengajuan'] ?>"
                var approval = $('#approval').text()
                var ket_approval = $('#keterangan_approval').val()
                var nama_nasabah = "<?= $data['data_permohonan']['nama_nasabah'] ?>"
                var passwordApprove = $('.password_approve');
                passwordApprove.keyup(function() {
                    console.log("Password : " + passwordApprove.val())

                })

                // alert("1");
                // cek terlebih dahulu password komite jika benar maka tampilkan alert konfirmasi
                $.ajax({
                    type: 'post',
                    url: '<?= BASEURL . '/approval/cek_pass_approval' ?>',
                    data: {
                        username_komite: "<?= $_COOKIE['username'] ?>",
                        password_komite: passwordApprove.val()
                    },
                    success: function(data) {
                        data = data.trim()
                        // cek jika pass komite bernilai benar maka tampilkan alert konfirmasi
                        if (data == 'pass_benar') {

                            Swal.fire({
                                title: "Yakin data sudah benar?",
                                showCancelButton: true,
                                confirmButtonText: "Ya",
                                cancelButtonText: "Batal",
                                confirmButtonColor: "#3EC59D",
                                cancelButtonColor: "#BB2D3B",

                            }).then((result) => {
                                if (result.isConfirmed) {

                                    url = "<?= BASEURL; ?>/approval/update_data_pencairan"

                                    load_ajax(url, id_permohonan, ket_approval, approval, permohonan_pencairan, nama_nasabah)



                                } else {}
                            })
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'PIN salah',
                                showConfirmButton: false,
                                timer: 1050
                            })
                        }
                    },
                    error: function(data) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Koneksi Gagal',
                            showConfirmButton: false,
                            timer: 1050
                        })
                    }
                })
            }) //akhir fungsi submit
        </script>

        <script>
            $(document).on('click', '#btn_modal_reject', function(event) {
                event.preventDefault()
                var id_permohonan = $('.modal2_id_permohonan').text()
                var permohonan_pencairan = "<?= $data['data_permohonan']['jenis_permohonan_pencairan_sebelum_jt_pengajuan'] ?>"
                var nama_nasabah = "<?= $data['data_permohonan']['nama_nasabah'] ?>"
                var approval = document.getElementById('approval_pencairan').value
                var ket_approval = $('#keterangan_approval_reject').val()
                var passwordApprove = $('.password_reject');
                passwordApprove.keyup(function() {
                    console.log("Password : " + passwordApprove.val())

                })

                if (approval === '' || ket_approval === '') {
                    alert('Harap Lengkapi Datanya Sebelum Melanjutkan.');
                    return false;
                }

                // alert("1");
                // cek terlebih dahulu password komite jika benar maka tampilkan alert konfirmasi
                $.ajax({
                    type: 'post',
                    url: '<?= BASEURL . '/approval/cek_pass_approval' ?>',
                    data: {
                        username_komite: "<?= $_COOKIE['username'] ?>",
                        password_komite: passwordApprove.val()
                    },
                    success: function(data) {
                        data = data.trim()
                        // cek jika pass komite bernilai benar maka tampilkan alert konfirmasi
                        if (data == 'pass_benar') {
                            Swal.fire({
                                title: "Yakin data sudah benar?",
                                showCancelButton: true,
                                confirmButtonText: "Ya",
                                cancelButtonText: "Batal",
                                confirmButtonColor: "#3EC59D",
                                cancelButtonColor: "#BB2D3B",
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    url = "<?= BASEURL; ?>/approval/reject"
                                    load_ajax(url, id_permohonan, ket_approval, approval, permohonan_pencairan, nama_nasabah)
                                } else {}
                            })
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'PIN salah',
                                showConfirmButton: false,
                                timer: 1050
                            })
                        }
                    },
                    error: function(data) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Koneksi Gagal',
                            showConfirmButton: false,
                            timer: 1050
                        })
                    }
                })
            }) //akhir fungsi submit
        </script>
        <script>
            $(document).on('click', '#btn_modal_pending', function(event) {
                event.preventDefault()
                var id_permohonan = $('.modal2_id_permohonan').text()
                var permohonan_pencairan = "<?= $data['data_permohonan']['jenis_permohonan_pencairan_sebelum_jt_pengajuan'] ?>"
                var nama_nasabah = "<?= $data['data_permohonan']['nama_nasabah'] ?>"
                var approval = document.getElementById('approval_pencairan').value
                var ket_approval = $('#keterangan_approval_reject').val()
                var passwordApprove = $('.password_reject');
                passwordApprove.keyup(function() {
                    console.log("Password : " + passwordApprove.val())

                })

                if (approval === '' || ket_approval === '') {
                    alert('Harap Lengkapi Datanya Sebelum Melanjutkan.');
                    return false;
                }
                // alert('tes : '+approval + "| "+ket_approval)

                // alert("1");
                // cek terlebih dahulu password komite jika benar maka tampilkan alert konfirmasi
                $.ajax({
                    type: 'post',
                    url: '<?= BASEURL . '/approval/cek_pass_approval' ?>',
                    data: {
                        username_komite: "<?= $_COOKIE['username'] ?>",
                        password_komite: passwordApprove.val()
                    },
                    success: function(data) {
                        data = data.trim()
                        // cek jika pass komite bernilai benar maka tampilkan alert konfirmasi
                        if (data == 'pass_benar') {

                            Swal.fire({
                                title: "Yakin data sudah benar?",
                                showCancelButton: true,
                                confirmButtonText: "Ya",
                                cancelButtonText: "Batal",
                                confirmButtonColor: "#3EC59D",
                                cancelButtonColor: "#BB2D3B",

                            }).then((result) => {
                                if (result.isConfirmed) {

                                    url = "<?= BASEURL; ?>/approval/pending_pencairan"

                                    load_ajax(url, id_permohonan, ket_approval, approval, permohonan_pencairan, nama_nasabah)
                                } else {}
                            })
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'PIN salah',
                                showConfirmButton: false,
                                timer: 1050
                            })
                        }
                    },
                    error: function(data) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Koneksi Gagal',
                            showConfirmButton: false,
                            timer: 1050
                        })
                    }
                })
            }) //akhir fungsi submit
        </script>



        <script>
            function load_ajax(url, id_permohonan, ket_approval, approval, permohonan_pencairan, nama_nasabah) {
                $.ajax({
                    type: 'post',
                    url: url,
                    data: {
                        'id_permohonan': id_permohonan,
                        'ket_approval': ket_approval,
                        'approval': approval,
                        'permohonan_pencairan': permohonan_pencairan,
                        'nama_nasabah': nama_nasabah
                    },
                    success: function(res) {
                        var res = res.trim()

                        if (res == '1') {

                            Swal.fire({
                                icon: 'success',
                                title: 'Data Approval Disimpan',
                                showConfirmButton: false,
                                timer: 1500
                            }).then((result) => {
                                window.location.href = "<?= BASEURL; ?>/approval/daftar_pending";
                            })
                        } else {
                            Swal.fire({
                                icon: 'info',
                                title: 'Error : ' + res,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                })

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
        <script>
            // //jangan di hapus (jadi)
            // $("#form_approval_edit_data_approval").on('submit', function(e, params) {
            //     var localParams = params || {};

            //     if (!localParams.send) {
            //         e.preventDefault();
            //     }
            //     Swal.fire({
            //         title: "Yakin Data Sudah Benar ?",
            //         showCancelButton: true,
            //         confirmButtonText: "Ya",
            //         cancelButtonText: "Batal",
            //         confirmButtonColor: "#3EC59D",
            //         cancelButtonColor: "#BB2D3B",
            //         showLoaderOnConfirm: true,

            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             Swal.fire({
            //                 icon: 'success',
            //                 title: 'Data Telah Diapprove',
            //                 showConfirmButton: false,
            //                 timer: 1500
            //             }).then((result) => {
            //                 $("#form_approval_edit_data_approval").off("submit").submit();
            //             })
            //         }
            //     })
            // })

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



        <script>
            // onkeypress="return hanyaAngka(event)" 
            function hanyaAngka(evt) {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))

                    return false;
                return true;
            }
        </script>





        <!-- sttus perkawinan jika belum menikah maka disable inputan data pasangan -->

    </body>

</html>