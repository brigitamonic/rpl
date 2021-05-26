<?php 
$data_jadwal = $jadwal->detail_jadwal($_GET['id']);
?>

<h3>Upload Link Zoom</h3>
<hr>
<form method="post">
	<div class="form-group">
		<label>Sesi</label>
		<input type="" name="" value="<?php echo $data_jadwal['nama_jadwal'] ?> (<?php echo $data_jadwal['waktu_mulai_jadwal'] ?> - <?php echo $data_jadwal['waktu_selesai_jadwal'] ?>)" class="form-control">
	</div>
	<div class="form-group">
		<label>Tanggal Mulai</label>
		<input type="date" name="" class="form-control" value="<?php echo $data_jadwal['tanggal_detail_jadwal'] ?>">
	</div>
	<div class="form-group">
		<label>Link Zoom</label>
		<textarea class="form-control" name="link"><?php echo $data_jadwal['link_zoom'] ?></textarea>
	</div>
	<button class="btn btn-primary" name="simpan">Simpan</button>
	<?php 
	if (isset($_POST['simpan'])) 
	{
		$jadwal->update_jadwal_detail($_POST['link'],$_GET['id']);
		echo "<script>alert('Berhasil Disimpan');
			location='index.php?halaman=pesan_tes';</script>";
	}
	?>
</form>