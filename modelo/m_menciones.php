<?php
require_once 'DataBase.php';

class menciones
{
  //ATRIBUTOS
  public $menciones;

  //CONSTRUCTOR
  function __construct($nom="")
  {
    $this->menciones=$nom;
  }

  //METODOS
/*-------------------------------------------------------*/

  public function registrar()
  {
    $db= DataBase::getInstance();
    $de= ucwords(strtolower( $this->menciones)); //convierte la primera letra a mayuscula
    $mencion=trim($de);//elimina los espacios del inicio y el final de cada cadnea

    $consulta1=$db->prepare("SELECT id_mencion FROM menciones WHERE mencion='$mencion'");

    $consulta1->execute();
    $resultado1= $consulta1->rowCount();

    if ($resultado1>0) {
      return 'existente';
    }else{

      $consulta = $db->prepare("INSERT INTO menciones (mencion) VALUES (:dep)");
      $consulta->bindParam(':dep',$mencion);

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
		$sql= "SELECT *FROM menciones";
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
    $sql="SELECT * FROM menciones WHERE mencion LIKE '%".$valor."%'";
    $resultado=$db->query($sql);
  return $resultado;
  }
/*-------------------------------------------------------*/
  public function actualizar($id){

    //$d=str_replace($valores);//Convierte la cadena en minusculas
    $de= ucwords(strtolower($this->menciones)); //convierte la primera letra a mayuscula
    $nombre=trim($de);//elimina los espacios del inicio y el final de cada cadnea

    $db = Database::getInstance();
    $consulta1= $db->prepare("SELECT id_mencion FROM menciones WHERE id_mencion!='".$id."' and mencion='".$nombre."' ");

    $consulta1->execute();
    $resultado1= $consulta1->rowCount();

    if ($resultado1>0) {
      return 'existente';
    }
    else{
      $sql = "UPDATE menciones SET mencion='".$nombre."' WHERE id_mencion='".$id."'";

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

   $consulta= $db->prepare("SELECT id_mencion FROM menciones WHERE id_mencion='".$id."'");
  $consulta->execute();

  $resultado= $consulta->rowCount();
  if ($resultado>0) {
    $sql="DELETE FROM menciones WHERE id_mencion='".$id."'";

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

     $sql="SELECT * FROM menciones WHERE id_mencion= '$id'";

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


    $consulta1=$db->prepare("SELECT *FROM menciones  WHERE mencion LIKE '%".$valor."%'");

    return $consulta1->execute();
  }

}

?>
