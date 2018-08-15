<?php 
	require_once "database.php";

	class userModel
	{
		private $db;

		public $id;
		public $Nombre;
		public $Apellido;
		public $Direccion;

		function __construct()
		{
			// Setting up conection with the db
			$this->db = database::Conexion();
		}

		public function ListUsers()
		{
			try
			{
				$query = "SELECT * FROM datos_usuarios";

				$consulta = $this->db->prepare($query);
				$consulta->execute([]);

				$usuarios = $consulta->fetchAll(PDO::FETCH_OBJ);

				return $usuarios;
			}
			catch(Exception $e)
			{
				die("Error : {$e->getMessage()}");
			}
		}

		public function getUser($id)
		{
			try
			{
				$query = "SELECT * FROM datos_usuarios WHERE id = :id";

				$consulta = $this->db->prepare($query);
				//$consulta->bindValue(":id", $id);
				$consulta->execute(array(":id" => $id));

				return $consulta->fetch(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die("Error: {$e->getMessage()}");
			}
		}

		public function deleteUser($id)
		{
			try
			{
				$query = "DELETE FROM datos_usuarios WHERE id = :id";

				$consulta = $this->db->prepare($query);
				$consulta->bindValue(":id", $id);
				$ok = $consulta->execute();

				if($ok)
				{
					if($consulta->rowCount())
					{
						return true;
					}
				}
			}
			catch(Exception $e)
			{
				die("Error: {$e->getMessage()}");
			}

			return false;
		}

		public function saveUser($user)
		{
			try
			{
				if($user->id > 0)
				{
					$query = "UPDATE datos_usuarios SET Nombre = :nombre, Apellido = :apellido,
							 Direccion = :direccion WHERE id = :id";
				}
				else
				{
					$query = "INSERT INTO datos_usuarios(Nombre, Apellido, Direccion)
							 VALUES(:nombre, :apellido, :direccion)";
				}

				$consulta = $this->db->prepare($query);

				if($user->id > 0) { $consulta->bindValue(":id",$user->id);}

				$consulta->bindValue(":nombre", $user->Nombre);
				$consulta->bindValue(":apellido", $user->Apellido);
				$consulta->bindValue(":direccion", $user->Direccion);

				return $consulta->execute();
			}
			catch(Exception $e)
			{
				die("Error: {$e->getMessage()}");
			}
		}
	}
?>