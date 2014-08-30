<?php 

require "../../models/conversorBases/Binary.php";

// Obtengo los valores del formulario conversor de bases y elimino los espacios en blanco.
$signo = str_replace(" ", "", $_GET["signo"]);
$exponente = str_replace(" ", "", $_GET["exponente"]);
$mantisa = str_replace(" ", "", $_GET["mantisa"]);

if ( ($signo == 1 || $signo == 0) && strspn($exponente, "01") == strlen($exponente) && strspn($mantisa, "01") == strlen($mantisa) ) {
	// Hallo el exponente, el cual me da el número de posiciones de la coma
	$tmp = new Binary($exponente);
	$tmp2 = $tmp->binary_decimal();
	$exp = $tmp2 - 127;

	if ($exponente == "00000000" && $mantisa == "00000000000000000000000") {
		echo "0";
	}
	elseif ($exponente == "01111111") {
		if ($signo == 0) {
			echo "1.".$mantisa;
		}
		elseif ($signo == 1) {
			echo "-1.".$mantisa;
		}
	}	
	elseif ($exp > 0) {
		$tmp = "1".$mantisa;		
		if ($signo == 0) {
			echo substr($tmp, 0, $exp+1).".".substr($tmp, $exp);
		}
		else {
			echo "-".substr($tmp, 0, $exp+1).".".substr($tmp, $exp);		
		}
	}
	elseif ($exp < 0 && $exponente != "00000000" && $mantisa != "00000000000000000000000") {
		$tmp = "0.".str_repeat("0", abs($exp) - 1)."1".$mantisa;		
		if ($signo == 0) {
			echo $tmp;
		}
		else {
			echo "-".$tmp;
		}
	}	
	else 
		echo "ERROR";
}
else {
	echo "ERROR";
}

?>