<h3>Detail Pengajuan</h3>
<hr>
<?php 
// echo "<pre>";
// print_r ($pra_kp);
// echo "</pre>";
?>

<div class="row">
 <?php if (!empty($sk_kp) AND empty($kp) AND empty($pra_kp)): ?>
 <div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Pengajuan SK KP</h3>
        </div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <th width="30%">Nama Mahasiswa</th>
                    <th>:</th>
                    <td><?php echo $sk_kp['nama_mahasiswa'] ?></td>
                </tr>
                <tr>
                    <th>NIM</th>
                    <th>:</th>
                    <td><?php echo $sk_kp['nim'] ?></td>
                </tr>
                <tr>
                    <th width="30%">Semester Pengajuan</th>
                    <th>:</th>
                    <td><?php echo $sk_kp['semester_pengajuan'] ?></td>
                </tr>
                <tr>
                    <th>Tahun Ajaran</th>
                    <th>:</th>
                    <td><?php echo $sk_kp['nama_tahun_ajaran'] ?></td>
                </tr>
                <tr>
                    <th>Lembaga/Instansi</th>
                    <th>:</th>
                    <td><?php echo $sk_kp['lembaga_instansi'] ?></td>
                </tr>
                <tr>
                    <th>Pimpinan Instansi</th>
                    <th>:</th>
                    <td><?php echo $sk_kp['pimpinan_lembaga_instansi'] ?></td>
                </tr>
                <tr>
                    <th>No Telp. Instansi</th>
                    <th>:</th>
                    <td><?php echo $sk_kp['telepon_instansi'] ?></td>
                </tr>
                <tr>
                    <th>Alamat Instansi</th>
                    <th>:</th>
                    <td><?php echo $sk_kp['alamat_lembaga_instansi'] ?></td>
                </tr>
                <tr>
                    <th>Fax Instansi</th>
                    <th>:</th>
                    <td><?php echo $sk_kp['fax_instansi'] ?></td>
                </tr>
                <tr>
                    <th>Dokumen SK</th>
                    <th>:</th>
                    <td>
                        <a href="<?php echo base_url('assets/dokumen/' . $sk_kp['surat_pengajuan_kp']) ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i> <?php echo $sk_kp['surat_pengajuan_kp'] ?></a>
                    </td>
                </tr>
                <tr>
                    <th>Status Verifikasi</th>
                    <th>:</th>
                    <td>
                        <?php if ($sk_kp['status_pengajuan']=='Belum Diverifikasi') {
                            $warna_label = 'warning';
                        } elseif ($sk_kp['status_pengajuan']=='Ditolak') {
                            $warna_label = 'danger';
                        } elseif ($sk_kp['status_pengajuan']=='Diterima') {
                            $warna_label = 'success';
                        }

                        ?>
                        <span class="label label-<?php echo $warna_label ?>" style="font-size: 16px">
                            <?php echo $sk_kp['status_pengajuan'] ?>
                        </span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php endif ?>
