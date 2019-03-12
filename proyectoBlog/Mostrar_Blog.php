<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<h2>Blog</h2>
	<hr>

	<?php 
		$miconexion = mysqli_connect("localhost", "root", "", "bbddbLog");

		// Check conexion
		if(!$miconexion)
		{
			echo "Error with the conexion: " . mysqli_error();
			exit();
		}

		$miconsulta = "SELECT * FROM contenido ORDER BY Fecha DESC";

		if($resultado = mysqli_query($miconexion, $miconsulta))
		{
			while($registro = mysqli_fetch_assoc($resultado))
			{
				echo "<h3>{$registro['Titulo']}</h3>";
				echo "<h4>{$registro['Fecha']}</h4>";
				echo "<div style='width:400px; word-wrap: break-word;'>{$registro['Comentario']}</div><br><br>";
				if($registro['Imagen'] != '')
				{
					echo "<img src='imagenes/" . $registro['Imagen'] . "' width='300px'>";
				}
				echo "<hr/>";				
			}
		}
	?>
</body>
</html>