<!DOCTYPE html>
<?php
	require "bd_conexion.php";

	$conexion = new mysqli($db_host, $db_user, $db_pwd);

	if($conexion->errno)
	{
		echo "Connect error" . $conexion->error;
		exit();
	}

	$conexion->select_db($db_name) or die("BD no encontrada");
	$conexion->set_charset("utf8");

	$id = $conexion->real_escape_string($_GET['id']);

	$sql = "SELECT * FROM Estudiantes WHERE idEstudiante = ?";

	$resultados = $conexion->prepare($sql);

	$ok = $resultados->bind_param("i",$id);

	$ok = $resultados->execute();

	if($ok)
	{
		// filtro los resultados obtenidos de la consulta en las sig. variables
		$ok = $resultados->bind_result($idEstudiante, $nombres, $apellidos, $edad, $activo);

		// ya que solo es un registro, hago fetch de este
		$ok = $resultados->fetch();
	}

	$resultados->close();
	$conexion->close();	
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nuevo estudiante</title>
</head>
<body>
	<h3>Edit Student</h3>

	<form action="edit.php" method="post">
		<input type="hidden" name="idEstudiante" value="<?php echo $idEstudiante;?>">
		<label>Nombres: <input type="text" name="nombres" value="<?php echo $nombres;?>"></label><br>
		<label>Apellidos: 
			   <input type="text" name="apellidos" value="<?php echo $apellidos;?>">
		</label><br>
		<label>Edad: <input type="number" name="edad" value="<?php echo $edad;?>"></label><br>
		<label>Activo: 
			<input type="checkbox" name="activo" value="1" <?php echo ($activo == 1?"checked":"");?> >
		</label><br><br>
		<input type="submit" name="btnEnviar" value="Guardar">
	</form>

	<?php
		
	?>
</body>
</html>