<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blog</title>
</head>
<body>
	<?php 
		include "../modelo/ManejoObjetos.php";

		try{
			$miconexion = new PDO("mysql:host=localhost;dbname=bbddbLog", "root", "");
			$miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$miconexion->exec("SET CHARACTER SET utf8");

			$manejoObjetos = new ManejoObjetos($miconexion);

			$tablaBlog = $manejoObjetos->getContenidoPorFecha();

			if(empty($tablaBlog))
			{
				echo "No hay entradas de blog";
			}
			else
			{
				foreach ($tablaBlog as $valor) {
					echo "<h3>{$valor->getTitulo()}</h3>";
					echo "<h4>{$valor->getFecha()}</h4>";
					echo "<div style='width:400px; word-wrap: break-word;'>{$valor->getComentario()}</div><br><br>";
					if($valor->getImagen() != '')
					{
						echo "<img src='../imagenes/" . $valor->getImagen() . "' width='300px'>";
					}
					echo "<hr/>";		
				}
			}
		}
		catch(Exception $e)
		{
			die("Error: {$e->getMessage()}");
		}
	?>


</body>
</html>