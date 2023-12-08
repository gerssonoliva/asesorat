<?php 

/**
 * [Class Bean Generada]
 * Autor: Armando E. Pisfil Puemape
 * twitter: @armandoaepp
 * email: armandoaepp@gmail.com
*/

class BeanSuscriptorSimple{
  # Constructor
  public function __construct(){}

  # Atributos
  private $suscriptor_id;
  private $email;
  private $estado = 1 ;
  private $created_at = NULL ;

  #Auto Increment Item

  # METODOS
  public function setSuscriptorId($suscriptor_id_)
  {
    $this->suscriptor_id = Validation::validate( $suscriptor_id_ );
  }

  public function getSuscriptorId()
  {
    return $this->suscriptor_id;
  }

 
  public function setEmail($email_)
  {
    $this->email = Validation::validate( $email_ );
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEstado($estado_)
  {
    $this->estado = Validation::validate( $estado_ );
  }

  public function getEstado()
  {
    return $this->estado;
  }

  public function setCreatedAt($created_at_)
  {
    $this->created_at = Validation::validate( $created_at_ );
  }

  public function getCreatedAt()
  {
    if(empty($this->created_at))
    {
      $this->created_at = HelperDate::timestampsBd();
    }
    return $this->created_at;
  }

}
