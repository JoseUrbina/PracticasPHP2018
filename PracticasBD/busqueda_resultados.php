<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Searching complete</title>
	<?php	
		function ejecuta_consulta($labusqueda)
		{
			// Compartiendo los datos de la conexion, ubicando en otro archivo
			require "datos_conexion.php";

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

			$query = "SELECT * FROM PRODUCTO WHERE NOMBREARTICULO LIKE '%{$labusqueda}%'";

			$resultados = mysqli_query($conexion, $query);

			// video 36: funcion para obtener un solo registro
			// $fila = mysqli_fetch_row($resultados);

			while ($fila = mysqli_fetch_array($resultados, MYSQLI_ASSOC)) {
				echo "<table><tr><td>";
				echo "{$fila["CODARTICULO"]}</td><td>";
				echo "{$fila["SECCION"]}</td><td>";
				echo "{$fila["NOMBREARTICULO"]}</td></tr></table>";
			}	

			// Cerrar la conexion de la BD
			mysqli_close($conexion);	
		}		
	?>
</head>
<body>
	<?php
		// Tira un error pero es en local, en el servidor funciona correctamente
		$mibusqueda = $_GET["buscar"];

		$mipag = $_SERVER["PHP_SELF"];

		if($mibusqueda != null)
		{
			ejecuta_consulta($mibusqueda);
		}
		else
		{
			echo "<form action='{$mipag}' method='get'>
				 <label>Buscar: <input type='text' name='buscar'></label>
				 <input type='submit' value='Enviar' name='Enviando'></form>";
		}
	?>
</body>
</html>