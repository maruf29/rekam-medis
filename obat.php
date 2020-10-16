<?php
if( ! isset($_SESSION["login"]) )
{
  header("location:login.php");

  exit;
}
?>
<head>
	<title>Data Obat</title>
</head>
<div class="card-body">
	<a href="javascript:history.back()" ><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
	<h4>Data Obat</h4>
	<a href="menu.php?menu=tambahobat" class="btn btn-info float-right" style="margin-bottom: 5px;">Tambah Data</a>
	<table id="table_id" class="Display" style="width: 100%;">
    <thead>
        <tr>
        	<th>#</th>
            <th>Nama Obat</th>
            <th>Keterangan</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
      <?php
      $no=1;
      include 'koneksi.php';
      $data= mysqli_query($koneksi,"select * from tb_obat");
      while($d=mysqli_fetch_array($data))
      {

      ?>
        <tr>
        	<td><?php echo $no++;?></td>
            <td><?php echo $d['nama_obat'];?></td>
            <td><?php echo $d['ket_obat'];?></td>
            <td><?php echo $d['harga'];?></td>
            <td>
              <input type="hidden" name="hapusid" class="hapusid" value="<?php echo $d['id_obat'];?>">
              <a href="menu.php?menu=editobat&id=<?php echo $d['id_obat'];?>" class="btn btn-warning">Edit</a>
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
        url: "hapusobat.php",
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