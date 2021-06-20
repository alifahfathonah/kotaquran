<?php
Class Model_select extends CI_Model
{
    function Level_satu()
    {
        $this->db->order_by('id', 'ASC');
        return $this->db->from('reg_provinces')->get()->result();
    }

    function Level_dua($id)
    {
        $this->db->where('province_id', $id);
        $this->db->order_by('id', 'ASC');
        return $this->db->from('reg_regencies')->get()->result();
    }
    function Level_tiga($id)
    {
        $this->db->where('regency_id', $id);
        $this->db->order_by('id', 'ASC');
        return $this->db->from('reg_districts')->get()->result();
    }
    function Level_empat($id)
    {
        $this->db->where('district_id', $id);
        $this->db->order_by('id', 'ASC');
        return $this->db->from('reg_villages')->get()->result();
    }

    function Pilih_pengajar($id)
    {
        $this->db->select('*');
		$this->db->from('kelas');
		$this->db->join('program', 'program.prog_id = kelas.prog_id');
		$this->db->where('kelas.jenis_kelamin', $id);
		return $this->db->get()->result();
        
        // $this->db->where('jenis_kelamin', $id);
        // $this->db->order_by('nama_ketua', 'ASC');
        // return $this->db->from('kelas')->get()->result();
    }

}
?>