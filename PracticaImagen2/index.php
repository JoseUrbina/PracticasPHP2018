<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
	<style>
		table{
			margin:auto;
			width: 400px;
			border: 1px dotted blue;
		}
	</style>
</head>
<body>
	<form action="saveImage.php" method="POST" enctype="multipart/form-data">
		<table>
			<tr>
				<td><label>Image:</label></td>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: center;">
					<input type="submit" name="Save" value="Save">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>