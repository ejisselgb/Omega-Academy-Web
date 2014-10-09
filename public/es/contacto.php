<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Este curso en línea propuesto por 5 estudiantes de ingeniería multimedia e ingeniería de sistemas de la universidad de San Buenaventura Cali, nace de la necesidad de implementar y compartir los conocimientos obtenidos hasta el momento para ofrecer una guía de trabajo para las generaciones futuras, que les permita aprender de forma dinámica y que a la vez sea una plataforma de apoyo para el docente.">
    <meta name="author" content="Omega Academy Group.">
    <link rel="icon" href="../img/icon.png">

    <title>Contacto | Omega Academy</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/navbar.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">
      
      <img id="banner"  src="../img/banner.png" class="img-responsive" alt="BANNER OMEGA ACADEMY">      
      <img id="bannerMovil" src="../img/bannerMovil.png" class="img-responsive" alt="BANNER OMEGA ACADEMY">

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
              <li><a href="index.html" style="color: white">Inicio</a></li>
              <li><a href="software.html" style="color: white">Software</a></li>
              <li><a href="videos.html" style="color: white">Vídeos</a></li>
              <li><a href="documentos.html" style="color: white">Documentos</a></li>                            
              <li><a href="nosotros.html" style="color: white">Nosotros</a></li>  
              <li><a href="https://github.com/frankdaza2/Omega-Academy-Web" target="_blank" style="color: white">Github</a></li>
              <li class="active2"><a href="contacto.php" style="color: #d40b3a">Contacto</a></li>                
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="active2"><a href="contacto.php" style="color: #d40b3a">Español</a></li>              
              <li><a href="../en/contact.php" style="color: white">English</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">

        <h1>Contacto</h1>
        <?php if (isset($_SESSION['enviado'])) {
          echo "<script>alert('¡Tu mensaje ha sido enviado exitosamente!');</script>";
          unset($_SESSION['enviado']);          
        } ?>
        <div class="row">
          <div class="col-md-6">
            <p class="lead text-justify">
              Tus opiniones son muy importantes para nosotros.
              Escríbenos tus inquietudes para ponernos en contacto.
            </p>
            <aside class="text-center">
            <a href="" target="_blank"><img src="../img/twitter.png" alt="TWITTER"></a>
            <a href="https://github.com/frankdaza2/Omega-Academy-Web" target="_blank"><img src="../img/github.png" alt="GITHUB"></a>
            <a href="https://www.facebook.com/omegacademyusb" target="_blank"><img src="../img/facebook.png" alt="FACEBOOK"></a>
            
                       
            </aside>
            <br>
          </div>
            <div class="col-md-6">
              <form method="post" action="formulario.php" role="form">
                <div class="form-group">
                  <input name="nombre" type="text" class="form-control" placeholder="Nombre completo (5 a 30 caracteres)" pattern=".{5,30}" maxlength="30" required>
                </div>            
                <div class="form-group">              
                  <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Correo electrónico" required>
                </div>
                <div class="form-group">              
                  <textarea name="texto" class="form-control" rows="6" maxlength="2048" placeholder="Escribe tus inquietudes (máximo 2048 caracteres)" required></textarea>
                </div>            
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
            </div> <!-- col-md-6 -->
        </div> <!-- row --> 
        
      </div>
      
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
    <script src="../js/collapse.js"></script>
    <script src="../js/transition.js"></script>
    <script src="../js/dropdown.js"></script>
  </body>
</html>
