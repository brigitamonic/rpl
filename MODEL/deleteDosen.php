<?php
	include_once "koneksi.php";
	$nidn = $POST['nidn'];
	$koneksi->query("DELETE FROM dosen WHERE nidn='".$nidn."'");
	?>