<?php
	require "bd_conexion.php";

	$conexion = new mysqli($db_host, $db_user, $db_pwd);

	if($conexion->errno)
	{
		echo "Ha ocurrido un error " . $conexion->error;
		exit();
	}

	$conexion->select_db($db_name) or die("BD no encontrada");
	$conexion->set_charset("utf8");

	$id = $conexion->real_escape_string($_GET['id']);

	$sql = "DELETE FROM Estudiantes WHERE idEstudiante = $id";

	$ok = $conexion->query($sql);

	if($ok)
	{
		if($conexion->affected_rows())
		{
			echo "Record deletes correctly";
		}
	}
	else
		echo "it had happened an error";

	$conexion->close();
?>