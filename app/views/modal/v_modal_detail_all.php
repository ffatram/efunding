<?php

$detail = $data['get_tbl_wawancara'];
$data_tbl_komite           = $data['rekomendasi_komite'];
$data_tbl_keputusan_komite           = $data['keputusan_komite'];
$data_tbl_wawancara     = $data['get_tbl_wawancara'];


if (!empty($detail)) {
    for ($a = 1; $a <= 7; $a++) {
        if ($a == 1) {
            $detail['angsuran_kredit_sebelumnya'] = number_format(($detail['angsuran_kredit_sebelumnya'] * 1000), 0, ',', '.');
            $detail['saldo_tabungan_terakhir'] = number_format(($detail['saldo_tabungan_terakhir'] * 1000), 0, ',', '.');
        }
        $detail['angsuran_pemohon_lainnya_' . $a] =  number_format(($detail['angsuran_pemohon_lainnya_' . $a] * 1000), 0, ',', '.');
    }

    for ($a = 1; $a <= 7; $a++) {

        $detail['angsuran_pasangan_lainnya_' . $a] =  number_format(($detail['angsuran_pasangan_lainnya_' . $a] * 1000), 0, ',', '.');
    }


    $detail['kemampuan_membayar_angsuran'] = number_format(($detail['kemampuan_membayar_angsuran'] * 1000), 0, ',', '.');



    for ($a = 1; $a <= 7; $a++) {

        if ($detail['pemohon_lunasi_' . $a] == "0") {
            $angsuran_pemohon[$a] = "<span style='color:red'>" . $detail['angsuran_pemohon_lainnya_' . $a] . "</span>";
            $ket_angsuran_pemohon[$a] = "<span style='color:red'>" . $detail['angsuran_pemohon_lainnya_' . $a . '_ket'] . "-----Dilunasi" . "</span>";
        } else if ($detail['pemohon_lunasi_' . $a] == "1") {


            if ($detail['angsuran_pemohon_lainnya_' . $a . '_ket']  != '') {

                $angsuran_pemohon[$a] = "<span>" . $detail['angsuran_pemohon_lainnya_' . $a] . "</span>";
                $ket_angsuran_pemohon[$a] = "<span>" . $detail['angsuran_pemohon_lainnya_' . $a . '_ket'] . "-----Dilanjutkan" . "</span>";
            }
        } else {
            // $angsuran_pemohon[$a] = "<span>" . $detail['angsuran_pemohon_lainnya_' . $a] . "</span>";
            // $ket_angsuran_pemohon[$a] = "<span>" . $detail['angsuran_pemohon_lainnya_' . $a . '_ket'] . "-----Dilanjutkan" . "</span>";
        }

        if ($detail['pasangan_lunasi_' . $a] == "0") {
            $angsuran_pasangan[$a] = "<span style='color:red'>" . $detail['angsuran_pasangan_lainnya_' . $a] . "</span>";
            $ket_angsuran_pasangan[$a] = "<span style='color:red'>" . $detail['angsuran_pasangan_lainnya_' . $a . '_ket'] . "-----Dilunasi" . "</span>";
        } else if ($detail['pasangan_lunasi_' . $a] == "1") {

            if ($detail['angsuran_pasangan_lainnya_' . $a . '_ket'] != '') {

                $angsuran_pasangan[$a] = "<span>" . $detail['angsuran_pasangan_lainnya_' . $a] . "</span>";
                $ket_angsuran_pasangan[$a] = "<span>" . $detail['angsuran_pasangan_lainnya_' . $a . '_ket'] . "-----Dilanjutkan" . "</span>";
            }
        } else {
            // $angsuran_pasangan[$a] = "<span>" . $detail['angsuran_pasangan_lainnya_' . $a] . "</span>";
            // $ket_angsuran_pasangan[$a] = "<span>" . $detail['angsuran_pasangan_lainnya_' . $a . '_ket'] . "-----Dilanjutkan" . "</span>";
        }
    }



    if ($detail['keterangan_persentase_angsuran'] = "Disarankan" or $detail['keterangan_persentase_angsuran'] = "Dipertimbangkan") {
        $detail['keterangan_persentase_angsuran'] = "<span style='color:blue'>" . $detail['keterangan_persentase_angsuran'] . "</span>";
    } else if ($detail['keterangan_persentase_angsuran'] == "Ditolak" or $detail['keterangan_persentase_angsuran'] = "Kurang Disarankan") {
        $detail['keterangan_persentase_angsuran'] = "<span style='color:red'>" . $detail['keterangan_persentase_angsuran'] . "</span>";
    }


    $kode_golongan_debitur = $data['kode_golongan_debitur'];
    $kode_jenis_penggunaan = $data['kode_jenis_penggunaan'];
    $kode_sektor_ekonomi = $data['kode_sektor_ekonomi'];
    $kode_hubungan_debitur_dengan_bank = $data['kode_hubungan_debitur_dengan_bank'];
}

// for ($a = 1; $a <= 7; $a++) {
//     if ($a == 1) {
//         $detail['angsuran_kredit_sebelumnya'] = number_format(($detail['angsuran_kredit_sebelumnya'] * 1000), 0, ',', '.');
//         $detail['saldo_tabungan_terakhir'] = number_format(($detail['saldo_tabungan_terakhir'] * 1000), 0, ',', '.');
//     }
//     $detail['angsuran_pemohon_lainnya_' . $a] =  number_format(($detail['angsuran_pemohon_lainnya_' . $a] * 1000), 0, ',', '.');
// }

?>





<style>
    .tbl_modal,
    .td_isi {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #dddddd;
    }

    .td_ket {
        border-collapse: collapse;
        border: 1px solid #dddddd;
        background-color: #f4f4f4;
        width: 33%;
    }
</style>


<style>
    #tabel_modal {

        border-collapse: collapse;
        width: 100%;
    }

    #td_tabel_modal_ket {
        border: 1px solid #dddddd;
        background-color: #F4F4F4;
        vertical-align: baseline;
        width: 45%;

    }

    #td_tabel_modal {
        border: 1px solid #dddddd;
        vertical-align: baseline;
    }
</style>


