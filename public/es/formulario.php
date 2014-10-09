<?php       
session_start();

if (isset($_POST['email'])) {
  // Variables del formulario
  $nombre = utf8_decode($_POST["nombre"]);
  $email = $_POST["email"];
  $texto = utf8_decode($_POST["texto"]);

  // Agrego el nombre y el email al mensaje
  $mensaje = "Nombre: ".$nombre."\n"."Email: ".$email."\n\n".$texto;

  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {    
    mail("omega.academy.usb@gmail.com", "Mensaje de Omega Academy", $mensaje, "From: omega-academy.co");          
    $_SESSION['enviado'] = true;
    header("Location: contacto.php");
  }        
  header("Location: contacto.php");
}