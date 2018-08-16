<?php 
	require_once "model/config.php";

	class Database
	{
		public static function Conexion()
		{
			try
			{
				$con = new PDO("mysql:host=" . dbHost . ";dbname=" . dbName, dbUser, dbPwd);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$con->exec("SET CHARACTER SET " . dbCharset);
				return $con;
			}
			catch(Exception $e)
			{
				die("Error: {$e->getMessage()}");
			}
		}
	}
?>