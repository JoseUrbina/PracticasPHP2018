<?php 
	class modelProductos
	{
		// Variable for saving the conexion with database
		private $db;
		private $productos;

		public function __construct()
		{
			require_once "model/Conexion.php";
			$this->db = Conectar::Conexion();
			// array for returning the values
			$this->productos = array();
		}

		public function getProductos()
		{
			$consulta = $this->db->query("SELECT * FROM PRODUCTO");
			$this->productos = $consulta->fetchAll(PDO::FETCH_ASSOC);
			//
			//Recorrer el array retornado del query
			/* while($fila = $consulta->fetch(PDO::FETCH_ASSOC))
			{
				// Storing each record into $productos : it is an arrray
				$this->productos[] = $fila;
			}*/

			return $this->productos;
		}
	}
?>