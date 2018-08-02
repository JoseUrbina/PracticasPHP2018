<!DOCTYPE html>
<?php setcookie("Prueba", "Hello World!!");?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php
		if(isset($_COOKIE['Prueba']))
		{
			echo "Cookie: {$_COOKIE['Prueba']}";
		}
		else
		{
			echo "It hasn't create the cookie. Reload the page";
		}
	?>
</body>
</html>