<?php 

require "../models/Validator.php";
require "../models/Binary.php";
require "../models/Decimal.php";

// Obtengo los valores del formulario conversor de bases y elimino los espacios en blanco.
$binary = str_replace(" ", "", $_GET["binary"]);

$numeroValidado = new Validator($binary);

if (strlen($binary) > 0) {
	if ($numeroValidado->validator_binary()) {		
		$number = new Binary($binary);		
		
		$decimal = $number->binary_decimal();
		$numDec = new Decimal($decimal);
		$octal = $numDec->decimal_octal();
		
		echo $octal;
		
	}
	else {
		echo "¡Número binario no válido!";
	}
}


?>