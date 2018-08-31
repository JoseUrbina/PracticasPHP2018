<?php 
	require_once "model/modelPersonas.php";

	$persona = new modelPersonas();
	$matrizPersonas = $persona->getPersonas();

	require_once "view/viewPersonas.php";
?>