<h3>Tambah Dosen</h3>
<hr>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>NIDN</label>
		<input type="number" min="1" name="nidn" class="form-control" required="">
	</div>
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama_dosen" class="form-control" required="">
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
		<input type="" name="telepon_dosen" class="form-control" required="">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email_dosen" class="form-control" required="">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password_dosen" class="form-control" required="">
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" name="foto_dosen" class="form-control" required="">
	</div>
	<button class="btn btn-primary">Simpan</button>
</form>