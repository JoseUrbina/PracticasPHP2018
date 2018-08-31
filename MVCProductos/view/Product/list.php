<?php require_once "view/header.php"; ?>

<a href="?c=product&a=edit"><button style="margin-bottom: 10px;">New</button></a>

<table>
	<thead>
		<tr>
			<td>CODIGO</td>
			<td>SECCION</td>
			<td>ARTICULO</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($products as $p){?>
		<tr>
			<td><?php echo $p->CODARTICULO;?></td>
			<td><?php echo $p->SECCION;?></td>
			<td><?php echo $p->NOMBREARTICULO;?></td>
			<td>
				<a href="?c=product&a=edit&cod=<?php echo $p->CODARTICULO;?>">
				<button>Edit</button></a>
				<a href="?c=product&a=delete&cod=<?php echo $p->CODARTICULO;?>">
				<button>Delete</button></a>
			</td>
		</tr>
		<?php }?>
		<tr>
			<td colspan="4">
				<?php
					for($i=1; $i<=$totalPaginas; $i++)
					{
						echo "<a href='?pag={$i}'>{$i}</a>";
					}
				?>
			</td>
		</tr>
	</tbody>
</table>
<?php require_once "view/footer.php"?>