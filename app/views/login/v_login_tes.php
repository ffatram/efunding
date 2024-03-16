<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOS | LOGIN</title>

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
                <a href="<?= BASEURL ?>" class="h6"><b>LOAN ORIGINATION SYSTEM</b></a>
            </div>
            <div class="card-body">

                <form class="myForm" action="<?= BASEURL ?>/login_tes/cek_login" method="post">
                    <input type="text" name="username" placeholder="username">
                    <input type="password" name="password" placeholder="password">
                    <input type="submit" class='btn_submit' value="Login">
                </form>



            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->




    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= BASEURL ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= BASEURL ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= BASEURL ?>/assets/dist/js/adminlte.min.js"></script>

    <script>
        var myForm = $('.myForm')

        // myForm.on('submit', function(e) {
        //     e.preventDefault()
        //     $.ajax({
        //         type: 'post',
        //         url: '<?= BASEURL . '/login_tes/cek_login' ?>',
        //         data: myForm.serialize(),
        //         success: function(res) {
        //             console.log(res)
        //         }
        //     })
        // })
    </script>


</body>

</html>