<?php

require "../validadorExpresiones/Evaluar.php";

/**
* Contiene los métodos para Este método consiste en calcular raíces que no se
* pueden despejar de manera sencilla aplicando el teorema de Bolzano o teorema
* del valor intermedio.
*/
class Bisection
{
	// Función a evaluar
	private $func;
	// Límite inferior
	private $a;

	// Límite superior
	private $b;
	
	/**
	* Método constructor.
	* Almacena los límites superior e inferior en la variables $a y $b.
	* @param string $func - float $a | $b 
	*/
	function __construct($func, $a, $b) {
		$this->func = $func;
		$this->a = $a;
		$this->b = $b;
	}

	/**
	* Devuelve el resultado de una expresión algebraica.
	* @param float $value
	* @return $result | false resultado de evaluar la expresión con $value, false
	* si la expresión no existe.
	*/
	public function expression($value) {
		$evaluadorExpresiones = new Evaluar();
		$exprAlgebraica = $this->func;

		// Convierto toda la expresión a letras minúsculas
	  $exprAlgebraica = strtolower($exprAlgebraica);

	  // Cambio los nombres de algunas funciones según el estándar internacional.
	  $exprAlgebraica = str_replace("ln(", "log(", $exprAlgebraica);
	  $exprAlgebraica = str_replace("arcsen(", "asn(", $exprAlgebraica);
	  $exprAlgebraica = str_replace("arcsin(", "asn(", $exprAlgebraica);
	  $exprAlgebraica = str_replace("arccos(", "acs(", $exprAlgebraica);
	  $exprAlgebraica = str_replace("arctan(", "atn(", $exprAlgebraica);

	  //Quita espacios, tabuladores, encierra en paréntesis, vuelve a minúsculas
  	$Transformado = $evaluadorExpresiones->TransformaExpresion($exprAlgebraica);

  	//Chequea la sintaxis de la expresión
	  $chequeoSintaxis = $evaluadorExpresiones->EvaluaSintaxis($Transformado);
	  if ($chequeoSintaxis == 0) //Si la sintaxis es correcta
	  {
	    //Transforma la expresión para aceptar los menos unarios agregando (0-1)#
	    $ExprNegativos = $evaluadorExpresiones->ArreglaNegativos($Transformado);   

	    //Analiza la expresión
	    $evaluadorExpresiones->Analizar($ExprNegativos);

	    //Da valor a las variables    
	    $evaluadorExpresiones->ValorVariable('x', $value); 

	    //Evalúa la expresión para retornar un valor
	    $valor = $evaluadorExpresiones->Calcular();

	    //Si hay un fallo matemático se captura con este si condicional
	    if (is_nan($valor) || is_infinite($valor)) {
	      return false;
	    }
	    else { //No hay fallo matemático, se muestra el valor
	      return $valor;
	    }
	  }
	}

	/**
	* Verifica si existe una raíz en el intervalo.
	* @return boolean true si existe, false de lo contrario.
	*/
	public function root_exists() {
		// Evaluación límite inferior y superior.
		if ($this->expression($this->a) && $this->expression($this->b))
			return true;		
		else
			return false;		
	}
}


$h = new Bisection("ln(x)", -12, 12);
if ($h->root_exists()) {
	echo "Existe la raíz";
}
else
	echo "No existe !!!!";

?>