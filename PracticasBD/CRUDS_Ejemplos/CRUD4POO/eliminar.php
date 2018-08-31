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

	$idproducto = $conexion->real_escape_string($_GET['id']);

	$sql = "DELETE FROM Producto WHERE idProducto = ?";

	$r = $conexion->prepare($sql);
	$ok = $r->bind_param("i",$idproducto);
	$ok = $r->execute();

	if($ok)
	{
		if($r->affected_rows)
			echo "Record deleted correctly";
	}
	else
		echo "Error";

	$r->close();
	$conexion->close();
?>