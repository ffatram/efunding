<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header" style="background-color: #F4F4F4;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="card-title"><span class="font-weight-bold">Data Pemohon</span></h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <tbody>
                            <tr>
                                <td style="width: 200px;  background-color: #F4F4F4;">Id Permohonan</td>
                                <td><?= $data['detail']['id_permohonan'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Tanggal Permohonan</td>
                                <td><?= date('d F Y', strtotime($data['detail']['tgl_permohonan'])) ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Kantor Cabang</td>
                                <td><?= $data['detail']['kantor_cabang'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Nama Inputer</td>
                                <td><?= $data['detail']['username'] ?></td>
                            <tr>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Jenis Permohonan</td>
                                <td><?= $data['detail']['jenis_permohonan'] ?></td>
                            </tr>
                            <td style="width: 200px; background-color: #F4F4F4; ">Jenis Produk</td>
                            <td><?= $data['detail']['jenis_produk'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Nomor Identitas</td>
                                <td><?= $data['detail']['nomor_identitas'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 00px; background-color: #F4F4F4; ">Nama Nasabah</td>
                                <td><?= $data['detail']['nama_nasabah'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Status Nasabah</td>
                                <td><?= $data['detail']['status_nasabah'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Alamat</td>
                                <td><?= $data['detail']['alamat'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Nomor Telepon</td>
                                <td><?= $data['detail']['nomor_telepon'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Nominal</td>
                                <td><?= "Rp " . number_format($data['detail']['nominal'], 0, ',', '.') ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Alasan Pembatalan</td>
                                <td><?= $data['detail']['alasan_pembatalan'] ?></td>
                            </tr>
                            <?php
                            if ($data['detail']['jenis_produk']  == 'SI MITRA') {
                            ?>
                                <tr>
                                    <?php
                                    echo " <td style='width: 200px; background-color: #F4F4F4; display:none; '>Jangka Waktu</td>";
                                    echo "<td style='display:none;'>" . $data['detail']['jangka_waktu'] . "</td>";
                                    ?>
                                </tr>
                                <!-- <tr>
                                <?php
                                // echo " <td style='width: 200px; background-color: #F4F4F4; display:none; '>Nomor Rekening Deposito</td>";
                                // echo "<td style='display:none;'>" . $data['detail']['nomor_rekening_deposito'] . "</td>";
                                ?>
                            </tr> -->
                            <?php
                            } else {
                            ?>
                                <tr>
                                    <td style="width: 200px; background-color: #F4F4F4; ">Jangka Waktu</td>
                                    <td><?= $data['detail']['jangka_waktu'] ?></td>
                                </tr>
                                <!-- <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Nomor Rekening Deposito</td>
                                <td><?= $data['detail']['nomor_rekening_deposito'] ?></td>
                            </tr> -->
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12">

            <div class="card">
                <div class="card-header" style="background-color: #F4F4F4; ">
                    <h3 class="card-title "> <span class="font-weight-bold">Data Keluarga</span> </h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">CIF Keluarga</td>
                                <td><?= $data['detail']['cif_keluarga'] ?></td>
                            </tr>
                            <td style="width: 200px; background-color: #F4F4F4; ">Nama Keluarga</td>
                            <td><?= $data['detail']['nama_keluarga'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Nomor Telepon Keluarga</td>
                                <td><?= $data['detail']['nomor_telepon_keluarga'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Nilai Akumulasi Simpanan</td>
                                <td><?= "Rp " . number_format($data['detail']['nilai_akumulasi_simpanan'], 0, ',', '.') ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</div><!-- /.container-fluid