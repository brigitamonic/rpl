<?php 

class Penguji extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		// cek apakah sudah login? jika belum , usir ke halaman login
		if ( !$this->session->userdata('dosen') ) {
			redirect('login');
		}
		$this->load->model('Mdosen');
		$this->load->model('Mpenguji');
	}

	public function index()
	{
		$data['cek']=$this->Mdosen->cek_koordinator_dosen($_SESSION['dosen']['nidn']);
		$data['penguji']=$this->Mpenguji->tampil_penguji();

		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/penguji/tampil',$data);
		$this->load->view('dosen/footer');
	}
}

?>