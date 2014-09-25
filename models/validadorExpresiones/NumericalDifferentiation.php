<?php 

require "Evaluar.php";

/**
* Contiene las métodos y atributos para realizar una
* derivación numérica.
*/
class NumericalDifferentiation
{	

	// Almacena una instancia de la clase Evaluar.
	private $eval;

	// Número para aproximar la derivada.
	private $h = 0.01;

	/**
	* Método constructor.	
	* Crea una instancia de la clase Evaluar.	
	*/
	function __construct() {
		$this->eval = new Evaluar();
	}

	/**
	* Deriva una función.
	* @param int $n Grado de la derivada.
	* @param string $function Función a derivar.
	* @return string | bool Retorna la derivada de una función dada,
	* False de lo contrario.
	*/
	public function getDerived1($function, $x0) {
		// f(x0 + 2h)
		$f1 = $this->eval->expression($function, ($x0 + 2*$this->h) );

		// 4f(x0 + h)
		$f2 = 4 * $this->eval->expression($function, ($x0 + $this->h) );

		// 3f(x0)
		$f3 = 3 * $this->eval->expression($function, $x0);

		return ( (-1 * $f1) - $f2 - $f3 ) / (2 * $this->h);
	}

	/**
	* Deriva una función.
	* @param int $n Grado de la derivada.
	* @param string $function Función a derivar.
	* @return string | bool Retorna la derivada de una función dada,
	* False de lo contrario.
	*/
	public function getDerived2($function, $x0) {
		// f(x0 + 3h)
		$f1 = $this->eval->expression($function, ($x0 + 3 * $this->h) );

		// 4f(x0 + 2h)
		$f2 = 4 * $this->eval->expression($function, ($x0 + 2 * $this->h) );

		// 3f(x0)
		$f3 = 5 * $this->eval->expression($function, $x0 + $this->h);

		// 2f(x0)
		$f4 = 2 * $this->eval->expression($function, $x0);

		return ( (-1 * $f1) + $f2 - $f3 + $f4 ) / pow($this->h, 2);
	}

	/**
	* Deriva una función.
	* @param int $n Grado de la derivada.
	* @param string $function Función a derivar.
	* @return string | bool Retorna la derivada de una función dada,
	* False de lo contrario.
	*/
	public function getDerived3($function, $x0) {
		// -3f(x0 + 4h)
		$f1 = -3 * $this->eval->expression($function, ($x0 + 4 * $this->h) );

		// 14f(x0 + 3h)
		$f2 = 14 * $this->eval->expression($function, ($x0 + 3 * $this->h) );

		// -24f(x0)
		$f3 = -24 * $this->eval->expression($function, $x0 + 2 * $this->h);

		// 18f(x0 + h)
		$f4 = 18 * $this->eval->expression($function, $x0 + $this->h);

		// -5f(x0)
		$f5 = -5 * $this->eval->expression($function, $x0);

		return ( $f1 + $f2 + $f3 + $f4 + $f5 ) / ( 2 * (pow($this->h, 3)) ) ;
	}
	
}

?>