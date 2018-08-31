<?php 	
	class modelUser
	{
		private $db;
		private $users;

		public function __construct()
		{
			require_once "model/conectar.php";
			$this->db = Conectar::Conexion();
			$this->users = array();
		}

		public function getUsers()
		{
			$query = $this->db->query("SELECT ID, USUARIOS FROM USUARIOS_PASS");
			$this->users = $query->fetchAll(PDO::FETCH_ASSOC);
			return $this->users;
		}
	}
?>