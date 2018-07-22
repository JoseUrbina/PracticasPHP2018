<?php
	require "bd_conexion.php";

	$conexion = mysqli_connect($db_host, $db_user, $db_pwd);

	if(mysqli_connect_errno())
	{
		echo "Ha ocurrido un error";
		exit();
	}

	mysqli_select_db($conexion, $db_name) or die("Bd no encontrada");
	mysqli_set_charset($conexion,"utf8");

	$id = mysqli_real_escape_string($conexion, $_GET['id']);

	$sql = "DELETE FROM Estudiantes WHERE idEstudiante = $id";

	$ok = mysqli_query($conexion, $sql);

	if($ok)
	{
		if(mysqli_affected_rows($conexion))
		{
			echo "Record deletes correctly";
		}
	}
	else
		echo "it had happened an error";

	mysqli_close($conexion);
?>