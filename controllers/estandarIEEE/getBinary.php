<?php 

require "../../models/conversorBases/Validator.php";
require "../../models/conversorBases/Decimal.php";

// Obtengo los valores del formulario conversor de bases y elimino los espacios en blanco.
$decimal = str_replace(" ", "", $_GET["decimal"]);

$numeroValidado = new Validator($decimal);

if (strlen($decimal) > 0 && $numeroValidado->validator_decimal()) {		
	if ($decimal >= 0) {
		$binary = new Decimal($decimal);
		echo $binary->decimal_binary();
	}
	else {
		$decimal = abs($decimal);
		$binary = new Decimal($decimal);
		echo "-".$binary->decimal_binary();
	}
}
else
	echo "ERROR";

?>