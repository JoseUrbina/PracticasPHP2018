<?php
	require 'db_conexion.php';

	$conexion = new mysqli($db_host, $db_user, $db_pwd);

	if($conexion->errno)
	{
		echo "Error: " . $conexion->error;
		exit();
	}

	$conexion->select_db($db_name) or die("BD NOT FOUND");
	$conexion->set_charset("utf8");

	$nombre = $conexion->real_escape_string($_POST['nombre']);
	$precio = $conexion->real_escape_string($_POST['precio']);
	$activo = $conexion->real_escape_string((isset($_POST['activo'])?1:0));

	$sql = "INSERT INTO Producto(Nombre, Precio, Activo) VALUES(?,?,?)";

	$resultado = $conexion->prepare($sql);

	$ok = $resultado->bind_param("sdi", $nombre, $precio, $activo);

	$ok = $resultado->execute();

	if($ok)
		echo "Record saved correctly";
	else
		echo "Error";

	$resultado->close();
	$conexion->close();
?>