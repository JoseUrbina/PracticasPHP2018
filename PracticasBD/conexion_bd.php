<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php	
		// COmpartiendo los datos de la conexion, ubicando en otro archivo
		require "datos_conexion.php";

		$NIF = '23453212E';

		// Conexion de la bd
		$conexion = mysqli_connect($db_host, $db_usuario, $db_pwd);

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

		$query = "SELECT * FROM DATOSPERSONALES WHERE NIF = '{$NIF}'";

		$resultados = mysqli_query($conexion, $query);

		// video 36: funcion para obtener un solo registro
		// $fila = mysqli_fetch_row($resultados);

		while ($fila = mysqli_fetch_array($resultados, MYSQL_ASSOC)) {
			echo "{$fila["NOMBRE"]} {$fila["APELLIDO"]} <br>";
		}	

		// Cerrar la conexion de la BD
		mysqli_close($conexion);	
	?>
</body>
</html>