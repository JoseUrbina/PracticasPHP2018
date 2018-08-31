<?php
	$controller = ucwords("user");

	if(!isset($_REQUEST['c']))
	{
		require_once("controller/{$controller}Controller.php");

		$clase = $controller . "Controller";
		$instancia = new $clase;
		$instancia->index();
	}
	else
	{
		$controller = ucwords($_REQUEST['c']);
		$action = (isset($_REQUEST['a'])?$_REQUEST['a']:"index");

		require_once("controller/{$controller}Controller.php");
		$clase = $controller . "Controller";
		$instancia = new $clase;

		call_user_func(array($instancia, $action));
	}
?>