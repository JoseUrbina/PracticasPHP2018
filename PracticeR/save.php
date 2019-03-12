<?php
	require_once "conexion.php";

	try 
	{
		$con = Conexion::conectar();
		
		if(isset($_POST["idUsuario"])) 
		{
			if($_POST["idUsuario"] > 0)
			{
				$sql = "UPDATE Usuarios SET nickname = :nickname,
				        age = :age WHERE idUsuario = :idUsuario";
			}
			else
			{
				$sql = "INSERT INTO Usuarios VALUES(null, :nickname, :age, :active)";
			}

			$idUsuario = (int)$_POST["idUsuario"];
			$nickname = htmlentities(addslashes($_POST["nickname"]));
			$age = htmlentities(addslashes($_POST["age"]));
			$active = true;

			$result = $con->prepare($sql);

			$result->bindValue(":nickname", $nickname);
			$result->bindValue(":age", $age);

			($idUsuario > 0) ? $result->bindValue(":idUsuario", $idUsuario):"";
			($idUsuario == 0) ? $result->bindValue(":active", $active) : "";

			if(!$result->execute())
			{
				header("index.php?m=3");
			}
			else
			{
				if($result->rowCount() > 0)
				{
					if($idUsuario > 0)
					{
						header("Location: index.php?m=2");
					}
					else
					{
						header("Location: index.php?m=1");
					}					
				}
				else
				{
					header("Location: index.php?m=4");
				}
			}
		}	
	} 
	catch (Exception $e) {
		die("Error: {$e->getMessage()}"); 	
	} 