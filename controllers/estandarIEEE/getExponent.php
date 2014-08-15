<?php 

require "../../models/Validator.php";
require "../../models/Decimal.php";

// Obtengo los valores del formulario conversor de bases y elimino los espacios en blanco.
$decimal = abs(str_replace(" ", "", $_GET["decimal"]));

$numeroValidado = new Validator($decimal);

if (strlen($decimal) > 0) {
	if ($numeroValidado->validator_decimal()) {
		$number = new Decimal($decimal);
		
		$bin = $number->decimal_binary();

		// Obtengo la parte entera del número binario.
		$array = explode(".", $bin);

		// Obtengo el número de caracteres de la parte entera y le resto 1.
		$i = strlen($array[0]) - 1;		

		// Le sumo 127 para obtener el exponente según el estándar IEEE 754.
		$exp = $i + 127;
		$bin = decbin($exp);

		if (strlen($bin) < 8) {
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