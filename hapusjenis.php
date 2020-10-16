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

$id_jenis = $_POST['id'];
mysqli_query($koneksi,"DELETE FROM tb_jenis_pengobatan WHERE id_jenis='$id_jenis'");
//header('location:menu.php?menu=jenispengobatan');
}
?>