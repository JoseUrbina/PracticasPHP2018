<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php		
		// COmpartiendo los datos de la conexion, ubicando en otro archivo
		require "datos_conexion.php";

		// Conexion de la bd
		$conexion = mysqli_connect($db_host, $db_usuario, $db_pwd);

		// mysqli_real_escape_string() -> usado para evitar inyeccion sql, filtrado de valores en variables
		$usuario = mysqli_real_escape_string($conexion, $_POST["usuario"]);
		$contra = mysqli_real_escape_string($conexion, $_POST["contra"]);


		// SI la conexion ha fallado , entrar al if
		if(mysqli_connect_errno())
		{
			echo "Fallo al conectar con la bd";
			exit;
		}

		//Ṕermite establecer la bd a utilizar en caso de error se ocupa die para un mensaje
		mysqli_select_db($conexion, $db_nombre) or die("No se ha encontrado la BD");

		// Permite establecer el tipo de formato para los caracteres en este caso utf8
		// recibe 2 parametros: 1. Conecion 2.Tipo de formato
		mysqli_set_charset($conexion,"utf8");

		// Add this into contra field : ' or '1'='1   -> Delete all record

		$query = "DELETE FROM USUARIOS WHERE usuario = '{$usuario}' AND contra = '{$contra}'";
		echo "{$query}";

		$resultados = mysqli_query($conexion, $query);

		if($resultados)
		{
			if(mysqli_affected_rows($conexion) > 0)
				echo "Baja procesada";
		}

		// Cerrar la conexion de la BD
		mysqli_close($conexion);	
	?>
</body>
</html>