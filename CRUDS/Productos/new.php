<!DOCTYPE html>
<?php
	if(isset($_POST['guardar']))
	{
		require "config.php";

		$conexion = new mysqli(db_host,db_user,db_pwd);

		if($conexion->connect_errno)
		{
			die("Error: {$conexion->error}");
		}

		$conexion->select_db(db_name) or die("NOt BD");
		$conexion->set_charset(db_charset);

		$codigo = htmlentities(addslashes($_POST['codigo']));
		$seccion = htmlentities(addslashes($_POST['seccion']));
		$nombre = htmlentities(addslashes($_POST['nombre']));

		//$sql = "INSERT INTO PRODUCTO VALUES('$codigo', '$seccion', '$nombre')";
		// $ok = $conexion->query($sql);

		$sql = "INSERT INTO PRODUCTO VALUES(?,?,?)";

		$r = $conexion->prepare($sql);
		$r->bind_param("sss", $codigo, $seccion, $nombre);
		$ok = $r->execute();

		if($ok)
		{
			header("location:index.php");
		}

		$r->close();
		$conexion->close();
	}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>New Product</title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<label>Codigo: <input type="text" name="codigo"></label><br>
		<label>Seccion: <input type="text" name="seccion"></label><br>
		<label>Nombre: <input type="text" name="nombre"></label><br>
		<input type="submit" name="guardar" value="Save">
	</form>
</body>
</html>