<?php
session_start();
	if( ! isset($_SESSION["login"]) )
{
  header("location:login.php");

  exit;
}
	include 'koneksi.php';

	if(isset($_POST['delete_btn_set']))
	{
	$id_pasien = $_POST['id'];

	mysqli_query($koneksi,"delete from tb_pasien where id_pasien='$id_pasien'");

	//header('location:menu.php?menu=pasien');
	}
?>


