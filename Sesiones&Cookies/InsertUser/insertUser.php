<?php
	try
	{
		$base = new PDO("mysql:host=localhost;dbname=Pruebas","root","");
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base->exec("SET CHARACTER SET utf8");

		$user = htmlentities(addslashes($_POST['user']));
		$pwd = htmlentities(addslashes($_POST['pwd']));

		// Generar salt de forma automatica
		// 3er parameter : coste del cifrado
		$passEncrypt = password_hash($pwd, PASSWORD_DEFAULT, array("cost" => 12));

		$sql = "INSERT INTO USUARIOS_PASS(USUARIOS, PASSWORD) VALUES(:user, :pwd)";
		$r = $base->prepare($sql);

		$ok = $r->execute(array(':user'=> $user,':pwd' => $passEncrypt));

		if($ok)
		{
			echo "Record saved properly";
		}

		$r->closeCursor();

	}catch(Exception $e)
	{
		echo "Error: {$e->getMessage()}";
	}
	finally
	{
		$base = null;
	}
?>