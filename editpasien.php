<?php
if( ! isset($_SESSION["login"]) )
{
  header("location:login.php");

  exit;
}
?>
<head>
	<title>Edit Pasien</title>
</head>
<div class="card-body">
	 <div class="card-header">
          <h3 class="card-title">Edit Data Pasien</h3>
            </div>
            <?php
    include 'koneksi.php';
    $id=$_GET["id"];
    $data = mysqli_query($koneksi,"select * from tb_pasien where id_pasien='$id'");
    while($d=mysqli_fetch_array($data))
    {
  ?>
  
<form action="editpasien2.php" method="POST">

              <div class="form-group">
                <label for="nomer_identitas">Nomer Identitas</label>
                <input type="hidden" name="id_pasien" value="<?php echo $d['id_pasien']?>">
                <input type="text" class="form-control" id="nomer_identitas" value="<?php echo $d['nomer_identitas']?>" name="nomer_identitas" readonly>
              </div>

              <div class="form-group">
                <label for="nik">Nik</label>
                <input type="text" class="form-control" id="nik" value="<?php echo $d['nik']?>" name="nik">
              </div>
              <div class="form-group">
                <label for="nama_pasien">Nama Pasien</label>
                <input type="text" class="form-control" id="nama_pasien" value="<?php echo $d['nama_pasien']?>" name="nama_pasien">
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
                <input type="text" class="form-control" id="alamat" value="<?php echo $d['alamat'];?>" name="alamat">
              </div>
              <div class="form-group">
                <label for="no_telp">No Telp</label>
                <input type="text" class="form-control" id="no_telp" onkeypress="return hanyaAngka(event)" value="<?php echo $d['no_telp'];?>" name="no_telp">
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