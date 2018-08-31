<?php
	include 'conexion.php';

	$id = htmlentities(addslashes($_GET['id']));

	/* $sql = "DELETE FROM datos_usuarios WHERE id = :id";

	$resultado = $base->prepare($sql);

	$resultado->bindValue(":id", $id);
	$ok = $resultado->execute();

	if($ok)
	{
		$numRows = $resultado->rowCount();

		if($numRows > 0)
		{
			header("location:index.php");
		}
	}

	$resultado->closeCursor(); */

	$base->query("DELETE FROM datos_usuarios WHERE id = '$id'");
	header("location:index.php");
?>