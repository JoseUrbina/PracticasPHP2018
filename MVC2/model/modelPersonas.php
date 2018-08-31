<?php 
	class modelPersonas
	{
		// Variable for saving the conexion with database
		private $db;
		private $personas;

		public function __construct()
		{
			require_once "model/Conexion.php";
			$this->db = Conectar::Conexion();
			// array for returning the values
			$this->personas = array();
		}

		public function getPersonas()
		{
			require("paginacion.php");

			$consulta = $this->db->query("SELECT * FROM datos_usuarios LIMIT $empezar_desde, 
				$tamanoPagina");
			$this->personas = $consulta->fetchAll(PDO::FETCH_ASSOC);
			//
			//Recorrer el array retornado del query
			/* while($fila = $consulta->fetch(PDO::FETCH_ASSOC))
			{
				// Storing each record into $productos : it is an arrray
				$this->productos[] = $fila;
			}*/

			return $this->personas;
		}
	}
?>