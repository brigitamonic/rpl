<?php 

class Tahun_ajaran extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mdosen');
		$this->load->model('Mtahun_ajaran');
	}

	public function index()
	{
		$data['cek']=$this->Mdosen->cek_koordinator_dosen($_SESSION['dosen']['nidn']);
		$data['tahun_ajaran']=$this->Mtahun_ajaran->tampil_tahun_ajaran();

		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/tahun_ajaran/tampil',$data);
		$this->load->view('dosen/footer');
	}

	function tambah()
	{
		$data['cek']=$this->Mdosen->cek_koordinator_dosen($_SESSION['dosen']['nidn']);
		$input =  $this->input->post();

		if ($input) 
		{
			$this->Mtahun_ajaran->simpan_tahun_ajaran($input);
			redirect('dosen/tahun_ajaran','refresh');			
		}

		$data['tahun']=$this->Mtahun_ajaran->tampil_tahun_ajaran();
		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/tahun_ajaran/tambah',$data);
		$this->load->view('dosen/footer');
	}

	function ubah($id)
	{
		$data['cek']=$this->Mdosen->cek_koordinator_dosen($_SESSION['dosen']['nidn']);
		$input =  $this->input->post();

		if ($input) 
		{
			$this->Mtahun_ajaran->ubah_tahun_ajaran($input,$id);	
			redirect('dosen/tahun_ajaran','refresh');
		}

		$data['tahun_ajaran']=$this->Mtahun_ajaran->ambil_tahun_ajaran($id);

		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/tahun_ajaran/ubah',$id);
		$this->load->view('dosen/footer');
	}
}
?>