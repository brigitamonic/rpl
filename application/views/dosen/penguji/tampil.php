<h3>Data Penguji</h3>

<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>Mahasiswa</th>
				<th>Dosen Penguji</th>
				<th>Tanggal Ujian</th>
				<th>Ruang Ujian</th>
				<th>Judul</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($penguji as $key => $value): ?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td>[ <?php echo $value['nim'] ?> ] <?php echo $value['nama_mahasiswa'] ?></td>
					<td><?php echo $value['nama_dosen'] ?></td>
					<td><?php echo date("d F Y", strtotime($value['jadwal_ujian'])) ?></td>
					<td>Ruang <?php echo $value['pengajuan_ruangan'] ?></td>
					<td><?php echo $value['judul_kp'] ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>