<?php
	include_once "koneksi.php";

	$nidn = $_POST['nidn'];
	$nm_dosen = $_POST['nm_dosen'];
	$jk_dsn = $_POST['jk_dsn'];
  $email_dsn = $_POST['email_dsn'];
	$telp_dsn = $_POST['telp_dsn'];



	$koneksi->query("INSERT INTO dosen(nidn,nm_dosen,jk_dsn,email_dsn,telp_dsn)
	VALUES('".$nidn."','".$nm_dosen."','".$jk_dsn."','".$email_dsn."','".$telp_dsn."')");
?>