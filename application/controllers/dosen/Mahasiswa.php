<?php 

class Mahasiswa extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mdosen');
		$this->load->model('Mmahasiswa');
		$this->load->model('Mtahun_ajaran');
	}

	public function index()
	{
		$data['cek']=$this->Mdosen->cek_koordinator_dosen($_SESSION['dosen']['nidn']);
		$data['mahasiswa']=$this->Mmahasiswa->tampil_mahasiswa();

		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/mahasiswa/tampil',$data);
		$this->load->view('dosen/footer');
	}

	function tambah()
	{
		$data['cek']=$this->Mdosen->cek_koordinator_dosen($_SESSION['dosen']['nidn']);
		$input =  $this->input->post();

		if ($input) 
		{
			$this->Mmahasiswa->simpan_mahasiswa($input);
			redirect('dosen/mahasiswa','refresh');			
		}

		$data['tahun']=$this->Mtahun_ajaran->tampil_tahun_ajaran();
		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/mahasiswa/tambah',$data);
		$this->load->view('dosen/footer');
	}

	function ubah($nim)
	{
		$data['cek']=$this->Mdosen->cek_koordinator_dosen($_SESSION['dosen']['nidn']);
		$input =  $this->input->post();

		if ($input) 
		{
			$this->Mmahasiswa->ubah_mahasiswa($input,$nim);	
			redirect('dosen/mahasiswa','refresh');		
		}

		$data['mahasiswa']=$this->Mmahasiswa->ambil_mahasiswa($nim);
		$data['tahun_ajaran']=$this->Mtahun_ajaran->tampil_tahun_ajaran();

		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/mahasiswa/ubah',$data);
		$this->load->view('dosen/footer');
	}

}
?>