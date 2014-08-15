<?php 

require "../../models/Validator.php";
require "../../models/Octal.php";
require "../../models/Decimal.php";

// Obtengo los valores del formulario conversor de bases y elimino los espacios en blanco.
$octal = str_replace(" ", "", $_GET["octal"]);

$numeroValidado = new Validator($octal);

if (strlen($octal) > 0) {
	if ($octal >= 0) {
		if ($numeroValidado->validator_octal()) {		
			$number = new Octal($octal);		
			
			$decimal = $number->octal_decimal();
			$numBinary = new Decimal($decimal);
			$binary = $numBinary->decimal_binary();
			
			echo $binary;
			
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
			$numBinary = new Decimal($decimal);
			$binary = $numBinary->decimal_binary();
			
			echo "-".$binary;
			
		}
		else {
			echo "¡ERROR!";
		}
	}
}


?>