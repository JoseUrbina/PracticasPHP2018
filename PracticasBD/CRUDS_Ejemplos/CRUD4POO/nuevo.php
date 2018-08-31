<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Ṕroducto</title>
</head>
<body>
	<h3>New Product</h3>

	<form action="guardar.php" method="post">
		<label>Nombre: <input type="text" name="nombre"></label><br>
		<label>Precio: <input type="text" name="precio"></label><br>
		<label>Activo: <input type="checkbox" name="activo" value="1"></label><br><br>
		<input type="submit" name="btnEnviar" value="Guardar">
	</form>
</body>
</html>