<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload image</title>
	<style>
		table
		{
			margin:auto;
			width:400px;
			border: 1px dotted red;
		}
	</style>
</head>
<body>
	<!-- COn imagenes siempre debe ser tipo post -->
	<form action="datosImagen.php" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td><label for="imagen">Imagen:</label></td>
				<td><input type="file" name="imagen" size="20"></td>
			</tr>
			<tr>
				<td colspan="2" style="text-align:center;">
					<input type="submit" name="save" value="upload">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>