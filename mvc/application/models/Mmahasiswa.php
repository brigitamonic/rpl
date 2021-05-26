<?php 
class Mmahasiswa extends CI_Model

{
	
	function mahasiswa()
	{
		$mahasiswa[0]['nim']="11111";
		$mahasiswa[0]['nama']="Andi";
		$mahasiswa[0]['alamat']="Solo";

		$mahasiswa[1]['nim']="22222";
		$mahasiswa[1]['nama']="Bilal";
		$mahasiswa[1]['alamat']="Yogya";

		return $mahasiswa;
	
	}
}
?>