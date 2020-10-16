<?php

require_once __DIR__ . '/vendor/autoload.php';
include 'koneksi.php';
$mpdf = new \Mpdf\Mpdf();
ob_start();
?>
<style type="text/css"></style>
<div>
<h3 align="center">Klinik Gigi Denta Medika</h3>
<p align="center">Jl. Tanjung Sari, RT.05/RW.04, Kulon Kali, Sumbermanjing Kulon,</p>
<p align="center">Pagak, Malang, Jawa Timur 65168</p>
</div>
 <table style="width: 600px; height: 50px; ">
    <tbody>
      <tr>
          <?php 

           
            $id = $_GET['id'];
           // include 'koneksi.php';
            $data = mysqli_query($koneksi,"SELECT * FROM tb_rekammedis join tb_pasien on tb_rekammedis.nomer_identitas=tb_pasien.nomer_identitas WHERE id='$id'");
            while($d=mysqli_fetch_array($data))
            {
          ?>
      <tr>
        <td>Tanggal Periksa</td>
        <td><?php echo date('d-m-Y',strtotime($d['tanggal_periksa']));?></td>
      </tr>
      <tr>
        <td>Id Pasien</td>
        <td><?php echo $d['nomer_identitas'];?></td>
      </tr>
      <tr>
        <td>Nama Pasien</td>
        <td><?php echo $d['nama_pasien'];?></td>
      </tr>
       <tr>
        <td>Keluhan</td>
        <td><?php echo $d['keluhan'];?></td>
      </tr>
      <tr>
        <td>Diagnosa</td>
        <td><?php echo $d['diagnosa'];?></td>

          <?php
      }
      ?>
      <tr>
        <td></td>
        <a href="#"></a>
      </tr>
    </tbody>
  </table>
<p></b>Struk Pembayaran<b></p>
<table class="table1" style="width: 600px; height: 50px; ">
  <?php
      $no=1;
      $nomer_identitas=$_GET["id_rm"];
      $id_rm=$_GET['id'];

      $data2= mysqli_query($koneksi,"select * from tb_rm_obat join tb_obat on tb_rm_obat.id_obat=tb_obat.id_obat   where nomer_identitas='$nomer_identitas' and id_rm='$id_rm'");
    $total_periksa=0;
    $total_obat=0;
    $periksa=mysqli_query($koneksi,"SELECT * FROM `tb_rm_jnspengobatan` join tb_jenis_pengobatan on  tb_rm_jnspengobatan.id_jenis=tb_jenis_pengobatan.id_jenis where nomer_identitas='$nomer_identitas' and id_rm='$id_rm'");
     
        ?>
        <tr><td><b>Jenis Pengobatan:</b></td></tr>
<?php foreach ($periksa as $row) {
  # code...
 ?>
        <tr>
          <td><?=$row["nama_jenis"]?></td><td>Rp. <?=$row["harga"]?></td>
        </tr>
      <?php $total_periksa +=$row["harga"]; }?>
<tr>  <td><b>Obat  :</b></td></tr>

        <?php
      
 foreach ($data2 as $d2) { 
      ?>

   <tr>
    <td><?php echo "<p>".$d2["nama_obat"]."</p>";  ?></td><td>Rp. <?=$d2["harga"]; ?></td>
   </tr>
 <?php $total_obat +=$d2["harga"]; }?>
 <tr><td><b>Total</b></td><td>Rp. <?=$total_periksa+$total_obat?></td></tr>
 </table>

<?php 
 $html = ob_get_contents(); 
 ob_end_clean();
 $mpdf->WriteHTML(utf8_encode($html));
 $mpdf->Output();
 ?>