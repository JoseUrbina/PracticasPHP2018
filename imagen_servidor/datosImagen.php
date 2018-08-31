<?php
	require "datosConexion.php";

	// We receive the image data
	
	$imageName = $_FILES['imagen']['name']; 
	
	$imageType = $_FILES['imagen']['type'];
	$imageSize = $_FILES['imagen']['size'];

	echo $imageName;

	// Validating if image has less than 1000000 bytes
	// saves into server
	if($imageSize <= 1000000)
	{
		if($imageType == "image/jpeg" || $imageType == "image/jpg" || 
		   $imageType == "image/png" || $imageType == "image/gif")
		{
			// Obtener la raiz del servidor DOCUMENT_ROOT
			$carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . "/img/";

			// mover la imagen desde el directorio temporal al directorio destino
			move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino . $imageName);
		}
		else
		{
			echo "Formato del archivo incorrecto. Subir una imagen";
		}
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

	$query = "UPDATE PRODUCTOS SET FOTO = '$imageName' WHERE ID = 1";

	$result = $con->query($query);


?>