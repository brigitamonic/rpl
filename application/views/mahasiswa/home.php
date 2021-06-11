<h3>Selamat datang, <?php echo $_SESSION['mahasiswa']['nama_mahasiswa'] ?>!</h3>
<hr>

<ul class="nav nav-pills">
  <li role="presentation" class="<?php if($jenis=="SK KP"){echo "active";} ?>"><a href="<?php echo base_url("mahasiswa/home/pengajuan/SK KP") ?>">SK KP</a></li>
  <li role="presentation" class="<?php if($jenis=="Pra KP"){echo "active";} ?>"><a href="<?php echo base_url("mahasiswa/home/pengajuan/Pra KP") ?>">Pra KP</a></li>
  <li role="presentation" class="<?php if($jenis=="KP"){echo "active";} ?>"><a href="<?php echo base_url("mahasiswa/home/pengajuan/KP") ?>">KP</a></li>
</ul>


<h3>Pengajuan Saya</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Pengajuan</th>
            <th>Tanggal Pengajuan</th>
            <th>NIM Mahasiswa</th>
            <th>Semester Pengajuan</th>
            <th>Tahun Ajaran</th>
            <th>Lembaga/Instansi</th>
            <th>Pimpinan Istansi</th>
            <th>Alamat Istansi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pengajuan as $key => $value): ?>
            <tr>
                <td><?php echo $key+1 ?></td>
                <td>0<?php echo $value['id_pengajuan'] ?></td>
                <td><?php echo $value['tanggal_pengajuan'] ?></td>
                <td><?php echo $value['nim'] ?></td>
                <td><?php echo $value['semester_pengajuan'] ?></td>
                <td><?php echo $value['nama_tahun_ajaran'] ?></td>
                <td><?php echo $value['lembaga_instansi'] ?></td>
                <td><?php echo $value['pimpinan_lembaga_instansi'] ?></td>
                <td><?php echo $value['alamat_lembaga_instansi'] ?></td>
                <td>
                    <a href="<?php echo base_url('mahasiswa/pengajuan/detail/' . $value['id_pengajuan']) ?>" class="btn btn-success btn-sm">Detail</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>



