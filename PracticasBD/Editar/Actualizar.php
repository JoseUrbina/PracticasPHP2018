<?php 
	$codArticulo = $_POST["CODARTICULO"];
	$seccion = $_POST["SECCION"];
	$nombreArticulo = $_POST["NOMBREARTICULO"];

	require "../datos_conexion.php";

	$conexion = mysqli_connect($db_host,$db_usuario,$db_pwd);

	if(mysqli_connect_errno())
	{
		echo "It has happened an error";
		exit;
	}

	mysqli_select_db($conexion, $db_nombre) or die("it hasn't found the BD");
	mysqli_set_charset($conexion, "utf8");

	$consulta = "UPDATE PRODUCTO SET CODARTICULO = '{$codArticulo}',
				SECCION = '{$seccion}', NOMBREARTICULO = '{$nombreArticulo}' 
				WHERE CODARTICULO = '{$codArticulo}'";

	$resultado = mysqli_query($conexion, $consulta);

	if($resultado == false)
		echo "it has happened an error";
	else
	{
		if(mysqli_affected_rows($conexion) == 0)
			echo "there's not deleted record";
		else
			echo "Record updated proporly";
	}

	mysqli_close($conexion);
?>