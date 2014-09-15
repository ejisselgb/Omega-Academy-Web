<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Este curso en línea propuesto por 5 estudiantes de ingeniería multimedia e ingeniería de sistemas de la universidad de San Buenaventura Cali, nace de la necesidad de implementar y compartir los conocimientos obtenidos hasta el momento para ofrecer una guía de trabajo para las generaciones futuras, que les permita aprender de forma dinámica y que a la vez sea una plataforma de apoyo para el docente.">
    <meta name="author" content="Omega Academy Group.">
    <link rel="icon" href="../../img/icon.png">

    <title>Método de Newton - Raphson | Omega Academy</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/navbar.css" rel="stylesheet">    
    
  </head>

  <body>

    <div class="container">

      <img id="banner"  src="../../img/banner.png" class="img-responsive" alt="BANNER OMEGA ACADEMY">      
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
              <li><a href="../index.html" style="color: white">Inicio</a></li>
              <li class="active2"><a href="../software.html" style="color: #d40b3a">Software</a></li>
              <li><a href="../videos.html" style="color: white">Vídeos</a></li>
              <li><a href="../documentos.html" style="color: white">Documentos</a></li>                            
              <li><a href="../nosotros.html" style="color: white">Nosotros</a></li>
              <li><a href="https://github.com/frankdaza2/Omega-Academy-Web" target="_blank" style="color: white">Github</a></li>                    
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="active2"><a href="metodoReglaFalsa.php" style="color: #d40b3a">Español</a></li>              
              <li><a href="../../en/apps/falsePosition.php" style="color: white">English</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>          
      
      <form class="form-horizontal" method="POST" action="metodoNewtonRaphson.php" role="form">        
        <legend><h2 class="text-center">Método de Newton - Raphson</h2></legend>
        <div class="form-group">
          <label class="col-sm-5 control-label" for="funcion">Función f(x) = </label>
          <div class="col-sm-3">
            <input name="funcion" id="funcion" type="text" class="form-control" onkeyup="graficar(this.value)" autofocus>
          </div>
        </div>        
        <div class="form-group">
          <label class="col-sm-5 control-label" for="inicial">Punto inicial Xo = </label>
          <div class="col-sm-3">
            <input name="inicial" id="inicial" type="text" class="form-control" onkeyup="graficar(this.value)" autofocus>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-5 control-label" for="errorRelativo">Error relativo Er = </label>
          <div class="col-sm-3">
            <input name="errorRelativo" id="errorRelativo" type="text" class="form-control" onkeyup="graficar(this.value)" autofocus>
          </div>
        </div>
        <div class="text-center">
          <input type="submit" class="btn btn-primary" value="Evaluar">
          <button type="button" class="btn btn-danger" onclick="borrar()">Borrar</button>
        </div>        
      </form>



      <br>
      <h3 class="text-center bg-primary">RESULTADO</h3>

      
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <th class="text-center">#</th>              
              <th class="text-center">Raíz</th>
              <th class="text-center">Error relativo</th>
            </tr>
          </thead>
          <tbody>
          <?php
          
          require "../../../models/validadorExpresiones/Evaluar.php";

          if (isset($_POST["funcion"]) && isset($_POST["inicial"]) && isset($_POST["errorRelativo"])) {

            // Obtengo la función a evaluar.
            $func = $_POST["funcion"];

            // Obtengo el punto a evaluar.
            $x0 = $_POST["inicial"];

            // Obtengo el error relativo.
            $error = $_POST["errorRelativo"];

            // Línea.
            $row = 0;

            // Iteraciones.
            $n = 100;

            // Variable auxiliar.
            $aux = 0;

            // Errores relativos.
            $errores = array();
            array_push($errores, 1);

            // Derivadas ( raíces ).
            $derivadas = array();
            array_push($derivadas, 0);

            // Creo una instancia de la clase Evaluar.php            
            $eval = new Evaluar();            

            while (0 < $n) {              
              if ($aux == 0) {
                echo "<tr class='text-center'><td>$row</td><td>".$derivadas[count($derivadas) - 1]."</td><td>".$errores[count($errores) - 1]."</td></tr>";

                $x0 = $x0 - ($eval->expression($func, $x0) / $eval->getDerived($func, $x0));              
                array_push($derivadas, $x0);

                $err = ($derivadas[count($derivadas) - 1] - $derivadas[count($derivadas) - 2]) /  $derivadas[count($derivadas) - 1];
                array_push($errores, $err);               

                $row++;
                $n--;
                $aux = 1;
              }
              else {
                $tmp = $x0 - ($eval->expression($func, $x0) / $eval->getDerived($func, $x0));
                array_push($derivadas, $x0);

                $err = ($tmp - $derivadas[count($derivadas) - 2]) /  $tmp;
                array_push($errores, $err);

                echo "<tr class='text-center'><td>$row</td><td>".$derivadas[count($derivadas) - 1]."</td><td>".$errores[count($errores) - 1]."</td></tr>";

                $x0 = $x0 - ($eval->expression($func, $x0) / $eval->getDerived($func, $x0));              
                array_push($derivadas, $x0);                

                $err = ($derivadas[count($derivadas) - 1] - $derivadas[count($derivadas) - 2]) /  $derivadas[count($derivadas) - 1];
                array_push($errores, $err);
                
                $row++;
                $n--;

                if ($error >= $errores[count($errores) - 1]) break;
              }                          
            }                                  
          }
          
          ?>          
          
            
          </tbody>
        </table>
      </div> <!-- table-responsive -->      

      <table>
        
      </table>
      
      <br><br><br><br><br><br><br><br>
      <div style="text-align: center;">
        <a id="boton" href="../videos.html" type="button" class="btn btn-lg" style="background: gray; color: white">Vídeos</a>
        <a id="boton" href="../documentos.html" type="button" class="btn btn-lg" style="background: #D40B3A; color: white">Documentos</a>        
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
