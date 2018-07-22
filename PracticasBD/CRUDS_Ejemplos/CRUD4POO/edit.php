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

	$idproducto = $conexion->real_escape_string($_POST['idproducto']);
	$nombre = $conexion->real_escape_string($_POST['nombre']);
	$precio = $conexion->real_escape_string($_POST['precio']);
	$activo = $conexion->real_escape_string((isset($_POST['activo'])?1:0));

	$sql = "UPDATE Producto SET Nombre = ?, Precio = ?, Activo = ? WHERE idProducto = ?";

	$r = $conexion->prepare($sql);

	$ok = $r->bind_param('sdii', $nombre, $precio, $activo, $idproducto);
	$ok = $r->execute();

	if($ok)
	{
		if($r->affected_rows)
		{
			echo "Record edited properly";
		}
	}
	else
		echo "ERROR";

	$r->close();
	$conexion->close();
?>