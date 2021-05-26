<?php 
$pemesanan->konfirmasi_pembayaran($_GET['id']);
echo "<script>alert('Pembayaran Terkonfirmasi');
	location='index.php?halaman=pesan_tes';</script>";
?>