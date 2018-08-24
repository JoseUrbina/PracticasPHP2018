<?php 
	class Persona
	{
		public static function Message($m)
		{
			echo "Your message is {$m}";
		}

		public function ShowName($name)
		{
			echo "Welcome $name";
		}
	}

	$comida = "comida";
	$array = array('comida' => 'nacatamal', 'bebida' => 'coca-cola');

	echo $array[$comida];

	$nombreClase = "Persona";

	$nombreClase::Message("Hello World!");

	call_user_func([$nombreClase, "ShowName"], "José Antonio");
?>