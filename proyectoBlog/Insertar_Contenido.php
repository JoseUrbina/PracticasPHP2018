<?php 
	$miconexion = mysqli_connect("localhost", "root", "", "bbddbLog");

	// Check conexion
	if(!$miconexion)
	{
		echo "Error with the conexion: " . mysqli_error();
		exit();
	}

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
 			$destino_de_ruta = 'imagenes/';

 			move_uploaded_file($_FILES['imagen']['tmp_name'], $destino_de_ruta . $_FILES['imagen']['name']);

 			echo "El archivo {$_FILES['imagen']['name']} se ha copiado en el dir. imagenes";
 		}
 		else
 		{
 			echo "El archivo no se ha podido copiar al directorio de imagenes";
 		}
	}

	$mititulo =  $_POST['campo_titulo'];
	$micomentario = $_POST['area_comentarios'];
	$mifecha = date("Y-m-d H:i:s");
	$miimagen = $_FILES['imagen']['name'];

	$miconsulta = "INSERT INTO contenido(Titulo, Fecha, Comentario, Imagen)
				  VALUES('$mititulo', '$mifecha', '$micomentario', '$miimagen')";

	$resultado = mysqli_query($miconexion, $miconsulta);

	mysqli_close($miconexion);

	echo "<br>Se ha agregado un nuevo registro con exito<br><br>";
?>

<a href="Formulario.php">Añadir nueva entrada</a>
<a href="Mostrar_Blog.php">Ver blog</a>