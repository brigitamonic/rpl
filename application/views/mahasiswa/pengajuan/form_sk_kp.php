<h3>Pengajuan Surat Keterangan Kerja Praktek</h3>
<hr>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Semester Pengajuan</label>
		<input type="number" min="1" name="semester_pengajuan" class="form-control" required="">
	</div>
	<div class="form-group">
		<label>Tahun Ajaran</label>
		<select class="form-control" name="id_tahun_ajaran" required="">
			<option value="">Pilih Tahun</option>
			<?php foreach ($tahun as $key => $value): ?>
			<option value="<?php echo $value['id_tahun_ajaran'] ?>"><?php echo $value['nama_tahun_ajaran'] ?></option>
			<?php endforeach ?>
		</select>
	</div>
	<div class="form-group">
		<label>Lembaga / Instansi</label>
		<input type="text" name="lembaga_instansi" class="form-control" required="">
	</div>
	<div class="form-group">
		<label>Pimpinan Lembaga / Instansi</label>
		<input type="text" name="pimpinan_lembaga_instansi" class="form-control" required="">
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>No. Telpon Lembaga / Instansi</label>
				<input type="text" name="telepon_instansi" class="form-control" required="">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Fax Lembaga / Instansi</label>
				<input type="text" name="fax_instansi" class="form-control" required="">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label>Alamat Lembaga / Instansi</label>
		<textarea name="alamat_lembaga_instansi" class="form-control" required=""></textarea>
	</div>
	<div class="form-group">
		<label>Dokumen</label>
		<input type="file" name="surat_pengajuan_kp" class="form-control" required="">
	</div>
	<button type="submit" class="btn btn-primary">Simpan</button>
</form>