<?php

/**
 * [Api Index Auth  Generada]
 * Autor: Armando E. Pisfil Puemape
 * twitter: @armandoaepp
 * email: armandoaepp@gmail.com
*/

  header('content-type: application/json; charset=utf-8');
  require_once '../../autoload.php';

if(isset($_GET["accion"]))
{
    $evento = $_GET["accion"];
}
elseif (isset($_POST))
{
  $inputs = json_decode(file_get_contents("php://input"));
  $evento = $inputs->accion;
}

switch($evento)
{
  case "list":
    try
    {
      $suscriptor_controller = new SuscriptorController() ;

       $data = $suscriptor_controller->getAll() ;

      $data = array('msg' => 'Listado correcto', 'error' => false, 'data' => $data);
    }
    catch (Exception $e)
    {
      $data = array('msg' => 'Error al consultar datos'. $e->getMessage(), 'error' => true, 'data' => array());
    }

    $jsn  = json_encode($data);
    print_r($jsn) ;
  break;

  case "set":

    try
    {
      $connection = new Connection();
      $cnx = $connection->getConnection();

      $suscriptor_controller = new SuscriptorController($cnx) ;
      $connection->beginTransaction();

      // $suscriptor_id = $inputs->suscriptor_id;
      $nombre     = $inputs->nombre;
      $carrera    = $inputs->carrera ;
      $celular    = $inputs->celular;
      $grado      = $inputs->grado;
      $email      = $inputs->email;

      $params = array(
                'nombre'        => $nombre,
                'carrera'       => $carrera,
                'celular'       => $celular,
                'grado'         => $grado,
                'email'         => $email,
              ) ;

      $data = $suscriptor_controller->save($params) ;

      $connection->commit();

      $data = array('msg' => 'Operación Correcta', 'error' => false, 'data' => $data);
    }
    catch (Exception $e)
    {
      $connection->rollback();
      $data = array('msg' => 'Error al consultar datos'. $e->getMessage(), 'error' => true, 'data' => array());
    }

    sendMail($params);

    $jsn  = json_encode($data);
    print_r($jsn) ;
  break;

  case "upd":
    try
    {
      $connection = new Connection();
      $cnx = $connection->getConnection();

      $suscriptor_controller = new SuscriptorController($cnx) ;
      $connection->beginTransaction();

      $suscriptor_id  = $inputs->suscriptor_id;
      $nombre         = $inputs->nombre;
      $carrera        = $inputs->carrera;
      $celular        = $inputs->celular;
      $grado          = $inputs->grado;
      $email          = $inputs->email;
      $created_at     = $inputs->created_at;

      $params = array(
                'suscriptor_id' => $suscriptor_id,
                'nombre'        => $nombre,
                'carrera'       => $carrera,
                'celular'       => $celular,
                'grado'         => $grado,
                'email'         => $email,
                'created_at'    => $created_at,
              ) ;

      $data = $suscriptor_controller->update($params) ;

      $connection->commit();

      $data = array('msg' => 'Operación Correcta', 'error' => false, 'data' => $data);

    }
    catch (Exception $e)
    {
      $connection->rollback();
      $data = array('msg' => 'Error al consultar datos'. $e->getMessage(), 'error' => true, 'data' => array());
    }

    $jsn  = json_encode($data);
    print_r($jsn) ;
  break;

  case "updestado":
    try
    {

      $suscriptor_id = $inputs->suscriptor_id;
      $estado = $inputs->estado;

      $params = array(
                'suscriptor_id' => $suscriptor_id,
                'estado'        => $estado,
              ) ;

      $suscriptor_controller = new SuscriptorController() ;

      $data = $suscriptor_controller->updateEstado( $params ) ;

      $data = array('msg' => 'Operación Correcta', 'error' => false, 'data' => $data);

    }
    catch (Exception $e)
    {
      $data = array('msg' => 'Error al consultar datos'. $e->getMessage(), 'error' => true, 'data' => array());
    }

    $jsn  = json_encode($data);
    print_r($jsn) ;
  break;

  case "find":
    try
    {

      $id = $_GET["id"] ;
      $suscriptor_controller = new SuscriptorController() ;

      $data = $suscriptor_controller->find( $id) ;

      $data = array('msg' => 'Operación Correcta', 'error' => false, 'data' => $data);

    }
    catch (Exception $e)
    {
      $data = array('msg' => 'Error al consultar datos'. $e->getMessage(), 'error' => true, 'data' => array());
    }

    $jsn  = json_encode($data);
    print_r($jsn) ;
  break;

  case "delete":
    try
    {

      $suscriptor_id = $inputs->id;
      $estado = $inputs->estado;

      if($estado == 1){
        $estado = 0 ;
      }else{
        $estado = 1 ;
      }

      $params = array(
                'suscriptor_id'=> $suscriptor_id,
                'estado'=> $estado,
              ) ;

      $suscriptor_controller = new SuscriptorController() ;


			$historial = (int)isset($inputs->historial) ? $inputs->historial : 1 ;

			if( $historial == 0 )
			{

        $suscriptor = $suscriptor_controller->find( $suscriptor_id );

        $data = $suscriptor_controller->deleteById( $suscriptor_id );

			}
			else
			{
				$data = $suscriptor_controller->updateEstado($params);
			}

      $data = array('msg' => 'Operación Correcta', 'error' => false, 'data' => $data);

    }
    catch (Exception $e)
    {
            $data = array('msg' => 'Error al consultar datos'. $e->getMessage(), 'error' => true, 'data' => array());
    }

        $jsn  = json_encode($data);
        print_r($jsn) ;
  break;

}

function sendMail( $params   ){

  extract( $params);

  $template_mail = RenderTemplate::getTemplate(APP.'views/mails/mail-contacto') ;

  $data = array(
    'nombre'  => $nombre,
    'carrera' => $carrera,
    'celular' => $celular,
    'grado'   => $grado,
    'email'   => $email,
  ) ;

  $BODY_MSJ = RenderTemplate::render( $template_mail, $data) ;

  // var_dump($BODY_MSJ);
  var_dump($data);

  $header = "MIME-Version: 1.0\r\n";
  $header .= "Content-type: text/html; charset=utf-8\r\n";
  $header .= "X-Priority: 3\n";
  $header .= "X-MSMail-Priority: Normal\n";
  $header .= "X-Mailer:PHP/".phpversion()."\n";
  $header .= "From: AsesoraT <contacto@asesorat.com.pe> \r\n";
  $header .= "Cc: ".$email ." \r\n";
  $header .= "Bcc: ".$email ." \r\n";

  $to = "contacto@asesorat.com.pe";
  // $to = "gerssonoliva@gmail.com";
  mail($to,"Asesorat: Datos de consulta - web ",utf8_decode($BODY_MSJ),$header);

}
