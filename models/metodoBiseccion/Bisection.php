<?php

require "../validadorExpresiones/Evaluar.php";

/**
* Contiene los métodos para Este método consiste en calcular raíces que no se
* pueden despejar de manera sencilla aplicando el teorema de Bolzano o teorema
* del valor intermedio.
*/
class Bisection
{
	// Límite inferior
	private $a;

	// Límite superior
	private $b;
	
	/**
	* Método constructor.
	* Almacena los límites superior e inferior en la variables $a y $b.
	* @param float $a | $b
	*/
	function __construct($a, $b) {
		$this->a = $a;
		$this->b = $b;
	}

	/**
	* Verifica si existe una raíz en el intervalo.
	*/
	public function root_exists() {

	}
}

?>