<?php

require_once __DIR__ . '/vendor/autoload.php';
include 'koneksi.php';
$mpdf = new \Mpdf\Mpdf();
ob_start();
?>
 <?php

 include 'koneksi.php';
    $nomer_identitas= $_GET['nomer_identitas'];
   $query=mysqli_query($koneksi,"SELECT * FROM tb_rekammedis INNER JOIN tb_pasien ON tb_rekammedis.nomer_identitas=tb_pasien.nomer_identitas WHERE tb_rekammedis.nomer_identitas='$nomer_identitas'");

$row=mysqli_fetch_array($query);
    ?>
<!--   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <h3 align="center">Data Rekam Medis Pasien Klinik Gigi Denta Medika</h3>
<p align="center">Jl. Tanjung Sari, RT.05/RW.04, Kulon Kali, Sumbermanjing Kulon,</p>
<p align="center">Pagak, Malang, Jawa Timur 65168</p>
    <div class="col-md-4">
    <table class="table table-konseded" border="0" style="border-bottom:0px;">
       <tr style="">
        <td>Id Pasien</td><td>:</td><td><?=$row['nomer_identitas']?></td>
      </tr>
      <tr>
        <td>NIK</td><td>:</td><td><?=$row['nik']?></td>
      </tr>
      <tr>
        <td>Nama</td><td>:</td><td><?=$row['nama_pasien']?></td>
      </tr>
      <tr>
        <td>Alamat</td><td>:</td><td><?=$row['alamat']?></td>
      </tr>
    </table>
    </div>
    <div class="col-md-8">
   <style type="text/css">
    table tr td,
    table tr th{
      font-size: 12pt;
    }

  </style>
  <table id="" class="satu" style="border-collapse:collapse; margin-top: 20px;" border="1">
    <thead>
        <tr>
          <th>#</th>
            <th>Nomer RM</th>
            <th>Tanggal Periksa</th>
            <th>Keluhan</th>
            <th>Diagnosa</th>
    </thead>
    <tbody>
      <?php
      $no=1;
      include 'koneksi.php';
       $nomer_identitas= $_GET['nomer_identitas'];
      $data= mysqli_query($koneksi,"SELECT * FROM tb_rekammedis JOIN tb_pasien ON tb_rekammedis.nomer_identitas=tb_pasien.nomer_identitas WHERE tb_rekammedis.nomer_identitas='$nomer_identitas'");
      while($d=mysqli_fetch_array($data))
      {

      ?>
        <tr>
          <td><?php echo $no++;?></td>
            <td><?= $d['id']?></td>
            <td><?php echo $d['tanggal_periksa'];?></td>
            <td><?= $d['keluhan']?></td>
            <td><?php echo $d['diagnosa'];?></td>
        </tr>
           <?php
     }
     ?>
    </tbody>
</table>
<?php 
 $html = ob_get_contents(); 
 ob_end_clean();
 $mpdf->WriteHTML(utf8_encode($html));
 $mpdf->Output();
 ?>