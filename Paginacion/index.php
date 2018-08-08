<?php
	try
	{
		$base = new PDO("mysql:host=localhost;dbname=Pruebas",'root','');
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base->exec("SET CHARACTER SET utf8");

		// Cantidas de registros a mostrar por pagina
		$tamanoPaginas = 3;		

		// Si existe la variable que contiene el numero de pagina
		// CUANDO SE CARGA LA PAGINA POR PRIMERA VEZ NO ENTRA A ESTE IF
		if(isset($_GET['num']))
		{
			// si el valor de la pagina es igual a 1
			if($_GET['num'] == 1)
			{
				header("location:index.php");
			}
			else
			{
				$pagina = $_GET['num'];
			}	
		}
		else
		{
			// Pagina que se muestra incialmente al cargar la pagina web
			$pagina = 1;	
		}		

		// **** NOTA: EN PHP LOS REGISTROS DE SQL INICIAN DESDE 0
		// POR LO TANTO ES -1
		$empezar_desde = ($pagina -1) * $tamanoPaginas;

		// Limit: 1er parameter: primer registro a ver, 2do parameter: cuando quieres ver
		$sql_total = "SELECT * FROM PRODUCTO";

		$r = $base->prepare($sql_total);
		$ok = $r->execute(array());

		// Número de filas de la consulta sql
		$numRegistros = $r->rowCount();

		// ceil: redondea el resultado
		$totalPaginas = ceil($numRegistros / $tamanoPaginas);

		echo "Número de registros: {$numRegistros}<br>";
		echo "Mostramos {$tamanoPaginas} por página <br>";
		echo "Mostrando la página {$pagina} de {$totalPaginas}<br><br>";		

		$r->closeCursor();

		$sql_limite = "SELECT * FROM PRODUCTO LIMIT {$empezar_desde}, {$tamanoPaginas}";

		$resultado = $base->prepare($sql_limite);
		$resultado->execute(array());

		while($res = $resultado->fetch(PDO::FETCH_ASSOC))
		{
			echo "ID: {$res['CODARTICULO']} - SECCION: {$res['SECCION']}" 
					. " ARTICULO: {$res['NOMBREARTICULO']}<br>";
		}

		$resultado->closeCursor();		
	}
	catch(Exception $e)
	{
		die("Error : {$e->getMessage()}");
	}
	finally
	{
		$base = null;
	}

	for($i=1;$i<=$totalPaginas;$i++)
	{
		echo "<a href='?num={$i}'>{$i}</a> ";
	}
?>