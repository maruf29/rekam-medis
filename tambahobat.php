<?php
if( ! isset($_SESSION["login"]) )
{
  header("location:login.php");

  exit;
}
?>
<head>
	<title>Tambah Obat</title>
</head>
<div class="card-body">
	 <div class="card-header">
          <h3 class="card-title">Tambah Obat</h3>
            </div>

            <form action="tambahobat2.php" method="POST">
              <div class="form-group">
                <label for="nama_dokter">Nama Obat</label>
                <input type="text" class="form-control" id="nama_obat" placeholder="Nama Obat" name="nama_obat" required="">
              </div>
                <div class="form-group">
                <label for="spesialis">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" placeholder="Keterangan" name="keterangan" required="">
              </div>

              <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" id="harga" placeholder="Harga"  onkeypress="return hanyaAngka(event)" name="harga" required="">
              </div>
              <button type="submit" class="btn btn-success">Tambah</button>
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