<?php 

class Mahasiswa extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();

		// cek apakah sudah login? jika belum , usir ke halaman login
		if ( !$this->session->userdata('dosen') ) {
			redirect('login');
		}

		$this->load->model('Mdosen');
		$this->load->model('Mmahasiswa');
		$this->load->model('Mtahun_ajaran');
	}

	public function index()
	{
		$data['cek']=$this->Mdosen->cek_koordinator_dosen($_SESSION['dosen']['nidn']);

		$data['mahasiswa']=$this->Mmahasiswa->tampil_mahasiswa_bimbingan();

		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/mahasiswa/tampil',$data);
		$this->load->view('dosen/footer');
	}

	

}
?>