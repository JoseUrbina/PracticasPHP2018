<?php
	try
	{
		$base = new PDO("mysql:host=localhost;dbname=Colegio",'root','');
		$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$base->exec("SET CHARACTER SET utf8");

		$id = $_POST['idEstudiante'];
		$nombres =  $_POST['nombres'];
		$apellidos = $_POST['apellidos'];
		$edad = $_POST['edad'];
		$activo = (isset($_POST['activo'])?1:0);

		$sql = "UPDATE Estudiantes SET Nombres = :nombres,
				Apellidos = :apellidos, Edad = :edad, Activo = :activo
				WHERE idEstudiante = :id";

		$resultado = $base->prepare($sql);

		$ok = $resultado->execute(array(':nombres' => $nombres, ':apellidos' => $apellidos, 
										 ':edad' => $edad, ':activo' => $activo, ':id' => $id));

		if($ok)
		{
			if($resultado->rowCount())
			{
				echo "Record updated correctly";
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