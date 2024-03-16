<style>
    tr td {
        padding: 3px !important;
        margin: 0 !important;

    }
</style>
<style>
    .custom-table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
        /* Menggunakan table-layout: fixed */
    }

    .custom-table th,
    .custom-table td {
        padding: 6px 2px;
        /* Padding umum untuk seluruh sel */
        text-align: left;
        /* border: 1px solid black; */
        word-wrap: break-word;
        /* Memastikan teks panjang bisa dipatah jika melebihi lebar kolom */
    }

    /* Padding di judul kolom pertama */
    .custom-table th:first-child {
        padding-right: 10px;
        /* Atur padding kanan yang lebih besar */
    }

    .align-top {
        vertical-align: top;
        /* Mengatur vertical-align menjadi top */
    }



    .custom-table td {
        padding-bottom: 5px;
        /* Sesuaikan sesuai kebutuhan Anda */
    }

    #swal2-content {
        margin-bottom: 0;
        /* Menghilangkan margin bawaan dari Swal */
    }

    .swal2-actions {
        margin-top: 0;
        /* Menghilangkan margin atas dari tombol */
    }
</style>


<table id="example1" class="table table-bordered table-striped first display nowrap">
    <thead>
        <?php $header = array('#', 'Nama Cabang','Jenis Kartu Identitas', 'Nomor Identitas', 'CIF', 'Nama Deposan', 'Nominal Deposito', 'Akumulasi Deposito Keluarga', 'Status Nasabah', 'Aksi');  ?>
        <tr>
            <?php
            for ($a = 0; $a < count($header); $a++) {
            ?>
                <th><?= $header[$a] ?></th>

            <?php  } ?>

        </tr>
    </thead>
    <tbody>
        <?php
        $a = 1;
        foreach ($data as $row) {
        ?>
            <tr>
                <td><?= $a++ ?></td>
                <td><?= $row['nama_cabang'] ?></td>
                <td><?= $row['jenis_kartu_identitas'] ?></td>
                <td><?= $row['nomor_identitas'] ?></td>
                <td><?= $row['cif'] ?></td>
                <td><?= $row['nama_deposan'] ?></td>
                <td><?= number_format($row['nominal_deposito'], 0, ',', '.')  ?></td>
                <td><?= number_format($row['nilai_akumulasi_deposito'], 0, ',', '.')  ?></td>
                <td><?= $row['status_nasabah'] ?></td>
                <td>
                    <div class=" d-flex justify-content-center">
                        <button class="btn btn-primary btn-sm mr-2 edit" data-target="#modalEdit" data-toggle="modal" data-nomor_identitas='<?= $row['nomor_identitas'] ?>' data-cif='<?= $row['cif'] ?>' data-nama_cabang='<?= $row['nama_cabang'] ?>' data-nama_deposan='<?= $row['nama_deposan'] ?>' data-nominal_deposito='<?= $row['nominal_deposito'] ?>' data-akumulasi_deposito='<?= $row['nilai_akumulasi_deposito'] ?>'>Edit</button>
                        <!-- <button class="btn btn-warning btn-sm mr-2 btn_reset_password" username="<?= $row['username'] ?>" id='<?= $row['id_user'] ?>'>Reset Password</button> -->
                        <button class="btn btn-danger btn-sm btn_hapus" nomor_identitas='<?= $row['nomor_identitas'] ?>' data-nama_deposan='<?= $row['nama_deposan'] ?>'>Hapus</button>
                    </div>
                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>


<script>
    $("#example1").DataTable({})
</script>



<!-- jika btn_reset_password di klik -->
<script>
    var btn_reset_password = $('.btn_reset_password');
    $(document).on('click', '.btn_reset_password', function() {
        var id_user = $(this).attr('id');
        var username = $(this).attr('username');
        Swal.fire({
            title: "Yakin Reset Password Akun Ini?",
            // icon: 'success',
            showCancelButton: true,
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            confirmButtonColor: "#3EC59D",
            cancelButtonColor: "#BB2D3B",
            showLoaderOnConfirm: true,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'post',
                    url: '<?= BASEURL . '/administrator/reset_password' ?>',
                    data: {
                        id_user: id_user,
                        username: username
                    },
                    success: function(res) {
                        console.log(res);

                        if (res.trim() == 'berhasil') {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Password berhasil direset ke Password Default',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            // .then((ok) => {
                            //     location.href = "<?= BASEURL ?>/slik/daftar_sudah_slik";
                            // })
                        }
                    }
                })

            }

        })







    })
