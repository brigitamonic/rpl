<?php 

class Mpenguji extends CI_model
{
	
	function tampil_penguji()
	{
		$this->db->where('pengajuan.status_pengajuan','Diterima');
		$this->db->join('mahasiswa', 'pengajuan.nim = mahasiswa.nim', 'left');
		$this->db->join('dosen', 'pengajuan.nidn = dosen.nidn', 'left');
		$this->db->join('ruangan', 'pengajuan.id_ruangan = ruangan.id_ruangan', 'left');
		$this->db->where_in('jenis_pengajuan', ['Pra KP', 'KP']);
		$ambil = $this->db->get('pengajuan');
		return $ambil->result_array();
	}

	function lulus_pengujian($id_pengajuan)
	{
		$data['status_ujian'] = 'Lulus';
		$this->db->where('id_pengajuan',$id_pengajuan);
		$this->db->update('pengajuan',$data);
	}

	function tidak_lulus($id_pengajuan)
	{
		$data['status_ujian'] = 'Tidak Lulus';
		$this->db->where('id_pengajuan',$id_pengajuan);
		$this->db->update('pengajuan',$data);
	}

}
?>