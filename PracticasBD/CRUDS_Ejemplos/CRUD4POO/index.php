<!DOCTYPE html>
<?php
	require "db_conexion.php";

	$conexion = new mysqli($db_host, $db_user, $db_pwd);

	if($conexion->errno)
	{
		echo "Error: " . $conexion->error;
		exit();
	}

	$conexion->select_db($db_name) or die("BD no encontrada");
	$conexion->set_charset("utf8");

	$sql = "SELECT * FROM Producto";

	$resultado = $conexion->prepare($sql);

	$ok = $resultado->execute();

	if($ok)
	{
		$ok = $resultado->bind_result($idProducto, $Nombre, $Precio, $Activo);
	}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de productos</title>
</head>
<body>
	<a href="<?php echo dirname($_SERVER['PHP_SELF']) . "/nuevo.php";?>">Nuevo</a><br><br>

	<table>
		<thead>
			<tr>
				<td>ID</td>
				<td>Producto</td>
				<td>Precio</td>
				<td>Activo</td>
				<td>Opciones</td>
			</tr>
		</thead>
		<tbody>
			<?php
				$dir = dirname($_SERVER['PHP_SELF']);

				while($resultado->fetch())
				{
					echo "<tr>";
					echo "<td>{$idProducto}</td>";
					echo "<td>{$Nombre}</td>";
					echo "<td>{$Precio}</td>";
					echo "<td>" . (($Activo == 1)?"Si":"No") .  "</td>";
					echo "<td><a href=" . $dir . "/editar.php?id=" . $idProducto . ">Editar</a>
					      <a href=" . $dir ."/eliminar.php?id=" . $idProducto .">Eliminar</a><td>";
					echo "</tr>";
				}

				$resultado->close();
				$conexion->close();
			?>
		</tbody>
	</table>
</body>
</html>