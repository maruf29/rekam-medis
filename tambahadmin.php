<?php
session_start();
include 'koneksi.php';
$nama_admin = $_POST['nama'];
$no_telp =$_POST['no_telp'];
$email = $_POST['email'];
$username= $_POST['username'];
$password = mysqli_real_escape_string($koneksi,$_POST["password"]);
$password2 = mysqli_real_escape_string($koneksi,$_POST["password2"]);
$level = 'admin';

 // cek email sudah ada atau belum

  $rs=mysqli_query($koneksi,"SELECT email FROM tb_user WHERE email = '$email'");

  if(mysqli_fetch_assoc($rs))
  {
	$_SESSION['status'] = "Maaf email sudah terdaftar";
	$_SESSION['statuscode'] = "error";
	header('location:menu.php?menu=admin');

	return false;
  }

    $rs2=mysqli_query($koneksi,"SELECT username FROM tb_user WHERE username = '$username'");

  if(mysqli_fetch_assoc($rs2))
  {
  $_SESSION['status'] = "Maaf username sudah terdaftar";
	$_SESSION['statuscode'] = "error";
	header('location:menu.php?menu=admin');

    return false;
  }


  // // cek email sudah  terdaftar atau belum
  // $rs2=mysqli_query($koneksi,"SELECT email FROM tb_user WHERE email = '$email'");

  // cek konfirmasi password

  if ($password !== $password2)
  {
  $_SESSION['status'] = "Konfirmasi password tidak sama";
	$_SESSION['statuscode'] = "error";
	header('location:menu.php?menu=admin');

  	return false;
  }

  //enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // tambah user baru
  mysqli_query($koneksi,"INSERT INTO tb_user VALUES('','$email','$username','$level','$password')");

$q=mysqli_query($koneksi,"INSERT INTO tb_admin VALUES('','$nama_admin','$username','$no_telp')" );
if($q)
{
	$_SESSION['status'] = "data berhasil ditambahkan";
	$_SESSION['statuscode'] = "success";
	header('location:menu.php?menu=admin');

}else
{
	$_SESSION['status'] = "data gagal ditambahkan";
	$_SESSION['statuscode'] = "error";
	header('location:menu.php?menu=admin');
}


?>

