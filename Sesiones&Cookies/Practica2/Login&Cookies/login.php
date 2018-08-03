<!DOCTYPE html>
<?php
	$autenticado = false;

	// VALIDAR SI HEMOS PULSADO EL BOTON DE ENVIAR
	if(isset($_POST["guardar"]))
	{
		try
		{
			$base = new PDO("mysql:host=localhost;dbname=Pruebas","root","");
			$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$base->exec("SET CHARACTER SET utf8");

			// htmlentities : convertir cualquier simbolo a html
			// addslashes: escapar cualquier caracter de este tipo (/,.....)

			$user = htmlentities(addslashes($_POST['user']));
			$password = htmlentities(addslashes($_POST['password']));
			$verificar = (isset($_POST['verificar'])?1:0);

			$sql = "SELECT * FROM USUARIOS_PASS WHERE USUARIOS = :user AND PASSWORD = :password";

			$resultados = $base->prepare($sql);

			$resultados->bindValue(':user', $user);
			$resultados->bindValue('password',$password);

			$ok = $resultados->execute();

			$numeroRegistros = $resultados->rowCount();

			if($numeroRegistros != 0)
			{
				$autenticado = true;

				if($verificar)
				{
					setcookie('user', $user, time() + 86400);
				}
				
			}
			else
			{
				header("location:login.php");
			}

			$resultados->closeCursor();

		}
		catch(Exception $e)
		{
			die("Error: {$e->getMessage()}");
		}
		finally
		{
			$base = null;
		}
	}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LOGIN</title>
</head>
<body>
	<?php
		if($autenticado == false)
		{
			if(!isset($_COOKIE['user']))
			{
				include "formulario.html";
			}
		}

		if(isset($_COOKIE['user']))
		{
			echo "Bienvenido {$_COOKIE['user']} a mi página web";
		}
		else if($autenticado)
		{
			echo "Bienvenido {$_POST['user']} a mi página web";
		}
	?>

	<h3>GALERIA DE IMAGENES</h3>

	<?php 
		if($autenticado || isset($_COOKIE['user']))
		{
			include "zona_registrados.html";
		}
	?>
</body>
</html>