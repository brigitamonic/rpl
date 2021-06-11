<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mahasiswa</title>
  <link href="<?php echo base_url("assets/css/bootstrap.min.css") ?>" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url("assets/fontawesome-free-5.15.1-web/css/all.css") ?>">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/sendiri.css") ?>">

  <!-- diagram -->
  <link rel="stylesheet" href="<?php echo base_url("assets/css/chart.css") ?>">
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/data.js"></script>
  <script src="https://code.highcharts.com/modules/drilldown.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>
<body>

  <?php 

  $data_login = $this->session->userdata('mahasiswa');

  // echo "<pre>";
  // print_r($data_login);
  // echo "</pre>";

   ?>

  <div id="wrapper">
    <nav class="navbar navbar-default">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".sidebar-collapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Sistem Informasi Kerja Praktek</a>
      </div>
    </nav>
    <nav class="navbar-default navbar-side">
      <div class="user">
        <img src="<?php echo base_url("assets/img/user.png") ?>" alt="">
        <h3><?php echo $data_login['nama_mahasiswa'] ?></h3>
        <p>Mahasiswa</p>
      </div>
      <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
          <li><a href="<?php echo base_url("mahasiswa/home") ?> "><i class="fa fa-home"></i> Home</a></li>
          
          <li><a href="<?php echo base_url("mahasiswa/pengajuan/sk_kp") ?>"><i class="fa fa-file-alt"></i> Pengajuan SK KP</a></li>

          <li><a href="<?php echo base_url("mahasiswa/pengajuan/pra_kp") ?>"><i class="fa fa-file-alt"></i> Pengajuan Pra KP</a></li>
          
          <li><a href="<?php echo base_url("mahasiswa/pengajuan/kp") ?>"><i class="fa fa-file-alt"></i> Pengajuan KP</a></li>

          <li><a href="<?php echo base_url("logout") ?>"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
        </ul>
      </div>
    </nav>
    <div id="page-wrapper">
      <div id="page-inner">