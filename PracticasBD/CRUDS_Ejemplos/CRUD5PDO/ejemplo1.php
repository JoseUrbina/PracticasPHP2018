<?php
	try
	{
		$Base = new PDO("mysql:host=localhost;dbname=Local","root",'');
		$Base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$Base->exec("SET CHARACTER SET utf8");

		$sql = "SELECT * FROM Producto";

		$resultado = $Base->prepare($sql);
		$ok = $resultado->execute();

		if($ok)
		{
			echo "Listado de Productos<br><br>";
			while($fila = $resultado->fetch(PDO::FETCH_ASSOC))
			{
				echo "ID: {$fila['idProducto']}<br>";
				echo "Producto: {$fila['Nombre']}<br>";
				echo "Precio: {$fila['Precio']}<br>";
				echo "Activo: " . ($fila['Activo'] == 1?"Si":"No");
				echo "<br><br>";
			}
		}

		$resultado->closeCursor();
	}catch(Exception $e)
	{
		die("Error: {$e->getMessage()}");
	}
	finally
	{
		$Base = null;
	}
?>