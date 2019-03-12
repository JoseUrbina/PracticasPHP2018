<!DOCTYPE html>
<?php
	$page = null;

	// Almacena el valor de la pagina a mostrar, siempre que sea permitida
	$mostrar = null;

	// Variable que almacena las paginas permitidas (filtro por url)
	$pages = array(1 => "contenido1.html");

	if(isset($_GET["page"]))
	{
		// con esto no es necesario agregar la extension al valor get
		$page = htmlentities($_GET["page"]) . ".html";

		foreach($pages as $p)
		{
			// Validando si la pagina es permitida
			if($page == $p)
			{
				$mostrar = $page;
			}
		}

		if($mostrar == null)
		{
			header("Location:error.php");
		}
	}
	else
	{
			header("Location:error.php");

	}
?>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Remote file inclusion</title>
	</head>
	<body>
		<h1>Remote file inclusion</h1>
		<?php include $mostrar;?>
	</body>
</html>