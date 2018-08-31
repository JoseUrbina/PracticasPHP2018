<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Usuarios registrados</title>
</head>
<body>
	<?php
		session_start();

		if(!isset($_SESSION['user']))
		{
			header("location:login.php");
		}
	?>

	<h1>Bienvenido usuario <?php echo $_SESSION['user'];?></h1>

	<p><a href="usuarios_registrados2.php">Página 2</a> <a href="usuarios_registrados3.php">Página 3</a> <a href="usuarios_registrados4.php">Página 4</a></p>

	<p>Esto es información solo para usuarios registrados</p>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam perferendis alias voluptatibus vel officia! Laboriosam vel itaque eaque adipisci fugit, autem amet. Aspernatur deleniti similique autem nisi temporibus accusamus quae.</p>

	<a href="cerrarSesion.php">Cerrar Sesion</a>

</body>
</html>