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
      $video_controller = new VideoController() ; 

       $data = $video_controller->getAll() ;

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
        
      $video_controller = new VideoController($cnx) ; 
      $connection->beginTransaction();
        
      $video_id = $inputs->video_id;
      $titulo = $inputs->titulo;
      $descripcion = $inputs->descripcion;
      $tipo_video = $inputs->tipo_video;
      $url = $inputs->url;
        
      $params = array(
                'video_id'=> $video_id,
                'titulo'=> $titulo,
                'descripcion'=> $descripcion,
                'tipo_video'=> $tipo_video,
                'url'=> $url,
              ) ; 
        
      $data = $video_controller->save($params) ;
        
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
        
      $video_controller = new VideoController($cnx) ; 
      $connection->beginTransaction();
        
      $video_id = $inputs->video_id;
      $titulo = $inputs->titulo;
      $descripcion = $inputs->descripcion;
      $tipo_video = $inputs->tipo_video;
      $url = $inputs->url;
        
      $params = array(
                'video_id'=> $video_id,
                'titulo'=> $titulo,
                'descripcion'=> $descripcion,
                'tipo_video'=> $tipo_video,
                'url'=> $url,
              ) ; 
        
      $data = $video_controller->update($params) ;
        
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

      $video_id = $inputs->video_id;
      $estado = $inputs->estado;

      $params = array(
                'video_id'=> $video_id,
                'estado'=> $estado,
              ) ; 

      $video_controller = new VideoController() ; 

      $data = $video_controller->updateEstado( $params ) ;

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
      $video_controller = new VideoController() ; 

      $data = $video_controller->find( $id) ;

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

      $video_id = $inputs->id;
      $estado = $inputs->estado; 

      if($estado == 1){
        $estado = 0 ;
      }else{
        $estado = 1 ;
      }

      $params = array(
                'video_id'=> $video_id,
                'estado'=> $estado,
              ) ; 

      $video_controller = new VideoController() ; 


			$historial = (int)isset($inputs->historial) ? $inputs->historial : 1 ;

			if( $historial == 0 )
			{

        $video = $video_controller->find( $video_id );

        $data = $video_controller->deleteById( $video_id );

			}
			else
			{
				$data = $video_controller->updateEstado($params);
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
