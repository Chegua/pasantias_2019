<?php
require_once('m_tutores_academico.php');

class tutores_academicos extends docentes
{
  //ATRIBUTOS
  public $estatu_tutor;
  public $fecha_inicio;
  public $fecha_fin;
  public $estatus;

  //METODOS
  function __construct($nombres,$apellidos,$cedula,$correo, $sexo,$telefono,$est_tutor)
  {
    parent::__construct($nombres,$apellidos,$cedula,$correo, $sexo,$telefono);
    $this->$estatu_tutor= $est_tutor;
  }
  public function registrar(){
    $db= DataBase::getInstance();

    parent::registrarP($db);
    $p=parent::buscar();
    $this->id= $p[0]['id_persona'];
    $consulta=$db->prepare("INSERT INTO docentes (id_tutor_academico) VALUES (:id,:est_tutor)");

    $consulta->bindParam(':id', $this->id);
    $consulta->bindParam(':st_tutor', $this->estatu_tutor);

    $r=$consulta->execute();
    if ($r) {
      return 1;
    }else{
      return 0;
    }
  }

  public static function consultar(){
    $db= DataBase::getInstance();
    $sql= "SELECT * FROM ";
    $resultado=$db->query($sql);
    if($resultado->rowCount()>0)
      return $resultado->fetchAll();
    else
      return null;
  }

}

?>
