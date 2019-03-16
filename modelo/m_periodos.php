<?php
require_once 'DataBase.php';

class periodos
{
  //ATRIBUTOS
  public $periodo;
  public $estatus;
  //CONSTRUCTOR
  function __construct($periodo="")
  {
    $this->periodo=$periodo;
    $this->estatus='activo';
  }
  //METODOS
  public function registrar()
  {
    $db= DataBase::getInstance();
    $consulta1=$db->prepare("SELECT id_periodo FROM periodos WHERE periodo='".$this->periodo."'");

    $consulta1->execute();
    $resultado1= $consulta1->rowCount();

    if ($resultado1>0) {
      return 'existente';
    }else{
      $consulta2=$db->prepare("UPDATE periodos SET estatus='inactivo' WHERE estatus='$this->estatus'");
      $consulta2->execute();

      $consulta = $db->prepare("INSERT INTO periodos (periodo, estatus) VALUES (:periodo, :estatus)");
      $consulta->bindParam(':periodo',$this->periodo);
      $consulta->bindParam(':estatus',$this->estatus);
      $resultado=$consulta->execute();
        if ($resultado) {
          return 'exito';
        }
        else{
         return 'fracaso';
        }
    }
  }

  public function consultar()
  {
    $db = Database::getInstance();
    $sql="SELECT *FROM periodos";
    $resultado=$db->query($sql);
    if($resultado->rowCount() >0)
      return $resultado->fetchAll(PDO::FETCH_OBJ);
    else
      return null;
  }

  public function encontrar()
  {
    $db = Database::getInstance();
    $sql="SELECT *FROM periodos WHERE estatus= '$this->estatus'";
    $resultado=$db->query($sql);
    if($resultado->rowCount() >0)
      return $resultado->fetch();
    else
      return null;
  }

 public function eliminar($id){

  $db= DataBase::getInstance();

  $consulta= $db->prepare("SELECT id_periodo FROM periodos WHERE id_periodo='".$id."'");
  $consulta->execute();

  $resultado= $consulta->rowCount();
  if ($resultado>0) {
    $sql="DELETE FROM periodos WHERE id_periodo='".$id."'";

    $resultado2 = $db->query($sql);
      if ($resultado2) {
        return 'exito';
      }else{
        return 'fracaso';
      }
        return 'malo';
    }

  }

}
?>
