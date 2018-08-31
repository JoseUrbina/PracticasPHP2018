<!DOCTYPE html>
<?php
	try
	{
		$base = new PDO("mysql:host=localhost;dbname=Colegio","root",'');

		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base->exec('SET CHARACTER SET utf8');

		$id = $_GET['id'];
		$sql = "SELECT * FROM Estudiantes WHERE idEstudiante = :idEstudiante";

		$resultado = $base->prepare($sql);

		$ok = $resultado->execute(array(':idEstudiante' => $id));

		if($ok)
		{
			$fila = $resultado->fetch(PDO::FETCH_ASSOC);
		}

		$resultado->closeCursor();
	}
	catch(Exception $e)
	{
		die("Error: {$e->getMessage()}");
	}
	finally
	{
		$base =  null;
	}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Ṕroducto</title>
</head>
<body>
	<h3>Edit Student</h3>

	<form action="edit.php" method="post">
		<input type="hidden" name="idEstudiante" value="<?php echo $fila['idEstudiante'];?>">
		<label>
			Nombres: <input type="text" name="nombres" value="<?php echo $fila['Nombres'];?>">
		</label><br>
		<label>Apellidos: 
			   <input type="text" name="apellidos" value="<?php echo $fila['Apellidos'];?>">
		</label><br>
		<label>Edad: <input type="number" name="edad" value="<?php echo $fila['Edad'];?>"></label><br>
		<label>Activo: 
			<input type="checkbox" name="activo" value="1" <?php echo ($fila['Activo'] == 1?"checked":"");?> >
		</label><br><br>
		<input type="submit" name="btnEnviar" value="Guardar">
	</form>
</body>
</html>