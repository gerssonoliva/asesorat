<?php

/**
 * [Class Controller Generada]
 * Autor: Armando E. Pisfil Puemape
 * twitter: @armandoaepp
 * email: armandoaepp@gmail.com
*/

class SuscriptorSimple extends Connection {
  # CONSTRUCT
  public function __construct($cnx  = null)
  {
    $this->conn = $cnx;
  }

  # Method get all rows
  public function getAll()
  {
    try{

      $this->query = "SELECT * FROM suscriptorsimple; ";

      $this->executeQuery();

      $data = $this->rows ;

      return $data;

    }catch(exception $e){

      throw new Exception($e->getMessage());

    }
  }

  # Method SAVE
  public function save($bean_suscriptor_simple)
  {
    try{

      // $suscriptor_id = $bean_suscriptor->getSuscriptorId();
      $email = $bean_suscriptor_simple->getEmail();
      $estado = $bean_suscriptor_simple->getEstado();
      $created_at = $bean_suscriptor_simple->getCreatedAt();

      $this->query = "INSERT INTO suscriptorsimple
                      (                       
                        email,
                        estado,
                        created_at
                      )
                      VALUES(
                        '$email',
                        '$estado',
                        $created_at
                      ); ";

      $this->executeQuery();

      $data = $this->status  ;

      return $data;


    }catch(exception $e){

      throw new Exception($e->getMessage());

    }
  }

  # Method Actualizar
  public function update($bean_suscriptor_simple)
  {
    try{
      $suscriptor_simple_id = $bean_suscriptor_simple->getSuscriptorId();
      $email         = $bean_suscriptor_simple->getEmail();

      $this->query = "UPDATE suscriptorsimple SET
                        email = '$email'
                      WHERE suscriptorsimple_id = '$suscriptor_simple_id'
                      LIMIT 1 ;";

      $this->executeQuery();

      $data = $this->status  ;

      return $data;

    }catch(exception $e){

      throw new Exception($e->getMessage());

    }
  }

  # Method Buscar por ID
  public function find($bean_suscriptor_simple)
  {
    try{
      $suscriptor_simple_id = $bean_suscriptor_simple->getSuscriptorId();

      $this->query = "SELECT * FROM suscriptorsimple WHERE suscriptorsimple_id = '$suscriptor_simple_id' LIMIT 1; ";

      $this->executeFind();

      $data = $this->rows ;

      return $data;

    }catch(exception $e){

      throw new Exception($e->getMessage());

    }
  }

  # Method deleteById
  public function deleteById($bean_suscriptor_simple)
  {
    try{
      $suscriptor_simple_id = $bean_suscriptor_simple->getSuscriptorId();

      $this->query = "DELETE FROM suscriptosimple
                      WHERE suscriptorsimple_id = '$suscriptor_simple_id' LIMIT 1; ";

      $this->executeQuery();

      $data = $this->status  ;

      return $data;

    }catch(exception $e){

      throw new Exception($e->getMessage());

    }
  }


  # Method getByEstado
  public function getByEstado($bean_suscriptor_simple)
  {
    try{
      $estado = $bean_suscriptor_simple->getEstado() ;

      $this->query = "SELECT * FROM suscriptorsimple
                      WHERE estado = '$estado'; ";

      $this->executeQuery();

      $data = $this->rows ;

      return $data;

    }catch(exception $e){

      throw new Exception($e->getMessage());

    }
  }


  # Method Eliminar(Update Estado)
  public function updateEstado($bean_suscriptor_simple)
  {
    try{
      $suscriptor_simple_id = $bean_suscriptor_simple->getSuscriptorId();
      $estado = $bean_suscriptor_simple->getEstado();

      $this->query = "UPDATE suscriptorsimple SET
                        estado = '$estado'
                      WHERE suscriptorsimple_id='$suscriptor_simple_id'
                      LIMIT 1 ; ";

      $this->executeQuery();

      $data = $this->status  ;

      return $data;

    }catch(exception $e){

      throw new Exception($e->getMessage());

    }
  }
}
