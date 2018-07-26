<?php
	try
	{
		$base =  new PDO('mysql:host=localhost;dbname=Colegio','root','');
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base->exec('SET CHARACTER SET utf8');

		$id = $_GET['id'];
		$sql = "DELETE FROM Estudiantes WHERE idEstudiante = :id";

		$resultado = $base->prepare($sql);
		$ok = $resultado->execute(array(':id' => $id));

		if($ok)
		{
			if($resultado->rowCount())
			{
				echo "Record deleted properly";
			}
		}

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