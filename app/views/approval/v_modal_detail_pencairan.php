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
                                <td style="width: 200px; background-color: #F4F4F4; ">Suku Bunga Deposito</td>
                                <td><?= $data['detail']['suku_bunga_deposito'] . ' %' ?></td>
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
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Keterangan Funding</td>
                                <td><?= $data['detail']['keterangan_funding'] ?></td>
                            </tr>
                            <!-- <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Tanggal Permohonan</td>
                                <td><?= $data['detail']['tgl_permohonan'] ?></td>
                            </tr> -->
                            </tr>
                            <td style="width: 200px; background-color: #F4F4F4; ">Jenis Permohonan Pencairan Sebelum Jatuh Tempo Approval</td>
                            <td><?= $data['detail']['jenis_permohonan_pencairan_sebelum_jt_approval'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Nama Approval</td>
                                <td><?= $data['detail']['username_approval'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Keterangan Approval</td>
                                <td><?= $data['detail']['keterangan_approval'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px; background-color: #F4F4F4; ">Tanggal Approval</td>
                                <td><?= date('d F Y', strtotime($data['detail']['tgl_approval'])) ?></td>
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
                                    <td style='width: 200px; background-color: #F4F4F4; display:none; '>Nama Inputer CBS</td>
                                    <td style='display:none;'><?= $data['detail']['user_cbs'] ?></td>
                                <?php } else { ?>
                                    <td style="width: 200px; background-color: #F4F4F4; ">Nama Inputer CBS</td>
                                    <td><?= nl2br($data['detail']['user_cbs']) ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <?php if (empty($data['detail']['tgl_telah_diproses'])) { ?>
                                    <td style="width: 200px; background-color: #F4F4F4; display:none; ">Tanggal Proses di CBS</td>
                                    <td style='display:none;'><?= $data['detail']['tgl_telah_diproses'] ?></td>
                                <?php } else { ?>
                                    <td style="width: 200px; background-color: #F4F4F4; ">Tanggal Proses di CBS</td>
                                    <td><?= date('d F Y', strtotime($data['detail']['tgl_telah_diproses']))  ?></td>
                                <?php } ?>
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

        <!-- <div class="col-md-12">

        <div class="card">
            <div class="card-header" style="background-color: #F4F4F4; ">
                <h3 class="card-title "> <span class="font-weight-bold">Data Keluarga</span> </h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <td style="width: 200px; background-color: #F4F4F4; ">Nama Keluarga</td>
                        <td><?= $data['detail']['nama_keluarga'] ?></td>
                        </tr>
                        <tr>
                            <td style="width: 200px; background-color: #F4F4F4; ">CIF Keluarga</td>
                            <td><?= $data['detail']['cif_keluarga'] ?></td>
                        </tr>
                        <tr>
                            <td style="width: 200px; background-color: #F4F4F4; ">Nomor Telepon Keluarga</td>
                            <td><?= $data['detail']['nomor_telepon_keluarga'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->
    </div>



</div><!-- /.container-fluid