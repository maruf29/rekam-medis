<?php
session_start();	
	include 'koneksi.php';

	$id_obat = $_POST['id_obat'];
	$nama_obat = $_POST['nama_obat'];
	$ket_obat = $_POST['keterangan'];
	$harga = $_POST['harga'];

$q = mysqli_query($koneksi,"UPDATE tb_obat SET nama_obat='$nama_obat',ket_obat='$ket_obat', harga = '$harga' WHERE id_obat='$id_obat' ");

if($q)
{
	$_SESSION['status'] = "data berhasil diubah";
	$_SESSION['statuscode'] = "success";
	header("location:menu.php?menu=obat");

}else
{
	$_SESSION['status'] = "ubah data gagal";
	$_SESSION['statuscode'] = "error";
	header("location:menu.php?menu=obat");
}

?>