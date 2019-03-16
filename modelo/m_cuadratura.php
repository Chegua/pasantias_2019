<?php

require_once 'DataBase.php';

class cuadratura
{
  public $anio;
  public $mencion;
  public $periodo;
  public $docente;

  //CONSTRUCTOR
  function __construct($anio="", $mencion="", $periodo="", $docente="")
  {
    $this->anio= $anio;
    $this->mencion= $mencion;
    $this->periodo= $periodo;
    $this->docente= $docente;
  }
  //METODOS
  public function registrar()
  {
    $db= DataBase::getInstance();
    $consulta1=$db->prepare("SELECT id_cuadratura FROM cuadratura WHERE id_anio='$this->anio' AND id_mencion='$this->mencion' AND id_periodo= '$this->periodo' OR id_docente= '$this->docente'");
    $consulta1->execute();
    $resultado1= $consulta1->rowCount();

    if ($resultado1>0) {
      return 'existente';
    }else{

      $consulta = $db->prepare("INSERT INTO cuadratura (id_anio,id_mencion,id_periodo,id_docente) VALUES (:anio,:mencion,:periodo,:docente)");
      $consulta->bindParam(':anio',$this->anio);
      $consulta->bindParam(':mencion',$this->mencion);
      $consulta->bindParam(':periodo',$this->periodo);
      $consulta->bindParam(':docente',$this->docente);

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
    $sql="SELECT *FROM vista_cuadratura";
    $resultado=$db->query($sql);
    if($resultado->rowCount() >0)
      return $resultado->fetchAll(PDO::FETCH_ASSOC);
    else
      return null;
  }

  public function encontrar($id)
  {
    $db = Database::getInstance();
    $sql="SELECT *FROM vista_cuadratura WHERE id_cuadratura='$id'";
    $resultado=$db->query($sql);
    if($resultado->rowCount() >0)
      return $resultado->fetchAll(PDO::FETCH_ASSOC);
    else
      return null;
  }
}

?>
