<!DOCTYPE html>
<?php
	require 'bd_conexion.php';

	$conexion = new mysqli($db_host, $db_user, $db_pwd);

	if($conexion->errno)
	{
		echo "Ha ocurrido un error: " . $conexion->error;
		exit();
	}

	$conexion->select_db($db_name) or die("BD no encontrada");
	$conexion->set_charset("utf8");

	$query = "SELECT * FROM Estudiantes";

	$resultados = $conexion->prepare($query);

	$ok = $resultados->execute();
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de estudiantes</title>
</head>
<body>
	<a href='<?php echo dirname("{$_SERVER['PHP_SELF']}") . "/nuevo.php"; ?>'>Nuevo</a><br><br>
	<table>
		<thead>
			<tr>
				<td>ID</td>
				<td>Nombre Completo</td>
				<td>Edad</td>
				<td>Opciones</td>
			</tr>
		</thead>
		<tbody>
			<?php
				if($ok)
				{
					$dir = dirname("{$_SERVER['PHP_SELF']}");

					$ok = $resultados->bind_result($idEstudiante, $nombres, $apellidos, $edad, $activo);

					while($resultados->fetch())
					{
						echo "<tr>";
						echo "<td>{$idEstudiante}</td>";
						echo "<td>{$nombres} {$apellidos}</td>";
						echo "<td>{$edad}</td>";
						echo "<td><a href=" . $dir . "/editar.php?id=" . $idEstudiante . ">Editar</a>
							  <a href=" . $dir . "/eliminar.php?id=" . $idEstudiante . ">Eliminar</a>
							  </td>";
						echo "</tr>";
					}
				}

				$resultados->close();
				$conexion->close();
			?>
		</tbody>
	</table>
</body>
</html>