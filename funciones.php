<?php

	$imageName = "SHingeki.png";

	$image = explode(".",$imageName);

	$newName1 = date('his') . "{$image[0]}.{$image[1]}";	

	var_dump($newName1);

	$newName2 = date('his') . "{$image[0]}.{$image[1]}";

	var_dump($newName2);

	$name = substr($imageName, 0, strpos($imageName, "."));

	echo $name;
?>
