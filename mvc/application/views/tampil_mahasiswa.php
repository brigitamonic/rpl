<!DOCTYPE html>
<html>
<head>
	<title>Tampil</title>
</head>
<body>
	<pre><?php print_r($mahasiswa) ?></pre>

	<h3><?php echo $judul ?></h3>
	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Nim</th>
				<th>Nama</th>
				<th>Alamat</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($mahasiswa as $key => $value): ?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td><?php echo $value['nim'] ?></td>
					<td><?php echo $value['nama'] ?></td>
					<td><?php echo $value['alamat'] ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>