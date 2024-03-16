<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export CSV</title>

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



</head>



<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">


        <!-- Navbar -->
        <?php $this->view('inquiry/navbar') ?>
        <!-- Navbar -->


        <!-- Side Bar -->
        <?php $this->view('inquiry/side_bar') ?>
        <!-- Side Bar -->
        <div class="content-wrapper">

            <!-- <div class="content-header">
                <div class="container-fluid">
                    <div class="row "> -->
            <!-- <div class="col-sm-6">
                            <h1 class="m-0">Export CSV</h1>
                        </div> -->

            <!-- </div>
                </div>
            </div> -->

            <section class="content ">
                <!-- <div class="container-fluid"> -->
                    <!-- main -->
                    <div class="card mt-5">
                        <div class="card-header">
                            <h4>Export</h4>
                        </div>
                        <div class="card-header">
                            <div class="text-center">
                            </div>
                            <div class="d-flex">
                                <div class="ml-auto">
                                    <div class="row">
                                        <div class="col">
                                            <input type="date" class="form-control dari_tanggal" required>
                                        </div>
                                        <div class="col">
                                            <input type="date" class="form-control sampai_tanggal" required>
                                        </div>

                                        <div class='col'>
                                            <?php
                                            if ($_COOKIE['level'] == "INQUIRY") {
                                            ?>
                                                <select class="form-control kode_cabang" name='kode_cabang'>
                                                    <option value="">- SILAHKAN PILIH -</option>
                                                    <?php
                                                    foreach ($data['cabang'] as $row) :
                                                    ?>
                                                        <option value="<?= $row['nama_cabang'] ?>"><?= $row['nama_cabang'] ?></option>
                                                    <?php
                                                    endforeach;
                                                    ?>
                                                </select>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover first display nowrap" data-page-length='15'>
                                    <thead>
                                        <tr>
                                            <!-- <th> No</th> -->
                                            <th> Id Permohonan </th>
                                            <th> Nama Inputer </th>
                                            <th> Nama Cabang</th>       
                                            <th> Jenis Permohonan </th>
                                            <th> Tanggal Permohonan</th>
                                            <th> Alasan Pengajuan</th>                                     
                                            <th> Nama Nasabah</th>
                                            <th> Nomor Telepon</th>
                                            <th> Alamat </th>
                                            <th> Status Nasabah </th>
                                            <th> Jenis Produk </th>
                                            <th> Nominal </th>                                            
                                            <th> Jangka Waktu </th>
                                            <th> Suku Bunga yang Diajukan </th>
                                            <th> Suku Bunga Counter </th>
                                            <th> Nama Keluarga </th>
                                            <th> Nilai Akumulasi Simpanan </th>
                                            <th> Permohonan Pencairan yang Diajukan </th>                                           
                                            <th> Suku Bunga Deposito </th>
                                            <th> Tanggal Pembentukan/Perpanjangan </th>
                                            <th> Jumlah Hari Berjalan </th>
                                            <th> Nominal Penalti </th>
                                            <th> Nominal Bunga Berjalan </th>
                                            <th> Nomor Rekening Pencairan </th>
                                            <th> Keterangan Funding </th>
                                            <th> Suku Bunga yang Diapprove </th>
                                            <th> Permohonan Pencairan yang Diapprove </th>  
                                            <th> Keterangan Approval </th>
                                            <th> Tanggal Batal </th>
                                            <th> Tanggal Pengajuan Ulang </th>
                                            <th> Tanggal Pending </th>
                                            <th> Tanggal Approve </th>
                                            <th> Tanggal Dilanjutkan ke CS </th>
                                            <th> Tanggal Proses di CBS </th>
                                            <th> Nama Inputer CBS </th>
                                            <th> History Permohonan </th>
                                            <th> Status Permohonan </th>
                                        </tr>
                                    </thead>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
            </section>
        </div>

         <!-- footer -->
    <?php $this->view('inquiry/footer') ?>
        <!-- footer -->


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
        var kode_cabang = $('.kode_cabang');
        var dari_tanggal = $('.dari_tanggal')
        var sampai_tanggal = $('.sampai_tanggal')
        var pilihan = '';
    </script>

    <script>
        $(document).ready(function() {

            pilihan = kode_cabang.val();
            $('.table').DataTable()

            function data_table(url) {
                var table = $('.table').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                        //EXCEL
                        extend: 'csvHtml5',
                        className: 'btn btn-success export',
                        text: '<i class="fas fa-file-excel mr-2"></i>  EXPORT',
                        fieldSeparator: '|'

                        // title: 'Data ',
                    }],

                    "ajax": {

                        "url": "<?= BASEURL ?>" + url,
                        "type": 'POST',
                        "data": function(d) {
                            d.dari_tanggal = $('.dari_tanggal').val();
                            d.sampai_tanggal = $('.sampai_tanggal').val();
                            // d.id_analis = $('.id_analis').val();
                            d.kode_cabang = $('.kode_cabang').val();
                        },
                        "dataSrc": "",
                    },
                    "columns": [{
                            "data": "id_permohonan"
                        },
                        {
                            "data": "username"
                        },
                        {
                            "data": "kantor_cabang"
                        },
                        {
                            "data": "jenis_permohonan"
                        },
                        {
                            "data": "tgl_permohonan"
                        },
                        {
                            "data": "alasan_pengajuan"
                        },
                        {
                            "data": "nama_nasabah"
                        },
                        {
                            "data": "nomor_telepon"
                        },
                        {
                            "data": "alamat"
                        },
                        {
                            "data": "status_nasabah"
                        },
                        {
                            "data": "jenis_produk"
                        },
                        {
                            "data": "nominal"
                        },
                        {
                            "data": "jangka_waktu"
                        },
                        {
                            "data": "nilai_suku_bunga_pengajuan"
                        },
                        {
                            "data": "suku_bunga_counter"
                        },
                        {
                            "data": "nama_keluarga"
                        },
                        {
                            "data": "nilai_akumulasi_simpanan"
                        },
                        {
                            "data": "jenis_permohonan_pencairan_sebelum_jt_pengajuan"
                        },
                        {
                            "data": "suku_bunga_deposito"
                        },
                        {
                            "data": "tgl_pembentukan"
                        },
                        {
                            "data": "jumlah_hari"
                        },
                        {
                            "data": "nominal_penalti"
                        },
                        {
                            "data": "nominal_bunga_berjalan"
                        },
                        {
                            "data": "nomor_rekening_pencairan"
                        },
                        {
                            "data": "keterangan_funding"
                        },
                        {
                            "data": "nilai_suku_bunga_approval"
                        },
                        {
                            "data": "jenis_permohonan_pencairan_sebelum_jt_approval"
                        },
                        {
                            "data": "keterangan_approval"
                        },
                        {
                            "data": "tgl_batal"
                        },
                        {
                            "data": "tgl_pengajuan_ulang"
                        },
                        {
                            "data": "tgl_pending"
                        },
                        {
                            "data": "tgl_approval"
                        },
                        {
                            "data": "tgl_dilanjutkan"
                        },
                        {
                            "data": "tgl_telah_diproses"
                        },
                        {
                            "data": "user_cbs"
                        },
                        {
                            "data": "history_permohonan"
                        },
                        {
                            "data": "status_permohonan"
                        }
                    ]

                });
                $('.export').appendTo('.export-btn');

            }

            $(document).on('change', '.kode_cabang, .dari_tanggal, .sampai_tanggal', function() {

                if (kode_cabang.val() != 'undefined') {
                    console.log(dari_tanggal.val());
                    console.log(sampai_tanggal.val());
                    console.log(kode_cabang.val());

                    if ((dari_tanggal.val() != '' && sampai_tanggal.val() != '' && $('.kode_cabang') != '')) {
                        if ($('.kode_cabang').val() == 'ALL CABANG') {
                            $('.table').DataTable().clear();
                            $('.table').DataTable().destroy();
                            data_table('/inquiry/get_load_csv_all').table.ajax.reload(null, false);
                        } else {
                            $('.table').DataTable().clear();
                            $('.table').DataTable().destroy();
                            data_table('/inquiry/get_load_csv').table.ajax.reload(null, false);
                        }
                    }

                } else {

                }


            })



            // $(document).on('change', '.kode_cabang, .dari_tanggal, .sampai_tanggal', function() {
            //     if (dari_tanggal.val() != '' && sampai_tanggal.val() != '' && $('.kode_cabang').val() != '') {
            //         if ($('.kode_cabang').val() == '00') {
            //             $('.table').DataTable().clear();
            //             $('.table').DataTable().destroy();
            //             data_table('/cs/get_load_csv_all').table.ajax.reload(null, false);
            //         } else {
            //             $('.table').DataTable().clear();
            //             $('.table').DataTable().destroy();
            //             data_table('/cs/    ').table.ajax.reload(null, false);
            //         }
            //     }
            // })



        })
    </script>











</body>

</html>