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
			// Quito el punto decimal del número binario
			$bin = str_replace(".", "", $bin);
			$mantisa = substr($bin, 1, strlen($bin) - 1);

			if (strlen($mantisa) == 23) {
				echo $mantisa;
			}
			elseif (strlen($mantisa) < 23) {
				$i = 0;
				while (strlen($mantisa) <= 23) {
					$mantisa += "0";
					$i++;
				}
				echo $mantisa;
			}
			elseif (strlen($mantisa) > 23) {
				echo substr($mantisa, 0, 23);
			}
		}
		elseif ($bin == 0) {
			echo "00000000000000000000000";
		}
		else {			
			for ($i = 0; $i < strlen($array[1]); $i++) { 
				if (substr($array[1], $i, 1) == 1) {
					$mantisa = substr($array[1], $i + 1, strlen($array[1]) - 1);

					if (strlen($mantisa) == 23) {
						echo $mantisa;
						break;
					}
					elseif (strlen($mantisa) < 23) {						
						$i = 0;
						while (strlen($mantisa) <= 23) {
							$mantisa += "0";
							$i++;
						}
						echo $mantisa;
						break;
					}
					elseif (strlen($mantisa) > 23) {
						echo substr($mantisa, 0, 23);
						break;
					}
					else {
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
			// Quito el punto decimal del número binario
			$bin = str_replace(".", "", $bin);
			$mantisa = substr($bin, 1, strlen($bin) - 1);

			if (strlen($mantisa) == 23) {
				echo $mantisa;
			}
			elseif (strlen($mantisa) < 23) {
				$i = 0;
				while (strlen($mantisa) <= 23) {
					$mantisa += "0";
					$i++;
				}
				echo $mantisa;
			}
			elseif (strlen($mantisa) > 23) {
				echo substr($mantisa, 0, 23);
			}
		}
		elseif ($bin == 0) {
			echo "00000000000000000000000";
		}
		else {			
			for ($i = 0; $i < strlen($array[1]); $i++) { 
				if (substr($array[1], $i, 1) == 1) {
					$mantisa = substr($array[1], $i + 1, strlen($array[1]) - 1);

					if (strlen($mantisa) == 23) {
						echo $mantisa;
						break;
					}
					elseif (strlen($mantisa) < 23) {						
						$i = 0;
						while (strlen($mantisa) <= 23) {
							$mantisa += "0";
							$i++;
						}
						echo $mantisa;
						break;
					}
					elseif (strlen($mantisa) > 23) {
						echo substr($mantisa, 0, 23);
						break;
					}
					else {
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