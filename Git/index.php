<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>GIT</title>
		<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	</head>
	<body>
		<h2>Show Datas</h2>
		<div id="res"></div>
		<script>
			$(function()
			{
				$.getJSON("objectoJson.php")
				.done((response, status, jqXHR) => {
					console.log([jqXHR, status]);
					
					//$("#res").html(response.autos[2].marca[2].submarca);
					$("#res").html(response.empleados[0].name);
				})
				.fail((jqXHR, status) => console.log([jqXHR, status]));
			});

			//$(document).ready(function(){});
		</script>
	</body>
</html>
