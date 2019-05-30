<?php
require_once 'DataBase.php';
require_once 'filtros.php';

class evaluaciones
{
  //ATRIBUTOS
  public $nombre_evaluacion;
  public $tipo_evaluacion;
  public $porcentaje;

  //CONSTRUCTOR
  function __construct($nombre_evaluacion="", $tipo_evaluacion="",$porcentaje="")
  {
    $this->nombre_evaluacion=$nombre_evaluacion;
    $this->tipo_evaluacion=$tipo_evaluacion;
    $this->porcentaje=$porcentaje;
  }
  //METODOS
/*-------------------------------------------------------*/

  public function registrar()
  {
    $db= DataBase::getInstance();

    $nombre_evaluacion=convertir_mayuscula($this->nombre_evaluacion);

    $consulta1=$db->prepare("SELECT id_evaluacion FROM evaluaciones WHERE nombre_evaluacion='$nombre_evaluacion'");

    $consulta1->execute();
    $resultado1= $consulta1->rowCount();

    if ($resultado1>0) {
      return 'existente';
    }else{

      $consulta = $db->prepare("INSERT INTO evaluaciones (nombre_evaluacion,tipo_evaluacion,porcentaje ) VALUES (:nombre_evaluacion,:tipo_evaluacion,:porcentaje)");

      $consulta->bindParam(':nombre_evaluacion',$nombre_evaluacion);
      $consulta->bindParam(':tipo_evaluacion',$this->tipo_evaluacion);
      $consulta->bindParam(':porcentaje',$this->porcentaje);


      $resultado=$consulta->execute();
        if ($resultado) {
          return 'exito';
        }
        else{
         return 'fracaso';
        }
    }
  }

  public static function asignar_evaluacion_item($id_evaluacion, $id_item){
    $db= DataBase::getInstance();
    $consulta = $db->prepare("INSERT INTO evaluacion_item (id_evaluacion,id_item) VALUES (:id_evaluacion,:id_item)");
    $consulta->bindParam(':id_evaluacion',$id_evaluacion);
    $consulta->bindParam(':id_item',$id_item);
    return $consulta->execute();
  }
/*-------------------------------------------------------*/

  public function consultar()
 	{
    $db = DataBase::getInstance();

		$sql= "SELECT *FROM evaluaciones";
		$resultado=$db->query($sql);

		if($resultado->rowCount() >0)
			return $resultado->fetchAll();
		else
			return null;
  }
  
  public function consultar_evaluacion_item($id)
 	{
    $db = DataBase::getInstance();

		$sql= "SELECT *FROM vista_evaluacion_item WHERE id_evaluacion='$id'";
		$resultado=$db->query($sql);

		if($resultado->rowCount()>0)
			return $resultado->fetchAll();
		else
			return null;
  }
  
  public function consultar_items_disponibles($id){
    $db= DataBase::getInstance();
    $sql= "SELECT *FROM items WHERE id_item NOT IN(SELECT id_item FROM vista_evaluacion_item WHERE id_evaluacion='$id')";
    $resultado=$db->query($sql);
		if($resultado->rowCount() >0)
			return $resultado->fetchAll();
		else
			return null;
  }

  public function consultar2($valores)
  {

    $db= DataBase::getInstance();
    //$d=str_replace($valores);//Convierte la cadena en minusculas
    $de= ucwords(strtolower($valores)); //convierte la primera letra a mayuscula
    $valor=trim($de);//elimina los espacios del inicio y el final de cada cadnea

    $db = Database::getInstance();
    $sql="SELECT * FROM departamentos WHERE nombre_departamento LIKE '%".$valor."%'";
    $resultado=$db->query($sql);
  return $resultado;
  }
/*-------------------------------------------------------*/
  public function actualizar($id){
    $de= ucwords(strtolower($this->departamentos)); //convierte la primera letra a mayuscula
    $nombre=trim($de);//elimina los espacios del inicio y el final de cada cadnea

    $db = Database::getInstance();
    $consulta1= $db->prepare("SELECT id_departamento FROM departamentos WHERE id_departamento!='".$id."' and departamento='".$nombre."' ");

    $consulta1->execute();
    $resultado1= $consulta1->rowCount();

    if ($resultado1>0) {
      return 'existente';
    }
    else{
      $sql = "UPDATE departamentos SET departamento='".$nombre."' WHERE id_departamento='".$id."'";

     $resultado= $db->query($sql);

      if ($resultado) {
        return 'exito';
      }
      else{
        return 'fracaso';
      }
    }
}
/*-------------------------------------------------------*/

  public function eliminar($id){

  $db= DataBase::getInstance();
    $consulta= $db->prepare("SELECT id_departamento FROM departamentos WHERE id_departamento='".$id."'");
  $consulta->execute();

  $resultado= $consulta->rowCount();
  if ($resultado>0) {
    $sql="DELETE FROM departamentos WHERE id_departamento='".$id."'";

    $resultado2 = $db->query($sql);
      if ($resultado2) {
        return 'exito';
      }else{
        return 'fracaso';
      }
        return 'malo';
    }

  }
  /*-------------------------------------------------------*/

  public function encontrar($id)
  {
     $db = Database::getInstance();

     $sql="SELECT * FROM departamentos WHERE id_departamento= '$id'";

     $resultado= $db->query($sql);

      if($resultado->rowCount() >0)
         return $resultado->fetchAll();
      else
         return null;
  }
/*-------------------------------------------------------*/

  public function listar($valor)
  {
    $db= DataBase::getInstance();


    $consulta1=$db->prepare("SELECT *FROM departamentos  WHERE departamento LIKE '%".$valor."%'");

    return $consulta1->execute();
  }

}

?>
