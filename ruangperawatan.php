<?php
if( ! isset($_SESSION["login"]) )
{
  header("location:login.php");

  exit;
}
 $level=$_SESSION['level'];
if ($level !="dokter") {
  header('location:index.php');
}
?>
<head>
  <title>Ruang Medis</title>
</head>
<div class="card-body">
  <a href="halamandokter.php" ><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
  <h4>Data Pasien Berobat</h4>
  <!-- <a href="menu.php?menu=tambahpasien" class="btn btn-info float-right" style="margin-bottom: 5px;">Tambah Data</a> -->
  <table id="table_id" class="Display" style="width: 100%;">
    <thead>
        <tr>
          <th>#</th>
            <th>Tanggal Periksa</th>
            <th>Id Pasien</th>
            <th>Nama Pasien</th>
            <th>Nama Dokter</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
      <?php
      $no=1;
      include 'koneksi.php';
      $data=mysqli_query($koneksi, "SELECT * FROM tb_periksa INNER JOIN tb_pasien ON tb_periksa.nomer_identitas = tb_pasien.nomer_identitas INNER JOIN tb_dokter ON tb_periksa.id_dokter = tb_dokter.id_dokter");
      while($d=mysqli_fetch_array($data))
      {

      ?>
        <tr>
          <td><?php echo $no++;?></td>
            <td><?php echo date('d-m-Y',strtotime($d['tanggal']));?></td>
            <td><?php echo $d['nomer_identitas']?></td>
            <td><?php echo $d['nama_pasien'];?></td>
            <td><?php echo $d['nama_dokter'];?></td>
            <td>
            <a href="menu.php?menu=periksa&id=<?php echo $d['id'];?>" class="btn btn-info">Periksa</a>
            </td>
            <?php
     }
     ?>
        </tr>
    </tbody>
</table>
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


