<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Getting Browser</title>
</head>
<body>
	<?php
		$browser = $_SERVER["HTTP_USER_AGENT"];

		if(strpos($browser, "Mozilla") !== FALSE){
	?>
	
	<h2>Usted esta usando Mozilla Firefox como navegador</h2>

	<?php }else{?>

	<h2>Usted esta usando otro navegador no definido</h2>
	
	<?php }?>
</body>
</html>