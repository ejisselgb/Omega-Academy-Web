<?php

require "Evaluar.php";

/**
* Contiene los métodos para para calcular raíces que no se
* pueden despejar de manera sencilla, aplicando el método de la secante.
*/
class Secant
{
	
	// Función a evaluar
	private $func;

	// Límite inferior
	private $x0;

	// Límite superior
	private $x1;

	// Siguiente iteración
	private $xn;

	// Error del usuario
	private $error;
	
	/**
	* Método constructor.
	* Almacena los límites superior e inferior en la variables $a y $b.	
	*/
	function __construct($func, $x0, $x1, $error) {
		$this->func = $func;
		$this->x0 = $x0;
		$this->x1 = $x1;	
		$this->error = $error;
	}	

	
	/**
	* Obtento la siguiente iteración del método 
	*
	*/
	function getSecant() {
		$eval = new Evaluar();

		// (x1 - x0) * f(x1)
		$func1 = ($this->x1 - $this->x0) * $eval->expression($this->func, $this->x1);
		
		// f(x1) - f(x0)
		$func2 = $eval->expression($this->func, $this->x1) - $eval->expression($this->func, $this->x0);		

		$this->xn = $this->x1 - $func1 / $func2;
		
		return $this->xn;
	}


	/**
	* Obtengo el error relativo.
	*
	*/
	function getError() {		
		return (abs($this->xn - $this->x1) / $this->xn);
	}


}

?>