<h3>Pengajuan Kerja Praktek</h3>
<hr>

<?php 
// echo "<pre>";
// print_r ($pengajuan);
// echo "</pre>";
?>

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
		<label>NIK</label>
		<input type="text" name="nik" class="form-control" required="">
	</div>
	<div class="form-group">
			<label>Judul KP</label>
			<input type="text" name="judul_kp" class="form-control" required="">
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
		<!-- OTOMATIS TERISI -->
		<div class="form-group">
			<label>Ruangan</label>
			<?php if (empty($pengajuan['pengajuan_ruangan'])): ?>
				<select class="form-control" name="id_ruangan" required="">
					<option value="">Pilih Ruangan</option>
					<?php foreach ($ruangan as $key => $value): ?>
						<option value="<?php echo $value['id_ruangan'] ?>"><?php echo $value['nama_ruangan'] ?></option>
					<?php endforeach ?>
				</select>
			<?php else: ?>
				<input type="text" class="form-control" readonly="" value="<?php echo $pengajuan['nama_ruangan'] ?>">
			<?php endif ?>
		</div>
		<div class="form-group">
			<label>Penguji</label>
			<?php if (empty($pengajuan['nidn'])): ?>
				<select class="form-control" name="nidn" required="">
					<option value="">Pilih Penguji</option>
					<?php foreach ($dosen as $key => $value): ?>
						<option value="<?php echo $value['nidn'] ?>"><?php echo $value['nama_dosen'] ?></option>
					<?php endforeach ?>
				</select>
			<?php else: ?>
				<input type="text" class="form-control" readonly="" value="<?php echo $pengajuan['nama_dosen'] ?>">
			<?php endif ?>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Dokumen</label>
					<input type="file" name="surat_pengajuan_kp" class="form-control" required="">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label>Lainnya (Spesifikasi & Tools, dll)</label>
			<textarea name="lainnya" class="form-control" required></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>