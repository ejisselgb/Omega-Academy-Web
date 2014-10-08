<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Este curso en línea propuesto por 5 estudiantes de ingeniería multimedia e ingeniería de sistemas de la universidad de San Buenaventura Cali, nace de la necesidad de implementar y compartir los conocimientos obtenidos hasta el momento para ofrecer una guía de trabajo para las generaciones futuras, que les permita aprender de forma dinámica y que a la vez sea una plataforma de apoyo para el docente.">
    <meta name="author" content="Omega Academy Group.">
    <link rel="icon" href="../../img/icon.png">

    <title>Método de Muller | Omega Academy</title>

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
              <li class="active2"><a href="conversorBases.html" style="color: #d40b3a">Español</a></li>              
              <li><a href="../../en/apps/basesConverter.html" style="color: white">English</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>          
      
      <form method="POST" action="metodoMuller.php" class="form-horizontal" role="form">
        <legend><h2 class="text-center">Método de Muller</h2></legend>
        <div class="form-group">
          <label class="col-sm-5 control-label" for="funcion">Función f(x) = </label>
          <div class="col-sm-3">
            <input name="funcion" type="text" class="form-control" id="funcion" <?php 
              if (isset($_POST['funcion'])) {
                echo 'value='.$_POST['funcion'];
              }
            ?> required>          
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-5 control-label" for="xr">Xr = </label>
          <div class="col-sm-3">
            <input name="xr" type="text" class="form-control" id="xr" <?php 
              if (isset($_POST['xr'])) {
                echo 'value='.$_POST['xr'];
              }
            ?> required>          
          </div>
        </div>        
        <div class="form-group">
          <label for="eps" class="col-sm-5 control-label">eps = </label>
          <div class="col-sm-3">
            <input name="eps" type="text" class="form-control" id="eps" <?php 
              if (isset($_POST['eps'])) {
                echo 'value='.$_POST['eps'];
              }
            ?> required>
          </div>
        </div>        
        <div class="form-group">
          <div class="text-center">
            <input type="submit" class="btn btn-primary" value="ENVIAR">
            <a href="metodoMuller.php" class="btn btn-danger">BORRAR</a>            
          </div>
        </div>
      </form>
      <br>
      <div style="text-align: center;">
        <a id="boton" href="../videos.html" type="button" class="btn btn-lg" style="background: gray; color: white">Vídeos</a>
        <a id="boton" href="../documentos.html" type="button" class="btn btn-lg" style="background: #D40B3A; color: white">Documentos</a>        
      </div>



      <?php 

      if (isset($_POST['xr']) && isset($_POST['eps']) && isset($_POST['funcion'])) {
        $funcion = $_POST['funcion'];
        $xr = $_POST['xr'];        
        $eps = $_POST['eps'];

        $h = 0.01;
        $maxit = 50;

        require '../../../models/validadorExpresiones/Evaluar.php';

        // Instancio la clase evaluar
        $eval = new Evaluar();

        function muller($xr, $h, $eps, $maxit, $funcion, $eval) {
          $x2 = $xr;
          $x1 = $xr + ($h * $xr);
          $x0 = $xr - ($h * $xr);          
          $ite = 1;

          while (true) {            
            $h0 = $x1 + $x0;
            $h1 = $x2 - $x1;
            $d0 = ($eval->expression($funcion, $x1) - $eval->expression($funcion, $x0)) / $h0;
            $d1 = ($eval->expression($funcion, $x2) - $eval->expression($funcion, $x1)) / $h1;
            $a = ($d1 - $d0) / ($h1 + $h0);
            $b = ($a * $h1) + $d1;
            $c = $eval->expression($funcion, $x2);
            $rad = sqrt(($b * $b) - (4 * $a * $c));
            if (abs($b + $rad) > abs($b - $rad)) {
              $den = $b + $rad;
            }
            else {
              $den = $b - $rad;
            }
            $dxr = -2 * $c / $den;
            $xr = $x2 + $dxr;
            echo "<br>Iteraciones: $ite - Xr = $xr <br>";
            if ( abs($dxr) < ($eps * $xr) || $ite + 1 > $maxit) break;
            $x0 = $x1;
            $x1 = $x2;
            $x2 = $xr;
            $ite++;
          }                    
        }

        muller($xr, $h, $eps, $maxit, $funcion, $eval);

      }


      ?>

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
    <script src="../../js/conversorBases.js"></script>
  </body>
</html>
