<?php
	include_once "koneksi.php";

	$nidn = $_POST['nidn'];
	$nm_dosen = $_POST['nm_dosen'];
	$jk_dsn = $_POST['jk_dsn'];
  $email_dsn = $_POST['email_dsn'];
	$telp_dsn = $_POST['telp_dsn'];


	$koneksi->query("UPDATE dosen SET 
	nm_dosen= '".$nm_dosen."',
	jk_dsn= '".$jk_dsn."',
	email_dsn= '".$email_dsn."',
	telp_dsn= '".$telp_dsn."' WHERE nidn='".$nidn."'");
?>