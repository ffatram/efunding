<?php

class m_ref_cabang
{

    public function __construct()
    {
        $this->db = new Database;
    }

    public function get_all()
    {
        $this->db->query('SELECT * FROM tbl_cabang order by kode_cabang asc');
        return $this->db->resultSet();
    }

    public function get_data_where_kode($kode)
    {
        $this->db->query('SELECT * FROM tbl_cabang WHERE kode_cabang = :a');
        $this->db->bind('a', $kode);
        return $this->db->single();
    }
}
