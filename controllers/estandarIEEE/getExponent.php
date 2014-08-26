<?php 

require "../../models/Validator.php";
require "../../models/Decimal.php";

// Obtengo los valores del formulario conversor de bases y elimino los espacios en blanco.
$decimal = str_replace(" ", "", $_GET["decimal"]);

$numeroValidado = new Validator($decimal);

if (strlen($decimal) > 0 && $numeroValidado->validator_decimal()) {		
	if ($decimal >= 0) {
		$binary = new Decimal($decimal);

		// Convierto el número decimal a binario
		$bin = $binary->decimal_binary();

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
			echo "01111111";
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
	else {
		$decimal = abs($decimal);
		
		$binary = new Decimal($decimal);

		// Convierto el número decimal a binario
		$bin = $binary->decimal_binary();

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
			echo "01111111";
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
}
else
	echo "ERROR";

?>