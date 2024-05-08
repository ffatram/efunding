<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Approval Permohonan Suku Bunga</title>

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
                            <h1 class="m-0">Form Approval</h1>
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
                                                    <label class="mt-2 mb-2">Jenis Produk</label><span class="ml-1" style="color:red;"></span>
                                                    <input type="text" class="form-control" name="jenis_produk" value="<?= $data['data_permohonan']['jenis_produk'] ?>" disabled />
                                                    <label class="mt-2 mb-2">Nomor Identitas</label><span class="ml-1" style="color:red;"></span>
                                                    <input type="text" class="form-control" name="nomor_ktp" value="<?= $data['data_permohonan']['nomor_identitas'] ?>" disabled />
                                                    <label class="mt-2 mb-2">Nama Nasabah</label><span class="ml-1" style="color:red;"></span>
                                                    <input type="text" class="form-control" id="nama_nasabah" name="nama_nasabah" value="<?= $data['data_permohonan']['nama_nasabah'] ?>" disabled />
                                                    <label class="mt-2 mb-2">Alasan Pengajuan</label><span class="ml-1" style="color:red;"></span>
                                                    <input type="text" class="form-control" onkeypress="return hanyaHuruf(event)" name="status_nasabah" oninput="this.value = this.value.toUpperCase()" value="<?= $data['data_permohonan']['status_nasabah'] ?>" disabled />
                                                    <label class="mt-2 mb-2">Alamat</label><span class="ml-1" style="color:red;"></span>
                                                    <textarea class="form-control" name="alamat" oninput="this.value = this.value.toUpperCase()" disabled><?= $data['data_permohonan']['alamat'] ?></textarea>
                                                    <div class="form-group" id="history" <?php echo empty($data['data_permohonan']['history_permohonan']) ? 'style="display:none;"' : 'style="display:block;"'; ?>>
                                                        <label class="mt-2 mb-2">History Permohonan</label><span class="ml-1" style="color:red;"></span>
                                                        <textarea class="form-control" name="history_permohonan" disabled><?= $data['data_permohonan']['history_permohonan'] ?></textarea>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xxl-6 ">
                                        <div class="card flex-fill">
                                            <div class="card-body">
                                            <label class="mt-2 mb-2">Nama Keluarga</label><span class="ml-1" style="color:red;"></span>
                                                <input type="text" class="form-control" name="nama_keluarga" value="<?= $data['data_permohonan']['nama_keluarga'] ?>" disabled />
                                               
                                                <label class="mt-2 mb-2">Nilai Akumulasi Simpanan</label><span class="ml-1" style="color:red;"></span>
                                                <input type="text" class="form-control" name="nilai_akumulasi_deposito" value="<?= "Rp " . number_format($data['data_permohonan']['nilai_akumulasi_simpanan'], 0, ',', '.')  ?>" disabled />

                                                <label class="mt-2 mb-2">Nominal</label><span class="ml-1" style="color:red;"></span>
                                                <input type="text" class="form-control" name="nominal" value="<?= "Rp " . number_format($data['data_permohonan']['nominal'], 0, ',', '.')  ?>" disabled />

                                                <div class="form-group" style="display:none" id="hidden_div">
                                                    <label class="mt-2 mb-2">Jangka Waktu</label><span class="ml-1" style="color:red;"></span>
                                                    <input type="text" class="form-control" name="jangka_waktu" value="<?= $data['data_permohonan']['jangka_waktu'] ?>" disabled />
                                                    <!-- <label class="mt-2 mb-2">Nomor Rekening Deposito</label><span class="ml-1" style="color:red;"></span>
                                                    <input type="text" class="form-control" name="norek_deposito" value="<?= $data['data_permohonan']['nomor_rekening_deposito'] ?>" disabled /> -->
                                                </div>
                                                <div class="form-group">
                                                    <label class="mt-2 mb-2">Suku Bunga Pengajuan</label><span class="ml-1" style="color:red;"></span>
                                                    <input type="text" class="form-control" name="suku_bunga_pengajuan" id="suku_bunga_pengajuan" value="<?= $data['data_permohonan']['nilai_suku_bunga_pengajuan'] ?>" disabled />


                                                    <!-- <label class="col-form-label">History Pengajuan</label><span class="ml-1" style="color:red;">*</span>
                                                    <textarea class="form-control" name="history_pengajuan" disabled ><?= $data['data_permohonan']['history_permohonan'] ?></textarea> -->

                                                    <!-- <input type="text" id="nilaiInput" oninput="checkInputValue()(this)"> -->
                                                    <input type="hidden" class="form-control" name="suku_bunga_pengajuan" value="<?= $data['data_permohonan']['nilai_suku_bunga_pengajuan'] ?>" />
                                                    <label class="mt-2 mb-2">Keterangan Funding</label><span class="ml-1" style="color:red;"></span>
                                                    <textarea class="form-control" name="keterangan_funding" disabled><?= $data['data_permohonan']['keterangan_funding'] ?></textarea>
                                                    <div style="display:none" id="hidden_rekomendasi">
                                                        <label class="mt-2 mb-2">Catatan Rekomendasi Pejabat Cabang </label><span class="ml-1" style="color:red;"></span>
                                                        <textarea class="form-control" style="height: 60px;" name="keterangan_funding" id="rekomendasi_pejabat_cabang" disabled><?= $data['data_permohonan']['rekomendasi_pejabat_cabang'] ?></textarea>
                                                    </div>
                                                </div>
                                                <!-- tes-tes -->

                                                <button class="btn btn-primary btn-lg" type="submit" id="btn_form_approval_edit_data_approval" value="approve" data-id_permohonan="<?= $row['id_permohonan'] ?>">Approve</button>
                                                <button class="btn btn-lg btn-danger" type='submit' id="btn_reject" value="reject" data-id_permohonan="<?= $row['id_permohonan'] ?>">Reject</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </main>

                    </form>


                </div>
        </div>


        <?php
        if ($data['data_permohonan']['jenis_produk'] == 'SI DEKA') {
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
        <?php
        if (!empty($data['data_permohonan']['rekomendasi_pejabat_cabang'])) {
        ?>
            <script>
                document.getElementById("hidden_rekomendasi").style.display = "block";
            </script>
        <?php
        } else {
        ?>
            <script>
                document.getElementById("hidden_rekomendasi").style.display = "none";
            </script>
        <?php
        }
        ?>


        </form>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
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
                                                <td style="width: 200px; background-color: #F4F4F4; ">Status Nasabah</td>
                                                <td><?= $data['data_permohonan']['status_nasabah'] ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 200px; background-color: #F4F4F4; ">Nominal</td>
                                                <td><?= number_format($data['data_permohonan']['nominal'], 0, ',', '.') ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 200px; background-color: #F4F4F4; ">Suku Bunga Pengajuan</td>
                                                <td><?= $data['data_permohonan']['nilai_suku_bunga_pengajuan']  ?></td>
                                            </tr>

                                            <tr>
                                                <td style="width: 200px; background-color: #F4F4F4; ">Keterangan Funding</td>
                                                <td><?= $data['data_permohonan']['keterangan_funding'] ?></td>
                                            </tr>
                                            </tr>
                                            <td style="width: 200px; background-color: #F4F4F4; ">Suku Bunga Yang Diapprove</td>
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

    <form id="form_reject" action="your_action_here" method="post">
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
                        <form action="">
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
                                                        <td style="width: 200px; background-color: #F4F4F4; ">Status Nasabah</td>
                                                        <td><?= $data['data_permohonan']['status_nasabah'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 200px; background-color: #F4F4F4; ">Jenis Produk</td>
                                                        <td><?= $data['data_permohonan']['jenis_produk'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 200px; background-color: #F4F4F4; ">Nominal</td>
                                                        <td><?= number_format($data['data_permohonan']['nominal'], 0, ',', '.') ?></td>
                                                    </tr>
                                                    <?php
                                                    if ($data['data_permohonan']['jenis_produk'] == 'SI MITRA') {
                                                    ?>
                                                        <tr>
                                                            <?php
                                                            echo " <td style='width: 200px; background-color: #F4F4F4; display:none; '>Jangka Waktu</td>";
                                                            echo "<td style='display:none;'>" . $data['data_permohonan']['jangka_waktu'] . "</td>";
                                                            ?>
                                                        </tr>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <tr>
                                                            <td style="width: 200px; background-color: #F4F4F4; ">Jangka Waktu</td>
                                                            <td><?= $data['data_permohonan']['jangka_waktu'] ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td style="width: 200px; background-color: #F4F4F4; ">Suku Bunga Pengajuan</td>
                                                        <td><?= $data['data_permohonan']['nilai_suku_bunga_pengajuan'] ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width: 200px; background-color: #F4F4F4; ">Keterangan Funding</td>
                                                        <td><?= $data['data_permohonan']['keterangan_funding'] ?></td>
                                                    </tr>
                                                    </tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Suku Bunga Yang Diapprove <span style="color: red;">&#9733;</span></td>
                                                    <td>
                                                        <input type="text" class="form-control" name="suku_bunga_approval" id="suku_bunga_approval" oninput="hanyaAngka(event)" required>
                                                    </td>
                                                    <td style="display: none;" id='reject'> </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width: 200px; background-color: #F4F4F4; ">Keterangan Approval <span style="color: red;">&#9733;</span></td>
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan_approval" id="keterangan_approval_reject" oninput="this.value = this.value.toUpperCase()" required></textarea>
                                                        </td>
                                                        <td id='ket_reject'></td>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- bagian modal ketika tekan tombol  Rejct -->
    <!-- <div class="modal fade modal_1" id="modal_reject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-m modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="h4"><strong>Reject Permohonan</strong></h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body data_modal">
                    <form action="">
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
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Status Nasabah</td>
                                                    <td><?= $data['data_permohonan']['status_nasabah'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Nominal</td>
                                                    <td><?= number_format($data['data_permohonan']['nominal'], 0, ',', '.') ?></td>

                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Suku Bunga Pengajuan</td>
                                                    <td><?= $data['data_permohonan']['nilai_suku_bunga_pengajuan'] ?></td>
                                                </tr>

                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Keterangan Funding</td>
                                                    <td><?= $data['data_permohonan']['keterangan_funding'] ?></td>
                                                </tr>
                                                </tr>
                                                <td style="width: 200px; background-color: #F4F4F4; ">Suku Bunga Yang Diapprove</td>
                                                <td>
                                                    <input type="text" class="form-control" name="suku_bunga_approval" id="suku_bunga_approval" oninput="hanyaAngka(event)" required>
                                                </td>
                                                <td style="display: none;" id='reject'> </td>
                                                </tr>

                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Keterangan Approval</td>
                                                    <td>
                                                        <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan_approval" id="keterangan_approval" oninput="this.value = this.value.toUpperCase()"></textarea>
                                                    </td>
                                                    <td id='ket_reject'></td>
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
                    </form>


                </div>
            </div>
        </div>
    </div> -->












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
        var suku_bunga = document.getElementById("suku_bunga_approval");
        var suku_bunga_pengajuan = document.getElementById("suku_bunga_pengajuan");
        // Tambahkan event listener untuk memantau perubahan pada input
        suku_bunga.addEventListener('input', function() {
            // Ambil nilai dari input
            var inputanSukuBunga = parseFloat(suku_bunga.value);
            var maxSukuBunga = parseFloat(suku_bunga_pengajuan.value);

            console.log(maxSukuBunga);
            // Periksa apakah nilai melebihi nilai maksimum
            if (inputanSukuBunga > maxSukuBunga) {
                // Jika melebihi, tampilkan alert
                alert('Nilai yang diinputkan lebih besar dari nilai yang diajukan!');
                // Kosongkan nilai input
                suku_bunga.value = '';
            }
        });
        // document.getElementById("suku_bunga_approval").addEventListener("input", function(e) {
        //     let inputValue = this.value;

        //     // Cek jika tombol yang ditekan adalah backspace
        //     if (e.inputType === 'deleteContentBackward') {
        //         return; // Biarkan penghapusan karakter jika tombol yang ditekan adalah backspace
        //     }

        //     // Cek apakah nilai input hanya terdiri dari angka
        //     if (/^\d*\.?\d{0,2}$/.test(inputValue)) {
        //         // Jika hanya satu angka diikuti oleh titik, tambahkan angka 0 di belakangnya
        //         if (/^\d$/.test(inputValue)) {
        //             this.value = inputValue + ".";
        //         }
        //     } else {
        //         alert("Hanya 2 Angka di Belakang Koma");
        //         // Jika format input tidak sesuai, hapus karakter terakhir dari nilai input
        //         this.value = inputValue.slice(0, -1);
        //     }
        // });
    </script>
    <script>
        // Function to add "00" if no digits are present after the decimal point
        function addZeroesIfRequired(inputValue) {
            if (inputValue.endsWith(".")) {
                this.value = inputValue + "00";
            }
        }

        // Existing event listener
        document.getElementById("suku_bunga_approval").addEventListener("input", function(e) {
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
        document.getElementById("suku_bunga_approval").addEventListener("blur", function(e) {
            let inputValue = this.value;
            addZeroesIfRequired.call(this, inputValue);
        });

        document.getElementById("suku_bunga_approval").addEventListener("change", function(e) {
            let inputValue = this.value;
            addZeroesIfRequired.call(this, inputValue);
        });
    </script>

    <script>
        // Cek jika history_permohonan kosong, maka sembunyikan elemen
        if ('<?= $data['data_permohonan']['history_permohonan'] ?>' === '') {
            document.getElementById('history').style.display = "none";
        }
    </script>

    <script>
        var inputElement = document.getElementById('inputElementId'); // Gantilah 'inputElementId' dengan ID elemen input Anda

        // Ambil nilai maksimum yang diinginkan
        var maxValue = 100; // Gantilah dengan nilai maksimum yang diinginkan

        // Fungsi untuk memeriksa nilai input
        function checkInputValue() {
            var inputValue = parseFloat(inputElement.value);

            // Periksa apakah nilai melebihi batas maksimum
            if (inputValue > maxValue) {
                alert('Nilai tidak boleh melebihi ' + maxValue);
                inputElement.value = maxValue; // Atur nilai kembali ke batas maksimum
            }
        }
    </script>

    <!-- mengatur inputan khusus decimal -->
    <script>
        document.getElementById('suku_bunga_approval').addEventListener('input', function() {
            var inputValue = this.value;
            // Hapus semua karakter selain angka dan titik desimal
            inputValue = inputValue.replace(/[^\d.]/g, '');
            // Pisahkan angka sebelum dan setelah titik desimal
            var parts = inputValue.split('.');
            // Batasi angka setelah titik desimal menjadi 2 digit
            if (parts[1] && parts[1].length > 2) {
                parts[1] = parts[1].substring(0, 2);
            }
            // Gabungkan kembali angka-angka
            this.value = parts.join('.');
        });
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
        const permohonanDiajukan = document.getElementById('suku_bunga_pengajuan');
        const permohonanDiapprove = document.getElementById('suku_bunga_approval');
        const textarea = document.getElementById('keterangan_approval');
        const valDiajukan = permohonanDiajukan.value;
        const valDiapprove = permohonanDiapprove.value;
        $(document).ready(function() {
            $('#form_approval_edit_data_approval').submit(function(e) {
                e.preventDefault();
                var id_permohonan = $(this).data('id_permohonan');
                var permohonanDiajukan = document.getElementById('suku_bunga_pengajuan').value;
                // var permohonanDiapprove = document.getElementById('suku_bunga_approval').value;
                var submitValue = $(document.activeElement).val();

                if (submitValue === 'approve') {
                    var keterangan = document.getElementById('keterangan_approval').value;
                    document.getElementById('approval').textContent = permohonanDiajukan;
                    document.getElementById('ket_approval').textContent = keterangan;

                    $.ajax({
                        type: 'post',
                        url: '<?= BASEURL . '/approval/modal_detail_approve' ?>',
                        data: {
                            'id_permohonan': id_permohonan
                        },
                        success: function(res) {
                            $('.modal_approve').html(res);
                            $("#modal_approve").modal('show');
                        }
                    });
                } else if (submitValue === "reject") {
                    var keterangan = document.getElementById('keterangan_approval').value;
                    document.getElementById('reject').textContent = permohonanDiapprove;
                    document.getElementById('ket_reject').textContent = keterangan;

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
                } else {
                    // Handle other cases or default behavior
                }
            });
        });
    </script>

    <script type="text/javascript">
        function cekInput() {
            var pilihApprove = document.getElementById("suku_bunga_approval").value;
            var ketApprove = document.getElementById("keterangan_approval").value;
            var reject = document.getElementById("btn_modal_reject");

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
            var suku_bunga_pengajuan = "<?= $data['data_permohonan']['nilai_suku_bunga_pengajuan'] ?>"
            var nama_nasabah = "<?= $data['data_permohonan']['nama_nasabah'] ?>"
            var approval = $('#approval').text()
            var ket_approval = document.getElementById("keterangan_approval").value
            var passwordApprove = $('.password_approve')
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

                                url = "<?= BASEURL; ?>/approval/update_data_suku_bunga"

                                load_ajax(url, id_permohonan, ket_approval, approval, suku_bunga_pengajuan, nama_nasabah)
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
            var suku_bunga_pengajuan = "<?= $data['data_permohonan']['nilai_suku_bunga_pengajuan'] ?>"
            var nama_nasabah = "<?= $data['data_permohonan']['nama_nasabah'] ?>"
            var approval = document.getElementById('suku_bunga_approval').value
            var ket_approval = $('#keterangan_approval_reject').val()
            var passwordApprove = $('.password_reject');
            passwordApprove.keyup(function() {
                console.log("Password : " + passwordApprove.val())

            })

            if (approval === '' || ket_approval === '') {
                alert('Harap Lengkapi Datanya Sebelum Melanjutkan');
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

                                url = "<?= BASEURL; ?>/approval/reject_suku_bunga"

                                load_ajax(url, id_permohonan, ket_approval, approval, suku_bunga_pengajuan, nama_nasabah)
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
            var suku_bunga_pengajuan = "<?= $data['data_permohonan']['nilai_suku_bunga_pengajuan'] ?>"
            var nama_nasabah = "<?= $data['data_permohonan']['nama_nasabah'] ?>"
            var approval = document.getElementById('suku_bunga_approval').value
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

                                url = "<?= BASEURL; ?>/approval/pending_suku_bunga"

                                load_ajax(url, id_permohonan, ket_approval, approval, suku_bunga_pengajuan, nama_nasabah)
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
        function load_ajax(url, id_permohonan, ket_approval, approval, suku_bunga_pengajuan, nama_nasabah) {
            $.ajax({
                type: 'post',
                url: url,
                data: {
                    'id_permohonan': id_permohonan,
                    'suku_bunga_pengajuan': suku_bunga_pengajuan,
                    'nama_nasabah': nama_nasabah,
                    'ket_approval': ket_approval,
                    'approval': approval
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
                            window.location.href = "<?= BASEURL; ?>/approval/daftar_belum_approve";
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
            var input = evt.target.value;
            var formattedInput = input.replace(/[^\d.]/g, ''); // Hanya membiarkan angka dan titik

            if (input !== formattedInput) {
                evt.target.value = formattedInput; // Mengganti nilai input dengan yang divalidasi
                alert("Inputan hanya boleh angka");
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
    </script>





    <!-- sttus perkawinan jika belum menikah maka disable inputan data pasangan -->

</body>

</html>