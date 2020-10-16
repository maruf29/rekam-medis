<?php
if( ! isset($_SESSION["login"]) )
{
  header("location:login.php");

  exit;
}
?>
<head>
	<title>Edit Jenis Pengobatan</title>
</head>
<div class="card-body">
	 <div class="card-header">
          <h3 class="card-title">Edit Data Jenis Pengobatan</h3>
            </div>
  <form action="editjenis2.php" method="POST">
      <?php
      include 'koneksi.php';
      $id_jenis = $_GET['id'];
      $data=mysqli_query($koneksi,"SELECT * FROM tb_jenis_pengobatan WHERE id_jenis='$id_jenis'");
      while($d=mysqli_fetch_array($data))
      {
      ?>
              <div class="form-group">
                <label for="nama_jenis">Jenis Pengobatan</label>
                <input type="hidden" name="id_jenis" value="<?php echo $d['id_jenis'];?>">
                <input type="text" class="form-control" id="nama_jenis" value="<?php echo $d['nama_jenis'];?>" name="nama_jenis">
                <label>Harga</label>
                <input type="text" class="form-control" name="harga" id="harga" value="<?php echo $d['harga'];?>" onkeypress="return hanyaAngka(event)">
              </div>
              <button type="submit" class="btn btn-success">Simpan</button>
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