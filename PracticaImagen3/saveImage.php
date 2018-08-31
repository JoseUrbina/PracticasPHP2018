<?php
	require 'config.php';

	$nameImage = $_FILES['image']['name'];
	$typeImage = $_FILES['image']['type'];
	$sizeImage = $_FILES['image']['size'];

	if($sizeImage <= 3000000)
	{
		if($typeImage == "image/jpg" || $typeImage == "image/jpeg"
		   || $typeImage == "image/gif" || $typeImage == "image/png")
		{
			$carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . "/img/";

			move_uploaded_file($_FILES['image']['tmp_name'], $carpeta_destino . $nameImage);
		}
		else
		{
			die("It's not an image");
		}
	}
	else
	{
		die("the image is bigger");
	}

	$con = new mysqli(dbHost, dbUser, dbPwd);

	if($con->connect_errno)
	{
		echo "Error: {$con->error}";
		exit;
	}

	$con->select_db(dbName) or die("NOT DB");
	$con->set_charset(dbCharset);

	$fileSelecct = fopen($carpeta_destino . $nameImage, "r");
	$content = fread($fileSelecct, $sizeImage);
	$content = addslashes($content);
	fclose($fileSelecct);

	/* $sql = "INSERT INTO ARCHIVOS(Nombre, Tipo, Contenido) 
		   VALUES('$nameImage', '$typeImage', '$content')";
    
    $con->query($sql); */

    $sql = "INSERT INTO ARCHIVOS(Nombre, Tipo, Contenido) 
		   VALUES(?,?,?)";

	$r = $con->prepare($sql);
	$null = NULL;

	// se debe pasar un valor null en la posicion del campo de la imagen
	$r->bind_param("ssb", $nameImage, $typeImage, $null);
	// con send_long_data(position, contenido);
	$r->send_long_data(2, $content);
	$r->execute();

    if($con->affected_rows)
    {
    	echo "Record saved correctly";
    }

    $r->close();
    $con->close();
?>