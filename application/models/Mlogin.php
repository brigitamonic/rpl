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
			$this->db->select('*, dosen.nidn AS nidn');
			$this->db->where('email_dosen', $email);
			$this->db->join('koordinator', 'koordinator.nidn = dosen.nidn', 'left');
			$ambil = $this->db->get('dosen');

			$hitung = $ambil->num_rows();
			if ($hitung==1) 
			{
				$akun = $ambil->row_array();

				// echo "<pre>";
				// print_r($akun);
				// echo "</pre>";
				// die;

				// jika id_koordinator tidak kosong, berarti dia sbg admin
				if (!empty($akun['id_koordinator'])) {
					$this->session->set_userdata("admin", $akun );
					return "sukses-admin";
				} else {
					$this->session->set_userdata("dosen", $akun );
					return "sukses-dosen";
				}

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