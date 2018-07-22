<!DOCTYPE html>
<?php
	require "bd_conexion.php";

	$conexion = mysqli_connect($db_host, $db_user, $db_pwd);

	if(mysqli_connect_errno())
	{
		echo "Connect error";
		exit();
	}

	mysqli_select_db($conexion, $db_name) or die("NO se ha encontrado la db");
	mysqli_set_charset($conexion, "utf8");

	$id = mysqli_real_escape_string($conexion, $_GET['id']);

	$sql = "SELECT * FROM Estudiantes WHERE idEstudiante = {$id}";

	$resultado = mysqli_query($conexion,$sql);

	$r = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

	mysqli_close($conexion);
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