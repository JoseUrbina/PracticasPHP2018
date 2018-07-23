<?php
	try
	{
		$base = new PDO('mysql:host=localhost;dbname=Pruebas','root','');
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base->exec("SET CHARACTER SET utf8");

		$codigo = $_POST['codigo'];

		$sql = "DELETE FROM PRODUCTO WHERE CODARTICULO = :codigo";

		$resultado = $base->prepare($sql);

		$ok = $resultado->execute(array(':codigo' => $codigo));

		if($ok)
		{
			echo "Record deleted correctly";
		}
		else
			echo "ERROR";

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