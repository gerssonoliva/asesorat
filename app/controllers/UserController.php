<?php

/**
 * [Class Controller Generada]
 * Autor: Armando E. Pisfil Puemape
 * twitter: @armandoaepp
 * email: armandoaepp@gmail.com
*/

class UserController
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
      $user  = new User();

      $data = $user->getAll();

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

      $user  = new User();

      $bean_user = new BeanUser();

      $bean_user->setEstado($estado);

      $data = $user->getByEstado($bean_user);

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

      $user  = new User($this->cnx);

      $bean_user = new BeanUser();

      $bean_user->setNombre($nombre);
      $bean_user->setApellidos($apellidos);
      $bean_user->setEmail($email);
      $bean_user->setPassword($password);

      $data = $user->save($bean_user) ;
      
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

      $user  = new User($this->cnx);
      $bean_user = new BeanUser();

      $bean_user->setUserId($user_id);
      $bean_user->setNombre($nombre);
      $bean_user->setApellidos($apellidos);
      $bean_user->setEmail($email);
      // $bean_user->setPassword($password);

      $data = $user->update($bean_user) ;

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

      $user  = new User($this->cnx);

      $bean_user = new BeanUser();

      $bean_user->setUserId($user_id);
      $bean_user->setEstado($estado);

      $data = $user->updateEstado($bean_user) ;

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
      $user  = new User();

      $bean_user = new BeanUser();

      $bean_user->setUserId($id);

      $data = $user->find( $bean_user) ;
      return $data;

    }
    catch (Exception $e)
    {
      throw new Exception($e->getMessage());
    }
  }

  public function deleteById($user_id)
  {
    try
    {

      $user  = new User();

      $bean_user = new BeanUser();

      $bean_user->setUserId($user_id);

      $data = $user->deleteById( $bean_user ) ;

      return $data;

    }
    catch (Exception $e)
    {
      throw new Exception($e->getMessage());
    }
  }

  public function updatePassword($params = array() )
  {
    try
    {

      extract($params) ;

      $user  = new User($this->cnx);

      $bean_user = new BeanUser();

      $bean_user->setUserId($user_id);
      // $bean_user->setNombre($nombre);
      // $bean_user->setApellidos($apellidos);
      // $bean_user->setEmail($email);
      $bean_user->setPassword($password);

      $data = $user->updatePassword($bean_user) ;

      return $data ;
    }
    catch (Exception $e)
    {
        throw new Exception($e->getMessage());
    }
  }

  public function verificateEmail($params = array() )
  {
    try
    {

      extract($params) ;

      $user  = new User($this->cnx);

      $bean_user = new BeanUser();

      $bean_user->setEmail($email);

      $data = $user->verificateEmail($bean_user) ;

      return $data ;
    }
    catch (Exception $e)
    {
        throw new Exception($e->getMessage());
    }
  }

}
