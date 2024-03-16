<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengelolaan Data Nasabah Priority</title>

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
    <style>
        .content-header {
            padding-bottom: 0;
            /* Tambahkan padding hanya di bagian bawah */
        }
    </style>

</head>



<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">




        <!-- Navbar -->
        <?php $this->view('funding/navbar') ?>
        <!-- Navbar -->


        <!-- Side Bar -->
        <?php $this->view('funding/side_bar') ?>
        <!-- Side Bar -->



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Data Nasabah Priority</h1>
                        </div>
                        <div class="col-sm-6">
                            <!-- <div class="clearfix mb-2"> -->
                            <button type="button" class="btn btn-primary float-right modal-xl" data-target="#modal" data-toggle="modal"><i class="fas fa-plus"></i> Tambah Data</button>
                            <!-- </div> -->
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
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
        <!-- footer -->
        <?php $this->view('funding/footer') ?>
        <!-- footer -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->








    <!-- Modal Input-->
    <div class="modal fade" id="modal">
        <div class="modal-dialog modal-dialog-centered modal-l">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="form_tambah_data">
                    <div class="modal-body">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <!-- <label>Nama Cabang</label>
                                            <select class="form-control" id="nama_cabang" name="nama_cabang" required>
                                                <option value="" disabled selected>- Silahkan Pilih -</option>
                                                <?php
                                                foreach ($data['cabang'] as $i) :
                                                ?>
                                                    <option value="<?= $i['nama_cabang'] ?>"><?= $i['kode_cabang'] . ' - ' . $i['nama_cabang'] ?></option>
                                                <?php endforeach; ?>
                                            </select> -->

                                            <label class="col-form-label">Jenis Kartu Identitas<span class="ml-1" style="color:red;">*</span></label>
                                            <select name="jenis_kartu_identitas" class="form-control" id="jenis_kartu_identitas" onchange="showIdentitasLainnya(this)" required>
                                                <option value="" disabled selected>- SILAHKAN PILIH -</option>
                                                <option value="KTP" id="KTP"> KTP </option>
                                                <option value="LAINNYA"> LAINNYA </option>
                                            </select>
                                            <div class="form-group" style="display:none" id="hidden_identitas_lain">
                                                <label class="col-form-label">Kartu Identitas Lainnya <span class="ml-1" style="color:red;">*</span></label>
                                                <input type="text" class="form-control" id="identitas_lain" name="identitas_lain" placeholder="ex: AKTA KELAHIRAN" oninput="hanyaHuruf(event);this.value = this.value.toUpperCase()">
                                                <label class="col-form-label">Nomor Kartu Identitas Lainnya<span class="ml-1" style="color:red;">*</span></label><span style="font-style: italic; margin-left: 5px; font-size: 8px; color: green;">(Nomor Identitas yang terdaftar di CBS)</span></label>
                                                <input type="text" class="form-control" id="nomor_identitas_lain" name="nomor_identitas_lain" oninput="this.value = this.value.toUpperCase()" maxlength="25">
                                            </div>

                                            <div class="form-group" style="display:none" id="hidden_nomor_ktp">
                                                <label class="col-form-label">Nomor KTP</label><span class="ml-1" style="color:red;">*</span>
                                                <input type="text" class="form-control" id="nomor_ktp" name="nomor_ktp" oninput="hanyaAngka(event); validateKTP(event)" maxlength="16">
                                                <span id="ktpWarning" style="color:red; display:none;">Nomor KTP harus terdiri dari 16 digit !</span>
                                            </div>
                                            <label>CIF</label><span class="ml-1" style="color:red;">*</span>
                                            <input type="text" class="form-control" id="cif" name="cif" oninput="hanyaAngka(event)" required>
                                            <label>Nama Deposan</label><span class="ml-1" style="color:red;">*</span>
                                            <input type="text" class="form-control" id="nama_deposan" name="nama_deposan" oninput="hanyaHuruf(event);this.value = this.value.toUpperCase()" required>
                                            <label>Nominal Deposito</label><span class="ml-1" style="color:red;"></span>
                                            <input type="text" class="form-control" id="nominal_deposito" name="nominal_deposito" oninput="hanyaAngka(event); tandaPemisahTitik(this)">
                                            <label>Akumulasi Deposito Keluarga</label><span class="ml-1" style="color:red;"></span>
                                            <input type="text" class="form-control" id="akumulasi_deposito" name="akumulasi_deposito" oninput="hanyaAngka(event); tandaPemisahTitik(this)">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-lg btn_simpan ml-2 mr-2">Simpan</button>
                                        <button type="submit" class="btn btn-secondary btn-lg btn_batal" data-dismiss="modal">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showIdentitasLainnya(select) {
            var identitas_lain = document.getElementById("identitas_lain");
            var nomor_identitas_lain = document.getElementById("nomor_identitas_lain");
            var nomor_ktp = document.getElementById("nomor_ktp");
            if (select.value === 'LAINNYA') {
                document.getElementById('hidden_identitas_lain').style.display = "block";
                document.getElementById('hidden_nomor_ktp').style.display = "none";
                identitas_lain.setAttribute('required', 'true');
                nomor_identitas_lain.setAttribute('required', 'true');
                nomor_ktp.removeAttribute('required'); // Menghapus atribut required dari nomor_ktp

            } else if (select.value === 'KTP') {
                document.getElementById('hidden_identitas_lain').style.display = "none";
                document.getElementById('hidden_nomor_ktp').style.display = "block";
                nomor_ktp.setAttribute('required', 'true');
                nomor_identitas_lain.removeAttribute('required'); // Menghapus atribut required dari nomor_identitas_lain
            }
        }
    </script>





    <!-- modal edit -->
    <div class="modal fade" id="modalEdit">
        <div class="modal-dialog modal-dialog-centered modal-l">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Nasabah</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="form_update_data">
                    <div class="modal-body">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Nomor Identitas</label>
                                            <input type="text" class="form-control" id="nomor_identitas" name="nomor_identitas" oninput="hanyaAngka(event); validateKTP(event)" required maxlength="16" disabled>
                                            <input type="hidden" class="form-control" id="nomor_identitas_hidden" name="nomor_identitas" >
                                            <span id="ktpWarning" style="color:red; display:none;">Nomor KTP harus terdiri dari 16 digit !</span>
                                            <label>Nama Cabang</label>
                                            <select class="form-control" id="nama_cabang" name="nama_cabang" style="pointer-events: none;">
                                                <option value="" disabled selected>- Silahkan Pilih -</option>
                                                <?php
                                                foreach ($data['cabang'] as $i) :
                                                ?>
                                                    <option value="<?= $i['nama_cabang'] ?>"><?= $i['kode_cabang'] . ' - ' . $i['nama_cabang'] ?></option>
                                                <?php endforeach; ?>
                                            </select>

                                            <label>CIF</label>
                                            <input type="text" class="form-control" id="cif" name="cif" oninput="hanyaAngka(event)" required>
                                            <label>Nama Deposan</label>
                                            <input type="text" class="form-control" id="nama_deposan" name="nama_deposan" oninput="hanyaHuruf(event);this.value = this.value.toUpperCase()" required>
                                            <label>Nominal Deposito</label>
                                            <input type="text" class="form-control" id="nominal_deposito" name="nominal_deposito" oninput="hanyaAngka(event); tandaPemisahTitik(this)">
                                            <label>Akumulasi Deposito Keluarga</label>
                                            <input type="text" class="form-control" id="akumulasi_deposito" name="akumulasi_deposito" oninput="hanyaAngka(event); tandaPemisahTitik(this)">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-lg btn_update ml-2 mr-2">Update</button>
                                        <button type="submit" class="btn btn-secondary btn-lg btn_batal" data-dismiss="modal">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
        function validateKTP(event) {
            let input = event.target.value;
            let warning = document.getElementById("ktpWarning");

            if (input.length < 16) {
                warning.style.display = "block";
            } else {
                warning.style.display = "none";
            }
        }
    </script>

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
        function hanyaAngka(evt) {
            var input = evt.target.value;
            var formattedInput = input.replace(/[^\d.]/g, ''); // Hanya membiarkan angka dan titik

            if (input !== formattedInput) {
                evt.target.value = formattedInput; // Mengganti nilai input dengan yang divalidasi
                alert("Inputan hanya boleh angka");
            }
        }

        function tandaPemisahTitik(input) {
            var num = input.value.replace(/\./g, ''); // Menghilangkan tanda pemisah titik
            var formattedNum = addThousandSeparator(num); // Panggil fungsi addThousandSeparator

            input.value = formattedNum; // Menetapkan nilai input yang diformat
        }

        // Fungsi untuk menambahkan tanda titik sebagai pemisah ribuan
        function addThousandSeparator(num) {
            var parts = num.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            return parts.join(".");
        }

        function hanyaHuruf(evt) {
            var input = evt.target.value;
            var formattedInput = input.replace(/[^A-Za-z\s]/g, ''); // Hanya membiarkan huruf dan spasi

            if (input !== formattedInput) {
                evt.target.value = formattedInput; // Mengganti nilai input dengan yang divalidasi
                alert("Inputan hanya boleh huruf");
            }
        }
    </script>






    <!-- load tabel ketika halaman ini di buka -->
    <script>
        $(document).ready(function() {
            load_halaman()
        })
    </script>

    <!-- button simpan -->

    <script>
        var btn_simpan = $('.btn_simpan');
        var form = $('#form_tambah_data');
        var data_table = $('.data_tabel');
        // form.on('submit', function(e) {
        //     e.preventDefault();


        //     Swal.fire({
        //         title: "Yakin data sudah benar?",
        //         // icon: 'success',
        //         showCancelButton: true,
        //         confirmButtonText: "Ya",
        //         cancelButtonText: "Tidak",
        //         confirmButtonColor: "#3EC59D",
        //         cancelButtonColor: "#BB2D3B",

        //         showLoaderOnConfirm: true,
        //     }).then((result) => {
        //         if (result.isConfirmed) {

        //             var data_form = $('#form_tambah_data').serialize();
        //             $.ajax({
        //                 type: 'post',
        //                 url: '<?= BASEURL . '/funding/simpan_data_nasabah' ?>',
        //                 data: data_form,
        //                 success: function(res) {
        //                     console.log(res);

        //                     if (res == 'sukses') {
        //                         $('#modal').modal('hide').delay(500).fadeOut(1000);

        //                         toastr.success('Berhasi simpan')
        //                         load_halaman();
        //                     } else if (res == 'gagal') {
        //                         toastr.danger('Gagal simpan')
        //                     }
        //                 }
        //             })


        //             $('#no_ktp').val('');
        //             $('#nama_deposan').val('');
        //             $('#cif').val('');
        //             $('#nominal_deposito').val('');
        //             $('#akumulasi_deposito').val('');

        //         } else {

        //         }
        //     })

        // })
        form.on('submit', function(e) {
            e.preventDefault();

            if ($('#jenis_kartu_identitas').val() == 'KTP') {
                var nomor_identitas = $('#nomor_ktp').val();
            } else {
                var nomor_identitas = $('#nomor_identitas_lain').val();
            }

            // Mendapatkan nomor KTP dari input


            // Lakukan pengecekan nomor KTP di database dengan AJAX
            $.ajax({
                type: 'post',
                url: '<?= BASEURL . '/funding/cek_ktp' ?>',
                data: {
                    nomor_identitas: nomor_identitas
                },
                success: function(response) {
                    if (response === 'ada') {
                        // Jika nomor KTP sudah ada, tampilkan pesan kesalahan
                        Swal.fire({
                            title: "Nomor KTP sudah terdaftar!",
                            icon: 'error',
                            confirmButtonText: "OK",
                            confirmButtonColor: "#3EC59D",
                        });
                    } else {
                        // Jika nomor KTP belum ada, lanjutkan dengan proses penyimpanan
                        Swal.fire({
                            title: "Yakin data sudah benar?",
                            showCancelButton: true,
                            confirmButtonText: "Ya",
                            cancelButtonText: "Tidak",
                            confirmButtonColor: "#3EC59D",
                            cancelButtonColor: "#BB2D3B",
                            showLoaderOnConfirm: true,
                        }).then((result) => {
                            if (result.isConfirmed) {

                                var data_form = $('#form_tambah_data').serialize();
                                $.ajax({
                                    type: 'post',
                                    url: '<?= BASEURL . '/funding/simpan_data_nasabah' ?>',
                                    data: data_form,
                                    success: function(res) {
                                        console.log(res);

                                        if (res == 'sukses') {
                                            $('#modal').modal('hide').delay(500).fadeOut(1000);

                                            toastr.success('Berhasil simpan')
                                            load_halaman();
                                        } else if (res == 'gagal') {
                                            toastr.danger('Gagal simpan')
                                        }
                                    }
                                });

                                // Kosongkan input setelah proses
                                $('#jenis_kartu_identitas').val('');
                                $('#identitas_lain').val('');
                                $('#nomor_identitas_lain').val('');
                                $('#jenis_kartu_identitas').val('');
                                $('#nama_deposan').val('');
                                $('#cif').val('');
                                $('#nominal_deposito').val('');
                                $('#akumulasi_deposito').val('');

                            } else {
                                // Tidak melakukan apa-apa jika dibatalkan
                            }
                        });
                    }
                }
            });
        });
    </script>

    <!-- update -->
    <script>
        var btn_update = $('.btn_update');
        var form = $('#form_update_data');
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

                    var data_form = $('#form_update_data').serialize();
                    $.ajax({
                        type: 'post',
                        url: '<?= BASEURL . '/funding/update_data_nasabah' ?>',
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

                    // Kosongkan input setelah proses
                    $('#no_ktp').val('');
                    $('#nama_cabang').val('');
                    $('#nama_deposan').val('');
                    $('#cif').val('');
                    $('#nominal_deposito').val('');
                    $('#akumulasi_deposito').val('');

                } else {

                }
            })

        })
    </script>





    <script>
        function load_halaman() {
            $.ajax({
                url: '<?= BASEURL ?>/funding/tampil_tabel',
                type: 'get',
                success: function(data) {
                    $('.data_tabel').html(data);
                }
            });
        }
    </script>
</body>

</html>