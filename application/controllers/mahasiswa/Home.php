<?php 
class Home extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		// cek apakah sudah login? jika belum , usir ke halaman login
		if ( !$this->session->userdata('mahasiswa') ) {
			redirect('login');
		}
		$this->load->model('Mpengajuan');

	}

	public function index()
	{
		$data['jenis'] = "SK KP";
		$data['pengajuan'] = $this->Mpengajuan->tampil_pengajuan_jenis("SK KP");
		$this->load->view('mahasiswa/header');
		$this->load->view('mahasiswa/home', $data);
		$this->load->view('mahasiswa/footer');
	}

	public function pengajuan($jenis_pengajuan)
	{
		$data['jenis'] = str_replace("%20", " ", $jenis_pengajuan);
		$data['pengajuan'] = $this->Mpengajuan->tampil_pengajuan_jenis(str_replace("%20", " ", $jenis_pengajuan));
		$this->load->view('mahasiswa/header');
		$this->load->view('mahasiswa/home', $data);
		$this->load->view('mahasiswa/footer');
	}
}

?>