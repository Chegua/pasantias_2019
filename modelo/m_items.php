<?php
require_once 'DataBase.php';
require_once 'filtros.php';

class items
{
  //ATRIBUTOS
  public $item;
  public $descripcion;

  //CONSTRUCTOR
  function __construct($item="", $descripcion="")
  {
    $this->item=$item;
    $this->descripcion=$descripcion;
  }
  //METODOS
/*-------------------------------------------------------*/

  public function registrar()
  {
    $db= DataBase::getInstance();
    /*$de= ucwords(strtolower($this->departamentos)); //convierte la primera letra a mayuscula
    $departamento=trim($de);//elimina los espacios del inicio y el final de cada cadnea
    */

    $item=convertir_mayuscula($this->item);
    $descripcion=convertir_mayuscula($this->descripcion);


    $consulta1=$db->prepare("SELECT id_item FROM items WHERE item='$item'");

    $consulta1->execute();
    $resultado1= $consulta1->rowCount();

    if ($resultado1>0) {
      return 'existente';
    }else{

      $consulta = $db->prepare("INSERT INTO items (item,descripcion) VALUES (:item,:descripcion)");
      $consulta->bindParam(':item',$item);
      $consulta->bindParam(':descripcion',$descripcion);

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

		$sql= "SELECT *FROM items";
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
    $sql="SELECT * FROM items WHERE item LIKE '%".$valor."%'";
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
    $consulta= $db->prepare("SELECT id_item FROM items WHERE id_item='".$id."'");
    $consulta->execute();

  $resultado= $consulta->rowCount();
  if ($resultado>0) {
    $sql="DELETE FROM items WHERE id_item='".$id."'";

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

     $sql="SELECT * FROM items WHERE id_item= '$id'";

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