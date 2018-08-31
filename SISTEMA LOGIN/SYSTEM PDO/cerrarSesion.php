<?php
	session_start();
	
	session_destroy();

	echo "<script>alert('Se ha cerrado sessión correctamente');</script>";
	header("location:login.php");
?>