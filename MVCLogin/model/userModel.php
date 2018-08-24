<?php
	require_once "model/database.php";

	class userModel
	{
		private $db;
		public $ID;
		public $USUARIOS;
		public $PASSWORD;

		function __construct()
		{
			try
			{
				$this->db = database::Conexion();
			}
			catch(Exception $e)
			{
				die("Error: {$e->getMessage()}");
			}
		}

		public function VerifyUser($user, $pwd, $remember)
		{
			$encontrado = false;

			try
			{
				$query = "SELECT * FROM USUARIOS_PASS WHERE USUARIOS = :user";

				$consulta = $this->db->prepare($query);
				$consulta->bindValue(":user", $user);
				$consulta->execute();
				$numRows = $consulta->rowCount();

				if($numRows > 0)
				{
					$users = $consulta->fetchAll(PDO::FETCH_OBJ);

					foreach ($users as $u) {
						if($u->PASSWORD == $pwd)
						{
							$encontrado = true;
							if($remember)
							{
								setcookie("user", $user, time() + 36000);
							}

							break;
						}
					}

					$consulta->closeCursor();
					return $encontrado;
				}
				else
				{
					return false;
				}
			}
			catch(Exception $e)
			{
				die("Error: {$e->getMessage()}");
			}
		}
	}
?>