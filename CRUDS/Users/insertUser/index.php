<!DOCTYPE html>
<?php 
	require "config.php";

	if(isset($_POST['guardar']))
	{
		try
		{
			$base = new PDO("mysql:host=" . db_host . ";dbname=" . db_name, db_user, db_pwd);
			$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$base->exec("SET CHARACTER SET utf8");

			$user = htmlentities(addslashes($_POST['user']));
			$pwd = htmlentities(addslashes($_POST['pwd']));

			$pwd = password_hash($pwd, PASSWORD_DEFAULT, array('cost' => 12));

			$sql = "INSERT INTO USUARIOS_PASS(USUARIOS, PASSWORD) VALUES(:user,:pwd)";
			$r = $base->prepare($sql);
			$ok = $r->execute(array(':user' => $user, ':pwd' => $pwd));

			if($ok)
			{
				echo "<script type='text/javascript'>
						alert('Record saved properly');
						window.location.href='index.php';
					</script>";
				//header('location:index.php');
			}

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
	<title>Save user</title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<label>User: <input type="text" name="user"></label><br>
		<label>Password: <input type="text" name="pwd"></label><br>
		<input type="submit" name="guardar">
	</form>
</body>
</html>