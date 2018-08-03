<?php
	$usuario = array('user' => 'jose', 'message' => 'I\'m a expert');

	session_start();

	$_SESSION['sesionFace'] = $usuario;

	// Cookie's Asociative Array
	setcookie("cookie1[user]", $_SESSION['sesionFace']['user']);
	setcookie("cookie1[message]", $_SESSION['sesionFace']['message']);

	session_destroy();

	if(isset($_COOKIE['cookie1']))
	{
		echo "Credenciales: <br>";
		echo "User: " . $_COOKIE["cookie1"]['user']  ."<br>";
		echo "Message: {$_COOKIE['cookie1']['message']}";
	}
?>