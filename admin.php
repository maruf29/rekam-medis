<?php
//session_start();
  include 'koneksi.php';
 // session_start();
if( ! isset($_SESSION["login"]) )
{
  header("location:login.php");

  exit;
}
 $level=$_SESSION['level'];
if ($level !="admin") {
header('location:halamandokter.php');
}

?>
<div class="card-body">
	<a href="javascript:history.back()" ><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
	<h4>Data Admin</h4>
	<button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" style="margin-bottom: 5px;">Tambah Admin</button>
	<table id="table_id" class="Display" style="width: 100%;">
    <thead>
        <tr>
        	<th>#</th>
        	<th>Nama</th>
            <th>Email</th>
            <th>No Telp</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
      <?php
      $no=1;
      $admin='admin';
    
      $data= mysqli_query($koneksi,"select * from tb_user join tb_admin on tb_user.username=tb_admin.username where level='$admin'");
      while($d=mysqli_fetch_array($data))
      {

      ?>
        <tr>
        	<td><?php echo $no++;?></td>
        	<td><?php echo $d['nama_admin'];?></td>
            <td><?php echo $d['email'];?></td>
            <td><?php echo $d['no_telp'];?></td>
            <td>
             <a href="#" onclick="edit('<?=$d['username']?>')" class="btn btn-warning">Edit</a>
              <input type="hidden" name="hapusid" class="hapusid" value="<?php echo $d['username'];?>">
              <a href="javascript:void(0)" class="delete_btn_ajax btn btn-danger">Hapus</a>
            </td>

        </tr>
           <?php
     }
     ?>
    </tbody>
</table>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="tambahadmin.php">
        <label>Nama</label>
        <input type="text" name="nama"  placeholder="Nama" required="" class="form-control">
        <label>Username</label>
        <input type="text" name="username"  placeholder="username" required="" class="form-control">
         <label>Email</label>
         <input type="email" class="form-control"  placeholder="Email" name="email" required="">
         <label>No Telepon</label>
         <input type="text" name="no_telp" placeholder="No Telepon" required="" class="form-control" onkeypress="return hanyaAngka(event)">
        <label>Password</label>
      	<input type="password" name="password" placeholder="Password" required="" class="form-control">
        <label>Konfirmasi Password</label>
        <input type="password" name="password2" placeholder="Konfirmasi Password" required="" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>ss
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="updateadmin.php">
          <input type="hidden" name="username1" id="username1">
        <label>Nama</label>
        <input type="text" name="nama" id="nama" placeholder="Nama" required="" class="form-control">
    <!--    <label>Username</label>
      <input type="text" name="username" id="username" placeholder="username" required="" class="form-control">-->

      <!--   <label>Email</label>
         <input type="email" class="form-control" id="email" placeholder="Email" name="email" required="">-->
         <label>No Telepon</label>
         <input type="text" name="no_telp" id="no_telp" placeholder="No Telepon" required="" class="form-control"  onkeypress="return hanyaAngka(event)">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
        </form>
      </div>
    </div>
  </div>
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
          title: "Apakah anda yakin ingin menghapus data?",
          text: "Data akan terhapus",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
             $.ajax({
        type: 'POST',
        url: "hapusadmin.php",
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

 function edit(id){
//alert(id);

      $.ajax({

          url:"updateadmin.php?id="+id,
          type:"get",
          dataType:"JSON",
          success:function(data){
          //alert(data.nama_admin);
           document.getElementById('username1').value=data.username;
         document.getElementById('nama').value=data.nama_admin;
        // document.getElementById('username').value=data.username;
         // document.getElementById('email').value=data.email;
           document.getElementById('no_telp').value=data.no_telp;
             $('#modal-edit').modal();
          }

      });

    
    }</script>

     <script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
 
        return false;
      return true;
    }
  </script>
