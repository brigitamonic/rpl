<?php 
$data_pesan_tes = $pemesanan->ambil_pemesanan_tes($_GET['id']);
$data_pembayaran = $pemesanan->ambil_pembayaran($_GET['id']);
?>

<div class="row">
	<div class="col-xs-6">
		<h3>Penanggung Jawab</h3> <br><br>
		<p>Nama : Best Days</p>
		<p>Lokasi : Jl. Mawar Baru No.017, Condong Catur, Sleman, Yogyakarta</p>
		<p>Telepon : 0821-7755-8899</p>
	</div>
	<div class="col-xs-6">
		<h3>Peserta Tes</h3><br><br>
		<p>Nama : <?php echo $data_pesan_tes['nama_user'] ?></p>
		<p>Telepon : <?php echo $data_pesan_tes['telepon_user'] ?></p>
		<p>Alamat : <?php echo $data_pesan_tes['alamat_user'] ?></p>
	</div>
</div>

<h3>Rincian Biaya Tes</h3><br><br>
<table class="table">
	<tr>
		<th>Jenis Tes</th>
		<td>:</td>
		<th><?php echo $data_pesan_tes['nama_jenis_tes']; ?></th>
	</tr>
	<tr>
		<th>Tanggal Pemesanan Tes</th>
		<td>:</td>
		<th ><?php echo date("d F Y", strtotime($data_pesan_tes['tanggal_pesan_tes'])); ?></th>
	</tr>
	<tr>
		<th>Total Tagihan</th>
		<td>:</td>
		<th >Rp.<?php echo number_format($data_pesan_tes['total_bayar']); ?></th>
	</tr>
	<?php if ($data_pesan_tes['status_pesan_tes']=="Menunggu Konfirmasi"): ?>
		<tr>
			<th>Bukti Bayar</th>
			<td>:</td>
			<td>
				<img src="../bukti_bayar/<?php echo $data_pembayaran['bukti_bayar']?>">
			</td>
		</tr>
		<tr>
			<td>
				<a href="index.php?halaman=konfirmasi_pembayaran&id=<?php echo $_GET['id'] ?>" class="btn btn-info">Konfirmasi</a>
			</td>
		</tr>
	<?php endif ?>
</table>