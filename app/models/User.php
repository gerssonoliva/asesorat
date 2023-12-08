<?php

/**
 * [Class Controller Generada]
 * Autor: Armando E. Pisfil Puemape
 * twitter: @armandoaepp
 * email: armandoaepp@gmail.com
*/

class User extends Connection {
  # CONSTRUCT
  public function __construct($cnx  = null)
  {
    $this->conn = $cnx;
  }

  # Method get all rows
  public function getAll()
  {
    try{

      $this->query = "SELECT * FROM user where user_id > 1; ";

      $this->executeQuery();

      $data = $this->rows ;

      return $data;

    }catch(exception $e){

      throw new Exception($e->getMessage());

    }
  }

  # Method getByEstado
  public function getByEstado($bean_user)
  {
    try{
      $estado = $bean_user->getEstado() ;

      $this->query = "SELECT * FROM user
                      WHERE estado = '$estado'; ";

      $this->executeQuery();

      $data = $this->rows ;

      return $data;

    }catch(exception $e){

      throw new Exception($e->getMessage());

    }
  }

  # Method SAVE
  public function save($bean_user)
  {
    try{
      $bean_user->setCreatedAt( HelperDate::timestampsBd() );

      $user_id    = $bean_user->getUserId();
      $nombre     = $bean_user->getNombre();
      $apellidos  = $bean_user->getApellidos();
      $email      = $bean_user->getEmail();
      $password   =  Encript::md5($bean_user->getPassword());
      $estado     = $bean_user->getEstado();
      $created_at = $bean_user->getCreatedAt();

      $this->query = "INSERT INTO user
                      (
                        nombre,
                        apellidos,
                        email,
                        password,
                        estado,
                        created_at
                      )
                      VALUES(
                        '$nombre',
                        '$apellidos',
                        '$email',
                        '$password',
                        '$estado',
                        '$created_at'
                      ); ";

      $this->executeQuery();

      $data = $this->status  ;

      return $data;


    }catch(exception $e){

      throw new Exception($e->getMessage());

    }
  }

  # Method Actualizar
  public function update($bean_user)
  {
    try{
      $user_id   = $bean_user->getUserId();
      $nombre    = $bean_user->getNombre();
      $apellidos = $bean_user->getApellidos();
      $email     = $bean_user->getEmail();
      // $password  = $bean_user->getPassword();

      $this->query = "UPDATE user SET
                        nombre = '$nombre',
                        apellidos = '$apellidos',
                        email = '$email'
                      WHERE user_id = '$user_id'
                      LIMIT 1 ;";

      $this->executeQuery();

      $data = $this->status  ;

      return $data;

    }catch(exception $e){

      throw new Exception($e->getMessage());

    }
  }

  # Method Eliminar(Update Estado)
  public function updateEstado($bean_user)
  {
    try{
      $user_id = $bean_user->getUserId();
      $estado = $bean_user->getEstado();

      $this->query = "UPDATE user SET
                        estado = '$estado'
                      WHERE user_id='$user_id'
                      LIMIT 1 ; ";

      $this->executeQuery();

      $data = $this->status  ;

      return $data;

    }catch(exception $e){

      throw new Exception($e->getMessage());

    }
  }

  # Method Buscar por ID
  public function find($bean_user)
  {
    try{
      $user_id = $bean_user->getUserId();

      $this->query = "SELECT * FROM user WHERE user_id = '$user_id' LIMIT 1; ";

      $this->executeFind();

      $data = $this->rows ;

      return $data;

    }catch(exception $e){

      throw new Exception($e->getMessage());

    }
  }

  # Method deleteById
  public function deleteById($bean_user)
  {
    try{
      $user_id = $bean_user->getUserId();

      $this->query = "DELETE FROM user
                      WHERE user_id = '$user_id' LIMIT 1; ";

      $this->executeQuery();

      $data = $this->status  ;

      return $data;

    }catch(exception $e){

      throw new Exception($e->getMessage());

    }
  }

  # Method Password
  public function updatePassword($bean_user)
  {
    try{
      $user_id   = $bean_user->getUserId();
      $password  = Encript::md5($bean_user->getPassword());

      $this->query = "UPDATE user SET
                        password = '$password'
                      WHERE user_id = '$user_id'
                      LIMIT 1 ;";

      $this->executeQuery();

      $data = $this->status  ;

      return $data;

    }catch(exception $e){

      throw new Exception($e->getMessage());

    }
  }

  # Method Actualizar
  public function verificateEmail($bean_user)
  {
    try{
      $email = $bean_user->getEmail();

      $this->query = "SELECT * FROM user
                      WHERE email = '$email'
                      LIMIT 1 ;";

      $this->executeFind();

      $data = $this->rows;

      return $data;

    }catch(exception $e){

      throw new Exception($e->getMessage());

    }
  }

}
