<?php
	
	require '../vendor/autoload.php';
	require '../config/database.php';

	// Evita que se muestre la pagina en pantalla
	// además la guarda en la buffer de memoria temporal
	ob_start();

	$products = App\Entities\Product::get();
	include '../resources/Views/lists.php';

	$dompdf = new Dompdf\Dompdf();
	// ob_get_clean -> obtiene lo que esta en el buffer, y luego limpia el buffer del memoria
	$dompdf->loadHtml(ob_get_clean());

	$dompdf->render();
	$dompdf->stream();