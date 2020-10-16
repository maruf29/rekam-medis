<?php
if( ! isset($_SESSION["login"]) )
{
  header("location:login.php");

  exit;
}
?>
<head>
	<title>Tambah Pasien</title>
</head>
<div class="card-body">
	 <div class="card-header">
          <h3 class="card-title">Tambah Data Pasien</h3>
            </div>
            <div class="card-body">
             <!--  <a href="tambahpasien.php"><button class="btn btn-success">Tambah Pasien</button></a> -->
             <form action="tambahpasien2.php" method="POST">
            <!--   <div class="form-group">
                <label for="id_pasien">Id Pasien</label>
                <input type="text" class="form-control" id="id_pasien" placeholder="Id Pasien" name="id_pasien">
              </div> -->

              <?php
               $kode= date('ydhis');
              ?>
              <div class="form-group">
                <label for="nomer_identitas">Nomer Identitas</label>
                <input type="text" readonly="" class="form-control" id="nomer_identitas" value="MDS<?= $kode ?>" name="nomer_identitas">
              </div>
               <div class="form-group">
                <label for="nik">Nik</label>
                <input type="text" class="form-control" id="nik" name="nik" placeholder="Nik">
              </div>
              <div class="form-group">
                <label for="nama_pasien">Nama Pasien</label>
                <input type="text" class="form-control" id="nama_pasien" placeholder="Nama Pasien" name="nama_pasien" required="">
              </div>
                <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                  <option value="Laki-Laki">Laki Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
                <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" required="">
              </div>
              <div class="form-group">
                <label for="no_telp">No Telp</label>
                <input type="text" class="form-control" id="no_telp" placeholder="No Telp"  onkeypress="return hanyaAngka(event)" name="no_telp" required="">
              </div>
              <button type="submit" id="tambah" name="tambah" class="btn btn-info float-right">Tambah</button>
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