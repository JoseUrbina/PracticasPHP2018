<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php

		try{
			// los parametros pueden ir con "" ''
			$base = new PDO('mysql:host=localhost;dbname=Pruebas','root','');
			echo "Conexion OK";
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