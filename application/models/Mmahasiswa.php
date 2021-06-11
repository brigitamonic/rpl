<?php 

class Mmahasiswa extends CI_Model
{
	
	function tampil_mahasiswa()
	{

		$this->db->select("*, mahasiswa.jenis_kelamin AS jenis_kelamin");
		$this->db->join('dosen', 'dosen.nidn = mahasiswa.nidn', 'left');
		$this->db->join('tahun_ajaran','mahasiswa.tahun_masuk_mahasiswa=tahun_ajaran.id_tahun_ajaran','left');
		$ambil = $this->db->get('mahasiswa');
		return $ambil->result_array();
	}

	function tampil_mahasiswa_bimbingan()
	{		
		$this->db->select("mahasiswa.*, mahasiswa.jenis_kelamin AS jenis_kelamin, pengajuan.semester_pengajuan, tahun_ajaran.nama_tahun_ajaran, pengajuan.judul_kp, pengajuan.lembaga_instansi, pengajuan.pimpinan_lembaga_instansi");
		$this->db->join('pengajuan','pengajuan.nim=mahasiswa.nim','left');
		$this->db->join('tahun_ajaran','mahasiswa.tahun_masuk_mahasiswa=tahun_ajaran.id_tahun_ajaran','left');

		// filter berdasarkan nidn nya
		$this->db->where('mahasiswa.nidn', $_SESSION['dosen']['nidn']);

		$ambil = $this->db->get('mahasiswa');
		return $ambil->result_array();
	}

	function simpan_mahasiswa($input)
	{
		$input['password_mahasiswa']=sha1($input['password_mahasiswa']);

		$config['upload_path'] = './assets/mahasiswa/';
		$config['allowed_types'] = 'jpeg|jpg|png';

		$this->load->library('upload',$config);

		$upload = $this->upload->do_upload("foto_mahasiswa");

		if ($upload) 
		{
			$input['foto_mahasiswa']=$this->upload->data("file_name");

			$this->db->insert('mahasiswa',$input);
		}
	}
	function ambil_mahasiswa($nim)
	{
		$this->db->where('nim',$nim);
		$ambil = $this->db->get('mahasiswa');
		return $ambil->row_array();
	}

	function ubah_mahasiswa($input,$nim)
	{
		$input['password_mahasiswa']=sha1($input['password_mahasiswa']);

		$config['upload_path'] = './assets/mahasiswa/';
		$config['allowed_types'] = 'jpeg|jpg|png';

		$this->load->library('upload',$config);

		$upload = $this->upload->do_upload("foto_mahasiswa");

		if ($upload AND !empty($input['password_mahasiswa']))
		{
			$mahasiswa = $this->ambil_mahasiswa($nim);
			$foto_hapus = $mahasiswa['foto_mahasiswa'];

			unlink("./assets/mahasiswa/$foto_hapus");
			$input['foto_mahasiswa']=$this->upload->data("file_name");
			$input['password_mahasiswa']=sha1($input['password_mahasiswa']);

			$this->db->where('nim',$nim);
			$this->db->update('mahasiswa',$input);

		}
		elseif (!empty($_POST['password_mahasiswa'])) 
		{
			$input['password_mahasiswa']=sha1($input['password_mahasiswa']);

			$this->db->where('nim',$nim);
			$this->db->update('mahasiswa',$input);
			
		}
		elseif ($upload) 
		{
			unset($input['password_mahasiswa']);
			$mahasiswa = $this->ambil_mahasiswa('$nim');
			$foto_hapus = $mahasiswa['foto_mahasiswa'];

			unlink("./assets/mahasiswa/$foto_hapus");

			$input['foto_mahasiswa']=$this->upload->data('file_name');
			$this->db->where('nim',$nim);
			$this->db->update('mahasiswa',$input);
		}
		else
		{
			unset($input['password_mahasiswa']);

			$this->db->where('nim',$nim);
			$this->db->update('mahasiswa',$input);
		}
	}
}

?>