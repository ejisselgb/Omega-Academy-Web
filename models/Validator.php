<?php 

/**
* Contiene los métodos para validar si un string, pertenece a
* alguna de las bases decimal, binaria, octal o hexadecimal.
*/
class Validator
{

	// Se almacena el número a validar
	private $number;
	
	/**
	* Método contructor.
	* Almacena un número en la variable $number.
	* @param string $number
	*/
	function __construct($number) {

		$this->number = abs($number);
	}

	/**
	* Valida si un número es decimal.
	* @return bool true si es decimal, false de lo contrario.
	*/
	public function validator_decimal() {
		return is_numeric($this->number);		
	}

	/**
	* Valida si un número es binario.
	* @return bool true si es binario, false de lo contrario.
	*/
	public function validator_binary() {
		// Divido el número en dos partes, la entera y la fraccionarioa
		// y los ingreso en un array.
		$array = explode(".", "".$this->number);

		if (count($array) > 2 || (strspn($this->number, ".") == 1 && count($array) == 1 )) {
			return false;
		}
		else {		
			// Guardo las coincidencias de 01 de la parte entera
			$integer = strspn($array[0], "01");

			if (count($array) == 2) {
				// Guardo las coincidencias de 01 de la parte fraccionaria
				$fractional = strspn($array[1], "01");
				if ($integer == strlen($array[0]) && $fractional == strlen($array[1])) {
					return true;
				}
				else {
					return false;
				}
			}
			else {
				if ($integer == strlen($array[0])) {
					return true;
				}
				else {
					return false;
				}
			}
		}
	}

	/**
	* Valida si un número es octal.
	* @return bool true si es octal, false de lo contrario.
	*/
	public function validator_octal() {
		// Divido el número en dos partes, la entera y la fraccionarioa
		// y los ingreso en un array.
		$array = explode(".", "".$this->number);

		if (count($array) > 2) {			
			return false;
		}
		else {		
			// Guardo las coincidencias de 01234567 de la parte entera
			$integer = strspn($array[0], "01234567");

			if (count($array) == 2) {
				// Guardo las coincidencias de 01234567 de la parte fraccionaria
				$fractional = strspn($array[1], "01234567");
				if ($integer == strlen($array[0]) && $fractional == strlen($array[1])) {
					return true;
				}
				else {
					return false;
				}
			}
			else {
				if ($integer == strlen($array[0])) {
					return true;
				}
				else {
					return false;
				}
			}
		}
	}

	/**
	* Valida si un número es hexadecimal.
	* @return bool true si es hexadecimal, false de lo contrario.
	*/
	public function validator_hexadecimal() {
		// Divido el número en dos partes, la entera y la fraccionarioa
		// y los ingreso en un array.
		$array = explode(".", "".$this->number);

		if (count($array) > 2) {			
			return false;
		}
		else {		
			// Guardo las coincidencias de 0123456789ABCDEF de la parte entera
			$integer = strspn($array[0], "0123456789ABCDEF");

			if (count($array) == 2) {
				// Guardo las coincidencias de 0123456789ABCDEF de la parte fraccionaria
				$fractional = strspn($array[1], "0123456789ABCDEF");
				if ($integer == strlen($array[0]) && $fractional == strlen($array[1])) {
					return true;
				}
				else {
					return false;
				}
			}
			else {
				if ($integer == strlen($array[0])) {
					return true;
				}
				else {
					return false;
				}
			}
		}
	}

}


?>