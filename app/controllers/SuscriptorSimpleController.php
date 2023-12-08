<?php

/**
 * [Class Controller Generada]
 * Autor: Armando E. Pisfil Puemape
 * twitter: @armandoaepp
 * email: armandoaepp@gmail.com
*/

 class SuscriptorSimpleController
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
      $suscriptor_simple  = new SuscriptorSimple();

      $data = $suscriptor_simple->getAll();

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

      $suscriptor_simple  = new SuscriptorSimple();
            
      $bean_suscriptor_simple = new BeanSuscriptorSimple();
            
      $bean_suscriptor->setEstado($estado);

      $data = $suscriptor_simple->getByEstado($bean_suscriptor_simple);

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

      $suscriptor_simple  = new SuscriptorSimple($this->cnx);

      $bean_suscriptor_simple = new BeanSuscriptorSimple();      
      
      $bean_suscriptor_simple->setEmail($email);
            
      $data = $suscriptor_simple->save($bean_suscriptor_simple) ;

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

      $suscriptor_simple  = new SuscriptorSimple($this->cnx);
      $bean_suscriptor_simple = new BeanSuscriptorSimple();
            
      $bean_suscriptor_simple->setSuscriptorId($suscriptor_id);
      $bean_suscriptor_simple->setEmail($email);

      $data = $suscriptor_simple->update($bean_suscriptor_simple) ;
            
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

      $suscriptor_simple  = new SuscriptorSimple($this->cnx);
            
      $bean_suscriptor_simple = new BeanSuscriptorSimple();
            
      $bean_suscriptor_simple->setSuscriptorId($suscriptor_id);
      $bean_suscriptor_simple->setEstado($estado);

      $data = $suscriptor_simple->updateEstado($bean_suscriptor_simple) ;
            
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
      $suscriptor_simple  = new SuscriptorSimple();

      $bean_suscriptor_simple = new BeanSuscriptorSimple();

      $bean_suscriptor_simple->setSuscriptorId($id);

      $data = $suscriptor_simple->find( $bean_suscriptor_simple) ;
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

      $suscriptor_simple  = new SuscriptorSimple();

      $bean_suscriptor_simple = new BeanSuscriptorSimple();

      $bean_suscriptor_simple->setSuscriptorId($suscriptor_id);

      $data = $suscriptor_simple->deleteById( $bean_suscriptor_simple ) ;

      return $data;

    }
    catch (Exception $e)
    {
      throw new Exception($e->getMessage());
    }
  }

}
