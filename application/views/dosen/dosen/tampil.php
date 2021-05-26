<h3>Data Dosen</h3>
<hr>
<div class="table-responsive">
	<table class="table table-hover" id="thetable">
		<thead>
			<tr>
				<th>No</th>
				<th>NIDN</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>Telepon</th>
				<th>Email</th>
				<th>Foto</th>
				<th>Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($dosen as $key => $value): ?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td><?php echo $value['nidn'] ?></td>
					<td><?php echo $value['nama_dosen'] ?></td>
					<td><?php echo $value['jenis_kelamin'] ?></td>
					<td><?php echo $value['telepon_dosen'] ?></td>
					<td><?php echo $value['email_dosen'] ?></td>
					<td><?php echo $value['foto_dosen'] ?></td>
					<td>
						<a href="<?php echo base_url("admin/dosen/ubah/$value[nidn]") ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<a href="<?php echo base_url("admin/dosen/tambah") ?>" class="btn btn-primary">Tambah</a>
</div>