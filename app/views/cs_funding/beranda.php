<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>

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
                            <h1>Beranda</h1>
                        </div>

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h1><?= isset($data['jumlah_pencairan']['jumlah_data_pencairan']) ?  $data['jumlah_pencairan']['jumlah_data_pencairan'] : 'aaa' ?><sup style="font-size: 20px"></sup></h1>
                                    <p>Pencairan Sebelum jatuh Tempo</p>
                                </div>
                                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h1><?= isset($data['jumlah_suku_bunga']['jumlah_data_suku_bunga']) ? $data['jumlah_suku_bunga']['jumlah_data_suku_bunga'] : 'bbb' ?><sup style="font-size: 20px"></sup></h1>

                                    <p>Suku Bunga Khusus</p>
                                </div>
                                <!-- <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div> -->
                                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                            </div>
                        </div>
                        <!-- tabel -->
                        <div class="card">
                            <div class="card-header">
                                Data Approval Terakhir
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-striped table-hover first display nowrap" style="width: 1060px;">
                                        <thead>
                                            <tr>

                                                <th>
                                                    No
                                                </th>
                                                <th>
                                                    Tanggal Approve
                                                </th>
                                                <th>
                                                    Id Permohonan
                                                </th>

                                                <th>
                                                    Nomor Identitas
                                                </th>
                                                <th>
                                                    Nama Nasabah
                                                </th>
                                                <th>
                                                    Jenis Permohonan
                                                </th>
                                                <th>
                                                    Kantor Cabang
                                                </th>
                                                <th>
                                                    Status Approve
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="">

                                            <?php
                                            if (isset($data['approval_baru'])) {
                                                $a = 1;
                                                foreach ($data['approval_baru'] as $row) :


                                            ?>
                                                <tr>

                                                    <td><?= $a++ ?></td>
                                                    <td><?= date('d-m-Y', strtotime($row['tgl_approval'])) ?></td>
                                                    <td><?= $row['id_permohonan'] ?></td>
                                                    <td><?= $row['nomor_identitas'] ?></td>
                                                    <td><?= $row['nama_nasabah'] ?></td>
                                                    <td><?= $row['jenis_permohonan'] ?></td>
                                                    <td><?= $row['kantor_cabang'] ?></td>
                                                    <td><?= $row['status_permohonan'] ?></td>
                                                </tr>

                                                <?php endforeach;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
            <!-- /.content -->
        </div>
    </div>



    <!-- footer -->
    <?php $this->view('cs_funding/footer') ?>
    <!-- footer-->

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
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
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

</body>

</html>