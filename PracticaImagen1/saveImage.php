<?php 
	$nameImage = $_FILES['image']['name'];
	$typeImage = $_FILES['image']['type'];
	$sizeImage = $_FILES['image']['size'];

	if($sizeImage <= 3000000)
	{
		if($typeImage == "image/jpg" || $typeImage == "image/jpeg"
			|| $typeImage == "image/gif" || $imageType == "image/png")
		{
			$carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . "/img/";

			move_uploaded_file($_FILES['image']['tmp_name'], $carpeta_destino . $nameImage);
		}
		else{
			echo "File must be an image";
		}
		
	}
	else
	{
		echo "Maxim Image Size is 3mb";
	}

	
?>