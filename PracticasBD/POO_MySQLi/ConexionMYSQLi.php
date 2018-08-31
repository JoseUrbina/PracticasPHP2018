<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?
		$conexion = new mysqli("localhost","root","");

		if($conexion->connect_errno)
		{
			echo "Falló la conexión " . $conexión->connect_errno;
		}

		$conexion->select_db("Pruebas") or die("No se ha encontrado la bd");
		$conexion->set_charset("utf8");

		$sql = "SELECT * FROM PRODUCTO";

		$resultado = $conexion->query($sql);

		/* if($conexion->errno)
		{
			die($conexion->error);
		} */

		while($fila = $resultado->fetch_array(MYSQLI_ASSOC))
		{
			echo "Código: {$fila['CODARTICULO']}<br>";
			echo "Sección: {$fila['SECCION']}<br>";
			echo "Nombre del articulo: {$fila['NOMBREARTICULO']}<br><br>";
		}

		$conexion->close();
	?>
</body>
</html>