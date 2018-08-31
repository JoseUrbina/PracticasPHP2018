<?php
	require "model/config.php";

	class database
	{
		public static function Conexion()
		{
			try
			{
				$con = new PDO("mysql:host=" . dbHost .";dbname=" . dbName, dbUser, dbPwd);
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