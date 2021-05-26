<?php 
$data_jenis_tes = $jenis_tes->ambil_jenis_tes($_GET['id']);
?>

<h3>Ubah Jenis Tes</h3>
<hr>
<form method="post">
	<div class="form-group">
		<label>Jenis Tes</label>
		<input type="text" name="jenis" class="form-control" value="<?php 
		echo $data_jenis_tes['nama_jenis_tes'] ?>">
	</div>
	<div class="form-group">
		<label>Biaya Tes</label>
		<input type="number" min="1" name="biaya" class="form-control" value="<?php 
		echo $data_jenis_tes['biaya_jenis_tes'] ?>">
	</div>
	<div class="form-group">
		<label>Keterangan Jenis Tes</label>
		<textarea class="form-group" name="keterangan" id="theeditor"><?php echo $data_jenis_tes['deskripsi_jenis_tes']; ?></textarea>
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>
<?php
if (isset($_POST['ubah'])) 
{
 	$jenis_tes->ubah_jenis_tes($_POST['jenis'],$_POST['biaya'],$_POST['keterangan'],$_GET['id']);
 	echo "<script>alert('Berhasil Diubah'); location='index.php?halaman=jenis_tes';</script>";
} 
?>