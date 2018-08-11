<?php 
	require "config.php";

	try
	{
		$base = new PDO("mysql:host=" . db_host . ";dbname=" . db_name, db_user, db_pwd);
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base->exec("SET CHARACTER SET " . db_charset);
	}
	catch(Exception $e)
	{
		die("Error: {$e->getMessage()}");
	}
?>