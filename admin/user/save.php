
<?php
  require_once "../sesion_admin.php";
  loginRedirect("../login.php");

  if (!isset($_POST)) {
    header("Location: admin/user/user.php ", true, 301);
  }

  require_once "../../app/autoload.php";

  $user_controller = new UserController();

  $nombre    = $_POST["nombre"] ;
  $apellidos = $_POST["apellidos"] ;
  $email     = $_POST["email"] ;
  $password  = $_POST["password"] ;

  $params = array(
    "nombre"    => $nombre,
    "apellidos" => $apellidos,
    "email"     => $email,
    "password"  => $password,
  );


  $response = $user_controller->save($params);

  if($response){
    header("Location: ./user.php ", true, 301);
  }
  else {
  echo "A Sucedido un Error al Rehgistrar". $response ;
  }
