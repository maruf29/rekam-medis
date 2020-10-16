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
	<a href="javascript:history.back()" ><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
	<h4>Data Jenis Pengobatan</h4>
	<a href="menu.php?menu=tambahjenis" class="btn btn-info float-right" style="margin-bottom: 5px;">Tambah Data</a>
<table id="table_id" class="display">
    <thead>
        <tr>
            <th>#</th>
            <th>Jenis Pengobatan</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
    include 'koneksi.php';
    $no=1;
    $data=mysqli_query($koneksi,"SElECT * FROM tb_jenis_pengobatan");
    while($d=mysqli_fetch_array($data))
    {

    ?>
        <tr>
            <td><?php echo $no++;?></td>
            <td><?php echo $d['nama_jenis'];?></td>
            <td><?php echo $d['harga']?></td>
            <td>
              <input type="hidden" name="hapusid" class="hapusid" value="<?php echo $d['id_jenis'];?>">
              <a href="menu.php?menu=editjenis&id=<?php echo $d['id_jenis'];?>" class="btn btn-warning">Edit</a>
              <a href="javascript:void(0)" class="delete_btn_ajax btn btn-danger">Hapus</a>
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
        url: "hapusjenis.php",
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