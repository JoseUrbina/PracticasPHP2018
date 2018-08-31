<?php 
	require "config.php";

	class Conexion
	{	
		protected $conexion;

		public function __construct()
		{
			try
			{
				$this->conexion = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, 
										 DB_USER, DB_PWD);

				$this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->conexion->exec("SET CHARACTER SET " . DB_CHARSET);
			}
			catch(Exception $e)
			{
				echo "Error: {$e->getMessage()}";
			}
		}
	}
?>