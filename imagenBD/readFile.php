<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php 

		$Id = "";
		$Tipo = "";
		$Contenido = "";

		require "datosConexion.php";

		$con = new mysqli(dbHost, dbUser, dbPwd);

		if($con->connect_errno)
		{
			echo "Error: {$con->error}";
			exit;
		}

		$con->select_db(dbName) or die("NOT DB");
		$con->set_charset(dbCharset);

		$query = "SELECT * FROM ARCHIVOS WHERE Id = 3";
		$resultado = $con->query($query);

		$record = $resultado->fetch_array(MYSQLI_ASSOC);

		$Id = $record['Id'];
		$Tipo = $record['Tipo'];
		$Contenido = $record["Contenido"];

		$con->close();


		echo "Id: {$Id}  -  Tipo: {$Tipo}<br><br>";

		// data : type of image; base64 -> en este formato esta codificado el campo tipo blob
		// base64_encode() : decodificar los bytes para obtener la iimagen y colocarla
		// en la etiqueta img
		echo "<img src='data:image/jpeg; base64, " . base64_encode($Contenido) . "'>";
	?>
</body>
</html>