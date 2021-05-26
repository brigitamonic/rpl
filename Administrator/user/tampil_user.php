<h3>Data User</h3>
<hr>
<?php $data_user = $user->tampil_user() ?>

<div class="table-responsive">
	<table class= "table table-striped" id="thetable">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Telepon</th>
				<th>Jenis Kelamin</th>
				<th>Golongan</th>
				<th>Agama</th>
				<th>Foto</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data_user as $key => $value): ?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td><?php echo $value['nama_user'] ?></td>
					<td><?php echo $value['alamat_user'] ?></td>
					<td><?php echo $value['telepon_user'] ?></td>
					<td><?php echo $value['jenis_kelamin'] ?></td>
					<td><?php echo $value['golongan_user'] ?></td>
					<td><?php echo $value['agama_user'] ?></td>
					<td>
						<img src="../foto_user/<?php echo $value ['foto_user'] ?>" width = "50px">
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>