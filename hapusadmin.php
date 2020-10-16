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
include 'koneksi.php';
if(isset($_POST['delete_btn_set']))
{
$id_admin = $_POST ['id'];
mysqli_query($koneksi,"DELETE FROM tb_user WHERE username='$id_admin'");
mysqli_query($koneksi,"DELETE FROM tb_admin WHERE username='$id_admin'");
}
?>