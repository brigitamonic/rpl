<?php
	include_once "koneksi.php";
	$nim = $POST['nim'];
	$koneksi->query("DELETE FROM mahasiswa WHERE nim='".$nim."'");
	?>