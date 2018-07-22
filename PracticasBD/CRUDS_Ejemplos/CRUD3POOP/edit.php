<?php
	require "bd_conexion.php";

	$conexion = new mysqli($db_host, $db_user, $db_pwd);

	if($conexion->errno)
	{
		echo "it had happened an error " . $conexion->error;
		exit();
	}

	$conexion->select_db($db_name) or die("BD not found");
	$conexion->set_charset("utf8");

	$id = $conexion->real_escape_string($_POST['idEstudiante']);
	$nombres = $conexion->real_escape_string($_POST['nombres']);
	$apellidos = $conexion->real_escape_string($_POST['apellidos']);
	$edad = $conexion->real_escape_string($_POST['edad']);
	$activo = $conexion->real_escape_string((isset($_POST['activo'])?1:0));

	$sql = "UPDATE Estudiantes SET Nombres = ?, 
			Apellidos = ?, Edad = ?, Activo = ? 
			WHERE idEstudiante = ?";

	$resultados = $conexion->prepare($sql);

	$ok = $resultados->bind_param("ssiii",$nombres, $apellidos, $edad, $activo, $id);

	$ok = $resultados->execute();

	if($ok)
	{
		if($resultados->affected_rows)
		{
			echo "Record updated properly";
		}
	}
	else
		echo "it had happened an error";

	$resultados->close();
	$conexion->close();
?>