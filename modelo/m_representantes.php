<?php

require_once('m_personas.php');

class representantes extends personas
{
  //ATRIBUTOS

  //METODOS
  function __construct($nacionalidad,$cedula,$nombre,$apellido,$correo,$sexo,$telefono)
  {
    parent::__construct($nacionalidad,$cedula,$nombre,$apellido,$correo,$sexo,$telefono);
    //$this->cargo= $cargo;
  }

  public function registrar(){
    $db= DataBase::getInstance();

    parent::registrarP();
    $p=parent::buscar();
    $this->id= $p[0]['id_persona'];
    $consulta=$db->prepare("INSERT INTO representantes (id_representante) VALUES (:id)");

    $consulta->bindParam(':id', $this->id);
    //$consulta->bindParam(':cargo', $this->cargo);

    $r=$consulta->execute();

    if ($r) {
      return 'exito';
    }
    else{
     return 'fracaso';
    }
  }

  public static function registrar2($representante){
    $db= DataBase::getInstance();
    $consulta=  $db->prepare("SELECT id_representante FROM representantes WHERE id_representante= '$representante'");
    $consulta->execute();
    $resultado= $consulta->rowCount();

    if ($resultado>0) {
      return 'existente';
    }else {
      $consulta2=$db->prepare("INSERT INTO representantes (id_representante) VALUES (:id)");
      $consulta2->bindParam(':id', $representante);
      $r=$consulta2->execute();
      if ($r) 
        return 'exito';      
      else
       return 'fracaso';      
    }
  }

  public static function consultar(){
    $db= DataBase::getInstance();
    // $consulta= $db->prepare("SELECT * FROM nuevo");
    // $resultado= $consulta->execute();
    $sql= "SELECT *FROM ver_representante";
    $resultado=$db->query($sql);
    if($resultado->rowCount()>0)
      return $resultado->fetchAll();
    else
      return null;
  }

  public function eliminar($id){
    $db= DataBase::getInstance();
    $sql="DELETE FROM representantes WHERE id_representante='".$id."'";
    $resultado2 = $db->query($sql);
    $p=parent::eliminarP($id);
    return $resultado2;

  }

  public static function encontrar($id){
    $db= DataBase::getInstance();
    $sql= "SELECT *FROM vista_personasnoestudiante WHERE id_persona= '$id'";
    $resultado=$db->query($sql);
    if($resultado->rowCount()>0)
      return $resultado->fetchAll(PDO::FETCH_ASSOC);
    else
      return null;
  }
}


?>
