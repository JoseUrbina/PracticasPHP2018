<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nuevo estudiante</title>
</head>
<body>
	<h3>New student</h3>

	<form action="guardar.php" method="post">
		<label>Nombres: <input type="text" name="nombres"></label><br>
		<label>Apellidos<input type="text" name="apellidos"></label><br>
		<label>Edad: <input type="number" name="edad"></label><br>
		<label>Activo: <input type="checkbox" name="activo" value="1"></label><br><br>
		<input type="submit" name="btnEnviar" value="Guardar">
	</form>
</body>
</html>