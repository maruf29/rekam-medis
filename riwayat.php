<?php
if( ! isset($_SESSION["login"]) )
{
  header("location:login.php");

  exit;

}
?>
<head>
	<title>Riwayat Berobat</title>
</head>
<div class="card-body">
	<a href="javascript:history.back()" ><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
	<h4>Riwayat Berobat</h4>
	<table id="table_id" class="Display" style="width: 100%;">
    <thead>
        <tr>
        	<th>#</th>
            <th>Id Pasien</th>
            <th>Nama Pasien</th>
            <th>Aksi</th>
    </thead>
    <tbody>
      <?php
      $no=1;
      include 'koneksi.php';
      $data= mysqli_query($koneksi,"SELECT * FROM tb_rekammedis INNER JOIN tb_pasien ON tb_rekammedis.nomer_identitas=tb_pasien.nomer_identitas group by tb_rekammedis.nomer_identitas");
      while($d=mysqli_fetch_array($data))
      {

      ?>
        <tr>
        	<td><?php echo $no++;?></td>
            <td><?php echo $d['nomer_identitas'];?></td>
            <td><?php echo $d['nama_pasien'];?></td>
            <td><a href="menu.php?menu=riwayat2&id=<?php echo $d['nomer_identitas'];?>" class="btn btn-primary btn-sm">Detail</a></td>

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