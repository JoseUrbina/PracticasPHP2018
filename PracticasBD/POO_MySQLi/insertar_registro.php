<?php
	$conexion = new mysqli("localhost","root","");

	if($conexion->connect_errno)
	{
		echo "Error al conectar con el servidor";
		exit();
	}

	$conexion->select_db("Pruebas")or die("BD HASN'T FOUND");
	$conexion->set_charset("utf8");

	$codArticulo = $conexion->real_escape_string($_POST["CODARTICULO"]);
	$seccion = $conexion->real_escape_string($_POST["SECCION"]);
	$nombreArticulo = $conexion->real_escape_string($_POST["NOMBREARTICULO"]);

	$query = "INSERT INTO PRODUCTO VALUES(?,?,?)";

	$resultado = $conexion->prepare($query);

	$ok = $resultado->bind_param('sss', $codArticulo, $seccion, $nombreArticulo);

	$ok = $resultado->execute();

	if($ok == false)
	{
		echo "Ha ocurrido un error";
	}
	else
	{
		echo "Record saved correctly {$resultado->affected_rows}";
		//close stmt
		$resultado->close();
	}

	// Close conection
	$conexion->close();
?>