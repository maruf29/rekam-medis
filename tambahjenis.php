<?php
if( ! isset($_SESSION["login"]) )
{
  header("location:login.php");

  exit;
}
?>
<head>
	<title>Jenis Pengobatan</title>
</head>
<div class="card-body">
	 <div class="card-header">
          <h3 class="card-title">Tambah Jenis Pengobatan</h3>
            </div>
             <form action="tambahjenis2.php" method="POST">
              <div class="form-group">
                <label for="nama_jenis">Jenis Pengobatan</label>
                <input type="text" class="form-control" id="nama_jenis" placeholder="Jenis Pengobatan" name="nama_jenis" required="">
              </div>
              <div class="form-group">
                <label>Harga</label>
                <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" required="" onkeypress="return hanyaAngka(event)">
              </div>
              <button type="submit" class="btn btn-success">Simpan</button>
            </form>
          </div>
</div>

 <script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
 
        return false;
      return true;
    }
  </script>