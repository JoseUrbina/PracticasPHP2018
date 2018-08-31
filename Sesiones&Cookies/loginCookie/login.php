<!DOCTYPE html>
<?php
	require "DDL_Users.php";

	$autenticado = false;

	if(isset($_POST['login']))
	{
		$user = htmlentities(addslashes($_POST['user']));
		$pwd = htmlentities(addslashes($_POST['pwd']));
		$verificar = htmlentities(addslashes((isset($_POST['verificar'])?1:0)));

		$users = new Users();

		$autenticado = $users->obtenerUsuario($user, $pwd, $verificar);
	}	
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<?php 
		if(!$autenticado)
		{
			if(!isset($_COOKIE['user']))
			{
				include 'formulario.html';
			}
		}

		if(isset($_COOKIE['user']))
		{
			echo "Welcome user - {$_COOKIE['user']}<br>";
			echo "<a href='destruirCookie.php'>Cerrar Sesion</a>";
		}
		else if($autenticado)
		{
			// si es la primera vez que se autentifica muestra este mensaje
			// porque apenas se creo la cookie no es posible obtener su valor inmediatamente
			echo "Welcome user - {$_POST['user']}<br>";
			echo "<a href='destruirCookie.php'>Cerrar Sesion</a>";
		}
	?>
</body>
</html>