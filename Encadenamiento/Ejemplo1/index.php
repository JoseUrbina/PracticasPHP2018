<?php
	
	require "Render.php";

	$sentence = new Render;

	echo $sentence->words(["programación","orientada","a","objetos"])
		 ->link(" ")->get();

?>