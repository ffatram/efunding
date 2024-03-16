<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ubah Password</title>

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
        .blue {
            color: blue;
        }

        .red {
            color: red;

        }
    </style>
</head>

<body class="hold-transition login-page">



    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h2><b>Ubah Password</b></h2>
            </div>
            <div class="card-body">
                <!-- <p class="login-box-msg">Ubah Password</p> -->

                <p class="text-center  pesan"></p>

                <form id="myForm">

                    <input type="hidden" name="username" value="<?= $_COOKIE['username'] ?>">
                    <div class="input-group mb-3">

                        <input type="password" class="form-control password" name="password" placeholder="Masukkan Password Lama" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control password_baru1" name="password_baru1" placeholder="Masukkan Password Baru" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control password_baru2" name="password_baru2" placeholder="Konfirmasi Password Baru" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="social-auth-links text-center mt-2 mb-3">
                        <button type="submit" class="btn btn-block btn-primary">Update Password</button>
                    </div>

                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <div class="row">
            <div class="col">
                <div>
                    <div class="label text-center mt-3">
                        <?php



                        if (isset($_SESSION['login'])) {
                            if ($_SESSION['login'] == 'salah') {
                        ?>
                                <h5><b class='text-red'>Kombinasi password dan username tidak sesuai</b></h5>

                        <?php    }

                            session_destroy();
                        } ?>

                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /.login-box -->

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

    <!-- SweetAlert2 -->
    <script src="<?= BASEURL ?>/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- 
    <script>
        $("#myAlert").fadeTo(2000, 500).slideUp(500, function() {
            $("#myAlert").slideUp(500);
        });
    </script> -->


    <script>
        var myForm = $('#myForm');
        var password_lama = $('.password')
        var password_baru1 = $('.password_baru1')
        var password_baru2 = $('.password_baru2')
        var cek_pass = false;
        var cek_pass_baru = false;
        var password_baru = '';
        var pesan = $('.pesan')
        var isi_pesan1 = "";
        var isi_pesan2 = "";
        var isi_pesan3 = "";


        myForm.on('submit', function(e) {

            e.preventDefault()


            $.ajax({
                type: 'post',
                url: '<?= BASEURL . '/login/cek_ubah_password' ?>',
                data: myForm.serialize(),
                success: function(res) {
                    var hasil = res.trim();

                    if (hasil == "salah") {
                        cek_pass = false;

                    } else {

                        cek_pass = true;
                    }



                    if (password_baru1.val() == password_baru2.val()) {
                        cek_pass_baru = true;
                        password_baru = password_baru1.val();
                    } else {
                        cek_pass_baru = false;
                        password_baru = "Belum sesuai";
                    }




                    if (cek_pass && cek_pass_baru) {
                        // pesan.removeClass("red")
                        // pesan.addClass("blue")
                        // isi_pesan1 = "Password lama sesuai dan Password baru  match"
                        // console.log(password_baru);
                        ubah_password();


                    } else {
                        pesan.removeClass("blue")
                        pesan.addClass("red")
                        isi_pesan1 = ""
                    }



                    if (!cek_pass) {
                        pesan.removeClass("blue")
                        pesan.addClass("red")
                        isi_pesan2 = "Password lama tidak sesuai"
                    } else {
                        isi_pesan2 = ""
                    }

                    if (!cek_pass_baru) {
                        pesan.removeClass("blue")
                        pesan.addClass("red")
                        isi_pesan3 = "Password baru tidak match"
                    } else {
                        isi_pesan3 = ""
                    }


                    pesan.html((isi_pesan1 + " " + isi_pesan2 + " " + isi_pesan3).toUpperCase());


                }
            })
        })
    </script>


    <script>
        function ubah_password() {
            $.ajax({
                type: 'post',
                url: '<?= BASEURL . '/login/set_ubah_password' ?>',
                data: myForm.serialize(),
                success: function(res) {

                    $('.login-box').hide()


                    Swal.fire({
                        icon: 'success',
                        title: 'Password anda berhasil diubah',
                        text: 'Silahkan login kembali',
                        showConfirmButton: true,
                        confirmButtonText: 'OK',

                    }).then((result) => {
                        location.href = "<?= BASEURL ?>/login/log_out";
                    })


                }
            })
        }
    </script>






</body>

</html>