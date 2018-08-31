<?php
	require "conexion.php";

	class User extends Conexion
	{
		function __construct()
		{
			parent::__construct();
		}

		public function loginUser($user, $pwd, $verify)
		{
			$encontrado = false;
			$sql = "SELECT * FROM USUARIOS_PASS WHERE USUARIOS = :user";
			$r = $this->base->prepare($sql);
			$ok = $r->execute(array(':user' => $user));

			if($ok)
			{
				$numRows = $r->rowCount();
				
				if($numRows != 0)
				{
					while ($users = $r->fetch(PDO::FETCH_OBJ)) {
						if(password_verify($pwd, $users->PASSWORD))
						{	
							if($verify)
							{
								setcookie("user", $user, time() + 84600);
							}

							$encontrado = true;
							break;
						}
					}
				}
			}

			$r->closeCursor();
			return $encontrado;
		}
	}
?>