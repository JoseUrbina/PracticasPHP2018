<?php 
	require_once "model/modelProductos.php";

	$producto = new modelProductos();
	$matriz_productos = $producto->getProductos();

	require_once "view/viewProductos.php";
?>