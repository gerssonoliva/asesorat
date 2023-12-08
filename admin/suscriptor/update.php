
<?php
  require_once "../sesion_admin.php";
  loginRedirect("../login.php");

  if (!isset($_POST)) {
    header("Location: admin/suscriptor/suscriptor.php ", true, 301);
  }

  require_once "../../app/autoload.php";

  $suscriptor_controller = new SuscriptorController();

  $suscriptor_id = !empty($_POST["id"]) ? $_POST["id"]: 0 ;

  $nombre   = $_POST["nombre"] ;
  $carrera      = $_POST["carrera"] ;
  $celular      = $_POST["celular"] ;
  $grado = $_POST["grado"] ;
  $email    = $_POST["email"] ;
  
  $params = array(
    "suscriptor_id"   => $suscriptor_id,
    "nombre"   => $nombre,
    "carrera"   => $carrera,
    "celular"   => $celular,
    "grado"   => $grado,
    "email"   => $email,
  );


  $response = $suscriptor_controller->update($params);

  if($response)
  {

    if( !empty($imagen) && $imagen != $img_bd )
    {
      $status = UploadFiles::removeFile($img_bd) ;
    }

    header("Location: ./suscriptor.php ", true, 301);
  }
  else {
  echo "A Sucedido un Error al Rehgistrar". $response ;
  }
