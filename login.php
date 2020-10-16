<?php
session_start();

if (isset($_SESSION["login"]))
{
  //header("location:index.php");

      //$url = $_SERVER['REQUEST_URI'];  
      header("location:javascript://history.go(-1)");
  exit;
}

// if (isset($_SESSION["login2"]))
// {
//   header("location:halamandokter.php");
//   exit;
// }

include 'koneksi.php';
if(isset($_POST['login']))
{
  $username= $_POST['username'];
  $password= $_POST['password'];

  // cek username
  $rs=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE username='$username'");

  if(mysqli_num_rows($rs) === 1)
  {
    // cek password
    $row = mysqli_fetch_assoc($rs);
    if(password_verify($password, $row["password"]))
    {
     // $view=mysqli_fetch_array($rs);
      // set session
      if($row['level']=="admin")
      {
        $_SESSION['level']=$row['level'];
        $_SESSION['username']=$row['username'];
         $_SESSION["login"] = true;
         header("location:index.php");
         exit;
      }else
      {
         $_SESSION['username']=$row['username'];
        $_SESSION['level']=$row['level'];
        $_SESSION["login"] = true;
        header("location:halamandokter.php");
        exit;
      }
     
    }

  }
  $error = true;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
   <link rel="stylesheet" href="login.css">
  <script src="sweetalert.min.js"></script>
  <script src="jquery.min.js"></script>
  <script src="popper.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <style type="text/css">
  	body{
  margin: 0;
  padding:0;
  font-family: sans-serif;
  background: url(bg5.jpg);
  background-size: cover;
}

.login-box
{

  width: 300px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  color: white;
  /*border: 2px solid skyblue;*/
  /*background-color: grey; */

}
.login-box h1
{
  float: left;
  font-size: 40px;
  border-bottom: 6px solid skyblue;
  margin-bottom: 50px;
  padding: 13px 0;
  color: grey;
}
.textbox
{
  width: 100%;
  overflow: hidden;
  font-size: 20px;
  padding: 8px;
  margin: 8px 0;
  border-bottom: 1px solid skyblue;
}
.textbox i
{
  width: 26px;
  float: left;
  text-align: center;

}
.textbox input
{
  float: left;
  border: none;
  outline: none;
  background: none;
  color: black;
  font-size: 18px;
  width: 100%
  margin: 0 10px;
}
#logo
{
	margin-top:-100px; 
	height: 130px;
}



  </style>

</head>

<body>
  <form action="" method="POST">
	<div class="login-box">
		<!-- <img src="logo.png" id="logo"> -->
		<h1>Login</h1>
		<div class="textbox">
			<i class="fas fa-user"></i>
			<input type="text" name="username" placeholder="username">
		</div>
		<div class="textbox">
			<i class="fas fa-lock">
				
			</i>
			<input type="password" name="password" placeholder="password">
		</div>
    <a href="resetpass.php">Lupa Password ?</a><br>
  <?php if(isset($error)):  ?>
  <p style="color:red; font-style: italic;">Username/password salah</p>
  <?php endif; ?>
		<!-- <input type="button" name="" class="btn btn-warning" value="Sign In"> -->
    <button type="submit" name="login" class="btn btn-primary float-right">Masuk</button>
	</div>
</form>
</body>
</html>

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
