<h3>Update Tahun Ajaran</h3>
<hr>

<?php 
// echo "<pre>";
// print_r($tahun_ajaran);
// echo "</pre>";
 ?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Tahun Ajaran</label>
		<input type="text" name="nama_tahun_ajaran" class="form-control" required="" value="<?php echo $tahun_ajaran['nama_tahun_ajaran'] ?>">
	</div>
	<button class="btn btn-primary">Simpan</button>
</form>