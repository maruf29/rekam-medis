<?php
if( ! isset($_SESSION["login"]) )
{
  header("location:login.php");

  exit;
 

}
 $level=$_SESSION['level'];
?>
<head>
	<title>Data Pasien</title>
</head>
<div class="card-body">
	<a href="javascript:history.back()" ><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
	<h4>Data Pasien</h4>
<?php if ($level=='admin') {
  # code...
 ?>
	<a href="menu.php?menu=tambahpasien" class="btn btn-info float-right" style="margin-bottom: 5px;">Tambah Data</a><?php }?>
	<table id="table_id" class="Display" style="width: 100%;">
    <thead>
        <tr>
        	<th>#</th>
            <th>Id Pasien</th>
            <th>NIK</th>
            <th>Nama Pasien</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
      <?php
      $no=1;
      include 'koneksi.php';
      $data= mysqli_query($koneksi,"select * from tb_pasien");
      while($d=mysqli_fetch_array($data))
      {

      ?>
        <tr>
        	<td><?php echo $no++;?></td>
            <td><?php echo $d['nomer_identitas'];?></td>
            <td><?php echo $d['nik'];?></td>
            <td><?php echo $d['nama_pasien'];?></td>
            <td><?php echo $d['jenis_kelamin'];?></td>
            <td><?php echo $d['alamat'];?></td>
            <td><?php echo $d['no_telp'];?></td>
            <td>
              <?php if ($level=='admin') {
  # code...
 ?>
              <a target="_blank" href="cetakpasien.php?&id=<?php echo $d['id_pasien'];?>" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i></a>
              <input type="hidden" name="hapusid" class="hapusid" value="<?php echo $d['id_pasien'];?>">
              <a href="menu.php?menu=editpasien&id=<?php echo $d['id_pasien'];?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
              <a href="javascript:void(0)" class="delete_btn_ajax btn btn-danger"><i class="fas fa-trash"></i></a> <?php }?>
            </td>

        </tr>
           <?php
     }
     ?>
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
        url: "hapusmtype.php",
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