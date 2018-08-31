<?php 
	require_once "database.php";

	class userModel
	{
		private $db;

		// Properties
		public $id;
		public $Nombre;
		public $Apellido;
		public $Direccion;

		function __construct()
		{
			// Setting up conection with the db
			$this->db = database::Conexion();
		}

		// Function: Getting the total of users into the table
		public function totalUsers()
		{
			try
			{
				$query = "SELECT * FROM datos_usuarios";
				$consulta = $this->db->prepare($query);
				$consulta->execute([]);

				// return amount of users
				return $consulta->rowCount();
			}
			catch(Exception $e)
			{
				die("Error: {$e->getMessage()}");
			}
		}

		// List of user
		// $inicio: first parameter LIMIT
		// $fin: second parameter LIMIT - Amount of record to get
		public function ListUsers($inicio, $fin)
		{
			try
			{
				$query = "SELECT * FROM datos_usuarios LIMIT :inicio,:fin";

				$consulta = $this->db->prepare($query);

				// ****************************************************************
				// With LIMIT is necesary to set up the type of data to send
				// bindValue : 3er parameter - Type of data
				 
				$consulta->bindValue(":inicio", $inicio, PDO::PARAM_INT);
				$consulta->bindValue(":fin", $fin, PDO::PARAM_INT);

				// ****************************************************************
				$consulta->execute();

				$usuarios = $consulta->fetchAll(PDO::FETCH_OBJ);

				return $usuarios;
			}
			catch(Exception $e)
			{
				die("Error : {$e->getMessage()}");
			}
		}

		// Function that get a determinated record about a user by id
		public function getUser($id)
		{
			try
			{
				$query = "SELECT * FROM datos_usuarios WHERE id = :id";

				$consulta = $this->db->prepare($query);
				//$consulta->bindValue(":id", $id);
				$consulta->execute(array(":id" => $id));

				// return a unique object or record
				return $consulta->fetch(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die("Error: {$e->getMessage()}");
			}
		}

		// Function that deletes a record by id
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

		// Function that saves or edits a record. it's up to object that sends like a parameter
		public function saveUser($user)
		{
			try
			{
				// id we will edit a record, use this query
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

				// if we will edit a determinated record, we execute this code line
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