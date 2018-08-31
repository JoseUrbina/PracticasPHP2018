<?php 
	try
	{
		$base = new PDO("mysql:host=localhost;dbname=Colegio",'root','');
		$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$base->exec("SET CHARACTER SET utf8");

		$nombres = $_POST['nombres'];
		$apellidos = $_POST['apellidos'];
		$edad = $_POST['edad'];
		$activo = (isset($_POST['activo'])?1:0);

		$sql = "INSERT INTO Estudiantes(Nombres, Apellidos, Edad, Activo)
				VALUES(:nombres, :apellidos, :edad, :activo)";

		$resultado = $base->prepare($sql);
		$ok = $resultado->execute(array(':nombres' => $nombres, ':apellidos' => $apellidos
										, ':edad' => $edad, ':activo' => $activo));

		if($ok)
		{
			echo "Record saved properly";
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