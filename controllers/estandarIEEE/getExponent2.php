<?php 

require "../../models/conversorBases/Validator.php";

// Obtengo los valores del formulario conversor de bases y elimino los espacios en blanco.
$binary = str_replace(" ", "", $_GET["binary"]);

$numeroValidado = new Validator($binary);

if (strlen($binary) > 0 && $numeroValidado->validator_binary()) {		
	$bin = abs($binary);

	// Separo la parte entera de la fraccionaria del número binario
	$array = explode(".", $bin);	

	// Verifico si el primer dígito del número binario es 1
	if (substr($bin, 0, 1) == "1") {
		// Posiciones de la coma
		$pos = strlen($array[0]) - 1;
		$expo = decbin(127 + $pos);

		if (strlen($expo) == 7)
		 	echo "0".$expo;
		else
			echo $expo;
	}
	elseif ($bin == 0) {
		echo "00000000";
	}
	else {						
		for ($i = 0; $i < strlen($array[1]); $i++) { 
			if (substr($array[1], $i, 1) == 1) {
				$pos = $i + 1;
				$expo = decbin(127 - $pos);

				if (strlen($expo) == 7) {
		 			echo "0".$expo;
		 			break;
		 		}
		 		else {
					echo $expo;
					break;
				}
			}
		}
	}
}
else
	echo "ERROR";

?>