<?php
session_start();
include 'koneksi.php';

// $id_pasien = $_POST['id_pasien'];
$nama_obat = $_POST['nama_obat'];
$keterangan = $_POST['keterangan'];
$harga = $_POST['harga'];
$q=mysqli_query($koneksi,"INSERT INTO tb_obat VALUES('','$nama_obat','$keterangan','$harga')");
if($q)
{
	$_SESSION['status'] = "data berhasil ditambahkan";
	$_SESSION['statuscode'] = "success";
	header("location:menu.php?menu=obat");

}else
{
	$_SESSION['status'] = "data tidak berhasil ditambahkan";
	$_SESSION['statuscode'] = "error";
	header("location:menu.php?menu=obat");
}

?>