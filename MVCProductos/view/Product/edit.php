<?php require_once "view/header.php"; ?>
<form method="post" action="?c=product&a=save">
	<label>CODIGO: <input type="text" name="codigo" value="<?php echo $p->CODARTICULO;?>" <?php echo ($p->CODARTICULO>0?"readonly":"");?>></label><br><br>
	<label>
		SECCION: <input type="text" name="seccion" value="<?php echo $p->SECCION;?>">
	</label><br><br>
	<label>
		ARTICULO: <input type="text" name="nombre" value="<?php echo $p->NOMBREARTICULO;?>">
	</label><br><br>
	<input type="submit" name="enviar" value="save">
</form>
<?php require_once "view/footer.php"?>