<?php
if( ! isset($_SESSION["login"]) )
{
  header("location:login.php");

  exit;
}
?>
<head>
	<title>Edit Obat</title>
</head>
<div class="card-body">
	 <div class="card-header">
          <h3 class="card-title">Edit Data Obat</h3>
            </div>

 <form action="editobat2.php" method="POST">
      <?php
      include 'koneksi.php';
      $id_obat=$_GET['id'];
      $data= mysqli_query($koneksi,"SELECT * FROM tb_obat where id_obat='$id_obat'");
      while($d=mysqli_fetch_array($data))
      {
      ?>
              <div class="form-group">
                <label for="nama_obat">Nama Obat</label>
                <input type="hidden" name="id_obat" value="<?php echo $d['id_obat'];?>">
                <input type="text" class="form-control" id="nama_obat" value="<?php echo $d['nama_obat'];?>" name="nama_obat">
              </div>
                <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" value="<?php echo $d['ket_obat'];?>" name="keterangan">
              </div>

              <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" id="harga" onkeypress="return hanyaAngka(event)" value="<?php echo $d['harga'];?>" name="harga">
              </div>
              <button type="submit" class="btn btn-info">Simpan</button>
              <?php
             }
              ?>
            </form>
</div>

 <script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
 
        return false;
      return true;
    }
  </script>