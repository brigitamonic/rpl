<?php 
class Pegawai extends CI_Controller
{
	
	function tampil()
	{
		$this->load->model("Mpegawai");
		$data['judul']="Data Pegawai";
		$data['pegawai']=$this->Mpegawai->pegawai();

		$this->load->view("tampil_pegawai",$data);

	}
}
?>