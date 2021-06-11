<?php 

class Penguji extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		// cek apakah sudah login? jika belum , usir ke halaman login
		if ( !$this->session->userdata('admin') ) {
			redirect('login');
		}

		$this->load->model('Mpenguji');
		$this->load->model('Mpengajuan');
	}

	public function index()
	{
		$data['penguji']=$this->Mpenguji->tampil_penguji();

		$this->load->view('admin/header');
		$this->load->view('admin/penguji/tampil',$data);
		$this->load->view('admin/footer');
	}

	function jadwal($id_pengajuan)
	{
		// ambil inputan
		$inputan = $this->input->post();

		// echo "<pre>";
		// print_r ($inputan);
		// echo "</pre>";die;

		// jika ada inputan
		if ($inputan) {
			$this->Mpengajuan->simpan_jadwal($inputan, $id_pengajuan);

			redirect('admin/penguji','refresh');
		}

		$data['pengajuan'] = $this->Mpengajuan->detail_pengajuan($id_pengajuan);
		$this->load->view('admin/header');
		$this->load->view('admin/penguji/jadwal',$data);
		$this->load->view('admin/footer');
	}

	function lulus($id_pengajuan)
	{
		$this->Mpenguji->lulus_pengujian($id_pengajuan);
		redirect('admin/penguji','refresh');
	}

	function tidak_lulus($id_pengajuan)
	{
		$this->Mpenguji->tidak_lulus($id_pengajuan);
		redirect('admin/penguji','refresh');
		
	}

}

?>