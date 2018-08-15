<?php 
	require("funciones.php");

	$clase = "funciones";
	$message = "Hello World!!";
	$accion = "ShowMessage";

	call_user_func(array($clase, $accion), $message, "Wiii");
?>