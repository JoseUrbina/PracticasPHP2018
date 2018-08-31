<?php
	function ListarEstudiantes()
	{
		require "bd_conexion.php";

		$conexion = mysqli_connect($db_host, $db_user, $db_pwd);

		if(mysqli_connect_errno())
		{
			echo "it has happened an error";
			exit();
		}

		mysqli_select_db($conexion,$db_name) or die("it hasn't found db");
		mysqli_set_charset($conexion, "utf8");

		$sql = "SELECT * FROM Estudiantes";

		$resultados = mysqli_query($conexion, $sql);

		mysqli_close($conexion);

		return $resultados;
	}
?>