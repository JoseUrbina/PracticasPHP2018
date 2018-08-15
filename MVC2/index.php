<!-- FIle which starting the program -->
<!DOCTYPE html>
<?php 
  if(isset($_POST['cr']))
  {
  	// Include the file that constain the conexion with the BD
  	require_once 'model/Conexion.php';

  	$base = Conectar::Conexion();

    $nombre = htmlentities(addslashes($_POST['Nom']));
    $apellido = htmlentities(addslashes($_POST['Ape']));
    $direccion = htmlentities(addslashes($_POST['Dir']));

    $sql = "INSERT INTO datos_usuarios(Nombre, Apellido, Direccion)
            VALUES(:nombre, :apellido, :direccion)";

    $resultado = $base->prepare($sql);
    $ok = $resultado->execute(array(':nombre' => $nombre, ':apellido' => $apellido, 
                              ':direccion' => $direccion));

    header('location:index.php');
  }
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MVC</title>
	<style type="text/css">
		h1{
			text-align: center;
		}
	</style>

	<link rel="stylesheet" type="text/css" href="hoja.css">
</head>
<body>
	<h1>MODEL VIEW CONTROLLER</h1><br>
	<?php
		require_once "controller/controllerPersonas.php";
	?>
</body>
</html>