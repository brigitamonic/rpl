<h3>Data Pengajuan Mahasiswa</h3>


<ul class="nav nav-pills">
	<li role="presentation" class="<?php if($jenis=="Pra KP"){echo "active";} ?>"><a href="<?php echo base_url("dosen/pengajuan/index/Pra KP") ?>">Pra KP</a></li>
	<li role="presentation" class="<?php if($jenis=="KP"){echo "active";} ?>"><a href="<?php echo base_url("dosen/pengajuan/index/KP") ?>">KP</a></li>
</ul>
<br>

<div class="table-responsive">
	<table class="table table-hover" id="thetable">
		<thead>
			<tr>
				<th>No</th>
				<th>Mahasiswa</th>
				<th>Semester Pengajuan</th>
				<th>Tahun Pengajuan</th>
				<th>Judul KP</th>
				<th>Lembaga Instansi</th>
				<th>Pimpinan Lembaga Instansi</th>
				<th>Tanggal Ujian</th>
				<th>Ruang Ujian</th>
				<!-- <th>Surat Pengajuan</th> -->
				<th>Status Ujian</th>
				<!-- <th width="150px">Opsi</th> -->
			</tr>
		</thead>
		<tbody>
			<?php foreach ($pengajuan as $key => $value): ?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td><?php echo $value['nama_mahasiswa'] ?>(<?php echo $value['nim'] ?>)</td>
					<td><?php echo $value['semester_pengajuan'] ?></td>
					<td><?php echo $value['nama_tahun_ajaran'] ?></td>
					<td><?php echo $value['judul_kp'] ?></td>
					<td><?php echo $value['lembaga_instansi'] ?></td>
					<td><?php echo $value['pimpinan_lembaga_instansi'] ?></td>
					<!-- <td><?php echo $value['surat_pengajuan_kp'] ?></td> -->
					<td><?php 
					if ( empty($value['jadwal_ujian']) ) {
						echo "-";
					} else {
						echo date("d F Y", strtotime($value['jadwal_ujian']));
					}

					?> 
						<!-- <a href="<?php echo base_url('admin/penguji/jadwal/' . $value['id_pengajuan']) ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
						<br>
						<i class="fa fa-clock"></i> <?php echo $value['sesi_ujian'] ?> -->

					</td>

					<td><?php echo $value['nama_ruangan'] ?></td>

					<td><?php 
					if (empty($value['status_ujian'])) {
						echo "Belum Ujian";
					} else {
						echo $value['status_ujian'];
					}
					?></td>

					<!-- <td><?php echo $value['status_pengajuan'] ?></td> -->

					<td>
						<!-- <a href="<?php echo base_url("dosen/pengajuan/terima/$value[id_pengajuan]/$jenis") ?>" class="btn btn-warning btn-xs" tittle="Terima" onclick="return confirm('Apakah Anda Yakin ?')"><i class="fa fa-check"></i></a>
							<a href="<?php echo base_url("dosen/pengajuan/tolak/$value[id_pengajuan]/$jenis") ?>" class="btn btn-danger btn-xs" tittle="Tolak" onclick="return confirm('Apakah Anda Yakin ?')"><i class="fa fa-times"></i></a> -->
							<!-- <a href="" class="btn btn-info btn-xs">Detail</a> -->
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>