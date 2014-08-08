<?php 

require "../models/Validator.php";
require "../models/Decimal.php";

// Obtengo los valores del formulario conversor de bases y elimino los espacios en blanco.
$decimal = str_replace(" ", "", $_GET["decimal"]);

$numeroValidado = new Validator($decimal);

if (strlen($decimal) > 0) {
	if ($numeroValidado->validator_decimal()) {
		$number = new Decimal($decimal);
		
		$bin = $number->decimal_binary();
		echo $bin;
	}
	else {
		echo "¡Número decimal no válido!";
	}
}


?>