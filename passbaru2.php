<?php
session_start();
include 'koneksi.php';

$email = $_POST['email'];
// $passbaru = $_POST['newpass'];
$passbaru = mysqli_real_escape_string($koneksi, $_POST["newpass"]);
$passbaru2 = password_hash($passbaru, PASSWORD_DEFAULT);

$query = mysqli_query($koneksi,"UPDATE tb_user SET password='$passbaru2' WHERE email='$email'");

$q=mysqli_query($koneksi,"DELETE FROM tb_resetpass WHERE email='$email'");
if($q)
{
	$_SESSION['status'] = "Reset password berhasil";
	$_SESSION['statuscode'] = "success";
	header('location:menu.php?menu=login');

}else
{
	$_SESSION['status'] = "Reset Password Gagal";
	$_SESSION['statuscode'] = "error";
	header('location:menu.php?menu=login');
}


?>