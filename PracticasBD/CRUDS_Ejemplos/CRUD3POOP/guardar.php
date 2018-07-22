<?php
	require 'bd_conexion.php';

	$conexion = new mysqli($db_host, $db_user, $db_pwd);

	if($conexion->errno)
	{
		echo "It had happened an error";
		exit();
	}

	$conexion->select_db($db_name) or die("BD no encontrada");
	$conexion->set_charset("utf8");

	$nombres = mysqli_real_escape_string($conexion, $_POST['nombres']);
	$apellidos = mysqli_real_escape_string($conexion, $_POST['apellidos']);
	$edad = mysqli_real_escape_string($conexion, $_POST['edad']);
	$activo = mysqli_real_escape_string($conexion, (isset($_POST['activo'])?1:0));

	$sql = "INSERT INTO Estudiantes(Nombres, Apellidos, Edad, Activo)
			VALUES (?, ?, ?, ?)";

	$resultados = $conexion->prepare($sql);

	$ok = $resultados->bind_param('ssii', $nombres, $apellidos, $edad, $activo);

	$ok = $resultados->execute();

	if($ok)
	{
		echo "Record saved correctly";
	}
	else
		echo "it had happenend an error";

	$resultados->close();
	$conexion->close();
?>