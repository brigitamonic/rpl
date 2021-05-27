<?php
	include_once "koneksi.php";

	$nim = $_POST['nim'];
	$nm_mhs = $_POST['nm_mhs'];
	$jk = $_POST['jk'];
	$telp_mhs = $_POST['telp_mhs'];
	$thn_msk = $_POST['thn_msk'];


	$koneksi->query("UPDATE mahasiswa SET 
	nm_mhs= '".$nm_mhs."',
	jk= '".$jk."',
	telp_mhs= '".$telp_mhs."',
	thn_msk= '".$thn_msk."' WHERE nim='".$nim."'");
?>