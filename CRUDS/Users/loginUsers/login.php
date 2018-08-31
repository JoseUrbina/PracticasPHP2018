<!DOCTYPE html>
<?php 
	include "../insertUser/config.php";

	$encontrado = false;

	if(isset($_POST['guardar']))
	{
		try
		{
			$base =  new PDO("mysql:host=" . db_host . ";dbname=" . db_name,db_user, db_pwd);
			$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$base->exec("SET CHARACTER SET utf8");

			$user = htmlentities(addslashes($_POST['user']));
			$pwd = htmlentities(addslashes($_POST['pwd']));
			$recordar = (isset($_POST['recordar'])?1:0);

			$sql = "SELECT * FROM USUARIOS_PASS WHERE USUARIOS = :user";
			$r = $base->prepare($sql);
			$r->bindValue(':user',$user);
			$ok = $r->execute();

			if($ok)
			{
				while($registro = $r->fetch(PDO::FETCH_OBJ))
				{
					if(password_verify($pwd, $registro->PASSWORD))
					{
						$encontrado = true;
						
						if($recordar)
						{
							setcookie('User', $user, time() + 80000);
						}

						break;
					}
				}
			}
			else
			{
				header('location:login.php');
			}

			$r->closeCursor();

		}catch(Exception $e)
		{
			die("Error: {$e->getMessage()}");
		}
		finally
		{
			$base = null;
		}
	}	
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<?php 
		if(!$encontrado)
		{
			if(!isset($_COOKIE['User']))
			{
				include "formulario.html";
			}
		}
		else
		{
			echo "Welcome to my webpage, User - {$_POST['user']}";
		}

		//echo var_dump($encontrado);

		if(isset($_COOKIE['User']))
		{
			echo "Welcome to my webpage, User - {$_COOKIE['User']}";
		}
	?>
</body>
</html>