<!DOCTYPE html>
<?php
	require "bd_conexion.php";

	$conexion = new mysqli($db_host, $db_user, $db_pwd);

	if($conexion->errno)
	{
		echo "Connect error " . $conexion->error;
		exit();
	}

	$conexion->select_db($db_name) or die("bd no encontrada");
	$conexion->set_charset("utf8");

	$id = $conexion->real_escape_string($_GET['id']);

	$sql = "SELECT * FROM Estudiantes WHERE idEstudiante = {$id}";

	$resultado = $conexion->query($sql);

	$r = $resultado->fetch_array(MYSQLI_ASSOC);

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
		<input type="hidden" name="idEstudiante" value="<?php echo $r['idEstudiante'];?>">
		<label>Nombres: <input type="text" name="nombres" value="<?php echo $r['Nombres'];?>"></label><br>
		<label>Apellidos: 
			   <input type="text" name="apellidos" value="<?php echo $r['Apellidos'];?>">
		</label><br>
		<label>Edad: <input type="number" name="edad" value="<?php echo $r['Edad'];?>"></label><br>
		<label>Activo: 
			<input type="checkbox" name="activo" value="1" <?php echo ($r['Activo'] == 1?"checked":"");?> >
		</label><br><br>
		<input type="submit" name="btnEnviar" value="Guardar">
	</form>
</body>
</html>