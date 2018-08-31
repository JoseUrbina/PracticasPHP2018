<?php require_once "view/header.php"; ?>

<form method="post" action="?c=user&a=save">
	<input type="hidden" name="id" value="<?php echo $user->id;?>">
	<label>Name: <input type="text" name="nombre" value="<?php echo $user->Nombre;?>"></label><br>
	<label>Lastname: <input type="text" name="apellido" value="<?php echo $user->Apellido;?>"></label><br>
	<label>Address: <input type="text" name="direccion" value="<?php echo $user->Direccion;?>"></label><br>
	<input type="submit" name="enviar">
</form>

<?php require_once "view/footer.php"; ?>