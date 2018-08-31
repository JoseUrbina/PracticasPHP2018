<?php require_once "view/header.php"; ?>

<a href="?c=user&a=edit" ><button style="margin-bottom: 10px;">New</button></a>

<table>
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Lastname</td>
			<td>Address</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($users as $u) {?>
			<tr>
				<td><?php echo $u->id;?></td>
				<td><?php echo $u->Nombre;?></td>
				<td><?php echo $u->Apellido;?></td>
				<td><?php echo $u->Direccion;?></td>
				<td>
					<a href="?c=user&a=edit&id=<?php echo $u->id;?>"><button>Edit</button></a>
					<a href="?c=user&a=delete&id=<?php echo $u->id;?>"><button>Delete</button></a>
				</td>
			</tr>
		<?php }?>
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

<?php require_once "view/footer.php"; ?>