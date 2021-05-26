<h3>Tambah Mahasiswa</h3>
<hr>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>NIM</label>
		<input type="number" min="1" name="nim" class="form-control" required="">
	</div>
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama_mahasiswa" class="form-control" required="">
	</div>
	<div class="form-group">
		<label>Jenis Kelamin</label>
		<select class="form-control" name="jenis_kelamin" required="">
			<option value="">Pilih Jenis Kelamin</option>
			<option value="L">Laki-laki</option>
			<option value="P">Perempuan</option>
		</select>
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<input type="" name="telepon_mahasiswa" class="form-control" required="">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email_mahasiswa" class="form-control" required="">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password_mahasiswa" class="form-control" required="">
	</div>
	<div class="form-group">
		<label>Tahun Masuk</label>
		<select class="form-control" name="tahun_masuk_mahasiswa">
			<option value="">-Pilih Tahun Masuk / Tahun Ajaran-</option>
			<?php foreach ($tahun as $key => $value): ?>
				<option value="<?php echo $value['id_tahun_ajaran'] ?>"><?php echo $value['nama_tahun_ajaran'] ?></option>
			<?php endforeach ?>
		</select>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" name="foto_mahasiswa" class="form-control" required="">
	</div>
	<button class="btn btn-primary">Simpan</button>
</form>