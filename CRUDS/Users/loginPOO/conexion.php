<?php 
	require "config.php";

	class Conexion
	{
		protected $base;

		function __construct()
		{
			try
			{
				$this->base = new PDO("mysql:host=" . db_host . ";dbname=" . db_name,
									  db_user, db_pwd);
				$this->base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->base->exec("SET CHARACTER SET " . db_charset);
			}
			catch(Exception $e)
			{
				die("Error: {$e->getMessage()}");
			}
		}
	}
?>