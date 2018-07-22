<?php
	require "bd_conexion.php";

	$conexion = mysqli_connect($db_host, $db_user, $db_pwd);

	if(mysqli_connect_errno())
	{
		echo "Ha ocurrido un error";
		exit();
	}

	mysqli_select_db($conexion, $db_name) or die("No se ha encontrado la bd");
	mysqli_set_charset($conexion, "utf8");

	$nombres = mysqli_real_escape_string($conexion, $_POST['nombres']);
	$apellidos = mysqli_real_escape_string($conexion, $_POST['apellidos']);
	$edad = mysqli_real_escape_string($conexion, $_POST['edad']);
	$activo = mysqli_real_escape_string($conexion, (isset($_POST['activo'])?1:0));

	$sql = "INSERT INTO Estudiantes(Nombres, Apellidos, Edad, Activo)
			VALUES ('{$nombres}', '{$apellidos}', {$edad}, {$activo})";

	$ok = mysqli_query($conexion, $sql);

	if($ok)
	{
		echo "Record saved correctly";
	}
	else
	{
		echo "it has happened an error";
	}

	mysqli_close($conexion);
?>