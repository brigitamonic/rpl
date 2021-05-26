<?php 

class Mahasiswa extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mmahasiswa');
		$this->load->model('Mtahun_ajaran');
	}

	public function index()
	{
		$data['mahasiswa']=$this->Mmahasiswa->tampil_mahasiswa();

		$this->load->view('admin/header');
		$this->load->view('admin/mahasiswa/tampil',$data);
		$this->load->view('admin/footer');
	}

	function tambah()
	{
		$input =  $this->input->post();

		if ($input) 
		{
			$this->Mmahasiswa->simpan_mahasiswa($input);
			redirect('admin/mahasiswa','refresh');			
		}

		$data['tahun']=$this->Mtahun_ajaran->tampil_tahun_ajaran();
		$this->load->view('admin/header');
		$this->load->view('admin/mahasiswa/tambah',$data);
		$this->load->view('admin/footer');
	}

	function ubah($nim)
	{
		$input =  $this->input->post();

		if ($input) 
		{
			$this->Mmahasiswa->ubah_mahasiswa($input,$nim);	
			redirect('admin/mahasiswa','refresh');		
		}

		$data['mahasiswa']=$this->Mmahasiswa->ambil_mahasiswa($nim);
		$data['tahun_ajaran']=$this->Mtahun_ajaran->tampil_tahun_ajaran();

		$this->load->view('admin/header');
		$this->load->view('admin/mahasiswa/ubah',$data);
		$this->load->view('admin/footer');
	}

}
?>