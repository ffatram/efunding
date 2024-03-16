<?php

class m_cetak
{

    public function __construct()
    {
        $this->db = new Database;
    }

    // pancairan
    public function cetak_pk($id)
    {

        $this->db->query('SELECT * FROM tbl_pencairan_kredit WHERE no_permohonan_kredit = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }


    public function cetak_spk($id)
    {

        $this->db->query('SELECT * FROM tbl_pencairan_kredit WHERE no_permohonan_kredit = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function ref_pejabat($data)
    {

        $this->db->query('SELECT * FROM tbl_ref_pejabat WHERE nama_pejabat = :data');
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function  ref_sk_limit($data)
    {

        $this->db->query('SELECT * FROM tbl_ref_sk WHERE id_sk = :data');
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function  tbl_cabang($data)
    {
        $this->db->query('SELECT * FROM tbl_cabang WHERE kode_cabang = :data');
        $this->db->bind('data', $data);
        return $this->db->single();
    }

    public function  tbl_jenis_pekerjaan($data)
    {
        $this->db->query('SELECT * FROM tbl_ref_jenis_pekerjaan WHERE jenis_pekerjaan = :data');
        $this->db->bind('data', $data);
        return $this->db->single();
    }




    public function jaminan_tbl_wawancara($id)
    {
        $this->db->query('SELECT * FROM tbl_pencairan_kredit WHERE no_permohonan_kredit = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }


    public function cash_flow($id)
    {
        $this->db->query('SELECT * FROM tbl_wawancara WHERE no_permohonan_kredit = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function get_tbl_permohon_kredit($id)
    {
        $this->db->query('SELECT * FROM tbl_permohon_kredit WHERE no_permohonan_kredit = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function get_tbl_wawancara($id)
    {
        $this->db->query('SELECT * FROM tbl_wawancara WHERE no_permohonan_kredit = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function get_tbl_komite($id)
    {
        $this->db->query('SELECT * FROM tbl_komite WHERE no_permohonan_kredit = :id');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function get_tbl_keputusan_kredit($id)
    {
        $this->db->query('SELECT * FROM tbl_keputusan_kredit WHERE no_permohonan_kredit = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}
