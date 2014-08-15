<?php 

require "../../models/Validator.php";
require "../../models/Decimal.php";

// Obtengo los valores del formulario conversor de bases y elimino los espacios en blanco.
$decimal = str_replace(" ", "", $_GET["decimal"]);

$numeroValidado = new Validator($decimal);

if (strlen($decimal) > 0) {
	$decimal = abs($decimal);

	if ($numeroValidado->validator_decimal()) {
		$number = new Decimal($decimal);				

		$bin = $number->decimal_binary();			
			
		// Binario sin punto decimal.
		$bin2 = str_replace(".", "", $bin);

		// Creo un nuevo binario con el punto corrido.
		$bin3 = substr($bin2, 0, 1).".".substr($bin2, 1, strlen($bin2));

		$array = explode(".", "$bin3");

		if (strlen($array[1]) == 23) {
			echo $array[1];
		}
		elseif (strlen($array[1]) < 23) {
			$tmp = 23 - strlen($array[1]);
			$result = $array[1];
			$i = 0;
			while ($i < $tmp) {
				$result = $result."0";
				$i++;
			}
			echo $result;
		}
		else {
			echo substr($array[1], 0, 23);
		}
	}
	else {
		echo "¡ERROR!";
	}
}

?>