<h3>Data Pengajuan</h3>

<ul class="nav nav-pills">
  <li role="presentation" class="<?php if($jenis=="SK KP"){echo "active";} ?>"><a href="<?php echo base_url("admin/pengajuan/index/SK KP") ?>">SK KP</a></li>
  <li role="presentation" class="<?php if($jenis=="Pra KP"){echo "active";} ?>"><a href="<?php echo base_url("admin/pengajuan/index/Pra KP") ?>">Pra KP</a></li>
  <li role="presentation" class="<?php if($jenis=="KP"){echo "active";} ?>"><a href="<?php echo base_url("admin/pengajuan/index/KP") ?>">KP</a></li>
</ul>


<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>No</th>
				<?php if ($jenis != 'SK KP'): ?>
				<th>Dosen</th>
				<?php endif ?>
				<th>Mahasiswa</th>
				<th>Semester Pengajuan</th>
				<th>Tahun Pengajuan</th>
				<th>Lembaga Instansi</th>
				<th>Pimpinan Lembaga Instansi</th>
				<th>Surat Pengajuan</th>
				<th>Status</th>
				<th>Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($pengajuan as $key => $value): ?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<?php if ($jenis != 'SK KP'): ?>
					<td><?php echo $value['nama_dosen'] ?>(<?php echo $value['nidn'] ?>)</td>
					<?php endif ?>
					<td><?php echo $value['nama_mahasiswa'] ?>(<?php echo $value['nim'] ?>)</td>
					<td><?php echo $value['semester_pengajuan'] ?></td>
					<td><?php echo $value['nama_tahun_ajaran'] ?></td>
					<td><?php echo $value['lembaga_instansi'] ?></td>
					<td><?php echo $value['pimpinan_lembaga_instansi'] ?></td>
					<td>
						<a download href="<?php echo base_url("assets/dokumen/$value[surat_pengajuan_kp]") ?>" class="btn btn-xs btn-success"><i class="fa fa-download"></i> Unduh Dokumen</a>
					</td>
					<td><?php echo $value['status_pengajuan'] ?></td>
					<td>
						<a href="<?php echo base_url("admin/pengajuan/terima/$value[id_pengajuan]/$jenis") ?>" class="btn btn-warning btn-xs" tittle="Terima" onclick="return confirm('Apakah Anda Yakin ?')"><i class="fa fa-check"></i></a>
						<a href="<?php echo base_url("admin/pengajuan/tolak/$value[id_pengajuan]/$jenis") ?>" class="btn btn-danger btn-xs" tittle="Tolak" onclick="return confirm('Apakah Anda Yakin ?')"><i class="fa fa-times"></i></a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>