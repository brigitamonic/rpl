<h2>Input Jadwal Ujian</h2>
<hr>

<?php 

$sesi_ujian = explode(" - ", $pengajuan['sesi_ujian']);

 ?>

<form action="" method="POST">
	<div class="form-group row">
		<div class="col-md-6">
			<label>ID Pengajuan</label>
			<input type="text" value="<?php echo $pengajuan['id_pengajuan'] ?>" disabled class="form-control">
		</div>
	</div>
	<div class="form-group row">
		<div class="col-md-6">
			<label>Jadwal Ujian</label>
			<input type="date" name="jadwal_ujian" class="form-control" value="<?php echo $pengajuan['jadwal_ujian'] ?>">
		</div>
	</div>
	<div class="form-group row">
		<div class="col-md-3">
			<label>Jam/Sesi Ujian</label>
			<input type="time" name="sesi_ujian[]" class="form-control" value="<?php echo @$sesi_ujian[0] ?>">
		</div>
		<div class="col-md-3">
			<label>&nbsp;</label>
			<input type="time" name="sesi_ujian[]" class="form-control" value="<?php echo @$sesi_ujian[1] ?>">
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Simpan</button>
	<a href="<?php echo base_url('admin/penguji') ?>" class="btn btn-default">Kembali</a>
</form>