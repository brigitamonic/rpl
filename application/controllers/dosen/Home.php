<?php 
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// cek apakah sudah login? jika belum , usir ke halaman login
		if ( !$this->session->userdata('dosen') ) {
			redirect('login');
		}

		$this->load->model('Mdosen');
	}

	public function index()
	{
		$data['cek']=$this->Mdosen->cek_koordinator_dosen($_SESSION['dosen']['nidn']);

		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/home');
		$this->load->view('dosen/footer');

		

	}
}

?>