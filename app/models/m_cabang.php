<?php
class m_cabang
{
    public function __construct()
    {
        $this->db = new Database;
    }

    public function daftar_cabang()
    {
        $this->db->query('SELECT * FROM tbl_cabang order by kode_cabang asc');
        return $this->db->resultSet();
    }


    public function simpan()
    {
        $query = "INSERT INTO tbl_cabang VALUES (
            '',
            :kode_cabang,
            :nama_cabang,
            :alamat,
            :kota,
            :telephone,
            :limit,
            :aturan_jumlah_komite
            )";
        $this->db->query($query);
        $this->db->bind('kode_cabang',  $_POST['kode_cabang']);
        $this->db->bind('nama_cabang',  $_POST['nama_cabang']);
        $this->db->bind('alamat',  $_POST['alamat']);
        $this->db->bind('kota',  $_POST['kota']);
        $this->db->bind('telephone',  $_POST['telephone']);
        $this->db->bind('limit',  $_POST['limit']);
        $this->db->bind('aturan_jumlah_komite',  $_POST['aturan_jumlah_komite']);
        $this->db->execute();
        return $this->db->rowCount();
    }



    public function update()
    {
        $query = "UPDATE tbl_cabang SET
        kode_cabang = :kode_cabang,
        nama_cabang = :nama_cabang,
        alamat = :alamat,
        kota = :kota,
        telephone = :telephone,
        limit = :limit,
        aturan_jumlah_komite = :aturan_jumlah_komite
        WHERE id= :id
        ";

        $this->db->query($query);
        $this->db->bind('id', $_POST['id']);
        $this->db->bind('kode_cabang', $_POST['kode_cabang']);
        $this->db->bind('nama_cabang', $_POST['nama_cabang']);
        $this->db->bind('alamat', $_POST['alamat']);
        $this->db->bind('kota', $_POST['kota']);
        $this->db->bind('telephone', $_POST['telephone']);
        $this->db->bind('limit', $_POST['limit']);
        $this->db->bind('aturan_jumlah_komite', $_POST['aturan_jumlah_komite']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function get_data($id)
    {

        $this->db->query('SELECT * FROM tbl_cabang WHERE kode_cabang = :kode_cabang');

        $this->db->bind('kode_cabang', $id);
        return $this->db->single();
    }
}
