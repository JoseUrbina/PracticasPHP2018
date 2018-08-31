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

	<h1>Página 2 - Usuario <?php echo $_SESSION['user'];?></h1>

	<p>Esto es información solo para usuarios registrados</p>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam perferendis alias voluptatibus vel officia! Laboriosam vel itaque eaque adipisci fugit, autem amet. Aspernatur deleniti similique autem nisi temporibus accusamus quae.</p>

	<p><a href="usuarios_registrados1.php">Volver</a></p>
	<a href="cerrarSesion.php">Cerrar Sesion</a>
</body>
</html>