<h3>Tambah Jadwal</h3>
<hr>
<form method="post">
	<div class="form-group">
		<label>Sesi Jadwal</label>
		<input type="text" name="sesi" class="form-control" placeholder="contoh : Sesi Pertama">
	</div>
	<div class="form-group">
		<label>Waktu Mulai</label>
		<input type="time" name="mulai" class="form-control">
	</div>
	<div class="form-group">
		<label>Waktu Selesai</label>
		<input type="time" name="selesai" class="form-control">
	</div>
	<div class="form-group">
		<label>Kuota</label>
		<input type="number" min="1" name="kuota" class="form-control" placeholder="contoh : 50">
	</div>
	<button class="btn btn-primary" name="simpan">Simpan</button>
</form>
<?php 
if (isset($_POST['simpan'])) 
{
	$jadwal->simpan_jadwal($_POST['sesi'],$_POST['mulai'],$_POST['selesai'],$_POST['kuota'],$_GET['id']);

	$id_jenis_tes = $_GET['id'];

	echo "<script>alert('Jadwal Berhasil Ditambahkan');
	location='index.php?halaman=jadwal&id=$id_jenis_tes';</script>";
}
?>