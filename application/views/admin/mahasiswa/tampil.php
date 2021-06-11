<h3>Data Mahasiswa</h3>
<hr>
<?php 
// echo "<pre>";
// print_r ($mahasiswa);
// echo "</pre>";

 ?>
<div class="table-responsive">
	<table class="table table-hover" id="thetable">
		<thead>
			<tr>
				<th>No</th>
				<th>NIM</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>Telepon</th>
				<th>Email</th>
				<th>Tahun Masuk</th>
				<th>Foto</th>
				<th>Dosen Pembimbing</th>
				<th>Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($mahasiswa as $key => $value): ?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td><?php echo $value['nim'] ?></td>
					<td><?php echo $value['nama_mahasiswa'] ?></td>
					<td><?php echo $value['jenis_kelamin'] ?></td>
					<td><?php echo $value['telepon_mahasiswa'] ?></td>
					<td><?php echo $value['email_mahasiswa'] ?></td>
					<td><?php echo $value['nama_tahun_ajaran'] ?></td>
					<td><?php echo $value['foto_mahasiswa'] ?></td>
					<td><?php echo $value['nama_dosen'] ?></td>
					<td>
						<a href="<?php echo base_url("admin/mahasiswa/ubah/$value[nim]") ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<a href="<?php echo base_url("admin/mahasiswa/tambah") ?>" class="btn btn-primary">Tambah</a>
</div>