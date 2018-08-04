<?php
	try
	{
		$base = new PDO("mysql:host=localhost;dbname=Pruebas","root","");
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base->exec("SET CHARACTER SET utf8");

		$user = htmlentities(addslashes($_POST['user']));
		$pwd = htmlentities(addslashes($_POST['pwd']));

		$sql = "SELECT * FROM USUARIOS_PASS WHERE USUARIOS = :user";
		$r = $base->prepare($sql);

		$ok = $r->execute(array(':user'=> $user));

		if($ok)
		{
			$encontrado = false;

			while($registro = $r->fetch(PDO::FETCH_ASSOC))
			{
				if(password_verify($pwd, $registro['PASSWORD']))
				{
					echo "Usuario logeado exitosamente";
					exit;
				}
				//echo "Usuario: {$registro['USUARIOS']} - Password: {$registro['PASSWORD']}<br>";
			}

			header("location:login.php");
		}

		$r->closeCursor();

	}catch(Exception $e)
	{
		echo "Error: {$e->getMessage()}";
	}
	finally
	{
		$base = null;
	}
?>