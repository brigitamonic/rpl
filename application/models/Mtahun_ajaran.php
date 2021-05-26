<?php 

class Mtahun_ajaran extends CI_Model
{
	
	function tampil_tahun_ajaran()
	{
		$ambil = $this->db->get('tahun_ajaran');
		return $ambil->result_array();
	}

	function ambil_tahun_ajaran($id)
	{
		$this->db->where('id_tahun_ajaran',$id);
		$ambil = $this->db->get('tahun_ajaran');
		return $ambil->row_array();
	}

	function simpan_tahun_ajaran($input)
	{
		$this->db->insert('tahun_ajaran',$input);
	}

	function ubah_tahun_ajaran($input,$nidn)
	{

		$config['upload_path'] = './assets/tahun_ajaran/';
		$this->db->where('nidn',$id);
		$this->db->update('tahun_ajaran',$input);
	}
	
}

?>