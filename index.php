<!DOCTYPE html>
<html lang="es">

<head>
  <?php
$setvar = array(
    "titulo" => "No más problemas con tu tesis",
    "follow" => "",
    "description" => "asesoria de tesis, tesis pregrado, tesis, tesis post grado, tesis maestria, maestrias ",
    "keywords" => "",
    "active" => [1, 0],
    "nav_home" => "nav-home",
);
require_once "templates/head_links.phtml";
?>

</head>

<body">

<section class="img-bg-cover w-100 d-flex align-items-center" id="container"
  style="background-image: url('./img/fondo.jpg');">
    <div class="container position-relative d-inline d-md-flex">
      <div class="col-12 col-md-4 col-lg-6 mt-auto">
        <div class="text-center py-3 py-md-5 d-block d-md-none">
          <img src="./img/logo.png" class="img-fluid">
        </div>
        <div class="text-left titulo_2 t-vinkel py-3 py-md-5">
        <h1 class="h1 fw-800">
          <span class="d-block">No más</span>
          <span class="d-block">problemas</span>
         <span class="text-danger">con tu tesis</span>
       </h1>
           <!--
            <h1 class="h1 fw-800"> No más </h1>
          <h1 class="h1 fw-800"> problemas </h1>
          <h1 class="h1 text-danger fw-800"> con tu tesis. </h1>
          -->
        </div>
        <div class="text-center py-3 py-md-5 d-none d-md-block">
          <img src="./img/logo.png" class="img-fluid">
        </div>
      </div>
      <div class="col-12 col-md-8 col-lg-6 px-0 px-md-2">
        <?php require_once "templates/form-contact.phtml";?>
      </div>
    </div>

</section>

  <?php require_once "templates/foot_links.phtml";?>

  <!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1458987850977225');
  fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1458987850977225&ev=PageView&noscript=1"
  /></noscript>
  <!-- End Facebook Pixel Code -->

</body>

</html>