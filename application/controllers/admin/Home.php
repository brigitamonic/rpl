<?php 
class Home extends CI_Controller
{
	
	public function index()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/footer');
	}
}
?>