<?php if (!empty($pra_kp)): ?>
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Pengajuan Pra KP</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <th width="30%">Nama Mahasiswa</th>
                        <th>:</th>
                        <td><?php echo $pra_kp['nama_mahasiswa'] ?></td>
                    </tr>
                    <tr>
                        <th>NIM</th>
                        <th>:</th>
                        <td><?php echo $pra_kp['nim'] ?></td>
                    </tr>
                    <tr>
                        <th>NIK</th>
                        <th>:</th>
                        <td><?php echo $pra_kp['nik'] ?></td>
                    </tr>
                    <tr>
                        <th width="30%">Semester Pengajuan</th>
                        <th>:</th>
                        <td><?php echo $pra_kp['semester_pengajuan'] ?></td>
                    </tr>
                    <tr>
                        <th>Tahun Ajaran</th>
                        <th>:</th>
                        <td><?php echo $pra_kp['nama_tahun_ajaran'] ?></td>
                    </tr>
                    <tr>
                        <th>Lembaga/Instansi</th>
                        <th>:</th>
                        <td><?php echo $pra_kp['lembaga_instansi'] ?></td>
                    </tr>
                    <tr>
                        <th>Pimpinan Instansi</th>
                        <th>:</th>
                        <td><?php echo $pra_kp['pimpinan_lembaga_instansi'] ?></td>
                    </tr>
                    <tr>
                        <th>No Telp. Instansi</th>
                        <th>:</th>
                        <td><?php echo $pra_kp['telepon_instansi'] ?></td>
                    </tr>
                    <tr>
                        <th>Alamat Instansi</th>
                        <th>:</th>
                        <td><?php echo $pra_kp['alamat_lembaga_instansi'] ?></td>
                    </tr>
                    <tr>
                        <th>Fax Instansi</th>
                        <th>:</th>
                        <td><?php echo $pra_kp['fax_instansi'] ?></td>
                    </tr>
                    <tr>
                        <th>Dokumen Pra KP</th>
                        <th>:</th>
                        <td>
                            <a href="<?php echo base_url('assets/dokumen/' . $pra_kp['surat_pengajuan_kp']) ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i> <?php echo $pra_kp['surat_pengajuan_kp'] ?></a>
                        </td>
                    </tr>
                    <tr>
                        <th>Status Verifikasi</th>
                        <th>:</th>
                        <td>
                            <?php if ($pra_kp['status_pengajuan']=='Belum Diverifikasi') {
                                $warna_label = 'warning';
                            } elseif ($pra_kp['status_pengajuan']=='Ditolak') {
                                $warna_label = 'danger';
                            } elseif ($pra_kp['status_pengajuan']=='Diterima') {
                                $warna_label = 'success';
                            }

                            ?>
                            <span class="label label-<?php echo $warna_label ?>" style="font-size: 16px">
                                <?php echo $pra_kp['status_pengajuan'] ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Ruangan</th>
                        <th>:</th>
                        <td><?php echo $pra_kp['nama_ruangan'] ?></td>
                    </tr>
                    <tr>
                        <th>Penguji</th>
                        <th>:</th>
                        <td><?php echo $pra_kp['nama_dosen'] ?></td>
                    </tr>
                    <tr>
                        <th>Status Ujian</th>
                        <th>:</th>
                        <td>
                            <?php if (empty($pra_kp['status_ujian'])): ?>
                                <span class="label label-warning">Belum Ujian</span>
                                <?php else: ?>
                                    <?php if ($pra_kp['status_ujian']=="Lulus"): ?>
                                        <span class="label label-success"><?php echo $pra_kp['status_ujian'] ?></span>
                                        <?php else: ?>
                                            <span class="label label-danger"><?php echo $pra_kp['status_ujian'] ?></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <?php if (!empty($kp)): ?>
         <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Pengajuan KP</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th width="30%">Nama Mahasiswa</th>
                            <th>:</th>
                            <td><?php echo $kp['nama_mahasiswa'] ?></td>
                        </tr>
                        <tr>
                            <th>NIM</th>
                            <th>:</th>
                            <td><?php echo $kp['nim'] ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Semester Pengajuan</th>
                            <th>:</th>
                            <td><?php echo $kp['semester_pengajuan'] ?></td>
                        </tr>
                        <tr>
                            <th>Tahun Ajaran</th>
                            <th>:</th>
                            <td><?php echo $kp['nama_tahun_ajaran'] ?></td>
                        </tr>
                        <tr>
                            <th>Lembaga/Instansi</th>
                            <th>:</th>
                            <td><?php echo $kp['lembaga_instansi'] ?></td>
                        </tr>
                        <tr>
                            <th>Pimpinan Instansi</th>
                            <th>:</th>
                            <td><?php echo $kp['pimpinan_lembaga_instansi'] ?></td>
                        </tr>
                        <tr>
                            <th>No Telp. Instansi</th>
                            <th>:</th>
                            <td><?php echo $kp['telepon_instansi'] ?></td>
                        </tr>
                        <tr>
                            <th>Alamat Instansi</th>
                            <th>:</th>
                            <td><?php echo $kp['alamat_lembaga_instansi'] ?></td>
                        </tr>
                        <tr>
                            <th>Fax Instansi</th>
                            <th>:</th>
                            <td><?php echo $kp['fax_instansi'] ?></td>
                        </tr>
                        <tr>
                            <th>Dokumen KP</th>
                            <th>:</th>
                            <td>
                                <a href="<?php echo base_url('assets/dokumen/' . $kp['surat_pengajuan_kp']) ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i> <?php echo $kp['surat_pengajuan_kp'] ?></a>
                            </td>
                        </tr>
                            <th>Status Verifikasi</th>
                            <th>:</th>
                            <td>
                                <?php if ($kp['status_pengajuan']=='Belum Diverifikasi') {
                                    $warna_label = 'warning';
                                } elseif ($kp['status_pengajuan']=='Ditolak') {
                                    $warna_label = 'danger';
                                } elseif ($kp['status_pengajuan']=='Diterima') {
                                    $warna_label = 'success';
                                }

                                ?>
                                <span class="label label-<?php echo $warna_label ?>" style="font-size: 16px">
                                    <?php echo $kp['status_pengajuan'] ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Judul KP</th>
                            <th>:</th>
                            <td><?php echo $kp['judul_kp'] ?></td>
                        </tr>
                        <tr>
                            <th>Jadwal Ujian</th>
                            <th>:</th>
                            <td><?php echo $kp['jadwal_ujian'] ?></td>
                        </tr>
                        <tr>
                            <th>Ruangan</th>
                            <th>:</th>
                            <td><?php echo $kp['nama_ruangan'] ?></td>
                        </tr>
                        <tr>
                            <th>Penguji</th>
                            <th>:</th>
                            <td><?php echo $kp['nama_dosen'] ?></td>
                        </tr>
                        <tr>
                            <th>Status Ujian</th>
                            <th>:</th>
                            <td>
                                <?php if ($kp['status_ujian']=='Lulus') {
                                    $warna_label = 'success';
                                } elseif ($kp['status_ujian']=='Tidak Lulus') {
                                    $warna_label = 'danger';
                                } else {
                                    $warna_label = 'info';
                                }
                                ?>
                                <span class="label label-<?php echo $warna_label ?>" style="font-size: 16px">
                                 <?php echo $kp['status_ujian'] ? $kp['status_ujian'] : '-' ?>
                             </span>
                         </td>
                     </tr>

                 </table>
             </div>
         </div>
     </div>
 <?php endif ?>
</div>

