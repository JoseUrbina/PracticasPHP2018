<?php
	require_once "config.php";

	class Conexion
	{
		public static function conectar()
		{
			try
			{
				$con = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, 
							   DB_USER, DB_PWD);

				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$con->exec("SET CHARACTER SET " . CHARSET);

				return $con;
			}
			catch(Exception $e)
			{
				die("Error: {$e->getMessage()}");
			}
		}
	}
?>