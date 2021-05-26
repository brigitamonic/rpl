<?php 
$data_jadwal = $jadwal->ambil_jadwal_jenis_tes($_GET['id']);
$data_jenis_tes = $jenis_tes->ambil_jenis_tes($_GET['id']);

?>

<h3>Jadwal Tes <?php echo $data_jenis_tes['nama_jenis_tes']; ?></h3>
<hr>

<table class="table table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Sesi</th>
			<th>Waktu</th>
			<th>Kuota</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data_jadwal as $key => $value): ?>
			<tr>
				<td><?php echo $key+1 ?></td>
				<td><?php echo $value['nama_jadwal'] ?></td>
				<td><?php echo $value['waktu_mulai_jadwal'] ?> - <?php echo $value
				['waktu_selesai_jadwal'] ?></td>
				<td><?php echo $value['kuota_jadwal'] ?> Orang </td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<a href="index.php?halaman=tambah_jadwal_jenis_tes&id=<?php echo $_GET['id'] ?>" 
class="btn btn-primary">Tambah</a>