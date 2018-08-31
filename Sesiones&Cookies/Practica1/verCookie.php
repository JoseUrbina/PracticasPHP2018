<?php 
	if(!isset($_COOKIE['idioma_seleccionado']))
	{
		header("location:pag1.php");
	}
	else
	{
		if($_COOKIE['idioma_seleccionado'] == "es")
		{
			header('location:spanish.php');
		}
		else
		{
			header("location:english.php");
		}
	}
?>