<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengelolaan User</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/dist/css/adminlte.min.css">


    <!-- DataTables -->
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


    <script src="<?= BASEURL ?>/assets/plugins/jquery/jquery.min.js"></script>
</head>



<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">




        <!-- Navbar -->
        <?php $this->view('administrator/navbar') ?>
        <!-- Navbar -->

        <!-- Side Bar -->
        <?php $this->view('administrator/side_bar') ?>
        <!-- Side Bar -->



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Pengelolaan User</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">


                    <div class="clearfix mb-2">
                        <button type="button" class="btn btn-primary float-right modal-xl" data-target="#modal" data-toggle="modal"><i class="fas fa-plus"></i> Tambah User</button>

                    </div>
                    <div class=" card">
                        <div class="card-body">
                            <div class="table-responsive  data_tabel">



                            </div>
                        </div>
                    </div>

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php $this->view('administrator/footer') ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->








    <!-- Modal Input-->
    <div class="modal fade" id="modal">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="form_tambah_user">
                    <div class="modal-body">

                        <div class="card card-primary">

                            <!-- /.card-header -->

                            <div class="card-body">


                                <div class="row">

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" id="username" name="username" oninput="this.value = this.value.toUpperCase()" required>
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" oninput="this.value = this.value.toUpperCase()" required>
                                            <label>Cabang</label>
                                            <select class="form-control" id="kode_cabang" name="kode_cabang" required>
                                                <option value="" disabled selected>- Silahkan Pilih -</option>
                                                <?php
                                                foreach ($data['cabang'] as $i) :
                                                ?>
                                                    <option value="<?= $i['kode_cabang'] ?>"><?= $i['kode_cabang'] . ' - ' . $i['nama_cabang'] ?></option>
                                                <?php endforeach; ?>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Level</label>
                                            <select class="form-control" id="level" name="level" required>
                                                <option value="" disabled selected>- Silahkan Pilih -</option>
                                                <?php
                                                foreach ($data['level_user'] as $i) :
                                                ?>
                                                    <option value="<?= $i['level'] ?>"><?= $i['level'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <label>Jabatan</label>
                                            <select class="form-control jabatan" id="kd_jabatan" name="kd_jabatan" required>
                                                <option value="" disabled selected>- Silahkan Pilih -</option>
                                                <?php
                                                foreach ($data['jabatan'] as $i) :
                                                ?>
                                                    <option value="<?= $i['kd_jabatan'] ?>"><?= $i['kd_jabatan'] . ' - ' . $i['nama_jabatan'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <label>Tipe Komite</label>
                                            <select class="form-control tipe_komite" id="tipe_komite" name="tipe_komite" required>
                                                <option value="" disabled selected>- Silahkan Pilih -</option>
                                                <?php
                                                foreach ($data['tipe_komite'] as $i) :
                                                ?>
                                                    <option value="<?= $i['tipe_komite'] ?>"><?= $i['tipe_komite'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-lg btn_simpan ml-2 mr-2">Simpan</button>
                                        <button type="button" class="btn btn-secondary btn-lg btn_batal" data-dismiss="modal">Batal</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                </form>

            </div>

        </div>

        <!-- /.modal-content -->
    </div>





    <!-- modal edit -->
    <div class="modal fade" id="modalEdit">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="form_update_user">
                    <div class="modal-body">

                        <div class="card card-primary">

                            <!-- /.card-header -->
                            <div class="card-body">


                                <div class="row">

                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="hidden" name="id_user" id="id_user">
                                            <label>Username</label>
                                            <input type="text" class="form-control" id="username" name="username" oninput="this.value = this.value.toUpperCase()" required>
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" oninput="this.value = this.value.toUpperCase()" required>
                                            <label>Cabang</label>
                                            <select class="form-control" id="kode_cabang" name="kode_cabang" required>
                                                <option value="" disabled selected>- Silahkan Pilih -</option>
                                                <?php
                                                foreach ($data['cabang'] as $i) :
                                                ?>
                                                    <option value="<?= $i['kode_cabang'] ?>"><?= $i['kode_cabang'] . ' - ' . $i['nama_cabang'] ?></option>
                                                <?php endforeach; ?>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Level</label>
                                            <select class="form-control" id="levelEdit" name="level" required>
                                                <option value="" disabled selected>- Silahkan Pilih -</option>

                                                <?php
                                                foreach ($data['level_user'] as $i) :
                                                ?>
                                                    <option value="<?= $i['level'] ?>"><?= $i['level'] ?></option>
                                                <?php endforeach; ?>
                                            </select>

                                            <label>Jabatan</label>
                                            <select class="form-control" id="kd_jabatan" name="kd_jabatan" required>
                                                <option value="" disabled selected>- Silahkan Pilih -</option>
                                                <?php
                                                foreach ($data['jabatan'] as $i) :
                                                ?>
                                                    <option value="<?= $i['kd_jabatan'] ?>"><?= $i['kd_jabatan'] . ' - ' . $i['nama_jabatan'] ?></option>
                                                <?php endforeach; ?>
                                            </select>

                                            <label>Tipe Komite</label>
                                            <select class="form-control tipe_komite" id="tipe_komite_edit" name="tipe_komite" required>
                                                <option value="" disabled>- Silahkan Pilih -</option>
                                                <?php
                                                foreach ($data['tipe_komite'] as $i) :
                                                ?>
                                                    <option value="<?= $i['tipe_komite'] ?>"><?= $i['tipe_komite'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn_update ml-2 mr-2">Update</button>
                                    <button type="submit" class="btn btn-secondary btn-lg btn_batal" data-dismiss="modal">Batal</button>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </div>








    </div>







    <!-- jQuery -->
    <script src="<?= BASEURL ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= BASEURL ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= BASEURL ?>/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="<?= BASEURL ?>/assets/plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= BASEURL ?>/assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= BASEURL ?>/assets/dist/js/demo.js"></script>
    <!-- Page specific script -->

    <!-- DataTables  & Plugins -->
    <script src="<?= BASEURL ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= BASEURL ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= BASEURL ?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= BASEURL ?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= BASEURL ?>/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>




    <script>
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });


        var hapus = $('.hapus');

        hapus.on('click', function() {
            toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        })


        $('.toastrDefaultInfo').click(function() {
            toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
    </script>



    <script>
        // onkeypress="return hanyaAngka(event)" 
        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;
            return true;
        }
    </script>






    <!-- load tabel ketika halaman ini di buka -->
    <script>
        $(document).ready(function() {
            load_halaman()
        })
    </script>

<script>
    $(document).ready(function() {
    var $level_simpan = $('#level');
    var tipe_komite = $('#tipe_komite');

    $level_simpan.change(function(e) {
        var levelValue = $('#level option:selected').text(); // Mengambil teks dari opsi yang dipilih

        // Output level yang dipilih ke konsol untuk pengecekan
        console.log("Level yang dipilih: " + levelValue);

        if (levelValue !== 'KOMITE') { // Ubah operator menjadi !== untuk membandingkan dengan tipe data yang sama
            tipe_komite.prop('disabled', true);
            tipe_komite.prop('required', false);
        } else {
            tipe_komite.prop('disabled', false);
            tipe_komite.prop('required', true);
        }
    });
});

</script>

    <!-- jika pilihan level adalah komite maka disable inputan  -->
    <!-- <script>
        $level_simpan = $('#level');
        console.log("Level yang dipilih :" .$level_simpan)
        var tipe_komite = $('#tipe_komite')
        $(document).ready(function() {
            $level_simpan.change(function(e) {
                var levelValue = $('#level option:selected').text()
                // var levelValue = $level_simpan.val();
                if (levelValue != 'KOMITE') {
                    tipe_komite.prop('disabled', true)
                    tipe_komite.prop('required', false)
                } else {
                    form_tambah_user
                    tipe_komite.prop('disabled', false)
                    tipe_komite.prop('required', true)
                }
            });
        })
    </script> -->

    <script>
        $level = $('#levelEdit');
        var tipe_komite = $('#tipe_komite_edit')
        $(document).ready(function() {
            $level.change(function(e) {
                var pilihan = $('#levelEdit option:selected').text()

                if (pilihan != 'KOMITE') {
                    tipe_komite.prop('disabled', true)
                    tipe_komite.prop('required', false)
                } else {
                    tipe_komite.prop('disabled', false)
                    tipe_komite.prop('required', true)
                }
            });
        })
    </script>






    <!-- button simpan -->

    <script>
        var btn_simpan = $('.btn_simpan');
        var form = $('#form_tambah_user');
        var data_table = $('.data_tabel');
        form.on('submit', function(e) {
            e.preventDefault();


            Swal.fire({
                title: "Yakin data sudah benar?",
                // icon: 'success',
                showCancelButton: true,
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
                confirmButtonColor: "#3EC59D",
                cancelButtonColor: "#BB2D3B",

                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.isConfirmed) {

                    var data_form = $('#form_tambah_user').serialize();
                    $.ajax({
                        type: 'post',
                        url: '<?= BASEURL . '/administrator/simpan_user' ?>',
                        data: data_form,
                        success: function(res) {
                            console.log(res);

                            if (res == 'sukses') {
                                $('#modal').modal('hide').delay(500).fadeOut(1000);

                                toastr.success('Berhasi simpan')
                                load_halaman();
                            } else if (res == 'gagal') {
                                toastr.danger('Gagal simpan')
                            }
                        }
                    })


                    $('#username').val('');
                    $('#nama_lengkap').val('');
                    $('#level').val('');
                    $('#kode_cabang').val('');
                    $('#kd_jabatan').val('');

                } else {

                }
            })

        })
    </script>

    

    <!-- atur limit menjadi inputan rupiah -->




    <!-- bagian fungsi mengubah angka -->
    <script>
        function angka(angka, prefix) {
            if (parseFloat(angka) >= 0) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    plafond = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    plafond += separator + ribuan.join('.');
                }
                plafond = split[1] != undefined ? plafond + ',' + split[1] : plafond;
                return prefix == undefined ? plafond : (plafond ? plafond : '');
            } else {
                angka = angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                return prefix == undefined ? angka : (angka ? angka : '');
            }
        }
    </script>


    <!-- simpan -->
    <script>
        var limit_direksi_awal = $('.limit_awal');
        var limit_direksi_akhir = $('.limit_akhir')


        limit_direksi_awal.keyup(function() {
            limit_direksi_awal.val(angka(limit_direksi_awal.val()))
        })


        limit_direksi_akhir.keyup(function() {
            limit_direksi_akhir.val(angka(limit_direksi_akhir.val()))
        })
    </script>


    <!-- edit -->

    <script>
        var limit_direksi_awal = $('.limit_awal_edit');
        var limit_direksi_akhir = $('.limit_akhir_edit')


        limit_direksi_awal.keyup(function() {
            limit_direksi_awal.val(angka(limit_direksi_awal.val()))
        })


        limit_direksi_akhir.keyup(function() {
            limit_direksi_akhir.val(angka(limit_direksi_akhir.val()))
        })
    </script>







    <!-- update -->
    <script>
        var btn_update = $('.btn_update');
        var form = $('#form_update_user');
        var data_table = $('.data_tabel');
        form.on('submit', function(e) {
            e.preventDefault();


            Swal.fire({
                title: "Yakin data sudah benar?",
                // icon: 'success',
                showCancelButton: true,
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
                confirmButtonColor: "#3EC59D",
                cancelButtonColor: "#BB2D3B",

                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.isConfirmed) {

                    var data_form = $('#form_update_user').serialize();
                    // var nama_lengkap = $(this).attr('nama_lengkap');
                    $.ajax({
                        type: 'post',
                        url: '<?= BASEURL . '/administrator/update_user' ?>',
                        data: data_form,

                        success: function(res) {
                            console.log(res);

                            if (res == 'sukses') {
                                $('#modalEdit').modal('hide').delay(500).fadeOut(1000);
                                toastr.success('Berhasi Update')
                                load_halaman();
                            } else if (res == 'gagal') {
                                toastr.danger('Gagal Update')
                            }
                        }
                    })

                    $('#username').val('');
                    $('#nama_lengkap').val('');
                    $('#level').val('');
                    $('#kode_cabang').val('');
                    $('#kd_jabatan').val('');


                } else {

                }
            })

        })
    </script>





    <script>
        function load_halaman() {
            $.ajax({
                url: '<?= BASEURL ?>/administrator/tampil_tabel',
                type: 'get',
                success: function(data) {
                    $('.data_tabel').html(data);
                }
            });
        }
    </script>
</body>

</html>