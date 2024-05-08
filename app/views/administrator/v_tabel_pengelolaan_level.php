<style>
    tr td {
        padding: 3px !important;
        margin: 0 !important;

    }
</style>


<table id="example1" class="table table-bordered table-striped first display nowrap">
    <thead>
        <?php $header = array('#', 'Level User');  ?>
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
                <td><?= $row['level'] ?></td>
                <!-- <td>
                    <div class=" d-flex justify-content-center">
                        <button class="btn btn-primary btn-sm mr-2 edit" data-target="#modalEdit" data-toggle="modal" data-id='<?= $row['id_user'] ?>' data-username='<?= $row['username'] ?>' data-nama_lengkap='<?= $row['nama_lengkap'] ?>' data-level='<?= $row['level'] ?>' data-kode_cabang='<?= $row['kode_cabang'] ?>' data-tipe_komite='<?= $row['tipe_komite'] ?>' data-tipe_kredit='<?= $row['tipe_kredit'] ?>' data-limit_direksi_awal='<?= $row['limit_direksi_awal'] ?>' data-limit_direksi_akhir='<?= $row['limit_direksi_akhir'] ?>'>Edit</button>

                        <button class="btn btn-danger btn-sm btn_hapus" id='<?= $row['id_user'] ?>'>Hapus</button>
                    </div>
                </td> -->
            </tr>
        <?php } ?>

    </tbody>
</table>


<script>
    $("#example1").DataTable({})
</script>




<!-- hapus -->

<script>
    var btn_hapus = $('.btn_hapus');



    $(document).on('click', '.btn_hapus', function() {

        var id_user = $(this).attr('id');




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

                var data_form = $('#form_tambah_level').serialize();
                $.ajax({
                    type: 'post',
                    url: '<?= BASEURL . '/administrator/hapus_level' ?>',
                    data: {
                        id_user: id_user
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