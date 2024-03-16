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
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Alasan Pengajuan</td>
                                <td><?= $data['detail']['alasan_pengajuan'] ?></td>
                            </tr>
                            <td style="width: 200px; background-color: #F4F4F4; ">Jenis Produk</td>
                            <td><?= $data['detail']['jenis_produk'] ?></td>
                            </tr>
                            </tr>
                            <td style="width: 200px; background-color: #F4F4F4; ">Jenis Permohonan Pencairan Sebelum Jatuh Tempo</td>
                            <td><?= $data['detail']['jenis_permohonan_pencairan_sebelum_jt_pengajuan'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Nomor Identitas</td>
                                <td><?= $data['detail']['nomor_identitas'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Nama Nasabah</td>
                                <td><?= $data['detail']['nama_nasabah'] ?></td>
                            </tr>
                            <tr>
                                <?php if (empty($data['detail']['status_nasabah'])) { ?>
                                    <td style="width: 200px; background-color: #F4F4F4; display:none; ">Status Nasabah</td>
                                    <td style='display:none;'><?= $data['detail']['status_nasabah'] ?></td>
                                <?php } else { ?>
                                    <td style="width: 200px; background-color: #F4F4F4; ">Status Nasabah</td>
                                    <td><?= $data['detail']['status_nasabah'] ?></td>
                                <?php } ?>
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
                                <td style="width: 200px; background-color: #F4F4F4; ">Suku Bunga Deposito</td>
                                <td><?= $data['detail']['suku_bunga_deposito'] . " %" ?></td>
                            </tr>
                            <tr>
                                <?php
                                    if($data['detail']['alasan_pengajuan'] =='SUDAH JATUH TEMPO & DIPERPANJANG'){
                                ?>
                                        <td style="width: 200px; background-color: #F4F4F4; ">Tanggal Perpanjangan</td>
                                <?php
                                    }else{
                                        ?>
                                        <td style="width: 200px; background-color: #F4F4F4; ">Tanggal Pembentukan</td>
                                        <?php
                                    }
                                ?>
                              
                                <td><?= date('d F Y', strtotime($data['detail']['tgl_pembentukan'])) ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Jangka Waktu</td>
                                <td><?= $data['detail']['jangka_waktu'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Nomor Rekening Deposito</td>
                                <td><?= $data['detail']['nomor_rekening_deposito'] ?></td>
                            </tr>

                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Nominal Penalti</td>
                                <td><?= "Rp " . number_format($data['detail']['nominal_penalti'], 0, ',', '.') ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Jumlah Hari</td>
                                <td><?= $data['detail']['jumlah_hari'] . ' Hari' ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Nominal Bunga Berjalan</td>
                                <td><?= "Rp " . number_format($data['detail']['nominal_bunga_berjalan'], 0, ',', '.') ?></td>
                            </tr>
                            <?php if (empty($data['detail']['nomor_rekening_pencairan'])) { ?>
                                <td style='width: 200px; background-color: #F4F4F4; display:none; '>Nomor Rekening Pencairan</td>
                                <td style='display:none;'><?= $data['detail']['nomor_rekening_pencairan'] ?></td>
                            <?php } else { ?>
                                <td style="width: 200px; background-color: #F4F4F4; ">Nomor Rekening Pencairan</td>
                                <td><?= nl2br($data['detail']['nomor_rekening_pencairan']) ?></td>
                            <?php } ?>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Keterangan Funding</td>
                                <td><?= $data['detail']['keterangan_funding'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Alasan Pembatalan</td>
                                <td><?= $data['detail']['alasan_pembatalan'] ?></td>
                            </tr>
                            <tr>
                                <?php if (!empty($data['detail']['nama_gambar'])) : ?>
                                    <td style="width: 200px; background-color: #F4F4F4;">Bilyet</td>
                                    <td>
                                        <?php
                                            $file = $data['detail']['nama_gambar'];                                            
                                            $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
                                            // echo 'URL Lengkap: ' . BASEURL . '/upload/funding/' . $file . '<br>';
                                            if ($fileExtension === 'pdf') {
                                                echo '<a href="' . BASEURL . '/upload/funding/' . $file . '" target="_blank">Lihat File</a>';                                               
                                            } else {
                                                // Jika bukan file PDF, tampilkan sebagai gambar seperti sebelumnya
                                                echo '<a href="' . BASEURL . '/upload/funding/' . $file . '" target="_blank">Lihat File</a>';
                                            }
                                        ?>
                                        <br>
                                        <?= $file ?>
                                    </td>
                                <?php endif; ?>                            
                            </tr>
                            <tr>
                                <?php if (!empty($data['detail']['nama_gambar_bukti'])) : ?>
                                    <td style="width: 200px; background-color: #F4F4F4;">File Bukti Tanda Tangan Nasabah</td>
                                    <td>
                                        <?php
                                        $file = $data['detail']['nama_gambar_bukti'];
                                        $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
                                        // echo 'URL Lengkap: ' . BASEURL . '/upload/funding/' . $file . '<br>';
                                        if ($fileExtension === 'pdf') {
                                            // Jika file adalah PDF, tampilkan menggunakan tag iframe
                                            // echo '<a href="' . BASEURL . '/upload/funding/' . $file . '" download>Buka File Bilyet</a>';
                                            echo '<a href="' . BASEURL . '/upload/funding/bukti/' . $file . '" target="_blank">Lihat File</a>';
                                        } else {
                                            echo '<a href="' . BASEURL . '/upload/funding/bukti/' . $file . '" target="_blank">Lihat File</a>';
                                        }
                                        ?>
                                        <br>
                                        <?= $file ?>
                                    </td>
                                <?php endif; ?>
                            </tr>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Alasan Permohonan Batal</td>
                                <td><?= $data['detail']['alasan_pembatalan'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.container-fluid