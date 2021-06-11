<?php 

class Pengajuan extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		// cek apakah sudah login? jika belum , usir ke halaman login
		if ( !$this->session->userdata('admin') ) {
			redirect('login');
		}
		$this->load->model('Mpengajuan');
	}

	public function index($jenis_pengajuan = 'SK KP')
	{	
		$data['jenis'] = str_replace("%20", " ", $jenis_pengajuan);
		$data['pengajuan']=$this->Mpengajuan->tampil_pengajuan_jenis_admin($data['jenis']);
		$this->load->view('admin/header');
		$this->load->view('admin/pengajuan/tampil',$data);
		$this->load->view('admin/footer');
	}

	function terima($id_pengajuan, $jenis)
	{
		$this->Mpengajuan->terima($id_pengajuan);
		redirect("admin/pengajuan/index/$jenis", 'refresh');
	}

	function tolak($id_pengajuan, $jenis)
	{
		$this->Mpengajuan->tolak($id_pengajuan);
		redirect("admin/pengajuan/index/$jenis", 'refresh');
	}
}
?>