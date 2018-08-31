<?php
	$controller = ucwords("user");

	if(!isset($_REQUEST['c']))
	{
		// Load controller
		require_once "controller/{$controller}Controller.php";
		// Access to the controller class
		$clase = $controller . "Controller";
		// INstance of the class
		$instancia = new $clase();
		// Execute class method
		$instancia->index();
	}
	else
	{
		$controller = ucwords($_REQUEST['c']);
		$action = (isset($_REQUEST['a']))?$_REQUEST['a'] : "index";

		require_once "controller/{$controller}Controller.php";
		$clase = $controller . "Controller";
		$instancia = new $clase();

		call_user_func(array($instancia, $action));
	}
?>