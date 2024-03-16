<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>e-Funding | LOGIN</title>

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
</head>

<body class="hold-transition login-page">


    <div class="container">
        <?php Flasher::flash(); ?>
    </div>
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?= BASEURL ?>" class="h6"><b>E-FUNDING HASAMITRA</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                

                <form action="<?= BASEURL ?>/login/cek_login" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username" oninput="this.value = this.value.toUpperCase()" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="far fa-user"></i>

                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="social-auth-links text-center mt-2 mb-3">
                        <button type="submit" class="btn btn-block btn-primary">LOGIN</button>
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
    <!-- Bootstrap 4 -->
    <script src="<?= BASEURL ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= BASEURL ?>/assets/dist/js/adminlte.min.js"></script>

    <script>
        $("#myAlert").fadeTo(2000, 500).slideUp(500, function() {
            $("#myAlert").slideUp(500);
        });
    </script>
</body>

</html>