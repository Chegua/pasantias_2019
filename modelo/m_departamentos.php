<?php
require_once 'DataBase.php';

class departamentos
{
  //ATRIBUTOS
  public $departamentos;

  //CONSTRUCTOR
  function __construct($nom="")
  {
    $this->departamentos=$nom;
  }
  //METODOS
/*-------------------------------------------------------*/

  public function registrar()
  {
    $db= DataBase::getInstance();
   // $d=str_replace($departamentos);//Convierte la cadena en minusculas
    $de= ucwords(strtolower($this->departamentos)); //convierte la primera letra a mayuscula
    $departamento=trim($de);//elimina los espacios del inicio y el final de cada cadnea

    $consulta1=$db->prepare("SELECT id_departamento FROM departamentos WHERE departamento='$departamento'");

    $consulta1->execute();
    $resultado1= $consulta1->rowCount();

    if ($resultado1>0) {
      return 'existente';
    }else{

      $consulta = $db->prepare("INSERT INTO departamentos (departamento) VALUES (:dep)");
      $consulta->bindParam(':dep',$departamento);

        $resultado=$consulta->execute();
        if ($resultado) {
          return 'exito';
        }
        else{
         return 'fracaso';
        }
    }
  }
/*-------------------------------------------------------*/

  public function consultar()
 	{
    $db = DataBase::getInstance();
		$sql= "SELECT *FROM departamentos";
		$resultado=$db->query($sql);
		if($resultado->rowCount() >0)
			return $resultado->fetchAll(PDO::FETCH_ASSOC);
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
    $sql="SELECT * FROM departamentos WHERE departamento LIKE '%".$valor."%'";
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
