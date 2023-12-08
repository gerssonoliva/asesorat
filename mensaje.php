<!DOCTYPE html>
<html lang="es">

<head>
  <?php
$setvar = array(
    "titulo" => "Asesorat",
    "follow" => "",
    "description" => "Landing Asesorat",
    "keywords" => "",
    "active" => [1, 0],
    "nav_home" => "nav-home",
);
require_once "templates/head_links.phtml";
?>

</head>

<body">

<section class="img-bg-cover w-100 d-flex align-items-center" id="container"
  style="background-image: url('./img/fondo.png');">
    
        <div class="container text-center titulo_2 t-vinkel py-3 py-md-5">
          <h1 class="h3 fw-800"> Gracias por dejarnos tus datos, </h1>
          <h1 class="h3 fw-800"> un especialista en desarrollo de tesis se comunicará contigo a la brevedad. </h1>
          <h1 class="h3 text-danger fw-800"> Visita nuestra página web: <a href="https://asesorat.com.pe/" class="text-decoration-none titulo_2">www.asesorat.com.pe</a> </h1>
          <div class="text-center py-3 py-md-5 d-none d-md-block">
            <img src="./img/logo.png" class="img-fluid">
          </div>
        </div>
       
</section>

  <?php require_once "templates/foot_links.phtml";?>

</body>

</html>