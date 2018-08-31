<!DOCTYPE html>
<?php
	try
	{
		$base = new PDO('mysql:host=localhost;dbname=Colegio','root','');

		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base->exec("SET CHARACTER SET utf8");

		$sql = "SELECT * FROM Estudiantes";

		$resultados = $base->prepare($sql);

		$ok = $resultados->execute();

		//$resultados->closeCursor();
	}
	catch(Exception $e)
	{
		die("Error: {$e->getMessage()}");
	}
	finally{ $base = null;}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de estudiantes</title>
</head>
<body>
	<a href="<?php echo dirname($_SERVER['PHP_SELF']) . '/nuevo.php';?>">Nuevo</a>
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
					while($fila = $resultados->fetch(PDO::FETCH_ASSOC))
					{
						echo "<tr>";
						echo "<td>{$fila['idEstudiante']}</td>";
						echo "<td>{$fila['Nombres']} {$fila['Apellidos']}</td>";
						echo "<td>{$fila['Edad']}</td>";
						echo "<td>
								<a href=" . dirname($_SERVER['PHP_SELF']) . "/editar.php?id=" 
								. $fila['idEstudiante'] . ">Editar</a> 
								<a href=". dirname($_SERVER['PHP_SELF']) ."/eliminar.php?id="
								. $fila['idEstudiante'] .">Eliminar</a></td>";
						echo "</tr>";
					}
				}

				$resultados->closeCursor();
			?>
		</tbody>
	</table>
</body>
</html>