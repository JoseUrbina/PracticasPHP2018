<?php 
	require "config.php";

	$conexion = new mysqli(db_host, db_user, db_pwd);

	if($conexion->connect_errno)
	{
		die("Error: {$conexion->error}");
	}

	$conexion->select_db(db_name) or die("it hasn't found db");
	$conexion->set_charset(db_charset);

	$id = htmlentities(addslashes($_GET['id']));
	/* $sql = "DELETE FROM PRODUCTO WHERE CODARTICULO = '$id'";

	$ok = $conexion->query($sql);

	if($ok)
	{
		if($conexion->affected_rows)
		{
			echo "Record deleted correctly";
		}
	} */

	$sql = "DELETE FROM PRODUCTO WHERE CODARTICULO = ?";
	
	$r = $conexion->prepare($sql);
	$r->bind_param("s", $id);
	$ok = $r->execute();

	if($ok)
	{
		if($r->affected_rows)
		{
			echo "Record deleted correctly";
		}
	} 

	$r->close();
	$conexion->close();
?>