<?php
if( ! isset($_SESSION["login"]) )
{
  header("location:login.php");

  exit;
}
	include 'koneksi.php';
	$spesialis = $_POST['spesialis'];

	$q=mysqli_query($koneksi,"INSERT INTO tb_spesialis VALUES ('','$spesialis')");

?>