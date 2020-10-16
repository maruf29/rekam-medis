
<?php
session_start();	
	include 'koneksi.php';

	$id_pasien = $_POST['id_pasien'];
	$nomer_identitas = $_POST['nomer_identitas'];
	$nik=$_POST['nik'];
	$nama_pasien = $_POST['nama_pasien'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$alamat = $_POST['alamat'];
	$no_telp = $_POST['no_telp'];

		$q=mysqli_query($koneksi,"update tb_pasien set nomer_identitas='$nomer_identitas',nik='$nik', nama_pasien='$nama_pasien', jenis_kelamin='$jenis_kelamin', alamat='$alamat', no_telp='$no_telp' where id_pasien='$id_pasien'");
	
if($q)
{
	$_SESSION['status'] = "data berhasil diubah";
	$_SESSION['statuscode'] = "success";
	header("location:menu.php?menu=pasien");

}else
{
	$_SESSION['status'] = "ubah data gagal";
	$_SESSION['statuscode'] = "error";
	header("location:menu.php?menu=pasien");
}

?>