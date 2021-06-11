<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mruangan extends CI_Model {

	function tampil_ruangan()
	{
		$ambil = $this->db->get('ruangan');
		return $ambil->result_array();
	}

}

/* End of file Mruangan.php */
/* Location: ./application/models/Mruangan.php */