<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Practice Image 1</title>
	<style type="text/css">
		table
		{
			margin: auto;
			width: 400px;
			border: 1px dotted red;
		}
	</style>
</head>
<body>
	<form action="saveImage.php" method="POST" enctype="multipart/form-data">
		<table>
			<tr>
				<td><label>Imagen: </label></td>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: center;">
					<input type="submit" name="save" value="Save">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>