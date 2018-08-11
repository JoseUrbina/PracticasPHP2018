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

	$sql = "SELECT * FROM PRODUCTO";

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
		</tbody>
	</table>
</body>
</html>