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
$id_dokter = $_POST ['id'];
mysqli_query($koneksi,"DELETE FROM tb_user WHERE username='$id_dokter'");
mysqli_query($koneksi,"DELETE FROM tb_dokter WHERE username='$id_dokter'");
}
?>