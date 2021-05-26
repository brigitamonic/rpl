<?php 
class Mpegawai extends CI_Model
{
	
	function pegawai()
	{
		$pegawai['0']["nim"]="12345";
		$pegawai['0']["nama"]="Bilal";
		$pegawai['0']["alamat"]="Surabaya";

		$pegawai['1']["nim"]="54321";
		$pegawai['1']["nama"]="Andi";
		$pegawai['1']["alamat"]="Jakarta";

		return $pegawai;
	}
}
?>