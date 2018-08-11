<!DOCTYPE html>
<?php 
	$encontrado = false;

	if(isset($_POST['guardar']))
	{	
		require "user.php";

		$user =  htmlentities(addslashes($_POST['user']));
		$pwd = htmlentities(addslashes($_POST['pwd']));
		$verify = (isset($_POST['recordar'])?1:0);

		$login = new User();

		$encontrado = $login->loginUser($user, $pwd, $verify);
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
			if(!isset($_COOKIE['user']))
			{
				include "formulario.html";
			}
		}
		else
		{
			echo "Welcome to my webpage. User - {$_POST['user']}";
		}

		if(isset($_COOKIE['user']))
		{
			echo "Welcome to my webpage. User - {$_COOKIE['user']}";
		}
	?>
</body>
</html>