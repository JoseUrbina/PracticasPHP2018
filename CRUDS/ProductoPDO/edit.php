<!DOCTYPE html>
<?php
	include 'conexion.php';

	if(isset($_POST['edit']))
	{
		$codigo = htmlentities(addslashes($_POST['cod']));
		$seccion = htmlentities(addslashes($_POST['sec']));
		$nombre = htmlentities(addslashes($_POST['nom']));

		$sql = "UPDATE PRODUCTO SET SECCION = :seccion, NOMBREARTICULO = :nombre
				WHERE CODARTICULO = :codigo";

		$r = $base->prepare($sql);
		$r->bindValue(':seccion', $seccion);
		$r->bindValue(':nombre',$nombre);
		$r->bindValue(':codigo',$codigo);

		if($r->execute())
		{
			if($r->rowCount() > 0)
			{
				header('location:index.php');
			}
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
	<?php
		if(isset($_GET['cod']))
		{
			$cod = htmlentities(addslashes($_GET['cod']));
			$sql = "SELECT * FROM PRODUCTO WHERE CODARTICULO = :cod";
			$r = $base->prepare($sql);

			if($r->execute(array(':cod' => $cod)))
			{
				//$producto = $r->fetch(PDO::FETCH_ASSOC);
				$producto =  $r->fetch(PDO::FETCH_OBJ);
			}

			$r->closeCursor();
			$base = null;
		}
	?>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<input type="hidden" name="cod" value="<?php echo $producto->CODARTICULO;?>">
		<label>Codigo: <?php echo $producto->CODARTICULO;?></label><br><br>
		<label>Seccion: <input type="text" name="sec" value="<?php echo $producto->SECCION;?>"></label><br><br>
		<label>Nombre: <input type="text" name="nom" value="<?php echo $producto->NOMBREARTICULO;?>"></label><br><br>
		<input type="submit" name="edit" value="edit">
	</form>
</body>
</html>