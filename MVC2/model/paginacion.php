<?php 
	require_once "Conexion.php";

	$base = Conectar::Conexion();
	$tamanoPagina = 1;

	if(isset($_GET['pagina']))
	{
		if($_GET['pagina'] == 1)
		{
			header('location:index.php');
		}
		else
		{
			$pagina = $_GET['pagina'];
		}
	}
	else
	{
		$pagina = 1;
	} 

	$empezar_desde = ($pagina - 1) * $tamanoPagina;

	// --------------------------------------------------------------------------------
	
	$sql_total = "SELECT * FROM datos_usuarios";

	$r = $base->prepare($sql_total);
	$r->execute([]);

		  // Getting number or records
	$numReg = $r->rowCount();
		  // CAlculating total of pages
	$totalPaginas = ceil($numReg / $tamanoPagina);

	$r->closeCursor();
?>