<?php 

require "../../models/conversorBases/Validator.php";
require "../../models/conversorBases/Hexadecimal.php";
require "../../models/conversorBases/Decimal.php";

// Obtengo los valores del formulario conversor de bases y elimino los espacios en blanco.
$hexadecimal = strtoupper(str_replace(" ", "", $_GET["hexadecimal"]));

$numeroValidado = new Validator($hexadecimal);

if (strlen($hexadecimal) > 0) {
	if ($hexadecimal >= 0) {
		if ($numeroValidado->validator_hexadecimal()) {		
			$number = new Hexadecimal($hexadecimal);		
			
			$decimal = $number->hexadecimal_decimal();
			$numOctal = new Decimal($decimal);
			$octal = $numOctal->decimal_octal();
			
			echo $octal;
			
		}
		else {
			echo "¡ERROR!";
		}
	}
	else {
		$hexadecimal = abs($hexadecimal);

		if ($numeroValidado->validator_hexadecimal()) {		
			$number = new Hexadecimal($hexadecimal);		
			
			$decimal = $number->hexadecimal_decimal();
			$numOctal = new Decimal($decimal);
			$octal = $numOctal->decimal_octal();
			
			echo "-".$octal;
			
		}
		else {
			echo "¡ERROR!";
		}
	}
}


?>