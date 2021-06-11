<h3>Data Mahasiswa Bimbingan</h3>
<hr>
<div class="table-responsive">
	<table class="table table-hover" id="thetable">
		<thead>
			<tr>
				<th>No</th>
				<th>NIM</th>
				<th>Nama</th>
				<th>Semester</th>
				<th>Jenis Kelamin</th>
				<th>Telepon</th>
				<th>Email</th>
				<th>Tahun Masuk</th>
				<th>Judul KP</th>
				<th>Lembaga Instansi</th>
				<th>Pimpinan Lembaga Instansi</th>
				<!-- <th>Foto</th> -->
			</tr>
		</thead>
		<tbody>
			<?php foreach ($mahasiswa as $key => $value): ?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td><?php echo $value['nim'] ?></td>
					<td><?php echo $value['nama_mahasiswa'] ?></td>
					<td><?php echo $value['semester_pengajuan'] ?></td>
					<td><?php echo $value['jenis_kelamin'] ?></td>
					<td><?php echo $value['telepon_mahasiswa'] ?></td>
					<td><?php echo $value['email_mahasiswa'] ?></td>
					<td><?php echo $value['nama_tahun_ajaran'] ?></td>
					<td><?php echo $value['judul_kp'] ?></td>
					<td><?php echo $value['lembaga_instansi'] ?></td>
					<td><?php echo $value['pimpinan_lembaga_instansi'] ?></td>
					<!-- <td><?php echo $value['foto_mahasiswa'] ?></td> -->
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>