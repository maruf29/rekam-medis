<?php
session_start();
include 'koneksi.php';

	$nama_jenis = $_POST['nama_jenis'];
	$harga = $_POST['harga'];


	$q=mysqli_query($koneksi,"INSERT INTO tb_jenis_pengobatan VALUES ('','$nama_jenis','$harga')");
if($q)
{
	$_SESSION['status'] = "data berhasil ditambahkan";
	$_SESSION['statuscode'] = "success";
	header('location:menu.php?menu=jenispengobatan');

}else
{
	$_SESSION['status'] = "data gagal ditambahkan";
	$_SESSION['statuscode'] = "error";
	header('location:menu.php?menu=jenispengobatan');
}


?>