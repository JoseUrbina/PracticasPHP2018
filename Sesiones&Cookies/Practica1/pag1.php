<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Elegir idioma</title>
</head>
<body>
	<?php
		if(isset($_COOKIE['idioma_seleccionado']))
		{
			if($_COOKIE['idioma_seleccionado'] == "es")
			{
				header('location:spanish.php');
			}
			else
			{
				header("location:english.php");
			}
		}
	?>

	<table border="0" width="25%" align="center">
		<tr>
			<td colspan="2" align="center"><h1>Elige idioma</h1></td>
		</tr>
		<tr>
			<td align="center">
				<a href="crearCookie.php?idioma=en">
					<img src="img/english.jpg" width="90" height="60">
				</a>
			</td>
			<td align="center">
				<a href="crearCookie.php?idioma=es">
					<img src="img/spanish.jpg" width="90" height="60">
				</a>
			</td>
		</tr>
	</table>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</body>
</html>