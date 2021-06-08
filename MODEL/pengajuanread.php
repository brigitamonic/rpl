<?php
include_once "koneksi.php";
	$sql = $koneksi->query("SELECT * FROM pengajuan_p");
	$res = array();

	while ($rowData = $sql->fetch_assoc()){
		$res[] = $rowData;
	}

	echo json_encode($res);
	?>