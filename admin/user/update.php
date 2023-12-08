
<?php
  require_once "../sesion_admin.php";
  loginRedirect("../login.php");

  if (!isset($_POST)) {
    header("Location: admin/user/user.php ", true, 301);
  }

  require_once "../../app/autoload.php";

  $user_controller = new UserController();

  $user_id = !empty($_POST["id"]) ? $_POST["id"]: 0 ;

  $nombre      = $_POST["nombre"] ;
  $apellidos   = $_POST["apellidos"] ;
  $email       = $_POST["email"] ;
  // $password = $_POST["password"] ;´

  $params = array(
    "user_id"     => $user_id,
    "nombre"      => $nombre,
    "apellidos"   => $apellidos,
    "email"       => $email,
    // "password" => $password,
  );


  $response = $user_controller->update($params);

  if($response)
  {

    if( !empty($imagen) && $imagen != $img_bd )
    {
      $status = UploadFiles::removeFile($img_bd) ;
    }

    header("Location: ./user.php ", true, 301);
  }
  else {
    echo "A Sucedido un Error al Rehgistrar". $response ;
  }
