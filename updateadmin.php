<?php
session_start();
 include 'koneksi.php';
 
  if (isset($_POST['simpan'])) {
  	$nama=$_POST['nama'];
  	$username=$_POST['username'];
  	$email=$_POST['email'];
  	$telp=$_POST['no_telp'];
  	$where=$_POST['username1'];
  
  	$query=mysqli_query($koneksi,"UPDATE `tb_admin` SET `nama_admin`='$nama',`no_telp`='$telp' WHERE username='$where'");
  	//$query1=mysqli_query($koneksi,"UPDATE `tb_user` SET `email`='$email',`username`='$username' WHERE username='$where'");

  	$_SESSION['status'] = "Edit Berhasil";

    $_SESSION['statuscode'] = "success";
  		header('location:menu.php?menu=admin');
  }else{
  	 $id=$_GET['id'];
  $sql=mysqli_query($koneksi,"SELECT * FROM `tb_admin` join tb_user on tb_admin.username=tb_user.username where tb_admin.username='$id'");
  $dataku=mysqli_fetch_array($sql);
  $array=[
	'nama_admin'=>$dataku['nama_admin'],
'username'=>$dataku['username'],
'no_telp'=>$dataku['no_telp'],
'username'=>$dataku['username'],
'email'=>$dataku['email']

  ];
  echo json_encode($array);

}
