<?php 

class Tahun_ajaran extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		// cek apakah sudah login? jika belum , usir ke halaman login
		if ( !$this->session->userdata('admin') ) {
			redirect('login');
		}

		$this->load->model('Mtahun_ajaran');
	}

	public function index()
	{
		$data['tahun_ajaran']=$this->Mtahun_ajaran->tampil_tahun_ajaran();

		$this->load->view('admin/header');
		$this->load->view('admin/tahun_ajaran/tampil',$data);
		$this->load->view('admin/footer');
	}

	function tambah()
	{
		$input =  $this->input->post();

		if ($input) 
		{
			$this->Mtahun_ajaran->simpan_tahun_ajaran($input);
			redirect('admin/tahun_ajaran','refresh');			
		}

		$data['tahun']=$this->Mtahun_ajaran->tampil_tahun_ajaran();
		$this->load->view('admin/header');
		$this->load->view('admin/tahun_ajaran/tambah',$data);
		$this->load->view('admin/footer');
	}

	function ubah($id)
	{
		$input =  $this->input->post();

		if ($input) 
		{
			$this->Mtahun_ajaran->ubah_tahun_ajaran($input,$id);	
			redirect('admin/tahun_ajaran','refresh');
		}

		$data['tahun_ajaran']=$this->Mtahun_ajaran->ambil_tahun_ajaran($id);

		$this->load->view('admin/header');
		$this->load->view('admin/tahun_ajaran/ubah',$data);
		$this->load->view('admin/footer');
	}

	function hapus($id)
	{
		$this->Mtahun_ajaran->hapus_tahun_ajaran($id);

		redirect('admin/tahun_ajaran','refresh');
	}

}
?>