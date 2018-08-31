<?php
	
	try
	{
		$base = new PDO("mysql:host=localhost;dbname=Local","root","");
		echo "OK";
	}
	catch(Exception $e)
	{
		die("Error: {$e->getMessage()}");
	}
	finally
	{
		$base = null;
	}
?>