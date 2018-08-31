<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="padding-top: 5px;">
		<form class="form-horizontal" action="insertar_registro.php" method="post" name="form1">
			<div class="form-group">
				<label class="col-md-2 control-label">Código:</label>
				<div class="col-md-10">
					<input type="text" name="CODARTICULO" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Sección:</label>
				<div class="col-md-10">
					<input type="text" name="SECCION" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Nombre Articulo:</label>
				<div class="col-md-10">
					<input type="text" name="NOMBREARTICULO" class="form-control">
				</div>
			</div>
			<div class="form-group">
    			<div class="col-sm-offset-2 col-sm-10">
      			<button type="submit" class="btn btn-primary">Save</button>
    			</div>
  			</div>
		</form>
	</div>	
</body>
</html>