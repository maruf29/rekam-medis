<?php

include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
   <link rel="stylesheet" href="login.css">
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
   <script src="sweetalert.min.js"></script>
</head>
<body>
<form action="reset.php" method="post">
	<div class="login-box">
		<img src="logo.png" id="logo">
		<h1>Reset Password</h1>
      <div class="textbox">
      <i class="fas fa-user"></i>
      <input type="email" name="email" placeholder="email" required="">
    </div>
		<!-- <input type="button" name="" class="btn btn-warning" value="Daftar"> --> 
    <button type="submit" name="reset_pass" class="btn btn-danger float-right"> kirim </button>
	</div>
</form>
</body>
</html>
<?php session_start();
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

