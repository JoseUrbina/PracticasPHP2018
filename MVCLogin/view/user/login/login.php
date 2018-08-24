<?php 
	require_once("view/header.php");

	if(!$encontrado)
	{
		if(!isset($_COOKIE['user']))
		{
			include "view/user/login/form.html"; 
		}
	}	
	else
	{
		echo "Usuario: {$user}";
		include "view/user/login/zoneVIP.php";
	}

	if(isset($_COOKIE['user']))
	{
		echo "Usuario: {$_COOKIE['user']}";
		include "view/user/login/zoneVIP.php";
	}

	require_once("view/footer.php"); 
?>