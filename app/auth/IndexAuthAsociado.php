<?php

/**
 * [Api Auth Generada]
 * Autor: Armando E. Pisfil Puemape
 * twitter: @armandoaepp
 * email: armandoaepp@gmail.com
*/

  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
  header('content-type: application/json; charset=utf-8');

  date_default_timezone_set('America/Lima');

  require_once "../autoload.php";

if(isset($_GET["accion"]))
{
  $evento = $_GET["accion"];
}
elseif (isset($_POST))
{
  $inputs = json_decode(file_get_contents("php://input"));
  $jsn  = json_encode($inputs);
  $evento = $inputs->accion;
}

// $email = 'armandoaepp@gmail.com' ;
// $password = 'armando' ;

switch($evento)
{

  case "login":
    try{
      session_start();
      $mensaje = "Ya haz iniciado sesión";

      if (empty($_SESSION['LOGINASOCIADO'])  && empty($_SESSION['USERASOCIADO']) )
      {

        $auth_asociado_controller = new AuthAsociadoController();

        $email    = $inputs->email;
        $password = $inputs->password;

        $params = array(
          'email'    => $email,
          'password' => $password,
        );

        $user = $auth_asociado_controller->login($params);


        if($user)
        {
          $_SESSION['LOGINASOCIADO'] = true;
          $_SESSION['USERASOCIADO']  = $user;
          $mensaje = "Incio de sesión correcto" ;

        }else
        {
          $_SESSION['LOGINASOCIADO'] = false;
          $_SESSION['USERASOCIADO']  = array();
          $mensaje = "Verificar Usuario o Contraseña";
        }

      }


      $response = array('msg' => $mensaje, 'error' => false, 'data' => array("login" => $_SESSION['LOGINASOCIADO']));


    }catch (Exception $e)
    {
        $response = array('msg' => $e->getMessage(), 'error' => true, 'data' => array("login" => false));
    }

    $jsn  = json_encode($response);
    print_r($jsn) ;
  break;

  case "logout":

    try{
      session_start();
      // Finalmente, destruir la sesión.
      // session_destroy();
      unset($_SESSION['LOGINASOCIADO']);
      unset($_SESSION['USERASOCIADO']);


      $mensaje = "Sesión cerrada correctamente";

      $sesion_status = "";
      if (!empty($_SESSION['LOGINASOCIADO']))
      {
        $sesion_status = $_SESSION['LOGINASOCIADO'];
      }

      $response = array('msg' => $mensaje, 'error' => false, 'data' => array("login" => $sesion_status));

    }catch (Exception $e)
    {
      $response = array('msg' => $e->getMessage(), 'error' => true, 'data' => array("login" => false));
    }

    $jsn  = json_encode($response);
    print_r($jsn) ;
  break;

}
