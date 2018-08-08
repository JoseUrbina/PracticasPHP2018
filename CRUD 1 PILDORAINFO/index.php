<!doctype html>
<?php
  // Include the file that constain the conexion with the BD
  include 'conexion.php';

  if(isset($_POST['cr']))
  {
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
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>
<link rel="stylesheet" type="text/css" href="hoja.css">


</head>

<body>

<?php 

  $tamanoPagina = 1;

  if(isset($_GET['pagina']))
  {
    if($_GET['pagina'] == 1)
    {
      header('location:index.php');
    }
    else
    {
      $pagina = $_GET['pagina'];
    }
  }
  else
  {
    $pagina = 1;
  } 

  $empezar_desde = ($pagina - 1) * $tamanoPagina;

  // --------------------------------------------------------------------------------

  $sql_total = "SELECT * FROM datos_usuarios";

  $r = $base->prepare($sql_total);
  $r->execute([]);

  // Getting number or records
  $numReg = $r->rowCount();
  // CAlculating total of pages
  $totalPaginas = ceil($numReg / $tamanoPagina);

  $r->closeCursor();
  // --------------------------------------------------------------------------------
  
  // $conexion = $base->query("SELECT * FROM datos_usuarios");
  // $registros = $conexion->fetchAll(PDO::FETCH_OBJ);

  // 1. Realizar query
  // 2. Los datos traidos convertirlos en array de objetos para poder utilizarlo los
  // campos de la tabla como propiedades
  $registros = $base->query("SELECT * FROM datos_usuarios LIMIT {$empezar_desde},{$tamanoPagina}")
                ->fetchAll(PDO::FETCH_OBJ);  
?>

<h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>

  
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">   
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
     
     <?php
        foreach ($registros as $personas) : ?>
  		
       	<tr>
          <td><?php echo $personas->id;?></td>
          <td><?php echo $personas->Nombre;?></td>
          <td><?php echo $personas->Apellido;?></td>
          <td><?php echo $personas->Direccion;?></td>
     
          <td class="bot">
            <a href="borrar.php?id=<?php echo $personas->id;?>"><input type='button' name='del' id='del' value='Borrar'></a>
          </td>
          <td class='bot'>
            <a href="editar.php?id=<?php echo $personas->id;?>&nom=<?php echo $personas->Nombre;?>&ape=<?php echo $personas->Apellido;?>&dir=<?php echo $personas->Direccion;?>">
              <input type='button' name='up' id='up' value='Actualizar'></a>
          </td>
        </tr>       
    	 <tr>
    <?php endforeach;?>
  	
    <td></td>
        <td><input type='text' name='Nom' size='10' class='centrado'></td>
        <td><input type='text' name='Ape' size='10' class='centrado'></td>
        <td><input type='text' name=' Dir' size='10' class='centrado'></td>
        <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td></tr>  
      <tr><td>
        <?php
          for($i=1;$i<=$totalPaginas;$i++)
          {
            echo "<a href='?pagina={$i}'>{$i}</a>";
          }
        ?>
      </td></tr>  
    </table>   
</form>
 
<p>&nbsp;</p>
</body>
</html>