<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Usuario</title>
	</head>
	<body>
		<h2><?php echo isset($idUsuario)?"Editar":"Agregar";?> Usuario</h2>
		<?php
			require_once "conexion.php";

			try
			{
				$con = Conexion::conectar();

				if(isset($_GET["idUsuario"]))
				{
					$idUsuario = (int)$_GET["idUsuario"];

					$sql = "SELECT * FROM Usuarios WHERE idUsuario = :idUsuario";

					$result = $con->prepare($sql);
					$result->bindValue(":idUsuario", $idUsuario);

					if(!$result->execute())
					{
						header("index.php?m=3");
					}
					else
					{
						while($reg = $result->fetch(PDO::FETCH_ASSOC))
						{
							$nickname = $reg["nickname"];
							$age = $reg["age"];
						}
					}
				}
			}
			catch(Exception $e)
			{
				die("Error: {$e->getMessage()}");
			}
			finally{
				$con = null;
			}
		?>
		<form method="POST" action="save.php">
			<input type="hidden" name="idUsuario" 
				value="<?php echo isset($idUsuario)?$idUsuario:0;?>">
			<label>Nickname: <input type="text" name="nickname" 
				value="<?php echo isset($nickname)?$nickname:"";?>"></label><br><br>
			<label>Age: <input type="number" name="age" 
				value="<?php echo isset($age)?$age:0;?>"></label><br><br>
			<input type="submit" name="save" value="Save">
		</form>
	</body>
</html>