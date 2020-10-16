<div class="card-body">
  <?php

 include 'koneksi.php';
    $nomer_identitas= $_GET['id'];
   $query=mysqli_query($koneksi,"SELECT * FROM tb_rekammedis INNER JOIN tb_pasien ON tb_rekammedis.nomer_identitas=tb_pasien.nomer_identitas WHERE tb_rekammedis.nomer_identitas='$nomer_identitas'");

$row=mysqli_fetch_array($query);
    ?>
    <div class="col-md-8">
      <a target="_blank" href="cetakriwayat.php?&nomer_identitas=<?=$row['nomer_identitas']?>" class="btn btn-info float-right">Cetak</a>
    </div>
    <div class="col-md-4">
    <table class="table table-konseded">
       <tr>
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
	<table id="" class="table table-bordered table-striped" >
    <thead>
        <tr>
        	<th>#</th>
            <th>No RM</th>
            <th>Tanggal Periksa</th>
            <th>keluhan</th>
            <th>Diagnosa</th>
    </thead>
    <tbody>
      <?php
      $no=1;
   
     
      $data= mysqli_query($koneksi,"SELECT * FROM tb_rekammedis JOIN tb_pasien ON tb_rekammedis.nomer_identitas=tb_pasien.nomer_identitas WHERE tb_rekammedis.nomer_identitas='$nomer_identitas'");
      while($d=mysqli_fetch_array($data))
      {

      ?>
        <tr>
        	<td><?php echo $no++;?></td>
            <td><?= $d['id']?></td>
            <td><?php echo $d['tanggal_periksa'];?></td>
            <td><?=$d['keluhan']?></td>
            <td><?php echo $d['diagnosa'];?></td>
           

        </tr>
           <?php
     }
     ?>
    </tbody>
</table>
</div>
</div>