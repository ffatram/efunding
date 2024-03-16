<style>
    tr td {
        padding: 3px !important;
        margin: 0 !important;

    }
</style>


<table id="example1" class="table table-bordered table-striped first display nowrap">
    <thead>
        <?php $header = array('#', 'Kode Jabatan', 'Nama Jabatan','Suku Bunga LPS', 'Max Limit Di Bawah LPS', 'Limit Minimal', 'Limit Maximal', 'Aksi');  ?>
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
                <td><?= $row['kd_jabatan'] ?></td>
                <td><?= $row['nama_jabatan'] ?></td>
                <td><?= $row['suku_bunga_lps'] ?></td>
                <td><?= $row['max_limit_dibawah_lps'] ?></td>
                <td><?= $row['limit_min'] ?></td>
                <td><?= $row['limit_max'] ?></td>
                <td>
                    <div class=" d-flex justify-content-center">
                        <button class="btn btn-primary btn-sm mr-2 edit" data-target="#modalEdit" data-toggle="modal" data-kd_jabatan='<?= $row['kd_jabatan'] ?>' data-nama_jabatan='<?= $row['nama_jabatan'] ?>' data-suku_bunga_lps='<?= $row['suku_bunga_lps'] ?>' data-max_limit_dibawah_lps='<?= $row['max_limit_dibawah_lps'] ?>' data-limit_min='<?= $row['limit_min'] ?>' data-limit_max='<?= $row['limit_max'] ?>' >Edit</button>
                        <button class="btn btn-danger btn-sm btn_hapus" kd_jabatan='<?= $row['kd_jabatan'] ?>'>Hapus</button>
                    </div>
                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>


<script>
    $("#example1").DataTable({})
</script>




<!-- jika button edit di tekan -->
<script>
    $(document).ready(function() {
        $('#modalEdit').on('show.bs.modal', function(e) {
            var get = $(e.relatedTarget)
            var kd_jabatan = get.data('kd_jabatan')
            var nama_jabatan = get.data('nama_jabatan')
            var suku_bunga_lps = get.data('suku_bunga_lps')
            var max_limit_dibawah_lps = get.data('max_limit_dibawah_lps')
            var limit_min = get.data('limit_min')
            var limit_max = get.data('limit_max')


            var modal = $('#modalEdit');

            modal.find('#kd_jabatan').val(kd_jabatan)
            modal.find('#nama_jabatan').val(nama_jabatan)
            modal.find('#suku_bunga_lps').val(suku_bunga_lps)
            modal.find('#max_limit_dibawah_lps').val(max_limit_dibawah_lps)
            modal.find('#limit_min').val(limit_min)
            modal.find('#limit_max').val(limit_max)
            // modal.find('#tipe_komite').val(tipe_komite)
            // modal.find('#tipe_kredit_edit').val(tipe_kredit)
            // modal.find('#limit_direksi_awal').val(limit_direksi_awal)
            // modal.find('#limit_direksi_akhir').val(limit_direksi_akhir)



        })
    })
</script>



<script>
    $level = $('#levelEdit');
    var tipe_komite = $('.tipe_komite')
    var tipe_kredit = $('.tipe_kredit')
    var limit_awal = $('.limit_awal')
    var limit_akhir = $('.limit_akhir')

    $(document).ready(function() {

        $level.change(function(e) {
            var pilihan = $('#levelEdit  option:selected').text()
            if (pilihan != 'KOMITE') {
                tipe_komite.prop('disabled', true)
                tipe_komite.prop('required', false)
                tipe_kredit.prop('disabled', true)
                tipe_kredit.prop('required', false)
                limit_awal.prop('disabled', true)
                limit_awal.prop('required', false)
                limit_akhir.prop('disabled', true)
                limit_akhir.prop('required', false)

            } else {
                tipe_komite.prop('disabled', false)
                tipe_komite.prop('required', true)
                tipe_kredit.prop('disabled', false)
                tipe_kredit.prop('required', true)
                limit_awal.prop('disabled', false)
                limit_awal.prop('required', true)
                limit_akhir.prop('disabled', false)
                limit_akhir.prop('required', true)
            }
        });
    })
</script>


<!-- hapus -->

<script>
    var btn_hapus = $('.btn_hapus');



    $(document).on('click', '.btn_hapus', function() {

        var kd_jabatan = $(this).attr('kd_jabatan');




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

                var data_form = $('#form_tambah_jabatan').serialize();
                $.ajax({
                    type: 'post',
                    url: '<?= BASEURL . '/administrator/hapus_jabatan' ?>',
                    data: {
                       kd_jabatan: kd_jabatan
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