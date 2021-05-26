<?php 

class Pengajuan extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mpengajuan');
	}

	public function index()
	{
		$data['pengajuan']=$this->Mpengajuan->tampil_pengajuan();

		$this->load->view('admin/header');
		$this->load->view('admin/pengajuan/tampil',$data);
		$this->load->view('admin/footer');
	}

	function terima($id_pengajuan)
	{
		$this->Mpengajuan->terima($id_pengajuan);
		redirect('admin/pengajuan', 'refresh');
	}

	function tolak($id_pengajuan)
	{
		$this->Mpengajuan->tolak($id_pengajuan);
		redirect('admin/pengajuan', 'refresh');
	}
}
?>