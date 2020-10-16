<?php
session_start();
if( ! isset($_SESSION["login"]) )
{
  header("location:login.php");

  exit;
}
$level=$_SESSION['level'];
?>
<!DOCTYPE html>
<html>
<head>	
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="font-awesome.min.css">	
  <link rel="stylesheet" type="text/css" href="chosen.min.css">

	<!-- <script type="text/javascript" src="jquery.min.js"></script> -->
  <script src="jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="bootstrap.min.js"></script>
	<script type="text/javascript" src="all.min.js"></script>
	<script src="sweetalert.min.js"></script>
  <script type="text/javascript" src="chosen.jquery.min.js"></script>

</head>
<body>

  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light"  style="background: linear-gradient(to right, rgba(91,134,229, .92), rgba(54,209,220, .92));">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
        <a class="nav-link text-white" href="#">Rekam<b>Medis</b></a>
      </li>
      <?php if ($level=='admin') {
        # code...
      ?>
        <li class="nav-item active">
        <a class="nav-link text-white" href="index.php">Home</a>
      </li>
    <?php }else{
      ?>
  <li class="nav-item active">
        <a class="nav-link text-white" href="halamandokter.php">Home</a>
      </li>
    <?php } ?>
     </ul>
    <ul class="navbar-nav  float-right ">
     
      <li class="nav-item dropdown  ">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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



<!-- Awal Konten -->

	<div class="container" style="margin-top: 10px;">
		<div class="row">
		<div class="col-md-12">
				<div class="card">
					<?php 

						if (isset($_GET['menu'])){
                        $menu=$_GET['menu'];
                        include $menu.".php";
                    }
  ?>
				</div>
		</div>

	</div>
	</div>

<!-- Akhir Konten -->


</body>
</html>
<script type="text/javascript" src="jquery.dataTables.js"></script>
<script type="text/javascript">
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>