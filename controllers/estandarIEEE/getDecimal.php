<?php 

require "../../models/conversorBases/Validator.php";
require "../../models/conversorBases/Binary.php";

// Obtengo los valores del formulario conversor de bases y elimino los espacios en blanco.
$binary = str_replace(" ", "", $_GET["binary"]);

$numeroValidado = new Validator($binary);

if (strlen($binary) > 0 && $numeroValidado->validator_binary()) {		
	if ($binary >= 0) {
		$decimal = new Binary($binary);
		echo $decimal->binary_decimal();
	}
	else {
		$binary = abs($binary);
		$decimal = new Binary($binary);
		echo "-".$decimal->binary_decimal();
	}
}
else
	echo "ERROR";

?>