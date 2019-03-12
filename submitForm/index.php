<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Form</title>
	</head>
	<body>
		<form method="POST" id="frmData" action="submit.php">
			<label>Name: <input type="text" name="name"></label>	

			<input type="button" name="btnSend" 
			       onclick="sendData()" value="Send" >
		</form>

		<script>
			function sendData()
			{
				document.getElementById('frmData').submit();
			}
		</script>
	</body>
</html>