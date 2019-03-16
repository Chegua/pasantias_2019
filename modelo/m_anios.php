<?php
require_once 'DataBase.php';

class anios
{
  //ATRIBUTOS
  public $anio;

  //CONSTRUCTOR
  function __construct($nom="")
  {
    $this->anio=$nom;
  }
  //METODOS
/*-------------------------------------------------------*/

  public function registrar()
  {
    $db= DataBase::getInstance();
   // $d=str_replace($anios);//Convierte la cadena en minusculas
    $de= ucwords(strtolower($this->anio)); //convierte la primera letra a mayuscula
    $anio=trim($de);//elimina los espacios del inicio y el final de cada cadnea

    $consulta1=$db->prepare("SELECT id_anio FROM anios WHERE anio='$anio'");

    $consulta1->execute();
    $resultado1= $consulta1->rowCount();

    if ($resultado1>0) {
      return 'existente';
    }else{

      $consulta = $db->prepare("INSERT INTO anios (anio) VALUES (:anio)");
      $consulta->bindParam(':anio',$anio);

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

		$sql= "SELECT *FROM anios";
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
    $sql="SELECT * FROM anios WHERE anio LIKE '%".$valor."%'";
    $resultado=$db->query($sql);
  return $resultado;
  }
/*-------------------------------------------------------*/
  public function actualizar($id){

    //$d=str_replace($valores);//Convierte la cadena en minusculas
    $de= ucwords(strtolower($this->anio)); //convierte la primera letra a mayuscula
    $nombre=trim($de);//elimina los espacios del inicio y el final de cada cadnea

    $db = Database::getInstance();
    $consulta1= $db->prepare("SELECT id_anio FROM anios WHERE id_anio!='".$id."' AND anio='".$nombres."' ");

    $consulta1->execute();
    $resultado1= $consulta1->rowCount();

    if ($resultado1>0) {
      return 'existente';
    }
    else{
      $sql = "UPDATE anios SET anio='".$nombre."' WHERE id_anio='".$id."'";

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
  $consulta= $db->prepare("SELECT id_anio FROM anios WHERE id_anio='".$id."'");
  $consulta->execute();

  $resultado= $consulta->rowCount();
  if ($resultado>0) {
    $sql="DELETE FROM anios WHERE id_anio='".$id."'";

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

     $sql="SELECT * FROM anios WHERE id_anio= '$id'";

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

    $consulta1=$db->prepare("SELECT *FROM anios  WHERE anio LIKE '%".$valor."%'");

    return $consulta1->execute();
  }

}

?>
