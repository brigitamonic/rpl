<?php 

class Mdosen extends CI_Model
{
	
	function tampil_dosen()
	{
		$ambil = $this->db->get('dosen');
		return $ambil->result_array();
	}

	function simpan_dosen($input)
	{
		//enkripsi password
		$input['password_dosen']=sha1($input['password_dosen']);

		//konfigurasi untuk penyimpanan file foto dan ekstensi yang diperbolehkan 
		$config['upload_path'] = './assets/dosen/';
		$config['allowed_types'] = 'jpeg|jpg|png';

		$this->load->library('upload',$config);

		$upload = $this->upload->do_upload("foto_dosen");

		if ($upload) 
		{
			$input['foto_dosen']=$this->upload->data("file_name");

			//simpan data ke db
			$this->db->insert('dosen',$input);
		}
	}

	function ambil_dosen($nidn)
	{
		$this->db->where('nidn',$nidn);
		$ambil = $this->db->get('dosen');
		return $ambil->row_array();
	}

	function ubah_dosen($input,$nidn)
	{
		$input['password_dosen']=sha1($input['password_dosen']);

		$config['upload_path'] = './assets/dosen/';
		$config['allowed_types'] = 'jpeg|jpg|png';

		$this->load->library('upload',$config);

		$upload = $this->upload->do_upload("foto_dosen");

		if ($upload AND !empty($input['password_dosen']))
		{
			$dosen = $this->ambil_dosen($nidn);
			$foto_hapus = $dosen['foto_dosen'];

			unlink("./assets/dosen/$foto_hapus");
			$input['foto_dosen']=$this->upload->data("file_name");
			$input['password_dosen']=sha1($input['password_dosen']);

			$this->db->where('nidn',$nidn);
			$this->db->update('dosen',$input);

		}
		elseif (!empty($_POST['password_dosen'])) 
		{
			$input['password_dosen']=sha1($input['password_dosen']);

			$this->db->where('nidn',$nidn);
			$this->db->update('dosen',$input);
			
		}
		elseif ($upload) 
		{
			unset($input['password_dosen']);
			$dosen = $this->ambil_dosen('$nidn');
			$foto_hapus = $dosen['foto_dosen'];

			unlink("./assets/dosen/$foto_hapus");

			$input['foto_dosen']=$this->upload->data('file_name');
			$this->db->where('nidn',$nidn);
			$this->db->update('dosen',$input);
		}
		else
		{
			unset($input['password_dosen']);

			$this->db->where('nidn',$nidn);
			$this->db->update('dosen',$input);
		}
	}

	function cek_koordinator_dosen($nidn)
	{
		$this->db->where('nidn',$nidn);
		$this->db->where('status_koordinator', "Aktif");
		$ambil = $this->db->get('koordinator');
		$hitung = $ambil->num_rows();
		if ($hitung==1)
		{
			return "ada";
		}
		else
		{
			return "tidak ada";
		}
	}
}

?>