<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php 
		require "datosConexion.php";

		$con = new mysqli(dbHost, dbUser, dbPwd);

		if($con->connect_errno)
		{
			echo "Error: {$con->error}";
			exit;
		}

		$con->select_db(dbName) or die("NOT DB");
		$con->set_charset(dbCharset);

		$query = "SELECT FOTO FROM PRODUCTOS WHERE ID = 1";
		$resultado = $con->query($query);

		$record = $resultado->fetch_array(MYSQLI_ASSOC);

		// $originFolder = $_SERVER['DOCUMENT_ROOT'] . "/img/";

		$con->close();
	?>

	<img src='/img/<?php echo "{$record['FOTO']}";?>' alt="Imagen del primer articulo">
</body>
</html>