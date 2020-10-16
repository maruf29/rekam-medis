<?php
session_start();
	include 'koneksi.php';

	if(isset($_POST['delete_btn_set']))
	{
	$id = $_POST['id'];

	mysqli_query($koneksi,"delete from mtype where id='$id'");

	//header('location:menu.php?menu=pasien');
	}
?>


