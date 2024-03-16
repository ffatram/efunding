<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Permintaan</title>

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

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

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
                            <h1 class="m-0">Daftar Approval</h1>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-end">
                            <!-- filter data berdasarkan periode tertentu -->

                            <div class="col col-lg-6">
                                <form id="myformcari">
                                    <div class="input-group mb-2">
                                        <input type="date" name="tanggal_awal" class="form-control tanggal_awal datemask" placeholder="Tanggal Awal" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                                        <input type="date" name="tanggal_akhir" class="form-control tanggal_akhir datemask" placeholder="Tanggal Akhir" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask>

                                        <div class="input-group-prepend">
                                            <button type="submit" class="btn btn-primary btn-cari">Cari</button>
                                        </div>
                                    </div>

                                </form>

                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-striped table-hover first display nowrap">
                                            <thead>
                                                <tr>
                                                    <!-- <th> No</th> -->
                                                    <th> Id Permohonan </th>
                                                    <th> Jenis Permohonan </th>
                                                    <th> Tanggal Permohonan</th>
                                                    <th> Nama Nasabah</th>
                                                    <th> Jenis Produk </th>
                                                    <th> Nominal </th>
                                                    <th> Tanggal Approval </th>
                                                    <th> Status Permohonan </th>
                                                    <th> Aksi </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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




    <!-- Detail-->
    <div class="modal fade" id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h1 class="h4 "><strong>Detail Permohonan</strong></h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal_detail">
                </div>
            </div>
        </div>
    </div>





    <!-- modal log -->
    <div class="modal fade" id="modal_log" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="h4"><strong>Daftar Log</strong></h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="data_modal_log">

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
    <script src="<?= BASEURL ?>/asse`ts/plugins/summernote/summernote-bs4.min.js"></script>
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
        $(document).ready(function() {

            $('.table').DataTable()

            var a;
            var b;

            function data_table(url) {

                var table = $('.table').DataTable({

                    "ajax": {
                        "url": "<?= BASEURL ?>" + url,
                        "type": 'POST',
                        "data": function(d) {
                            d.tanggal_awal = a;
                            d.tanggal_akhir = b;
                        },
                        "dataSrc": "",
                    },

                    "columns": [{
                            "data": "id_permohonan"
                        },
                        {
                            "data": "jenis_permohonan"
                        },
                        {
                            "data": "tgl_permohonan"
                        },
                        {
                            "data": "nama_nasabah"
                        },
                        {
                            "data": "jenis_produk"
                        },
                        {
                            "data": "nominal"
                        },
                        {
                            "data": "tgl_approval"
                        },
                        {
                            "data": "status_permohonan"
                        },
                        {
                            "data": "aksi"
                        }
                    ]
                })

            }



            $(document).on('click', '.btn-cari', function(e) {
                e.preventDefault()
                $('.table').DataTable().clear();
                $('.table').DataTable().destroy();
                data_table('/approval/get_daftar_permohonan').table.ajax.reload(null, false);
            })







            $(document).ready(function() {


                var today = moment().format('YYYY-MM-DD');




                $(".tanggal_awal, .tanggal_akhir").on("change", function() {

                    a = $('.tanggal_awal').val();
                    b = $('.tanggal_akhir').val();
                    console.log("nilai b " + b)

                    if (a != null && b != null) {
                        sessionStorage.key1 = a;
                        sessionStorage.key2 = b;
                    }


                })






                if (sessionStorage.key1 == undefined) {

                    console.log('a 1 ' + sessionStorage.key1)
                    console.log('b 1 ' + sessionStorage.key2)
                    a = today
                    b = today
                } else if (sessionStorage.key2 == undefined) {
                    console.log('a 2 ' + sessionStorage.key1)
                    console.log('b 2 ' + sessionStorage.key2)

                    a = today
                    b = today
                } else {

                    console.log('a 3 ' + sessionStorage.key1)
                    console.log('b 3 ' + sessionStorage.key2)

                    a = sessionStorage.key1
                    b = sessionStorage.key2
                }


                $('.tanggal_awal').val(a);
                $('.tanggal_akhir').val(b);

                console.log("nilai a : " + a)
                console.log("nilai b : " + b)

                $('.table').DataTable().clear();
                $('.table').DataTable().destroy();
                data_table('/approval/get_daftar_permohonan').table.ajax.reload(null, false);

            });

        })
    </script>



    <script>
        $(document).on('click', '#btn_modal_detail', function(event) {
            var id_permohonan = $(this).data('id_permohonan')
            $.ajax({
                type: 'post',
                url: '<?= BASEURL . '/approval/modal_detail' ?>',
                data: {
                    'id_permohonan': id_permohonan
                },
                success: function(res) {
                    $('.modal_detail').html(res)
                    $("#modal_detail").modal('show')

                }
            })
        })

        $(document).on('click', '#btn_modal_pencairan', function(event) {
            var id_permohonan = $(this).data('id_permohonan')
            $.ajax({
                type: 'post',
                url: '<?= BASEURL . '/approval/modal_detail_pencairan' ?>',
                data: {
                    'id_permohonan': id_permohonan
                },
                success: function(res) {
                    $('.modal_detail').html(res)
                    $("#modal_detail").modal('show')

                }
            })
        })

        $(document).on('click', '#btn_modal_log', function(event) {
            var id_permohonan = $(this).data('id_permohonan')
            $.ajax({
                type: 'post',
                url: '<?= BASEURL . '/approval/modal_log' ?>',
                data: {
                    'id_permohonan': id_permohonan
                },
                success: function(res) {
                    $('.modal_detail').html(res)
                    $("#modal_detail").modal('show')

                }
            })
        })
    </script>


    <script>
        $('#edit_cs').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var nama_pemohon = button.data('nama_pemohon');
            var modal = $(this);
            modal.find('#nama_pemohon').val(nama_pemohon);
        })
    </script>
















</body>

</html>