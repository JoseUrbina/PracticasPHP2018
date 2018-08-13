<?php 
	require_once "model/modelUser.php";

	$user = new modelUser();
	$users = $user->getUsers();

	require_once "view/viewUser.php";
?>