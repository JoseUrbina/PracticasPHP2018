<?php
	 require 'config.php';

	 class Conexion
	 {
	 	protected $conexionDB;

	 	public function Conexion()
	 	{
	 		try
	 		{
	 			$this->conexionDB = new PDO("mysql:host=". DB_HOST .";dbname=" . DB_NAME,DB_USER, DB_PWD);
	 			$this->conexionDB->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	 			$this->conexionDB->exec("SET CHARACTER SET " . DB_CHARSET);

	 			return $this->conexionDB;
	 		}
	 		catch(Exception $e)
	 		{
	 			echo "Error: {$e->getMessage()}";
	 			return;
	 		}
	 	}
	 }
?>