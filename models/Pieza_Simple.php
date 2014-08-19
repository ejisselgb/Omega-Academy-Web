<?php
	class Pieza_Simple {

		var $tipo; //Función, parentesis_abre, parentesis_cierra, operador, numero, variable, abreviación
		var $funcion; //Que función es seno/coseno/tangente/sqrt
		var $operador; // +, -, *, /, ^
		var $numero; //Número real de la expresión
		var $variableAlgebra; //Variable de la expresión
		var $acumula; //Indice de la microexpresión
		
		public function getTipo() { return $this->tipo; }
		public function getFuncion() { return $this->funcion; }
		public function getOperador() { return $this->operador; }
		public function getNumero() { return $this->numero; }
		public function getVariable() { return $this->variableAlgebra; }
		public function getAcumula() { return $this->acumula; }
		public function setAcumula($acumula) { $this->tipo = 7; $this->acumula = $acumula; }

		public function ConstructorPiezaSimple($tipo, $funcion, $operador, $numero, $variable)
		{
			$this->tipo = $tipo;
			$this->funcion = $funcion;
			$this->operador = $operador;
			$this->variableAlgebra = $variable;
			$this->acumula = 0;
			$this->numero = $numero;
		}

	}
?>