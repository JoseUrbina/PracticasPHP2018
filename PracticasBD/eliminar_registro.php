<?php
	$codArticulo = $_POST["CODARTICULO"];

	// Compartiendo los datos de la conexion, ubicando en otro archivo
	require "datos_conexion.php";

	// Conexion de la bd
	$conexion = mysqli_connect($db_host, $db_usuario, $db_pwd);

	// SI la conexion ha fallado , entrar al if
	if(mysqli_connect_errno())
	{
		echo "Fallo al conectar con la bd";
		exit;
	}

	//Ṕermite establecer la bd a utilizar en caso de error se ocupa die para un mensaje
	mysqli_select_db($conexion, $db_nombre) or die("No se ha encontrado la BD");

	// Permite establecer el tipo de formato para los caracteres en este caso utf8
	// recibe 2 parametros: 1. Conecion 2.Tipo de formato
	mysqli_set_charset($conexion,"utf8");

	$query = "DELETE FROM PRODUCTO WHERE CODARTICULO = '{$codArticulo}'";

	$resultados = mysqli_query($conexion, $query);

	if($resultados == false)
	{
		echo "it has happened an error";		
	}
	else
	{
		if(mysqli_affected_rows($conexion) == 0)
		{
			echo "there aren't datas to delete.";
		}
		else
			echo "it had deleted " . mysqli_affected_rows($conexion) . " record.";
	}

	// function for knowing how many record it had been deleted
	// mysqli_affected_rows($conexion)

	// Cerrar la conexion de la BD
	mysqli_close($conexion);
?>