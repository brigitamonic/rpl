<?php 
class Home extends CI_Controller
{
	
	public function index()
	{
		// cek apakah sudah login? jika belum , usir ke halaman login
		if ( !$this->session->userdata('admin') ) {
			redirect('login');
		}
		$this->load->view('admin/header');
		$this->load->view('admin/home');
		$this->load->view('admin/footer');
	}
}

?>