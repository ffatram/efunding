<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ubah PIN</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/dist/css/adminlte.min.css">
    <!-- icon title -->
    <link rel="icon" href="https://hasamitra.com/favicon.ico" type="image/vnd.microsoft.icon">
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
                <h2> <b>Ubah PIN</b></h2>
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
                        <input type="password" class="form-control password_baru1" name="password_baru1" placeholder="Masukkan PIN Baru" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control password_baru2" name="password_baru2" placeholder="Konfirmasi PIN Baru" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="social-auth-links text-center mt-2 mb-3">
                        <button type="submit" class="btn btn-block btn-primary">Update PIN</button>
                    </div>

                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- <div class="row">
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
        </div> -->


    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= BASEURL ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= BASEURL ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= BASEURL ?>/assets/dist/js/adminlte.min.js"></script>
    <!-- jQuery -->
    <script src="<?= BASEURL ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= BASEURL ?>/assets/plugins/sweetalert2/sweetalert2.min.js"></script>

    <script>
        $("#myAlert").fadeTo(2000, 500).slideUp(500, function() {
            $("#myAlert").slideUp(500);
        });
    </script>


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
                url: '<?= BASEURL . '/login/cek_login_pass_default' ?>',
                data: myForm.serialize(),
                success: function(res) {

                    console.log(res);

                }
            })
        })
    </script>








</body>

</html>