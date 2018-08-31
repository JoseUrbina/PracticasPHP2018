<?php 
	require "ObjetoBlog.php";

	class ManejoObjetos
	{
		private $conexion;

		public function __construct($Conexion)
		{
			$this->setConexion($Conexion);
		}

		public function setConexion(PDO $Conexion)
		{
			$this->conexion = $Conexion;
		}

		public function getContenidoPorFecha()
		{
			$matriz = array();
			$contador = 0;

			$resultado = $this->conexion->query("SELECT * FROM contenido ORDER BY Fecha DESC");

			while($registro = $resultado->fetch(PDO::FETCH_ASSOC))
			{
				$objeto = new ObjetoBlog();

				$objeto->setId($registro['Id']);
				$objeto->setTitulo($registro['Titulo']);
				$objeto->setFecha($registro['Fecha']);
				$objeto->setComentario($registro['Comentario']);
				$objeto->setImagen($registro['Imagen']);

				$matriz[$contador] = $objeto;
				$contador++;
			}

			return $matriz;	
		}

		public function insertarContenido(ObjetoBlog $blog)
		{
			$sql = "INSERT INTO contenido(Titulo, Fecha, Comentario, Imagen)
					VALUES('" . $blog->getTitulo() . "','" . $blog->getFecha() . "','" 
						   . $blog->getComentario() . "','" . $blog->getImagen() . "')";

			$this->conexion->exec($sql);
		}

	}
?>