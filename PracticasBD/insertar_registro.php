<?php
	$codArticulo = $_POST["CODARTICULO"];
	$seccion = $_POST["SECCION"];
	$nombreArticulo = $_POST["NOMBREARTICULO"];

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

	$query = "INSERT INTO PRODUCTO(CODARTICULO, SECCION, NOMBREARTICULO)
			 VALUES('{$codArticulo}','{$seccion}','{$nombreArticulo}')";

	$resultados = mysqli_query($conexion, $query);

	if($resultados)
	{
		echo "Register saved correctly";
	}

	// Cerrar la conexion de la BD
	mysqli_close($conexion);
?>