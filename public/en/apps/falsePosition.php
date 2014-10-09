<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Este curso en línea propuesto por 5 estudiantes de ingeniería multimedia e ingeniería de sistemas de la universidad de San Buenaventura Cali, nace de la necesidad de implementar y compartir los conocimientos obtenidos hasta el momento para ofrecer una guía de trabajo para las generaciones futuras, que les permita aprender de forma dinámica y que a la vez sea una plataforma de apoyo para el docente.">
    <meta name="author" content="Omega Academy Group.">
    <link rel="icon" href="../../img/icon.png">

    <title>False Position Method | Omega Academy</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/navbar.css" rel="stylesheet">   

    <script type="text/javascript" src="http://www.geogebratube.org/scripts/deployggb.js"></script> 
    
  </head>

  <body>

    <div class="container">

      <img id="banner"  src="../../img/banner2.png" class="img-responsive" alt="BANNER OMEGA ACADEMY">      
      <img id="bannerMovil" src="../../img/bannerMovil.png" class="img-responsive" alt="BANNER OMEGA ACADEMY">

      <!-- Static navbar -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>            
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="../index.html" style="color: white">Home</a></li>
              <li class="active2"><a href="../software.html" style="color: #d40b3a">Software</a></li>
              <li><a href="../videos.html" style="color: white">Videos</a></li>
              <li><a href="../documentos.html" style="color: white">Documents</a></li>                            
              <li><a href="../nosotros.html" style="color: white">About us</a></li>
              <li><a href="https://github.com/frankdaza2/Omega-Academy-Web" target="_blank" style="color: white">Github</a></li>
              <li><a href="../contact.php" style="color: white">Contact</a></li>                    
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="../../es/apps/metodoReglaFalsa.php" style="color: white">Español</a></li>              
              <li class="active2"><a href="falsePosition.php" style="color: #d40b3a">English</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>          
      
      <form class="form-horizontal" method="POST" action="falsePosition.php" role="form">        
        <legend><h2 class="text-center">False Position Method</h2></legend>
        <div class="form-group">
          <label class="col-sm-5 control-label" for="funcion">Function f(x) = </label>
          <div class="col-sm-3">
            <input name="funcion" id="funcion" type="text" class="form-control" <?php 
              if (isset($_POST["funcion"])) {
                echo "value=".$_POST["funcion"];                
              }
            ?> autofocus required>
          </div>
        </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="text-center">Lower limit A</th>
              <th class="text-center">Upper limit B</th>
              <th class="text-center">Tolerance error</th>                        
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="col-md-4 col-md-offset-4">
                  <input name="a" id="a" type="text" class="form-control" <?php 
                    if (isset($_POST["a"])) {
                      echo "value=".$_POST["a"];                                            
                    }
                  ?> required>
                </div>
              </td>
              <td>
                <div class="col-md-4 col-md-offset-4">
                  <input name="b" id="b" type="text" class="form-control" <?php 
                    if (isset($_POST["b"])) {
                      echo "value=".$_POST["b"];                      
                    }
                  ?> required>
                </div>
              </td>
              <td>
                <div class="col-md-4 col-md-offset-4">
                  <input name="errorRelativo" id="errorRelativo" type="text" class="form-control" <?php 
                    if (isset($_POST["errorRelativo"])) {
                      echo "value=".$_POST["errorRelativo"];                      
                    }
                  ?> required>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="text-center">
          <input type="submit" class="btn btn-primary" value="Evaluate">
          <button type="button" class="btn btn-danger" onclick="borrar()">Delete</button>
        </div>        
      </form>



      <br>
      <h3 class="text-center bg-primary">RESULT</h3>

      
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th class="text-center">Lower limit</th>
              <th class="text-center">Upper limit</th>
              <th class="text-center">Root</th>
              <th class="text-center">Value f(x)</th>            
              <th class="text-center">Relative error</th>            
            </tr>
          </thead>
          <tbody>
<?php

require "../../../models/validadorExpresiones/FalsePosition.php";

