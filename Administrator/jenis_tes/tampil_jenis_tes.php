<h3>Data Jenis Tes</h3>
<hr>
<?php 
$data_jenis_tes = $jenis_tes->tampil_jenis_tes();
 ?>

 <table class="table table-striped" id="thetable">
 	<thead>
 		<tr>
 			<th>No</th>
 			<th>Jenis Tes</th>
 			<th>Biaya Jenis Tes</th>
 			<th>Opsi</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php foreach ($data_jenis_tes as $key => $value): ?>
 			<tr>
 				<td><?php echo $key+1?></td>
 				<td><?php echo $value['nama_jenis_tes'] ?></td>
 				<td>Rp. <?php echo number_format($value['biaya_jenis_tes']) ?></td>
 				<td>
 					<a href="index.php?halaman=ubah_jenis_tes&id=<?php
 					echo $value['id_jenis_tes'] ?>" title="Ubah" 
 					class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
 					<a href="index.php?halaman=hapus_jenis_tes&id=<?php
 					echo $value['id_jenis_tes'] ?>" title="Hapus"
 					onclick="return confirm('Apakah Anda Yakin Ingin Menghapus')"
 					class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>

 					<a href="index.php?halaman=jadwal&id=<?php echo $value['id_jenis_tes'] ?>" title="Jadwal" class="btn btn-info btn-xs"><i class="fa fa-clock"></i></a>
 				</td>
 			</tr>
 		<?php endforeach ?>
 	</tbody>
 </table>

<a href="index.php?halaman=tambah_jenis_tes" class="btn btn-primary">Tambah</a> 