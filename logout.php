<?php
		session_start();
		$_SESSSION = [];
		session_unset();
		session_destroy();

		header("location:login.php");
?>