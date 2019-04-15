<?php
require_once('DataBase.php');

class personas{
  //ATRIBUTOS DE PERSONA
  protected $id;
  public $nombre;
  public $apellido;
  public $nacionalidad;
  public $cedula;
  public $correo;
  public $sexo;
  public $telefono;

  //CONTRUCTOR personas
  function __construct($nacionalidad,$cedula,$nombre,$apellido,$sexo,$telefono,$correo)
  {
    $this->nacionalidad = $nacionalidad;
    $this->cedula= $cedula;
		$this->nombre = $nombre;
    $this->apellido= $apellido;
    $this->telefono= $telefono;
    $this->correo= $correo;
    $this->sexo= $sexo;

  }

  //METODOS personas
  public function registrarP($db){
    // $db = Database::getInstance();
    $consulta=  $db->prepare("SELECT id_persona FROM personas WHERE cedula= '$this->cedula'");
    $consulta->execute();
    $resultado= $consulta->rowCount();

    if ($resultado>0) {
      return 'existente';
    }else {
    $consulta2= $db->prepare("INSERT INTO personas (nacionalidad,cedula,nombre,apellido,sexo,telefono,correo) VALUES (:nacionalidad,:cedula,:nombre,:apellido,:sexo,:telefono,:correo)");

       $consulta2->bindParam(':nacionalidad', $this->nacionalidad);
       $consulta2->bindParam(':cedula', $this->cedula);
       $consulta2->bindParam(':nombre', $this->nombre);
       $consulta2->bindParam(':apellido', $this->apellido);
       $consulta2->bindParam(':sexo', $this->sexo);
       $consulta2->bindParam(':telefono', $this->telefono);
       $consulta2->bindParam(':correo', $this->correo);


       $resultado2= $consulta2->execute();

      if ($resultado2)
        return 'exito';
      else
       return 'fracaso';
    }
  }

	public function buscar()
 	{
   	$db = Database::getInstance();
		$sql="SELECT * FROM personas WHERE cedula='$this->cedula'";
		$resultado=$db->query($sql);
		 if($resultado->rowCount() >0)
		 	return $resultado->fetchAll();
		 else
		 	return null;
	}

  public static function consultar()
  {
    $db = Database::getInstance();
    $sql="SELECT * FROM personas";
    $resultado=$db->query($sql);
    if($resultado->rowCount() >0)
      return $resultado->fetchAll();
    else
      return null;
  }

	public function modificarP($db, $id)
 	{
    $consulta= $db->prepare("UPDATE personas SET nacionalidad= :nacionalidad, cedula= :cedula, nombre= :nombre, apellido= :apellido, sexo= :sexo, telefono= :telefono, correo= :correo WHERE id_persona= '$id'");
    $consulta->bindParam(':nacionalidad', $this->nacionalidad);
    $consulta->bindParam(':cedula', $this->cedula);
    $consulta->bindParam(':nombre', $this->nombre);
    $consulta->bindParam(':apellido', $this->apellido);
    $consulta->bindParam(':sexo', $this->sexo);
    $consulta->bindParam(':telefono', $this->telefono);
    $consulta->bindParam(':correo', $this->correo);
    // $consulta->execute();

    $resultado= $consulta->execute();

    if ($resultado)
      return 'exito';
    else
     return 'fracaso';

	}



  public function eliminarP($id_hijo)
  {
    $db= DataBase::getInstance();
    $sql="DELETE FROM personas WHERE  id_persona= '$id_hijo'";
    $resultado=$db->query($sql);
    return $resultado;
  }

  public function hacerBusqueda($buscar){
    $db= DataBase::getInstance();
    $sql= "SELECT *FROM personas WHERE cedula LIKE '$buscar%'";
      $resultado= $db->query($sql);

     // return $resultado;
  }

  public static function consultar_noEstudiante(){
    $db= DataBase::getInstance();
    $sql= "SELECT *FROM vista_personasnoestudiante";
    $resultado=$db->query($sql);
    if($resultado->rowCount()>0)
      return $resultado->fetchAll(PDO::FETCH_OBJ);
    else
      return null;
  }

  public function getCodigo(){
		return $this->id;
	}

}

?>
