<?php 

require "../../models/Validator.php";

// Obtengo los valores del formulario estandar IEEE y elimino los espacios en blanco.
$decimal = str_replace(" ", "", $_GET["decimal"]);

$numeroValidado = new Validator($decimal);

if (strlen($decimal) > 0) {
	if ($numeroValidado->validator_decimal()) {		
		
		if ($decimal < 0) {
			echo "1";
		}
		else {			
			echo "0";
		}		
	}
	else {
		echo "¡ERROR!";
	}
}

?>