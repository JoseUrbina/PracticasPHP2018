<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Read</title>
</head>
<body>
	<?php 
		require "config.php";

		$con =  new mysqli(dbHost, dbUser, dbPwd);

		if($con->connect_errno)
		{
			echo "Error: {$con->error}";
			exit;
		}

		$con->select_db(dbName) or die("NOT DB");
		$con->set_charset(dbCharset);

		$id = 1;

		$sql = "SELECT * FROM Archivos WHERE Id = ?";
		$r = $con->prepare($sql);
		$r->bind_param("i", $id);
		$r->execute();

		$r->bind_result($Id, $Nombre, $Tipo, $Contenido);
		$r->fetch();

		$r->close();
		$con->close();
	?>

	<img src="/img/<?php echo $Nombre;?>" alt="Imagen 1">
</body>
</html>