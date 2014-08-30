<?php 

require "../../models/conversorBases/Validator.php";
require "../../models/conversorBases/Octal.php";
require "../../models/conversorBases/Decimal.php";

// Obtengo los valores del formulario conversor de bases y elimino los espacios en blanco.
$octal = str_replace(" ", "", $_GET["octal"]);

$numeroValidado = new Validator($octal);

if (strlen($octal) > 0) {
	if ($octal >= 0) {
		if ($numeroValidado->validator_octal()) {		
			$number = new Octal($octal);		
			
			$decimal = $number->octal_decimal();
			$numHexadecimal = new Decimal($decimal);
			$hexadecimal = $numHexadecimal->decimal_hexadecimal();
			
			echo $hexadecimal;
			
		}
		else {
			echo "¡ERROR!";
		}
	}
	else {
		$octal = abs($octal);

		if ($numeroValidado->validator_octal()) {		
			$number = new Octal($octal);		
			
			$decimal = $number->octal_decimal();
			$numHexadecimal = new Decimal($decimal);
			$hexadecimal = $numHexadecimal->decimal_hexadecimal();
			
			echo "-".$hexadecimal;
			
		}
		else {
			echo "¡ERROR!";
		}
	}
}


?>