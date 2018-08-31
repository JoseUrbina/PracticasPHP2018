<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Image</title>
	<style>
		table
		{
			margin: auto;
			width:200px;
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
					<input type="submit" name="save" value="Save">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>