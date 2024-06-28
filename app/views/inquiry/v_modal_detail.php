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

                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Suku Bunga Pengajuan</td>
                                <td><?= $data['detail']['nilai_suku_bunga_pengajuan'] . " %" ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Suku Bunga Counter</td>
                                <td><?= $data['detail']['suku_bunga_counter'] . " %" ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Keterangan Funding</td>
                                <td><?= $data['detail']['keterangan_funding'] ?></td>
                            </tr>

                            <tr>
                                <?php if (empty($data['detail']['rekomendasi_pejabat_cabang'])) { ?>
                                    <td style="width: 200px; background-color: #F4F4F4; display:none; ">Rekomendasi Pejabat Cabang</td>
                                    <td style='display:none;'><?= $data['detail']['rekomendasi_pejabat_cabang'] ?></td>
                                <?php } else { ?>
                                    <td style="width: 200px; background-color: #F4F4F4; ">Rekomendasi Pejabat Cabang</td>
                                    <td><?= $data['detail']['rekomendasi_pejabat_cabang'] ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <?php if (empty($data['detail']['user_verifikator'])) { ?>
                                    <td style="width: 200px; background-color: #F4F4F4; display:none;">Pejabat Pemberi Rekomendasi</td>
                                    <td style='display:none;'></td>
                                <?php } else { ?>
                                    <td style="width: 200px; background-color: #F4F4F4;">Pejabat Pemberi Rekomendasi</td>
                                    <td><?= $data['detail']['user_verifikator'] ?></td>
                                <?php } ?>
                            </tr>

                            <tr>
                                <?php if (empty($data['detail']['nilai_suku_bunga_approval'])) { ?>
                                    <td style="width: 200px; background-color: #F4F4F4; display:none; ">Suku Bunga Approval</td>
                                    <td style='display:none;'><?= $data['detail']['nilai_suku_bunga_pengajuan'] ?></td>
                                <?php } else { ?>
                                    <td style="width: 200px; background-color: #F4F4F4; ">Suku Bunga Approval</td>
                                    <td><?= $data['detail']['nilai_suku_bunga_pengajuan'] . " %" ?></td>
                                <?php } ?>
                            </tr>

                            <tr>
                                <?php if (empty($data['detail']['keterangan_approval'])) { ?>
                                    <td style="width: 200px; background-color: #F4F4F4; display:none; ">Keterangan Approval</td>
                                    <td style='display:none;'><?= $data['detail']['keterangan_approval'] ?></td>
                                <?php } else { ?>
                                    <td style="width: 200px; background-color: #F4F4F4; ">Keterangan Approval</td>
                                    <td><?= $data['detail']['keterangan_approval'] ?></td>
                                <?php } ?>
                            </tr>
                            <tr>

                            </tr>
                            <tr>
                                <?php if (empty($data['detail']['keterangan_approval'])) { ?>
                                    <td style="width: 200px; background-color: #F4F4F4; display:none; ">Nama Approval</td>
                                    <td style='display:none;'><?= $data['detail']['username_approval'] ?></td>
                                <?php } else { ?>
                                    <td style="width: 200px; background-color: #F4F4F4; ">Nama Approval</td>
                                    <td><?= $data['detail']['username_approval'] ?></td>
                                <?php } ?>
                            </tr>


                            <tr>
                                <?php if (empty($data['detail']['keterangan_approval'])) { ?>
                                    <td style="width: 200px; background-color: #F4F4F4; display:none; ">Tanggal Approval</td>
                                    <td style='display:none;'><?= $data['detail']['tgl_approval'] ?></td>
                                <?php } else { ?>
                                    <td style="width: 200px; background-color: #F4F4F4; ">Tanggal Approval</td>
                                    <td><?= date('d F Y', strtotime($data['detail']['tgl_approval'])) ?></td>
                                <?php } ?>

                            </tr>
                            <tr>
                                <?php if (empty($data['detail']['history_permohonan'])) { ?>
                                    <td style='width: 200px; background-color: #F4F4F4; display:none; '>History Permohonan</td>
                                    <td style='display:none;'><?= $data['detail']['history_permohonan'] ?></td>
                                <?php } else { ?>
                                    <td style="width: 200px; background-color: #F4F4F4; ">History Permohonan</td>
                                    <td><?= nl2br($data['detail']['history_permohonan']) ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <?php if (empty($data['detail']['user_cbs'])) { ?>
                                    <td style="width: 200px; background-color: #F4F4F4; display:none; ">Nama Inputer CBS</td>
                                    <td style='display:none;'><?= $data['detail']['user_cbs'] ?></td>
                                <?php } else { ?>
                                    <td style="width: 200px; background-color: #F4F4F4; ">Nama Inputer CBS</td>
                                    <td><?= $data['detail']['user_cbs'] ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <?php if (!empty($data['detail']['bukti_persetujuan_manual'])) : ?>
                                    <td style="width: 200px; background-color: #F4F4F4;">Bukti Persetujuan Manual</td>
                                    <td>
                                        <?php
                                        $file = $data['detail']['bukti_persetujuan_manual'];
                                        $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
                                        // echo 'URL Lengkap: ' . BASEURL . '/upload/funding/' . $file . '<br>';
                                        if ($fileExtension === 'pdf') {
                                            echo '<a href="' . BASEURL . '/upload/funding/bukti/' . $file . '" target="_blank">Lihat File</a>';
                                        } else {
                                            // Jika bukan file PDF, tampilkan sebagai gambar seperti sebelumnya
                                            echo '<a href="' . BASEURL . '/upload/funding/bukti/' . $file . '" target="_blank">Lihat File</a>';
                                        }
                                        ?>
                                        <br>
                                        <?= $file ?>
                                    </td>
                                <?php endif; ?>
                            </tr>

                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Status Permohonan</td>
                                <td>
                                    <?php
                                    // Simpan kondisi dalam variabel
                                    $kondisi = $data['detail']['status_permohonan']; // Ganti dengan kondisi sesuai kebutuhan Anda ("ditolak" atau "disetujui")

                                    // Tentukan kelas CSS sesuai kondisi
                                    if ($kondisi == "DIAJUKAN") {
                                        $buttonClass = "btn btn-danger btn-m active"; // Warna biru untuk status "diajukan"
                                    ?>
                                        <script>
                                            document.getElementById('btn_diajukan').style.display = "block";
                                            document.getElementById('btn_diverifikasi').style.display = "block";
                                            document.getElementById('btn_dipending').style.display = "block";
                                            document.getElementById('btn_diajukan_ulang').style.display = "block";
                                            document.getElementById('btn_disetujui').style.display = "block";
                                            document.getElementById('btn_ditolak').style.display = "block";
                                            document.getElementById('btn_dilanjutkan').style.display = "block";
                                            document.getElementById('btn_telah_diproses').style.display = "block";
                                        </script>
                                    <?php
                                    }elseif ($kondisi == "DIVERIFIKASI") {
                                        $buttonClass7 = "btn btn-danger btn-m active"; // Warna biru untuk status "diajukan"
                                    ?>
                                        <script>
                                            document.getElementById('btn_diajukan').style.display = "block";
                                            document.getElementById('btn_diverifikasi').style.display = "block";
                                            document.getElementById('btn_dipending').style.display = "block";
                                            document.getElementById('btn_diajukan_ulang').style.display = "block";
                                            document.getElementById('btn_disetujui').style.display = "block";
                                            document.getElementById('btn_ditolak').style.display = "block";
                                            document.getElementById('btn_dilanjutkan').style.display = "block";
                                            document.getElementById('btn_telah_diproses').style.display = "block";
                                        </script>
                                    <?php
                                    } elseif ($kondisi == "DIPENDING") {
                                        $buttonClass1 = "btn btn-danger btn-m active";
                                    ?>
                                        <script>
                                            document.getElementById('btn_diajukan').style.display = "block";
                                            document.getElementById('btn_diverifikasi').style.display = "block";
                                            document.getElementById('btn_dipending').style.display = "block";
                                            document.getElementById('btn_diajukan_ulang').style.display = "block";
                                            document.getElementById('btn_disetujui').style.display = "block";
                                            document.getElementById('btn_ditolak').style.display = "block";
                                            document.getElementById('btn_dilanjutkan').style.display = "block";
                                            document.getElementById('btn_telah_diproses').style.display = "block";
                                        </script>
                                    <?php
                                    } elseif ($kondisi == "DIAJUKAN ULANG") {
                                        $buttonClass2 = "btn btn-danger btn-m active";
                                    ?>
                                        <script>
                                            document.getElementById('btn_diajukan').style.display = "block";
                                            document.getElementById('btn_diverifikasi').style.display = "block";
                                            document.getElementById('btn_dipending').style.display = "block";
                                            document.getElementById('btn_diajukan_ulang').style.display = "block";
                                            document.getElementById('btn_disetujui').style.display = "block";
                                            document.getElementById('btn_ditolak').style.display = "block";
                                            document.getElementById('btn_dilanjutkan').style.display = "block";
                                            document.getElementById('btn_telah_diproses').style.display = "block";
                                        </script>
                                    <?php
                                    } elseif ($kondisi == "DISETUJUI") {
                                        $buttonClass3 = "btn btn-danger btn-m active";
                                    ?>
                                        <script>
                                            document.getElementById('btn_diajukan').style.display = "block";
                                            document.getElementById('btn_diverifikasi').style.display = "block";
                                            document.getElementById('btn_dipending').style.display = "block";
                                            document.getElementById('btn_diajukan_ulang').style.display = "block";
                                            document.getElementById('btn_disetujui').style.display = "block";
                                            document.getElementById('btn_ditolak').style.display = "none";
                                            document.getElementById('btn_dilanjutkan').style.display = "block";
                                            document.getElementById('btn_telah_diproses').style.display = "block";
                                        </script>
                                    <?php
                                    } elseif ($kondisi == "DITOLAK") {
                                        $buttonClass4 = "btn btn-danger btn-m active";
                                    ?>
                                        <script>
                                            document.getElementById('btn_diajukan').style.display = "block";
                                            document.getElementById('btn_diverifikasi').style.display = "block";
                                            document.getElementById('btn_dipending').style.display = "block";
                                            document.getElementById('btn_diajukan_ulang').style.display = "block";
                                            document.getElementById('btn_disetujui').style.display = "none";
                                            document.getElementById('btn_ditolak').style.display = "block";
                                            document.getElementById('btn_dilanjutkan').style.display = "none";
                                            document.getElementById('btn_telah_diproses').style.display = "none";
                                        </script>
                                    <?php
                                    } elseif ($kondisi == "DILANJUTKAN") {
                                        $buttonClass5 = "btn btn-danger btn-m active";
                                    ?>
                                        <script>
                                            document.getElementById('btn_diajukan').style.display = "block";
                                            document.getElementById('btn_diverifikasi').style.display = "block";
                                            document.getElementById('btn_dipending').style.display = "block";
                                            document.getElementById('btn_diajukan_ulang').style.display = "block";
                                            document.getElementById('btn_disetujui').style.display = "block";
                                            document.getElementById('btn_ditolak').style.display = "none";
                                            document.getElementById('btn_dilanjutkan').style.display = "block";
                                            document.getElementById('btn_telah_diproses').style.display = "block";
                                        </script>
                                    <?php
                                    } else {
                                        $buttonClass6 = "btn btn-danger btn-m active";

                                    ?>
                                        <script>
                                            document.getElementById('btn_diajukan').style.display = "block";
                                            document.getElementById('btn_diverifikasi').style.display = "block";
                                            document.getElementById('btn_dipending').style.display = "block";
                                            document.getElementById('btn_diajukan_ulang').style.display = "block";
                                            document.getElementById('btn_disetujui').style.display = "block";
                                            document.getElementById('btn_ditolak').style.display = "none";
                                            document.getElementById('btn_dilanjutkan').style.display = "block";
                                            document.getElementById('btn_telah_diproses').style.display = "block";
                                        </script>
                                    <?php
                                    }

                                    ?>
                                    <!-- Tombol HTML dengan kelas yang ditentukan oleh PHP -->
                                    <div class="button-container">
                                        <button id='btn_diajukan' style="display: none; float: left;" class="btn <?php echo $buttonClass; ?>">Diajukan</button>

                                        <button id='btn_diverifikasi' style="display: none; float: left;" class="btn <?php echo $buttonClass7; ?>">Diverifikasi</button>

                                        <button id='btn_dipending' style="display: none; float: left;" class="btn <?php echo $buttonClass1; ?>">Dipending</button>
                                        <button id='btn_diajukan_ulang' style="display: none; float: left;" class="btn <?php echo $buttonClass2; ?>">Diajukan Ulang</button>
                                        <button id='btn_disetujui' style="display: none; float: left;" class="btn <?php echo $buttonClass3; ?>">Disetujui</button>
                                        <button id='btn_ditolak' style="display: none; float: left;" class="btn <?php echo $buttonClass4; ?>">Ditolak</button>
                                        <button id='btn_dilanjutkan' style="display: none; float: left;" class="btn <?php echo $buttonClass5; ?>">Dilanjutkan</button>
                                        <button id='btn_telah_diproses' style="display: none; float: left;" class="btn <?php echo $buttonClass6; ?>">Telah diproses</button>
                                    </div>
                                </td>



                            </tr>
                            <!-- timeline status permohonan -->
                            <!-- <tr>
                            <td colspan="2"> 
                                <button id="toggleButton">Toggle</button>
                                <ul class="timeline" id="timeline">
                                    <li class="li complete">
                                        <div class="timestamp">
                                            <span class="date"><?= $data['detail']['tgl_permohonan'] ?><span>
                                        </div>
                                        <div class="status">
                                            <h6> Diajukan</h6>
                                        </div>
                                    </li>
                                    <li class="li complete">
                                        <div class="timestamp">
                                            <span class="author">PAM Admin</span>
                                            <span class="date">11/15/2014<span>
                                        </div>
                                        <div class="status">
                                            <h6> Disetujui </h6>
                                        </div>
                                    </li>
                                    <li class="li complete">
                                        <div class="timestamp">
                                            <span class="date">11/15/2014<span>
                                        </div>
                                        <div class="status">
                                            <h6> Ditolak </h6>
                                        </div>
                                    </li>
                                    <li class="li">
                                        <div class="timestamp">
                                            <span class="date">TBD<span>
                                        </div>
                                        <div class="status">
                                            <h6> Diajukan Ulang </h6>
                                        </div>
                                    </li>
                                    <li class="li">
                                        <div class="timestamp">
                                            <span class="date">TBD<span>
                                        </div>
                                        <div class="status">
                                            <h6> Dilanjutkan </h6>
                                        </div>
                                    </li>
                                    <li class="li">
                                        <div class="timestamp">
                                            <span class="date">TBD<span>
                                        </div>
                                        <div class="status">
                                            <h6> Telah Diproses </h6>
                                        </div>
                                    </li>
                                </ul>
                            </td>
                        </tr> -->
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