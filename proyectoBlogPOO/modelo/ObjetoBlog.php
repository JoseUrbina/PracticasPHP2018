<?php 
	class ObjetoBlog
	{
		// Properties
		private $Id;
		private $Titulo;
		private $Fecha;
		private $Comentario;
		private $Imagen; 

		function __construct()
		{

		}

		// Setters and Getters method
		public function setId($id)
		{
			$this->Id = $id;
		}

		public function getId()
		{
			return $this->Id;
		}

		public function setTitulo($titulo)
		{
			$this->Titulo = $titulo;
		}

		public function getTitulo()
		{
			return $this->Titulo;
		}

		public function setFecha($fecha)
		{
			$this->Fecha = $fecha;
		}

		public function getFecha()
		{
			return $this->Fecha;
		}

		public function setComentario($comentario)
		{
			$this->Comentario = $comentario;
		}

		public function getComentario()
		{
			return $this->Comentario;
		}

		public function setImagen($imagen)
		{
			$this->Imagen = $imagen;
		}

		public function getImagen()
		{
			return $this->Imagen;
		}

	}
?>