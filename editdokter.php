<?php
if( ! isset($_SESSION["login"]) )
{
  header("location:login.php");

  exit;
}
?>
<head>
	<title>Edit Dokter</title>
</head>
<div class="card-body">
	 <div class="card-header">
          <h3 class="card-title">Edit Data Dokter</h3>
            </div>

 <form action="editdokter2.php" method="POST">
      <?php
      include 'koneksi.php';
      $id_dokter=$_GET['id'];
      $data= mysqli_query($koneksi,"SELECT * FROM tb_dokter where id_dokter='$id_dokter'");
      while($d=mysqli_fetch_array($data))
      {
      ?>
              <div class="form-group">
                <label for="nama_dokter">Nama Dokter</label>
                <input type="hidden" name="id_dokter" value="<?php echo $d['id_dokter'];?>">
                <input type="text" class="form-control" id="nama_dokter" value="<?php echo $d['nama_dokter'];?>" name="nama_dokter">
              </div>
                <div class="form-group">
                <label for="spesialis">Spesialis</label>
                <input type="text" class="form-control" id="spesialis" value="<?php echo $d['spesialis'];?>" name="spesialis">
              </div>

              <div class="form-group">
                <label for="no_telp">No Telp</label>
                <input type="text" class="form-control" id="no_telp" onkeypress="return hanyaAngka(event)" value="<?php echo $d['no_telp'];?>" name="no_telp">
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