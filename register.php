<?php

include 'koneksi.php';
if(isset($_POST["register"]) ){
  if(registerasi($_POST)>0){
    echo "
    <script>
    alert('user berhasil ditambahkan !');
    </script>
    ";
  }else
  {
    echo mysqli_error($koneksi);
  }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Register Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/bootstrap.min.css">
   <link rel="stylesheet" href="login.css">
  <script src="assets/jquery.min.js"></script>
  <script src="assets/popper.min.js"></script>
  <script src="assets/bootstrap.min.js"></script>
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
<form action="" method="post">
	<div class="login-box">
		<img src="logo.png" id="logo">
		<h1>Tambah Admin</h1>
      <div class="textbox">
      <i class="fas fa-user"></i>
      <input type="email" name="email" placeholder="email" required="">
    </div>
		<div class="textbox">
			<i class="fas fa-user"></i>
			<input type="text" name="username" placeholder="username" required="">
		</div>
		<div class="textbox">
			<i class="fas fa-lock"></i>
			<input type="password" name="password" placeholder="password" required="">
		</div>
        <div class="textbox">
      <i class="fas fa-lock"></i>
      <input type="password" name="password2" placeholder="Konfirmasi Password" required="">
    </div>
		<!-- <input type="button" name="" class="btn btn-warning" value="Daftar"> --> 
    <button type="submit" name="register" class="btn btn-danger"> Register </button>
	</div>
</form>
</body>
</html>

