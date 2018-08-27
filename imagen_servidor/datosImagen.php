<?php
	
	// We receive the image data
	
	$imageName = $_FILES['imagen']['name']; 
	
	$imageType = $_FILES['imagen']['type'];
	$imageSize = $_FILES['imagen']['size'];

	// Obtener la raiz del servidor DOCUMENT_ROOT
	$carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . "/img/";

	// mover la imagen desde el directorio temporal al directorio destino
	move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino . $imageName);
?>