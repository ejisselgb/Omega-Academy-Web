<?php 

session_start();

?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Este curso en línea propuesto por 5 estudiantes de ingeniería multimedia e ingeniería de sistemas de la universidad de San Buenaventura Cali, nace de la necesidad de implementar y compartir los conocimientos obtenidos hasta el momento para ofrecer una guía de trabajo para las generaciones futuras, que les permita aprender de forma dinámica y que a la vez sea una plataforma de apoyo para el docente.">
    <meta name="author" content="Omega Academy Group.">
    <link rel="icon" href="../../img/icon.png">

    <title>Conversor de Bases Numéricas | Omega Academy</title>

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
              <li class="active2"><a href="validadorExpresiones.php" style="color: #d40b3a">Español</a></li>              
              <li><a href="../../en/apps/validadorExpresiones.php" style="color: white">English</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>

      <div class="row">
        <div class="col-md-4">
          <img src="../../img/table.png" alt="TABLA DE FUNCIONES" class="img-responsive">    
        </div>
        <div class="col-md-6">
          <form method="POST" action="../../../controllers/validadorExpresiones/validador1.php" class="form-horizontal">        
          <legend><h2 class="text-center">Validador de Expresiones</h2></legend>
          <div class="form-group">
            <label class="control-label col-sm-4" for="funcion">Ingrese la función f(u) = </label>
            <div class="col-sm-8">
              <input name="funcion" type="text" id="funcion" class="form-control" placeholder="Ejemplo: ( u^23 ) / sin (-u) " autofocus required>
            </div>            
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="x">Ingrese el valor para u = </label>
            <div class="col-sm-8">
              <input name="x" type="text" id="x" class="form-control">
            </div>            
          </div>        
          <div style="text-align: center;">
            <a href="index.php" class="btn btn-danger">BORRAR</a>
            <input type="submit" class="btn btn-primary" value="EVALUAR">
            <br><br><br><br>            
            <a href="../documentos/evaluador.pdf" target="_blank"><h2>Instrucciones de usuario.pdf</h2></a>
          </div>        
        </form>
        </div>
      </div>          

      <br>
      
      <section class="text-center">        
        <?php 

          if (isset($_SESSION["resultado"])) {            
            echo "<h2 class='text-center bg-danger'>RESULTADO</h2> <br>";
            echo "<div class='jumbotron'>";
            $i = 0;
            while ($i < count($_SESSION["resultado"])) {              
              echo $_SESSION["resultado"][$i];
              $i++;
              echo "<br>";
            }
            echo "</div>";
            unset($_SESSION["resultado"]);
          }

        ?>  
      </section>      

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
  </body>
</html>
