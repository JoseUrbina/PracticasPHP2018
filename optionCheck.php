<!DOCTYPE html>
<?php
	if(isset($_POST["fruta"]))
	{
		$fruta = $_POST["fruta"];
		var_dump($fruta);
	}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Check Option</title>
</head>
<body>
	<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
		<input type="checkbox" name="fruta[]" value="Manzana">Manzana<br>
		<input type="checkbox" name="fruta[]" value="Pera">Pera<br>
		<input type="checkbox" name="fruta[]" value="Mango">Mango<br>

		<input type="submit" id="btnSend" value="Enviar">
	</form>
</body>
</html>