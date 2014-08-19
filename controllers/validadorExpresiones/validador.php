<?php 

session_start();

require "../../models/Evaluar.php";

if (isset($_POST["funcion"])) { 

  $evaluadorExpresiones = new Evaluar();
  $exprAlgebraica[0] = $_POST[funcion];

  if (isset($_POST["x"]) && strlen($_POST["x"]) > 0 ) {
    $exprAlgebraica[0] = str_replace("u", strtolower($_POST["x"]), strtolower($exprAlgebraica[0]));
  }

  // Convierto toda la expresión a letras minúsculas
  $exprAlgebraica[0] = strtolower($exprAlgebraica[0]);

  $exprAlgebraica[0] = str_replace("ln(", "log(", $exprAlgebraica[0]);
  $exprAlgebraica[0] = str_replace("arcsen(", "asn(", $exprAlgebraica[0]);
  $exprAlgebraica[0] = str_replace("arcsin(", "asn(", $exprAlgebraica[0]);
  $exprAlgebraica[0] = str_replace("arccos(", "acs(", $exprAlgebraica[0]);
  $exprAlgebraica[0] = str_replace("arctan(", "atn(", $exprAlgebraica[0]);


  


  $b = "<h4>Expresion inicial es: [" . $exprAlgebraica[0] . "]</h4>";

  //Quita espacios, tabuladores, encierra en paréntesis, vuelve a minúsculas
  $Transformado = $evaluadorExpresiones->TransformaExpresion($exprAlgebraica[0]);
  $c = "<h4>Transformada: [" . $Transformado . "]</h4>";

  //Chequea la sintaxis de la expresión
  $chequeoSintaxis = $evaluadorExpresiones->EvaluaSintaxis($Transformado);
  if ($chequeoSintaxis == 0) //Si la sintaxis es correcta
  {
    //Transforma la expresión para aceptar los menos unarios agregando (0-1)#
    $ExprNegativos = $evaluadorExpresiones->ArreglaNegativos($Transformado);
    $d = "<h4>Negativos unarios: [" . $ExprNegativos . "]</h4><br>";

    //Analiza la expresión
    $evaluadorExpresiones->Analizar($ExprNegativos);

    //Da valor a las variables
    $evaluadorExpresiones->ValorVariable('x', 7);
    $evaluadorExpresiones->ValorVariable('y', 13);
    $evaluadorExpresiones->ValorVariable('z', 19);
    $evaluadorExpresiones->ValorVariable('u', 1);

    //Evalúa la expresión para retornar un valor
    $valor = $evaluadorExpresiones->Calcular();

    //Si hay un fallo matemático se captura con este si condicional
    if (is_nan($valor) || is_infinite($valor)) {
      $e = "<h4>Error matemático</h4>";
      $_SESSION["resultado"] = array($b, $c, $d, $e);
      header("Location: ../../public/es/apps/validadorExpresiones.php");
    }
    else { //No hay fallo matemático, se muestra el valor
      $f = "<h4 class='bg-primary' style='padding: .6em;'>RESULTADO es: " . $valor."</h4>";
      $_SESSION["resultado"] = array($b, $c, $d, $f);
      header("Location: ../../public/es/apps/validadorExpresiones.php");
    }
  }
  else {
    $g = "<h4>La validación es: " . $evaluadorExpresiones->MensajeSintaxis($chequeoSintaxis)."</h4>";
    $_SESSION["resultado"] = array($b, $c, $d, $g);
      header("Location: ../../public/es/apps/validadorExpresiones.php");
  }


  }

?>