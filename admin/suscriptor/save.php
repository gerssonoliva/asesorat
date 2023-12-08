
<?php
  require_once "../sesion_admin.php";
  loginRedirect("../login.php");

  if (!isset($_POST)) {
    header("Location: admin/suscriptor/suscriptor.php ", true, 301);
  }

  require_once "../../app/autoload.php";

  $suscriptor_controller = new SuscriptorController();

  $nombre   = $_POST["nombre"] ;
  $carrera      = $_POST["carrera"] ;
  $celular      = $_POST["celular"] ;
  $grado      = $_POST["grado"] ;
  $email    = $_POST["email"] ;

  $params = array(
    "nombre"   => $nombre,
    "carrera"   => $carrera,
    "celular"   => $celular,
    "grado"   => $grado,
    "email"   => $email,
  );


  $response = $suscriptor_controller->save($params);

  if($response){
    header("Location: ./suscriptor.php ", true, 301);
  }
  else {
  echo "A Sucedido un Error al Rehgistrar". $response ;
  }
