<h3>Data Penguji</h3>


<?php 
// echo "<pre>";
// print_r ($penguji);
// echo "</pre>";
?>

<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>Mahasiswa</th>
				<th>Dosen Penguji</th>
				<th>Jenis Ujian</th>
				<th>Tanggal Ujian</th>
				<th>Ruang Ujian</th>
				<th>Status Ujian</th>
				<th>Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($penguji as $key => $value): ?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td>[ <?php echo $value['nim'] ?> ] <?php echo $value['nama_mahasiswa'] ?></td>
					<td><?php echo $value['nama_dosen'] ?></td>
					<td>
						<?php if ($value['jenis_pengajuan']=="KP"): ?>
							<span class="label label-info"><?php echo $value['jenis_pengajuan'] ?></span>
							<?php else: ?>
								<span class="label label-warning"><?php echo $value['jenis_pengajuan'] ?></span>
							<?php endif ?>
						</td>

						<td><?php 
						if ( empty($value['jadwal_ujian']) ) {
							echo "-";
						} else {
							echo date("d F Y", strtotime($value['jadwal_ujian']));
						}

						?> 
						<a href="<?php echo base_url('admin/penguji/jadwal/' . $value['id_pengajuan']) ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
						<br>
						<i class="fa fa-clock"></i> <?php echo $value['sesi_ujian'] ?>

					</td>
					<td><?php echo $value['nama_ruangan'] ?></td>
					<td><?php 
					if (empty($value['status_ujian'])) {
						echo "Belum Ujian";
					} else {
						echo $value['status_ujian'];
					}
					?></td>
					<td>
						<?php if (empty($value['status_ujian'])): ?>
							<a href="<?php echo base_url("admin/penguji/lulus/$value[id_pengajuan]") ?>" onclick="return confirm('Apakah Anda Yakin Untuk Meluluskan Mahasiswa Tersebut ?')" title="Lulus" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>
							<a href="<?php echo base_url("admin/penguji/tidak_lulus/$value[id_pengajuan]") ?>" onclick="return confirm('Apakah Anda Yakin Untuk Tidak Meluluskan Mahasiswa Tersebut ?')" title="Tidak Lulus" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></a>
						<?php endif ?>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>