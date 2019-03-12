<?php
	require "conexion.php";

	try
	{
		$con = Conexion::conectar();

		$sql = "DELETE FROM Usuarios WHERE idUsuario = :idUsuario";

		$idUsuario = (int)$_POST["idUsuario"];

		$result_delete = $con->prepare($sql);
		$result_delete->bindValue(":idUsuario", $idUsuario);

		if(!$result_delete->execute())
		{
			header("index.php?m=3");
		}
		else
		{
			if($result_delete->rowCount() > 0)
			{
				header("Location: index.php?m=5");
			}
			else
			{
				header("Location: index.php?m=4");		
			}
		}
	}
	catch(Exception $e)
	{
		die("Error: {$e->getMessage()}");
	}
?>