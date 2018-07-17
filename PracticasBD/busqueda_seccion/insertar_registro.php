<?php
	require "../datos_conexion.php";

	$conexion = mysqli_connect($db_host, $db_usuario, $db_pwd);

	if(mysqli_connect_errno())
	{
		echo "it has  happened an error";
		exit();
	}

	mysqli_select_db($conexion, $db_nombre) or die("it hasn't found the db");
	mysqli_set_charset($conexion, "utf8");

	$codarticulo = mysqli_real_escape_string($conexion, $_POST["CODARTICULO"]);
	$seccion = mysqli_real_escape_string($conexion, $_POST["SECCION"]);
	$narticulo = mysqli_real_escape_string($conexion,$_POST["NOMBREARTICULO"]);

	$sql = "INSERT INTO PRODUCTO VALUE(?,?,?)";

	$resultado = mysqli_prepare($conexion, $sql);

	// Put it in the same order that query params
	// sss -> tipo de cada parametro
	$ok = mysqli_stmt_bind_param($resultado, "sss", $codarticulo, $seccion, $narticulo);

	$ok = mysqli_stmt_execute($resultado);

	if($ok == false)
	{
		echo "It has happened an error";
	}
	else
	{
		echo "Record saved properly";
		mysqli_stmt_close($resultado);
	}
?>