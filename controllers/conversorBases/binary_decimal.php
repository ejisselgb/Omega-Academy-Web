<?php 

require "../../models/Validator.php";
require "../../models/Binary.php";

// Obtengo los valores del formulario conversor de bases y elimino los espacios en blanco.
$binary = str_replace(" ", "", $_GET["binary"]);

$numeroValidado = new Validator($binary);

if (strlen($binary) > 0) {
	if ($binary >= 0) {
		if ($numeroValidado->validator_binary()) {		
			$number = new Binary($binary);		
			
			$decimal = $number->binary_decimal();

			echo $decimal;		
		}
		else {
			echo "¡ERROR!";
		}
	}
	else {
		$binary = abs($binary);

		if ($numeroValidado->validator_binary()) {		
			$number = new Binary($binary);		
			
			$decimal = $number->binary_decimal();

			echo "-".$decimal;		
		}
		else {
			echo "¡ERROR!";
		}
	}
}


?>
