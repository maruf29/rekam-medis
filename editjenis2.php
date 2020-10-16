<?php
session_start();	
	include 'koneksi.php';

	$id_jenis = $_POST['id_jenis'];
	$nama_jenis = $_POST['nama_jenis'];
	$harga = $_POST['harga'];

$q = mysqli_query($koneksi,"UPDATE tb_jenis_pengobatan SET nama_jenis='$nama_jenis', harga = '$harga' WHERE id_jenis='$id_jenis' ");

if($q)
{
	$_SESSION['status'] = "data berhasil diubah";
	$_SESSION['statuscode'] = "success";
	header("location:menu.php?menu=jenispengobatan");

}else
{
	$_SESSION['status'] = "ubah data gagal";
	$_SESSION['statuscode'] = "error";
	header("location:menu.php?menu=jenispengobatan");
}

?>