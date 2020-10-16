<?php
if( ! isset($_SESSION["login"]) )
{
  header("location:login.php");

  exit;
}
$level=$_SESSION['level'];
?>
<head>
	<title>Data Dokter</title>
</head>
<div class="card-body">
	<a href="javascript:history.back()" ><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
	<h4>Data Dokter</h4>
  <?php if ($level=='admin'){
  ?>
	<a href="menu.php?menu=tambahdokter" class="btn btn-info float-right" style="margin-bottom: 5px;">Tambah Data</a>
<?php }?>
	<table id="table_id" class="display">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Dokter</th>
            <th>Spesialis</th>
            <th>No Telp</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
    include 'koneksi.php';
    $no=1;
    $data=mysqli_query($koneksi,"SElECT * FROM tb_dokter");
    while($d=mysqli_fetch_array($data))
    {

    ?>
        <tr>
            <td><?php echo $no++;?></td>
            <td><?php echo $d['nama_dokter'];?></td>
            <td><?php echo $d['spesialis'];?></td>
            <td><?php echo $d['no_telp'];?></td>
            <td>

              <input type="hidden" class="hapusid" value="<?php echo $d['username'];?>">
              <?php if ($level=='admin') {
                # code...
              ?>
              <a href="menu.php?menu=editdokter&id=<?php echo $d['id_dokter'];?>" class="btn btn-warning">Edit</a>
              <a href="javascript:void(0)" class="delete_btn_ajax btn btn-danger">Hapus</a>
            <?php }?>
            </td>
        
        </tr>
        <?php
      }
        ?>
    </tbody>
      
</table>
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
          text: "Data akan terhapus",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
             $.ajax({
        type: 'POST',
        url: "hapusdokter.php",
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