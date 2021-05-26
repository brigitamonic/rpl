<?php 

class Penguji extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mpenguji');
	}

	public function index()
	{
		$data['penguji']=$this->Mpenguji->tampil_penguji();

		$this->load->view('admin/header');
		$this->load->view('admin/penguji/tampil',$data);
		$this->load->view('admin/footer');
	}
}

?>