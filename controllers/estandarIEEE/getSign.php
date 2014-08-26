<?php 

require "../../models/Validator.php";

// Obtengo los valores del formulario conversor de bases y elimino los espacios en blanco.
$decimal = str_replace(" ", "", $_GET["decimal"]);

$numeroValidado = new Validator($decimal);

if (strlen($decimal) > 0 && $numeroValidado->validator_decimal()) {
	if ($decimal >= 0)
		echo 0;	
	else
		echo 1;
}
else
	echo "ERROR";

?>