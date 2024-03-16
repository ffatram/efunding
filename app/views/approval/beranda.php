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
    <style>
        .knob {
            pointer-events: none;
        }
    </style>

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
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="far fa-copy"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-number" style="font-size: 25px"><?= isset($data['jumlah_pencairan']['jumlah_data_pencairan']) ?  $data['jumlah_pencairan']['jumlah_data_pencairan'] : 'aaa' ?><sup style="font-size: 20px"></sup></span>
                                    <span class="info-box-text" style="font-size: 15px">Pencairan Sebelum Jatuh Tempo</span>

                                    <!-- <h3>53<sup style="font-size: 10px"></sup></h3> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="far fa-copy"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-number" style="font-size: 25px"><?= isset($data['jumlah_suku_bunga']['jumlah_data_suku_bunga']) ? $data['jumlah_suku_bunga']['jumlah_data_suku_bunga'] : 'bbb' ?><sup style="font-size: 20px"></sup></span>
                                    <span class="info-box-text" style="font-size: 15px">Suku Bunga Khusus</span>

                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <!-- <div class="col-lg-4 col-6">
                            <small box -->
                        <!-- <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>44</h3>

                                    <p>Suku Bunga Khusus</p>
                                </div> -->
                        <!-- <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div> -->
                        <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        <!-- </div> -->
                        <!-- </div> -->
                    </div>

                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-12 connectedSortable">
                            <!-- solid Persetujuan -->
                            <div class="card">
                                <div class="card-header bg-gradient-info">
                                    <h3 class="card-title">
                                        <i class="fas fa-th mr-1"></i>
                                        Status Approve
                                    </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button> -->
                                    </div>
                                </div>
                                <div class="card-body" style="padding: 50px 50px;">
                                    <!-- s<canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; align-items-center"></canvas> -->
                                    <div class="row" style="align-items: center;">
                                        <div class="col-4 text-center">
                                            <input type="text" class="knob" value="<?= isset($data['jumlah_permohonan']['jumlah_data_permohonan']) ? $data['jumlah_permohonan']['jumlah_data_permohonan'] : '' ?>" readonly data-width="100px" data-height="100px" data-fgColor="#17a2b8" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px;
                                          margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center;
                                          color: rgb(255, 255, 255); padding: 0px; appearance: none;">
                                            <div class="knob-label" style="font-size: large;">Belum Diputuskan</div>
                                        </div>
                                        <!-- ./col -->
                                        <div class="col-4 text-center">
                                            <!-- <input type="text" class="knob" data-readonly="true" value="50" data-width="100px" data-height="100 px" data-fgColor="#39CCCC"> -->
                                            <input type="text" class="knob" value="<?= isset($data['jumlah_disetujui']['jumlah_data_disetujui']) ? $data['jumlah_disetujui']['jumlah_data_disetujui'] : '' ?><sup style=" font-size: data-width=" 100px" data-height="100px" data-fgColor="#17a2b8" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px;
                                          margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center;
                                          color: rgb(255, 255, 255); padding: 0px; appearance: none;" readonly>
                                            <div class="knob-label" style="font-size: large;">Disetujui</div>
                                        </div>
                                        <!-- ./col -->
                                        <div class="col-4 text-center">
                                            <!-- <input type="text" class="knob" data-readonly="true" value="30" data-width="100px" data-height="100 px" data-fgColor="#39CCCC"> -->
                                            <input type="text" class="knob" value="<?= isset($data['jumlah_ditolak']['jumlah_data_ditolak']) ? $data['jumlah_ditolak']['jumlah_data_ditolak'] : '' ?>" data-width="100px" data-height="100px" data-fgColor="#17a2b8" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px;
                                          margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center;
                                          color: rgb(255, 255, 255); padding: 0px; appearance: none;" readonly>
                                            <div class="knob-label" style="font-size: large;">Ditolak</div>
                                        </div>
                                        <!-- ./col -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->

                        </section>
                    </div>

                </div>
                <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    </div>


    </section>
    <!-- /.content -->
    </div>
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