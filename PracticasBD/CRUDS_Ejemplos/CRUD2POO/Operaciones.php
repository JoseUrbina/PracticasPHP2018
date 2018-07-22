<?php
	function ListarEstudiantes()
	{
		require "bd_conexion.php";

		$conexion = new mysqli($db_host, $db_user, $db_pwd);

		if($conexion->errno)
		{
			echo "it has happened an error: " . $conexion->error;
			exit();
		}

		$conexion->select_db($db_name) or die('it hadn\'t found the bd');
		$conexion->set_charset("utf8");

		$sql = "SELECT * FROM Estudiantes";

		$resultados = $conexion->query($sql);

		$conexion->close();

		return $resultados;
	}
?>