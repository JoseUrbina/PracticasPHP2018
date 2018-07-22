<?php
	require "bd_conexion.php";

	$conexion = new mysqli($db_host, $db_user, $db_pwd);

	if($conexion->errno)
	{
		echo "Error: " . $conexion->error;
		exit();
	}

	$conexion->select_db($db_name) or die("BD is over");
	$conexion->set_charset("utf8");

	$id = $conexion->real_escape_string($_GET['id']);

	$sql = "DELETE FROM Estudiantes WHERE idEstudiante = ?";

	$resultado = $conexion->prepare($sql);

	$ok = $resultado->bind_param("i", $id);
	$ok = $resultado->execute();

	if($ok)
	{
		if($resultado->affected_rows)
		{
			echo "Record deteles correctly";
		}
	}
	else
		echo "it had happened an error";

	$resultado->close();
	$conexion->close();
?>