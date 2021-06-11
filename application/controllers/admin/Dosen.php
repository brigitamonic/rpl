<?php 

class Dosen extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		// cek apakah sudah login? jika belum , usir ke halaman login
		if ( !$this->session->userdata('admin') ) {
			redirect('login');
		}

		$this->load->model('Mdosen');
	}

	public function index()
	{
		$data['dosen']=$this->Mdosen->tampil_dosen();

		$this->load->view('admin/header');
		$this->load->view('admin/dosen/tampil',$data);
		$this->load->view('admin/footer');
	}

	function tambah()
	{
		//mengambil inputan dari formulir 
		$input =  $this->input->post();

		if ($input) 
		{
			//simpan data ke db
			$this->Mdosen->simpan_dosen($input);
			redirect('dosen/dosen','refresh');			
		}

		$this->load->view('admin/header');
		$this->load->view('admin/dosen/tambah');
		$this->load->view('admin/footer');
	}

	function ubah($nidn)
	{
		$input =  $this->input->post();

		if ($input) 
		{
			$this->Mdosen->ubah_dosen($input,$nidn);	
			redirect('dosen/dosen','refresh');		
		}

		$data['dosen']=$this->Mdosen->ambil_dosen($nidn);
		//$data['tahun_ajaran']=$this->Mtahun_ajaran->tampil_tahun_ajaran();

		$this->load->view('admin/header');
		$this->load->view('admin/dosen/ubah',$data);
		$this->load->view('admin/footer');
	}
}
?>