<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Keep Data</title>
</head>
<body>
	<?php
		if(isset($_POST["btnSave"]))
		{
			//echo implode(",", $_POST);
			// echo join(",", $_POST);
			
			$name = htmlentities(addslashes($_POST["name"]));
		}
	?>

	<form method="POST" action="" id="frmData">
		<label>Name: <input type="text" name="name"
			                value="<?php if(isset($name)){echo $name;}?>"></label><br>
		<input type="submit" name="btnSave" value="Save">
	</form>
</body>
</html>