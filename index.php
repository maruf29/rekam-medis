<?php
session_start();
if( ! isset($_SESSION["login"]) )
{
  header("location:login.php");

  exit;
}
 $level=$_SESSION['level'];
if ($level !="admin") {
header('location:halamandokter.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Rekam Medis</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="bootstrap-select.min.css">	
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap.min.js"></script>
  <script type="text/javascript" src="bootstrap-select.min.js"></script>
  <style type="text/css">
    .warna-bg
    {
      background: linear-gradient(to right, rgba(91,134,229, .92), rgba(54,209,220, .92));
    }
  </style>
</head>
<body>
  <!-- Grey with black text -->
 
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
        <a class="nav-link" href="#">Rekam<b>Medis</b></a>
      </li>
     </ul>
    <ul class="navbar-nav  float-right ">
     
      <li class="nav-item dropdown  ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?=$_SESSION['username']?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="logout.php">LogOut</a>
        </div>
      </li>
     
    </ul>
   
  </div>
</nav>
</nav>
  </div>


<!-- Jumbotron -->
  <section class="jumbotron-bg">
    <div class="jumbotron warna-bg text-white">
      <div class="container">
      <h1>Klinik Gigi Denta Malang</h1>
      <p>Jl. Tanjung Sari, RT.05/RW.04, Kulon Kali, Sumbermanjing Kulon, Pagak, Malang, Jawa Timur 65168</p>
      <p></p> </div>
    </div>
  </section>
<!-- Akhir Jumbotron -->

<!-- Awal Konten -->
    
    <div class="container">
      <div class="row">
        
        <div class="col-md-3 mb-2">
          <a href="menu.php?menu=admin">
          <div class="card" >
              <img src="gambar/admin.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title text-info" align="center">Data Admin</h5>
              </div>
            </div>
        </a>
        </div>

        <div class="col-md-3 mb-2">
          <a href="menu.php?menu=pasien">
          <div class="card" >
              <img src="gambar/pasien.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title text-info" align="center">Data Pasien</h5>
              </div>
            </div>
        </a>
        </div>

        <div class="col-md-3 mb-2">
          <a href="menu.php?menu=dokter" class="text-primary">
          <div class="card">
              <img src="gambar/dokter.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title text-info" align="center">Data Dokter</h5>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-3 mb-2">
          <a href="menu.php?menu=rekammedik" class="text-primary">
          <div class="card" >
              <img src="gambar/rm.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title text-info" align="center">Rekam Medik</h5>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-3 mb-2">
          <a href="menu.php?menu=jenispengobatan" class="text-primary">
          <div class="card" >
              <img src="gambar/obat.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title text-info">Data Jenis Pengobatan</h5>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-3 mb-2">
            <a href="menu.php?menu=obat" class="text-primary">
          <div class="card" >
              <img src="gambar/obat2.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title text-info" align="center">Data Obat</h5>
              </div>
            </div>
          </a>
        </div>
          <div class="col-md-3 mb-2">
            <a href="menu.php?menu=riwayat" class="text-primary">
          <div class="card" >
              <img src="gambar/laporan2.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title text-info">Riwayat Berobat</h5>
              </div>
            </div>
          </a>
        </div>

        <div class="col-md-3 mb-2">
         <a href="menu.php?menu=transaksi" class="text-primary">
          <div class="card" >
              <img src="gambar/transaksi.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title text-info" align="center">Transaksi</h5>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

<!-- AKhir Konten -->


</body>
</html>