<?php
	header("Content-Type:application/json");

	$objetoJson = array(
		"empleados" => array(
			array("name" => "josé", "age" => 25),
			array("name" => "maría", "age" => 30),
			array("name" => "lucía", "age" => 14)
		),
		"autos" => array(
			array("marca" => "Nissan", "modelo" => "TX-REX"),
			array("marca" => "Ferrari", "modelo" => "TIRES"),
			array("marca" => array(
					array("submarca" => "sub1"),
					array("submarca" => "sub2"),
					array("submarca" => "sub3")
				 )
			)
		)
	);

	echo json_encode($objetoJson, JSON_OBJECT_AS_ARRAY);
