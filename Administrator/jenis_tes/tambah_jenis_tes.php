<h3>Tambah Jenis Tes</h3>
<hr>
<form method="post">
	<div class="form-group">
		<label>Jenis Tes</label>
		<input type="text" name="jenis_tes" class="form-control" placeholder="Kepribadian" required="">
	</div>
	<div class="form-group">
		<label>Biaya Jenis Tes</label>
		<input type="number" min="1" name="biaya" class="form-control" placeholder="100000" required="">
	</div>
	<div class="form-group">
		<label>Keterangan Jenis Tes</label>
		<textarea required="" class="form-control" name="keterangan" id="theeditor"></textarea>
	</div>
	<button class="btn btn-primary" name="simpan">Simpan</button>
</form>
<?php 
if (isset($_POST['simpan'])) 
{
 	$jenis_tes->simpan_jenis_tes($_POST['jenis_tes'],$_POST['biaya'],$_POST['keterangan']);

 	echo "<script>alert('Berhasil Disimpan'); location='index.php?halaman=jenis_tes';</script>";
} 
?>