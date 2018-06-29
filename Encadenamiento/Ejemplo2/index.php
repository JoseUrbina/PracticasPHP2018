<?php
	require 'Render.php';

	$slug = new Render;

	echo $slug->sanitize()->render("Programación orientada a objetos");
?>