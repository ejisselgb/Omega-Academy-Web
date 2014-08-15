<?php 

require "../../models/Validator.php";
require "../../models/Octal.php";
require "../../models/Decimal.php";

// Obtengo los valores del formulario conversor de bases y elimino los espacios en blanco.
$octal = str_replace(" ", "", $_GET["octal"]);

$numeroValidado = new Validator($octal);

if (strlen($octal) > 0) {
	if ($numeroValidado->validator_octal()) {		
		$number = new Octal($octal);		
		
		$decimal = $number->octal_decimal();
		$numHexadecimal = new Decimal($decimal);
		$hexadecimal = $numHexadecimal->decimal_hexadecimal();
		
		echo $hexadecimal;
		
	}
	else {
		echo "¡Número octal no válido!";
	}
}


?>