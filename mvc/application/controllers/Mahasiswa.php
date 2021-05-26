<?php 
class Mahasiswa extends CI_controller
{
	
	function tampil()
	{
		//panggil model
		$this->load->model("Mmahasiswa");
		//panggil fuction yang ada di model
		$data['judul']="Data Mahasiswa";
		$data['mahasiswa']=$this->Mmahasiswa->mahasiswa();
		
		//panggil view
		$this->load->view('tampil_mahasiswa',$data);
		
	}

	function hapus($id_mahasiswa)
	{
		echo "Billian";
		echo "<br>";
		echo $id_mahasiswa;
	}
}

?>