<?php 
	$controller = ucwords("product");

	if(!isset($_REQUEST['c']))
	{
		require "controller/{$controller}Controller.php";
		$controller .= "Controller";
		$clase = new $controller;

		$clase->index();
	}
	else
	{
		$controller = ucwords($_REQUEST['c']);
		$action = (isset($_REQUEST['a'])?$_REQUEST['a']:"index");

		require "controller/{$controller}Controller.php";
		$controller .= "Controller";
		$clase = new $controller;

		call_user_func(array($clase, $action));
	}
?>