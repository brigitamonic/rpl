<?php
	include_once "koneksi.php";

	$nim = $_POST['nim'];
	$nm_mhs = $_POST['nm_mhs'];
	$jk = $_POST['jk'];
	$telp_mhs = $_POST['telp_mhs'];
	$thn_msk = $_POST['thn_msk'];


	$koneksi->query("INSERT INTO mahasiswa(nim,nm_mhs,jk,telp_mhs,thn_msk)
	VALUES('".$nim."','".$nm_mhs."','".$jk."','".$telp_mhs."','".$thn_msk."')");
?>