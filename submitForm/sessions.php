<!DOCTYPE html>
<?php
	if(isset($_POST["btnSave"]))
		header("Location:keepData.php");

	ob_start();
	session_start();

	$_SESSION["user_id"] = 1;
	$_SESSION["user_email"] = "kraken99@gmail.es";
	$_SESSION["user_nickname"] = "kraken1990";
	$_SESSION["product_title"] = "COmputer system";
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Session</title>
	</head>
	<body>
		<?php
			foreach($_SESSION as $key => $value)
			{
				if(substr($key, 0, 5) == "user_")
				{
					$length = strlen($key) - 5;

					$llave = substr($key, 5, $length);

					echo $llave . " - " . $value . "<br>";

				}
			}
		?>

		<form method="POST" action="">
			<input type="submit" name="btnSave" value="Save">
		</form>
	</body>
</html>