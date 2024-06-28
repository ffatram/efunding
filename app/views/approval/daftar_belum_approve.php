<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Belum Approve</title>

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


    <!-- <style>
        .alert-elevate {
            /* border: 2px solid #ffb822;
            box-shadow: 0 0 0 rgba(204, 169, 44, 0.4); */
            /* animation: pulse 1s infinite; */
            animation: animate 1s  infinite;
            
        }

        .alert-elevate {
            color: black;
            font-size: 60px;
        }

        @keyframes animate {
            0% {
                box-shadow: 0 0 0 rgba(204, 169, 44, 0.4);
            }

            40% {
                box-shadow: 0 0 0 50px rgba(255, 26, 67, 0);
            }

            80% {
                box-shadow: 0 0 0 50px rgba(255, 206, 67, 0);
            }

            100% {
                box-shadow: 0 0 0 rgba(255, 206, 67, 0);
            }
        }
    </style> -->




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
                            <h1 class="m-0">Daftar Permohonan</h1>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-end">
                            <!-- filter data berdasarkan periode tertentu -->
                            <!-- <form action="data_permintaan.php" method="get"></form>
                                <div class="row">
                                    <div class="col-auto">
                                        <label class="col-form-label">Periode</label>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <input type="date" class="form-control" name="dari" required>
                                    </div>
                                    <div class="col-auto">
                                        -
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <input type="date" class="form-control" name="ke" required>
                                    </div>
                                    <div class="col-auto">
                                        <a href="<?= BASEURL; ?>/approval/cari_data_permintaan" type="submit" class="btn btn-primary">Cari</a> -->
                            <!-- <button class="btn btn-primary" type="submit">Cari</button>
                                    </div>
                                </div>
                            </form>  -->
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




                            <!-- tabel -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-striped table-hover first display nowrap">
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
                                                        Jenis Permohonan
                                                    </th>
                                                    <th>
                                                        Nama Inputer
                                                    </th>
                                                    <th>
                                                        Jenis Produk
                                                    </th>
                                                    <th>
                                                        Nama Nasabah
                                                    </th>
                                                    <th>
                                                        Alamat
                                                    </th>
                                                    <th>
                                                        Permohonan yang Diajukan
                                                    </th>

                                                    <th>
                                                        Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="">

                                                <?php
                                                if (isset($data['lihat_data'])) {
                                                    $a = 1;

                                                    foreach ($data['lihat_data'] as $row) :
                                                ?>
                                                        <tr>
                                                            <td><?= $a++ ?></td>
                                                            <td><?= $row['id_permohonan'] ?></td>
                                                            <td><?= date('d-m-Y', strtotime($row['tgl_permohonan'])) ?></td>
                                                            <td><?= $row['jenis_permohonan'] ?></td>
                                                            <td><?= $row['username'] ?></td>
                                                            <td><?= $row['jenis_produk'] ?></td>
                                                            <!-- <td><?= $row['nomor_ktp'] ?></td> -->
                                                            <td><?= $row['nama_nasabah'] ?></td>
                                                            <td><?= $row['alamat'] ?></td>
                                                            <?php
                                                            if ($row['jenis_permohonan'] == 'SUKU BUNGA KHUSUS') {
                                                                echo '<td>' . $row['nilai_suku_bunga_pengajuan'] . " %" . '</td>';
                                                            } else {
                                                                echo '<td>' . $row['jenis_permohonan_pencairan_sebelum_jt_pengajuan'] . '</td>';
                                                            }
                                                            ?>
                                                            <td>
                                                                <?php
                                                                $limit_min = $data['view']['limit_min'];
                                                                $limit_max = $data['view']['limit_max'];
                                                                if ($_COOKIE['kd_jabatan'] == 'DIR') {
                                                                    if ($row['jenis_permohonan'] == 'SUKU BUNGA KHUSUS') {
                                                                ?>
                                                                        <a href="<?= BASEURL; ?>/approval/form_approval/<?= $row['id_permohonan'] ?>" class="btn btn-primary">Proses</a>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <a href="<?= BASEURL; ?>/approval/form_approval_pencairan/<?= $row['id_permohonan'] ?>" class="btn btn-primary">Proses</a>
                                                                    <?php
                                                                    }
                                                                } else if ($_COOKIE['kd_jabatan'] == 'BM') {
                                                                    if (($row['jenis_permohonan'] == 'PENCAIRAN SEBELUM JATUH TEMPO' && $row['status_nasabah'] == 'NASABAH PRIORITY')) {
                                                                        $approvalLink = BASEURL . '/approval/form_approval_pencairan/' . $row['id_permohonan'];
                                                                    ?>
                                                                        <a href="<?= $approvalLink; ?>" class="btn btn-primary">Proses</a>
                                                                    <?php
                                                                    } elseif ($row['jenis_permohonan'] == 'SUKU BUNGA KHUSUS' && $row['nilai_suku_bunga_pengajuan'] <= $limit_max) {
                                                                        $specialInterestLink = BASEURL . '/approval/form_approval/' . $row['id_permohonan'];
                                                                    ?>
                                                                        <a href="<?= $specialInterestLink; ?>" class="btn btn-primary">Proses</a>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <a href="<?= BASEURL; ?>/approval/form_rekomendasi_pencairan/<?= $row['id_permohonan'] ?>" class="btn btn-success">Verifikasi</a>
                                                                    <?php
                                                                    }
                                                                } else if ($_COOKIE['kd_jabatan'] == 'AM' || $_COOKIE['kd_jabatan'] == 'BAM') {
                                                                    if ($row['jenis_permohonan'] == 'SUKU BUNGA KHUSUS' && $row['nilai_suku_bunga_pengajuan'] <= $limit_max) {
                                                                    ?>
                                                                        <a href="<?= BASEURL; ?>/approval/form_approval/<?= $row['id_permohonan'] ?>" class="btn btn-primary">Proses</a>
                                                                        <?php
                                                                    } else {
                                                                        if (($row['jenis_permohonan'] == 'PENCAIRAN SEBELUM JATUH TEMPO' && $row['status_nasabah'] != 'NASABAH PRIORITY')) {
                                                                        ?>
                                                                            <a href="<?= BASEURL; ?>/approval/form_rekomendasi_pencairan/<?= $row['id_permohonan'] ?>" class="btn btn-success">Verifikasi</a>
                                                                        <?php
                                                                        } else if (($row['jenis_permohonan'] == 'PENCAIRAN SEBELUM JATUH TEMPO' && $row['status_nasabah'] == 'NASABAH PRIORITY')) {
                                                                        ?>
                                                                            <button class="btn btn-outline-info" id="btn_modal_pencairan" data-id_permohonan="<?= $row['id_permohonan'] ?>">Detail</button>
                                                                        <?php
                                                                        } else if (($row['jenis_permohonan'] == 'SUKU BUNGA KHUSUS' &&  $row['nilai_suku_bunga_pengajuan'] > 6.00)) {
                                                                        ?>
                                                                            <button class="btn btn-outline-info" id="btn_modal_detail" data-id_permohonan="<?= $row['id_permohonan'] ?>">Detail</button>
                                                                        <?php
                                                                        }
                                                                    }
                                                                } else {
                                                                    if ($row['jenis_permohonan'] == 'SUKU BUNGA KHUSUS' && ($row['nilai_suku_bunga_pengajuan'] <= $limit_max)) {
                                                                        ?>
                                                                        <a href="<?= BASEURL; ?>/approval/form_approval/<?= $row['id_permohonan'] ?>" class="btn btn-primary">Proses</a>
                                                                        <?php
                                                                    } else {
                                                                        if (($row['jenis_permohonan'] == 'PENCAIRAN SEBELUM JATUH TEMPO' && $row['status_nasabah'] != 'NASABAH PRIORITY')) {
                                                                        ?>
                                                                            <a href="<?= BASEURL; ?>/approval/form_rekomendasi_pencairan/<?= $row['id_permohonan'] ?>" class="btn btn-success">Verifikasi</a>
                                                                        <?php
                                                                        } else if (($row['jenis_permohonan'] == 'PENCAIRAN SEBELUM JATUH TEMPO' && $row['status_nasabah'] == 'NASABAH PRIORITY')) {
                                                                        ?>
                                                                            <button class="btn btn-outline-info" id="btn_modal_pencairan" data-id_permohonan="<?= $row['id_permohonan'] ?>">Detail</button>
                                                                        <?php
                                                                        } else if (($row['jenis_permohonan'] == 'SUKU BUNGA KHUSUS' &&  $row['nilai_suku_bunga_pengajuan'] > 5.75)) {
                                                                        ?>
                                                                            <button class="btn btn-outline-info" id="btn_modal_detail" data-id_permohonan="<?= $row['id_permohonan'] ?>">Detail</button>
                                                                <?php
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    endforeach;
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
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
        $(document).on('click', '#btn_modal_detail', function(event) {
            var id_permohonan = $(this).data('id_permohonan')
            $.ajax({
                type: 'post',
                url: '<?= BASEURL . '/approval/modal_suku_bunga' ?>',
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
                url: '<?= BASEURL . '/approval/modal_pencairan' ?>',
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

    <!-- <?php
            function HalamanApproval()
            {
                $jp = $_POST['jenis_permohonan'];
                if ($jp == 'Suku Bunga Khusus') {
                    header("Location: BASEURL . '/approval/form_approval'");
                } else {
                    header("Location: BASEURL . '/approval/form_approval_pencairan'");
                }
            }
            ?>
    </script> -->



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
    </script>
</body>

</html>