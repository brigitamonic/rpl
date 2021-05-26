
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administrator</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="css/sendiri.css">

  <!-- diagram -->
  <link rel="stylesheet" href="css/chart.css">
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/data.js"></script>
  <script src="https://code.highcharts.com/modules/drilldown.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>
<body>

  <div id="wrapper">
    <nav class="navbar navbar-default">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".sidebar-collapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Billi</a>
      </div>
    </nav>
    <nav class="navbar-default navbar-side">
      <div class="user">
        <img src="img/user.png" alt="">
        <h3>Billian Sember</h3>
        <p>Administrator</p>
      </div>
      <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
          <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
          <li class="tr-tree">
            <a href="#"><i class="fa fa-cube"></i>Data Master <i class="pull-right fa fa-angle-right"></i></a>
            <ul class="tr-tree-menu">
              <li><a href="index.php?halaman=jenis_tes">Jenis Tes</a></li>
              <li><a href="index.php?halaman=user">User</a></li>
            </ul>
          </li>
          
          <li><a href="index.php?halaman=pesan_tes"><i class="fa fa-database"></i>Pesan Tes</a></li>
          
          <li><a href="index.php?halaman=logout"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
        </ul>
      </div>
    </nav>
    <div id="page-wrapper">
      <div id="page-inner">
        <?php
        if (!isset($_GET['halaman']))
        {
          include 'home.php';
        } 

        else
        {
          if ($_GET['halaman']=="jenis_tes")
          {
            include 'jenis_tes/tampil_jenis_tes.php';
          }
          elseif ($_GET['halaman']=="user") 
          {
            include 'user/tampil_user.php';
          }
          elseif ($_GET['halaman']=="pesan_tes") 
          {
            include 'pesan_tes/tampil_pesan_tes.php';
          }
          elseif ($_GET['halaman']=="tambah_jenis_tes")
          {
            include 'jenis_tes/tambah_jenis_tes.php';
          }
          elseif ($_GET['halaman']=="ubah_jenis_tes")
          {
            include 'jenis_tes/ubah_jenis_tes.php';
          }
          elseif ($_GET['halaman']=="hapus_jenis_tes")
          {
            include 'jenis_tes/hapus_jenis_tes';
          }
          elseif ($_GET['halaman']=="jadwal") 
          {
            include 'jenis_tes/jadwal.php';
          }
          elseif ($_GET['halaman']=="tambah_jadwal_jenis_tes") 
          {
            include 'jenis_tes/tambah_jadwal.php';
          }
          elseif ($_GET['halaman']=="nota")
          {
            include 'pesan_tes/nota.php';
          }
          elseif ($_GET['halaman']=="konfirmasi_pembayaran") 
          {
            include 'pesan_tes/konfirmasi_pembayaran.php';
          }
          elseif ($_GET['halaman']=="lihat_jadwal") 
          {
            include 'pesan_tes/lihat_jadwal.php';
          }
          elseif ($_GET['halaman']=="selesai")
          {
            include 'pesan_tes/selesai.php';
          }
          elseif ($_GET['halaman']=="logout") 
          {
            session_destroy();
            echo "<script>alert('Logout Berhasil'); location='../login.php'</script>";
          }
        }
        ?>


      </div>
    </div>
  </div>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js" ></script>
  <script>
    $(document).ready(function() {
      $('#thetable').DataTable();
    } );
  </script>

  <script src="ckeditor/ckeditor.js"></script>
  <script>
    CKEDITOR.replace("theeditor");
  </script>

  <script src="js/sendiri.js"></script>


</body>
</html>