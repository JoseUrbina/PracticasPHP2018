<?php
	$idioma = $_GET['idioma'];	

	setcookie('idioma_seleccionado', $idioma, time() + 86400);

	header("location:verCookie.php");
?>