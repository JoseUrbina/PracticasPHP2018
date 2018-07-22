<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de estudiantes</title>
	<?php require "Operaciones.php"; ?>
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
				$resultados = ListarEstudiantes();
				$dir = dirname("{$_SERVER['PHP_SELF']}");

				while($fila = mysqli_fetch_array($resultados, MYSQLI_ASSOC))
				{
					echo "<tr>";
					echo "<td>{$fila['idEstudiante']}</td>";
					echo "<td>{$fila['Nombres']} {$fila['Apellidos']}</td>";
					echo "<td>{$fila['Edad']}</td>";
					echo "<td><a href=" . $dir . "/editar.php?id=" . $fila['idEstudiante'] . ">Editar</a>
						  <a href=" . $dir . "/eliminar.php?id=" . $fila['idEstudiante'] . ">Eliminar</a>
						  </td>";
					echo "</tr>";
				}
			?>
		</tbody>
	</table>
</body>
</html>