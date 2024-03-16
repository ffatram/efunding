<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pencairan Sebelum Jatuh Tempo</title>

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


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
                            <h3 class="m-0">Form Pencairan Sebelum Jatuh Tempo</h3>
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




                    <form id="form_funding_tambah_bebas_finalty" id="form_update" action="<?= BASEURL ?>/funding/simpan_data_bebas_finalty" method="POST">
                        <main class="content">
                            <div class="container-fluid p-0">
                                <div class="row ">
                                    <div class="col-12 col-lg-6 col-xxl-6 ">
                                        <div class="card flex-fill">
                                            <!-- <div class="card-header">
                                                <h1 class="h4 mb-0"><strong>Bebas Finalty</strong></h1>
                                            </div> -->
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <!-- <input type="hidden" class="form-control" name="no_permohonan_kredit" value="<?= $data['data_kredit']['no_permohonan_kredit'] ?>" /> -->
                                                    <div class="form-group">
                                                        <label class="col-form-label">Kantor Cabang</label>
                                                        <input type="text" class="form-control" name="kantor-cabang" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Nama Funding</label>
                                                        <input type="text" class="form-control" name="nama_funding" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Jenis Produk</label>
                                                        <select name="jenis_produk" class="form-control" onchange="showDiv(this)">
                                                            <option value="" disabled selected>- Silahkan Pilih -</option>
                                                            <option value="Mitra Rencana" id="Mitra Rencana"> Mitra Rencana </option>
                                                            <option value="Si Mitra Bagi Rezeki" id="Si Mitra Bagi Rezeki"> Si Mitra Bagi Rezeki </option>
                                                            <option value="Ariska" id="Ariska"> Ariska </option>
                                                            <option value="Si Deka" id="Si Deka"> Si Deka </option>
                                                            <option value="Si DekO" id="Si DekO"> Si DekO </option>
                                                            <option value="Prima" id="Prima">Prima </option>
                                                            <option value="Golden Age" id="Golden Age">Golden Age </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Jenis Permohonan Pencairan Sebelum Jatuh Tempo</label>
                                                        <select name="jenis_bebas_finalty" class="form-control" onchange="showDiv1(this)">
                                                            <option value="" disabled selected>- Silahkan Pilih -</option>
                                                            <option value="Dikenakan Finalty, Bunga Berjalan Dibayarkan" id="Dikenakan Finalty, Bunga Berjalan Dibayarkan"> Dikenakan Finalty Bunga Berjalan Dibayarkan </option>
                                                            <option value="Dikenakan Finalty, Bunga Berjalan Tidak Dibayarkan" id="Dikenakan Finalty, Bunga Berjalan Tidak Dibayarkan"> Dikenakan Finalty Bunga Berjalan Tidak Dibayarkan </option>
                                                            <option value="Tidak Dikenakan Finalty, Bunga Berjalan Dibayarkan" id="Tidak Dikenakan Finalty, Bunga Berjalan Dibayarkan"> Tidak Dikenakan Finalty Bunga Berjalan Dibayarkan </option>
                                                            <option value="Tidak Dikenakan Finalty, Bunga Berjalan Tidak Dibayarkan" id="Tidak Dikenakan Finalty, Bunga Berjalan Tidak Dibayarkan"> Tidak Dikenakan Finalty Bunga Berjalan Tidak Dibayarkan </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">CIF</label>
                                                        <input type="text" class="form-control" name="cif">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Nama Nasabah</label>
                                                        <input type="text" class="form-control" name="nama_nasabah" onkeypress="return hanyaHuruf(event)">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Status Nasabah</label>
                                                        <select name="status_nasabah" class="form-control">
                                                            <option value="" disabled selected>- Silahkan Pilih -</option>
                                                            <option value="Nasabah Baru"> Nasabah Baru </option>
                                                            <option value="Nasabah Reguler"> Nasabah Reguler </option>
                                                            <option value="Nasabah Loyal"> Nasabah Loyal </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="alamat-text" class="col-form-label">Alamat</label>
                                                        <textarea class="form-control" name="alamat"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Nomor Telepon</label>
                                                        <input type="text" class="form-control" name="nomor_telepon" onkeypress="return hanyaAngka(event)">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Nominal</label>
                                                        <input type="text" class="form-control" name="nominal">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xxl-6 ">
                                        <div class="card flex-fill">
                                            <div class="card-body">

                                                <div class="form-group" style="display:none" id="hidden_div1">
                                                    <label class="col-form-label">Tanggal Pembuatan Deposito</label>
                                                    <input type="date" class="form-control" name="tgl_deposito" required>
                                                    <label class="col-form-label">Jangka Waktu</label>
                                                    <select name="jangka_waktu" class="form-control">
                                                        <option value="" disabled selected>- Silahkan Pilih -</option>
                                                        <option value="1 Bulan" id="satu"> 1 Bulan </option>
                                                        <option value="3 Bulan" id="tiga"> 3 Bulan </option>
                                                        <option value="6 Bulan" id="enam"> 6 Bulan </option>
                                                        <option value="12 Bulan" id="duabelas"> 12 Bulan </option>
                                                        <option value="24 Bulan" id="duaempat"> 24 Bulan </option>
                                                    </select>
                                                    <label class="col-form-label">Nomor Bilyet</label>
                                                    <input type="text" class="form-control" name="nomor_billyet">
                                                    <label class="col-form-label">Nomor Rekening Deposito</label>
                                                    <input type="text" class="form-control" name="rekening_deposito">
                                                </div>
                                                <div class="form-group" style="display:none" id="hidden_div2">
                                                    <label class="col-form-label">Persentase Finalty (%)</label>
                                                    <input type="text" class="form-control" name="persentase finalty">
                                                </div>
                                                <div class="form-group" style="display:none" id="hidden_div">
                                                    <label class="col-form-label">Nominal Finalty</label>
                                                    <input type="text" class="form-control" name="nominal_finalty">
                                                    <label class="col-form-label">Jumlah Hari</label>
                                                    <input type="text" class="form-control" name="jumlah_hari">
                                                    <label class="col-form-label">Nominal Bunga Berjalan</label>
                                                    <input type="text" class="form-control" name="nominal_bunga">
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat-text" class="col-form-label">Keterangan Funding</label>
                                                    <textarea class="form-control" name="keterangan_funding" placeholder="ex. Referensi Keluarga"></textarea>
                                                </div>
                                                <div class="form-group" style="display:none" id="hidden_div3">
                                                    <label for="alamat-text" class="col-form-label">Upload Bilyet</label>
                                                    <div class="input-group">
                                                        <div class="custom-file mb-3">
                                                            <input type="file" class="custom-file-input" id="customFile" name="filename">
                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name='tombol' value='btn_simpan_kredit_lama'>
                                                <button id="btn_form_cs_edit_data_kredit" type="submit" name='btn_simpan_kredit_lama' value='btn_simpan_kredit_lama' class="btn btn-primary btn-lg">Simpan</button>
                                                <a onclick="btn_batal_update_kredit(event); return false" href="<?= BASEURL; ?>/funding/form_bebas_finalty" class="btn btn-secondary btn-lg">Batal</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <input type="hidden" name='tombol' value='btn_simpan_kredit_lama'>
                            <button id="btn_form_cs_edit_data_kredit" type="submit" name='btn_simpan_kredit_lama' value='btn_simpan_kredit_lama' class="btn btn-primary btn-lg">Simpan</button>
                            <a onclick="btn_batal_update_kredit(event); return false" href="<?= BASEURL; ?>/funding/form_bebas_finalty" class="btn btn-secondary btn-lg">Batal</a> -->
                        </main>

                    </form>
                    <script>
                        // Add the following code if you want the name of the file appear on select
                        $(".custom-file-input").on("change", function() {
                            var fileName = $(this).val().split("\\").pop();
                            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                        });
                    </script>

                    <!-- <div class="mt-5">
                        ///funding/simpan_data : dari controller
                        <form action="<?= BASEURL ?>/funding/simpan_data" method="POST">

                            <label for="">Nama</label>
                            <input type="text" name="nama" class='form-control' required>
                            <button type="submit" class="btn btn-primary btn-lg">Simpan</button>


                        </form>
                    </div> -->

                    <!-- javascript -->
                    <script type="text/javascript">
                         function showDiv(select) {
                            if (select.value == 'Si Deka' || select.value == 'Si DekO' || select.value == 'Prima' || select.value == 'Golden Age') {
                                document.getElementById('hidden_div1').style.display = "block";
                                document.getElementById('hidden_div3').style.display = "block";
                                document.getElementById('hidden_div2').style.display = "none";
                            } else {
                                document.getElementById('hidden_div1').style.display = "none";
                                document.getElementById('hidden_div3').style.display = "none";
                                document.getElementById('hidden_div2').style.display = "block";
                            }
                        }
                        function showDiv1(select) {
                            if (select.value == 'Dikenakan Finalty, Bunga Berjalan Dibayarkan') {
                                document.getElementById('hidden_div').style.display = "block";
                            } else if (select.value == 'Tidak Dikenakan Finalty, Bunga Berjalan Dibayarkan') {
                                document.getElementById('hidden_div').style.display = "block";
                            } else {
                                document.getElementById('hidden_div').style.display = "none";
                            }
                        }

                       

                        function showDiv2(select) {
                            if (select.value == 'deposito') {
                                document.getElementById('hidden_div3').style.display = "block";
                            } else {
                                document.getElementById('hidden_div3').style.display = "none";
                            }
                        }

                        // function showPembayaran(select) {
                        //     if (select.value == 'transfer') {
                        //         document.getElementById('hidden_div2').style.display = "block";
                        //     } else {
                        //         document.getElementById('hidden_div2').style.display = "none";
                        //     }
                        // }

                        // var select = document.getElementById('jenis_produk'),
                        // onChange = function(event) {
                        //     var shown = this.options[this.selectedIndex].value == 'deposito';

                        //     document.getElementById('hidden_div').style.display = shown ? 'block' : 'none';
                        // };

                        // // attach event handler
                        // if (window.addEventListener) {
                        //     select.addEventListener('change', onChange, false);
                        // } else {
                        //     // of course, IE < 9 needs special treatment
                        //     select.attachEvent('onchange', function() {
                        //         onChange.apply(select, arguments);
                        //     });
                        // }
                    </script>



                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
         <!-- footer -->
    <?php $this->view('inquiry/footer') ?>
        <!-- footer -->

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

    <!-- cek jika terjadi perubahan di kode_instansi -->

    <script>
        var kode_instansi = $('.kode_instansi')
        var nama_instansi = $('.nama_instansi')

        kode_instansi.on('change', function() {
            var instansi = kode_instansi.val().split('##')
            nama_instansi.val(instansi[1])
        })
    </script>




    <!-- daftar nasabah lama -->
    <script>
        $(".modal_no_ktp").modal("show");

        $(".modal_cetak_laporan_cs").modal("show");

        $(".modal_cetak_laporan_cs").modal("show");

        $(document).ready(function() {
            $('#tabel_data_kredit').DataTable({
                "oLanguage": {

                    "sSearch": "Cari Data:",
                    "sShow": "Cari Data:",
                },

                responsive: true,
            });
        });




        $("#form_funding_tambah_bebas_finalty").on('submit', function(e, params) {
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
                    $("#form_funding_tambah_bebas_finalty").off("submit").submit();
                }
            })
        })

        function btn_batal_update_kredit(ev) {
            var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
            console.log(urlToRedirect); // verify if this is the right URL
            Swal.fire({
                title: "Yakin batal simpan?",
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



    <!-- ubah inputan ke dalam bentuk rupiah -->
    <script>
        var plafond = $('.plafond');
        var nilai_jaminan = $('.nilai_jaminan');

        var penghasilan_pemohon = $('.penghasilan_pemohon');
        var penghasilan_pasangan = $('.penghasilan_pasangan');
        var penghasilan_tambahan = $('.penghasilan_tambahan');
        var penghasilan_tambahan_lainnya = $('.penghasilan_tambahan_lainnya');

        var biaya_hidup_perbulan = $('.biaya_hidup_perbulan');
        var biaya_pendidikan = $('.biaya_pendidikan');
        var biaya_pam_listrik_telepon = $('.biaya_pam_listrik_telepon');
        var biaya_transport = $('.biaya_transport');
        var angsuran_bank_lain = $('.angsuran_bank_lain');
        var angsuran_perumahan = $('.angsuran_perumahan');
        var angsuran_kendaraan = $('.angsuran_kendaraan');
        var angsuran_barang_elektronik = $('.angsuran_barang_elektronik');
        var angsuran_koperasi = $('.angsuran_koperasi');
        var biaya_lainnya = $('.biaya_lainnya');


        $(document).ready(function() {
            plafond.val(ubah_input(plafond.val().toString()))
            nilai_jaminan.val(ubah_input(nilai_jaminan.val().toString()))
            penghasilan_pemohon.val(ubah_input(penghasilan_pemohon.val().toString()))
            penghasilan_pasangan.val(ubah_input(penghasilan_pasangan.val().toString()))
            penghasilan_tambahan.val(ubah_input(penghasilan_tambahan.val().toString()))
            penghasilan_tambahan_lainnya.val(ubah_input(penghasilan_tambahan_lainnya.val().toString()))
            biaya_hidup_perbulan.val(ubah_input(biaya_hidup_perbulan.val().toString()))
            biaya_pendidikan.val(ubah_input(biaya_pendidikan.val().toString()))
            biaya_pam_listrik_telepon.val(ubah_input(biaya_pam_listrik_telepon.val().toString()))
            biaya_transport.val(ubah_input(biaya_transport.val().toString()))
            angsuran_bank_lain.val(ubah_input(angsuran_bank_lain.val().toString()))
            angsuran_perumahan.val(ubah_input(angsuran_perumahan.val().toString()))
            angsuran_kendaraan.val(ubah_input(angsuran_kendaraan.val().toString()))
            angsuran_barang_elektronik.val(ubah_input(angsuran_barang_elektronik.val().toString()))
            angsuran_koperasi.val(ubah_input(angsuran_koperasi.val().toString()))
            biaya_lainnya.val(ubah_input(biaya_lainnya.val().toString()))
        })





        plafond.keyup(function() {
            plafond.val(ubah_input(plafond.val().toString()))
        })

        nilai_jaminan.keyup(function() {
            nilai_jaminan.val(ubah_input(nilai_jaminan.val().toString()))
        })

        penghasilan_pemohon.keyup(function() {
            penghasilan_pemohon.val(ubah_input(penghasilan_pemohon.val().toString()))
        })
        penghasilan_pasangan.keyup(function() {
            penghasilan_pasangan.val(ubah_input(penghasilan_pasangan.val().toString()))
        })
        penghasilan_tambahan.keyup(function() {
            penghasilan_tambahan.val(ubah_input(penghasilan_tambahan.val().toString()))
        })
        penghasilan_tambahan_lainnya.keyup(function() {
            penghasilan_tambahan_lainnya.val(ubah_input(penghasilan_tambahan_lainnya.val().toString()))
        })
        biaya_hidup_perbulan.keyup(function() {
            biaya_hidup_perbulan.val(ubah_input(biaya_hidup_perbulan.val().toString()))
        })
        biaya_pendidikan.keyup(function() {
            biaya_pendidikan.val(ubah_input(biaya_pendidikan.val().toString()))
        })
        biaya_pam_listrik_telepon.keyup(function() {
            biaya_pam_listrik_telepon.val(ubah_input(biaya_pam_listrik_telepon.val().toString()))
        })
        biaya_transport.keyup(function() {
            biaya_transport.val(ubah_input(biaya_transport.val().toString()))
        })
        angsuran_bank_lain.keyup(function() {
            angsuran_bank_lain.val(ubah_input(angsuran_bank_lain.val().toString()))
        })
        angsuran_perumahan.keyup(function() {
            angsuran_perumahan.val(ubah_input(angsuran_perumahan.val().toString()))
        })
        angsuran_kendaraan.keyup(function() {
            angsuran_kendaraan.val(ubah_input(angsuran_kendaraan.val().toString()))
        })
        angsuran_barang_elektronik.keyup(function() {
            angsuran_barang_elektronik.val(ubah_input(angsuran_barang_elektronik.val().toString()))
        })
        angsuran_koperasi.keyup(function() {
            angsuran_koperasi.val(ubah_input(angsuran_koperasi.val().toString()))
        })
        biaya_lainnya.keyup(function() {
            biaya_lainnya.val(ubah_input(biaya_lainnya.val().toString()))
        })
    </script>



    <!-- // tambahkan titik jika yang di input sudah menjadi angka ribuan -->
    <script>
        function ubah_input(angka, prefix) {
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



    <script>
        // onkeypress="return hanyaAngka(event)" 
        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;
            return true;
        }
    </script>
</body>

</html>