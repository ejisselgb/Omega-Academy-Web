<?php 

/**
* Contiene los métodos para convertir un número decimal a
* diferentes bases numéricas.
*/
class Decimal
{

	// Contiene el número decimal a convertir
	private $number;
	
	/**
	* Método constructor. 
	* Almacena un número entero o decimal en la variable $number.
	* @param string $number
	*/
	function __construct($number) {
		$this->number = $number;
	}

	/**
	* Convierte una parte fraccional de un número entero a binario.
	* @param int | float
	* @return int número binario.
	*/
	public function fractional_binary($fraccional) {
		$i = 0;
		$tmp = $fraccional;
		$frac = "";
		while ($i <= 28) {
			$i++;
			$tmp = 2 * $tmp;	
			$array = explode(".", "".$tmp);			
			$frac = $frac.$array[0];			
			$tmp = $tmp - $array[0];			
		}
		
		return $frac;
	}

	/**
	* Convierte un número decimal a binario.
	* @return float un número binario.
	*/
	public function decimal_binary() {
		if ( gettype($this->number) == 'integer' ) {
			return decbin($this->number);
		}
		else {
			// Divido el número en dos partes, la entera y la fraccionarioa
			// y los ingreso en un array.
			$array = explode(".", "".$this->number);
			
			// Convierto la parte entera en binario
			$integer = decbin($array[0]);

			// Parte fraccional
			$fractional = $this->number - $array[0];			

			// Parte fraccional convertida a binario
			$fractional = $this->fractional_binary($fractional);

			return "$integer.".$fractional;
		}
	}

	/**
	* Convierte una parte fraccional de un número entero a octal.
	* @param float
	* @return int número octal.
	*/
	public function fractional_octal($fraccional) {
		$i = 0;
		$tmp = $fraccional;
		$frac = "";
		while ($i <= 20) {
			$i++;
			$tmp = 8 * $tmp;	
			$array = explode(".", "".$tmp);			
			$frac = $frac.$array[0];			
			$tmp = $tmp - $array[0];
		}
		
		return $frac;
	}

	/**
	* Convierte un número decimal a octal.
	* @return float un número octal.
	*/
	public function decimal_octal() {
		if ( gettype($this->number) == 'integer' ) {
			return decoct($this->number);
		}
		else {
			// Divido el número en dos partes, la entera y la fraccionarioa
			// y los ingreso en un array.
			$array = explode(".", "".$this->number);
			
			// Convierto la parte entera en binario
			$integer = decoct($array[0]);

			// Parte fraccional
			$fractional = $this->number - $array[0];			

			// Parte fraccional convertida a octal
			$fractional = $this->fractional_octal($fractional);

			return "$integer.".$fractional;
		}	
	}

	/**
	* Convierte una parte fraccional de un número entero a hexadecimal.
	* @param float
	* @return int número octal.
	*/
	public function fractional_hexadecimal($fraccional) {
		$i = 0;
		$tmp = $fraccional;
		$frac = "";
		while ($i <= 20) {
			$i++;
			$tmp = 16 * $tmp;	
			$array = explode(".", "".$tmp);
			if ( $array[0] == '10' ) {
				$frac = $frac."A";
			}
			elseif ( $array[0] == '11' ) {
				$frac = $frac."B";
			}
			elseif ( $array[0] == '12' ) {
				$frac = $frac."C";
			}
			elseif ( $array[0] == '13' ) {
				$frac = $frac."D";
			}
			elseif ( $array[0] == '14' ) {
				$frac = $frac."E";
			}
			elseif ( $array[0] == '15' ) {
				$frac = $frac."F";
			}
			$frac = $frac.$array[0];
			$tmp = $tmp - $array[0];
		}
		
		return $frac;
	}

	/**
	* Convierte un número decimal a hexadecimal.
	* @return float un número octal.
	*/
	public function decimal_hexadecimal() {
		if ( gettype($this->number) == 'integer' ) {
			return strtoupper(dechex($this->number));
		}
		else {
			// Divido el número en dos partes, la entera y la fraccionarioa
			// y los ingreso en un array.
			$array = explode(".", "".$this->number);
			
			// Convierto la parte entera en hexadecimal
			$integer = strtoupper(dechex($array[0]));

			// Parte fraccional
			$fractional = $this->number - $array[0];			

			// Parte fraccional convertida a hexadecimal
			$fractional = $this->fractional_hexadecimal($fractional);

			return "$integer.".$fractional;
		}	
	}

}

?>