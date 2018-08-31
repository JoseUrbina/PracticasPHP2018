<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>List of producto</title>
</head>
<body>
<?php require "model/paginacion.php" ?>
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
        foreach ($matrizPersonas as $personas) : ?>
  		
       	<tr>
          <td><?php echo $personas['id'];?></td>
          <td><?php echo $personas['Nombre'];?></td>
          <td><?php echo $personas['Apellido'];?></td>
          <td><?php echo $personas['Direccion'];?></td>
     
          <td class="bot">
            <a href="borrar.php?id=<?php echo $personas['id'];?>"><input type='button' name='del' id='del' value='Borrar'></a>
          </td>
          <td class='bot'>
            <a href="editar.php?id=<?php echo $personas['id'];?>&nom=<?php echo $personas['Nombre'];?>&ape=<?php echo $personas['Apellido'];?>&dir=<?php echo $personas['Direccion'];?>">
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
</body>
</html>