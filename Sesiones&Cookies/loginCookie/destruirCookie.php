<?php
	session_start();
	setcookie("user", "", time() - 1);
	session_destroy();
	header('location:login.php');
?>