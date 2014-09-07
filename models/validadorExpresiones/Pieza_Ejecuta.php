<?php 

	class Pieza_Ejecuta {

		var $valorPieza;

		var $funcion;

		var $tipo_operandoA;
		var $numeroA;
		var $variableA;
		var $acumulaA;

		var $operador;

		var $tipo_operandoB;
		var $numeroB;
		var $variableB;
		var $acumulaB;

		public function getValorPieza() { return $this->valorPieza; }
		public function setValorPieza($valor) { $this->valorPieza = $valor; }
		public function getFuncion() { return $this->funcion; }
		public function getTipoOperA() { return $this->tipo_operandoA; }
		public function getNumeroA() { return $this->numeroA; }
		public function getVariableA() { return $this->variableA; }
		public function getAcumulaA() { return $this->acumulaA; }
		public function getOperador() { return $this->operador; }
		public function getTipoOperB() { return $this->tipo_operandoB; }
		public function getNumeroB() { return $this->numeroB; }
		public function getVariableB() { return $this->variableB;}
		public function getAcumulaB() { return $this->acumulaB; }

		public function ConstructorPiezaEjecuta($funcion, $tipo_operandoA, $numeroA, $variableA, $acumulaA, $operador,
		$tipo_operandoB, $numeroB, $variableB, $acumulaB)
		{
			$this->valorPieza = 0;
			$this->funcion = $funcion;
			$this->tipo_operandoA = $tipo_operandoA;
			$this->numeroA = $numeroA;
			$this->variableA = $variableA;
			$this->acumulaA = $acumulaA;
			$this->operador = $operador;
			$this->tipo_operandoB = $tipo_operandoB;
			$this->numeroB = $numeroB;
			$this->variableB = $variableB;
			$this->acumulaB = $acumulaB;
		}
	}

?>