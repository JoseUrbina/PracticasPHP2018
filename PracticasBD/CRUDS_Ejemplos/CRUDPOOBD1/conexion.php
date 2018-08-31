<?php
	require "config.php";

	/**
	* 
	*/
	class Conexion
	{
		protected $conexionDB;
		
		public function Conexion()
		{
			// Inicializando la conexion
			$this->conexionDB = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME);

			if($this->conexionDB->errno)
			{
				echo "Fallo al conectar mysql : {$this->conexionDB->error}";

				return;
			}

			$this->conexionDB->set_charset(DB_CHARSET);
		}


	}
?>