if (isset($_POST["funcion"]) && isset($_POST["a"]) && isset($_POST["b"]) && isset($_POST["errorRelativo"])
    && strlen($_POST["funcion"]) > 0 && strlen($_POST["a"]) > 0 &&strlen($_POST["b"]) > 0
    && strlen($_POST["errorRelativo"]) > 0) {

  // Obtengo las variables del formulario.
  $funcion = $_POST["funcion"];
  $a = $_POST["a"];
  $a2 = $_POST["a"];
  $b = $_POST["b"];
  $b2 = $_POST["b"];
  $errorRelativo = $_POST["errorRelativo"];

  // Número de iteraciones máximas.
  $iteraciones = 50;

  // Contador de líneas
  $linea = 1;

  // Auxiliar
  $aux = 0;

  // Almaceno los puntos medio para luego sacar el error relativo.
  $raices = array();  

  // Almaceno los errores relativos.
  $errores = array();

  // Inicializo la variable error
  $error = 0;

  // Creo una instancia de FalsePosition.php
  $falseP = new FalsePosition($funcion, $a, $b);
  if ($falseP->root_exists($a, $b)) {
    while (0 < $iteraciones) {
      if ($aux == 0) {    
        
        // Agrego la primera raíz al final del array $raices.
        array_push($raices, $falseP->getRoot());
      
        echo "<tr><td class='text-center'>".$linea."</td><td class='text-center'>".$falseP->getLower()."</td><td class='text-center'>".$falseP->getTop()."</td><td class='text-center'>".$falseP->getRoot()."</td><td class='text-center'></td><td class='text-center'></td></tr>";   
        $falseP->change_limits($raices[0]);
        $linea++;
        $iteraciones--;
        $aux++;
      }      
      else {
        // Agrego el punto medio al final del array $raices.
        array_push($raices, $falseP->getRoot($raices[count($raices) - 1]) );
      
        // Calculo el error relativo
        $error = $falseP->getError($raices[count($raices) - 1], $raices[count($raices) - 2]);      

        if (($errorRelativo < $error) == false) {
          break;
        }

        // Agrego el error al final del array $errores.
        array_push($errores, $error);
        
        echo "<tr><td class='text-center'>".$linea."</td><td class='text-center'>".$falseP->getLower()."</td><td class='text-center'>".$falseP->getTop()."</td><td class='text-center'>".$falseP->getRoot($raices[count($raices) - 1])."</td><td class='text-center'>".$falseP->expression($falseP->getRoot($raices[count($raices) - 1]))."</td><td class='text-center'>".$errores[count($errores) - 1]."</td></tr>";
        $falseP->change_limits($raices[count($raices) - 1]);
        $linea++;
        $iteraciones--;              
      }      
    }
  }
   else {
     echo "<tr><td class='text-center'>THERE IS NO ROOT</td><td class='text-center'>THERE IS NO ROOT</td><td class='text-center'>THERE IS NO ROOT</td><td class='text-center'>THERE IS NO ROOT</td><td class='text-center'>THERE IS NO ROOT</td><td class='text-center'>THERE IS NO ROOT</td></tr>";    
    }  
}


?>          
          
            
          </tbody>
        </table>
      </div> <!-- table-responsive -->

      <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center">Function</th>
                <th class="text-center">Root</th>
                <th class="text-center">Relative error</th>
              </tr>
            </thead>
            <tbody>
              <tr class="text-center">
                <?php
                  if (isset($funcion) && $falseP->root_exists($a, $b)) {
                    echo "<td>f(x) = $funcion</td>";
                    echo "<td>r = ".$raices[count($raices) - 2]."</td>";
                    echo "<td>Err = ".$errores[count($errores) - 1]."</td>";
                  }
                ?>                
              </tr>
            </tbody>
          </table>
        </div>

      
      <br><br><br><br><br><br><br><br>
      <div style="text-align: center;">
        <a id="boton" href="http://www.youtube.com/watch?v=A-3YQgMV6NM" target="_blank" type="button" class="btn btn-lg" style="background: gray; color: white">Video</a>
        <a id="boton" href="../documents/unit5.pdf" target="_blank" type="button" class="btn btn-lg" style="background: #D40B3A; color: white">Document</a>        
      </div>

      <br><br><br><br><br><br><br><br>


      <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'omegaacademy'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
      
           
    </div> <!-- /container -->


    <footer>      
      <p class="text-center">
        &copy; Omega Academy &middot; Juntos por el conocimiento. <br>
        2014
      </p>
    </footer>     


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../js/collapse.js"></script>
    <script src="../../js/transition.js"></script>
    <script src="../../js/dropdown.js"></script>
    <script src="../../js/metodoBiseccion.js"></script>    
        
  </body>
</html>
