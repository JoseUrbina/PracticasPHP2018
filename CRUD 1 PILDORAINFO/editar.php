<!doctype html>
<?php
  if(isset($_POST['bot_actualizar']))
  {
    include "conexion.php";

    $id = htmlentities(addslashes($_POST['id']));
    $nombre = htmlentities(addslashes($_POST['nom']));
    $apellido = htmlentities(addslashes($_POST['ape']));
    $direccion = htmlentities(addslashes($_POST['dir']));

    /* $sql = "UPDATE datos_usuarios SET Nombre = '{$nombre}', Apellido = '{$apellido}', 
            Direccion = '{$direccion}' WHERE id = $id";

    $base->query($sql); */

    $sql = "UPDATE datos_usuarios SET Nombre = :nombre, Apellido = :apellido,
            Direccion = :direccion WHERE id = :id";

    $resultado = $base->prepare($sql);
    $resultado->bindValue(":nombre", $nombre);
    $resultado->bindValue(":apellido", $apellido);
    $resultado->bindValue(":direccion", $direccion);
    $resultado->bindValue(":id", $id);

    $ok = $resultado->execute();

    if($ok)
    {
      $numRegistros = $resultado->rowCount();

      if($numRegistros > 0)
      {
        header('location:index.php');
      }
    }    
  }
?>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>

<h1>ACTUALIZAR</h1>
<?php
    $id = $_GET['id'];
    $nombre = $_GET['nom'];
    $apellido = $_GET['ape'];
    $direccion = $_GET['dir'];
?>

<p>
 
</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <table width="25%" border="0" align="center">
    <tr>
      <td></td>
      <td><label for="id"></label>
      <input type="hidden" name="id" id="id" value="<?php echo $id;?>"></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="nom"></label>
      <input type="text" name="nom" id="nom" value="<?php echo $nombre;?>"></td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td><label for="ape"></label>
      <input type="text" name="ape" id="ape" value="<?php echo $apellido;?>"></td>
    </tr>
    <tr>
      <td>Dirección</td>
      <td><label for="dir"></label>
      <input type="text" name="dir" id="dir" value="<?php echo $direccion;?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>