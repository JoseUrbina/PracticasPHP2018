<?php
	require "bd_conexion.php";

	$conexion = new mysqli($db_host, $db_user, $db_pwd);

	if($conexion->errno)
	{
		echo "Ha ocurrido un error " . $conexion->error;
		exit();
	}

	$conexion->select_db($db_name) or die ('it hadn\'t found the db');
	$conexion->set_charset('utf8');

	$nombres = $conexion->real_escape_string($_POST['nombres']);
	$apellidos = $conexion->real_escape_string($_POST['apellidos']);
	$edad = $conexion->real_escape_string($_POST['edad']);
	$activo = $conexion->real_escape_string((isset($_POST['activo'])?1:0));

	$sql = "INSERT INTO Estudiantes(Nombres, Apellidos, Edad, Activo)
			VALUES ('{$nombres}', '{$apellidos}', {$edad}, {$activo})";

	$ok = $conexion->query($sql);

	if($ok)
	{
		echo "Record saved correctly";
	}
	else
	{
		echo "it has happened an error";
	}

	$conexion->close();
?>