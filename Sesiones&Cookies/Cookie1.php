<!DOCTYPE html>
<?php 
	setcookie("Prueba", "Hello World!!",time() + 3600, (dirname($_SERVER['PHP_SELF'])."/zona_exp"));
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>

</body>
</html>