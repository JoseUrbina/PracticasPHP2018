<?php
	require "../datos_conexion.php";

	$conexion = mysqli_connect($db_host, $db_usuario, $db_pwd);

	if(mysqli_connect_errno())
	{
		echo "it has happened an error";
		exit;
	}

	mysqli_select_db($conexion, $db_nombre) or die("it hasn't found the database");

	$seccion = mysqli_real_escape_string($conexion, $_POST["buscar"]);

	mysqli_set_charset($conexion, "utf8");

	// 1. Crear consulta
	$sql = "SELECT CODARTICULO, SECCION, NOMBREARTICULO FROM PRODUCTO WHERE SECCION = ?";

	// 2. Preparar la operación, esto retorna un objeto stmt
	$resultado = mysqli_prepare($conexion, $sql);

	// 3. asociar el valor utilizado en la sentencia sql
	// 1er: objeto stmt 2do: type of data 3er: variable or value return: true or false
	$ok = mysqli_stmt_bind_param($resultado, "s", $seccion);

	// 4. Ejecutar la consulta
	// 1er: stmt object return: true or false
	$ok = mysqli_stmt_execute($resultado);

	if($ok == false)
	{
		echo "Error al executar la consulta";
	}
	else
	{
		// 5. Obtener resultados de la consulta, asociando variables segun cantidad de campos retorne la
		// consulta, doesn't matter the variable name
		$ok =  mysqli_stmt_bind_result($resultado, $codigo, $seccion, $nombrearticulo);

		echo "Results found: <br><br>";

		while(mysqli_stmt_fetch($resultado))
		{
			echo "Código: {$codigo}<br>";
			echo "Sección: {$seccion}<br>";
			echo "Nombre del articulo: {$nombrearticulo}<br><br>";
		}

		mysqli_stmt_close($resultado);
	}
?>