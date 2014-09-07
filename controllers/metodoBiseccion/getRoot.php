<?php  

require "../../models/validadorExpresiones/Bisection.php";


// Obtengo los valores del formulario de Método de Bisección.
$funcion = $_GET["funcion"];
$a = $_GET["a"];
$b = $_GET["b"];
$digitos = $_GET["digitos"];


if (isset($funcion) && isset($a) && isset($b) && isset($digitos)) {
	$root = new Bisection($funcion, $a, $b, $digitos);
	echo $root->getRoot();
}


?>