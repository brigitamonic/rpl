<?php 
class Home extends CI_Controller
{
	
	public function index()
	{
		$this->load->model('Mdosen');

		$data['cek']=$this->Mdosen->cek_koordinator_dosen($_SESSION['dosen']['nidn']);

		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/footer');
	}
}
?>