<?php 

class Pengajuan extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		// cek apakah sudah login? jika belum , usir ke halaman login
		if ( !$this->session->userdata('dosen') ) {
			redirect('login');
		}
		$this->load->model('Mdosen');
		$this->load->model('Mpengajuan');
	}

	public function index($jenis_pengajuan = 'Pra KP')
	{	
		$data['jenis'] = str_replace("%20", " ", $jenis_pengajuan);
		$data['pengajuan']=$this->Mpengajuan->tampil_pengajuan_jenis_dosen($data['jenis']);
		$this->load->view('dosen/header');
		$this->load->view('dosen/pengajuan/tampil',$data);
		$this->load->view('dosen/footer');
	}

	// public function index()
	// {
	// 	$data['cek']=$this->Mdosen->cek_koordinator_dosen($_SESSION['dosen']['nidn']);
	// 	$data['pengajuan']=$this->Mpengajuan->tampil_pengajuan();

	// 	$this->load->view('dosen/header',$data);
	// 	$this->load->view('dosen/pengajuan/tampil',$data);
	// 	$this->load->view('dosen/footer');
	// }

	function terima($id_pengajuan, $jenis)
	{
		$data['cek']=$this->Mdosen->cek_koordinator_dosen($_SESSION['dosen']['nidn']);
		$this->Mpengajuan->terima($id_pengajuan);
		redirect("dosen/pengajuan/index/$jenis", 'refresh');
	}

	function tolak($id_pengajuan, $jenis)
	{
		$data['cek']=$this->Mdosen->cek_koordinator_dosen($_SESSION['dosen']['nidn']);
		$this->Mpengajuan->tolak($id_pengajuan);
		redirect("dosen/pengajuan/index/$jenis", 'refresh');
	}

}
?>