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

$id_obat = $_POST['id'];
mysqli_query($koneksi,"DELETE FROM tb_obat WHERE id_obat='$id_obat'");
//header('location:menu.php?menu=jenispengobatan');
}
?>