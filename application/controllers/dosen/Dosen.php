<?php 

class Dosen extends CI_Controller
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
		$data['dosen']=$this->Mdosen->tampil_dosen();

		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/dosen/tampil',$data);
		$this->load->view('dosen/footer');
	}

	function tambah()
	{
		$data['cek']=$this->Mdosen->cek_koordinator_dosen($_SESSION['dosen']['nidn']);
		//mengambil inputan dari formulir 
		$input =  $this->input->post();

		if ($input) 
		{
			//simpan data ke db
			$this->Mdosen->simpan_dosen($input);
			redirect('dosen/dosen','refresh');			
		}

		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/dosen/tambah');
		$this->load->view('dosen/footer');
	}

	function ubah($nidn)
	{
		$data['cek']=$this->Mdosen->cek_koordinator_dosen($_SESSION['dosen']['nidn']);
		$input =  $this->input->post();

		if ($input) 
		{
			$this->Mdosen->ubah_dosen($input,$nidn);	
			redirect('dosen/dosen','refresh');		
		}

		$data['dosen']=$this->Mdosen->ambil_dosen($nidn);
		//$data['tahun_ajaran']=$this->Mtahun_ajaran->tampil_tahun_ajaran();

		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/dosen/ubah',$data);
		$this->load->view('dosen/footer');
	}
}
?>