<!DOCTYPE html>
<?php
	include "conexion.php";

	// Amount of record by page
	$cantidad = 3;

	// Verify thta page is sending by url mode GET
	if(isset($_GET['pag']))
	{
		$pagina = $_GET['pag'];
	}
	else
	{
		$pagina = 1;
	}

	// Parameter for statement sql into limit
	$inicio = ($pagina-1)*$cantidad;

	// SQL for getting the max num of record
	$sql_total = "SELECT * FROM PRODUCTO";
	$reg = $base->prepare($sql_total);
	$reg->execute([]);

	// Getting the number of records
	$numRegistros = $reg->rowCount();
	$reg->closeCursor();

	// CAlculating the numbre of page, base on the number of record in the Database
	$totalPaginas = ceil($numRegistros / $cantidad);

	$sql = "SELECT * FROM PRODUCTO LIMIT $inicio, $cantidad";
	$r =  $base->prepare($sql);
	$ok =  $r->execute([]);

	if($ok)
	{
		// Getting the record like object
		$productos = $r->fetchAll(PDO::FETCH_OBJ);
	}

	$r->closeCursor();
	$base = null;
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>List of Products</title>
</head>
<body>
	<a href="new.php"><button>Add</button></a><br><br>

	<table>
		<thead>
			<tr>
				<td>Codigo</td>
				<td>Seccion</td>
				<td>Nombre</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
			<?php
				// Getting values of array object instead of a foreach
				foreach ($productos as $pro) {
			?>

			<tr>
				<td><?php echo $pro->CODARTICULO;?></td>
				<td><?php echo $pro->SECCION;?></td>
				<td><?php echo $pro->NOMBREARTICULO;?></td>
				<td></td>
			</tr>

			<?php 
				}
			?>

			<tr>
				<td>
					<?php
						// Showing the pages into the table
						for($i=1;$i<=$totalPaginas;$i++)
						{
							echo "<a href='?pag={$i}'>{$i}</a>  ";
						}
					?>
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>