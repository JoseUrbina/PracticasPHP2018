<?php
	if(isset($_COOKIE['Prueba']))
	{
		echo "Cookie: {$_COOKIE['Prueba']}";
	}
	else
	{
		echo "It hasn't create the cookie. Reload the page";
	}
?>