<?php
	include "conexion.php";

	$cod = htmlentities(addslashes($_GET['cod']));
	$sql = "DELETE FROM PRODUCTO WHERE CODARTICULO = :cod";

	$r = $base->prepare($sql);
	$ok = $r->execute(array(':cod' => $cod));

	if($ok)
	{
		if($r->rowCount() > 0)
		{
			header('location:index.php');
		}
	}

	$r->closeCursor();
	$base = null;
?>