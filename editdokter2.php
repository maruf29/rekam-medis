<?php 

session_start();
if( ! isset($_SESSION["login"]) )
{
  header("location:login.php");
  exit;
}

 ?>
<?php
include 'koneksi.php';

 $id_dokter = $_POST['id_dokter'];
 $nama_dokter = $_POST['nama_dokter'];
 $spesialis = $_POST['spesialis'];
 $no_telp = $_POST['no_telp'];

$q=mysqli_query($koneksi,"UPDATE tb_dokter SET nama_dokter='$nama_dokter',spesialis='$spesialis',no_telp='$no_telp' WHERE id_dokter='$id_dokter'");
if($q)
{
	$_SESSION['status'] = "data berhasil diubah";
	$_SESSION['statuscode'] = "success";
	header("location:menu.php?menu=dokter");

}else
{
	$_SESSION['status'] = "ubah data gagal";
	$_SESSION['statuscode'] = "error";
	header("location:menu.php?menu=dokter");
}
?>