<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>List of products</title>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php
					foreach ($products as $product) {
						echo "<strong>{$product->name}</strong> - {$product->description}";
					}
				?>
				<a href="pdf.php">Exportar en PDF</a>
			</div>
		</div>
	</div>
</body>
</html>