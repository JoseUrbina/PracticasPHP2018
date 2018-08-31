<!DOCTYPE html>
<?php
	if(isset($_POST['save']))
	{
		include "conexion.php";

		$codigo = htmlentities(addslashes($_POST['cod']));
		$seccion = htmlentities(addslashes($_POST['sec']));
		$nombre = htmlentities(addslashes($_POST['nom']));

		$sql = "INSERT INTO PRODUCTO VALUES(:codigo, :seccion, :nombre)";
		$r = $base->prepare($sql);
		$r->bindValue(':codigo',$codigo);
		$r->bindValue(':seccion',$seccion);
		$r->bindValue(':nombre',$nombre);

		if($r->execute())
		{
			header('location:index.php');
		}

		$r->closeCursor();
		$base = null;
	}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>New Product</title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<label>Codigo: <input type="text" name="cod"></label><br><br>
		<label>Seccion: <input type="text" name="sec"></label><br><br>
		<label>Nombre: <input type="text" name="nom"></label><br><br>
		<input type="submit" name="save" value="save">
	</form>
</body>
</html>