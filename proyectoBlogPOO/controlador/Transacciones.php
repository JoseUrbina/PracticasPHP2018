<?php
	require "../modelo/ManejoObjetos.php";	

	try{
		$miconexion = new PDO("mysql:host=localhost;dbname=bbddbLog", "root", "");
		$miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$miconexion->exec("SET CHARACTER SET utf8");

		if($_FILES['imagen']['error'])
		{
			switch ($_FILES['imagen']['error']) {
				case 1: // Error exceso de tamaño especificado en php.ini
					echo "EL tamaño de la imagen excede lo permitido por el servidor";
					break;
				case 2: // Error tamaño del archivo especificado desde el formulario
					echo "El tamaño del archivo excede 2mb";
					break;
				case 3: // Corrupcion de archivo
					echo "El envio del archivo se interrumpio";
					break;
				case 4: // NO ha subido ningun archivo
					echo "NO se ha enviado ningun archivo";
					break;
			}
		}
		else
	 	{
	 		echo "Entrada subida correctamente<br>";

	 		if((isset($_FILES['imagen']['name']) && ($_FILES['imagen']['error'] == UPLOAD_ERR_OK)))
	 		{
	 			$destino_de_ruta = '../imagenes/';

	 			move_uploaded_file($_FILES['imagen']['tmp_name'], $destino_de_ruta . $_FILES['imagen']['name']);

	 			echo "El archivo {$_FILES['imagen']['name']} se ha copiado en el dir. imagenes";
	 		}
	 		else
	 		{
	 			echo "El archivo no se ha podido copiar al directorio de imagenes";
	 		}
		}

		$manejoObjetos = new ManejoObjetos($miconexion);
		$blog = new ObjetoBlog();

		$blog->setTitulo(htmlentities(addslashes($_POST['campo_titulo']), ENT_QUOTES));
		$blog->setFecha(date('Y-m-d H:i:s'));
		$blog->setComentario(htmlentities(addslashes($_POST['area_comentarios']), ENT_QUOTES));
		$blog->setImagen($_FILES['imagen']['name']);

		$manejoObjetos->insertarContenido($blog);

		echo "<br> Entrada de blog agregada correctamente<br>";

	}catch(Exception $e)
	{
		die("Error: {$e->getMessage()}");
	}
?>
