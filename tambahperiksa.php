<?php
session_start();

include 'koneksi.php';
$id = $_POST['id'];
$id_rm = $_POST['nomer_rm'];
$nama_pasien = $_POST['nama_pasien'];
$id_dokter = $_POST['id_dokter'];
$nama_dokter = $_POST['nama_dokter'];
$diagnosa = $_POST['diagnosa'];
$jenis_pengobatan = $_POST['jenis'];
$jenis_obat = $_POST['jenisobat'];
$tgl=date('Y-m-d');
$status='Belum bayar';
$kode= 'RMS'.date('ydhis');
$keluhan=$_POST['keluhan'];
$q=mysqli_query($koneksi,"INSERT INTO tb_rekammedis VALUES('$kode','$id_rm','$id_dokter','$diagnosa','$keluhan','$tgl','$status')");


if($q)
{
	$query=mysqli_query($koneksi,"SELECT id FROM `tb_rekammedis` order by id desc");
	$view=mysqli_fetch_array($query);
	$idrm=$view['id'];
	foreach($jenis_pengobatan as $jenis)
{
	mysqli_query($koneksi,"INSERT INTO tb_rm_jnspengobatan VALUES('','$id_rm','$jenis','$idrm')");
}

foreach($jenis_obat as $jns_ob) {
	mysqli_query($koneksi,"INSERT INTO tb_rm_obat VALUES('','$id_rm','$jns_ob','$idrm')");
}

	mysqli_query($koneksi,"DELETE FROM tb_periksa WHERE id='$id'");	
	$_SESSION['status'] = "data berhasil dikirim";
	$_SESSION['statuscode'] = "success";
	header("location:menu.php?menu=ruangperawatan");

}else
{
	$_SESSION['status'] = "data gagal dikirim";
	$_SESSION['statuscode'] = "error";
	header("location:menu.php?menu=ruangperawatan");
}

?>