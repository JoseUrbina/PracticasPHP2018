<?php
	class database
	{
		public static function Conexion()
		{
			try
			{
				$conexion = new PDO("mysql:host=localhost;dbname=Pruebas","root","");
				$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$conexion->exec("SET CHARACTER SET utf8");

				return $conexion;
			}
			catch(Exception $e)
			{
				die("Error: {$e->getMessage()}");
			}
		}
	}
?>