<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php

		$seccion = $_POST["buscar"];

		try{
			// los parametros pueden ir con "" ''
			$base = new PDO('mysql:host=localhost;dbname=Pruebas','root','');
			$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Specifying the type of character
			$base->exec("SET CHARACTER SET utf8");

			$sql = "SELECT * FROM PRODUCTO WHERE SECCION = ?";

			$resultado =  $base->prepare($sql);

			$ok = $resultado->execute(array($seccion));

			while($registro = $resultado->fetch(PDO::FETCH_ASSOC))
			{
				echo "Codigo: {$registro['CODARTICULO']}<br>";
				echo "Sección: {$registro['SECCION']}<br>";
				echo "Articulo: {$registro['NOMBREARTICULO']}";
			}

			// CIerra el statement
			$resultado->closeCursor();
		}
		catch(Exception $e)
		{
			// Obtener el mensaje del error
			die("Error: {$e->getMessage()}");
		}
		finally{
			$base = null;
		}
	?>
</body>
</html>