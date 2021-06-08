<?php
	include_once "koneksi.php";

	$id_pengajuan = $_POST['id_pengajuan'];
	$dosen = $_POST['dosen'];
	$mhs = $_POST['mhs'];
	$smt = $_POST['smt'];
	$thn_pengajuan = $_POST['thn_pengajuan'];
  $lemb = $_POST['lemb'];
	$p_lemb = $_POST['p_lemb'];
	$surat = $_POST['surat'];
	$status = $_POST['status'];


	$koneksi->query("INSERT INTO pengajuan_p (id_pengajuan,dosen,mhs,smt,thn_pengajuan,lemb,p_lemb,surat,status)
	VALUES('".$id_pengajuan."','".$dosen."','".$mhs."','".$smt."','".$thn_pengajuan."'','".$lemb."'','".$p_lemb."'','".$surat."','".$status."')");
?>