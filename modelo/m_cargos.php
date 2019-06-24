<?php
require_once 'DataBase.php';
require_once 'filtros.php';


class cargos
{
  //ATRIBUTOS
  public $cargos;
  public $tipo_cargo;

  //CONSTRUCTOR
  function __construct($nom="", $tipo="")
  {
    $this->cargos=$nom;
    $this->tipo_cargo=$tipo;
  }
  //METODOS

  public function registrar()
  {
    $db= DataBase::getInstance();

    $cargos=convertir_mayuscula($this->cargos);


    $consulta1=$db->prepare("SELECT id_cargo FROM cargos WHERE cargo='".$cargos."'");

    $consulta1->execute();
    $resultado1= $consulta1->rowCount();

    if ($resultado1>0) {
      return 'existente';
    }else{

      $consulta = $db->prepare("INSERT INTO cargos (cargo, id_tipo_cargo) VALUES (:car, :tipo)");
      $consulta->bindParam(':car',$cargos);
      $consulta->bindParam(':tipo',$this->tipo_cargo);

        $resultado=$consulta->execute();
        if ($resultado) {
          return 'exito';
        }
        else{
         return 'fracaso';
        }
    }
  }

  public function actualizar($id)
 	{
    $db = Database::getInstance();

    $de= ucwords(strtolower($this->cargos)); //convierte la primera letra a mayuscula
    $cargos=trim($de);//elimina los espacios del inicio y el final de cada cadnea

    $consulta1= $db->prepare("SELECT id_cargo FROM cargos WHERE id_cargo!='".$id."' and cargo='".$cargos."' ");

    $consulta1->execute();
    $resultado1= $consulta1->rowCount();

    if ($resultado1>0) {
      return 'existente';
    }
    else{
      $sql = "UPDATE cargos SET cargo='".$cargos."', id_tipo_cargo='$this->tipo_cargo' WHERE id_cargo='$id'";

     $resultado= $db->query($sql);

      if ($resultado) {
        return 'exito';
      }
      else{
        return 'fracaso';
      }
    }
  }


 public function eliminar($id){

  $db= DataBase::getInstance();

  $consulta= $db->prepare("SELECT id_cargo FROM cargos WHERE id_cargo='".$id."'");
  $consulta->execute();

  $resultado= $consulta->rowCount();
  if ($resultado>0) {
    $sql="DELETE FROM cargos WHERE id_cargo='".$id."'";

    $resultado2 = $db->query($sql);
      if ($resultado2) {
        return 'exito';
      }else{
        return 'fracaso';
      }
        return 'malo';
    }

  }


  public function encontrar($id)
  {
     $db = Database::getInstance();

     $sql="SELECT * FROM cargos WHERE id_cargo= '$id'";

     $resultado= $db->query($sql);

      if($resultado->rowCount() >0)
         return $resultado->fetchAll();
      else
         return null;
  }

  public function consultar()
  {
    $db = Database::getInstance();
    $sql="SELECT *FROM vista_cargos WHERE tipo_cargo='Empresarial'";
    $resultado=$db->query($sql);
    if($resultado->rowCount() >0)
      return $resultado->fetchAll();
    else
      return null;
  }

  public function listar()
  {
    $db = Database::getInstance();
    $sql="SELECT *FROM vista_cargos";
    $resultado=$db->query($sql);
    if($resultado->rowCount() >0)
      return $resultado->fetchAll();
    else
      return null;
  }

  public function consultar3()
  {
    $db = Database::getInstance();
    $sql="SELECT *FROM vista_cargos WHERE tipo_cargo='Academico/Administrativo'";
    $resultado=$db->query($sql);
    if($resultado->rowCount() >0)
      return $resultado->fetchAll();
    else
      return null;
  }


  public function consultar_academicos()
  {
    $db = Database::getInstance();
    $sql="SELECT * FROM cargos WHERE id_tipo_cargo='1'";
    $resultado=$db->query($sql);
    if($resultado->rowCount() >0)
      return $resultado->fetchAll();
    else
      return null;
  }

  public function consultar_empresariales()
  {
    $db = Database::getInstance();
    $sql="SELECT * FROM cargos WHERE id_tipo_cargo='2'";
    $resultado=$db->query($sql);
    if($resultado->rowCount() >0)
      return $resultado->fetchAll();
    else
      return null;
  }

  public function consultartiposcargos()
  {
    $db = Database::getInstance();
    $sql="SELECT * FROM tipo_cargo";
    $resultado=$db->query($sql);
    if($resultado->rowCount() >0)
      return $resultado->fetchAll();
    else
      return null;
  }

public function consultar2($valores)
  {
    $db= DataBase::getInstance();
    $de= ucwords(strtolower($valores)); //convierte la primera letra a mayuscula
    $valor=trim($de);//elimina los espacios del inicio y el final de cada cadnea

    $db = Database::getInstance();
    $sql="SELECT * FROM cargos WHERE cargo LIKE '%".$valor."%'";
    $resultado=$db->query($sql);
  return $resultado;
  }



}
?>
