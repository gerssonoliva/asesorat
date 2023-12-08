<?php

/**
 * [Class Model Generada]
 * Autor: Armando E. Pisfil Puemape
 * twitter: @armandoaepp
 * email: armandoaepp@gmail.com
*/

class Auth extends Connection {
  # CONSTRUCT
  public function __construct($cnx  = null)
  {
    $this->conn = $cnx;
  }


  public function login($bean_user){

    try{

      $email    = $bean_user->getEmail();
      $password = $bean_user->getPassword();
      $estado   = !empty($bean_user->getEstado()) ? $bean_user->getEstado() :  1;

      $password = Encript::md5($password) ;


      $this->query = "SELECT user_id, email, nombre, apellidos FROM user
                      WHERE email = '$email'
                      AND password = '$password'
                      AND estado = $estado
                      LIMIT 1 ;";

      // echo $this->query ;

      $this->executeFind();

      $rows = $this->rows ;

      return $rows;

    }catch(exception $e){

      throw new Exception($e->getMessage());

    }

  }



}