<main class="content">
    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-6">
                <table class="table-hover tbl_modal" cellpadding=5 cellspacing=15 id='tabel_modal'>

                    <tr>
                        <td class="td_ket">No. Permohonan Kredit</td>
                        <td class="td_isi"><?= $data['detail']['no_permohonan_kredit'] ?></td>
                    </tr>
                    <tr>
                        <td class="td_ket">Nama Pemohon</td>
                        <td class="td_isi"><?= $data['detail']['nama_pemohon'] ?></td>
                    </tr>
                    <tr>
                        <td class="td_ket">Instansi</td>
                        <td class="td_isi"><?= $data['detail']['nama_instansi'] ?></td>
                    </tr>
                </table>
            </div>

            <div class="col-6">
                <table class="table-hover tbl_modal" cellpadding=5 cellspacing=15 id='tabel_modal'>

                    <tr>
                        <td class="td_ket">Tipe Kredit</td>
                        <td class="td_isi"><?= $data['detail']['tipe_kredit'] ?></td>
                    </tr>
                    <tr>
                        <td class="td_ket">Jenis Permohonan</td>
                        <td class="td_isi"><?= $data['detail']['jenis_permohonan'] ?></td>
                    </tr>
                    <tr>
                        <td class="td_ket">Cabang</td>
                        <td class="td_isi"><?= $data['detail']['kode_cabang'] . " - " . $data['nama_cabang']['nama_cabang'] ?></td>
                    </tr>
                </table>
            </div>

        </div>


        <!-- <p class="huruf text-primary">halo</p> -->

        <div class="row mt-3">

            <div class="col-12">


                <ul class="nav nav-tabs mt-2 justify-content-center " id="nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="" data-toggle="tab" href="#a">Detail Permohonan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="" data-toggle="tab" href="#b">Detail SLIK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="detail_analisa" data-toggle="tab" href="#c">Detail Analisa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="rekomendasi_komite" data-toggle="tab" href="#d">Rekomendasi Komite</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " id="" data-toggle="tab" href="#e">Keputusan Komite</a>
                    </li>

                </ul>





                <div class="tab-content">
                    <div class="tab-pane" id="a">

                        <div class="row">
                            <div class="col-md-6">

                                <div class="card">
                                    <div class="card-header " style="background-color: #F4F4F4; ">
                                        <h3 class="card-title "> <span class="font-weight-bold">Data Pemohon</span> </h3>
                                    </div>

                                    <div class="card-body p-0">
                                        <table class="table table-bordered table-hover">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 200px;  background-color: #F4F4F4;">No. Permohonan Kredit</td>
                                                    <td><?= $data['detail']['no_permohonan_kredit'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Nama Pemohon</td>
                                                    <td><?= $data['detail']['nama_pemohon'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Tempat Lahir</td>
                                                    <td><?= $data['detail']['tempat_lahir_pemohon'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Tanggal Lahir</td>
                                                    <td><?= isset($data['detail']['tgl_lahir_pemohon']) ? date('d-m-Y', strtotime($data['detail']['tgl_lahir_pemohon'])) : ''   ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Jenis Kelamin</td>
                                                    <td><?= $data['detail']['jenis_kelamin_pemohon'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Nama Ibu</td>
                                                    <td><?= $data['detail']['nama_ibu_kandung_pemohon'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">No. KTP</td>
                                                    <td><?= $data['detail']['no_ktp_pemohon'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">No. NPWP</td>
                                                    <td><?= $data['detail']['npwp_pemohon'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Alamat sesuai KTP</td>
                                                    <td><?= $data['detail']['alamat_ktp_pemohon'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Alamat Sekarang</td>
                                                    <td><?= $data['detail']['alamat_sekarang_pemohon'] ?></td>
                                                </tr>

                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Telepon</td>
                                                    <td><?= $data['detail']['telepon_pemohon'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Media Sosial</td>
                                                    <td><?= $data['detail']['media_sosial'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Status Kepemilikan Rumah</td>
                                                    <td><?= $data['detail']['status_kepemilikan_rumah_pemohon'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Pendidikan Terakhir</td>
                                                    <td><?= $data['detail']['pendidikan_terakhir_pemohon'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Gelar</td>
                                                    <td><?= $data['detail']['gelar_pemohon'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Status Perkawinan</td>
                                                    <td><?= $data['detail']['status_perkawinan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Jumlah Tanggungan</td>
                                                    <td><?= $data['detail']['jumlah_tanggungan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Nama Keluarga Yg Dapat Dihubungi</td>
                                                    <td><?= $data['detail']['nama_keluarga_dapat_dihubungi'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Telepon/Hp Yg Dapat Dihubungi</td>
                                                    <td><?= $data['detail']['telepon_keluarga_dapat_dihubungi'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="card">
                                    <div class="card-header" style="background-color: #F4F4F4; ">
                                        <h3 class="card-title "> <span class="font-weight-bold">Data Pekerjaan</span> </h3>
                                    </div>

                                    <div class="card-body p-0">
                                        <table class="table table-bordered table-hover">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Jenis Pekerjaan</td>
                                                    <td><?= $data['detail']['jenis_pekerjaan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Nama Instansi</td>
                                                    <td><?= $data['detail']['nama_instansi'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Alamat</td>
                                                    <td><?= $data['detail']['alamat_instansi'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Telepon</td>
                                                    <td><?= $data['detail']['telepon_instansi'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Tahun Mulai Bekerja</td>
                                                    <td><?= $data['detail']['tahun_mulai_bekerja'] ?></td>
                                                </tr>


                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Jabatan Saat Ini</td>
                                                    <td><?= $data['detail']['jabatan_saat_ini'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Atasan Langsung</td>
                                                    <td><?= $data['detail']['atasan_langsung'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Telepon/Hp Bendahara</td>
                                                    <td><?= $data['detail']['telepon_bendahara'] ?></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-6">

                                <div class="card">
                                    <div class="card-header " style="background-color: #F4F4F4; ">
                                        <h3 class="card-title "> <span class="font-weight-bold">Data Pasangan</span> </h3>
                                    </div>

                                    <div class="card-body p-0">
                                        <table class="table table-bordered table-hover">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 200px;  background-color: #F4F4F4;">Nama Pasangan</td>
                                                    <td><?= $data['detail']['nama_pasangan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Tempat Lahir</td>
                                                    <td><?= $data['detail']['tempat_lahir_pasangan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Tanggal Lahir</td>
                                                    <td><?= isset($data['detail']['tgl_lahir_pasangan']) ? date('d-m-Y', strtotime($data['detail']['tgl_lahir_pasangan'])) : ''   ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Alamat KTP</td>
                                                    <td><?= $data['detail']['alamat_ktp_pasangan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Alamat Sekarang</td>
                                                    <td><?= $data['detail']['alamat_sekarang_pasangan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Telepon/Hp</td>
                                                    <td><?= $data['detail']['telepon_pasangan'] ?></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="card">
                                    <div class="card-header" style="background-color: #F4F4F4; ">
                                        <h3 class="card-title "> <span class="font-weight-bold">Data Pekerjaan Pasangan</span> </h3>
                                    </div>

                                    <div class="card-body p-0">
                                        <table class="table table-bordered table-hover">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Jenis Pekerjaan</td>
                                                    <td><?= $data['detail']['jenis_pekerjaan_pasangan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Nama Instansi</td>
                                                    <td><?= $data['detail']['nama_instansi_pasangan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Tahun Mulai Bekerja</td>
                                                    <td><?= $data['detail']['tahun_mulai_bekerja_pasangan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Jabatan Saat Ini</td>
                                                    <td><?= $data['detail']['jabatan_saat_ini_pasangan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Alamat Kantor</td>
                                                    <td><?= $data['detail']['alamat_kantor_pasangan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Telepon Kantor</td>
                                                    <td><?= $data['detail']['telepon_bendahara'] ?></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>






                        <div class="row">
                            <div class="col-md-6">

                                <div class="card">
                                    <div class="card-header " style="background-color: #F4F4F4; ">
                                        <h3 class="card-title "> <span class="font-weight-bold">Data Kredit</span> </h3>
                                    </div>

                                    <div class="card-body p-0">
                                        <table class="table table-bordered table-hover">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 200px;  background-color: #F4F4F4;">Tanggal Permohonan</td>
                                                    <td><?= isset($data['detail']['tanggal_permohonan']) ? date('d-m-Y', strtotime($data['detail']['tanggal_permohonan'])) : ''   ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Perjanjian Kerjasama</td>
                                                    <td><?= $data['detail']['perjanjian_kerjasama'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Jenis Permohonan</td>
                                                    <td><?= $data['detail']['jenis_permohonan'] ?></td>
                                                </tr>

                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Jumlah Kredit Yang Dimohon</td>
                                                    <td><?= number_format(($data['detail']['plafond_dimohon']), 0, ',', '.');  ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Jangka Waktu (Bulan)</td>
                                                    <td><?= $data['detail']['jangka_waktu'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Tujuan Penggunaan Kredit</td>
                                                    <td><?= $data['detail']['tujuan_penggunaan_kredit'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Nilai Perkiraan Jaminan</td>
                                                    <td><?= number_format(($data['detail']['nilai_jaminan']), 0, ',', '.');  ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Nama Marketing</td>
                                                    <td><?= $data['detail']['id_marketing'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Nama Analis</td>
                                                    <td><?= $data['detail']['id_analis'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-6">

                                <div class="card">
                                    <div class="card-header " style="background-color: #F4F4F4; ">
                                        <h3 class="card-title "> <span class="font-weight-bold">Penghasilan Perbulan</span> </h3>
                                    </div>

                                    <div class="card-body p-0">
                                        <table class="table table-bordered table-hover">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 200px;  background-color: #F4F4F4;">Penghasilan Pemohon</td>
                                                    <td><?= number_format(($data['detail']['penghasilan_pemohon']), 0, ',', '.');   ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Penghasilan Pasangan</td>
                                                    <td><?= number_format(($data['detail']['penghasilan_pasangan']), 0, ',', '.');   ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Penghasilan Tambahan</td>
                                                    <td><?= number_format(($data['detail']['penghasilan_tambahan']), 0, ',', '.');   ?></td>
                                                </tr>

                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Penghasilan Tambahan Lainnya</td>
                                                    <td><?= number_format(($data['detail']['penghasilan_tambahan_lainnya']), 0, ',', '.');   ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="card">
                                    <div class="card-header" style="background-color: #F4F4F4; ">
                                        <h3 class="card-title "> <span class="font-weight-bold">Pengeluaran Perbulan</span> </h3>
                                    </div>

                                    <div class="card-body p-0">
                                        <table class="table table-bordered table-hover">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Biaya Hidup</td>
                                                    <td><?= number_format(($data['detail']['biaya_hidup_perbulan']), 0, ',', '.');   ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">NBiaya Pendidikan</td>
                                                    <td><?= number_format(($data['detail']['biaya_pendidikan']), 0, ',', '.');   ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Biaya PAM/Listrik/Telp/Hp</td>
                                                    <td><?= number_format(($data['detail']['biaya_pam_listrik_telepon']), 0, ',', '.');   ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Angsuran Bank Lain</td>
                                                    <td><?= number_format(($data['detail']['angsuran_bank_lain']), 0, ',', '.');   ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Angsuran Perumahan</td>
                                                    <td><?= number_format(($data['detail']['angsuran_perumahan']), 0, ',', '.');   ?></td>
                                                </tr>


                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Angsuran Kendaraan</td>
                                                    <td><?= number_format(($data['detail']['angsuran_kendaraan']), 0, ',', '.');   ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Angsuran Barang Elektronik</td>
                                                    <td><?= number_format(($data['detail']['angsuran_barang_elektronik']), 0, ',', '.');   ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Angsuran Koperasi</td>
                                                    <td><?= number_format(($data['detail']['angsuran_koperasi']), 0, ',', '.');  ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Biaya Lainnya</td>
                                                    <td><?= number_format(($data['detail']['biaya_lainnya']), 0, ',', '.');   ?></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="row">
                            <div class="col-md-6">

                                <div class="card">
                                    <div class="card-header " style="background-color: #F4F4F4; ">
                                        <h3 class="card-title "> <span class="font-weight-bold">Data Aset Yang Dimiliki</span> </h3>
                                    </div>

                                    <div class="card-body p-0">
                                        <table class="table table-bordered table-hover">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 200px;  background-color: #F4F4F4;">Aset Yang Dimiliki</td>
                                                    <td><?= $data['detail']['aset_yang_dimiliki'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Alamat Aset</td>
                                                    <td><?= $data['detail']['alamat_aset'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Jenis Sertifikat</td>
                                                    <td><?= $data['detail']['jenis_sertifikat'] ?></td>
                                                </tr>

                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Jumlah Kendaraan</td>
                                                    <td><?= $data['detail']['jumlah_kendaraan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Merek Kendaraan</td>
                                                    <td><?= $data['detail']['merek_kendaraan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Atas Nama Kendaraan</td>
                                                    <td><?= $data['detail']['atas_nama_kendaraan'] ?></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-6">

                                <div class="card">


                                    <div class="card-body p-0">
                                        <table class="table table-bordered table-hover">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 200px;  background-color: #F4F4F4;">Catatan CS</td>
                                                    <td><?= $data['detail']['catatan_cs'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Posisi Alur Kredit</td>
                                                    <td><?= $data['detail']['lokasi_berkas'] ?></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="card">

                                    <div class="card-body p-0">
                                        <table class="table table-bordered table-hover">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Diinput Oleh</td>
                                                    <td><?= $data['detail']['user_create'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Tanggal Input</td>
                                                    <td><?= date('d-m-Y H:i:s', strtotime($data['detail']['tgl_create']))   ?></td>
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane " id="b">

                        <div class="row">
                            <div class="col-12">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item font-weight-bold " class="td_ket">Daftar SLIK Pemohon</li>
                                    <li class="list-group-item"></li>
                                </ul>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Nama Pemohon</td>
                                        <td><?= $data['detail']['nama_pemohon'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Instansi</td>
                                        <td><?= $data['detail']['nama_instansi'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>No. KTP</td>
                                        <td><?= $data['detail']['no_ktp_pemohon'] ?></td>
                                    </tr>

                                </table>
                            </div>


                            <div class="col-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Tempat, Tanggal Lahir</td>
                                        <td><?= $data['detail']['tempat_lahir_pemohon'] . ', ' . date('d-m-Y', strtotime($data['detail']['tgl_lahir_pemohon']))   ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat KTP</td>
                                        <td><?= $data['detail']['alamat_ktp_pemohon'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat saat ini</td>
                                        <td><?= $data['detail']['alamat_sekarang_pemohon'] ?></td>
                                    </tr>

                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover first display nowrap tabel_slik_pemohon">
                                        <thead>
                                            <tr>
                                                <td>
                                                    Nama Bank
                                                </td>

                                                <td>
                                                    Jenis Fasilitas
                                                </td>
                                                <td>
                                                    Plafond
                                                </td>
                                                <td>
                                                    Bakidebet
                                                </td>
                                                <td>
                                                    Kolektibilitas
                                                </td>

                                                <td>
                                                    Jangka Waktu
                                                </td>
                                                <td>
                                                    Suku Bunga
                                                </td>
                                                <td>
                                                    Jenis Jaminan
                                                </td>
                                                <td>
                                                    Nilai Jaminan
                                                </td>
                                                <td>
                                                    Pemilik Jaminan
                                                </td>
                                                <td>
                                                    Alamat Jaminan
                                                </td>
                                                <td>
                                                    Pengikatan
                                                </td>
                                                <td>
                                                    Keterangan
                                                </td>

                                            </tr>
                                        </thead>

                                        <tbody>


                                            <?php
                                            foreach ($data['daftar_slik_pemohon'] as $row) :
                                            ?>

                                                <tr>
                                                    <td><?= $row['nama_bank'] ?></td>
                                                    <td><?= $row['jenis_fasilitas'] ?></td>
                                                    <td><?= number_format($row['plafond'], 0, ',', '.')  ?></td>
                                                    <td><?= number_format($row['bakidebet'], 0, ',', '.') ?></td>
                                                    <td><?= $row['kolektibilitas'] ?></td>
                                                    <td><?= date('d-m-Y', strtotime($row['waktu_awal'])) . ' s/d ' . date('d-m-Y', strtotime($row['waktu_akhir'])) ?></td>
                                                    <td><?= $row['suku_bunga']  ?></td>
                                                    <td><?= $row['jenis_jaminan'] ?></td>
                                                    <td><?= number_format($row['nilai_jaminan'], 0, ',', '.') ?></td>
                                                    <td><?= $row['pemilik_jaminan'] ?></td>
                                                    <td><?= $row['nama_bank'] ?></td>
                                                    <td><?= $row['pengikatan'] ?></td>
                                                    <td><?= $row['keterangan'] ?></td>
                                                </tr>


                                            <?php endforeach ?>

                                        </tbody>



                                    </table>
                                </div>
                            </div>


                        </div>






                        <div class="row">
                            <div class="col-12">

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item font-weight-bold">Daftar SLIK Pasangan</li>
                                    <li class="list-group-item"></li>
                                </ul>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Nama Pemohon</td>
                                        <td><?= $data['detail']['nama_pasangan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Instansi</td>
                                        <td><?= $data['detail']['nama_instansi_pasangan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>No. KTP</td>
                                        <td><?= $data['detail']['no_ktp_pasangan'] ?></td>
                                    </tr>

                                </table>
                            </div>


                            <div class="col-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Tempat, Tanggal Lahir</td>
                                        <td><?= $data['detail']['tempat_lahir_pasangan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat KTP</td>
                                        <td><?= $data['detail']['alamat_ktp_pasangan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat saat ini</td>
                                        <td><?= $data['detail']['alamat_sekarang_pasangan'] ?></td>
                                    </tr>

                                </table>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover first display nowrap tabel_slik_pemohon">
                                        <thead>
                                            <tr>
                                                <td>
                                                    Nama Bank
                                                </td>

                                                <td>
                                                    Jenis Fasilitas
                                                </td>
                                                <td>
                                                    Plafond
                                                </td>
                                                <td>
                                                    Bakidebet
                                                </td>
                                                <td>
                                                    Kolektibilitas
                                                </td>

                                                <td>
                                                    Jangka Waktu
                                                </td>
                                                <td>
                                                    Suku Bunga
                                                </td>
                                                <td>
                                                    Jenis Jaminan
                                                </td>
                                                <td>
                                                    Nilai Jaminan
                                                </td>
                                                <td>
                                                    Pemilik Jaminan
                                                </td>
                                                <td>
                                                    Alamat Jaminan
                                                </td>
                                                <td>
                                                    Pengikatan
                                                </td>
                                                <td>
                                                    Keterangan
                                                </td>

                                            </tr>
                                        </thead>

                                        <tbody>


                                            <?php
                                            foreach ($data['daftar_slik_pasangan'] as $row) :
                                            ?>

                                                <tr>
                                                    <td><?= $row['nama_bank'] ?></td>
                                                    <td><?= $row['jenis_fasilitas'] ?></td>
                                                    <td><?= number_format($row['plafond'], 0, ',', '.')  ?></td>
                                                    <td><?= number_format($row['bakidebet'], 0, ',', '.') ?></td>
                                                    <td><?= $row['kolektibilitas'] ?></td>
                                                    <td><?= date('d-m-Y', strtotime($row['waktu_awal'])) . ' s/d ' . date('d-m-Y', strtotime($row['waktu_akhir'])) ?></td>
                                                    <td><?= $row['suku_bunga']  ?></td>
                                                    <td><?= $row['jenis_jaminan'] ?></td>
                                                    <td><?= number_format($row['nilai_jaminan'], 0, ',', '.') ?></td>
                                                    <td><?= $row['pemilik_jaminan'] ?></td>
                                                    <td><?= $row['nama_bank'] ?></td>
                                                    <td><?= $row['pengikatan'] ?></td>
                                                    <td><?= $row['keterangan'] ?></td>
                                                </tr>


                                            <?php endforeach ?>

                                        </tbody>



                                    </table>
                                </div>
                            </div>


                        </div>
                        <div class="row mt-3">

                            <div class="col-md-6">

                                <div class="card">

                                    <div class="card-body p-0">
                                        <table class="table table-bordered table-hover">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Diinput Oleh</td>
                                                    <td><?= isset($data['data_slik_single']['user_create']) ? $data['data_slik_single']['user_create'] : '-' ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px; background-color: #F4F4F4; ">Tanggal Input</td>
                                                    <td><?= isset($data['data_slik_single']['tgl_create']) ? date('d-m-Y H:i:s', strtotime($data['data_slik_single']['tgl_create']))  : '-'  ?></td>
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>







                    </div>

                    <div class="tab-pane " id="c">
                        <ul class="nav nav-tabs mt-2 justify-content-center " id="" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="" data-toggle="tab" href="#aa">Analisa dan Usulan Analis</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="" data-toggle="tab" href="#bb">Daftar Jaminan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="" data-toggle="tab" href="#cc">Analisa Kemampuan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="" data-toggle="tab" href="#dd">Sandi Sandi</a>
                            </li>
                        </ul>



                        <div class="tab-content">

                            <div class="tab-pane active" id="aa">


                                <div class="row mt-3">
                                    <div class="col-6">

                                        <table class='table-hover' cellpadding=5 cellspacing=15 id='tabel_modal'>
                                            <tr>
                                                <td id='td_tabel_modal_ket'>Karakter</td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['karakter']) ? $data['get_tbl_wawancara']['karakter'] : '-'  ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket'>Pertimbangan Karakter</td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['pertimbangan_karakter']) ? $data['get_tbl_wawancara']['pertimbangan_karakter'] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket'>Kemampuan</td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['kemampuan']) ? $data['get_tbl_wawancara']['kemampuan'] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket'>Pertimbangan Kemampuan</td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['pertimbangan_kemampuan']) ? $data['get_tbl_wawancara']['pertimbangan_kemampuan'] : '-' ?></td>
                                            </tr>


                                            <tr>
                                                <td id='td_tabel_modal_ket'>Kekayaan</td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['kekayaan']) ? $data['get_tbl_wawancara']['kekayaan'] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket'>Pertimbangan Kekayaan</td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['pertimbangan_kekayaan']) ? $data['get_tbl_wawancara']['pertimbangan_kekayaan'] : '-' ?></td>
                                            </tr>



                                            <tr>
                                                <td id='td_tabel_modal_ket'>Jaminan</td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['jaminan']) ? $data['get_tbl_wawancara']['jaminan'] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket'>Pertimbangan Jaminan</td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['pertimbangan_jaminan']) ? $data['get_tbl_wawancara']['pertimbangan_jaminan'] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket'>Kondsi</td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['kondisi']) ? $data['get_tbl_wawancara']['kondisi'] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket'>Pertimbangan Karakter</td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['pertimbangan_kondisi']) ? $data['get_tbl_wawancara']['pertimbangan_kondisi'] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket'>Tujuan Penggunaan Kredit</td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['tujuan_penggunaan_kredit']) ? $data['get_tbl_wawancara']['tujuan_penggunaan_kredit'] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket'>Jaminan Utama</td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['jaminan_utama']) ? $data['get_tbl_wawancara']['jaminan_utama'] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket'>Syarat Lainnya</td>
                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['syarat_lainnya']) ? $data['get_tbl_wawancara']['syarat_lainnya'] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket'>Dasar Pertimbangan Analis</td>
                                                <td><textarea class='form-control h-25' rows='15'><?= isset($data['get_tbl_wawancara']['dasar_pertimbangan_analis']) ? $data['get_tbl_wawancara']['dasar_pertimbangan_analis'] : '-' ?></textarea></td>
                                            </tr>




                                        </table>

                                    </div>

                                    <div class="col-6">
                                        <table class='table-hover' cellpadding=5 cellspacing=15 id='tabel_modal'>
                                            <tr>
                                                <td id='td_tabel_modal_ket'>Plafond</td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['plafond']) ? number_format($data['get_tbl_wawancara']['plafond'], 0, ',', '.')  : '-' ?></td>
                                            </tr>


                                            <tr>
                                                <td id='td_tabel_modal_ket'>Jangka Waktu</td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['jangka_waktu'])  ? $data['get_tbl_wawancara']['jangka_waktu'] . ' Bulan' : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket'>Suku Bunga </td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['suku_bunga']) ? $data['get_tbl_wawancara']['suku_bunga'] . ' ' . '% p.a' : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket'>Sistem Bunga</td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['sistem_bunga']) ? $data['get_tbl_wawancara']['sistem_bunga'] : '-' ?></td>
                                            </tr>




                                            <tr>
                                                <td id='td_tabel_modal_ket'>Angsuran Perbulan</td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['angsuran_perbulan']) ? $data['get_tbl_wawancara']['angsuran_perbulan'] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket'>Biaya Provisi</td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['biaya_provisi_nominal']) ? $data['get_tbl_wawancara']['biaya_provisi_nominal'] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket'>Biaya Administrasi</td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['biaya_administrasi_nominal']) ? $data['get_tbl_wawancara']['biaya_administrasi_nominal'] : '-' ?></td>
                                            </tr>


                                            <tr>
                                                <td id='td_tabel_modal_ket'>Premi Asuransi</td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['premi_asuransi']) ? $data['get_tbl_wawancara']['premi_asuransi'] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket'>Tabungan</td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['tabungan']) ? $data['get_tbl_wawancara']['tabungan'] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket'>Biaya Notaris</td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['biaya_notaris']) ? $data['get_tbl_wawancara']['biaya_notaris'] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket'>Biaya Materai</td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['biaya_materai']) ? $data['get_tbl_wawancara']['biaya_materai'] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket'>Biaya APHT</td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['biaya_apht']) ? $data['get_tbl_wawancara']['biaya_apht'] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket'>Asuransi Kerugian</td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['asuransi_kerugian']) ? $data['get_tbl_wawancara']['asuransi_kerugian'] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket'>Sistem Pembayaraan</td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['sistem_pembayaran']) ? $data['get_tbl_wawancara']['sistem_pembayaran'] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket'>Pejabat TTD SPPK</td>

                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['pejabat_ttd_sppk']) ? $data['get_tbl_wawancara']['pejabat_ttd_sppk'] : '-' ?></td>
                                            </tr>


                                        </table>
                                    </div>


                                    <div class="col-md-6 mt-3">

                                        <div class="card">

                                            <div class="card-body p-0">
                                                <table class="table table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 200px; background-color: #F4F4F4; ">Dianalisa Oleh</td>
                                                            <td><?= isset($data_tbl_wawancara['user_create']) ? $data_tbl_wawancara['user_create']  : '-' ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 200px; background-color: #F4F4F4; ">Tanggal Analisa</td>
                                                            <td><?= isset($data_tbl_wawancara['tgl_create']) ? date('d-m-Y H:i:s', strtotime($data_tbl_wawancara['tgl_create'])) : '-'   ?></td>
                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>

                            <div class="tab-pane" id="bb">
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <table class='table-hover' cellpadding=5 cellspacing=15 id='tabel_modal'>




                                            <tr>
                                                <td id='td_tabel_modal_ket'>Jaminan 1</td>
                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['jaminan_1']) ? $data['get_tbl_wawancara']['jaminan_1'] : '-' ?></td>
                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal_ket'>Jaminan 2</td>
                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['jaminan_2']) ? $data['get_tbl_wawancara']['jaminan_2'] : '-' ?></td>
                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal_ket'>Jaminan 3</td>
                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['jaminan_3']) ? $data['get_tbl_wawancara']['jaminan_3'] : '-' ?></td>
                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal_ket'>Jaminan 4</td>
                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['jaminan_4']) ? $data['get_tbl_wawancara']['jaminan_4'] : '-' ?></td>
                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal_ket'>Jaminan 5</td>
                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['jaminan_5']) ? $data['get_tbl_wawancara']['jaminan_5'] : '-' ?></td>
                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal_ket'>Jaminan 6</td>
                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['jaminan_6']) ? $data['get_tbl_wawancara']['jaminan_6'] : '-' ?></td>
                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal_ket'>Jaminan 7</td>
                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['jaminan_7']) ? $data['get_tbl_wawancara']['jaminan_7'] : '-' ?></td>
                                            </tr>




                                        </table>
                                    </div>

                                    <div class="col-6">
                                        <table class='table-hover' cellpadding=5 cellspacing=15 id='tabel_modal'>

                                            <tr>
                                                <td id='td_tabel_modal_ket'>Jaminan 1</td>
                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['jaminan_8']) ? $data['get_tbl_wawancara']['jaminan_8'] : '-' ?></td>
                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal_ket'>Jaminan 2</td>
                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['jaminan_9']) ? $data['get_tbl_wawancara']['jaminan_9'] : '-' ?></td>
                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal_ket'>Jaminan 3</td>
                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['jaminan_10']) ? $data['get_tbl_wawancara']['jaminan_10'] : '-' ?></td>
                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal_ket'>Jaminan 4</td>
                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['jaminan_11']) ? $data['get_tbl_wawancara']['jaminan_11'] : '-' ?></td>
                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal_ket'>Jaminan 5</td>
                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['jaminan_12']) ? $data['get_tbl_wawancara']['jaminan_12'] : '-' ?></td>
                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal_ket'>Jaminan 6</td>
                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['jaminan_13']) ? $data['get_tbl_wawancara']['jaminan_13'] : '-' ?></td>
                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal_ket'>Jaminan 7</td>
                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['jaminan_14']) ? $data['get_tbl_wawancara']['jaminan_14'] : '-' ?></td>
                                            </tr>
                                        </table>
                                    </div>



                                    <div class="col-md-6 mt-3">

                                        <div class="card">

                                            <div class="card-body p-0">
                                                <table class="table table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 200px; background-color: #F4F4F4; ">Dianalisa Oleh</td>
                                                            <td><?= isset($data_tbl_wawancara['user_create']) ?  $data_tbl_wawancara['user_create']  : '-' ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 200px; background-color: #F4F4F4; ">Tanggal Analisa</td>
                                                            <td><?= isset($data_tbl_wawancara['tgl_create']) ? date('d-m-Y H:i:s', strtotime($data_tbl_wawancara['tgl_create'])) : '-'   ?></td>
                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>






                                </div>
                            </div>

                            <div class="tab-pane" id="cc">
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <table class='table-hover' cellpadding=5 cellspacing=15 id='tabel_modal'>

                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Penghasilan Pemohon Perbulan</td>
                                                <td id='td_tabel_modal' colspan='1'><?= isset($data['get_tbl_wawancara']['penghasilan_pemohon_perbulan']) ? number_format(($data['get_tbl_wawancara']['penghasilan_pemohon_perbulan'] * 1000), 0, ',', '.') : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal' colspan='1'><?= isset($data['get_tbl_wawancara']['penghasilan_pemohon_perbulan_ket']) ? $data['get_tbl_wawancara']['penghasilan_pemohon_perbulan_ket'] : '-' ?></td>
                                            </tr>


                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Penghasilan Tambahan Pemohon 1 </td>
                                                <td id='td_tabel_modal' colspan='1'><?= isset($data['get_tbl_wawancara']['penghasilan_pemohon_tambahan_1']) ? number_format(($data['get_tbl_wawancara']['penghasilan_pemohon_tambahan_1'] * 1000), 0, ',', '.') : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal' colspan='1'><?= isset($data['penghasilan_pemohon_ket'][1]) ? $data['penghasilan_pemohon_ket'][1] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Penghasilan Tambahan Pemohon 2 </td>
                                                <td id='td_tabel_modal' colspan='1'><?= isset($data['get_tbl_wawancara']['penghasilan_pemohon_tambahan_2']) ?  number_format(($data['get_tbl_wawancara']['penghasilan_pemohon_tambahan_2'] * 1000), 0, ',', '.') : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal' colspan='1'><?= isset($data['penghasilan_pemohon_ket'][2]) ? $data['penghasilan_pemohon_ket'][2] : '-' ?></td>
                                            </tr>




                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Penghasilan Tambahan Pemohon 3 </td>
                                                <td id='td_tabel_modal' colspan='1'><?= isset($data['get_tbl_wawancara']['penghasilan_pemohon_tambahan_3']) ? number_format(($data['get_tbl_wawancara']['penghasilan_pemohon_tambahan_3'] * 1000), 0, ',', '.') : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal' colspan='1'><?= isset($data['penghasilan_pemohon_ket'][3]) ? $data['penghasilan_pemohon_ket'][3] : '-' ?></td>
                                            </tr>



                                        </table>
                                    </div>


                                    <div class='col-6'>
                                        <table class='table-hover' cellpadding=5 cellspacing=15 id='tabel_modal'>

                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Penghasilan Pasangan Perbulan</td>
                                                <td id='td_tabel_modal' colspan='1'><?= isset($data['get_tbl_wawancara']['penghasilan_pasangan_perbulan']) ? number_format(($data['get_tbl_wawancara']['penghasilan_pasangan_perbulan'] * 1000), 0, ',', '.') : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal' colspan='1'><?= isset($data['get_tbl_wawancara']['penghasilan_pasangan_perbulan_ket']) ? $data['get_tbl_wawancara']['penghasilan_pasangan_perbulan_ket'] : '-' ?></td>
                                            </tr>


                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Penghasilan Tambahan Pasangan 1 </td>
                                                <td id='td_tabel_modal' colspan='1'><?= isset($data['get_tbl_wawancara']['penghasilan_pasangan_tambahan_1']) ? number_format(($data['get_tbl_wawancara']['penghasilan_pasangan_tambahan_1'] * 1000), 0, ',', '.') : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal' colspan='1'><?= isset($data['penghasilan_pasangan_ket'][1]) ? $data['penghasilan_pasangan_ket'][1] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Penghasilan Tambahan Pasangan 2 </td>
                                                <td id='td_tabel_modal' colspan='1'><?= isset($data['get_tbl_wawancara']['penghasilan_pasangan_tambahan_2']) ? number_format(($data['get_tbl_wawancara']['penghasilan_pasangan_tambahan_2'] * 1000), 0, ',', '.') : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal' colspan='1'><? isset($data['penghasilan_pasangan_ket'][2]) ? $data['penghasilan_pasangan_ket'][2] : '-' ?></td>
                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Penghasilan Tambahan Pasangan 3 </td>
                                                <td id='td_tabel_modal' colspan='1'><?= isset($data['get_tbl_wawancara']['penghasilan_pasangan_tambahan_3']) ? number_format(($data['get_tbl_wawancara']['penghasilan_pasangan_tambahan_3'] * 1000), 0, ',', '.') : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal' colspan='1'><?= isset($data['penghasilan_pasangan_ket'][3]) ? $data['penghasilan_pasangan_ket'][3] : '-' ?></td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>


                                <div class='row mt-3'>

                                    <div class='col-6'>
                                        <table class='table-hover' cellpadding=5 cellspacing=15 id='tabel_modal'>

                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Biaya Rumah Tangga Sebulan </td>
                                                <td id='td_tabel_modal' colspan='1'><?= isset($data['get_tbl_wawancara']['biaya_hidup_sebulan']) ? number_format(($data['get_tbl_wawancara']['biaya_hidup_sebulan'] * 1000), 0, ',', '.') : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal' colspan='1'><?= isset($data['biaya_hidup_sebulan_ket']) ? $data['biaya_hidup_sebulan_ket'] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Biaya Pendidikan Sebulan </td>
                                                <td id='td_tabel_modal' colspan='1'><?= isset($data['get_tbl_wawancara']['biaya_pendidikan']) ? number_format(($data['get_tbl_wawancara']['biaya_pendidikan'] * 1000), 0, ',', '.') : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal' colspan='1'><?= isset($data['biaya_pendidikan_ket']) ? $data['biaya_pendidikan_ket'] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Biaya Listrik/Pam/Telepon Sebulan </td>
                                                <td id='td_tabel_modal' colspan='1'><?= isset($data['get_tbl_wawancara']['biaya_pam_listrik_telepon']) ? number_format(($data['get_tbl_wawancara']['biaya_pam_listrik_telepon'] * 1000), 0, ',', '.') : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal' colspan='1'><?= isset($data['biaya_pam_listrik_telepon_ket']) ?  $data['biaya_pam_listrik_telepon_ket'] : '-' ?></td>
                                            </tr>
                                        </table>
                                    </div>


                                    <div class='col-6'>
                                        <table class='table-hover' cellpadding=5 cellspacing=15 id='tabel_modal'>

                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Biaya Transport Sebulan </td>
                                                <td id='td_tabel_modal' colspan='1'><?= isset($data['get_tbl_wawancara']['biaya_transport']) ? number_format(($data['get_tbl_wawancara']['biaya_transport'] * 1000), 0, ',', '.') : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal' colspan='1'><?= isset($data['biaya_transport_ket']) ? $data['biaya_transport_ket'] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Biaya Lain-lain Sebulan </td>
                                                <td id='td_tabel_modal' colspan='1'><?= isset($data['get_tbl_wawancara']['biaya_lainnya']) ? number_format(($data['get_tbl_wawancara']['biaya_lainnya'] * 1000), 0, ',', '.') : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal' colspan='1'><?= isset($data['biaya_lainnya_ket']) ? $data['biaya_lainnya_ket'] : '-' ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class='row mt-3'>
                                    <div class='col-6'>
                                        <table class='table-hover' cellpadding=5 cellspacing=15 id='tabel_modal'>
                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Angsuran Hasamitra sebelumnya </td>
                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['angsuran_kredit_sebelumnya']) ? $data['get_tbl_wawancara']['angsuran_kredit_sebelumnya'] : '-' ?></td>
                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['angsuran_kredit_sebelumnya_ket']) ? $data['get_tbl_wawancara']['angsuran_kredit_sebelumnya_ket'] : '-' ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>


                                <div class="row mt-3">
                                    <div class="col-6">
                                        <table class='table-hover' cellpadding=5 cellspacing=15 id='tabel_modal'>


                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Angsuran Lain Pemohon 1 </td>
                                                <td id='td_tabel_modal'><?= isset($angsuran_pemohon[1]) ? $angsuran_pemohon[1] : '-' ?></td>



                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal'><?= isset($ket_angsuran_pemohon[1]) ? $ket_angsuran_pemohon[1] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Angsuran Lain Pemohon 2 </td>
                                                <td id='td_tabel_modal'><?= isset($angsuran_pemohon[2]) ? $angsuran_pemohon[2] : '-' ?></td>

                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal'><?= isset($ket_angsuran_pemohon[2]) ? $ket_angsuran_pemohon[2] : '-' ?></td>
                                            </tr>



                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Angsuran Lain Pemohon 3 </td>
                                                <td id='td_tabel_modal'><?= isset($angsuran_pemohon[3]) ? $angsuran_pemohon[3] : '-' ?></td>

                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal'><?= isset($ket_angsuran_pemohon[3]) ? $ket_angsuran_pemohon[3] : '-' ?></td>
                                            </tr>


                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Angsuran Lain Pemohon 4 </td>
                                                <td id='td_tabel_modal'><?= isset($angsuran_pemohon[4]) ? $angsuran_pemohon[4] : '-' ?></td>

                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal'><?= isset($ket_angsuran_pemohon[4]) ? $ket_angsuran_pemohon[4] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Angsuran Lain Pemohon 5 </td>
                                                <td id='td_tabel_modal'><?= isset($angsuran_pemohon[5]) ? $angsuran_pemohon[5] : '-' ?></td>

                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal'><?= isset($ket_angsuran_pemohon[5]) ? $ket_angsuran_pemohon[5] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Angsuran Lain Pemohon 6 </td>
                                                <td id='td_tabel_modal'><?= isset($angsuran_pemohon[6]) ? $angsuran_pemohon[6] : '-' ?></td>

                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal'><?= isset($ket_angsuran_pemohon[6]) ? $ket_angsuran_pemohon[6] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Angsuran Lain Pemohon 7 </td>
                                                <td id='td_tabel_modal'><?= isset($angsuran_pemohon[7]) ? $angsuran_pemohon[7] : '-' ?></td>

                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal'><?= isset($ket_angsuran_pemohon[7]) ? $ket_angsuran_pemohon[7] : '-' ?></td>
                                            </tr>
                                        </table>
                                    </div>





                                    <div class="col-6">
                                        <table class='table-hover' cellpadding=5 cellspacing=15 id='tabel_modal'>


                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Angsuran Lain Pasangan 1 </td>
                                                <td id='td_tabel_modal'><?= isset($angsuran_pasangan[1]) ? $angsuran_pasangan[1] : '-' ?></td>


                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal'><?= isset($ket_angsuran_pasangan[1]) ? $ket_angsuran_pasangan[1] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Angsuran Lain Pasangan 2 </td>
                                                <td id='td_tabel_modal'><?= isset($angsuran_pasangan[2]) ? $angsuran_pasangan[2] : '-' ?></td>

                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal'><?= isset($ket_angsuran_pasangan[2]) ? $ket_angsuran_pasangan[2] : '-' ?></td>
                                            </tr>



                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Angsuran Lain Pasangan 3 </td>
                                                <td id='td_tabel_modal'><?= isset($angsuran_pasangan[3]) ? $angsuran_pasangan[3] : '-' ?></td>

                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal'><?= isset($ket_angsuran_pasangan[3]) ? $ket_angsuran_pasangan[3] : '-' ?></td>
                                            </tr>


                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Angsuran Lain Pasangan 4 </td>
                                                <td id='td_tabel_modal'><?= isset($angsuran_pasangan[4]) ? $angsuran_pasangan[4] : '-' ?></td>

                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal'><?= isset($ket_angsuran_pasangan[4]) ? $ket_angsuran_pasangan[4] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Angsuran Lain Pasangan 5 </td>
                                                <td id='td_tabel_modal'><?= isset($angsuran_pasangan[5]) ? $angsuran_pasangan[5] : '-' ?></td>

                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal'><?= isset($ket_angsuran_pasangan[5]) ? $ket_angsuran_pasangan[5] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Angsuran Lain Pasangan 6 </td>
                                                <td id='td_tabel_modal'><?= isset($angsuran_pasangan[6]) ? $angsuran_pasangan[6] : '-' ?></td>

                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal'><?= isset($ket_angsuran_pasangan[6]) ? $ket_angsuran_pasangan[6] : '-' ?></td>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket' rowspan='2'>Angsuran Lain Pasangan 7 </td>
                                                <td id='td_tabel_modal'><?= isset($angsuran_pasangan[7]) ? $angsuran_pasangan[7] : '-' ?></td>

                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal'><?= isset($ket_angsuran_pasangan[7]) ? $ket_angsuran_pasangan[7] : '-' ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>


                                <div class="row mt-3">
                                    <div class="col-6">
                                        <table class='table-hover' cellpadding=5 cellspacing=15 id='tabel_modal'>

                                            <tr>
                                                <td id='td_tabel_modal_ket'>
                                                    <h4><b>Kemampuan Membayar</b></h4>
                                                </td>
                                                <td id='td_tabel_modal'>
                                                    <h4><b><?= isset($data['get_tbl_wawancara']['kemampuan_membayar_angsuran']) ? (number_format(($data['get_tbl_wawancara']['kemampuan_membayar_angsuran'] * 1000), 0, ',', '.'))  : '-' ?></b></h4>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal_ket'>
                                                    <h4><b>Persentase Angsuran</b></h4>
                                                </td>
                                                <td id='td_tabel_modal'>
                                                    <h4><b><?= isset($data['get_tbl_wawancara']['persentase_angsuran']) ? $data['get_tbl_wawancara']['persentase_angsuran'] . ' % ' . '&ensp; &ensp;' . $data['get_tbl_wawancara']['keterangan_persentase_angsuran'] : '-' ?></b></h4>
                                                </td>

                                            </tr>


                                        </table>
                                    </div>
                                </div>


                                <div class="row">

                                    <div class="col-md-6 mt-3">

                                        <div class="card">

                                            <div class="card-body p-0">
                                                <table class="table table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 200px; background-color: #F4F4F4; ">Dianalisa Oleh</td>
                                                            <td><?= isset($data_tbl_wawancara['user_create']) ? $data_tbl_wawancara['user_create'] : '-' ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 200px; background-color: #F4F4F4; ">Tanggal Analisa</td>
                                                            <td><?= isset($data_tbl_wawancara['tgl_create'])  ? date('d-m-Y H:i:s', strtotime($data_tbl_wawancara['tgl_create'])) : '-'  ?></td>
                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                </div>






                            </div>
                            <div class="tab-pane" id="dd">
                                <div class="row">
                                    <div class="col-6">
                                        <table class='table-hover' cellpadding=5 cellspacing=15 id='tabel_modal'>

                                            <tr>
                                                <td id='td_tabel_modal_ket'>Golongan Debitur </td>
                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['kode_golongan_debitur']) == '1' ? $data['get_tbl_wawancara']['kode_golongan_debitur'] . ' - ' . $kode_golongan_debitur['golongan_debitur'] : '-' ?></td>

                                            </tr>
                                            <tr>
                                                <td id='td_tabel_modal_ket'>Jenis Penggunaan </td>
                                                <?php if (isset($kode_jenis_penggunaan['jenis_penggunaan'])) { ?>
                                                    <td id='td_tabel_modal'><?= $data['get_tbl_wawancara']['kode_jenis_penggunaan'] . ' - ' . $kode_jenis_penggunaan['jenis_penggunaan'] ?></td>
                                                <?php } else { ?>
                                                    <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['kode_jenis_penggunaan']) ? $data['get_tbl_wawancara']['kode_jenis_penggunaan'] . ' - ' : '-'  ?></td>
                                                <?php } ?>
                                            </tr>

                                            <tr>
                                                <td id='td_tabel_modal_ket'>Sektor Ekonomi </td>
                                                <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['kode_sektor_ekonomi'])  == '1' ?  $data['get_tbl_wawancara']['kode_sektor_ekonomi'] . ' - ' . $kode_sektor_ekonomi['sektor_ekonomi'] : '-' ?></td>

                                            </tr>

                                            <?php

                                            if (isset($kode_hubungan_debitur_dengan_bank['hubungan_debitur_dengan_bank'])) {


                                            ?>

                                                <tr>
                                                    <td id='td_tabel_modal_ket'>Hubungan Debitur Dengan Bank </td>
                                                    <td id='td_tabel_modal'><?= $data['get_tbl_wawancara']['kode_hubungan_debitur_dengan_bank'] . ' - ' . $kode_hubungan_debitur_dengan_bank['hubungan_debitur_dengan_bank'] ?></td>
                                                </tr>


                                            <?php  } else { ?>

                                                <tr>
                                                    <td id='td_tabel_modal_ket'>Hubungan Debitur Dengan Bank </td>
                                                    <td id='td_tabel_modal'><?= isset($data['get_tbl_wawancara']['kode_hubungan_debitur_dengan_bank']) ? $data['get_tbl_wawancara']['kode_hubungan_debitur_dengan_bank'] . ' - ' : '-' ?></td>
                                                </tr>

                                            <?php } ?>

                                        </table>
                                    </div>




                                </div>

                                <div class="row">
                                    <div class="col-md-6 mt-3">

                                        <div class="card">

                                            <div class="card-body p-0">
                                                <table class="table table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 200px; background-color: #F4F4F4; ">Dianalisa Oleh</td>
                                                            <td><?= isset($data_tbl_wawancara['user_create']) ?  $data_tbl_wawancara['user_create'] : '-' ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 200px; background-color: #F4F4F4; ">Tanggal Analisa</td>
                                                            <td><?= isset($data_tbl_wawancara['tgl_create']) ? date('d-m-Y H:i:s', strtotime($data_tbl_wawancara['tgl_create'])) : '-'  ?></td>
                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>





                    </div>
                    <div class="tab-pane active" id="d">
                        <div class="row mt-3">
                            <?php

                            for ($a = 1; $a <= 3; $a++) {
                                if (isset($data_tbl_komite[$a - 1])) {



                            ?>
                                    <div class="col-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <b>Komite <?= $a ?></b>
                                            </div>
                                            <div class="card-body">

                                                <table cellpadding=5 cellspacing=15 id='tabel_modal'>

                                                    <tr>
                                                        <td id='td_tabel_modal_ket'>Plafond </td>

                                                        <!-- cek apakah plafond belum berubah anatar inpuran analis dengan persetujuan komite, jika berubah maka beri warna merah -->

                                                        <?php

                                                        // echo $data['get_tbl_wawancara']['plafond'] . $data_tbl_komite[$a - 1]['plafond'];
                                                        // if ($data['get_tbl_wawancara']['plafond'] == $data_tbl_komite[$a - 1]['plafond']) {
                                                        //     echo "sama";
                                                        // } else {

                                                        //     echo "beda";
                                                        // }

                                                        // echo "Plafon 1 tbl_wawancara : " . $data['get_tbl_wawancara']['plafond'];
                                                        // echo "<br>";

                                                        // echo "Plafon 2 tbl_komite    : " . $data_tbl_komite[$a - 1]['plafond'];


                                                        if ($data['get_tbl_wawancara']['plafond'] == $data_tbl_komite[$a - 1]['plafond']) {
                                                        ?>
                                                            <td id='td_tabel_modal'><?= number_format(($data_tbl_komite[$a - 1]['plafond']), 0, ",", ".")   ?></td>
                                                        <?php  } else { ?>

                                                            <td id='td_tabel_modal' style="color:red; "><?= number_format(($data_tbl_komite[$a - 1]['plafond']), 0, ",", ".")   ?></td>
                                                        <?php } ?>
                                                    </tr>
                                                    <tr>

                                                        <td id='td_tabel_modal_ket'>Jangka Waktu </td>
                                                        <?php
                                                        if ($data['get_tbl_wawancara']['jangka_waktu'] == $data_tbl_komite[$a - 1]['jangka_waktu']) {
                                                        ?>
                                                            <td id='td_tabel_modal'><?= $data_tbl_komite[$a - 1]['jangka_waktu']  ?></td>

                                                        <?php  } else { ?>

                                                            <td id='td_tabel_modal' style="color:red; "><?= $data_tbl_komite[$a - 1]['jangka_waktu']  ?></td>

                                                        <?php } ?>
                                                    </tr>
                                                    <tr>
                                                        <td id='td_tabel_modal_ket'>Catatan Komite</td>

                                                        <td id='td_tabel_modal'><textarea disabled style=" border: none; outline: none; background-color: white;" class='form-control h-25' rows='10'><?= $data_tbl_komite[$a - 1]['catatan_komite'] ?></textarea></td>
                                                    </tr>

                                                    <?php

                                                    if ($data_tbl_komite[$a - 1]['status'] == "DISETUJUI") {

                                                    ?>
                                                        <tr>
                                                            <td id='td_tabel_modal_ket'>Status </td>
                                                            <td id='td_tabel_modal' style="background-color: blue; color:white; "> <b> <?= $data_tbl_komite[$a - 1]['status'] == "DISETUJUI" ? 'SETUJU' : ''  ?> </b></td>
                                                        </tr>


                                                    <?php } else if ($data_tbl_komite[$a - 1]['status'] == "DITOLAK") {

                                                    ?>

                                                        <tr>
                                                            <td id='td_tabel_modal_ket'>Status </td>
                                                            <td id='td_tabel_modal' style="background-color: red; color:white; "> <b> <?= $data_tbl_komite[$a - 1]['status']  == "DITOLAK" ? 'TOLAK' : '' ?> </b></td>
                                                        </tr>

                                                    <?php } else { ?>


                                                        <tr>
                                                            <td id='td_tabel_modal_ket'>Status </td>
                                                            <td id='td_tabel_modal' style="background-color: white; color:white; "> <b> <?= $data_tbl_komite[$a - 1]['status'] == 'DISETUJUI' ? 'SETUJU' : ''  ?> </b></td>
                                                        </tr>

                                                    <?php


                                                    }

                                                    ?>

                                                </table>



                                                </style>


                                            </div>


                                            <div class="card-footer">
                                                <table id='tabel_modal'>

                                                    <tr>
                                                        <td>Nama Komite </td>
                                                        <?php
                                                        $username = $this->model('m_komite')->nama_lengkap_username($data_tbl_komite[$a - 1]['user_create']);
                                                        ?>
                                                        <td><?= $username['nama_lengkap'] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Komite</td>
                                                        <td><?= date('d-m-Y H:i:s', strtotime($data_tbl_komite[$a - 1]['tgl_create'])) ?></td>
                                                    </tr>


                                                </table>
                                            </div>


                                        </div>
                                    </div>
                                <?php
                                } else {
                                ?>

                                    <div class="col-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <b>Komite <?= $a ?></b>
                                            </div>
                                            <div class="card-body">

                                                <table cellpadding=5 cellspacing=15 id='tabel_modal'>

                                                    <tr>
                                                        <td id='td_tabel_modal_ket'>Plafond </td>
                                                        <td id='td_tabel_modal'><?= ""  ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td id='td_tabel_modal_ket'>Jangka Waktu </td>
                                                        <td id='td_tabel_modal'><?= ""  ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td id='td_tabel_modal_ket'>Catatan Komite</td>
                                                        <td id='td_tabel_modal'><textarea disabled style=" border: none; outline: none; background-color: white;" class='form-control' rows='10'><?= "" ?></textarea></td>
                                                    </tr>
                                                    <?php

                                                    if (isset($data_tbl_komite[$a - 1]['status'])) {

                                                        if ($data_tbl_komite[$a - 1]['status'] == "DISETUJUI") {

                                                    ?>
                                                            <tr>
                                                                <td id='td_tabel_modal_ket'>Status </td>
                                                                <td id='td_tabel_modal' style="background-color: blue; color:white; "> <b> <?= isset($data_tbl_komite[$a - 1]['status']) ? $data_tbl_komite[$a - 1]['status']  : "" ?> </b></td>
                                                            </tr>


                                                        <?php } else if ($data_tbl_komite[$a - 1]['status'] == "DITOLAK") {

                                                        ?>

                                                            <tr>
                                                                <td id='td_tabel_modal_ket'>Status </td>
                                                                <td id='td_tabel_modal' style="background-color: red; color:white; "> <b> <?= isset($data_tbl_komite[$a - 1]['status']) ? $data_tbl_komite[$a - 1]['status']  : "" ?> </b></td>
                                                            </tr>

                                                        <?php } else { ?>


                                                            <tr>
                                                                <td id='td_tabel_modal_ket'>Status </td>
                                                                <td id='td_tabel_modal' style="background-color: white; color:white; "> <b> <?= isset($data_tbl_komite[$a - 1]['status']) ? $data_tbl_komite[$a - 1]['status']  : "" ?> </b></td>
                                                            </tr>

                                                        <?php


                                                        }
                                                    } else {


                                                        ?>


                                                        <tr>
                                                            <td id='td_tabel_modal_ket'>Status </td>
                                                            <td id='td_tabel_modal' style="background-color: white; color:white; "> <b> <?= isset($data_tbl_komite[$a - 1]['status']) ? $data_tbl_komite[$a - 1]['status']  : "" ?> </b></td>
                                                        </tr>



                                                    <?php } ?>
                                                </table>


                                            </div>


                                            <div class="card-footer">
                                                <table id='tabel_modal'>

                                                    <tr>
                                                        <td>Nama Komite </td>
                                                        <td></td>

                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Komite </td>
                                                        <td></td>

                                                    </tr>


                                                </table>
                                            </div>


                                        </div>
                                    </div>






                            <?php }
                            } ?>

                        </div>
                    </div>


                    <div class="tab-pane" id="e">
                        <div class="row mt-3">

                            <?php
                            if (isset($data_tbl_keputusan_komite['plafond'])) {
                                $batas_komite = $data_tbl_wawancara['aturan_jumlah_komite'];
                            ?>
                                <!-- jika disetujui -->

                                <div class="col-6">
                                    <div class="card center">
                                        <div class="card-header">
                                            <b style="font-size: 20px;">Keputusan Komite</b>
                                        </div>
                                        <div class="card-body">
                                            <table cellpadding=5 cellspacing=15 id='tabel_modal'>
                                                <tr style="font-size: 20px;">
                                                    <td id='td_tabel_modal_ket'>Plafond </td>
                                                    <td id='td_tabel_modal'><?= number_format($data_tbl_keputusan_komite['plafond'], 0, ',', '.')  ?></td>
                                                </tr>
                                                <tr style="font-size: 20px;">
                                                    <td id='td_tabel_modal_ket'>Jangka Waktu </td>
                                                    <td id='td_tabel_modal'><?= $data_tbl_keputusan_komite['jangka_waktu'] ?></td>
                                                </tr>
                                            </table>
                                            <div class="label text-center mt-3" style="background-color: blue; color:white; ">
                                                <h1><b>DISETUJUI</b></h1>
                                            </div>


                                        </div>
                                    </div>
                                </div>






                            <?php
                            } else if ($data['cek_tgl_tolak'] >= 1) {
                            ?>

                                <div class="col-6">
                                    <div class="card center">
                                        <div class="card-header">
                                            <b style="font-size: 20px;">Keputusan Komite</b>
                                        </div>
                                        <div class="card-body">

                                            <table cellpadding=5 cellspacing=15 id='tabel_modal'>

                                                <tr style="font-size: 20px;">
                                                    <td id='td_tabel_modal_ket'>Plafond </td>
                                                    <td id='td_tabel_modal'>0</td>
                                                </tr>
                                                <tr style="font-size: 20px;">
                                                    <td id='td_tabel_modal_ket'>Jangka Waktu </td>
                                                    <td id='td_tabel_modal'>0</td>
                                                </tr>
                                            </table>


                                            <div class="label text-center mt-3" style="background-color: red; color:white;">
                                                <h1><b>DITOLAK</b></h1>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            <?php } else { ?>


                                <div class="col-6">
                                    <div class="card center">
                                        <div class="card-header">
                                            <b style="font-size: 20px;">Keputusan Komite</b>
                                        </div>
                                        <div class="card-body">

                                            <table cellpadding=5 cellspacing=15 id='tabel_modal'>

                                                <tr style="font-size: 20px;">
                                                    <td id='td_tabel_modal_ket'>Plafond </td>
                                                    <td id='td_tabel_modal'>0</td>
                                                </tr>
                                                <tr style="font-size: 20px;">
                                                    <td id='td_tabel_modal_ket'>Jangka Waktu </td>
                                                    <td id='td_tabel_modal'>0</td>
                                                </tr>
                                            </table>




                                        </div>
                                    </div>
                                </div>





                            <?php } ?>










                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>







<!-- bagian ini untuk mengatur mengubah inputan menjadi ribuan ketika terjadi perubahan -->
<script>
    var plafond = $("#plafond")
    var jangka_waktu = $("#jangka_waktu")
    var dasar_pertimbangan_analis = $("textarea#dasar_pertimbangan_analis")

    var n_plafond, n_jangka_wakttu, n_dasar_pertimbangan_analis;

    $(document).ready(function() {
        n_plafond = plafond.val()
        n_jangka_waktu = jangka_waktu.val()
        n_dasar_pertimbangan_analis = dasar_pertimbangan_analis.val()
    })

    plafond.keyup(function() {
        plafond.val(angka(plafond.val().toString()))
    })

    jangka_waktu.keyup(function() {
        jangka_waktu.val(angka(jangka_waktu.val().toString()))
    })

    dasar_pertimbangan_analis.keyup(function() {
        dasar_pertimbangan_analis.val(angka(dasar_pertimbangan_analis.val().toString()))
    })
</script>




<!-- bagian ini handel menampilkan data dari modal proses komite ke modal pin keamanan ketika tombol approve di tekan -->
<script>
    $(document).ready(function() {
        $('#modal_approve').on('show.bs.modal', function(e) {
            var nilai = $(e.relatedTarget)

            var plafond_usulan = nilai.data('plafond-usulan')
            var no_permohoan_kredit = nilai.data('no_permohonan_kredit')
            var no_permohoan_kredit2 = nilai.data('no_permohonan_kredit2')
            var nama_pemohon = nilai.data('nama_pemohon')
            var nama_instansi = nilai.data('nama_instansi')



            var modal = $('#modal_approve');

            modal.find('#no_permohonan_kredit2').html(no_permohoan_kredit2)
            modal.find('#nama_pemohon').val(nama_pemohon)
            modal.find('#nama_instansi').html(nama_instansi)
            modal.find('#no_permohonan_kredit').val(no_permohoan_kredit)
            modal.find('#plafond_usulan').html(plafond_usulan)
            modal.find('#plafond_disetujui').html(angka($('#plafond').val().toString()))
            modal.find('#jangka_waktu').html(angka($('#jangka_waktu').val().toString()))
            modal.find('#suku_bunga').html(nilai.data('suku_bunga'))
            modal.find('#penambahan').html(nilai.data('penambahan'))
            modal.find('#provisi_kredit').html(nilai.data('provisi_kredit'))
            modal.find('#administrasi_kredit').html(nilai.data('administrasi_kredit'))
            modal.find('#angsuran_perbulan').html(nilai.data('angsuran_perbulan'))
            modal.find('#premi_asuransi').html(nilai.data('premi_asuransi'))
            modal.find('#tabungan').html(nilai.data('tabungan'))
            modal.find('#biaya_notaris').html(nilai.data('biaya_notaris'))
            modal.find('#biaya_apht').html(nilai.data('biaya_apht'))
            modal.find('#asuransi_kerugian').html(nilai.data('asuransi_kerugian'))
            modal.find('textarea#dasar_pertimbangan_analis').html($('textarea#dasar_pertimbangan_analis').val())
        })
    })






    $(document).ready(function() {
        $('#modal_reject').on('show.bs.modal', function(e) {
            // var nilai = $(e.relatedTarget)
            // var no_permohoan_kredit = nilai.data('no_permohonan_kredit')
            // var modal = $('#modal_reject');
            // modal.find('#no_permohonan_kredit_reject').val(no_permohoan_kredit)


            var nilai = $(e.relatedTarget)

            var plafond_usulan = nilai.data('plafond-usulan')
            var no_permohoan_kredit = nilai.data('no_permohonan_kredit')
            var no_permohoan_kredit2 = nilai.data('no_permohonan_kredit2')
            var nama_pemohon = nilai.data('nama_pemohon')
            var nama_instansi = nilai.data('nama_instansi')



            var modal = $('#modal_reject');

            modal.find('#no_permohonan_kredit2').html(no_permohoan_kredit2)
            modal.find('#nama_pemohon').val(nama_pemohon)
            modal.find('#nama_instansi').html(nama_instansi)
            modal.find('#no_permohonan_kredit').val(no_permohoan_kredit)
            modal.find('#plafond_usulan').html(plafond_usulan)
            modal.find('#plafond_disetujui').html(angka($('#plafond').val().toString()))
            modal.find('#jangka_waktu').html(angka($('#jangka_waktu').val().toString()))
            modal.find('#suku_bunga').html(nilai.data('suku_bunga'))
            modal.find('#penambahan').html(nilai.data('penambahan'))
            modal.find('#provisi_kredit').html(nilai.data('provisi_kredit'))
            modal.find('#administrasi_kredit').html(nilai.data('administrasi_kredit'))
            modal.find('#angsuran_perbulan').html(nilai.data('angsuran_perbulan'))
            modal.find('#premi_asuransi').html(nilai.data('premi_asuransi'))
            modal.find('#tabungan').html(nilai.data('tabungan'))
            modal.find('#biaya_notaris').html(nilai.data('biaya_notaris'))
            modal.find('#biaya_apht').html(nilai.data('biaya_apht'))
            modal.find('#asuransi_kerugian').html(nilai.data('asuransi_kerugian'))
            modal.find('textarea#dasar_pertimbangan_analis').html($('textarea#dasar_pertimbangan_analis').val())

        })
    })


    $(document).ready(function() {
        $('#modal_pending').on('show.bs.modal', function(e) {
            var nilai = $(e.relatedTarget)
            var plafond_usulan = nilai.data('plafond-usulan')
            var no_permohoan_kredit = nilai.data('no_permohonan_kredit')
            var no_permohoan_kredit2 = nilai.data('no_permohonan_kredit2')
            var nama_pemohon = nilai.data('nama_pemohon')
            var nama_instansi = nilai.data('nama_instansi')



            var modal = $('#modal_pending');

            modal.find('#no_permohonan_kredit2').html(no_permohoan_kredit2)
            modal.find('#nama_pemohon').val(nama_pemohon)
            modal.find('#nama_instansi').html(nama_instansi)
            modal.find('#no_permohonan_kredit').val(no_permohoan_kredit)
            modal.find('#plafond_usulan').html(plafond_usulan)
            modal.find('#plafond_disetujui').html(angka($('#plafond').val().toString()))
            modal.find('#jangka_waktu').html(angka($('#jangka_waktu').val().toString()))
            modal.find('#suku_bunga').html(nilai.data('suku_bunga'))
            modal.find('#penambahan').html(nilai.data('penambahan'))
            modal.find('#provisi_kredit').html(nilai.data('provisi_kredit'))
            modal.find('#administrasi_kredit').html(nilai.data('administrasi_kredit'))
            modal.find('#angsuran_perbulan').html(nilai.data('angsuran_perbulan'))
            modal.find('#premi_asuransi').html(nilai.data('premi_asuransi'))
            modal.find('#tabungan').html(nilai.data('tabungan'))
            modal.find('#biaya_notaris').html(nilai.data('biaya_notaris'))
            modal.find('#biaya_apht').html(nilai.data('biaya_apht'))
            modal.find('#asuransi_kerugian').html(nilai.data('asuransi_kerugian'))
            modal.find('textarea#dasar_pertimbangan_analis').html($('textarea#dasar_pertimbangan_analis').val())
        })
    })
</script>




<!-- bagian fungsi mengubah angka -->
<script>
    function angka(angka, prefix) {
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


<!-- fungsi ini untuk mengatur inputan agar hanya angka saja yang di input -->
<script>
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
        return true;
    }
</script>



















<!-- 
<style>
    .noPadding td {
        padding: 5px;
    }
</style> -->



<!-- tesssss -->





<!-- tesssss -->


<script>
    // $(document).ready(function() {
    //     var plafond_disetujui = $('#plafond').val();

    // })

    // $("#plafond").keyup(function() {
    //     var plafond_disetujui = $('#plafond').val();

    // })



    // $(document).ready(function() {
    //     var jangka_waktu = $('#jangka_waktu').val();

    // })

    // $("#jangka_waktu").keyup(function() {
    //     var jangka_waktu = $('#jangka_waktu').val();
    // })


    // $(document).ready(function() {
    //     var dasar_pertimbangan_analis = $('textarea#dasar_pertimbangan_analis').val();

    // })

    // $("textarea#dasar_pertimbangan_analis").keyup(function() {
    //     var dasar_pertimbangan_analis = $('textarea#dasar_pertimbangan_analis').val();
    //     console.log(dasar_pertimbangan_analis)
    // })
</script>






<script>
    // // modal proses komite tabel slik
    // $(document).ready(function() {
    //     $('#tbl_daftar_slik_pemohon').DataTable();
    // })
    // $(document).ready(function() {
    //     $('#tbl_daftar_slik_pasangan').DataTable();
    // })

    // function hanyaAngka(evt) {
    //     var charCode = (evt.which) ? evt.which : event.keyCode
    //     if (charCode > 31 && (charCode < 48 || charCode > 57))

    //         return false;
    //     return true;
    // }

    // function ubah_input(angka, prefix) {


    //     // tambahkan titik jika yang di input sudah menjadi angka ribuan


    //     if (parseFloat(angka) >= 0) {

    //         var number_string = angka.replace(/[^,\d]/g, '').toString(),
    //             split = number_string.split(','),
    //             sisa = split[0].length % 3,
    //             plafond = split[0].substr(0, sisa),
    //             ribuan = split[0].substr(sisa).match(/\d{3}/gi);


    //         if (ribuan) {
    //             separator = sisa ? '.' : '';
    //             plafond += separator + ribuan.join('.');
    //         }

    //         plafond = split[1] != undefined ? plafond + ',' + split[1] : plafond;
    //         return prefix == undefined ? plafond : (plafond ? plafond : '');
    //     } else {



    //         angka = angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    //         return prefix == undefined ? angka : (angka ? angka : '');
    //     }

    // }



    // var plafond = $('#plafond');
    // $(document).keyup(function() {
    //     plafond.val(ubah_input(plafond.val().toString()))
    // })










    // $(document).ready(function() {
    //     $('#modal_approve').on('show.bs.modal', function(e) {
    //         var nilai = $(e.relatedTarget)

    //         var plafond_usulan = nilai.data('plafond-usulan')
    //         var no_permohoan_kredit = nilai.data('no_permohonan_kredit')
    //         var no_permohoan_kredit2 = nilai.data('no_permohonan_kredit2')
    //         var nama_pemohon = nilai.data('nama_pemohon')
    //         var nama_instansi = nilai.data('nama_instansi')



    //         var modal = $('#modal_approve');

    //         modal.find('#no_permohonan_kredit2').html(no_permohoan_kredit2)
    //         modal.find('#nama_pemohon').val(nama_pemohon)
    //         modal.find('#nama_instansi').html(nama_instansi)
    //         modal.find('#no_permohonan_kredit').val(no_permohoan_kredit)
    //         modal.find('#plafond_usulan').html(plafond_usulan)
    //         modal.find('#plafond_disetujui').html(ubah_input($('#plafond').val().toString()))
    //         modal.find('#jangka_waktu').html(ubah_input($('#jangka_waktu').val().toString()))
    //         modal.find('#suku_bunga').html(nilai.data('suku_bunga'))
    //         modal.find('#penambahan').html(nilai.data('penambahan'))
    //         modal.find('#provisi_kredit').html(nilai.data('provisi_kredit'))
    //         modal.find('#administrasi_kredit').html(nilai.data('administrasi_kredit'))
    //         modal.find('#angsuran_perbulan').html(nilai.data('angsuran_perbulan'))
    //         modal.find('#premi_asuransi').html(nilai.data('premi_asuransi'))
    //         modal.find('#tabungan').html(nilai.data('tabungan'))
    //         modal.find('#biaya_notaris').html(nilai.data('biaya_notaris'))
    //         modal.find('#biaya_apht').html(nilai.data('biaya_apht'))
    //         modal.find('#asuransi_kerugian').html(nilai.data('asuransi_kerugian'))
    //         modal.find('textarea#dasar_pertimbangan_analis').html($('textarea#dasar_pertimbangan_analis').val())

    //     })
    // })






    // $(document).ready(function() {
    //     $('#modal_reject').on('show.bs.modal', function(e) {
    //         var data_modal = $(e.relatedTarget)

    //         var no_permohonan_kredit = data_modal.data('no_permohonan_kredit');
    //         var modal = $(this);

    //         modal.find('#no_permohonan_kredit_reject').val(no_permohonan_kredit)


    //     })
    // })













    // function ubah_input(angka, prefix) {


    //     // tambahkan titik jika yang di input sudah menjadi angka ribuan


    //     if (parseFloat(angka) >= 0) {

    //         var number_string = angka.replace(/[^,\d]/g, '').toString(),
    //             split = number_string.split(','),
    //             sisa = split[0].length % 3,
    //             plafond = split[0].substr(0, sisa),
    //             ribuan = split[0].substr(sisa).match(/\d{3}/gi);


    //         if (ribuan) {
    //             separator = sisa ? '.' : '';
    //             plafond += separator + ribuan.join('.');
    //         }

    //         plafond = split[1] != undefined ? plafond + ',' + split[1] : plafond;
    //         return prefix == undefined ? plafond : (plafond ? plafond : '');
    //     } else {



    //         angka = angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    //         return prefix == undefined ? angka : (angka ? angka : '');
    //     }

    // }
</script>