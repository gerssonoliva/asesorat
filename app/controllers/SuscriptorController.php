<?php

/**
 * [Class Controller Generada]
 * Autor: Armando E. Pisfil Puemape
 * twitter: @armandoaepp
 * email: armandoaepp@gmail.com
*/

 class SuscriptorController
{
  private $cnx;

  public function __construct($cnx = null)
  {
    $this->cnx = $cnx;
  }
    
  public function getAll()
  {
    try
    {
      $suscriptor  = new Suscriptor();

      $data = $suscriptor->getAll();

      return $data ;
    }
    catch (Exception $e)
    {
      throw new Exception($e->getMessage());
    }
  }

  public function getByEstado( $params = array() )
  {
    try
    {
            
      extract($params) ; 

      $suscriptor  = new Suscriptor();
            
      $bean_suscriptor = new BeanSuscriptor();
            
      $bean_suscriptor->setEstado($estado);

      $data = $suscriptor->getByEstado($bean_suscriptor);

      return $data ;
    }
    catch (Exception $e)
    {
      throw new Exception($e->getMessage());
    }
  }

  public function save($params = array() )
  {
    try
    {
            
      extract($params) ; 

      $suscriptor  = new Suscriptor($this->cnx);

      $bean_suscriptor = new BeanSuscriptor();
            
      $bean_suscriptor->setNombre($nombre);
      $bean_suscriptor->setCarrera($carrera);
      $bean_suscriptor->setCelular($celular);
      $bean_suscriptor->setGrado($grado);
      $bean_suscriptor->setEmail($email);
            
      $data = $suscriptor->save($bean_suscriptor) ;

      return $data ;
    }
    catch (Exception $e)
    {
        throw new Exception($e->getMessage());
    }
  }

  public function update($params = array())
  {
    try
    {
            
      extract($params) ; 

      $suscriptor  = new Suscriptor($this->cnx);
      $bean_suscriptor = new BeanSuscriptor();
            
      $bean_suscriptor->setSuscriptorId($suscriptor_id);
      $bean_suscriptor->setNombre($nombre);
      $bean_suscriptor->setCarrera($carrera);
      $bean_suscriptor->setCelular($celular);
      $bean_suscriptor->setGrado($grado);
      $bean_suscriptor->setEmail($email);
     
      $data = $suscriptor->update($bean_suscriptor) ;
            
      return $data;
    }
    catch (Exception $e)
    {
      throw new Exception($e->getMessage());
    }
  }

  public function updateEstado($params = array())
  {
    try
    {
            
      extract($params) ; 

      $suscriptor  = new Suscriptor($this->cnx);
            
      $bean_suscriptor = new BeanSuscriptor();
            
      $bean_suscriptor->setSuscriptorId($suscriptor_id);
      $bean_suscriptor->setEstado($estado);

      $data = $suscriptor->updateEstado($bean_suscriptor) ;
            
      return $data;
    }
    catch (Exception $e)
    {
      throw new Exception($e->getMessage());
    }
  }

  public function find($id)
  {
    try
    {
      $suscriptor  = new Suscriptor();

      $bean_suscriptor = new BeanSuscriptor();

      $bean_suscriptor->setSuscriptorId($id);

      $data = $suscriptor->find( $bean_suscriptor) ;
      return $data;

    }
    catch (Exception $e)
    {
      throw new Exception($e->getMessage());
    }
  }

  public function deleteById($suscriptor_id)
  {
    try
    {

      $suscriptor  = new Suscriptor();

      $bean_suscriptor = new BeanSuscriptor();

      $bean_suscriptor->setSuscriptorId($suscriptor_id);

      $data = $suscriptor->deleteById( $bean_suscriptor ) ;

      return $data;

    }
    catch (Exception $e)
    {
      throw new Exception($e->getMessage());
    }
  }

}
