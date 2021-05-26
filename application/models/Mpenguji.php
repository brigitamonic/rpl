<?php 

class Mpenguji extends CI_model
{
	
	function tampil_penguji()
	{
		$this->db->where('pengajuan.status_pengajuan','Diterima');
		$this->db->join('pengajuan','penguji.id_pengajuan = pengajuan.id_pengajuan', 'left');
		$this->db->join('mahasiswa', 'pengajuan.nim = mahasiswa.nim', 'left');
		$this->db->join('dosen', 'penguji.nidn_penguji = dosen.nidn', 'left');
		$ambil = $this->db->get('penguji');
		return $ambil->result_array();
	}
}
?>