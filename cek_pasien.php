<?php
include 'koneksi.php';
$no_rm = $_GET['no_rm'];

$query= mysqli_query($koneksi,"SELECT * FROM tb_pasien WHERE nomer_identitas='$no_rm'");
$data=mysqli_fetch_array($query);

echo json_encode($data);
?>