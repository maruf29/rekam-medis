<?php
//error_reporting(0);
include "koneksi.php";
session_start();

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';

require 'PHPMailer/src/PHPMailer.php';

require 'PHPMailer/src/SMTP.php';

if(isset($_POST["reset_pass"])){

    $emailTo = $_POST["email"]; //email kamu atau email penerima link reset
    $cek=mysqli_query($koneksi,"select * from tb_user where email='$emailTo'");
    if ($cek->num_rows >0) {
        # code...
  

    $code = uniqid(true); //Untuk kode atau parameter acak

    $query = mysqli_query($koneksi, "INSERT INTO tb_resetpass VALUES ('','$emailTo','$code')");

    //if(!$query){ exit("Error");}

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions

    

        //Server settings

       // $mail->SMTPDebug = 2;                                 // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP

        $mail->Host = 'smtp.gmail.com';                     // Specify main and backup SMTP servers

        $mail->SMTPAuth = true;                               // Enable SMTP authentication

        $mail->Username ="m795380@gmail.com";     // SMTP username

        $mail->Password ='sambong29';                         // SMTP password

        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted

        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients

        $mail->setFrom("m795380@gmail.com", "Rekam Medis Puskesmas"); //email pengirim

        $mail->addAddress($emailTo); // Email penerima

        // $mail->addReplyTo("no-reply@gmail.com");

        //Content

        $url = "http://" . $_SERVER["HTTP_HOST"] .dirname($_SERVER["PHP_SELF"]). "/passbaru.php?reset_pass=$code"; //sesuaikan berdasarkan link server dan nama file

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = "Link reset password";

        $mail->Body    = "<h1>Permintaan reset password</h1><p> Klik <a href='$url'>link ini</a> untuk mereset password</p>" ;

        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

$_SESSION['status'] = "Reset Password Berhasil dikirim diemail";

    $_SESSION['statuscode'] = "success";
    // echo "<script>window.location.href='login.php';</script>";
 header("location:login.php");
    exit();
     }else{
$_SESSION['status'] = "Email tidak terdaftar";

    $_SESSION['statuscode'] = "error";
    // echo "<script>window.location.href='login.php';</script>";
 header("location:resetpass.php");

     } 

}

       

?>