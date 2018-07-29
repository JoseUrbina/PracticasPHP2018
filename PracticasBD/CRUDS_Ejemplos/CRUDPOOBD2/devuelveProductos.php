<?php 
	require 'conexion.php';

	/**
	* 
	*/
	class DevuelveProductos extends Conexion
	{
		public function DevuelveProductos()
		{
			parent::__construct();
		}
		
		public function getProductos($dato)
		{
			$sql = "SELECT * FROM PRODUCTO WHERE SECCION = :seccion";

			$resultados = $this->conexionDB->prepare($sql);

			$ok = $resultados->execute(array(':seccion' => $dato));

			$productos = $resultados->fetchAll(PDO::FETCH_ASSOC);

			$resultados->closeCursor();

			return $productos;

			$this->conexionDB = null;
		}
	}
?>