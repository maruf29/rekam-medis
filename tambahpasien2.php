<?php
session_start();
include 'koneksi.php';

// $id_pasien = $_POST['id_pasien'];
$nomer_identitas = $_POST['nomer_identitas'];
$nama_pasien = $_POST['nama_pasien'];
$nik=$_POST['nik'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];

$q=mysqli_query($koneksi,"INSERT INTO tb_pasien VALUES('','$nomer_identitas','$nik','$nama_pasien','$jenis_kelamin','$alamat','$no_telp' )");
if($q)
{
	$_SESSION['status'] = "data berhasil ditambahkan";
	$_SESSION['statuscode'] = "success";
	header("location:menu.php?menu=pasien");

}else
{
	$_SESSION['status'] = "data gagal ditambahkan";
	$_SESSION['statuscode'] = "error";
	header("location:menu.php?menu=pasien");
}

?>