</script>



<!-- jika button edit di tekan -->
<script>
    $(document).ready(function() {
        $('#modalEdit').on('show.bs.modal', function(e) {
            var get = $(e.relatedTarget)
            var nomor_identitas = get.data('nomor_identitas')
            var cif = get.data('cif')
            var nama_cabang = get.data('nama_cabang')
            var nama_deposan = get.data('nama_deposan')
            var nominal_deposito = get.data('nominal_deposito').toLocaleString('id-ID')
            var akumulasi_deposito = get.data('akumulasi_deposito').toLocaleString('id-ID')
            // var status_nasabah = get.data('status_nasabah')

           

            var modal = $('#modalEdit');

            modal.find('#nomor_identitas').val(nomor_identitas)
            modal.find('#nomor_identitas_hidden').val(nomor_identitas)
            modal.find('#cif').val(cif)
            modal.find('#nama_cabang').val(nama_cabang)
            modal.find('#nama_deposan').val(nama_deposan)
            modal.find('#nominal_deposito').val(nominal_deposito)
            modal.find('#akumulasi_deposito').val(akumulasi_deposito)
            // modal.find('#status_nasabah').val(status_nasabah)

        })
    })
</script>

<script>
    var btn_hapus = $('.btn_hapus');
    $(document).on('click', '.btn_hapus', function() {
        var nomor_identitas = $(this).attr('nomor_identitas');
        var nama_deposan = $(this).data('nama_deposan')
        Swal.fire({
            title: "Yakin hapus data ini dari list nasabah priority ?",
            html: `
                <div>
                    <table class="custom-table">
                    <tr>
                        <th class="align-top">Nomor Identitas</th>
                             <td>: ${nomor_identitas}</td>
                     </tr>
                     <tr>
                        <th class="align-top">Nama Deposan</th>
                        <td>: ${nama_deposan}</td>
                    </tr>
                     <tr>
                        <th class="align-top">Alasan Data Dihapus Dari List </th>
                        <td>
                           <textarea id="alasan" placeholder="Alasan hapus" style="width: 100%; max-width: 400px; height: 50px;" oninput="this.value = this.value.toUpperCase()"></textarea>
                        </td>
                    </tr>
                     </table>
                 </div>
             `,
            // icon: 'success',
            showCancelButton: true,
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            confirmButtonColor: "#3EC59D",
            cancelButtonColor: "#BB2D3B",
            showLoaderOnConfirm: true,
            preConfirm: () => {
                const alasan = document.getElementById('alasan').value;
                if (!alasan) {
                    Swal.showValidationMessage('Alasan harus diisi!'); // Pesan validasi jika alasan kosong
                }
                return alasan;
            },
        }).then((result) => {
            if (result.isConfirmed) {
                const alasan_hapus = document.getElementById('alasan').value;
                var data_form = $('#form_tambah_user').serialize();
                $.ajax({
                    type: 'post',
                    url: '<?= BASEURL . '/funding/hapus_data_nasabah' ?>',
                    data: {
                        'nomor_identitas': nomor_identitas,
                        'alasan_hapus': alasan_hapus
                    },
                    success: function(res) {
                        console.log(res);
                        if (res == 'sukses') {
                            toastr.success('Berhasi Hapus')
                            load_halaman();
                        } else if (res == 'gagal') {
                            toastr.danger('Gagal Hapus')
                        }
                    }
                })

            } else {

            }
        })
    })
</script>