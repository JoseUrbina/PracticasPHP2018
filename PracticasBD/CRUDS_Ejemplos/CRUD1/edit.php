<?php
	require "bd_conexion.php";

	$conexion = mysqli_connect($db_host, $db_user, $db_pwd);

	if(mysqli_connect_errno())
	{
		echo "it had happened an error";
		exit();
	}

	mysqli_select_db($conexion, $db_name);
	mysqli_set_charset($conexion, "utf8");

	$id = mysqli_real_escape_string($conexion, $_POST['idEstudiante']);
	$nombres = mysqli_real_escape_string($conexion, $_POST['nombres']);
	$apellidos = mysqli_real_escape_string($conexion, $_POST['apellidos']);
	$edad = mysqli_real_escape_string($conexion, $_POST['edad']);
	$activo = mysqli_real_escape_string($conexion, (isset($_POST['activo'])?1:0));

	$sql = "UPDATE Estudiantes SET Nombres = '{$nombres}', 
			Apellidos = '{$apellidos}', Edad = {$edad}, Activo = {$activo} 
			WHERE idEstudiante = $id";

	$ok = mysqli_query($conexion, $sql);

	if($ok)
	{
		if(mysqli_affected_rows($conexion))
		{
			echo "Record updates properly";
		}
	}
	else
		echo "it had happened an error";

	mysqli_close($conexion);
?>