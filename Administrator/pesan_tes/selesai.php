<?php 
$pemesanan->selesai($_GET['id']);
echo "<script>alert('Tes Berhasil Diselesaikan');
	location='index.php?halaman=pesan_tes';</script>";
?>