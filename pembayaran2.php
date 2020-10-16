<?php
session_start();
include 'koneksi.php';
$nomer_identitas = $_POST['nomer_identitas'];
$id_rm = $_POST['id_rm'];
$pembayaran = $_POST['pembayaran'];
$kembalian = $_POST['kembalian'];
$status ='Pembayaran Selesai';

mysqli_query($koneksi,"UPDATE tb_rekammedis SET status='$status' WHERE id='$id_rm' ");
$q=mysqli_query($koneksi,"INSERT INTO tb_bayar VALUES('','$nomer_identitas','$id_rm','$pembayaran','$kembalian')");
if($q)
{
	$_SESSION['status'] = "Pembayaran berhasil";
	$_SESSION['statuscode'] = "success";
	header("location:menu.php?menu=pembayaran&id=$id_rm &id_rm=$nomer_identitas");

}else
{
	$_SESSION['status'] = "pembayaran gagal";
	$_SESSION['statuscode'] = "error";
	header("location:menu.php?menu=pembayaran&id=$id_rm &id_rm=$nomer_identitas");
}

?>