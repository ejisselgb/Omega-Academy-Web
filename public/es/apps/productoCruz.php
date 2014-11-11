<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Este curso en línea propuesto por 5 estudiantes de ingeniería multimedia e ingeniería de sistemas de la universidad de San Buenaventura Cali, nace de la necesidad de implementar y compartir los conocimientos obtenidos hasta el momento para ofrecer una guía de trabajo para las generaciones futuras, que les permita aprender de forma dinámica y que a la vez sea una plataforma de apoyo para el docente.">
    <meta name="author" content="Omega Academy Group.">
    <link rel="icon" href="../../img/icon.png">

    <title>Producto Cruz | Omega Academy</title>

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
              <li class="active2"><a href="productoCruz.php" style="color: #d40b3a">Español</a></li>              
              <li><a href="../../en/apps/crossProduct.php" style="color: white">English</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>                
    
      <form method="POST" action="productoCruz.php" class="form-inline text-center" role="form">
        <legend><h2>Producto Cruz</h2></legend>        
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">I</th>
              <th class="text-center">J</th>
              <th class="text-center">K</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="text" name="x1" id="x1" placeholder="X1" class="form-control" <?php 
                if (isset($_POST["x1"])) {
                  echo "value=".$_POST["x1"];
                }
              ?> required></td>
              <td><input type="text" name="y1" id="y1" placeholder="Y1" class="form-control" <?php 
                if (isset($_POST["y1"])) {
                  echo "value=".$_POST["y1"];
                }
              ?> required></td>
              <td><input type="text" name="z1" id="z1" placeholder="Z1" class="form-control" <?php
                if (isset($_POST["z1"])) {
                  echo "value=".$_POST["z1"];
                }
              ?> required></td>
            </tr>
            <tr>
              <td><input type="text" name="x2" id="x2" placeholder="X2" class="form-control" <?php 
                if (isset($_POST["x2"])) {
                  echo "value=".$_POST["x2"];
                }
              ?> required></td>
              <td><input type="text" name="y2" id="y2" placeholder="Y2" class="form-control" <?php 
                if (isset($_POST["y2"])) {
                  echo "value=".$_POST["y2"];
                }
              ?> required></td>
              <td><input type="text" name="z2" id="z2" placeholder="Z2" class="form-control" <?php 
                if (isset($_POST["z2"])) {
                  echo "value=".$_POST["z2"];
                }
              ?> required></td>
            </tr>
          </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Producto Cruz</button>
      </form>


<?php 
if (isset($_POST["x1"]) && isset($_POST["x2"]) && isset($_POST["y1"]) && isset($_POST["y1"]) && isset($_POST["z1"]) && isset($_POST["z1"]) ) {
  $x1 = $_POST["x1"];
  $x2 = $_POST["x2"];
  $y1 = $_POST["y1"];
  $y2 = $_POST["y2"];
  $z1 = $_POST["z1"];
  $z2 = $_POST["z2"];

  if ((-($x1*$z2) + $x2*$z1) > 0 ) {
    echo "<br><h2 class='bg-primary text-center'>Resultado = ".($y1*$z2 - $y2*$z1)."I + ".(-($x1*$z2) + $x2*$z1 )."J + ".($x1*$y2 - $x2*$y1)."K</h2>";  
  } else {
      echo "<br><h2 class='bg-primary text-center'>Resultado = ".($y1*$z2 - $y2*$z1)."I ".(-($x1*$z2) + $x2*$z1 )."J + ".($x1*$y2 - $x2*$y1)."K</h2>";  
  }

  
}
?>




      <br><br>
      <div style="text-align: center;">
        <a id="boton" href="http://www.youtube.com/watch?v=yEyCnQ3bfS0" target="_blank" type="button" class="btn btn-lg" style="background: gray; color: white">Vídeo</a>
        <a id="boton" href="../documentos/unidad1.pdf" target="_blank" type="button" class="btn btn-lg" style="background: #D40B3A; color: white">Documento</a>        
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
    <script src="../../js/matrices/suma.js"></script>
  </body>
</html>
