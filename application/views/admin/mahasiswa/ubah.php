<h3>Update Mahasiswa</h3>
<hr>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>NIM</label>
		<input type="number" min="1" name="nim" class="form-control" value="<?php echo $mahasiswa['nim'] ?>" readonly>
	</div>
	<div class="form-group">
		<label>Dosen Pembimbing</label>
		<select class="form-control" name="nidn" required>
			<option value="">-Pilih Dosen Pembimbing-</option>
			<?php foreach ($dosen as $key => $value): ?>
				<option <?php if ($value['nidn'] == $mahasiswa['nidn']) {
					echo "selected";
				} ?> value="<?php echo $value['nidn'] ?>"><?php echo $value['nama_dosen'] ?></option>
			<?php endforeach ?>
		</select>
	</div>
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama_mahasiswa" class="form-control" value="<?php echo $mahasiswa['nama_mahasiswa'] ?>">
	</div>
	<div class="form-group">
		<label>Jenis Kelamin</label>
		<select class="form-control" name="jenis_kelamin" >
			<option value="">Pilih Jenis Kelamin</option>
			<option value="L" <?php if ($mahasiswa['jenis_kelamin']=="L") {echo "selected";} ?>>Laki-laki</option>
			<option value="P" <?php if ($mahasiswa['jenis_kelamin']=="P") {echo "selected";} ?>>Perempuan</option>
		</select>
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<input type="" name="telepon_mahasiswa" class="form-control" value="<?php echo $mahasiswa['telepon_mahasiswa'] ?>" >
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email_mahasiswa" class="form-control" value="<?php echo $mahasiswa['email_mahasiswa'] ?>" >
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password_mahasiswa" class="form-control" >
	</div>
	<div class="form-group">
		<label>Tahun Masuk</label>
		<select class="form-control" name="tahun_masuk_mahasiswa">
			<option value="">-Pilih Tahun Masuk / Tahun Ajaran-</option>
			<?php foreach ($tahun_ajaran as $key => $value): ?>
				<option value="<?php echo $value['id_tahun_ajaran'] ?>"<?php if ($value['id_tahun_ajaran']==$mahasiswa['tahun_masuk_mahasiswa']) {echo "selected";} ?>><?php echo $value['nama_tahun_ajaran'] ?></option>
			<?php endforeach ?>
		</select>
	</div>
	<div class="form-group">
		<label>Foto</label><br><br>
		<img src="<?php echo base_url("assets/mahasiswa/$mahasiswa[foto_mahasiswa]") ?>"><br><br>
		<input type="file" name="foto_mahasiswa" class="form-control" >
	</div>
	<button class="btn btn-primary">Simpan</button>
</form>