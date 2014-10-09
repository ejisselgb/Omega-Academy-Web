<?php 

  session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This online course was design by 5 students from Systems Engineering and Multimedia Engineering from the University San Buenaventura, Cali - Colombia.  It was created to fulfill the need to implement and share the knowledge obtained up until now, also to offer a work guide for future generations that would allow them to learn in a dynamic way and so it can be a support guide for the professor.">
    <meta name="author" content="Omega Academy Group.">
    <link rel="icon" href="../../img/icon.png">

    <title>Expression Evaluator | Omega Academy</title>

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
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="../../es/apps/validadorExpresiones.php" style="color: white">Español</a></li>              
              <li class="active2"><a href="expressionValidator.php" style="color: #d40b3a">English</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>          
      
      <div class="row">
        <div class="col-md-4">
          <img src="../../img/table2.png" alt="TABLA DE FUNCIONES" class="img-responsive">    
        </div>
        <div class="col-md-6">

          <form method="POST" action="../../../controllers/validadorExpresiones/validador2.php" class="form-horizontal">        
            <legend><h2 class="text-center">Expression Evaluator</h2></legend>
            <div class="form-group">
              <label class="control-label col-sm-4" for="funcion">Type in function f(x) = </label>
              <div class="col-sm-8">
                <input name="funcion" type="text" id="funcion" class="form-control" placeholder="Example: ( x^23 ) / sin (-x) " <?php 
                  if (isset($_SESSION["funcion"])) {
                    echo "value=".$_SESSION["funcion"];
                    unset($_SESSION["funcion"]);
                  }
                ?> autofocus required>
              </div>            
            </div>
            <div class="form-group">
              <label class="control-label col-sm-4" for="x">Type in the value for x:</label>
              <div class="col-sm-8">
                <input name="x" type="text" id="x" class="form-control" placeholder="Default value x = 0" <?php 
                  if (isset($_SESSION["x"])) {
                    echo "value=".$_SESSION["x"];
                    unset($_SESSION["x"]);
                  }
                ?>>
              </div>            
            </div>        
            <div style="text-align: center;">
              <input type="submit" class="btn btn-primary" value="EVALUATE">
              <a href="index.php" class="btn btn-danger">DELETE</a>              
              <br><br><br><br>
              <?php 
                  if (isset($_SESSION["resultado"])) {                              
                    echo $_SESSION["resultado"];
                    unset($_SESSION["resultado"]);
                  }
              ?>
              <br><br>          
              <a href="../documents/evaluator.pdf" target="_blank"><h2>User instructions.pdf</h2></a>
            </div>        
          </form>
        
        </div>
      </div>          

      <br>     

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
  </body>
</html>
