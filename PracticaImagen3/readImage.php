<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Read</title>
</head>
<body>
	<?php 
		require "config.php";

		$con = new mysqli(dbHost, dbUser, dbPwd);

		if($con->connect_errno)
		{
			echo "Error: {$con->error}";
			exit;
		}

		$con->select_db(dbName) or die("NOT DB");
		$con->set_charset(dbCharset);

		$sql = "SELECT * FROM ARCHIVOS WHERE Id = 1";

		$r = $con->query($sql);

		$field = $r->fetch_array(MYSQLI_ASSOC);

		$con->close();
	?>

	<img src="data:<?php echo $field['Tipo'];?>;base64, <?php echo base64_encode($field['Contenido']);?>">
</body>
</html>