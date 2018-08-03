<?php
    // Asignar numero negativo con -1
	setcookie("Prueba", "Hello World!!",time() - 1, (dirname($_SERVER['PHP_SELF'])."/zona_exp"));
?>