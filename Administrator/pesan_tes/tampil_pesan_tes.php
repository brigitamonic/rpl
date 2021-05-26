<?php 
$data_pemesanan = $pemesanan->tampil_pesan_tes();
?>

<h3>Data Pesan Tes</h3>
<hr>
<div class="table-responsive">
	<table class="table table-bordered" id="thetable">
		<thead>
			<tr>
				<th>No</th>
				<th>User</th>
				<th>Jenis Tes</th>
				<th>Tanggal Pesan</th>
				<th>Total bayar</th>
				<th>Status</th>
				<th>Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data_pemesanan as $key => $value): ?>
				<?php $detail = $jadwal->detail_jadwal($value['id_pesan_tes']) ?>	
				<tr>
					<td><?php echo $key+1 ?></td>
					<td><?php echo $value['nama_user'] ?></td>
					<td><?php echo $value['nama_jenis_tes'] ?></td>
					<td><?php echo $value['tanggal_pesan_tes'] ?></td>
					<td>Rp. <?php echo number_format($value['total_bayar']) ?></td>
					<td><?php echo $value['status_pesan_tes'] ?></td>
					<td>
						<a href="index.php?halaman=nota&id=<?php echo $value['id_pesan_tes'] ?>" title="Nota" class="btn btn-success btn-xs"><i class="fa fa-copy"></i></a>
						<?php if ($value['status_pesan_tes']=="Lunas"): ?>
							<a href="index.php?halaman=lihat_jadwal&id=<?php echo $value['id_pesan_tes'] ?>" title="jadwal" class="btn btn-info btn-xs"><i class="fa fa-clock"></i></a>
						<?php endif ?>

						<?php if ($detail['tanggal_detail_jadwal']==date("2021-04-17") AND $value['status_pesan_tes']=="Lunas"): ?>
							<a href="index.php?halaman=selesai&id=<?php echo $value['id_pesan_tes'] ?>" onclick="return confirm('Apakah Anda Yakin Untuk Menyelesaikan')"  class="btn btn-warning btn-xs">Selesai</a>
						<?php endif ?>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>