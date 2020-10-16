<?php
if( ! isset($_SESSION["login"]) )
{
  header("location:login.php");

  exit;
}
?>
<head>
	<title>Tambah Dokter</title>
</head>
<div class="card-body">
	 <div class="card-header">
          <h3 class="card-title">Tambah Data Dokter</h3>
            </div>

            <form action="tambahdokter2.php" method="POST">
              <div class="form-group">
                <label for="nama_dokter">Nama Dokter</label>
                <input type="text" class="form-control" id="nama_dokter" placeholder="Nama Dokter" name="nama_dokter" required="">
              </div>
                <div class="form-group">
                <label for="spesialis">Spesialis</label>
                <input type="text" class="form-control" id="spesialis" placeholder="Spesialis" name="spesialis" required="">
              </div>

              <div class="form-group">
                <label for="no_telp">No Telp</label>
                <input type="text" class="form-control" id="no_telp" placeholder="No Telp"  onkeypress="return hanyaAngka(event)" name="no_telp" required="">
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                  <input type="text" name="username" placeholder="username" required="" class="form-control">
              </div>
               <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" required="">
              </div>
               <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password" required="" class="form-control">
              </div>
               <div class="form-group">
                <label for="password2">Konfirmasi Password</label>
                <input type="password" name="password2" placeholder="Konfirmasi Password" required="" class="form-control">
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