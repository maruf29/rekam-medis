<?php
if( ! isset($_SESSION["login"]) )
{
  header("location:login.php");

  exit;
}
 $level=$_SESSION['level'];
if ($level !="admin") {
header('location:halamandokter.php');
}
  date_default_timezone_set('Asia/Jakarta');?>  
<head>
	<title>Rekam Medis</title>
</head>
<div class="card-body">
	<a href="javascript:history.back()" ><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
	<h4>Rekam Medis</h4>         
  <table class="table" style="width: 600px; height: 50px; ">
    <thead>
      <tr>
        <th>Input Identitas Pasien</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <form method="POST" action="tambahrm.php">
        <td>Id Pasien</td>
        <td><input type="text" name="nomer_rm" id="nomer_rm" class="form-control" placeholder="Masukkan Id Pasien" required=""></td>
      </tr>
        <tr>
        <td>Nik</td>
        <td><input type="text" name="nik" id="nik" class="form-control"  placeholder="Nik" required="" readonly=""></td>
      </tr>
      <tr>
        <td>Nama Pasien</td>
        <td><input type="text" name="nama_pasien" id="nama_pasien" class="form-control"  placeholder="Nama Pasien" required="" readonly=""></td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td><input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control"  placeholder="Jenis Kelamin" required="" readonly=""></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td><input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" required="" readonly=""></td>
      </tr>
      <tr>
        <td>Nomer Telp</td>
        <td><input type="text" name="nomer_tlp" id="nomer_tlp" class="form-control" placeholder="Nomer Telp" required="" onkeypress="return hanyaAngka(event)" readonly=""></td>
      </tr>
    </tbody>
  </table>
    <table class="table" style="width: 600px; height: 50px; ">
    <thead>
      <tr>
        <th>Input Layanan Rekam Medis</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Tanggal Periksa</td>
        <td><input type="text" class="form-control" id="tanggal" placeholder="Tanggal" value="<?=date('d-m-Y')?>" name="tanggal"></td>
      </tr>
      <tr>
        <td>Keluhan / Pengobatan</td>
        <td><textarea class="form-control" name="keluhan" required=""></textarea></td>
      </tr>
      <tr>
        <td>Petugas Medis Yang Menangani</td>
        <td><select class="form-control" name="dokter" required>
          <option value="">-Pilih-</option>
          <?php
          include 'koneksi.php';
            $q=mysqli_query($koneksi,"SELECT * FROM tb_dokter");
            while($d=mysqli_fetch_array($q))
            {
              ?>
              <option value="<?php echo $d['id_dokter'];?>"><?php echo $d['nama_dokter'];?></option>
              <?php
            }
          ?>
        </select></td>
      </tr>
      <tr>
        <td></td>
        <td> <input type="submit" name="" class="btn btn-info float-right" value="Kirim"></td>
      </form>
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


<script type="text/javascript">
  $(document).ready(function()
  {
    $('.delete_btn_ajax').click(function(e)
    {
      e.preventDefault();
      var hapusid = $(this).closest("tr").find('.hapusid').val();
              swal({
          title: "Apakah anda yakin ingin menghapus data ?",
          text: "Data akan Terhapus!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
             $.ajax({
        type: 'POST',
        url: "hapuspasien.php",
        data: {"delete_btn_set":1,
        "id":hapusid,
      },
        success: function(response) {
                     swal({
                title: "Data Terhapus",
                icon: "success",
              }).then((result) =>{
                location.reload();
              });
        }
    });
          } 
        });
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
$('#nomer_rm').keyup(function(){
  var rm=$('#nomer_rm').val();
 $.ajax({
url:"cek_pasien.php?no_rm="+rm,
type:"get",
dataType:"JSON",
success:function(data){
  $('#nama_pasien').val(data.nama_pasien);
  $('#alamat').val(data.alamat);
  $('#jenis_kelamin').val(data.jenis_kelamin);
  $('#nomer_tlp').val(data.no_telp);
  $('#nik').val(data.nik);
}
 })
})

  })
</script>

 <script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
 
        return false;
      return true;
    }
  </script>