<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This online course was design by 5 students from Systems Engineering and Multimedia Engineering from the University San Buenaventura, Cali - Colombia.  It was created to fulfill the need to implement and share the knowledge obtained up until now, also to offer a work guide for future generations that would allow them to learn in a dynamic way and so it can be a support guide for the professor.">
    <meta name="author" content="Omega Academy Group.">
    <link rel="icon" href="../../img/icon.png">

    <title>Simpson Method | Omega Academy</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/navbar.css" rel="stylesheet">

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
              <li><a href="../documents.html" style="color: white">Documents</a></li>                            
              <li><a href="../about.html" style="color: white">About us</a></li>
              <li><a href="https://github.com/frankdaza2/Omega-Academy-Web" target="_blank" style="color: white">Github</a></li>
              <li><a href="../contact.php" style="color: white">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="../../es/apps/metodoSimpson38.php" style="color: white">Español</a></li>              
              <li class="active2"><a href="simpsonMethod38.php" style="color: #d40b3a">English</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>          
      
      <form method="POST" action="simpsonMethod38.php" class="form-horizontal" role="form">          
        <legend><h2 class="text-center">Simpson Method 3/8</h2></legend>
        <div class="form-group">
          <label class="col-sm-5 control-label" for="funcion">Function f(x) = </label>
          <div class="col-sm-3">
            <input name="funcion" type="text" class="form-control" id="funcion" <?php 
              if (isset($_POST['funcion'])) {
                echo 'value='.$_POST['funcion'];                
              }
            ?> required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-5 control-label" for="a">Lower limit A</label>
          <div class="col-sm-3">
            <input name="a" type="text" class="form-control" id="a" <?php 
              if (isset($_POST['a'])) {
                echo 'value='.$_POST['a'];                
              }
            ?> required>          
          </div>
        </div>
        <div class="form-group">
          <label for="b" class="col-sm-5 control-label">Upper limit B</label>
          <div class="col-sm-3">
            <input name="b" type="text" class="form-control" id="b" <?php 
              if (isset($_POST['b'])) {
                echo 'value='.$_POST['b'];                
              }
            ?> required>
          </div>
        </div>
        <div class="form-group">
          <label for="particiones" class="col-sm-5 control-label">Number of partitions</label>
          <div class="col-sm-3">
            <input name="particiones" type="number" class="form-control" id="particiones" min="3" step="2" <?php 
              if (isset($_POST['particiones'])) {
                echo 'value='.$_POST['particiones'];
              }
            ?> required>      
          </div>
        </div>        
        <div class="form-group">
          <div class="text-center">
            <input type="submit" class="btn btn-primary" value="EVALUATE">            
            <a href="simpsonMethod.php" class="btn btn-danger">DELETE</a>
          </div>
        </div>
      </form>

<?php 
  if (isset($_POST["funcion"])) {
    $funcion = $_POST["funcion"];
    $a = $_POST["a"];
    $b = $_POST["b"];
    $n = $_POST["particiones"];

  
    require "../../../models/validadorExpresiones/Evaluar.php";

    $eval = new Evaluar();
    
    $h = ($b - $a) / $n;

    function simpson38($a, $b, $h, $funcion, $eval) {
      $x0 = $a;
      $f0 = $eval->expression($funcion, $x0);            

      $x1 = $x0 + $h;      
      $f1 = $eval->expression($funcion, $x0 + $h);
      $fx1 = $eval->expression($funcion, $x1);                  

      $x2 = $x1 + $h;
      $f2 = $eval->expression($funcion, $x1 + $h);
      $fx2 = $eval->expression($funcion, $x2);                  


      $x3 = $x2 + $h;
      $f3 = $eval->expression($funcion, $x3);                  

      if (round($x3) >= $b) {
        return (3 * $h / 8) * ($f0 + 3*$fx1 + 3*$fx2 + $f3);
      }
      else return simpson38($x3, $b, $h, $funcion, $eval);
      
    }

    echo '<h3 class="text-center bg-primary">RESULT = '.simpson38($a, $b, $h, $funcion, $eval).'</h3>';
    

  }
?>     
      

      <br>
      <div style="text-align: center;">
        <a id="boton" href="../videos.html" target="" type="button" class="btn btn-lg" style="background: gray; color: white">Video</a>
        <a id="boton" href="../documents.html" target="" type="button" class="btn btn-lg" style="background: #D40B3A; color: white">Document</a>        
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
        &copy; Omega Academy &middot; Together for knowledge. <br>
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
