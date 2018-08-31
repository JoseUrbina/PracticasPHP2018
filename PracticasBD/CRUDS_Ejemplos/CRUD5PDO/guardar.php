<?php
	try
	{
		$base = new PDO('mysql:host=localhost;dbname=Pruebas','root','');
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base->exec("SET CHARACTER SET utf8");

		$sql = "INSERT INTO PRODUCTO VALUES(:codigo, :seccion, :nombre)";

		$codigo = $_POST['CODARTICULO'];
		$seccion = $_POST['SECCION'];
		$nombre = $_POST['NOMBREARTICULO'];

		$resultado = $base->prepare($sql);

		$ok = $resultado->execute(array(':codigo' => $codigo,':seccion' => $seccion,':nombre' => $nombre));

		if($ok)
		{
			echo "Record saved porperly";
		}
		else
			echo "Error";

		$resultado->closeCursor();

	}
	catch(Exception $e)
	{
		die("Error: {$e->getMessage()}");
	}
	finally
	{
		$base = null;
	}
?>