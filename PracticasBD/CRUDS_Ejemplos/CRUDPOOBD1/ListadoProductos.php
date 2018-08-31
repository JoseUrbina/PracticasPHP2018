<!DOCTYPE html>
<?php 
	require "devuelveProductos.php";

	$seccion = $_POST['buscar'];

	$productos = new DevuelveProductos();
	$array_productos = $productos->getProductos($seccion);
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Productos</title>
</head>
<body>
	<?php
		foreach($array_productos as $elemento)
		{
			echo "Código: {$elemento['CODARTICULO']}<br>";
			echo "Sección: {$elemento['SECCION']}<br>";
			echo "Articulo: {$elemento['NOMBREARTICULO']}";
			echo "<br><br>";
		}
	?>
</body>
</html>