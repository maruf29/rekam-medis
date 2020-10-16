<?php
session_start();
include 'koneksi.php';
 $nomer_rm= $_POST['nomer_rm'];
 $keluhan= $_POST['keluhan'];
 $dokter = $_POST['dokter'];
 $tanggal = date('Y-m-d',strtotime($_POST['tanggal']));

$q=mysqli_query($koneksi,"INSERT INTO tb_periksa VALUES ('','$nomer_rm','$keluhan','$dokter','$tanggal')");

if($q)
{
	$_SESSION['status'] = "data berhasil dikirim";
	$_SESSION['statuscode'] = "success";
	header("location:menu.php?menu=rekammedik");

}else
{
	$_SESSION['status'] = "data gagal dikirim";
	$_SESSION['statuscode'] = "error";
	header("location:menu.php?menu=rekammedik");
}

?>