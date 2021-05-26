<?php 

class Pengajuan extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mdosen');
		$this->load->model('Mpengajuan');
	}

	public function index()
	{
		$data['cek']=$this->Mdosen->cek_koordinator_dosen($_SESSION['dosen']['nidn']);
		$data['pengajuan']=$this->Mpengajuan->tampil_pengajuan();

		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/pengajuan/tampil',$data);
		$this->load->view('dosen/footer');
	}

	function terima($id_pengajuan)
	{
		$data['cek']=$this->Mdosen->cek_koordinator_dosen($_SESSION['dosen']['nidn']);
		$this->Mpengajuan->terima($id_pengajuan);
		redirect('dosen/pengajuan', 'refresh');
	}

	function tolak($id_pengajuan)
	{
		$data['cek']=$this->Mdosen->cek_koordinator_dosen($_SESSION['dosen']['nidn']);
		$this->Mpengajuan->tolak($id_pengajuan);
		redirect('dosen/pengajuan', 'refresh');
	}

	function jadwal($id_pengajuan)
	{
		$data['cek']=$this->Mdosen->cek_koordinator_dosen($_SESSION['dosen']['nidn']);
		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/footer');
	}
}
?>