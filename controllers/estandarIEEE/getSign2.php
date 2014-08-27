<?php 

require "../../models/Validator.php";

// Obtengo los valores del formulario conversor de bases y elimino los espacios en blanco.
$binary = str_replace(" ", "", $_GET["binary"]);

$numeroValidado = new Validator($binary);

if (strlen($binary) > 0 && $numeroValidado->validator_binary()) {
	if ($binary >= 0)
		echo 0;	
	else
		echo 1;
}
else
	echo "ERROR";

?>