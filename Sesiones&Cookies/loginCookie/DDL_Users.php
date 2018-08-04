<?php 
	require "conexion.php";

	class Users extends Conexion
	{
		function __construct()
		{
			parent::__construct();
		}

		public function obtenerUsuario($user, $pwd, $verificacion)
		{
			$sql = "SELECT * FROM USUARIOS_PASS WHERE USUARIOS = :user AND PASSWORD = :pwd";

			$r = $this->conexion->prepare($sql);

			/* $r->bindValue(':user',$user);
			$r->bindValue(':pwd',$pwd);
			$ok = $r->execute(); */

			$ok = $r->execute(array(':user' => $user, ':pwd' => $pwd));

			$numRegistros = $r->rowCount();

			if($numRegistros != 0)
			{
				if($verificacion)
				{
					session_start();
					$_SESSION['user'] = $user;
					setcookie("user", $user, time() + 3600);
				}

				return true;
			}
			else
			{
				header("location:login.php");
			}

			$r->closeCursor();
		}
	}
?>