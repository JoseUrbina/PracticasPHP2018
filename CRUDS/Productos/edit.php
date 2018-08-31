<!DOCTYPE html>
<?php
	require "config.php";

	if(isset($_POST['edit']))
	{
		$conexion = new mysqli(db_host, db_user, db_pwd);
		if($conexion->connect_errno)
		{
			die("Error : {$conexion->error}");
		}

		$conexion->select_db(db_name) or die("NOT DB");
		$conexion->set_charset(db_charset);

		$codigo = htmlentities(addslashes($_POST['codigo']));
		$seccion = htmlentities(addslashes($_POST['seccion']));
		$nombre = htmlentities(addslashes($_POST['nombre']));

		/* $sql = "UPDATE PRODUCTO SET SECCION = '$seccion', NOMBREARTICULO = '$nombre' 
				WHERE CODARTICULO = '$codigo'";

		$ok = $conexion->query($sql);

		if($ok)
		{
			if($conexion->affected_rows)
			{
				header("location:index.php");
			}
		} */

		$sql = "UPDATE PRODUCTO SET SECCION = ?, NOMBREARTICULO = ?	WHERE CODARTICULO = ?";

		$r = $conexion->prepare($sql);
		$r->bind_param("sss", $seccion, $nombre, $codigo);

		if($r->execute())
		{
			if($r->affected_rows)
			{
				header("location:index.php");
			}
		}

		$r->close();
		$conexion->close();
	}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit product</title>
</head>
<body>
	<?php
		if(isset($_GET['id']))
		{
			$conexion = new mysqli(db_host, db_user, db_pwd);
			if($conexion->connect_errno)
			{
				die("Error : {$conexion->error}");
			}

			$conexion->select_db(db_name) or die("NOT DB");
			$conexion->set_charset(db_charset);

			$cod = htmlentities(addslashes($_GET['id']));

			/* $sql = "SELECT * FROM PRODUCTO WHERE CODARTICULO = '$cod'";
			$r = $conexion->query($sql);
			$v = $r->fetch_array(MYSQLI_ASSOC); */

			$sql = "SELECT * FROM PRODUCTO WHERE CODARTICULO = ?";
			$r = $conexion->prepare($sql);
			$r->bind_param("s", $cod);

			if($r->execute())
			{
				$r->bind_result($codi, $sec, $art);
				// you must alway execute a fetch one time ****
				$r->fetch();
			}

			$r->close();
			$conexion->close();
		}
	?>

	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<input type="hidden" name="codigo" value="<?php echo $codi;?>">
		<label>Codigo: <?php echo $codi;//$v['CODARTICULO'];?></label><br><br>
		<label>Seccion: <input type="text" name="seccion" value="<?php echo $sec;//$v['SECCION'];?>"></label><br><br>
		<label>Nombre: <input type="text" name="nombre" value="<?php echo $art;//$v['NOMBREARTICULO'];?>"></label><br><br>
		<input type="submit" name="edit" value="Edit">
	</form>
</body>
</html>