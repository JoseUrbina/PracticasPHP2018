<!DOCTYPE html>
<?php
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

			$sql = "SELECT * FROM USUARIOS_PASS WHERE USUARIOS = :user AND PASSWORD = :password";

			$resultados = $base->prepare($sql);

			$resultados->bindValue(':user', $user);
			$resultados->bindValue('password',$password);

			$ok = $resultados->execute();

			$numeroRegistros = $resultados->rowCount();

			if($numeroRegistros != 0)
			{
				session_start();
				$_SESSION['user'] = $user;
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
		if(!isset($_SESSION['user']))
		{
			include("formulario.html");
		}
		else
		{
			echo "Usuario: {$_SESSION['user']}";
		}
	?>

	<h3>GALERIA DE IMAGENES</h3>
</body>
</html>