<h3>Update Dosen</h3>
<hr>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>NIDN</label>
		<input type="number" min="1" name="nidn" class="form-control" value="<?php echo $dosen['nidn'] ?>" readonly>
	</div>
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama_dosen" class="form-control" value="<?php echo $dosen['nama_dosen'] ?>">
	</div>
	<div class="form-group">
		<label>Jenis Kelamin</label>
		<select class="form-control" name="jenis_kelamin" >
			<option value="">Pilih Jenis Kelamin</option>
			<option value="L" <?php if ($dosen['jenis_kelamin']=="L") {echo "selected";} ?>>Laki-laki</option>
			<option value="P" <?php if ($dosen['jenis_kelamin']=="P") {echo "selected";} ?>>Perempuan</option>
		</select>
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<input type="" name="telepon_dosen" class="form-control" value="<?php echo $dosen['telepon_dosen'] ?>" >
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email_dosen" class="form-control" value="<?php echo $dosen['email_dosen'] ?>" >
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password_dosen" class="form-control" >
	</div>
	<div class="form-group">
		<label>Foto</label><br><br>
		<img src="<?php echo base_url("assets/dosen/$dosen[foto_dosen]") ?>"><br><br>
		<input type="file" name="foto_dosen" class="form-control" >
	</div>
	<button class="btn btn-primary">Simpan</button>
</form>