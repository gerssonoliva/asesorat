<?php

/**
 * [Class Controller Generada]
 * Autor: Armando E. Pisfil Puemape
 * twitter: @armandoaepp
 * email: armandoaepp@gmail.com
*/

 class AuthController
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

      $auth  = new Auth();
      $bean_auth = new BeanAuth();

      $bean_auth->setEmail($email);
      $bean_auth->setPassword($password);

      $data = $auth->login($bean_auth) ;

      return $data;
    }
    catch (Exception $e)
    {
      throw new Exception($e->getMessage());
    }
  }

}
