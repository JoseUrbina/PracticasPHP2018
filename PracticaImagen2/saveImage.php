<?php
	require "config.php";

	$id = 0;
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
		die("Image size is bigger");
	}

	$con = new mysqli(dbHost, dbUser, dbPwd);

	if($con->connect_errno)
	{
		echo "Error: {$con->error}";
		exit;
	}

	$con->select_db(dbName) or die("NOT DB");
	$con->set_charset(dbCharset);

	$sql = "INSERT INTO Archivos(Id, Nombre, Tipo, Contenido)
			VALUES(?,?,?,?)";

	$r = $con->prepare($sql);
	$r->bind_param("isss", $id, $nameImage, $typeImage, $sizeImage);
	$r->execute();

	$r->close();
	$con->close();
?>