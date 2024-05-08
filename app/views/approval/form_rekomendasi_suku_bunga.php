<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Rekomendasi</title>

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
                            <h1 class="m-0">Form Rekomendasi</h1>
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




                <form id="form_rekomendasi_suku_bunga" action="<?= BASEURL; ?>/approval/tambah_rekomendasi_suku_bunga" method="POST">
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
                                                    <label class="mt-2 mb-2">Nama Funding</label><span class="ml-1" style="color:red;"></span>
                                                    <input type="text" class="form-control" name="nama_funding" value="<?= $data['data_permohonan']['username'] ?>" disabled />
                                                    <label class="mt-2 mb-2">Jenis Produk</label><span class="ml-1" style="color:red;"></span>
                                                    <input type="text" class="form-control" name="jenis_produk" value="<?= $data['data_permohonan']['jenis_produk'] ?>" disabled />
                                                    <label class="mt-2 mb-2">CIF</label><span class="ml-1" style="color:red;"></span>
                                                    <input type="text" class="form-control" name="nomor_identitas" value="<?= $data['data_permohonan']['nomor_identitas'] ?>" disabled />
                                                    <label class="mt-2 mb-2">Nama Nasabah</label><span class="ml-1" style="color:red;"></span>
                                                    <input type="text" class="form-control" id="nama_nasabah" name="nama_nasabah" value="<?= $data['data_permohonan']['nama_nasabah'] ?>" disabled />
                                                    <label class="mt-2 mb-2">Status Nasabah</label><span class="ml-1" style="color:red;"></span>
                                                    <input type="text" class="form-control" onkeypress="return hanyaHuruf(event)" name="status_nasabah" oninput="this.value = this.value.toUpperCase()" value="<?= $data['data_permohonan']['status_nasabah'] ?>" disabled />
                                                    <label class="mt-2 mb-2">Alamat</label><span class="ml-1" style="color:red;"></span>
                                                    <textarea class="form-control" name="keterangan_approval" oninput="this.value = this.value.toUpperCase()" disabled><?= $data['data_permohonan']['alamat'] ?></textarea>
                                                    <label class="mt-2 mb-2">Nominal</label><span class="ml-1" style="color:red;"></span>
                                                    <input type="text" class="form-control" name="nominal" value="<?= "Rp " . number_format($data['data_permohonan']['nominal'], 0, ',', '.')  ?>" disabled />
                                                    <label class="mt-2 mb-2">Suku Bunga Pengajuan</label><span class="ml-1" style="color:red;"></span>
                                                    <input type="text" class="form-control" name="suku_bunga_pengajuan" id="suku_bunga_pengajuan" value="<?= $data['data_permohonan']['nilai_suku_bunga_pengajuan'] ?>" disabled />
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
                                                <div class="form-group" style="display:none" id="hidden_div">
                                                    <label class="mt-2 mb-2">Jangka Waktu</label><span class="ml-1" style="color:red;"></span>
                                                    <input type="text" class="form-control" name="jangka_waktu" value="<?= $data['data_permohonan']['jangka_waktu'] ?>" disabled />
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" name="suku_bunga_pengajuan" value="<?= $data['data_permohonan']['nilai_suku_bunga_pengajuan'] ?>" />
                                                    <label class="mt-2 mb-2">Nama Keluarga</label><span class="ml-1" style="color:red;"></span>
                                                    <input type="text" class="form-control" name="nama_keluarga" value="<?= $data['data_permohonan']['nama_keluarga'] ?>" disabled />
                                                    <label class="mt-2 mb-2">Nilai Akumulasi Simpanan</label><span class="ml-1" style="color:red;"></span>
                                                    <input type="text" class="form-control" name="nilai_akumulasi_deposito" value="<?= "Rp " . number_format($data['data_permohonan']['nilai_akumulasi_simpanan'], 0, ',', '.')  ?>" disabled />
                                                    <label class="mt-2 mb-2">Keterangan Funding</label><span class="ml-1" style="color:red;"></span>
                                                    <textarea class="form-control" name="keterangan_funding" disabled><?= $data['data_permohonan']['keterangan_funding'] ?></textarea>
                                                   
                                                    <label class="mt-2 mb-2">Rekomendasi Pejabat Cabang</label></span>
                                                    <textarea class="form-control" name="rekomendasi_pejabat_cabang" id="rekomendasi_pejabat_cabang" rows="5" oninput="this.value = this.value.toUpperCase()" required></textarea>
                                                </div>
                                                <button class="btn btn-success btn-lg" type="submit" id="btn_form_rekomendasi_suku_bunga" value="approve" data-id_permohonan="<?= $row['id_permohonan'] ?>">Verifikasi</button>
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


        </form>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2023 <a href="<?= BASEURL ?>">E-FUNDING HASAMITRA</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0
        </div>
    </footer>

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




    <!-- jquery untuk mask tanggal -->
    <script src="<?= BASEURL ?>/assets/plugins/jquery/jquery.mask.min.js"></script>
    <script src="<?= BASEURL ?>/assets/plugins/moment/moment-with-locales.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= BASEURL ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- handlde select  -->
    <script src="<?= BASEURL ?>/assets/plugins/select2/js/select2.full.min.js"></script>

    <script>
        $("#form_rekomendasi_suku_bunga").on('submit', function(e, params) {
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
                        $("#form_rekomendasi_suku_bunga").off("submit").submit();
                    })
                }
            })
        })
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
</body>

</html>