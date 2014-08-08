<?php 

/**
* Contiene los métodos para convertir un número octal a
* diferentes bases numéricas.
*/
class Octal
{

	// Contiene el número octal a convertir
	private $number;
	
	/**
	* Método constructor. 
	* Almacena un número octal en la variable $number.
	* @param string $number
	*/
	function __construct($number) {
		$this->number = $number;
	}

	/**
	* Convierte una parte fraccional de un número octal a decimal.
	* @param float
	* @return int número octal.
	*/
	public function fractional_octal($fraccional) {		
		$i = 0;
		$x = 0;
		$y = 1;				
		$frac = 0;
		while ($i <= 20) {
			$i++;
			$tmp = substr($fraccional, $x, 1);	
			$frac = $frac + $tmp * pow(8, -$y);				
			$x++;
			$y++;
		}		
		// Divido el número en dos partes, la entera y la fraccionaria
		// y los ingreso en un array.
		$array = explode(".", "".$frac);
		if (count($array) == 1) {
			return 0;
		}
		elseif (count($array) == 2) {
		 	return $array[1];
		}
	}

	/**
	* Convierte un número octal a decimal.
	* @return float un número decimal.
	*/
	public function octal_decimal() {
		// Divido el número en dos partes, la entera y la fraccionaria
		// y los ingreso en un array.
		$array = explode(".", "".$this->number);

		if (count($array) == 1) {
			return octdec($this->number);
		}
		elseif (count($array) == 2) {			
			
			// Convierto la parte entera en binario
			$integer = octdec($array[0]);			

			// Parte fraccional			
			$fractional = $array[1];

			// Parte fraccional convertida a octal
			$fractional = $this->fractional_octal($fractional);

			return "$integer.".$fractional;
		}
	}

}

?>