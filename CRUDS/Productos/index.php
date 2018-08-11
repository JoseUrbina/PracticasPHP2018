<!DOCTYPE html>
<?php
	require "config.php";

	$conexion = new mysqli(db_host, db_user, db_pwd);

	if($conexion->connect_errno)
	{
		die("Error : {$conexion->error}");
	}

	$conexion->select_db(db_name) or die("It hasn't found the database");
	$conexion->set_charset(db_charset);

	$cantidad = 3;
	$pagina = 1;

	if(isset($_GET['pag']))
	{
		$pagina = $_GET['pag'];
	}

	$inicio = ($pagina-1)*$cantidad;

	$sql_total = "SELECT * FROM PRODUCTO";
	$r = $conexion->prepare($sql_total);
	$r->execute();

	// These functions are used together store_result() and num_rows
	$r->store_result();
	$numRegistros = $r->num_rows;

	$totalPaginas = ceil($numRegistros / $cantidad);

	$r->close();

	$sql = "SELECT * FROM PRODUCTO LIMIT $inicio,$cantidad";

	// $resultados = $conexion->query($sql);
	// 
	$resultados =  $conexion->prepare($sql);
	$ok = $resultados->execute();
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>List of Products</title>
</head>
<body>
	<a href="new.php"><button>Add</button></a>
	<br>
	<br>
	<br>

	<label>Numero de registros: <?php echo $numRegistros;?></label><br>
	<label>Página <?php echo "{$pagina} de {$totalPaginas}";?></label><br><br>

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
				if($ok)
				{

					$resultados->bind_result($codigo, $seccion, $nombre);

					while($resultados->fetch()){
			?>

			<!-- <tr>
				<td><?php // echo $r['CODARTICULO'];?></td>
				<td><?php // echo $r['SECCION'];?></td>
				<td><?php //echo $r['NOMBREARTICULO'];?></td>
				<td>
					<a href="edit.php?id=<?php //echo $r['CODARTICULO'];?>"><button>Edit</button></a> <a href="delete.php?id=<?php //echo $r['CODARTICULO'];?>"><button>Delete</button></a>
				</td>
			</tr> -->

			<tr>
				<td><?php echo $codigo;?></td>
				<td><?php echo $seccion;?></td>
				<td><?php echo $nombre;?></td>
				<td>
					<a href="edit.php?id=<?php echo $codigo;?>"><button>Edit</button></a> <a href="delete.php?id=<?php echo $codigo;?>"><button>Delete</button></a>
				</td>
			</tr>

			<?php
					}
				}

				$resultados->close();
				$conexion->close();
			?>

			<tr>
				<td>
					<?php
						for($i=1;$i<=$totalPaginas;$i++)
						{
							echo "<a href='?pag={$i}'>{$i}</a>";
						}
					?>
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>