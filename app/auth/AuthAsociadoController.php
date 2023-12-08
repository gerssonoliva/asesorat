<?php

/**
 * [Class Controller Generada]
 * Autor: Armando E. Pisfil Puemape
 * twitter: @armandoaepp
 * email: armandoaepp@gmail.com
*/

class AuthAsociadoController
{
  private $cnx;

  public function __construct($cnx = null)
  {
    $this->cnx = $cnx;
  }

  public function login($params = array())
  {
    try
    {

      extract($params) ;

      $auth_asociado  = new AuthAsociado();
      $bean_auth_asociado = new BeanAuthAsociado();

      $bean_auth_asociado->setEmail($email);
      $bean_auth_asociado->setPassword($password);

      $data = $auth_asociado->login($bean_auth_asociado) ;

      return $data;
    }
    catch (Exception $e)
    {
      throw new Exception($e->getMessage());
    }
  }

}
