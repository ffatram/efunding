<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">



        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <script>
                    function tampilwaktu() {
                        var waktu = new Date();
                        var sh = waktu.getHours() + "";
                        var sm = waktu.getMinutes() + "";
                        var ss = waktu.getSeconds() + "";
                        document.getElementById("clock").innerHTML = (sh.length == 1 ? "0" + sh : sh) + ":" + (sm.length == 1 ? "0" + sm : sm) + ":" + (ss.length == 1 ? "0" + ss : ss);
                    }
                </script>
                <?php
                date_default_timezone_set('Asia/Makassar');
                echo $timestamp = date('l, d-m-y')
                ?>

                <body onload="tampilwaktu();setInterval('tampilwaktu()',1000);">
                    <span id="clock"></span>

                </body>
                <?= $_COOKIE['username'] ?>
                <i class="far fa-user"></i>


                <!-- <span class="badge badge-danger navbar-badge">3</span> -->
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <div class="dropdown-divider"></div>
                <a href="<?= BASEURL ?>/login/log_out" class="dropdown-item dropdown-footer"> LOGOUT<span class="float-right text-muted text-sm">
                        <i class="fas fa-sign-out-alt"></i>
                    </span></a>
            </div>
        </li>


    </ul>
</nav>
<!-- /.navbar -->