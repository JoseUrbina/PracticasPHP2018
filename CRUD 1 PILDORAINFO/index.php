<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>
<link rel="stylesheet" type="text/css" href="hoja.css">


</head>

<body>

<?php 
  // Include the file that constain the conexion with the BD
  include 'conexion.php';

  // $conexion = $base->query("SELECT * FROM datos_usuarios");
  // $registros = $conexion->fetchAll(PDO::FETCH_OBJ);

  // 1. Realizar query
  // 2. Los datos traidos convertirlos en array de objetos para poder utilizarlo los
  // campos de la tabla como propiedades
  $registros = $base->query("SELECT * FROM datos_usuarios")->fetchAll(PDO::FETCH_OBJ);
?>

<h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>

  <table width="50%" border="0" align="center">
    <tr >
      <td class="primera_fila">Id</td>
      <td class="primera_fila">Nombre</td>
      <td class="primera_fila">Apellido</td>
      <td class="primera_fila">Dirección</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
    </tr> 
   
		
   	<tr>
      <td> </td>
      <td></td>
      <td></td>
      <td></td>
 
      <td class="bot"><input type='button' name='del' id='del' value='Borrar'></td>
      <td class='bot'><input type='button' name='up' id='up' value='Actualizar'></a></td>
    </tr>       
	<tr>
	<td></td>
      <td><input type='text' name='Nom' size='10' class='centrado'></td>
      <td><input type='text' name='Ape' size='10' class='centrado'></td>
      <td><input type='text' name=' Dir' size='10' class='centrado'></td>
      <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td></tr>    
  </table>

<p>&nbsp;</p>
</body>
</html>