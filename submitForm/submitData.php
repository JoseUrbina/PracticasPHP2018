<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Submit button</title>
</head>
<body>
	<?php
		if(isset($_POST["nickname"]))
		{
			echo json_encode($_POST, JSON_OBJECT_AS_ARRAY);

			$nick = htmlentities(addslashes($_POST["nickname"]));
		}
	?>

	<form method="POST" action="" id="frmData">
		<label>Nickname: <input type="text" name="nickname"
			                    value="<?php if(isset($nick)){echo $nick;}?>"></label><br>
		<button onclick="document.getElementById('frmData').submit();">Save</button>
	</form>
</body>
</html>