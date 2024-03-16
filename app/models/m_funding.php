<?php

date_default_timezone_set('Asia/Makassar');

class m_funding
{
    public function __construct()
    {
        $this->db = new Database;
    }

    public function cabang()
    {
        $this->db->query('SELECT * FROM tbl_cabang order by kode_cabang ASC');
        return $this->db->resultSet();
    }
    public function cek_ktp()
    {
        $this->db->query('SELECT * FROM tbl_nasabah_priority WHERE nomor_identitas = :nomor_identitas');
        $this->db->bind('nomor_identitas', $_POST['nomor_identitas']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cek_nasabah_priority()
    {
        $this->db->query('SELECT * FROM tbl_nasabah_priority WHERE nomor_identitas = :nomor_identitas');
        $this->db->bind('nomor_identitas', $_POST['nomor_identitas']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function simpan_data_nasabah()
    {
        $query = "INSERT INTO tbl_nasabah_priority
        (
            nomor_identitas,
            jenis_kartu_identitas,
            nama_deposan,
            cif,
            nominal_deposito,
            nilai_akumulasi_deposito,
            nama_cabang,
            user_add,
            date_add
        )
        values 
        (
            :nomor_identitas,
            :jenis_kartu_identitas,
            :nama_deposan,
            :cif,
            :nominal_deposito,
            :nilai_akumulasi_deposito,
            :nama_cabang,
            :user_add,
            :date_add 
        )";
        $this->db->query($query);
        $kartu_identitas = $_POST['jenis_kartu_identitas'];
        if ($kartu_identitas == 'LAINNYA') {
            $this->db->bind('jenis_kartu_identitas',  $_POST['identitas_lain']);
            $this->db->bind('nomor_identitas',  $_POST['nomor_identitas_lain']);
        } else {
            $this->db->bind('jenis_kartu_identitas',  $_POST['jenis_kartu_identitas']);
            $this->db->bind('nomor_identitas',  $_POST['nomor_ktp']);
        }
        $this->db->bind('nama_deposan',  $_POST['nama_deposan']);
        $this->db->bind('cif',  $_POST['cif']);
        $this->db->bind('nominal_deposito', str_replace(".", "",  $_POST['nominal_deposito']));
        $this->db->bind('nilai_akumulasi_deposito', str_replace(".", "",  $_POST['akumulasi_deposito']));
        $this->db->bind('nama_cabang',  $_COOKIE['nama_cabang']);
        $this->db->bind('user_add',  $_POST['user_add']);
        $this->db->bind('date_add',  date("Y-m-d H:i:s"));
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function update_data_nasabah()
    {
        $query = "UPDATE tbl_nasabah_priority SET
       nama_cabang = :nama_cabang,
       cif = :cif,
       nama_deposan = :nama_deposan,
       nominal_deposito = :nominal_deposito,
       nilai_akumulasi_deposito = :nilai_akumulasi_deposito
       WHERE nomor_identitas = :nomor_identitas";
        $this->db->query($query);
        $this->db->bind('nomor_identitas',  $_POST['nomor_identitas']);
        $this->db->bind('nama_cabang',  $_POST['nama_cabang']);
        $this->db->bind('cif',  $_POST['cif']);
        $this->db->bind('nama_deposan',  $_POST['nama_deposan']);
        $this->db->bind('nominal_deposito', str_replace(".", "",  $_POST['nominal_deposito']));
        $this->db->bind('nilai_akumulasi_deposito', str_replace(".", "",  $_POST['akumulasi_deposito']));
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapus_data_nasabah()
    {
        // Ambil data yang akan dihapus dari tbl_nasabah_priority
        $query_select = "SELECT * FROM tbl_nasabah_priority WHERE nomor_identitas = :nomor_identitas";
        $this->db->query($query_select);
        $this->db->bind('nomor_identitas', $_POST['nomor_identitas']);
        $data_to_move = $this->db->single();

        // Salin data yang akan dihapus ke history_nasabah
        $query_insert = "INSERT INTO history_nasabah_priority (nomor_identitas,jenis_kartu_identitas, cif, nama_deposan, nominal_deposito, nilai_akumulasi_deposito, status_nasabah, nama_cabang, user_add, user_delete, alasan_hapus, date_add) 
                        VALUES (:nomor_identitas, :jenis_kartu_identitas, :cif, :nama_deposan, :nominal_deposito, :nilai_akumulasi_deposito, :status_nasabah, :nama_cabang, :user_add, :user_delete, :alasan_hapus, :date_add)";
        $this->db->query($query_insert);
        $this->db->bind(':nomor_identitas', $data_to_move['nomor_identitas']);
        $this->db->bind(':jenis_kartu_identitas', $data_to_move['jenis_kartu_identitas']);
        $this->db->bind(':cif', $data_to_move['cif']);
        $this->db->bind(':nama_deposan', $data_to_move['nama_deposan']);
        $this->db->bind(':nominal_deposito', $data_to_move['nominal_deposito']);
        $this->db->bind(':nilai_akumulasi_deposito', $data_to_move['nilai_akumulasi_deposito']);
        $this->db->bind(':status_nasabah', $data_to_move['status_nasabah']);
        $this->db->bind(':nama_cabang', $data_to_move['nama_cabang']);
        $this->db->bind(':user_add', $data_to_move['user_add']);
        $this->db->bind(':user_delete', $_COOKIE['username']); // Sesuaikan dengan mekanisme autentikasi yang Anda gunakan
        $this->db->bind(':alasan_hapus', $_POST['alasan_hapus']);
        $this->db->bind(':date_add', $data_to_move['date_add']);
        $this->db->execute();

        // Hapus data dari tbl_nasabah_priority
        $query_delete = "DELETE FROM tbl_nasabah_priority WHERE nomor_identitas= :nomor_identitas";
        $this->db->query($query_delete);
        $this->db->bind('nomor_identitas', $_POST['nomor_identitas']);
        $this->db->execute();

        return $this->db->rowCount();
    }




    public function simpan_data_suku_bunga()
    {
        $jp = $_POST['jenis_produk'];
        // $nominal = filter_var($_POST['nominal'], FILTER_SANITIZE_NUMBER_INT);

        // echo $jp;
        if ($jp == 'SI MITRA') {
            $query = "INSERT INTO tbl_rc_permohonan
            (
                id_permohonan,
                kantor_cabang,
                username,
                tgl_permohonan,
                jenis_permohonan,
                jenis_produk,
                jenis_kartu_identitas,
                nomor_identitas,
                nama_nasabah,
                status_nasabah,
                alamat,
                nomor_telepon,
                nominal,
                nilai_suku_bunga_pengajuan,
                suku_bunga_counter,
                nama_keluarga,
                nilai_akumulasi_simpanan,
                cif_keluarga,
                nomor_telepon_keluarga,
                keterangan_funding,
                user_create,
                ttd_nasabah,
                nama_gambar_bukti,
                status_permohonan
            )
            values 
            (
                :id_permohonan,
                :kantor_cabang,
                :username, 
                :tgl_permohonan,
                :jenis_permohonan,
                :jenis_produk,
                :jenis_kartu_identitas,
                :nomor_identitas,
                :nama_nasabah,
                :status_nasabah,
                :alamat,
                :nomor_telepon,
                :nominal,
                :nilai_suku_bunga_pengajuan,
                :suku_bunga_counter,
                :nama_keluarga,
                :nilai_akumulasi_simpanan,
                :cif_keluarga,
                :nomor_telepon_keluarga,
                :keterangan_funding,
                :user_create,
                :ttd_nasabah,
                :nama_gambar_bukti,
                :status_permohonan
            )";
            $this->db->query($query);
            $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
            $this->db->bind('kantor_cabang',  $_POST['kantor_cabang']);
            $this->db->bind('username',  $_POST['nama_funding']);
            $this->db->bind('tgl_permohonan',  date("Y-m-d H:i:s"));
            $this->db->bind('jenis_permohonan',  'SUKU BUNGA KHUSUS');
            $this->db->bind('jenis_produk',  $_POST['jenis_produk']);
            $kartu_identitas = $_POST['jenis_kartu_identitas'];
            if ($kartu_identitas == 'LAINNYA') {
                $this->db->bind('jenis_kartu_identitas',  $_POST['identitas_lain']);
                $this->db->bind('nomor_identitas',  $_POST['nomor_identitas_lain']);
            } else {
                $this->db->bind('jenis_kartu_identitas',  $_POST['jenis_kartu_identitas']);
                $this->db->bind('nomor_identitas',  $_POST['nomor_ktp']);
            }
            $this->db->bind('nama_nasabah',  $_POST['nama_nasabah']);
            $this->db->bind('status_nasabah',  $_POST['status_nasabah']);
            $this->db->bind('alamat',  $_POST['alamat']);
            $this->db->bind('nomor_telepon',  $_POST['nomor_telepon']);
            // $this->db->bind('nominal',  $nominal);
            $this->db->bind('nominal', str_replace(".", "",  $_POST['nominal']));
            $this->db->bind('nilai_suku_bunga_pengajuan',  $_POST['suku_bunga_pengajuan']);
            $this->db->bind('suku_bunga_counter',  $_POST['suku_bunga_counter']);
            $this->db->bind('nama_keluarga',  $_POST['nama_keluarga']);
            $this->db->bind('nilai_akumulasi_simpanan', str_replace(".", "",  $_POST['nilai_akumulasi_simpanan']));
            $this->db->bind('cif_keluarga',  $_POST['cif_keluarga']);
            $this->db->bind('nomor_telepon_keluarga',  $_POST['nomor_telepon_keluarga']);
            $this->db->bind('keterangan_funding',  $_POST['keterangan_funding']);
            $this->db->bind('user_create',  $_POST['nama_funding']);
            $this->db->bind('ttd_nasabah',  $_POST['ttd_nasabah']);
            $this->db->bind('nama_gambar_bukti',  $_POST['bukti_ttd']);
            $this->db->bind('status_permohonan',  'DIAJUKAN');
            $this->db->execute();
            return $this->db->rowCount();
        } else {
            $query = "INSERT INTO tbl_rc_permohonan
            (
                id_permohonan,
                kantor_cabang,
                username,
                tgl_permohonan,
                jenis_permohonan,
                jenis_produk,
                jangka_waktu,
                jenis_kartu_identitas,
                nomor_identitas,
                nama_nasabah,
                status_nasabah,
                alamat,
                nomor_telepon,
                nominal,
                nilai_suku_bunga_pengajuan,
                suku_bunga_counter,
                nama_keluarga,
                nilai_akumulasi_simpanan,
                cif_keluarga,
                nomor_telepon_keluarga,
                keterangan_funding,
                user_create,
                ttd_nasabah,
                nama_gambar_bukti,
                status_permohonan
            )
            values 
            (
               :id_permohonan,
               :kantor_cabang,
               :nama_funding,
               :tgl_permohonan,
               :jenis_permohonan,
               :jenis_produk,
               :jangka_waktu,
               :jenis_kartu_identitas,
               :nomor_identitas,
               :nama_nasabah,
               :status_nasabah,
               :alamat,
               :nomor_telepon,
               :nominal,
               :nilai_suku_bunga_pengajuan,
               :suku_bunga_counter,
               :nama_keluarga,
               :nilai_akumulasi_simpanan,
               :cif_keluarga,
               :nomor_telepon_keluarga,
               :keterangan_funding,
               :user_create,
               :ttd_nasabah,
               :nama_gambar_bukti,
               :status_permohonan
            )";
            $this->db->query($query);
            $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
            $this->db->bind('kantor_cabang',  $_POST['kantor_cabang']);
            $this->db->bind('nama_funding',  $_POST['nama_funding']);
            $this->db->bind('tgl_permohonan',  date("Y-m-d H:i:s"));
            $this->db->bind('jenis_permohonan',  'SUKU BUNGA KHUSUS');
            $this->db->bind('jenis_produk',  $_POST['jenis_produk']);
            $this->db->bind('jangka_waktu',  $_POST['jangka_waktu']);
            $kartu_identitas = $_POST['jenis_kartu_identitas'];
            if ($kartu_identitas == 'LAINNYA') {
                $this->db->bind('jenis_kartu_identitas',  $_POST['identitas_lain']);
                $this->db->bind('nomor_identitas',  $_POST['nomor_identitas_lain']);
            } else {
                $this->db->bind('jenis_kartu_identitas',  $_POST['jenis_kartu_identitas']);
                $this->db->bind('nomor_identitas',  $_POST['nomor_ktp']);
            }
            $this->db->bind('nama_nasabah',  $_POST['nama_nasabah']);
            $this->db->bind('status_nasabah',  $_POST['status_nasabah']);
            $this->db->bind('alamat',  $_POST['alamat']);
            $this->db->bind('nomor_telepon',  $_POST['nomor_telepon']);
            $this->db->bind('nominal', str_replace(".", "",  $_POST['nominal']));
            $this->db->bind('nilai_suku_bunga_pengajuan',  $_POST['suku_bunga_pengajuan']);
            $this->db->bind('suku_bunga_counter',  $_POST['suku_bunga_counter']);
            $this->db->bind('nama_keluarga',  $_POST['nama_keluarga']);
            $this->db->bind('nilai_akumulasi_simpanan', str_replace(".", "",  $_POST['nilai_akumulasi_simpanan']));
            $this->db->bind('cif_keluarga',  $_POST['cif_keluarga']);
            $this->db->bind('nomor_telepon_keluarga',  $_POST['nomor_telepon_keluarga']);
            $this->db->bind('keterangan_funding',  $_POST['keterangan_funding']);
            $this->db->bind('user_create',  $_POST['nama_funding']);
            $this->db->bind('ttd_nasabah',  $_POST['ttd_nasabah']);
            $this->db->bind('nama_gambar_bukti',  $_POST['nama_gambar_bukti']);
            $this->db->bind('status_permohonan',  'DIAJUKAN');
            $this->db->execute();
            return $this->db->rowCount();
        }
    }

    public function update_data_suku_bunga()
    {
        $jp = $_POST['jenis_produk'];

        // echo $jp;
        if ($jp == 'SI MITRA') {
            $query = "UPDATE tbl_rc_permohonan SET 
                jenis_produk = :jenis_produk,
                jenis_kartu_identitas = :jenis_kartu_identitas,
                nomor_identitas = :nomor_identitas,
                nama_nasabah = :nama_nasabah,
                status_nasabah = :status_nasabah,
                alamat = :alamat,
                nomor_telepon = :nomor_telepon,
                nominal = :nominal,
                jangka_waktu = :jangka_waktu,
                nomor_rekening_deposito = :nomor_rekening_deposito,
                nilai_suku_bunga_pengajuan = :nilai_suku_bunga_pengajuan,
                suku_bunga_counter = :suku_bunga_counter,
                nama_keluarga = :nama_keluarga,
                nilai_akumulasi_simpanan = :nilai_akumulasi_simpanan,
                cif_keluarga = :cif_keluarga,
                nomor_telepon_keluarga = :nomor_telepon_keluarga,
                keterangan_funding = :keterangan_funding,
                status_permohonan = :status_permohonan
                WHERE id_permohonan= :id_permohonan";

            $this->db->query($query);
            $this->db->bind('id_permohonan', $_POST['id_permohonan']);
            $this->db->bind('jenis_produk',  $_POST['jenis_produk']);
            $kartu_identitas = $_POST['jenis_kartu_identitas'];
            if ($kartu_identitas == 'LAINNYA') {
                $this->db->bind('jenis_kartu_identitas',  $_POST['identitas_lain']);
                $this->db->bind('nomor_identitas',  $_POST['nomor_identitas_lain']);
            } else {
                $this->db->bind('jenis_kartu_identitas',  $_POST['jenis_kartu_identitas']);
                $this->db->bind('nomor_identitas',  $_POST['nomor_ktp']);
            }
            $this->db->bind('nama_nasabah',  $_POST['nama_nasabah']);
            $this->db->bind('status_nasabah',  $_POST['status_nasabah']);
            $this->db->bind('alamat',  $_POST['alamat']);
            $this->db->bind('nomor_telepon',  $_POST['nomor_telepon']);
            $this->db->bind('nominal', str_replace(".", "",  $_POST['nominal']));
            $this->db->bind('jangka_waktu', '');
            $this->db->bind('nomor_rekening_deposito',  '');
            $this->db->bind('nilai_suku_bunga_pengajuan',  $_POST['suku_bunga_pengajuan']);
            $this->db->bind('suku_bunga_counter',  $_POST['suku_bunga_counter']);
            $this->db->bind('nama_keluarga',  $_POST['nama_keluarga']);
            $this->db->bind('nilai_akumulasi_simpanan', str_replace(".", "",  $_POST['nilai_akumulasi_simpanan']));
            $this->db->bind('cif_keluarga',  $_POST['cif_keluarga']);
            $this->db->bind('nomor_telepon_keluarga',  $_POST['nomor_telepon_keluarga']);
            $this->db->bind('keterangan_funding',  $_POST['keterangan_funding']);
            $this->db->bind('status_permohonan',  'DIAJUKAN');
            $this->db->execute();
            return $this->db->rowCount();
        } else {
            $query = "UPDATE tbl_rc_permohonan SET 
            jenis_produk = :jenis_produk,
            jenis_kartu_identitas = :jenis_kartu_identitas,
            nomor_identitas = :nomor_identitas,
            nama_nasabah = :nama_nasabah,
            status_nasabah = :status_nasabah,
            alamat = :alamat,
            nomor_telepon = :nomor_telepon,
            nominal = :nominal,
            jangka_waktu = :jangka_waktu,
            nomor_rekening_deposito = :nomor_rekening_deposito,
            nilai_suku_bunga_pengajuan = :nilai_suku_bunga_pengajuan,
            suku_bunga_counter = :suku_bunga_counter,
            nama_keluarga = :nama_keluarga,
            nilai_akumulasi_simpanan = :nilai_akumulasi_simpanan,
            cif_keluarga = :cif_keluarga,
            nomor_telepon_keluarga = :nomor_telepon_keluarga,
            keterangan_funding = :keterangan_funding,
            status_permohonan = :status_permohonan
            WHERE id_permohonan= :id_permohonan";

            $this->db->query($query);
            $this->db->bind('id_permohonan', $_POST['id_permohonan']);
            $this->db->bind('jenis_produk',  $_POST['jenis_produk']);
            $kartu_identitas = $_POST['jenis_kartu_identitas'];
            if ($kartu_identitas == 'LAINNYA') {
                $this->db->bind('jenis_kartu_identitas',  $_POST['identitas_lain']);
                $this->db->bind('nomor_identitas',  $_POST['nomor_identitas_lain']);
            } else {
                $this->db->bind('jenis_kartu_identitas',  $_POST['jenis_kartu_identitas']);
                $this->db->bind('nomor_identitas',  $_POST['nomor_ktp']);
            }
            $this->db->bind('nama_nasabah',  $_POST['nama_nasabah']);
            $this->db->bind('status_nasabah',  $_POST['status_nasabah']);
            $this->db->bind('alamat',  $_POST['alamat']);
            $this->db->bind('nomor_telepon',  $_POST['nomor_telepon']);
            $this->db->bind('nominal', str_replace(".", "",  $_POST['nominal']));
            $this->db->bind('jangka_waktu',  $_POST['jangka_waktu']);
            $this->db->bind('nomor_rekening_deposito',  $_POST['norek_deposito']);
            $this->db->bind('nilai_suku_bunga_pengajuan',  $_POST['suku_bunga_pengajuan']);
            $this->db->bind('suku_bunga_counter',  $_POST['suku_bunga_counter']);
            $this->db->bind('nama_keluarga',  $_POST['nama_keluarga']);
            $this->db->bind('nilai_akumulasi_simpanan', str_replace(".", "",  $_POST['nilai_akumulasi_simpanan']));
            $this->db->bind('cif_keluarga',  $_POST['cif_keluarga']);
            $this->db->bind('nomor_telepon_keluarga',  $_POST['nomor_telepon_keluarga']);
            $this->db->bind('keterangan_funding',  $_POST['keterangan_funding']);
            $this->db->bind('status_permohonan',  'DIAJUKAN');
            $this->db->execute();
            return $this->db->rowCount();
        }
    }

    //  bagian form pengajuan ulang
    public function update_pengajuan_ulang_suku_bunga()
    {
        $query = "UPDATE tbl_rc_permohonan SET 
                 nominal = :nominal,
                 jangka_waktu = :jangka_waktu,
                 nilai_suku_bunga_pengajuan = :nilai_suku_bunga_pengajuan,
                 keterangan_funding = :keterangan_funding,
                 status_permohonan = :status_permohonan,
                 tgl_pengajuan_ulang = :tgl_pengajuan_ulang,
                 history_permohonan = :history_permohonan
                 WHERE id_permohonan = :id_permohonan";
        $this->db->query($query);
        $this->db->bind('id_permohonan', $_POST['id_permohonan']);
        $this->db->bind('nominal', str_replace(".", "",  $_POST['nominal']));
        $this->db->bind('jangka_waktu', $_POST['jangka_waktu']);
        $this->db->bind('nilai_suku_bunga_pengajuan', $_POST['suku_bunga_pengajuan']);
        $this->db->bind('keterangan_funding', $_POST['keterangan_funding']);
        $this->db->bind('status_permohonan', 'DIAJUKAN ULANG');
        if ($_POST['jenis_produk'] == 'SI DEKA') {
            //  if (isset($_POST['tgl_pengajuan_ulang']) && is_null($_POST['tgl_pengajuan_ulang'])) {
            if (empty($_POST['tgl_pengajuan_awal'])) {
                $this->db->bind('history_permohonan', " - Nominal : " . $_POST['nominal_awal'] . ", Jangka Waktu : " . $_POST['jangka_waktu_awal'] . ", Suku Bunga yang Diajukan : " . $_POST['suku_bunga_awal'] . ", Keterangan Funding : " . $_POST['keterangan_awal'] . ", Tanggal Permohonan : " . date('d F Y', strtotime($_POST['tgl_permohonan_awal'])) . ", Suku Bunga yang Diapprove : " . $_POST['approval_awal'] . ", Keterangan Approval : " . $_POST['keterangan_approval_awal'] . ", Tanggal Approval : " . date('d F Y', strtotime($_POST['tgl_approval_awal'])));
            } else {
                $this->db->bind('history_permohonan', $_POST['history_permohonan'] . "\n" . " - Nominal : " . $_POST['nominal_awal'] . ", Jangka Waktu : " . $_POST['jangka_waktu_awal'] . ", Suku Bunga yang Diajukan : " . $_POST['suku_bunga_awal'] . ", Keterangan Funding : " . $_POST['keterangan_awal'] . ", Tanggal Permohonan : " . date('d F Y', strtotime($_POST['tgl_pengajuan_awal'])) . ", Suku Bunga yang Diapprove : " . $_POST['approval_awal'] . ", Keterangan Approval : " . $_POST['keterangan_approval_awal'] . ", Tanggal Approval : " . date('d F Y', strtotime($_POST['tgl_approval_awal'])));
            }
        } else {
            //  if (isset($_POST['tgl_pengajuan_ulang']) && is_null($_POST['tgl_pengajuan_ulang'])) {
            if (empty($_POST['tgl_pengajuan_awal'])) {
                $this->db->bind('history_permohonan', " - Nominal : " . $_POST['nominal_awal'] . ", Suku Bunga yang Diajukan : " . $_POST['suku_bunga_awal'] . ", Keterangan Funding : " . $_POST['keterangan_awal'] . ", Tanggal Permohonan : " . date('d F Y', strtotime($_POST['tgl_permohonan_awal'])) . ", Suku Bunga yang Diapprove : " . $_POST['approval_awal'] . ", Keterangan Approval : " . $_POST['keterangan_approval_awal'] . ", Tanggal Approval : " . date('d F Y', strtotime($_POST['tgl_approval_awal'])));
            } else {
                $this->db->bind('history_permohonan', $_POST['history_permohonan'] . "\n - Nominal : " . $_POST['nominal_awal'] . ", Suku Bunga yang Diajukan : " . $_POST['suku_bunga_awal'] . ", Keterangan Funding : " . $_POST['keterangan_awal'] . ", Tanggal Permohonan : " . date('d F Y', strtotime($_POST['tgl_pengajuan_awal'])) . ", Suku Bunga yang Diapprove : " . $_POST['approval_awal'] . ", Keterangan Approval : " . $_POST['keterangan_approval_awal'] . ", Tanggal Approval : " . date('d F Y', strtotime($_POST['tgl_approval_awal'])));
            }
        }
        $this->db->bind('tgl_pengajuan_ulang', date("Y-m-d H:i:s"));
        $this->db->execute();
        return $this->db->rowCount();
    }

    // ini yang fix
    public function update_pengajuan_ulang_pencairan()
    {
        $query = "UPDATE tbl_rc_permohonan SET 
                jenis_permohonan_pencairan_sebelum_jt_pengajuan = :jenis_permohonan_pencairan_sebelum_jt_pengajuan,
                keterangan_funding = :keterangan_funding,
                status_permohonan = :status_permohonan,
                tgl_pengajuan_ulang = :tgl_pengajuan_ulang,
                history_permohonan = :history_permohonan
                WHERE id_permohonan = :id_permohonan";
        $this->db->query($query);
        $this->db->bind('id_permohonan', $_POST['id_permohonan']);
        $this->db->bind('jenis_permohonan_pencairan_sebelum_jt_pengajuan',  $_POST['jenis_pencairan']);
        $this->db->bind('keterangan_funding', $_POST['keterangan_funding']);
        $this->db->bind('status_permohonan', 'DIAJUKAN ULANG');

        if (empty($_POST['tgl_pengajuan_awal'])) {
            $this->db->bind('history_permohonan', "- Tanggal Permohonan : " . date('d F Y', strtotime($_POST['tgl_permohonan_awal']))  . ", Permohonan Nasabah : " . $_POST['pengajuan_awal'] . ", Keterangan Funding : " . $_POST['keterangan_awal'] . ", Tanggal Approve : " . date('d F Y', strtotime($_POST['tgl_approval_awal'])) . ", Permohonan yang Diapprove : " . $_POST['approval_awal'] . ", Keterangan Approval : " . $_POST['keterangan_approval_awal']);
        } else {
            $this->db->bind('history_permohonan', $_POST['history_permohonan']  . "\n- Tanggal Permohonan : " . date('d F Y', strtotime($_POST['tgl_pengajuan_awal'])) . ", Permohonan Nasabah : " . $_POST['pengajuan_awal'] . ", Keterangan Funding : " . $_POST['keterangan_awal'] . ", Tanggal Approve : " . date('d F Y', strtotime($_POST['tgl_approval_awal'])) . ", Permohonan yang Diapprove : " . $_POST['approval_awal'] . ", Keterangan Approval : " . $_POST['keterangan_approval_awal']);
        }

        $this->db->bind('tgl_pengajuan_ulang', date("Y-m-d H:i:s"));

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function lihat_data_id()
    {
        $this->db->query('SELECT * FROM tbl_rc_permohonan WHERE id_permohonan = :id_permohonan');
        $this->db->bind('id_permohonan', $_POST['id_permohonan']);
        return $this->db->single();
    }

    public function lihat_data_nasabah()
    {
        $this->db->query('SELECT * FROM tbl_nasabah_priority Where nama_cabang = :nama_cabang');
        $this->db->bind('nama_cabang', $_COOKIE['nama_cabang']);
        return $this->db->resultSet();
    }
    // public function delete()
    // {
    //     $query = "DELETE FROM tbl_rc_permohonan WHERE id_permohonan= :id_permohonan";
    //     $this->db->query($query);
    //     $this->db->bind('id_permohonan', $_POST['id_permohonan']);
    //     $this->db->execute();
    //     return $this->db->rowCount();
    // }
    public function delete()
    {
        $query = "UPDATE tbl_rc_permohonan SET 
        status_permohonan = :status_permohonan,
        alasan_pembatalan = :alasan_pembatalan,
        tgl_batal = :tgl_batal
        WHERE id_permohonan= :id_permohonan";
        $this->db->query($query);
        $this->db->bind('id_permohonan', $_POST['id_permohonan']);
        $this->db->bind('status_permohonan', "DIBATALKAN");
        $this->db->bind('alasan_pembatalan', $_POST['alasanBatal']);
        $this->db->bind('tgl_batal', date("Y-m-d H:i:s"));
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function update()
    {
        $query = "UPDATE tbl_rc_permohonan SET 
        status_permohonan = :status_permohonan,
        tgl_dilanjutkan = :tgl_dilanjutkan
        WHERE id_permohonan= :id_permohonan";
        $this->db->query($query);
        $this->db->bind('id_permohonan', $_POST['id_permohonan']);
        $this->db->bind('status_permohonan', "DILANJUTKAN");
        $this->db->bind('tgl_dilanjutkan', date("Y-m-d H:i:s"));
        $this->db->execute();
        return $this->db->rowCount();
    }

    //untuk button ditolak form pengajuan ulang
    public function tolak()
    {
        $query = "UPDATE tbl_rc_permohonan SET 
        status_permohonan = :status_permohonan,
        history_permohonan_pencairan = :history_permohonan_pencairan,
        tgl_approval = :tgl_approval
        WHERE id_permohonan= :id_permohonan";
        $this->db->query($query);
        $this->db->bind('id_permohonan', $_POST['id_permohonan']);
        $this->db->bind('status_permohonan', "DITOLAK");
        $this->db->bind('history_permohonan_pencairan', "- " . $_POST['history_pengajuan']);
        $this->db->bind('tgl_approval', date("Y-m-d H:i:s"));
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cek_btn_hapus()
    {

        $this->db->query('SELECT * FROM tbl_rc_permohonan WHERE id_permohonan = :id_permohonan');
        $this->db->bind('id_permohonan', $_POST['id_permohonan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cek_btn_tolak()
    {
        $this->db->query('SELECT * FROM tbl_rc_permohonan WHERE id_permohonan = :id_permohonan');
        $this->db->bind('id_permohonan', $_POST['id_permohonan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cek_btn_lanjutkan()
    {

        $this->db->query('SELECT * FROM tbl_rc_permohonan WHERE id_permohonan = :id_permohonan');
        $this->db->bind('id_permohonan', $_POST['id_permohonan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    //lihat data permohonan suku bunga khusus
    public function lihat_data()
    {
        $this->db->query('SELECT * FROM tbl_rc_permohonan where jenis_permohonan="Suku Bunga Khusus" AND kantor_cabang =:kantor_cabang AND username =:username ORDER BY id_permohonan DESC');
        $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
        $this->db->bind('username', $_COOKIE['username']);
        return $this->db->resultSet();
    }

    public function kode_terbesar_suku_bunga()
    {
        $this->db->query('SELECT max(id_permohonan) as kode_terbesar from tbl_rc_permohonan where jenis_permohonan="Suku Bunga Khusus"');
        return $this->db->single();
    }
    public function kode_terbesar_pencairan()
    {
        $this->db->query('SELECT max(id_permohonan) as kode_terbesar from tbl_rc_permohonan where jenis_permohonan="Pencairan Sebelum Jatuh Tempo"');
        return $this->db->single();
    }

    public function jumlah_data_permohonan_pencairan()
    {
        $this->db->query('SELECT COUNT(*) as jumlah_data_pencairan from tbl_rc_permohonan where jenis_permohonan="Pencairan Sebelum Jatuh Tempo"  AND kantor_cabang =:kantor_cabang AND username =:username ');
        $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
        $this->db->bind('username', $_COOKIE['username']);
        // return $this->db->resultSet();
        return $this->db->single();
    }
    public function jumlah_data_permohonan_suku_bunga()
    {
        $this->db->query('SELECT COUNT(*) as jumlah_data_suku_bunga from tbl_rc_permohonan where jenis_permohonan="Suku Bunga Khusus"  AND kantor_cabang =:kantor_cabang AND username =:username ');
        $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
        $this->db->bind('username', $_COOKIE['username']);
        return $this->db->single();
    }

    //belum ada simpan data gambar bukti
    // public function simpan_data_pencairan()
    // {
    //     $j_pencairan = $_POST['jenis_pencairan'];
    //     if ($j_pencairan == 'DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN') {
    //         $query = "INSERT INTO tbl_rc_permohonan
    //             (
    //                 id_permohonan,
    //                 kantor_cabang,
    //                 username, 
    //                 tgl_permohonan,  
    //                 jenis_permohonan,
    //                 jenis_produk,
    //                 tgl_pembentukan,
    //                 jangka_waktu,
    //                 nomor_rekening_deposito,
    //                 alasan_pengajuan,
    //                 jenis_permohonan_pencairan_sebelum_jt_pengajuan,

    //                 jenis_kartu_identitas,
    //                 nomor_identitas,
    //                 nama_nasabah, 
    //                 status_nasabah,

    //                 alamat, 
    //                 nomor_telepon, 
    //                 nominal,  
    //                 suku_bunga_deposito,
    //                 nominal_penalti,
    //                 jumlah_hari,
    //                 jumlah_hari_mengendap,

    //                 nominal_bunga_berjalan,
    //                 nomor_rekening_pencairan,
    //                 keterangan_funding, 
    //                 nama_gambar,
    //                 user_create,
    //                 ttd_nasabah,

    //                 status_permohonan
    //                 ) 
    //             VALUES
    //             (
    //                :id_permohonan,
    //                :kantor_cabang,
    //                :username, 
    //                :tgl_permohonan,  
    //                :jenis_permohonan,
    //                :jenis_produk,
    //                :tgl_pembentukan,
    //                :jangka_waktu,
    //                :nomor_rekening_deposito,
    //                :alasan_pengajuan,
    //                :jenis_permohonan_pencairan_sebelum_jt_pengajuan,

    //                :jenis_kartu_identitas,
    //                :nomor_identitas,
    //                :nama_nasabah, 
    //                :status_nasabah,

    //                :alamat, 
    //                :nomor_telepon, 
    //                :nominal,  
    //                :suku_bunga_deposito,
    //                :nominal_penalti,
    //                :jumlah_hari,
    //                :jumlah_hari_mengendap,
    //                :nominal_bunga_berjalan,
    //                :nomor_rekening_pencairan,
    //                :keterangan_funding, 
    //                :nama_gambar,
    //                :user_create,
    //                :ttd_nasabah,

    //                :status_permohonan
    //             )";
    //         $this->db->query($query);
    //         $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
    //         $this->db->bind('kantor_cabang',  $_POST['kantor_cabang']);
    //         $this->db->bind('username',  $_COOKIE['username']);
    //         $this->db->bind('tgl_permohonan',  date("Y-m-d H:i:s"));
    //         $this->db->bind('jenis_permohonan',  'PENCAIRAN SEBELUM JATUH TEMPO');
    //         $this->db->bind('jenis_produk',  $_POST['jenis_produk']);
    //         $this->db->bind('tgl_pembentukan',  $_POST['tgl_pembentukan_hidden']);
    //         $this->db->bind('jangka_waktu',  $_POST['jangka_waktu']);
    //         $this->db->bind('nomor_rekening_deposito',  $_POST['norek_deposito']);
    //         $alasan = $_POST['alasan_pengajuan'];
    //         if ($alasan == 'LAINNYA') {
    //             $this->db->bind('alasan_pengajuan',  $_POST['alasan_lain']);
    //         } else {
    //             $this->db->bind('alasan_pengajuan',  $_POST['alasan_pengajuan']);
    //         }
    //         $this->db->bind('jenis_permohonan_pencairan_sebelum_jt_pengajuan',  $_POST['jenis_pencairan']);
    //         $kartu_identitas = $_POST['jenis_kartu_identitas'];
    //         if ($kartu_identitas == 'LAINNYA') {
    //             $this->db->bind('jenis_kartu_identitas',  $_POST['identitas_lain']);
    //             $this->db->bind('nomor_identitas',  $_POST['nomor_identitas_lain']);
    //         } else {
    //             $this->db->bind('jenis_kartu_identitas',  $_POST['jenis_kartu_identitas']);
    //             $this->db->bind('nomor_identitas',  $_POST['nomor_ktp']);
    //         }
    //         $this->db->bind('nama_nasabah',  $_POST['nama_nasabah']);
    //         $this->db->bind('status_nasabah',  $_POST['status_nasabah']);
    //         $this->db->bind('alamat',  $_POST['alamat']);
    //         $this->db->bind('nomor_telepon',  $_POST['nomor_telepon']);
    //         $this->db->bind('nominal', str_replace(".", "",  $_POST['nominal']));
    //         $this->db->bind('suku_bunga_deposito',  $_POST['suku_bunga_deposito']);
    //         $this->db->bind('nominal_penalti',  str_replace(".", "",  $_POST['nominal_penalti']));
    //         $this->db->bind('jumlah_hari',  $_POST['jumlah_hari']);
    //         $this->db->bind('jumlah_hari_mengendap',  $_POST['jumlah_hari_mengendap']);
    //         $this->db->bind('nominal_bunga_berjalan',  str_replace(".", "",  $_POST['nominal_bunga_berjalan']));
    //         $this->db->bind('nomor_rekening_pencairan',  $_POST['norek_pencairan']);
    //         $this->db->bind('keterangan_funding',  $_POST['keterangan_funding']);
    //         $this->db->bind('nama_gambar',  $_POST['bilyet']);
    //         $this->db->bind('user_create',  $_COOKIE['username']);
    //         $this->db->bind('ttd_nasabah',  $_POST['ttd_nasabah']);

    //         $this->db->bind('status_permohonan',  'DIAJUKAN');
    //         $this->db->execute();
    //         return $this->db->rowCount();
    //     } else if ($j_pencairan == 'DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN') {
    //         $query = "INSERT INTO tbl_rc_permohonan
    //             (
    //                 id_permohonan,
    //                 kantor_cabang,
    //                 username, 
    //                 tgl_permohonan,  
    //                 jenis_permohonan,
    //                 jenis_produk,
    //                 tgl_pembentukan,
    //                 jangka_waktu,
    //                 nomor_rekening_deposito,
    //                 alasan_pengajuan,
    //                 jenis_permohonan_pencairan_sebelum_jt_pengajuan,
    //                 jenis_kartu_identitas,
    //                 nomor_identitas,
    //                 nama_nasabah,
    //                 status_nasabah, 
    //                 alamat, 
    //                 nomor_telepon, 
    //                 nominal,  
    //                 suku_bunga_deposito,
    //                 nominal_penalti,
    //                 jumlah_hari,
    //                 jumlah_hari_mengendap,
    //                 nominal_bunga_berjalan,
    //                 keterangan_funding, 
    //                 nama_gambar,
    //                 user_create,
    //                 ttd_nasabah,

    //                 status_permohonan
    //                 ) 
    //             VALUES
    //             (
    //                 :id_permohonan,
    //                 :kantor_cabang,
    //                 :username, 
    //                 :tgl_permohonan,  
    //                 :jenis_permohonan,
    //                 :jenis_produk,
    //                 :tgl_pembentukan,
    //                 :jangka_waktu,
    //                 :norek_deposito,
    //                 :alasan_pengajuan,
    //                 :jenis_pencairan,
    //                 :jenis_kartu_identitas,
    //                 :nomor_identitas,
    //                 :nama_nasabah, 
    //                 :status_nasabah,
    //                 :alamat, 
    //                 :nomor_telepon, 
    //                 :nominal,
    //                 :suku_bunga_deposito,
    //                 :nominal_penalti,
    //                 :jumlah_hari,
    //                 :jumlah_hari_mengendap,
    //                 :nominal_bunga_berjalan,
    //                 :keterangan_funding, 
    //                 :nama_gambar,
    //                 :user_create,
    //                 :ttd_nasabah,


    //                 :status_permohonan
    //             )";
    //         $this->db->query($query);
    //         $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
    //         $this->db->bind('kantor_cabang',  $_POST['kantor_cabang']);
    //         $this->db->bind('username',  $_COOKIE['username']);
    //         $this->db->bind('tgl_permohonan',  date("Y-m-d H:i:s"));
    //         $this->db->bind('jenis_permohonan',  'PENCAIRAN SEBELUM JATUH TEMPO');
    //         $this->db->bind('jenis_produk',  $_POST['jenis_produk']);
    //         $this->db->bind('tgl_pembentukan',  $_POST['tgl_pembentukan_hidden']);
    //         $this->db->bind('jangka_waktu',  $_POST['jangka_waktu']);
    //         $this->db->bind('norek_deposito',  $_POST['norek_deposito']);
    //         $alasan = $_POST['alasan_pengajuan'];
    //         if ($alasan == 'LAINNYA') {
    //             $this->db->bind('alasan_pengajuan',  $_POST['alasan_lain']);
    //         } else {
    //             $this->db->bind('alasan_pengajuan',  $_POST['alasan_pengajuan']);
    //         }
    //         $this->db->bind('jenis_pencairan',  $_POST['jenis_pencairan']);

    //         $kartu_identitas = $_POST['jenis_kartu_identitas'];
    //         if ($kartu_identitas == 'LAINNYA') {
    //             $this->db->bind('jenis_kartu_identitas',  $_POST['identitas_lain']);
    //             $this->db->bind('nomor_identitas',  $_POST['nomor_identitas_lain']);
    //         } else {
    //             $this->db->bind('jenis_kartu_identitas',  $_POST['jenis_kartu_identitas']);
    //             $this->db->bind('nomor_identitas',  $_POST['nomor_ktp']);
    //         }
    //         $this->db->bind('nama_nasabah',  $_POST['nama_nasabah']);
    //         $this->db->bind('status_nasabah',  $_POST['status_nasabah']);
    //         $this->db->bind('alamat',  $_POST['alamat']);
    //         $this->db->bind('nomor_telepon',  $_POST['nomor_telepon']);
    //         $this->db->bind('nominal', str_replace(".", "",  $_POST['nominal']));
    //         $this->db->bind('suku_bunga_deposito',  $_POST['suku_bunga_deposito']);
    //         $this->db->bind('nominal_penalti',  str_replace(".", "",  $_POST['nominal_penalti']));
    //         $this->db->bind('jumlah_hari',  $_POST['jumlah_hari']);
    //         $this->db->bind('jumlah_hari_mengendap',  $_POST['jumlah_hari_mengendap']);
    //         $this->db->bind('nominal_bunga_berjalan',  str_replace(".", "",  $_POST['nominal_bunga_berjalan']));
    //         $this->db->bind('keterangan_funding',  $_POST['keterangan_funding']);
    //         $this->db->bind('nama_gambar',  $_POST['bilyet']);
    //         $this->db->bind('user_create',  $_COOKIE['username']);
    //         $this->db->bind('ttd_nasabah',  $_POST['ttd_nasabah']);

    //         $this->db->bind('status_permohonan',  'DIAJUKAN');
    //         $this->db->execute();
    //         return $this->db->rowCount();
    //     } else if ($j_pencairan == 'TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN') {
    //         $query = "INSERT INTO tbl_rc_permohonan
    //             (
    //                 id_permohonan,
    //                 kantor_cabang,
    //                 username, 
    //                 tgl_permohonan,  
    //                 jenis_permohonan,
    //                 jenis_produk,
    //                 tgl_pembentukan,
    //                 jangka_waktu,
    //                 nomor_rekening_deposito,
    //                 alasan_pengajuan,
    //                 jenis_permohonan_pencairan_sebelum_jt_pengajuan,

    //                 jenis_kartu_identitas,
    //                 nomor_identitas,
    //                 nama_nasabah, 
    //                 status_nasabah,
    //                 alamat, 
    //                 nomor_telepon, 
    //                 nominal, 
    //                 suku_bunga_deposito, 
    //                 nominal_penalti,
    //                 jumlah_hari,
    //                 jumlah_hari_mengendap,
    //                 nominal_bunga_berjalan,
    //                 nomor_rekening_pencairan,
    //                 keterangan_funding, 
    //                 nama_gambar,
    //                 user_create,
    //                 ttd_nasabah,

    //                 status_permohonan
    //                 ) 
    //             VALUES
    //             (
    //                 :id_permohonan,
    //                 :kantor_cabang,
    //                 :username, 
    //                 :tgl_permohonan,  
    //                 :jenis_permohonan,
    //                 :jenis_produk,
    //                 :tgl_pembentukan,
    //                 :jangka_waktu,
    //                 :norek_deposito,
    //                 :alasan_pengajuan,
    //                 :jenis_pencairan,

    //                 :jenis_kartu_identitas,
    //                 :nomor_identitas,
    //                 :nama_nasabah, 
    //                 :status_nasabah,
    //                 :alamat, 
    //                 :nomor_telepon, 
    //                 :nominal,
    //                 :suku_bunga_deposito,
    //                 :nominal_penalti,
    //                 :jumlah_hari,
    //                 :jumlah_hari_mengendap,
    //                 :nominal_bunga_berjalan,
    //                 :norek_pencairan,
    //                 :keterangan_funding, 
    //                 :nama_gambar,
    //                 :user_create,
    //                 :ttd_nasabah,

    //                 :status_permohonan
    //             )";
    //         $this->db->query($query);
    //         $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
    //         $this->db->bind('kantor_cabang',  $_POST['kantor_cabang']);
    //         $this->db->bind('username',  $_COOKIE['username']);
    //         $this->db->bind('tgl_permohonan',  date("Y-m-d H:i:s"));
    //         $this->db->bind('jenis_permohonan',  'PENCAIRAN SEBELUM JATUH TEMPO');
    //         $this->db->bind('jenis_produk',  $_POST['jenis_produk']);
    //         $this->db->bind('tgl_pembentukan',  $_POST['tgl_pembentukan_hidden']);
    //         $this->db->bind('jangka_waktu',  $_POST['jangka_waktu']);
    //         $this->db->bind('norek_deposito',  $_POST['norek_deposito']);
    //         $alasan = $_POST['alasan_pengajuan'];
    //         if ($alasan == 'LAINNYA') {
    //             $this->db->bind('alasan_pengajuan',  $_POST['alasan_lain']);
    //         } else {
    //             $this->db->bind('alasan_pengajuan',  $_POST['alasan_pengajuan']);
    //         }
    //         $this->db->bind('jenis_pencairan',  $_POST['jenis_pencairan']);
    //          $kartu_identitas = $_POST['jenis_kartu_identitas'];
    //         if ($kartu_identitas == 'LAINNYA') {
    //             $this->db->bind('jenis_kartu_identitas',  $_POST['identitas_lain']);
    //             $this->db->bind('nomor_identitas',  $_POST['nomor_identitas_lain']);
    //         } else {
    //             $this->db->bind('jenis_kartu_identitas',  $_POST['jenis_kartu_identitas']);
    //             $this->db->bind('nomor_identitas',  $_POST['nomor_ktp']);
    //         }
    //         $this->db->bind('nama_nasabah',  $_POST['nama_nasabah']);
    //         $this->db->bind('status_nasabah',  $_POST['status_nasabah']);
    //         $this->db->bind('alamat',  $_POST['alamat']);
    //         $this->db->bind('nomor_telepon',  $_POST['nomor_telepon']);
    //         $this->db->bind('nominal', str_replace(".", "",  $_POST['nominal']));
    //         $this->db->bind('suku_bunga_deposito',  $_POST['suku_bunga_deposito']);
    //         $this->db->bind('nominal_penalti',  str_replace(".", "",  $_POST['nominal_penalti']));
    //         $this->db->bind('jumlah_hari',  $_POST['jumlah_hari']);
    //         $this->db->bind('jumlah_hari_mengendap',  $_POST['jumlah_hari_mengendap']);
    //         $this->db->bind('nominal_bunga_berjalan',  str_replace(".", "",  $_POST['nominal_bunga_berjalan']));
    //         $this->db->bind('norek_pencairan',  $_POST['norek_pencairan']);
    //         $this->db->bind('keterangan_funding',  $_POST['keterangan_funding']);
    //         $this->db->bind('nama_gambar',  $_POST['bilyet']);
    //         $this->db->bind('user_create',  $_COOKIE['username']);
    //         $this->db->bind('ttd_nasabah',  $_POST['ttd_nasabah']);

    //         $this->db->bind('status_permohonan',  'DIAJUKAN');
    //         $this->db->execute();
    //         return $this->db->rowCount();
    //     } else {
    //         $query = "INSERT INTO tbl_rc_permohonan
    //             (
    //                 id_permohonan,
    //                 kantor_cabang,
    //                 username, 
    //                 tgl_permohonan,  
    //                 jenis_permohonan,
    //                 jenis_produk,
    //                 tgl_pembentukan,
    //                 jangka_waktu,
    //                 nomor_rekening_deposito,
    //                 alasan_pengajuan,
    //                 jenis_permohonan_pencairan_sebelum_jt_pengajuan,

    //                 jenis_kartu_identitas,
    //                 nomor_identitas,
    //                 nama_nasabah, 
    //                 status_nasabah,
    //                 alamat, 
    //                 nomor_telepon, 
    //                 nominal,  
    //                 suku_bunga_deposito,
    //                 nominal_penalti,
    //                 jumlah_hari,
    //                 jumlah_hari_mengendap,
    //                 nominal_bunga_berjalan,
    //                 keterangan_funding, 
    //                 nama_gambar,
    //                 user_create,
    //                 ttd_nasabah,

    //                 status_permohonan
    //                 ) 
    //             VALUES
    //             (
    //                 :id_permohonan,
    //                 :kantor_cabang,
    //                 :username, 
    //                 :tgl_permohonan,  
    //                 :jenis_permohonan,
    //                 :jenis_produk,
    //                 :tgl_pembentukan,
    //                 :jangka_waktu,
    //                 :norek_deposito,
    //                 :alasan_pengajuan,
    //                 :jenis_pencairan,

    //                 :jenis_kartu_identitas,
    //                 :nomor_identitas,
    //                 :nama_nasabah, 
    //                 :status_nasabah,
    //                 :alamat, 
    //                 :nomor_telepon, 
    //                 :nominal,
    //                 :suku_bunga_deposito,
    //                 :nominal_penalti,
    //                 :jumlah_hari,
    //                 :jumlah_hari_mengendap,
    //                 :nominal_bunga_berjalan,
    //                 :keterangan_funding, 
    //                 :nama_gambar,
    //                 :user_create,
    //                 :ttd_nasabah,

    //                 :status_permohonan
    //             )";
    //         $this->db->query($query);
    //         $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
    //         $this->db->bind('kantor_cabang',  $_POST['kantor_cabang']);
    //         $this->db->bind('username',  $_COOKIE['username']);
    //         $this->db->bind('tgl_permohonan',  date("Y-m-d H:i:s"));
    //         $this->db->bind('jenis_permohonan',  'PENCAIRAN SEBELUM JATUH TEMPO');
    //         $this->db->bind('jenis_produk',  $_POST['jenis_produk']);
    //         $this->db->bind('tgl_pembentukan',  $_POST['tgl_pembentukan_hidden']);
    //         $this->db->bind('jangka_waktu',  $_POST['jangka_waktu']);
    //         $this->db->bind('norek_deposito',  $_POST['norek_deposito']);
    //         $alasan = $_POST['alasan_pengajuan'];
    //         if ($alasan == 'LAINNYA') {
    //             $this->db->bind('alasan_pengajuan',  $_POST['alasan_lain']);
    //         } else {
    //             $this->db->bind('alasan_pengajuan',  $_POST['alasan_pengajuan']);
    //         }
    //         $this->db->bind('jenis_pencairan',  $_POST['jenis_pencairan']);

    //         $kartu_identitas = $_POST['jenis_kartu_identitas'];
    //         if ($kartu_identitas == 'LAINNYA') {
    //             $this->db->bind('jenis_kartu_identitas',  $_POST['identitas_lain']);
    //             $this->db->bind('nomor_identitas',  $_POST['nomor_identitas_lain']);
    //         } else {
    //             $this->db->bind('jenis_kartu_identitas',  $_POST['jenis_kartu_identitas']);
    //             $this->db->bind('nomor_identitas',  $_POST['nomor_ktp']);
    //         }
    //         $this->db->bind('nama_nasabah',  $_POST['nama_nasabah']);
    //         $this->db->bind('status_nasabah',  $_POST['status_nasabah']);
    //         $this->db->bind('alamat',  $_POST['alamat']);
    //         $this->db->bind('nomor_telepon',  $_POST['nomor_telepon']);
    //         $this->db->bind('nominal', str_replace(".", "",  $_POST['nominal']));
    //         $this->db->bind('suku_bunga_deposito',  $_POST['suku_bunga_deposito']);
    //         $this->db->bind('nominal_penalti',  str_replace(".", "",  $_POST['nominal_penalti']));
    //         $this->db->bind('jumlah_hari',  $_POST['jumlah_hari']);
    //         $this->db->bind('jumlah_hari_mengendap',  $_POST['jumlah_hari_mengendap']);
    //         $this->db->bind('nominal_bunga_berjalan',  str_replace(".", "",  $_POST['nominal_bunga_berjalan']));
    //         $this->db->bind('keterangan_funding',  $_POST['keterangan_funding']);
    //         $this->db->bind('nama_gambar',  $_POST['bilyet']);
    //         $this->db->bind('user_create',  $_COOKIE['username']);
    //         $this->db->bind('ttd_nasabah',  $_POST['ttd_nasabah']);

    //         $this->db->bind('status_permohonan',  'DIAJUKAN');
    //         $this->db->execute();
    //         return $this->db->rowCount();
    //     }
    // }

    //sudah ada upload gambar bukti
    //mencoba upload bukti ttd
    public function simpan_data_pencairan()
    {
        $j_pencairan = $_POST['jenis_pencairan'];
        if ($j_pencairan == 'DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN') {
            $query = "INSERT INTO tbl_rc_permohonan
                  (
                      id_permohonan,
                      kantor_cabang,
                      username, 
                     
                      tgl_permohonan,  
                      jenis_permohonan,
                      jenis_produk,
                      tgl_pembentukan,
                      jangka_waktu,
                      nomor_rekening_deposito,
                      alasan_pengajuan,
                      jenis_permohonan_pencairan_sebelum_jt_pengajuan,
 
                      jenis_kartu_identitas,
                      nomor_identitas,
                      nama_nasabah, 
                      status_nasabah,
                      alamat, 
                      nomor_telepon, 
                      nominal,  
                      suku_bunga_deposito,
                      nominal_penalti,
                      jumlah_hari,
                      jumlah_hari_mengendap,
                      nominal_bunga_berjalan,
                      nomor_rekening_pencairan,
                      keterangan_funding, 
                      nama_gambar,
                      status_permohonan,
                      ttd_nasabah,
                      nama_gambar_bukti,
                      user_create
                      ) 
                  VALUES
                  (
                     :id_permohonan,
                     :kantor_cabang,
                     :username, 
                     :tgl_permohonan,  
                     :jenis_permohonan,
                     :jenis_produk,
                     :tgl_pembentukan,
                     :jangka_waktu,
                     :nomor_rekening_deposito,
                     :alasan_pengajuan,
                     :jenis_permohonan_pencairan_sebelum_jt_pengajuan,
                     :jenis_kartu_identitas,
                     :nomor_identitas,
                     :nama_nasabah, 
                     :status_nasabah,
                     :alamat, 
                     :nomor_telepon, 
                     :nominal,  
                     :suku_bunga_deposito,
                     :nominal_penalti,
                     :jumlah_hari,
                     :jumlah_hari_mengendap,
                     :nominal_bunga_berjalan,
                     :nomor_rekening_pencairan,
                     :keterangan_funding, 
                     :nama_gambar,
                     :status_permohonan,
                     :ttd_nasabah,
                     :nama_gambar_bukti,
                     :user_create
                  )";
            $this->db->query($query);
            $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
            $this->db->bind('kantor_cabang',  $_POST['kantor_cabang']);
            $this->db->bind('username',   $_COOKIE['username']);

            $this->db->bind('tgl_permohonan',  date("Y-m-d H:i:s"));
            $this->db->bind('jenis_permohonan',  'PENCAIRAN SEBELUM JATUH TEMPO');
            $this->db->bind('jenis_produk',  $_POST['jenis_produk']);
            $this->db->bind('tgl_pembentukan',  $_POST['tgl_pembentukan_hidden']);
            $this->db->bind('jangka_waktu',  $_POST['jangka_waktu']);
            $this->db->bind('nomor_rekening_deposito',  $_POST['norek_deposito']);
            $alasan = $_POST['alasan_pengajuan'];
            if ($alasan == 'LAINNYA') {
                $this->db->bind('alasan_pengajuan',  $_POST['alasan_lain']);
            } else {
                $this->db->bind('alasan_pengajuan',  $_POST['alasan_pengajuan']);
            }
            $this->db->bind('jenis_permohonan_pencairan_sebelum_jt_pengajuan',  $_POST['jenis_pencairan']);
            $kartu_identitas = $_POST['jenis_kartu_identitas'];
            if ($kartu_identitas == 'LAINNYA') {
                $this->db->bind('jenis_kartu_identitas',  $_POST['identitas_lain']);
                $this->db->bind('nomor_identitas',  $_POST['nomor_identitas_lain']);
            } else {
                $this->db->bind('jenis_kartu_identitas',  $_POST['jenis_kartu_identitas']);
                $this->db->bind('nomor_identitas',  $_POST['nomor_ktp']);
            }
            $this->db->bind('nama_nasabah',  $_POST['nama_nasabah']);
            $this->db->bind('status_nasabah',  $_POST['status_nasabah']);
            $this->db->bind('alamat',  $_POST['alamat']);
            $this->db->bind('nomor_telepon',  $_POST['nomor_telepon']);
            $this->db->bind('nominal', str_replace(".", "",  $_POST['nominal']));
            $this->db->bind('suku_bunga_deposito',  $_POST['suku_bunga_deposito']);
            $this->db->bind('nominal_penalti',  str_replace(".", "",  $_POST['nominal_penalti']));
            $this->db->bind('jumlah_hari',  $_POST['jumlah_hari']);
            $this->db->bind('jumlah_hari_mengendap',  $_POST['jumlah_hari_mengendap']);
            $this->db->bind('nominal_bunga_berjalan',  str_replace(".", "",  $_POST['nominal_bunga_berjalan']));
            $this->db->bind('nomor_rekening_pencairan',  $_POST['norek_pencairan']);
            $this->db->bind('keterangan_funding',  $_POST['keterangan_funding']);
            $this->db->bind('nama_gambar',  $_POST['bilyet']);
            $this->db->bind('status_permohonan',  'DIAJUKAN');
            $this->db->bind('ttd_nasabah',  $_POST['ttd_nasabah']);
            $this->db->bind('nama_gambar_bukti',  $_POST['bukti_ttd']);
            $this->db->bind('user_create',  $_COOKIE['username']);
            $this->db->execute();
            return $this->db->rowCount();
        } else if ($j_pencairan == 'DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN') {
            $query = "INSERT INTO tbl_rc_permohonan
                  (
                      id_permohonan,
                      kantor_cabang,
                      username, 
                      tgl_permohonan,  
                      jenis_permohonan,
                      jenis_produk,
                      tgl_pembentukan,
                      jangka_waktu,
                      nomor_rekening_deposito,
                      alasan_pengajuan,
                      jenis_permohonan_pencairan_sebelum_jt_pengajuan,
                      jenis_kartu_identitas,
                      nomor_identitas,
                      nama_nasabah, 
                      status_nasabah,
                      alamat, 
                      nomor_telepon, 
                      nominal,  
                      suku_bunga_deposito,
                      nominal_penalti,
                      jumlah_hari,
                      jumlah_hari_mengendap,
                      nominal_bunga_berjalan,
                      keterangan_funding, 
                      nama_gambar,
                      status_permohonan, 
                      ttd_nasabah,
                      nama_gambar_bukti,
                      user_create
                      ) 
                  VALUES
                  (
                      :id_permohonan,
                      :kantor_cabang,
                      :username, 
                      :tgl_permohonan,  
                      :jenis_permohonan,
                      :jenis_produk,
                      :tgl_pembentukan,
                      :jangka_waktu,
                      :nomor_rekening_deposito,
                      :alasan_pengajuan,
                      :jenis_permohonan_pencairan_sebelum_jt_pengajuan,
                      :jenis_kartu_identitas,
                      :nomor_identitas,
                      :nama_nasabah, 
                      :status_nasabah,
                      :alamat, 
                      :nomor_telepon, 
                      :nominal,
                      :suku_bunga_deposito,
                      :nominal_penalti,
                      :jumlah_hari,
                      :jumlah_hari_mengendap,
                      :nominal_bunga_berjalan,
                      :keterangan_funding, 
                      :nama_gambar,
                      :status_permohonan,
                      :ttd_nasabah,
                      :nama_gambar_bukti,
                      :user_create
                  )";
            $this->db->query($query);
            $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
            $this->db->bind('kantor_cabang',  $_POST['kantor_cabang']);
            $this->db->bind('username',   $_COOKIE['username']);

            $this->db->bind('tgl_permohonan',  date("Y-m-d H:i:s"));
            $this->db->bind('jenis_permohonan',  'PENCAIRAN SEBELUM JATUH TEMPO');
            $this->db->bind('jenis_produk',  $_POST['jenis_produk']);
            $this->db->bind('tgl_pembentukan',  $_POST['tgl_pembentukan_hidden']);
            $this->db->bind('jangka_waktu',  $_POST['jangka_waktu']);
            $this->db->bind('nomor_rekening_deposito',  $_POST['norek_deposito']);
            $alasan = $_POST['alasan_pengajuan'];
            if ($alasan == 'LAINNYA') {
                $this->db->bind('alasan_pengajuan',  $_POST['alasan_lain']);
            } else {
                $this->db->bind('alasan_pengajuan',  $_POST['alasan_pengajuan']);
            }
            // $this->db->bind('alasan_pengajuan',  $_POST['alasan_pengajuan']);
            $this->db->bind('jenis_permohonan_pencairan_sebelum_jt_pengajuan',  $_POST['jenis_pencairan']);
            $kartu_identitas = $_POST['jenis_kartu_identitas'];
            if ($kartu_identitas == 'LAINNYA') {
                $this->db->bind('jenis_kartu_identitas',  $_POST['identitas_lain']);
                $this->db->bind('nomor_identitas',  $_POST['nomor_identitas_lain']);
            } else {
                $this->db->bind('jenis_kartu_identitas',  $_POST['jenis_kartu_identitas']);
                $this->db->bind('nomor_identitas',  $_POST['nomor_ktp']);
            }
            $this->db->bind('nama_nasabah',  $_POST['nama_nasabah']);
            $this->db->bind('status_nasabah',  $_POST['status_nasabah']);
            $this->db->bind('alamat',  $_POST['alamat']);
            $this->db->bind('nomor_telepon',  $_POST['nomor_telepon']);
            $this->db->bind('nominal', str_replace(".", "",  $_POST['nominal']));
            $this->db->bind('suku_bunga_deposito',  $_POST['suku_bunga_deposito']);
            $this->db->bind('nominal_penalti',  str_replace(".", "",  $_POST['nominal_penalti']));
            $this->db->bind('jumlah_hari',  $_POST['jumlah_hari']);
            $this->db->bind('jumlah_hari_mengendap',  $_POST['jumlah_hari_mengendap']);
            $this->db->bind('nominal_bunga_berjalan',  str_replace(".", "",  $_POST['nominal_bunga_berjalan']));
            $this->db->bind('keterangan_funding',  $_POST['keterangan_funding']);
            $this->db->bind('nama_gambar',  $_POST['bilyet']);
            $this->db->bind('status_permohonan',  'DIAJUKAN');
            $this->db->bind('ttd_nasabah',  $_POST['ttd_nasabah']);
            $this->db->bind('nama_gambar_bukti',  $_POST['bukti_ttd']);
            $this->db->bind('user_create',  $_COOKIE['username']);
            $this->db->execute();
            return $this->db->rowCount();
        } else if ($j_pencairan == 'TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN') {
            $query = "INSERT INTO tbl_rc_permohonan
                  (
                      id_permohonan,
                      kantor_cabang,
                      username, 
                      tgl_permohonan,  
                      jenis_permohonan,
                      jenis_produk,
                      tgl_pembentukan,
                      jangka_waktu,
                      nomor_rekening_deposito,
                      alasan_pengajuan,
                      jenis_permohonan_pencairan_sebelum_jt_pengajuan,
                      jenis_kartu_identitas,
                      nomor_identitas,
                      nama_nasabah, 
                      status_nasabah,
                      alamat, 
                      nomor_telepon, 
                      nominal, 
                      suku_bunga_deposito, 
                      nominal_penalti,
                      jumlah_hari,
                      jumlah_hari_mengendap,
                      nominal_bunga_berjalan,
                      nomor_rekening_pencairan,
                      keterangan_funding, 
                      nama_gambar,
                      status_permohonan,
                      ttd_nasabah,
                      nama_gambar_bukti,
                      user_create
                      ) 
                  VALUES
                  (
                      :id_permohonan,
                      :kantor_cabang,
                      :username, 
                      :tgl_permohonan,  
                      :jenis_permohonan,
                      :jenis_produk,
                      :tgl_pembentukan,
                      :jangka_waktu,
                      :nomor_rekening_deposito,
                      :alasan_pengajuan,
                      :jenis_permohonan_pencairan_sebelum_jt_pengajuan,
                      :jenis_kartu_identitas,
                      :nomor_identitas,
                      :nama_nasabah, 
                      :status_nasabah,
                      :alamat, 
                      :nomor_telepon, 
                      :nominal,
                      :suku_bunga_deposito,
                      :nominal_penalti,
                      :jumlah_hari,
                      :jumlah_hari_mengendap,
                      :nominal_bunga_berjalan,
                      :norek_pencairan,
                      :keterangan_funding, 
                      :nama_gambar,
                      :status_permohonan,
                      :ttd_nasabah,
                      :nama_gambar_bukti,
                      :user_create
                  )";
            $this->db->query($query);
            $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
            $this->db->bind('kantor_cabang',  $_POST['kantor_cabang']);
            $this->db->bind('username',   $_COOKIE['username']);

            $this->db->bind('tgl_permohonan',  date("Y-m-d H:i:s"));
            $this->db->bind('jenis_permohonan',  'PENCAIRAN SEBELUM JATUH TEMPO');
            $this->db->bind('jenis_produk',  $_POST['jenis_produk']);
            $this->db->bind('tgl_pembentukan',  $_POST['tgl_pembentukan_hidden']);
            $this->db->bind('jangka_waktu',  $_POST['jangka_waktu']);
            $this->db->bind('nomor_rekening_deposito',  $_POST['norek_deposito']);
            $alasan = $_POST['alasan_pengajuan'];
            if ($alasan == 'LAINNYA') {
                $this->db->bind('alasan_pengajuan',  $_POST['alasan_lain']);
            } else {
                $this->db->bind('alasan_pengajuan',  $_POST['alasan_pengajuan']);
            }
            $this->db->bind('jenis_permohonan_pencairan_sebelum_jt_pengajuan',  $_POST['jenis_pencairan']);
            $kartu_identitas = $_POST['jenis_kartu_identitas'];
            if ($kartu_identitas == 'LAINNYA') {
                $this->db->bind('jenis_kartu_identitas',  $_POST['identitas_lain']);
                $this->db->bind('nomor_identitas',  $_POST['nomor_identitas_lain']);
            } else {
                $this->db->bind('jenis_kartu_identitas',  $_POST['jenis_kartu_identitas']);
                $this->db->bind('nomor_identitas',  $_POST['nomor_ktp']);
            }
            $this->db->bind('nama_nasabah',  $_POST['nama_nasabah']);
            $this->db->bind('status_nasabah',  $_POST['status_nasabah']);
            $this->db->bind('alamat',  $_POST['alamat']);
            $this->db->bind('nomor_telepon',  $_POST['nomor_telepon']);
            $this->db->bind('nominal', str_replace(".", "",  $_POST['nominal']));
            $this->db->bind('suku_bunga_deposito',  $_POST['suku_bunga_deposito']);
            $this->db->bind('nominal_penalti',  str_replace(".", "",  $_POST['nominal_penalti']));
            $this->db->bind('jumlah_hari',  $_POST['jumlah_hari']);
            $this->db->bind('jumlah_hari_mengendap',  $_POST['jumlah_hari_mengendap']);
            $this->db->bind('nominal_bunga_berjalan',  str_replace(".", "",  $_POST['nominal_bunga_berjalan']));
            $this->db->bind('norek_pencairan',  $_POST['norek_pencairan']);
            $this->db->bind('keterangan_funding',  $_POST['keterangan_funding']);
            $this->db->bind('nama_gambar',  $_POST['bilyet']);
            $this->db->bind('status_permohonan',  'DIAJUKAN');
            $this->db->bind('ttd_nasabah',  $_POST['ttd_nasabah']);
            $this->db->bind('nama_gambar_bukti',  $_POST['bukti_ttd']);
            $this->db->bind('user_create',  $_COOKIE['username']);
            $this->db->execute();
            return $this->db->rowCount();
        } else if ($j_pencairan == 'TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN') {
            $query = "INSERT INTO tbl_rc_permohonan
                  (
                      id_permohonan,
                      kantor_cabang,
                      username,
                      tgl_permohonan,  
                      jenis_permohonan,
                      jenis_produk,
                      tgl_pembentukan,
                      jangka_waktu,
                      nomor_rekening_deposito,
                      alasan_pengajuan,
                      jenis_permohonan_pencairan_sebelum_jt_pengajuan,
                      jenis_kartu_identitas,
                      nomor_identitas,
                      nama_nasabah, 
                      status_nasabah,
                      alamat, 
                      nomor_telepon, 
                      nominal,  
                      suku_bunga_deposito, 
                      nominal_penalti,
                      jumlah_hari,
                      jumlah_hari_mengendap,
                      nominal_bunga_berjalan,
                      keterangan_funding, 
                      nama_gambar,
                      status_permohonan,
                      ttd_nasabah,
                      nama_gambar_bukti,
                      user_create
                      ) 
                  VALUES
                  (
                      :id_permohonan,
                      :kantor_cabang,
                      :username, 
                      :tgl_permohonan,  
                      :jenis_permohonan,
                      :jenis_produk,
                      :tgl_pembentukan,
                      :jangka_waktu,
                      :nomor_rekening_deposito,
                      :alasan_pengajuan,
                      :jenis_permohonan_pencairan_sebelum_jt_pengajuan,
                      :jenis_kartu_identitas,
                      :nomor_identitas,
                      :nama_nasabah,
                      :status_nasabah,
                      :alamat, 
                      :nomor_telepon, 
                      :nominal,
                      :suku_bunga_deposito, 
                      :nominal_penalti,
                      :jumlah_hari,
                      :jumlah_hari_mengendap,
                      :nominal_bunga_berjalan,
                      :keterangan_funding, 
                      :nama_gambar,
                      :status_permohonan,
                      :ttd_nasabah,
                      :nama_gambar_bukti,
                      :user_create
                  )";
            $this->db->query($query);
            $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
            $this->db->bind('kantor_cabang',  $_POST['kantor_cabang']);
            $this->db->bind('username',   $_COOKIE['username']);

            $this->db->bind('tgl_permohonan',  date("Y-m-d H:i:s"));
            $this->db->bind('jenis_permohonan',  'PENCAIRAN SEBELUM JATUH TEMPO');
            $this->db->bind('jenis_produk',  $_POST['jenis_produk']);
            $this->db->bind('tgl_pembentukan',  $_POST['tgl_pembentukan_hidden']);
            $this->db->bind('jangka_waktu',  $_POST['jangka_waktu']);
            $this->db->bind('nomor_rekening_deposito',  $_POST['norek_deposito']);
            $alasan = $_POST['alasan_pengajuan'];
            if ($alasan == 'LAINNYA') {
                $this->db->bind('alasan_pengajuan',  $_POST['alasan_lain']);
            } else {
                $this->db->bind('alasan_pengajuan',  $_POST['alasan_pengajuan']);
            }
            // $this->db->bind('alasan_pengajuan',  $_POST['alasan_pengajuan']);
            $this->db->bind('jenis_permohonan_pencairan_sebelum_jt_pengajuan',  $_POST['jenis_pencairan']);
            $kartu_identitas = $_POST['jenis_kartu_identitas'];
            if ($kartu_identitas == 'LAINNYA') {
                $this->db->bind('jenis_kartu_identitas',  $_POST['identitas_lain']);
                $this->db->bind('nomor_identitas',  $_POST['nomor_identitas_lain']);
            } else {
                $this->db->bind('jenis_kartu_identitas',  $_POST['jenis_kartu_identitas']);
                $this->db->bind('nomor_identitas',  $_POST['nomor_ktp']);
            }
            $this->db->bind('nama_nasabah',  $_POST['nama_nasabah']);
            $this->db->bind('status_nasabah',  $_POST['status_nasabah']);
            $this->db->bind('alamat',  $_POST['alamat']);
            $this->db->bind('nomor_telepon',  $_POST['nomor_telepon']);
            $this->db->bind('nominal', str_replace(".", "",  $_POST['nominal']));
            $this->db->bind('suku_bunga_deposito',  $_POST['suku_bunga_deposito']);
            $this->db->bind('nominal_penalti',  str_replace(".", "",  $_POST['nominal_penalti']));
            $this->db->bind('jumlah_hari',  $_POST['jumlah_hari']);
            $this->db->bind('jumlah_hari_mengendap',  $_POST['jumlah_hari_mengendap']);
            $this->db->bind('nominal_bunga_berjalan',  str_replace(".", "",  $_POST['nominal_bunga_berjalan']));
            $this->db->bind('keterangan_funding',  $_POST['keterangan_funding']);
            $this->db->bind('nama_gambar',  $_POST['bilyet']);
            $this->db->bind('status_permohonan',  'DIAJUKAN');
            $this->db->bind('ttd_nasabah',  $_POST['ttd_nasabah']);
            $this->db->bind('nama_gambar_bukti',  $_POST['bukti_ttd']);
            $this->db->bind('user_create', $_COOKIE['username']);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }

    public function  update_data_pencairan()
    {
        $j_pencairan = $_POST['jenis_pencairan'];
        if ($j_pencairan == 'DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN') {
            $query = "UPDATE tbl_rc_permohonan SET  
                    jenis_produk = :jenis_produk,
                    tgl_pembentukan = :tgl_pembentukan,
                    jangka_waktu = :jangka_waktu,
                    nomor_rekening_deposito = :nomor_rekening_deposito,
                    alasan_pengajuan = :alasan_pengajuan,
                    jenis_permohonan_pencairan_sebelum_jt_pengajuan = :jenis_permohonan_pencairan_sebelum_jt_pengajuan,
                    jenis_kartu_identitas = :jenis_kartu_identitas,
                    nomor_identitas = :nomor_identitas,
                    nama_nasabah = :nama_nasabah, 
                    status_nasabah = :status_nasabah, 
                    alamat = :alamat, 
                    nomor_telepon = :nomor_telepon, 
                    nominal = :nominal,  
                    suku_bunga_deposito = :suku_bunga_deposito,
                    nominal_penalti = :nominal_penalti,
                    jumlah_hari = :jumlah_hari,
                    jumlah_hari_mengendap =:jumlah_hari_mengendap,
                    nominal_bunga_berjalan = :nominal_bunga_berjalan,
                    nomor_rekening_pencairan = :nomor_rekening_pencairan,
                    keterangan_funding = :keterangan_funding
                    -- nama_gambar = :nama_gambar
                    WHERE id_permohonan= :id_permohonan";
            $this->db->query($query);
            $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
            $this->db->bind('jenis_produk',  $_POST['jenis_produk']);
            $this->db->bind('tgl_pembentukan',  $_POST['tgl_pembentukan_visible']);
            $this->db->bind('jangka_waktu',  $_POST['jangka_waktu']);
            $this->db->bind('nomor_rekening_deposito',  $_POST['norek_deposito']);
            $alasan = $_POST['alasan_pengajuan'];
            if ($alasan == 'LAINNYA') {
                $this->db->bind('alasan_pengajuan',  $_POST['alasan_lain']);
            } else {
                $this->db->bind('alasan_pengajuan',  $_POST['alasan_pengajuan']);
            }
            $this->db->bind('jenis_permohonan_pencairan_sebelum_jt_pengajuan',  $_POST['jenis_pencairan']);
            $kartu_identitas = $_POST['jenis_kartu_identitas'];
            if ($kartu_identitas == 'LAINNYA') {
                $this->db->bind('jenis_kartu_identitas',  $_POST['identitas_lain']);
                $this->db->bind('nomor_identitas',  $_POST['nomor_identitas_lain']);
            } else {
                $this->db->bind('jenis_kartu_identitas',  $_POST['jenis_kartu_identitas']);
                $this->db->bind('nomor_identitas',  $_POST['nomor_ktp']);
            }
            $this->db->bind('nama_nasabah',  $_POST['nama_nasabah']);
            $this->db->bind('status_nasabah',  $_POST['status_nasabah']);
            $this->db->bind('alamat',  $_POST['alamat']);
            $this->db->bind('nomor_telepon',  $_POST['nomor_telepon']);
            $this->db->bind('nominal', str_replace(".", "",  $_POST['nominal']));
            $this->db->bind('suku_bunga_deposito',  $_POST['suku_bunga_deposito']);
            $this->db->bind('nominal_penalti',  str_replace(".", "",  $_POST['nominal_penalti']));
            $this->db->bind('jumlah_hari',  $_POST['jumlah_hari']);
            $this->db->bind('jumlah_hari_mengendap',  $_POST['jumlah_hari_mengendap']);
            $this->db->bind('nominal_bunga_berjalan',  str_replace(".", "",  $_POST['nominal_bunga_berjalan']));
            $this->db->bind('nomor_rekening_pencairan',  $_POST['norek_pencairan']);
            $this->db->bind('keterangan_funding',  $_POST['keterangan_funding']);
            // $this->db->bind('nama_gambar',  $_POST['bilyet']);
            $this->db->execute();
            return $this->db->rowCount();
        } else if ($j_pencairan == 'DIKENAKAN PENALTI, BUNGA BERJALAN TIDAK DIBAYARKAN') {
            $query = "UPDATE tbl_rc_permohonan SET  
                    jenis_produk = :jenis_produk,
                    tgl_pembentukan = :tgl_pembentukan,
                    jangka_waktu = :jangka_waktu,
                    nomor_rekening_deposito = :nomor_rekening_deposito,
                    alasan_pengajuan = :alasan_pengajuan,
                    jenis_permohonan_pencairan_sebelum_jt_pengajuan = :jenis_permohonan_pencairan_sebelum_jt_pengajuan,
                    jenis_kartu_identitas = :jenis_kartu_identitas,
                    nomor_identitas = :nomor_identitas,
                    nama_nasabah = :nama_nasabah, 
                    status_nasabah = :status_nasabah, 
                    alamat = :alamat, 
                    nomor_telepon = :nomor_telepon, 
                    nominal = :nominal,  
                    suku_bunga_deposito = :suku_bunga_deposito,
                    nominal_penalti = :nominal_penalti,
                    jumlah_hari = :jumlah_hari,
                    jumlah_hari_mengendap =:jumlah_hari_mengendap,
                    nominal_bunga_berjalan = :nominal_bunga_berjalan,
                    keterangan_funding = :keterangan_funding
                    -- nama_gambar = :nama_gambar
                    WHERE id_permohonan= :id_permohonan";
            $this->db->query($query);
            $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
            $this->db->bind('jenis_produk',  $_POST['jenis_produk']);
            $this->db->bind('tgl_pembentukan',  $_POST['tgl_pembentukan_visible']);
            $this->db->bind('jangka_waktu',  $_POST['jangka_waktu']);
            $this->db->bind('nomor_rekening_deposito',  $_POST['norek_deposito']);
            $alasan = $_POST['alasan_pengajuan'];
            if ($alasan == 'Lainnya') {
                $this->db->bind('alasan_pengajuan',  $_POST['alasan_lain']);
            } else {
                $this->db->bind('alasan_pengajuan',  $_POST['alasan_pengajuan']);
            }
            $this->db->bind('jenis_permohonan_pencairan_sebelum_jt_pengajuan',  $_POST['jenis_pencairan']);
            $kartu_identitas = $_POST['jenis_kartu_identitas'];
            if ($kartu_identitas == 'LAINNYA') {
                $this->db->bind('jenis_kartu_identitas',  $_POST['identitas_lain']);
                $this->db->bind('nomor_identitas',  $_POST['nomor_identitas_lain']);
            } else {
                $this->db->bind('jenis_kartu_identitas',  $_POST['jenis_kartu_identitas']);
                $this->db->bind('nomor_identitas',  $_POST['nomor_ktp']);
            }
            $this->db->bind('nama_nasabah',  $_POST['nama_nasabah']);
            $this->db->bind('status_nasabah',  $_POST['status_nasabah']);
            $this->db->bind('alamat',  $_POST['alamat']);
            $this->db->bind('nomor_telepon',  $_POST['nomor_telepon']);
            $this->db->bind('nominal', str_replace(".", "",  $_POST['nominal']));
            $this->db->bind('suku_bunga_deposito',  $_POST['suku_bunga_deposito']);
            $this->db->bind('nominal_penalti',  str_replace(".", "",  $_POST['nominal_penalti']));
            $this->db->bind('jumlah_hari',  $_POST['jumlah_hari']);
            $this->db->bind('jumlah_hari_mengendap',  $_POST['jumlah_hari_mengendap']);
            $this->db->bind('nominal_bunga_berjalan',  str_replace(".", "",  $_POST['nominal_bunga_berjalan']));
            $this->db->bind('keterangan_funding',  $_POST['keterangan_funding']);
            // $this->db->bind('nama_gambar',  $_POST['bilyet']);
            $this->db->execute();
            return $this->db->rowCount();
        } else if ($j_pencairan == 'TIDAK DIKENAKAN PENALTI, BUNGA BERJALAN DIBAYARKAN') {
            $query = "UPDATE tbl_rc_permohonan SET  
                    jenis_produk = :jenis_produk,
                    tgl_pembentukan = :tgl_pembentukan,
                    jangka_waktu = :jangka_waktu,
                    nomor_rekening_deposito = :nomor_rekening_deposito,
                    alasan_pengajuan = :alasan_pengajuan,
                    jenis_permohonan_pencairan_sebelum_jt_pengajuan = :jenis_permohonan_pencairan_sebelum_jt_pengajuan,
                    jenis_kartu_identitas = :jenis_kartu_identitas,
                    nomor_identitas = :nomor_identitas,
                    nama_nasabah = :nama_nasabah, 
                    status_nasabah = :status_nasabah, 
                    alamat = :alamat, 
                    nomor_telepon = :nomor_telepon, 
                    nominal = :nominal,  
                    suku_bunga_deposito = :suku_bunga_deposito,
                    nominal_penalti = :nominal_penalti,
                    jumlah_hari = :jumlah_hari,
                    jumlah_hari_mengendap = :jumlah_hari_mengendap,
                    nominal_bunga_berjalan = :nominal_bunga_berjalan,
                    nomor_rekening_pencairan = :nomor_rekening_pencairan,
                    keterangan_funding = :keterangan_funding
                --    nama_gambar = :gambar_bilyet
                    WHERE id_permohonan= :id_permohonan";

            $this->db->query($query);
            $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
            $this->db->bind('jenis_produk',  $_POST['jenis_produk']);
            $this->db->bind('tgl_pembentukan',  $_POST['tgl_pembentukan_visible']);
            $this->db->bind('jangka_waktu',  $_POST['jangka_waktu']);
            $this->db->bind('nomor_rekening_deposito',  $_POST['norek_deposito']);
            $alasan = $_POST['alasan_pengajuan'];
            if ($alasan == 'LAINNYA') {
                $this->db->bind('alasan_pengajuan',  $_POST['alasan_lain']);
            } else {
                $this->db->bind('alasan_pengajuan',  $_POST['alasan_pengajuan']);
            }
            $this->db->bind('jenis_permohonan_pencairan_sebelum_jt_pengajuan',  $_POST['jenis_pencairan']);
            $kartu_identitas = $_POST['jenis_kartu_identitas'];
            if ($kartu_identitas == 'LAINNYA') {
                $this->db->bind('jenis_kartu_identitas',  $_POST['identitas_lain']);
                $this->db->bind('nomor_identitas',  $_POST['nomor_identitas_lain']);
            } else {
                $this->db->bind('jenis_kartu_identitas',  $_POST['jenis_kartu_identitas']);
                $this->db->bind('nomor_identitas',  $_POST['nomor_ktp']);
            }
            $this->db->bind('nama_nasabah',  $_POST['nama_nasabah']);
            $this->db->bind('status_nasabah',  $_POST['status_nasabah']);
            $this->db->bind('alamat',  $_POST['alamat']);
            $this->db->bind('nomor_telepon',  $_POST['nomor_telepon']);
            $this->db->bind('nominal', str_replace(".", "",  $_POST['nominal']));
            $this->db->bind('suku_bunga_deposito',  $_POST['suku_bunga_deposito']);
            $this->db->bind('nominal_penalti',  str_replace(".", "",  $_POST['nominal_penalti']));
            $this->db->bind('jumlah_hari',  $_POST['jumlah_hari']);
            $this->db->bind('jumlah_hari_mengendap',  $_POST['jumlah_hari_mengendap']);
            $this->db->bind('nominal_bunga_berjalan',  str_replace(".", "",  $_POST['nominal_bunga_berjalan']));
            $this->db->bind('nomor_rekening_pencairan',  $_POST['norek_pencairan']);
            $this->db->bind('keterangan_funding',  $_POST['keterangan_funding']);
            // $this->db->bind('nama_gambar',  $_POST['bilyet']);
            $this->db->execute();
            return $this->db->rowCount();
        } else {
            $query = "UPDATE tbl_rc_permohonan SET  
                    jenis_produk = :jenis_produk,
                    tgl_pembentukan = :tgl_pembentukan,
                    jangka_waktu = :jangka_waktu,
                    nomor_rekening_deposito = :nomor_rekening_deposito,
                    alasan_pengajuan = :alasan_pengajuan,
                    jenis_permohonan_pencairan_sebelum_jt_pengajuan = :jenis_permohonan_pencairan_sebelum_jt_pengajuan,
                    jenis_kartu_identitas = :jenis_kartu_identitas,
                    nomor_identitas = :nomor_identitas,
                    nama_nasabah = :nama_nasabah, 
                    status_nasabah = :status_nasabah, 
                    alamat = :alamat, 
                    nomor_telepon = :nomor_telepon, 
                    nominal = :nominal,  
                    suku_bunga_deposito = :suku_bunga_deposito,
                    nominal_penalti = :nominal_penalti,
                    jumlah_hari = :jumlah_hari,
                    jumlah_hari_mengendap = :jumlah_hari_mengendap,
                    nominal_bunga_berjalan = :nominal_bunga_berjalan,
                    keterangan_funding = :keterangan_funding 
                    -- nama_gambar = :nama_gambar
                    WHERE id_permohonan= :id_permohonan";

            $this->db->query($query);
            $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
            $this->db->bind('jenis_produk',  $_POST['jenis_produk']);
            $this->db->bind('tgl_pembentukan',  $_POST['tgl_pembentukan_visible']);
            $this->db->bind('jangka_waktu',  $_POST['jangka_waktu']);
            $this->db->bind('nomor_rekening_deposito',  $_POST['norek_deposito']);
            $alasan = $_POST['alasan_pengajuan'];
            if ($alasan == 'LAINNYA') {
                $this->db->bind('alasan_pengajuan',  $_POST['alasan_lain']);
            } else {
                $this->db->bind('alasan_pengajuan',  $_POST['alasan_pengajuan']);
            }
            $this->db->bind('jenis_permohonan_pencairan_sebelum_jt_pengajuan',  $_POST['jenis_pencairan']);
            $kartu_identitas = $_POST['jenis_kartu_identitas'];
            if ($kartu_identitas == 'LAINNYA') {
                $this->db->bind('jenis_kartu_identitas',  $_POST['identitas_lain']);
                $this->db->bind('nomor_identitas',  $_POST['nomor_identitas_lain']);
            } else {
                $this->db->bind('jenis_kartu_identitas',  $_POST['jenis_kartu_identitas']);
                $this->db->bind('nomor_identitas',  $_POST['nomor_ktp']);
            }
            $this->db->bind('nama_nasabah',  $_POST['nama_nasabah']);
            $this->db->bind('status_nasabah',  $_POST['status_nasabah']);
            $this->db->bind('alamat',  $_POST['alamat']);
            $this->db->bind('nomor_telepon',  $_POST['nomor_telepon']);
            $this->db->bind('nominal', str_replace(".", "",  $_POST['nominal']));
            $this->db->bind('suku_bunga_deposito',  $_POST['suku_bunga_deposito']);
            $this->db->bind('nominal_penalti',  str_replace(".", "",  $_POST['nominal_penalti']));
            $this->db->bind('jumlah_hari',  $_POST['jumlah_hari']);
            $this->db->bind('jumlah_hari_mengendap',  $_POST['jumlah_hari_mengendap']);

            $this->db->bind('nominal_bunga_berjalan',  str_replace(".", "",  $_POST['nominal_bunga_berjalan']));
            $this->db->bind('keterangan_funding',  $_POST['keterangan_funding']);
            // $this->db->bind('nama_gambar',  $_POST['bilyet']);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }

    public function update_data_pengajuan()
    {
        $pengajuan_ulang = $_POST['pengajuan_ulang'];
        // $approval_awal = $_POST['approval_awal'];
        $pengajuan_awal = $_POST['pengajuan_awal'];

        $query = "UPDATE tbl_rc_permohonan SET 
                jenis_permohonan_pencairan_sebelum_jt_pengajuan = :jenis_permohonan_pencairan_sebelum_jt_pengajuan,
                keterangan_funding = :keterangan_funding,
                status_permohonan = :status_permohonan,
                tgl_pengajuan_ulang = :tgl_pengajuan_ulang,
                history_permohonan_pencairan = :history_permohonan_pencairan,
                history_tgl_ket_pengajuan = :history_tgl_ket_pengajuan
                WHERE id_permohonan = :id_permohonan";
        $this->db->query($query);
        $this->db->bind('id_permohonan', $_POST['id_permohonan']);
        $this->db->bind('jenis_permohonan_pencairan_sebelum_jt_pengajuan', $pengajuan_ulang);
        $this->db->bind('keterangan_funding', $_POST['keterangan_funding']);
        $this->db->bind('status_permohonan', 'DIAJUKAN ULANG');
        $this->db->bind('tgl_pengajuan_ulang', date("Y-m-d H:i:s"));
        $this->db->bind('history_permohonan_pencairan', " - " . $pengajuan_awal . "\n");
        if ($_POST['tgl_pengajuan_ulang'] === null) {
            $this->db->bind('history_tgl_ket_pengajuan', "- " . $_POST['tgl_permohonan'] . "\n  ");
        } else {
            $this->db->bind('history_tgl_ket_pengajuan', $_POST['tgl_pengajuan_ulang'] . "\n  ");
        }
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function lihat_permohonan_pencairan()
    {
        $this->db->query('SELECT * FROM tbl_rc_permohonan where jenis_permohonan="Pencairan sebelum Jatuh Tempo" AND kantor_cabang =:kantor_cabang AND username =:username ORDER BY id_permohonan DESC');
        $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
        $this->db->bind('username', $_COOKIE['username']);
        return $this->db->resultSet();
    }

    public function modal_detail()
    {
        $this->db->query('SELECT * FROM tbl_rc_permohonan WHERE id_permohonan = :id_permohonan');
        $this->db->bind('id_permohonan',  $_POST['id_permohonan']);
        return $this->db->single();
    }

    public function get_data_produk()
    {
        $this->db->query('SELECT distinct tbl_rc_produk.nama_produk FROM tbl_rc_produk, tbl_rc_trx_produk WHERE tbl_rc_produk.id_produk = tbl_rc_trx_produk.id_produk AND jenis_permohonan = "Suku Bunga Khusus" ');
        //$this->db->query('SELECT distinct tbl_rc_produk.nama_produk FROM tbl_rc_produk,tbl_rc_jangka_waktu, tbl_rc_trx_produk WHERE tbl_rc_produk.id_produk = tbl_rc_trx_produk.id_produk AND jenis_permohonan = "Suku Bunga Khusus" ');

        return $this->db->resultSet();
    }

    public function get_data_jangka_waktu()
    {
        $this->db->query('SELECT distinct tbl_rc_jangka_waktu.jangka_waktu FROM tbl_rc_trx_produk, tbl_rc_jangka_waktu WHERE tbl_rc_jangka_waktu.id_jangka_waktu = tbl_rc_trx_produk.id_jangka_waktu AND jenis_permohonan = "Suku Bunga Khusus" ');
        //$this->db->query('SELECT distinct tbl_rc_produk.nama_produk FROM tbl_rc_produk,tbl_rc_jangka_waktu, tbl_rc_trx_produk WHERE tbl_rc_produk.id_produk = tbl_rc_trx_produk.id_produk AND jenis_permohonan = "Suku Bunga Khusus" ');

        return $this->db->resultSet();
    }


    // public function max_data_permohonan(){
    //     $this->db->query('SELECT MAX (id_permohonan) FROM tbl_rate_counter');
    //     return $this->db->resultSet();
    // }

    public function get_data_produk_pencairan()
    {
        //$this->db->query('select tbl_rc_produk.nama_produk, tbl_rc_jangka_waktu.jangka_waktu from tbl_rc_trx_produk inner join tbl_rc_produk on tbl_rc_trx_produk.id_produk = tbl_rc_produk.id_produk inner join tbl_rc_jangka_waktu on tbl_rc_trx_produk.id_jangka_waktu = tbl_rc_jangka_waktu.id_jangka_waktu and jenis_permohonan = "Pencairan Sebelum Jatuh Tempo" ');
        $this->db->query('SELECT distinct tbl_rc_produk.nama_produk FROM tbl_rc_produk, tbl_rc_trx_produk WHERE tbl_rc_produk.id_produk = tbl_rc_trx_produk.id_produk AND jenis_permohonan = "Pencairan Sebelum Jatuh Tempo" ');

        return $this->db->resultSet();
    }
    public function get_data_jangka_waktu_pencairan()
    {

        $this->db->query('SELECT distinct tbl_rc_jangka_waktu.jangka_waktu FROM tbl_rc_trx_produk, tbl_rc_jangka_waktu WHERE tbl_rc_jangka_waktu.id_jangka_waktu = tbl_rc_trx_produk.id_jangka_waktu AND jenis_permohonan = "Pencairan Sebelum Jatuh Tempo" ');
        //  $this->db->query('SELECT distinct tbl_rc_jangka_waktu.jangka_waktu FROM tbl_rc_produk,tbl_rc_jangka_waktu, tbl_rc_trx_produk WHERE tbl_rc_produk.id_produk = tbl_rc_trx_produk.id_produk AND jenis_permohonan = "Pencairan Sbeleum Jatuh Tempo" ');

        return $this->db->resultSet();
    }

    public function lihat_data_permohonan_disetujui()
    {
        $this->db->query('SELECT * FROM tbl_rc_permohonan where  kantor_cabang =:kantor_cabang AND status_permohonan="DISETUJUI" AND username = :username');
        $this->db->bind('kantor_cabang', $_COOKIE['nama_cabang']);
        $this->db->bind('username', $_COOKIE['username']);
        return $this->db->resultSet();
    }

    public function get_jangka_waktu()
    {
        $this->db->query('SELECT * FROM tbl_rc_jangka_waktu where  jangka_waktu != "1 BULAN" AND jangka_waktu != "2 BULAN" AND jangka_waktu != "24 BULAN"');
        return $this->db->resultSet();
    }

    public function jangka_waktu_prima()
    {
        $this->db->query('SELECT * FROM tbl_rc_jangka_waktu where  jangka_waktu != "2 BULAN"');
        return $this->db->resultSet();
    }
    public function jangka_waktu()
    {
        $this->db->query('SELECT * FROM tbl_rc_jangka_waktu where jangka_waktu != "2 BULAN" AND jangka_waktu != "24 BULAN"');
        return $this->db->resultSet();
    }

    public function formulir_persetujuan($id)
    {
        $query = 'SELECT * FROM tbl_rc_permohonan WHERE id_permohonan = :id';
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }
}
