<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencairan Sebelum Jatuh Tempo</title>

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
    <style>
        .custom-table {
            width: 100%;
            margin-bottom: 10px;
        }

        .custom-table th,
        .custom-table td {
            padding: 4px;
            text-align: left;
            line-height: 1;
        }

        .align-top {
            vertical-align: top;
            /* Mengatur vertical-align menjadi top */
        }

        .custom-table th {
            margin-bottom: 5px;
        }

        .custom-table td {
            padding-bottom: 5px;
            /* Sesuaikan sesuai kebutuhan Anda */
        }

        #swal2-content {
            margin-bottom: 0;
            /* Menghilangkan margin bawaan dari Swal */
        }

        .swal2-actions {
            margin-top: 0;
            /* Menghilangkan margin atas dari tombol */
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
                            <h1 class="m-0">Data Permohonan Pencairan Sebelum Jatuh Tempo</h1>
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



                    <!-- <div class="alert alert-elevate alert-light alert-bold" role="alert">
                        <div class="alert-text text-center kt-font-bolder">"Apabila terdapat data yang tidak sesuai, silakan menghubungi KPP Administrasi"</div>
                    </div> -->

                    <main class="content">
                        <div class="container-fluid p-0">
                            <div class="row">

                                <div class="col-6">
                                    <!-- <?php
                                            // if ($_COOKIE['level'] == 'CS' || $_COOKIE['level'] == "RO") {
                                            ?>
                                        <div class="mb-3">
                                            <a href="<?= BASEURL; ?>/cs/hasil_cari_ktp" class="btn btn-success btn-lg">Tambah Data</a>
                                            <a href="" class="btn btn-success btn-lg">Refresh</a>
                                        </div>
                                    <?php
                                    // } else {

                                    ?> -->

                                    <!-- <div class="mb-3">
                                            <a href="" class="btn btn-success btn-lg">Refresh</a>
                                        </div> -->

                                    <?php
                                    // }
                                    ?>

                                </div>

                                <!-- <div class="col-6">
                                    <div class="d-flex justify-content-center">
                                        <div style="font-size: 20px;" class="font-weight-bold">
                                            Total Record : <span class='jumlah_record'><?= isset($data['jumlah_record']) ? $data['jumlah_record']  : '' ?></span>
                                        </div>
                                    </div>
                                </div> -->
                            </div>



                            <!-- tabel -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-striped table-hover first display nowrap">
                                            <a href="<?= BASEURL ?>/cs_funding/permohonan_pencairan" class="nav-link">
                                                <button class="btn btn-primary waves-effect waves-light">
                                                    +Tambah Data
                                                </button>
                                            </a>
                                            <thead>
                                                <tr>

                                                    <th>
                                                        No
                                                    </th>
                                                    <th>
                                                        Id Permohonan
                                                    </th>
                                                    <th>
                                                        Tanggal Permohonan
                                                    </th>
                                                    <th>
                                                        Nama Nasabah
                                                    </th>
                                                    <th>
                                                        Jenis Produk
                                                    </th>
                                                    <th>
                                                        Nominal
                                                    </th>
                                                    <!-- <th>
                                                        Suku Bunga Pengajuan
                                                    </th>
                                                    <th>
                                                        Suku Bunga Approval
                                                    </th> -->
                                                    <th>
                                                        Status Approval
                                                    </th>
                                                    <th>
                                                        Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="">
                                                <?php
                                                if (isset($data['lihat_pencairan'])) {
                                                    $a = 1;
                                                    foreach ($data['lihat_pencairan'] as $row) :
                                                ?>
                                                        <tr>

                                                            <td><?= $a++ ?></td>
                                                            <td><?= $row['id_permohonan'] ?></td>
                                                            <td><?= date('d-m-Y', strtotime($row['tgl_permohonan'])) ?></td>
                                                            <td><?= $row['nama_nasabah'] ?></td>
                                                            <td><?= $row['jenis_produk'] ?></td>
                                                            <td><?= number_format($row['nominal'], 0, ',', '.')  ?></td>
                                                            <td><?= $row['status_permohonan'] ?></td>
                                                            <td>
                                                                <?php
                                                                if ($row['status_permohonan'] == 'DIAJUKAN' || $row['status_permohonan'] == 'DIVERIFIKASI') {
                                                                ?>
                                                                    <a href="<?= BASEURL; ?>/cs_funding/edit_permohonan_pencairan/<?= $row['id_permohonan'] ?>" class="btn btn-outline-primary" id="edit">Edit</a>
                                                                    <button type='submit' id="hapus" class="btn btn-outline-danger btn_hapus" data-id_permohonan="<?= $row['id_permohonan'] ?>" data-nama_nasabah="<?= $row['nama_nasabah'] ?>" data-jenis_permohonan="<?= $row['jenis_permohonan'] ?>">Batal</button>
                                                                    <a href="<?= BASEURL; ?>/cs_funding/form_pengajuan_ulang/<?= $row['id_permohonan'] ?>" class="btn btn-secondary" style="pointer-events: none;">Pengajuan Ulang</a>
                                                                    <button class="btn btn-outline-info" id="btn_modal_detail" data-id_permohonan="<?= $row['id_permohonan'] ?>">Detail</button>
                                                                    <!-- <a href="<?= BASEURL; ?>/cs_funding/formulir_persetujuan/<?= $row['id_permohonan'] ?>" class="btn btn-secondary" id="edit" style="pointer-events: none;">Print</a> -->
                                                                <?php
                                                                }else if ($row['status_permohonan'] == 'DIBATALKAN') {
                                                                    ?>
                                                                        <a href="<?= BASEURL; ?>/cs_funding/edit_permohonan_pencairan/<?= $row['id_permohonan'] ?>" class="btn btn-secondary" style="pointer-events: none;">Edit</a>
                                                                        <button type='submit' id="hapus" data-id_permohonan="<?= $row['id_permohonan'] ?>" data-nama_nasabah="<?= $row['nama_nasabah'] ?>" data-jenis_permohonan="<?= $row['jenis_permohonan'] ?>" class="btn btn-secondary btn_hapus"  style="pointer-events: none;"> Batal</button>
                                                                        <a href="<?= BASEURL; ?>/cs_funding/form_pengajuan_ulang/<?= $row['id_permohonan'] ?>" class="btn btn-secondary" style="pointer-events: none;">Pengajuan Ulang</a>
                                                                        <button class="btn btn-outline-info" id="btn_modal_detail" data-id_permohonan="<?= $row['id_permohonan'] ?>">Detail</button>
                                                                       
                                                                    <?php
                                                                } else if ($row['status_permohonan'] == 'DIPENDING') {
                                                                ?>
                                                                    <!-- <button type='submit' id="hapus" class="btn btn-secondary btn_hapus" data-id_permohonan="<?= $row['id_permohonan'] ?>" data-nama_nasabah="<?= $row['nama_nasabah'] ?>" data-jenis_permohonan="<?= $row['jenis_permohonan'] ?>" style="pointer-events: none;"> Batal</button> -->
                                                                    <a href="<?= BASEURL; ?>/cs_funding/edit_permohonan_pencairan/<?= $row['id_permohonan'] ?>" class="btn btn-secondary" style="pointer-events: none;">Edit</a>
                                                                    <a href="<?= BASEURL; ?>/cs_funding/form_pengajuan_ulang/<?= $row['id_permohonan'] ?>" class="btn btn-outline-primary">Pengajuan Ulang</a>
                                                                    <!-- <button type='submit' id="proses" class="btn btn-secondary btn_lanjutkan" data-id_permohonan="<?= $row['id_permohonan'] ?>" data-nama_nasabah="<?= $row['nama_nasabah'] ?>" data-jenis_permohonan="<?= $row['jenis_permohonan'] ?>" style="pointer-events: none;"> Proses Lanjutkan</button> -->
                                                                    <button class="btn btn-outline-info" id="btn_modal_detail" data-id_permohonan="<?= $row['id_permohonan'] ?>">Detail</button>
                                                                    <a href="<?= BASEURL; ?>/cs_funding/formulir_persetujuan/<?= $row['id_permohonan'] ?>" class="btn btn-secondary" id="edit" style="pointer-events: none;">Print</a>
                                                                <?php
                                                                } else if ($row['status_permohonan'] == 'DIAJUKAN ULANG') {
                                                                ?>
                                                                    <a href="<?= BASEURL; ?>/cs_funding/edit_permohonan_pencairan/<?= $row['id_permohonan'] ?>" class="btn btn-secondary" style="pointer-events: none;">Edit</a>
                                                                    <button type='submit' id="hapus" class="btn btn-secondary btn_hapus" data-id_permohonan="<?= $row['id_permohonan'] ?>" data-nama_nasabah="<?= $row['nama_nasabah'] ?>" data-jenis_permohonan="<?= $row['jenis_permohonan'] ?>" style="pointer-events: none;">Batal</button>
                                                                    <!-- <button type='submit' id="proses" class="btn btn-secondary btn_lanjutkan" data-id_permohonan="<?= $row['id_permohonan'] ?>" data-nama_nasabah="<?= $row['nama_nasabah'] ?>" data-jenis_permohonan="<?= $row['jenis_permohonan'] ?>" style="pointer-events: none;"> Proses Lanjutkan</button> -->
                                                                    <button class="btn btn-outline-info" id="btn_modal_detail" data-id_permohonan="<?= $row['id_permohonan'] ?>">Detail</button>
                                                                    <a href="<?= BASEURL; ?>/cs_funding/formulir_persetujuan/<?= $row['id_permohonan'] ?>" class="btn btn-secondary" id="edit" style="pointer-events: none;">Print</a>
                                                                <?php
                                                                } else if ($row['status_permohonan'] == 'DISETUJUI') {
                                                                ?>
                                                                    <!-- <button type='submit' id="hapus" class="btn btn-secondary btn_hapus" data-id_permohonan="<?= $row['id_permohonan'] ?>" data-nama_nasabah="<?= $row['nama_nasabah'] ?>" data-jenis_permohonan="<?= $row['jenis_permohonan'] ?>" style="pointer-events: none;"> Hapus</button> -->
                                                                    <a href="<?= BASEURL; ?>/cs_funding/edit_permohonan_pencairan/<?= $row['id_permohonan'] ?>" class="btn btn-secondary" style="pointer-events: none;">Edit</a>
                                                                    <button type='submit' id="proses" class="btn btn-outline-success btn_telah_diproses" data-id_permohonan="<?= $row['id_permohonan'] ?>" data-nama_nasabah="<?= $row['nama_nasabah'] ?>" data-jenis_permohonan="<?= $row['jenis_permohonan'] ?>"> Telah Diproses</button>
                                                                    <button class="btn btn-outline-info" id="btn_modal_detail" data-id_permohonan="<?= $row['id_permohonan'] ?>">Detail</button>
                                                                    <a href="<?= BASEURL; ?>/cs_funding/formulir_persetujuan/<?= $row['id_permohonan'] ?>" class="btn btn-outline-primary" id="edit">Print</a>

                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <a href="<?= BASEURL; ?>/cs_funding/edit_permohonan_pencairan/<?= $row['id_permohonan'] ?>" class="btn btn-secondary" style="pointer-events: none;">Edit</a>
                                                                    <!-- <button type='submit' id="hapus" class="btn btn-secondary btn_hapus" data-id_permohonan="<?= $row['id_permohonan'] ?>" data-nama_nasabah="<?= $row['nama_nasabah'] ?>" data-jenis_permohonan="<?= $row['jenis_permohonan'] ?>" style="pointer-events: none;"> Batal</button> -->
                                                                    <button type='submit' id="proses" class="btn btn-secondary btn_proses" data-id_permohonan="<?= $row['id_permohonan'] ?>" data-nama_nasabah="<?= $row['nama_nasabah'] ?>" data-jenis_permohonan="<?= $row['jenis_permohonan'] ?>" style="pointer-events: none;"> Telah Diproses</button>
                                                                    <button class="btn btn-outline-info" id="btn_modal_detail" data-id_permohonan="<?= $row['id_permohonan'] ?>">Detail</button>
                                                                    <a href="<?= BASEURL; ?>/cs_funding/formulir_persetujuan/<?= $row['id_permohonan'] ?>" class="btn btn-outline-primary" id="edit">Print</a>
                                                                <?php
                                                                }
                                                                ?>
                                                            </td>
                                                            <!-- <td>
                                                                <a href="<?= BASEURL; ?>/funding/edit_permohonan_pencairan/<?= $row['id_permohonan'] ?>" class="btn btn-outline-primary">Edit</a>
                                                                <button type='submit' class="btn btn-outline-danger btn_hapus" data-id_permohonan="<?= $row['id_permohonan'] ?>" data-nama_nasabah="<?= $row['nama_nasabah'] ?>" data-jenis_permohonan="<?= $row['jenis_permohonan'] ?>"> Hapus</button>
                                                                <a href="<?= BASEURL; ?>/cs/edit_permohonan_kredit/<?= $row['id_permohonan'] ?>" class="btn btn-outline-success">Proses Lanjutkan</a>
                                                                <button class="btn btn-outline-info" id="btn_modal_detail" data-toggle="modal" data-target="#modal_detail" data-id_permohonan="<?= $row['id_permohonan'] ?>">Detail</button>
                                                                 <button id="btn_modal_detail" class="btn btn-m" style="background-color: <?= w_orange ?>; color:white;" data-toggle="modal" data-target="#modal_detail" data-id_permohonan_kredit="<?= $row['id_permohonan'] ?>">Detail</button> -->
                                                        </tr>
                                                <?php endforeach;
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
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
        var btn_hapus = $('.btn_hapus')
        btn_hapus.on('click', function(event) {
            var id_permohonan = $(this).data('id_permohonan')
            var nama_nasabah = $(this).data('nama_nasabah')
            var jenis_permohonan = $(this).data('jenis_permohonan')
            $.ajax({
                type: 'POST',
                url: '<?= BASEURL . '/cs_funding/cek_btn_hapus' ?>',
                data: 'id_permohonan=' + id_permohonan,
                success: function(res) {
                    var a = res.trim()

                    console.log(res.trim())
                    if (res.trim() == '0') {
                        // jika nilai 0 maka ada data di tbl slik dan tidak di izinkan untuk hapus
                        Swal.fire({
                            icon: 'warning',
                            title: 'Data pemohon ini tidak bisa dibatal karena sudah terelasi dengan tabel lain ',
                            showConfirmButton: false,
                            timer: 5000
                        })

                    } else if (res.trim() == '1') {
                        Swal.fire({
                                icon: 'info',
                                title: '<strong>Yakin ingin batalkan permohonan ini ? </strong>',
                                html: `
                                    <div style="text-align: left;">
                                        <table class="custom-table">
                                            <tr>
                                                <th class="align-top">Id Permohonan</th>
                                                <td> : ${id_permohonan}</td>
                                            </tr>
                                            <tr>
                                                <th class="align-top">Nama Nasabah</th>
                                                <td>: ${nama_nasabah}</td>
                                            </tr>
                                            <tr>
                                                <th class="align-top">Jenis Permohonan</th>
                                                <td>: ${jenis_permohonan}</td>
                                            </tr>
                                            <tr>
                                                <th class="align-top">Alasan Permohonan Dibatalkan </th>
                                                <td>
                                                    <textarea id="alasan" placeholder="Alasan pembatalan" style="width: 100%; max-width: 400px; height: 50px;" oninput="this.value = this.value.toUpperCase()"></textarea>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                `,
                                showCancelButton: true,
                                confirmButtonText: "Ya",
                                cancelButtonText: "Batal",
                                confirmButtonColor: "#3EC59D",
                                cancelButtonColor: "#BB2D3B",
                                showLoaderOnConfirm: true,
                                preConfirm: () => {
                                    const alasan = document.getElementById('alasan').value;
                                    if (!alasan) {
                                        Swal.showValidationMessage('Alasan harus diisi!'); // Pesan validasi jika alasan kosong
                                    }
                                    return alasan;
                                },
                            })


                        .then((result) => {
                            if (result.isConfirmed) {
                                const alasanBatal = document.getElementById('alasan').value;
                                $.ajax({
                                    type: 'post',
                                    url: '<?= BASEURL . '/cs_funding/delete' ?>',
                                    data: {
                                        'id_permohonan': id_permohonan,
                                        'nama_nasabah': nama_nasabah,
                                        'alasanBatal': alasanBatal
                                    },
                                    success: function(res) {
                                        var a = res.trim()
                                        if (res.trim() == 'sukses') {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Permohonan berhasil dibatalkan',
                                                showConfirmButton: false,
                                                timer: 1500
                                            }).then((result) => {
                                                window.location.href = "<?= BASEURL; ?>/cs_funding/pencairan_sebelum_jatuh_tempo";
                                            })

                                        } else if (res.trim() == 'gagal') {
                                            Swal.fire({
                                                icon: 'info',
                                                title: 'Permohonan Gagal Dibatalkan',
                                                showConfirmButton: false,
                                                timer: 1500
                                            })
                                        }
                                        console.log(res.trim())

                                    }
                                })

                            } else {

                            }
                        })
                    } else {
                        alert('erorr kode 001')
                    }
                }


            })
        })
    </script>
    <script>
        var btn_telah_diproses = $('.btn_telah_diproses')
        btn_telah_diproses.on('click', function(event) {
            var id_permohonan = $(this).data('id_permohonan')
            var nama_nasabah = $(this).data('nama_nasabah')
            var jenis_permohonan = $(this).data('jenis_permohonan')
            $.ajax({
                type: 'POST',
                url: '<?= BASEURL . '/cs_funding/cek_btn_telah_proses' ?>',
                data: 'id_permohonan=' + id_permohonan,
                success: function(res) {
                    var a = res.trim()
                    console.log(res.trim())
                    if (res.trim() == '0') {
                        // jika nilai 0 maka ada data di tbl slik dan tidak di izinkan untuk hapus
                        Swal.fire({
                            icon: 'warning',
                            // title: 'Data pemohon ini tidak bisa dihapus karena sudah terelasi dengan tabel lain ',
                            showConfirmButton: false,
                            timer: 5000
                        })
                    } else if (res.trim() == '1') {
                        Swal.fire({
                            icon: 'info',
                            title: '<strong>Apakah Data Permohonan Ini Sudah Diproses Di Core Banking System ? </strong>',
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
                                    url: '<?= BASEURL . '/cs_funding/update' ?>',
                                    data: {
                                        'id_permohonan': id_permohonan,
                                        'nama_nasabah': nama_nasabah
                                    },
                                    success: function(res) {
                                        var a = res.trim()
                                        if (res.trim() == 'sukses') {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Data Telah Diproses',
                                                showConfirmButton: false,
                                                timer: 1500
                                            }).then((result) => {
                                                window.location.href = "<?= BASEURL; ?>/cs_funding/pencairan_sebelum_jatuh_tempo";
                                            })
                                        } else if (res.trim() == 'gagal') {
                                            Swal.fire({
                                                icon: 'info',
                                                title: 'Data Gagal Diproses',
                                                showConfirmButton: false,
                                                timer: 1500
                                            })
                                        }
                                        console.log(res.trim())
                                    }
                                })
                            } else {

                            }
                        })

                    } else {
                        alert('erorr kode 001')
                    }
                }
            })
        })
    </script>


    <script>
        $(function() {
            $("#example1").DataTable({

            })

            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>













    <script>
        $(document).ready(function() {
            $('#detail_all').on('show.bs.modal', function(e) {
                var id = $(e.relatedTarget).data('id')
                $.ajax({
                    type: 'post',
                    url: '<?= BASEURL . '/modal/modal_detail_all' ?>',
                    data: 'no_permohonan_kredit=' + id,
                    success: function(data) {
                        $('.data_modal').html(data)
                        $('.tabel_slik_pemohon').DataTable({
                            // "processing": true,
                            // "paging": true,
                        });

                        $('.tabel_slik_pasangan').DataTable({
                            // "processing": true,
                            // "paging": true,
                        });

                        // $('#modal_proses_komite').modal();
                    }
                })
            })
        })
    </script>


    <!-- Btn modal log -->
    <script>
        $(document).ready(function() {
            $('#modal_log').on('show.bs.modal', function(e) {
                var no_permohonan_kredit = $(e.relatedTarget).data('no_permohonan_kredit')

                $.ajax({
                    type: 'post',
                    url: '<?= BASEURL . '/cs/modal_log_cs' ?>',
                    data: {
                        // username_komite: "<?= $_COOKIE['username'] ?>",
                        'no_permohonan_kredit': no_permohonan_kredit
                    },
                    success: function(res) {
                        $('#data_modal_log').html(res)
                        // $('#modal_log').DataTable();
                        $('.example1_log').DataTable({
                            // "processing": true,
                            // "paging": true,
                        });
                        $("#modal_log").modal('show')

                    }
                })
            })
        })
    </script>


    <script>
        $(document).ready(function() {
            $('#riwayat').on('show.bs.modal', function(e) {
                var id = $(e.relatedTarget).data('no_ktp_pemohon')
                $.ajax({
                    type: 'post',
                    url: '<?= BASEURL . '/cs/modal_riwayat' ?>',
                    data: {
                        'id': id
                    },
                    success: function(res) {
                        console.log(res)
                        $('.m_riwayat').html(res)
                        $('.example1').DataTable({});
                        $("#riwayat").modal('show')

                    },
                    error: function(e) {
                        console.log(e)
                    }
                })
            })
        })
    </script>





    <script>
        $("#form_cs_edit_data_kredit_lama").on('submit', function(e, params) {
            var localParams = params || {};

            if (!localParams.send) {
                e.preventDefault();
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
                    Swal.fire(
                        'Data berhasil disimpan',
                        '',
                        'success'
                    ).then((ok) => {
                        $("#form_cs_edit_data_kredit_lama").off("submit").submit();
                    })
                }
            })
        })

        function btn_batal_input_kredit_lama(ev) {
            var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
            console.log(urlToRedirect); // verify if this is the right URL
            Swal.fire({
                title: "Yakin batal input?",
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
        function reset_user(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
            console.log(urlToRedirect); // verify if this is the right URL



            Swal.fire(
                'Password berhasil direset',
                '',
                'success'
            ).then((result) => {
                window.location.href = urlToRedirect;
            })


        }

        function delete_user(ev) {

            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
            console.log(urlToRedirect); // verify if this is the right URL
            Swal.fire({
                title: "Anda yakin hapus??",
                // icon: 'success',
                showCancelButton: true,
                confirmButtonText: "Ya",
                cancelButtonText: "Batal",
                confirmButtonColor: "#3EC59D",
                cancelButtonColor: "#BB2D3B",

                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.isConfirmed) {

                    Swal.fire(
                        'Data berhasil dihapus',
                        '',
                        'success'
                    ).then((result) => {
                        window.location.href = urlToRedirect;
                    })
                } else {

                }
            })
        }


        function delete_cabang(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
            console.log(urlToRedirect); // verify if this is the right URL

            Swal.fire({
                title: "Anda yakin hapus??",
                // icon: 'success',
                showCancelButton: true,
                confirmButtonText: "Ya",
                cancelButtonText: "Batal",
                confirmButtonColor: "#3EC59D",
                cancelButtonColor: "#BB2D3B",

                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.isConfirmed) {

                    Swal.fire(
                        'Data berhasil dihapus',
                        '',
                        'success'
                    ).then((result) => {
                        window.location.href = urlToRedirect;
                    })
                } else {

                }
            })

        }
    </script>

    <!-- Permohonan Kredit -->

    <!-- simpan data cs -->
    <script>
        function btn_batal_update_kredit(ev) {
            var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
            console.log(urlToRedirect); // verify if this is the right URL
            Swal.fire({
                title: "Yakin batal edit?",
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

        function btn_batal_input_kredit(ev) {
            var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
            console.log(urlToRedirect); // verify if this is the right URL
            Swal.fire({
                title: "Yakin batal input?",
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



        function delete_data_kredit(ev) {

            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
            console.log(urlToRedirect); // verify if this is the right URL
            Swal.fire({
                title: "Yakin ingin hapus?",
                // icon: 'success',
                showCancelButton: true,
                confirmButtonText: "Ya",
                cancelButtonText: "Batal",
                confirmButtonColor: "#3EC59D",
                cancelButtonColor: "#BB2D3B",

                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.isConfirmed) {

                    Swal.fire(
                        'Data berhasil dihapus',
                        '',
                        'success'
                    ).then((result) => {
                        window.location.href = urlToRedirect;
                    })
                } else {

                }
            })
        }




        $("#btn_update_kredit").on('click', function(e) {
            e.preventDefault();

            Swal.fire({
                title: "Yakin data sudah benar?",
                // icon: 'success',
                showCancelButton: true,
                confirmButtonText: "Ya",
                cancelButtonText: "Batal",
                confirmButtonColor: "#3EC59D",
                cancelButtonColor: "#BB2D3B",

                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.isConfirmed) {

                    Swal.fire(
                        'Data berhasil diupdate',
                        '',
                        'success'
                    ).then((result) => {
                        // window.location.href = urlToRedirect;

                        $('#form_update').submit();
                    })

                } else {

                }
            })


        })



        $("#form_cs_simpan_data_kredit").on('submit', function(e, params) {
            var localParams = params || {};

            if (!localParams.send) {
                e.preventDefault();
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
                    Swal.fire(
                        'Data berhasil disimpan',
                        '',
                        'success'
                    ).then((ok) => {
                        $("#form_cs_simpan_data_kredit").off("submit").submit();
                    })
                }
            })
        })


        $("#form_funding_edit_data_suku_bunga").on('submit', function(e, params) {
            var localParams = params || {};

            if (!localParams.send) {
                e.preventDefault();
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
                    Swal.fire(
                        'Data berhasil diupdate',
                        '',
                        'success'
                    ).then((ok) => {
                        $("#form_cs_edit_data_kredit").off("submit").submit();
                    })
                }
            })
        })
    </script>



    <!-- Handel modal  -->

    <!-- Detail permohonan Pencairan -->
    <script>
        $(document).on('click', '#btn_modal_detail', function(event) {
            var id_permohonan = $(this).data('id_permohonan')

            $.ajax({
                type: 'post',
                url: '<?= BASEURL . '/cs_funding/modal_detail_pencairan' ?>',
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









    <script>

    </script>







</body>

</html>