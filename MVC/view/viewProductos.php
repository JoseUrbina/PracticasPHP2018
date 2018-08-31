<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>List of producto</title>
	<style type="text/css">
		td{
			border: 1px dotted #FF0000;
		}
	</style>
</head>
<body>
	<table>
		<thead>
			<tr>
				<td>Codigo</td>
				<td>Seccion</td>
				<td>Nombre</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($matriz_productos as $reg) { ?>
				<tr>
					<td><?php echo $reg['CODARTICULO'];?></td>
					<td><?php echo $reg['SECCION'];?></td>
					<td><?php echo $reg['NOMBREARTICULO']?></td>
				</tr>
			<?php }?>
		</tbody>
	</table>
	
</body>
</html>