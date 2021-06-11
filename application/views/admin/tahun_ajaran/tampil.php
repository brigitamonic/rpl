<h3>Data Tahun Ajaran</h3>
<hr>
<div class="table-responsive">
	<table class="table table-hover" id="thetable">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Tahun Ajaran</th>
				<th>Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($tahun_ajaran as $key => $value): ?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td><?php echo $value['nama_tahun_ajaran'] ?></td>
					<td>
						<a href="<?php echo base_url("admin/tahun_ajaran/ubah/$value[id_tahun_ajaran]") ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
						<a onclick="return confirm('Apakah anda yakin untuk menghapus?')" href="<?php echo base_url("admin/tahun_ajaran/hapus/$value[id_tahun_ajaran]") ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<a href="<?php echo base_url("admin/tahun_ajaran/tambah") ?>" class="btn btn-primary">Tambah</a>
</div>