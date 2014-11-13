<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Este curso en línea propuesto por 5 estudiantes de ingeniería multimedia e ingeniería de sistemas de la universidad de San Buenaventura Cali, nace de la necesidad de implementar y compartir los conocimientos obtenidos hasta el momento para ofrecer una guía de trabajo para las generaciones futuras, que les permita aprender de forma dinámica y que a la vez sea una plataforma de apoyo para el docente.">
    <meta name="author" content="Omega Academy Group.">
    <link rel="icon" href="../../img/icon.png">

    <title>Método de Montecarlo | Omega Academy</title>

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
              <li><a href="../contacto.php" style="color: white">Contacto</a></li>                   
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="active2"><a href="metodoMontecarlo.php" style="color: #d40b3a">Español</a></li>              
              <li><a href="../../en/apps/montecarloMethod.php" style="color: white">English</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>          
      
      <form method="POST" action="metodoMontecarlo.php" class="form-horizontal" role="form">          
        <legend><h2 class="text-center">Método de Montecarlo</h2></legend>
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
          <label class="col-sm-5 control-label" for="a">Límite inferior A</label>
          <div class="col-sm-3">
            <input name="a" type="text" class="form-control" id="a" <?php 
              if (isset($_POST['a'])) {
                echo 'value='.$_POST['a'];                
              }
            ?> required>          
          </div>
        </div>
        <div class="form-group">
          <label for="b" class="col-sm-5 control-label">Límite superior B</label>
          <div class="col-sm-3">
            <input name="b" type="text" class="form-control" id="b" <?php 
              if (isset($_POST['b'])) {
                echo 'value='.$_POST['b'];                
              }
            ?> required>
          </div>
        </div>
        <div class="form-group">
          <label for="puntos" class="col-sm-5 control-label">No. de puntos</label>
          <div class="col-sm-3">
            <input name="puntos" type="number" class="form-control" id="puntos" min="1" <?php 
              if (isset($_POST['puntos'])) {
                echo 'value='.$_POST['puntos'];
              }
            ?> required>      
          </div>
        </div>
        <div class="form-group">
          <label for="cota" class="col-sm-5 control-label">Cota superior de f(x) en [a,b]</label>
          <div class="col-sm-3">
            <input name="cota" type="number" class="form-control" id="cota" min="1" <?php 
              if (isset($_POST['cota'])) {
                echo 'value='.$_POST['cota'];
              }
            ?> required>      
          </div>
        </div>
        <div class="form-group">
          <div class="text-center">
            <input type="submit" class="btn btn-primary" value="EVALUAR">            
            <a href="metodoTrapecios.php" class="btn btn-danger">BORRAR</a>
          </div>
        </div>
      </form>

      <br>
      <?php       
        if (isset($_POST['funcion'])) {

          require '../../../models/validadorExpresiones/Evaluar.php';

          // Creo una instancia de Evaluar
          $eval = new Evaluar();

          // Función
          $funcion = $_POST['funcion'];
          // Límite inferior a
          $a = (float) $_POST['a'];
          // Límite superior b
          $b = (float) $_POST['b'];
          // Número de puntos
          $puntos = $_POST['puntos']; 
          // Cota superior de f(x)        
          $cota = $_POST["cota"];

          function montecarlo($a, $b, $puntos, $cota, $funcion, $eval) {
            $longitud = $b - $a;
            $xi = $a + lcg_value() * $longitud;            
            $ni = 0;
            
            for ($i=0; $i < $puntos ; $i++) { 
              $yi = lcg_value() * $cota;
              if ($yi <= $eval->expression($funcion, $xi)) {
                $ni++;
              }
            }
            return ($ni / $puntos) * ($longitud * $cota);
          }

          echo '<h3 class="text-center bg-primary">RESULTADO = '.montecarlo($a, $b, $puntos, $cota, $funcion, $eval).'</h3>';
        }        
      ?>
      


      <br><br><br><br>
      <div style="text-align: center;">
        <a id="boton" href="https://www.youtube.com/watch?v=7aHDyDYZqNM" target="_blank" type="button" class="btn btn-lg" style="background: gray; color: white">Vídeo</a>
        <a id="boton" href="../documentos/unidad13.pdf" target="_blank" type="button" class="btn btn-lg" style="background: #D40B3A; color: white">Documento</a>
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
    <script src="../../js/conversorBases.js"></script>
  </body>
</html>
