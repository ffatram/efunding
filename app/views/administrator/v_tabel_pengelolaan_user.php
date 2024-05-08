<style>
    tr td {
        padding: 3px !important;
        margin: 0 !important;

    }
</style>


<table id="example1" class="table table-bordered table-striped first display nowrap">
    <thead>
        <?php $header = array('#', 'Username', 'Nama Lengkap', 'Level', 'Tipe Komite', 'Kode Jabatan', 'Kode Cabang', 'Nama Cabang', 'Aksi');  ?>
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
                <td><?= isset($row['username']) ? $row['username'] : '' ?></td>
                <td><?= isset($row['nama_lengkap']) ? $row['nama_lengkap'] : '' ?></td>
                <td><?= isset($row['level']) ? $row['level'] : '' ?></td>
                <td><?= isset($row['tipe_komite']) ? $row['tipe_komite'] : '' ?></td>
                <td><?= isset($row['kd_jabatan']) ? $row['kd_jabatan'] : '' ?></td>
                <td><?= isset($row['kode_cabang']) ? $row['kode_cabang'] : '' ?></td>
                <td><?= isset($row['nama_cabang']) ? $row['nama_cabang'] : '' ?></td>
                <td>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary btn-sm mr-2 edit" data-target="#modalEdit" data-toggle="modal" data-id='<?= $row['id_user'] ?>' data-username='<?= isset($row['username']) ? $row['username'] : '' ?>' data-nama_lengkap='<?= isset($row['nama_lengkap']) ? $row['nama_lengkap'] : '' ?>' data-level='<?= isset($row['level']) ? $row['level'] : '' ?>' data-kd_jabatan='<?= isset($row['kd_jabatan']) ? $row['kd_jabatan'] : '' ?>' data-kode_cabang='<?= isset($row['kode_cabang']) ? $row['kode_cabang'] : '' ?>' data-tipe_komite='<?= isset($row['tipe_komite']) ? $row['tipe_komite'] : '' ?>'>Edit</button>
                        <button class="btn btn-warning btn-sm mr-2 btn_reset_password" username="<?= isset($row['username']) ? $row['username'] : '' ?>" id='<?= $row['id_user'] ?>'  nama_lengkap='<?= $row['nama_lengkap']?>'>Reset Password</button>
                        <button class="btn btn-danger btn-sm btn_hapus" id='<?= $row['id_user'] ?>' nama_lengkap='<?= $row['nama_lengkap']?>'>Hapus</button>
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
        var nama_lengkap = $(this).attr('nama_lengkap');
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
                        username: username,
                        nama_lengkap: nama_lengkap
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
            var id = get.data('id')
            var username = get.data('username')
            var nama_lengkap = get.data('nama_lengkap')
            var level = get.data('level')
            var kode_cabang = get.data('kode_cabang')
            var tipe_komite = get.data('tipe_komite')
            var jabatan = get.data('kd_jabatan')
            var modal = $('#modalEdit');

            modal.find('#id_user').val(id)
            modal.find('#username').val(username)
            modal.find('#nama_lengkap').val(nama_lengkap)
            modal.find('#levelEdit').val(level)
            modal.find('#kode_cabang').val(kode_cabang)
            modal.find('#kd_jabatan').val(jabatan)
            modal.find('#tipe_komite_edit').val(tipe_komite)
            // if(level == 'KOMITE'){
            //     tipe_komite.prop('disabled', false);
            //     tipe_komite.prop('required', true);
            // }
            
        })
    })
</script>



<!-- <script>
    var $level = $('#levelEdit');
    console.log("levelnya adalah : ", $level);
    var tipe_komite = $('#tipe_komite_edit');
    $(document).ready(function() {
        // Cek nilai default saat halaman dimuat
        if ($level.val() !== 'KOMITE') {
            tipe_komite.prop('disabled', true);
        }
        $level.change(function(e) {
            var pilihan = $('#levelEdit option:selected').text();
            var levelValue = $level.val();
            console.log("levelnya adalah : " + levelValue);
            if (pilihan != 'KOMITE') {
                tipe_komite.prop('disabled', true);
                tipe_komite.prop('required', false);
            } else {
                tipe_komite.prop('disabled', false);
                tipe_komite.prop('required', true);
            }
        });
    });
</script> -->

    <script>
        var $level = $('#levelEdit');
        console.log("levelnya adalah : " + $level.val());
        var tipe_komite = $('#tipe_komite_edit');

        $(document).ready(function() {
            if ($level.val() !== 'KOMITE') {
                tipe_komite.prop('disabled', true);
            }

            $level.change(function(e) {
                var levelValue = $level.val();
                if (levelValue !== 'KOMITE') {
                    tipe_komite.prop('disabled', true);
                    tipe_komite.prop('required', false);
                } else {
                    tipe_komite.prop('disabled', false);
                    tipe_komite.prop('required', true);
                }
            });
        });
    </script>



<!-- hapus -->

<script>
    var btn_hapus = $('.btn_hapus');
    $(document).on('click', '.btn_hapus', function() {
        var id_user = $(this).attr('id');
        var nama_lengkap = $(this).attr('nama_lengkap');
        Swal.fire({
            title: "Yakin hapus data?",
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
                    url: '<?= BASEURL . '/administrator/hapus_user' ?>',
                    data: {
                        id_user: id_user,
                        nama_lengkap: nama_lengkap
                    },
                    success: function(res) {
                        console.log(res);
                        if (res == 'sukses') {
                            toastr.success('Berhasi hapus')
                            load_halaman();
                        } else if (res == 'gagal') {
                            toastr.danger('Gagal simpan')
                        }
                    }
                })

            } else {

            }
        })





    })
</script>