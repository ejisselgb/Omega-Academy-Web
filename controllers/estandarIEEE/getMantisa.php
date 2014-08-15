<?php 

require "../../models/Validator.php";
require "../../models/Decimal.php";

// Obtengo los valores del formulario conversor de bases y elimino los espacios en blanco.
$decimal = abs(str_replace(" ", "", $_GET["decimal"]));

$numeroValidado = new Validator($decimal);

if (strlen($decimal) > 0) {
	if ($numeroValidado->validator_decimal()) {
		$number = new Decimal($decimal);
		
		$bin = $number->decimal_binary();

		// Obtengo la parte entera del número binario.
		$array = explode(".", $bin);

		// Obtengo el número de caracteres de la parte entera y le resto 1.
		$i = strlen($array[0]);		
		$x = 1;
		$result = substr("$array[0]", 0, 1).".";

		while ($i >= 0) {
			$i--;
			$result = $result.substr("$array[0]", $x, 1);
			$x++;
		}

		// Obtengo la parte entera del número binario.
		$array2 = explode(".", $result);

		$mantisa = "".$array2[1].$array[1];

		// Tamaño mantisa
		$mantisaLen = strlen($mantisa);

		if ($mantisaLen == 32) {
			echo $mantisa;
		}
		elseif ($mantisaLen > 32) {
			echo substr("$mantisa", 0, 32);
		}
		else {
			// Creo los ceros para completar los 32 bits.
			$tmp = 32 - $mantisaLen;
			while ($tmp >= 0) {
				$tmp++;
				$tmp = $tmp."0";
			}
			echo $tmp;
		}
		

	}
	else {
		echo "¡ERROR!";
	}
}

?>