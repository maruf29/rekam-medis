<?php
if( ! isset($_SESSION["login"]) )
{
  header("location:login.php");

  exit;
}
 $level=$_SESSION['level'];
if ($level !="dokter") {
  header('location:index.php');
}
date_default_timezone_set('Asia/Jakarta');
?>
<head>
	<title>Periksa Pasien</title>
</head>
<div class="card-body">
	<a href="menu.php?menu=ruangperawatan" ><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
	<h4>Periksa Pasien</h4>   
  <table class="table" style="width: 600px; height: 50px; ">
    <thead>
      <tr>
        <th>Identitas Dokter</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <form method="POST" action="tambahperiksa.php">
          <?php 
            $id = $_GET['id'];
            include 'koneksi.php';
            $data = mysqli_query($koneksi,"SELECT * FROM tb_periksa INNER JOIN tb_pasien ON tb_periksa.nomer_identitas = tb_pasien.nomer_identitas INNER JOIN tb_dokter ON tb_periksa.id_dokter = tb_dokter.id_dokter WHERE id=$id");
            while($d=mysqli_fetch_array($data))
            {
          ?>
        <td>Nama Dokter</td>
        <input type="hidden" name="id" value="<?php echo$d['id'];?>">
        <input type="hidden" name="id_dokter" value="<?php echo $d['id_dokter'];?>">
        <td><input type="text" name="nama_dokter" id="nomer_dokter" class="form-control" placeholder="Nama Dokter" required="" readonly="" value="<?php echo $d['nama_dokter'];?>" ></td>
      </tr>
    </tbody>
  </table>      
  <table class="table" style="width: 600px; height: 50px; ">
    <thead>
      <tr>
        <th>Identitas Pasien</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Id Pasien</td>
        <td><input type="text" name="nomer_rm" id="nomer_rm" class="form-control" placeholder="Nomer Identitas" readonly="" required="" value="<?php echo $d['nomer_identitas'];?>"></td>
      </tr>
       <tr>
        <td>NIK</td>
        <td><input type="text" name="nik" id="nik" class="form-control" placeholder="NIK" readonly="" required="" value="<?php echo $d['nik'];?>"></td>
      </tr>
      <tr>
        <td>Nama Pasien</td>
        <td><input type="text" name="nama_pasien" id="nama_pasien" class="form-control" readonly="" placeholder="Nama Pasien" required="" value="<?php echo $d['nama_pasien'];?>"></td>
      </tr>
      <tr>
        <td>Keluhan</td>
        <td>
          <input type="text" name="keluhan" id="keluhan" class="form-control" readonly=""  placeholder="keluhan" required="" value="<?php echo $d['keluhan'];?>">
        </td>
      </tr>
      <tr>
        <td>Diagnosa</td>
        <td><textarea name="diagnosa" id="diagnosa" class="form-control" placeholder="Diagnosa" required=""></textarea></td>
          <?php
      }
      ?>
      </tr>
      <tr>
        <td>Jenis Pengobatan</td>
        <td>    
        <select multiple="" name="jenis[]" class="form-control" required="">
           <?php 
          $query= mysqli_query($koneksi, "SELECT * FROM tb_jenis_pengobatan");
          while($data=mysqli_fetch_array($query))
          {
          
          echo '<option value="'.$data['id_jenis'].'">'.$data['nama_jenis'].'</option>';
        }
        ?>
        </select>
      </td>
      </tr>
         <tr>
        <td>Jenis Obat</td>
        <td>    
        <select multiple="" name="jenisobat[]" class="form-control" required="">
           <?php 
          $query= mysqli_query($koneksi, "SELECT * FROM tb_obat");
          while($data=mysqli_fetch_array($query))
          {
          
          echo '<option value="'.$data['id_obat'].'">'.$data['nama_obat'].'</option>';
        }
        ?>
        </select>
      </td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="" class="btn btn-info float-right" value="Kirim"></td>
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
}
 })
})

  })
</script>