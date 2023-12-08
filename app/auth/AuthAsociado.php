<?php

/**
 * [Class Model Generada]
 * Autor: Armando E. Pisfil Puemape
 * twitter: @armandoaepp
 * email: armandoaepp@gmail.com
*/

class AuthAsociado extends Connection {
  # CONSTRUCT
  public function __construct($cnx  = null)
  {
    $this->conn = $cnx;
  }

  public function login($bean_aut_asociado)
  {

    try{

      $email    = $bean_aut_asociado->getEmail();
      $password = $bean_aut_asociado->getPassword();
      $estado   = !empty($bean_aut_asociado->getEstado()) ? $bean_aut_asociado->getEstado() :  1;

      // $password = Encript::md5($password) ;


      $this->query = "SELECT asociado_id, email, nombre, apellidos FROM asociado
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
