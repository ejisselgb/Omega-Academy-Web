<?php 

session_start();

require "../../models/validadorExpresiones/Evaluar.php";

if (isset($_POST["funcion"])) { 

  $evaluadorExpresiones = new Evaluar();
  $exprAlgebraica[0] = $_POST[funcion];

  // Convierto toda la expresión a letras minúsculas
  $exprAlgebraica[0] = strtolower($exprAlgebraica[0]);

  $exprAlgebraica[0] = str_replace("ln(", "log(", $exprAlgebraica[0]);
  $exprAlgebraica[0] = str_replace("arcsen(", "asn(", $exprAlgebraica[0]);
  $exprAlgebraica[0] = str_replace("arcsin(", "asn(", $exprAlgebraica[0]);
  $exprAlgebraica[0] = str_replace("arccos(", "acs(", $exprAlgebraica[0]);
  $exprAlgebraica[0] = str_replace("arctan(", "atn(", $exprAlgebraica[0]);

  //Quita espacios, tabuladores, encierra en paréntesis, vuelve a minúsculas
  $Transformado = $evaluadorExpresiones->TransformaExpresion($exprAlgebraica[0]);

  //Chequea la sintaxis de la expresión
  $chequeoSintaxis = $evaluadorExpresiones->EvaluaSintaxis($Transformado);
  if ($chequeoSintaxis == 0) //Si la sintaxis es correcta
  {
    //Transforma la expresión para aceptar los menos unarios agregando (0-1)#
    $ExprNegativos = $evaluadorExpresiones->ArreglaNegativos($Transformado);

    //Analiza la expresión
    $evaluadorExpresiones->Analizar($ExprNegativos);

    //Da valor a las variables
    if (isset($_POST["x"]) && strlen($_POST["x"]) > 0 ) {
      $evaluadorExpresiones->ValorVariable('x', $_POST["x"]);
    }
    
    //Evalúa la expresión para retornar un valor
    $valor = $evaluadorExpresiones->Calcular();

    //Si hay un fallo matemático se captura con este si condicional
    if (is_nan($valor) || is_infinite($valor)) {
      $e = "<h4>Mathematical Error</h4>";
      $_SESSION["resultado"] = $e;
      $_SESSION["funcion"] = $_POST["funcion"];
      $_SESSION["x"] = $_POST["x"];
      header("Location: ../../public/en/apps/expressionValidator.php");
    }
    else { //No hay fallo matemático, se muestra el valor
      $f = "<h4 class='bg-primary' style='padding: .6em;'>RESULT: " . $valor."</h4>";
      $_SESSION["resultado"] = $f;
      $_SESSION["funcion"] = $_POST["funcion"];
      $_SESSION["x"] = $_POST["x"];
      header("Location: ../../public/en/apps/expressionValidator.php");
    }
  }
  else {
    $g = "<h4>Validation is: " . $evaluadorExpresiones->MensajeSintaxis($chequeoSintaxis)."</h4>";
    $_SESSION["resultado"] = $g;
    $_SESSION["funcion"] = $_POST["funcion"];
    $_SESSION["x"] = $_POST["x"];
  }


  }

?>