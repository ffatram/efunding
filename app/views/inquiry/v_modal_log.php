<div class="row">
    <div class="col-lg-12">
        <div class="">
            <div class="">

                <div class="table-responsive">
                    <table class="example1_log table table-striped table-hover first display nowrap">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    No Permohonan
                                </th>

                                <th>
                                    Nama Pemohon
                                </th>

                                <th>
                                    User
                                </th>
                                <th>
                                    Update Date
                                </th>
                                <th>
                                    Keterangan
                                </th>


                            </tr>
                        </thead>
                        <tbody class="">
                            <?php $a = 1;



                            foreach ($data['detail'] as $row) : ?>
                                <tr>
                                    <td><?= $a++ ?></td>
                                    <td><?= $row['id_permohonan'] ?></td>
                                    <td><?= $row['nama_pemohon'] ?></td>
                                    <td><?= $row['username'] ?></td>
                                    <td><?= isset($row['update_date']) ? date('d-m-Y H:i:s', strtotime($row['update_date'])) : ''   ?></td>
                                    <td><?= $row['keterangan']  ?></td>


                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>