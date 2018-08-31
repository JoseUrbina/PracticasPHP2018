<table>
	<thead>
		<tr>
			<td>ID</td>
			<td>USER</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($users as $u) {?>
			<tr>
				<td><?php echo $u['ID'];?></td>
				<td><?php echo $u['USUARIOS'];?></td>
			</tr>
		<?php }?>
	</tbody>
</table>