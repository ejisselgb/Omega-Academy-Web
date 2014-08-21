<?php 

require "../../models/Validator.php";

// Obtengo los valores del formulario conversor de bases y elimino los espacios en blanco.
$binary = abs(str_replace(" ", "", $_GET["binary"]));

$numeroValidado = new Validator($binary);

if (strlen($binary) > 0) {	

	if ($numeroValidado->validator_binary()) {
				
		$bin = $binary;

		// Obtengo la parte entera del número binario.
		$array = explode(".", $bin);

		// Obtengo el número de caracteres de la parte entera y le resto 1.
		$i = strlen($array[0]) - 1;		

		// Le sumo 127 para obtener el exponente según el estándar IEEE 754.
		$exp = $i + 127;
		$bin = decbin($exp);

		if (strlen($bin) < 8 && strlen($bin) > 0) {
			echo "0".$bin;			
		}
		else {
			echo $bin;			
		}
	}
	else {
		echo "¡ERROR!";
	}
}


?>