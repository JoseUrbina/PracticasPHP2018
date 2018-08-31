<!DOCTYPE html>
<?php
	require 'db_conexion.php';

	$conexion = new mysqli($db_host, $db_user, $db_pwd);

	if($conexion->errno)
	{
		echo "Error : " . $conexion->error;
		exit();
	}

	$conexion->select_db($db_name) or die("BD NOT FOUND");
	$conexion->set_charset("utf8");

	$id = $conexion->real_escape_string($_GET['id']);

	$sql = "SELECT * FROM Producto WHERE idProducto = ?";
	$resultado = $conexion->prepare($sql);
	$ok = $resultado->bind_param("i", $id);
	$ok = $resultado->execute();

	if($ok)
	{
		$ok = $resultado->bind_result($idProducto, $Nombre, $Precio, $Activo);
		$resultado->fetch();
	}

	$resultado->close();
	$conexion->close();
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Ṕroducto</title>
</head>
<body>
	<h3>New Product</h3>

	<form action="edit.php" method="post">
		<input type="hidden" name="idproducto" value="<?php echo $idProducto;?>">
		<label>Nombre: <input type="text" name="nombre" value="<?php echo $Nombre;?>"></label><br>
		<label>Precio: <input type="text" name="precio" value="<?php echo $Precio;?>"></label><br>
		<label>Activo: 
			<input type="checkbox" name="activo" value="1" <?php echo (($Activo==1)?"checked":"");?>>
		</label><br><br>
		<input type="submit" name="btnEnviar" value="Guardar">
	</form>
</body>
</html>