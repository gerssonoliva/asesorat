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
      $suscriptor_simple_controller = new SuscriptorSimpleController() ;

       $data = $suscriptor_simple_controller->getAll() ;

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

      $suscriptor_simple_controller = new SuscriptorSimpleController($cnx) ;
      $connection->beginTransaction();

      // $suscriptor_id = $inputs->suscriptor_id;
      $email = !empty($inputs->email) ? $inputs->email : "";

      $params = array('email' => $email ) ;

      $data = $suscriptor_simple_controller->save($params) ;

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

  case "upd":
    try
    {
      $connection = new Connection();
      $cnx = $connection->getConnection();

      $suscriptor_simple_controller = new SuscriptorSimpleController($cnx) ;
      $connection->beginTransaction();

      $suscriptor_id = $inputs->suscriptor_id;
      $email = $inputs->email;
      $created_at = $inputs->created_at;

      $params = array(
                'suscriptorsimple_id'=> $suscriptor_id,
                'email'=> $email,
                'created_at'=> $created_at,
              ) ;

      $data = $suscriptor_simple_controller->update($params) ;

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
                'suscriptorsimple_id'=> $suscriptor_id,
                'estado'=> $estado,
              ) ;

      $suscriptor_simple_controller = new SuscriptorSimpleController() ;

      $data = $suscriptor_simple_controller->updateEstado( $params ) ;

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
      $suscriptor_simple_controller = new SuscriptorSimpleController() ;

      $data = $suscriptor_simple_controller->find( $id) ;

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
                'suscriptorsimple_id'=> $suscriptor_id,
                'estado'=> $estado,
              ) ;

      $suscriptor_simple_controller = new SuscriptorSimpleController() ;


			$historial = (int)isset($inputs->historial) ? $inputs->historial : 1 ;

			if( $historial == 0 )
			{

                $suscriptor = $suscriptor_simple_controller->find( $suscriptor_id );

                $data = $suscriptor_simple_controller->deleteById( $suscriptor_id );

			}
			else
			{
				$data = $suscriptor_simple_controller->updateEstado($params);
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
