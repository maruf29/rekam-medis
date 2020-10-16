<?php
if( ! isset($_SESSION["login"]) )
{
  header("location:login.php");

  exit;
}
 $level=$_SESSION['level'];
if ($level !="admin") {
header('location:halamandokter.php');
}
 date_default_timezone_set('Asia/Jakarta');?>  
 
<head>
  <title>Pembayaran Pasien</title>
</head>
<div class="card-body">
  <a href="javascript:history.back()" ><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
  <h4>Pembayaran Pasien</h4>   
  <table style="width: 600px; height: 50px; ">
    <thead>
      <tr>
        <th>Identitas Pasien</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>

          <?php 

            $id = $_GET['id'];
            include 'koneksi.php';
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
        <td>Nomer RM</td>
        <td><?php echo $d['id'];?></td>
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
  <div class="col-md-6">
 <table class="table table-konseded">
  <?php
      $no=1;
      $nomer_identitas=$_GET["id_rm"];
      $id_rm=$_GET['id'];

      $data2= mysqli_query($koneksi,"select * from tb_rm_obat join tb_obat on tb_rm_obat.id_obat=tb_obat.id_obat   where nomer_identitas='$nomer_identitas' and id_rm='$id_rm'");
    $total_periksa=0;
    $total_obat=0;
    $periksa=mysqli_query($koneksi,"SELECT * FROM `tb_rm_jnspengobatan` join tb_jenis_pengobatan on  tb_rm_jnspengobatan.id_jenis=tb_jenis_pengobatan.id_jenis where nomer_identitas='$nomer_identitas' and id_rm='$id_rm'");
     
        ?>
        <tr><td>Periksa:</td></tr>
<?php foreach ($periksa as $row) {
  
 ?>
        <tr>
          <td><?=$row["nama_jenis"]?></td><td>Rp. <?=$row["harga"]?></td>
        </tr>
      <?php $total_periksa +=$row["harga"]; }?>
<tr>  <td>Obat  :</td></tr>

        <?php
      
 foreach ($data2 as $d2) { 
      ?>

   <tr>
    <td><?php echo "<p>".$d2["nama_obat"]."</p>";  ?></td><td>Rp. <?=$d2["harga"]; ?></td>
   </tr>
 <?php $total_obat +=$d2["harga"]; }?>
 <tr><td>Total</td><td>Rp. <?=$total_periksa+$total_obat?></td></tr>
 </table>
 <?php $cek=mysqli_query($koneksi,"SELECT * FROM `tb_rekammedis` where nomer_identitas='$nomer_identitas' and id='$id_rm'"); $view1=mysqli_fetch_array($cek); if ($view1['status'] !="Pembayaran Selesai") {
   # code...
?>
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Bayar
</button>
<?php  } ?>
<a href="cetak.php?id=<?php echo $id?>&id_rm=<?=$nomer_identitas?>" target="_blank" class="btn btn-info">cetak</a>
 </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="pembayaran2.php">
       
        <input type="hidden" name="nomer_identitas" value="<?php echo$nomer_identitas?>">
        <input type="hidden" name="id_rm" value="<?php echo$id_rm?>">
        <label>Yang Harus dibayar</label>
        <input type="text" name="total" id="total" class="form-control" value="<?php  echo $total_periksa+$total_obat?>" readonly>
         <label>Jumlah Pembayaran</label>
        <input type="text" name="pembayaran" id="pembayaran" class="form-control"  onkeypress="return hanyaAngka(event)" required="">
        <label>Kembalian</label>
        <input type="text" name="kembalian" id="kembalian" class="form-control" readonly="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>


<?php

if(isset($_SESSION['status']) && $_SESSION['status'] !='')
{
    ?>
      <script type="text/javascript">
        swal({
          title: "<?php echo $_SESSION['status']; ?>",
          //text: "You clicked the button!",
          icon: "<?php echo $_SESSION['statuscode']; ?>",
          button: "OK!",
});
      </script>
    <?php
    unset($_SESSION['status']);
}
?>


<script type="text/javascript">
 $(document).ready(function(){
$('#pembayaran').keyup(function(){

//alert("a");
  var pembayaran=parseFloat($('#pembayaran').val());

   var total=parseFloat($('#total').val());
   var hasil=0;
 hasil=pembayaran-total || 0;
 if (hasil <0 ) {
   $("#simpan").prop('disabled', true); 
}else{
   $("#simpan").prop('disabled',false); 
   $('#kembalian').val(hasil);
}
// alert(pembayaran);

 
  



 });

});
</script>

 <script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
 
        return false;
      return true;
    }
  </script>