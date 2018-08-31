<?php
	require "datosConexion.php";

	// We receive the image data
	
	$fileName = $_FILES['archivo']['name']; 
	
	$fileType = $_FILES['archivo']['type'];
	$fileSize = $_FILES['archivo']['size'];

	// Validating if image has less than 1000000 bytes
	// saves into server
	if($fileSize <= 1000000)
	{
		// Obtener la raiz del servidor DOCUMENT_ROOT
		$carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . "/img/";

		// mover la imagen desde el directorio temporal al directorio destino
		move_uploaded_file($_FILES['archivo']['tmp_name'], $carpeta_destino . $fileName);
	}
	else
	{
		echo "El tamaño es demasiado grande";
	}


	$con = new mysqli(dbHost, dbUser, dbPwd);

	if($con->connect_errno)
	{
		echo "Error: {$con->error}";
		exit;
	}

	$con->select_db(dbName) or die("Error: It's found the database");
	$con->set_charset(dbCharset);

	// se obtiene el fichero : 1er: direccion 2do: tipo de accion read write ...
	$archivo_objetivo = fopen($carpeta_destino . $fileName, "r");
	// se lee la informacion del contenido como bytes
	// 1er: archivo 2do: tamaño del archivo
	$contenido = fread($archivo_objetivo, $fileSize);
	// como pasamos una direccion con / es necesario usar la funcion addslashes
	// para escapar dichos simbolos raros y guardar en la bd
	$contenido = addslashes($contenido);
	// cerrar la conexion añ archivo
	fclose($archivo_objetivo);

	$query = "INSERT INTO ARCHIVOS(Id, Nombre, Tipo, Contenido)
			  VALUES(0, '$fileName', '$fileType', '$contenido')";

	$result = $con->query($query);

	if($con->affected_rows)
	{
		echo "Record saved correctly";
	}
	else
	{
		echo "it's happened an error";
	}
?>