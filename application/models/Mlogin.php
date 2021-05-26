<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model {
	function login_user($email)
	{
		$this->db->where('email_mahasiswa', $email);
		$ambil = $this->db->get('mahasiswa');
		$hitung = $ambil->num_rows();
		if ($hitung==1) 
		{
			$akun = $ambil->row_array();
			
			$this->session->set_userdata("mahasiswa", $akun );
			return "sukses-mahasiswa";
		}
		else
		{
			$this->db->where('email_dosen', $email);
			$ambil = $this->db->get('dosen');
			$hitung = $ambil->num_rows();
			if ($hitung==1) 
			{
				$akun = $ambil->row_array();

				$this->session->set_userdata("dosen", $akun );
				return "sukses-dosen";
			}
			else
			{
				return "gagal";
			}
		}
	}
	

}

/* End of file Mlogin.php */
/* Location: ./application/models/Mlogin.php */