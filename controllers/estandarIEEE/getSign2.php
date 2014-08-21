<?php 

require "../../models/Validator.php";

// Obtengo los valores del formulario estandar IEEE y elimino los espacios en blanco.
$binary = str_replace(" ", "", $_GET["binary"]);

$numeroValidado = new Validator($binary);

if (strlen($binary) > 0) {
	if ($binary < 0) {
		echo "1";
	}
	elseif ($binary >= 0) {			
		echo "0";
	}
	else {
		echo "¡ERROR!";
	}
}

?>