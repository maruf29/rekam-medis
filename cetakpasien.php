<?php

require_once __DIR__ . '/vendor/autoload.php';
include 'koneksi.php';
$mpdf = new \Mpdf\Mpdf();
ob_start();
?>
<style type="text/css"></style>
<div>
<h3 align="center">Kartu Identitas Pasien Klinik Gigi Denta Medika</h3>
<p align="center">Jl. Tanjung Sari, RT.05/RW.04, Kulon Kali, Sumbermanjing Kulon,</p>
<p align="center">Pagak, Malang, Jawa Timur 65168</p>
</div>
      <table style="width: 400px;">
        <?php
      $no=1;
      $id=$_GET['id'];
      $data= mysqli_query($koneksi,"select * from tb_pasien where id_pasien='$id'");
      while($d=mysqli_fetch_array($data))
      {   
      ?>
        <tr>
        <td>Nomer Identitas</td>
        <td>:<?php echo$d['nomer_identitas'];?></td>
        </tr>
        <tr>
        <td>Nama Pasien</td>
        <td>:<?php echo$d['nama_pasien'];?></td>
        </tr>
        <tr>
        <td>Jenis Kelamin</td>
        <td>:<?php echo$d['jenis_kelamin'];?></td>
        </tr>
        <tr>
        <td>Alamat</td>
        <td>:<?php echo$d['alamat'];?></td>
        </tr>
        <tr>
        <td>Nomer Telepon</td>
        <td>:<?php echo$d['no_telp'];?></td>
        </tr>
        <?php
      }
      ?>
      </table><br>
      <i>Catatan :Kartu wajib dibawa saat berobat</i>

<?php 
 $html = ob_get_contents(); 
 ob_end_clean();
 $mpdf->WriteHTML(utf8_encode($html));
 $mpdf->Output();
 ?>