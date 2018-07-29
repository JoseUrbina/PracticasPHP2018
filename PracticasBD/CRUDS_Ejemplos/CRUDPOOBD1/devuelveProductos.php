<?php 
	require "conexion.php";

	
	class DevuelveProductos extends Conexion
	{
		
		/* function __construct(argument)
		{
			# code...
		} */

		public function DevuelveProductos()
		{
			parent::__construct();
		}

		public function getProductos($dato)
		{
			$resultado = $this->conexionDB->query("SELECT * FROM PRODUCTO WHERE SECCION = '{$dato}'");

			$productos = $resultado->fetch_all(MYSQLI_ASSOC);

			return $productos;
		}
	}
?>