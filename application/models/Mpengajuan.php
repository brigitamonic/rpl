<?php 


class Mpengajuan extends CI_Model
{
	
	function tampil_pengajuan()
	{
		$this->db->join('dosen','pengajuan.nidn = dosen.nidn', 'left');
		$this->db->join('mahasiswa','pengajuan.nim = mahasiswa.nim', 'left');
		$this->db->join('tahun_ajaran','pengajuan.id_tahun_ajaran = tahun_ajaran.id_tahun_ajaran', 'left');
		$ambil = $this->db->get('pengajuan');
		return $ambil->result_array();
	}

	function terima($id_pengajuan)
	{
		$status['status_pengajuan']="Diterima";

		$this->db->where('id_pengajuan', $id_pengajuan);
		$this->db->update('pengajuan', $status);
	}

	function tolak($id_pengajuan)
	{
		$status['status_pengajuan']="Ditolak";

		$this->db->where('id_pengajuan', $id_pengajuan);
		$this->db->update('pengajuan', $status);
	}
}
?>