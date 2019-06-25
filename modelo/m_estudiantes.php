<?php
require_once('m_personas.php');

class estudiantes extends personas
{
  //ATRIBUTOS
  public $fecha_nacimiento;
  public $edad;
  public $representante;
  public $parentesco;
  public $cuadratura;
  public $comunidad;

  //METODOS
  function __construct($nacionalidad,$cedula,$nombre,$apellido,$sexo,$telefono,$correo,$fecha_nacimiento,$edad,$representante,$parentesco,$comunidad)
  {
    parent::__construct($nacionalidad,$cedula,$nombre,$apellido,$sexo,$telefono,$correo);
    $this->fecha_nacimiento= $fecha_nacimiento;
    $this->edad= $edad;
    $this->representante= $representante;
    $this->parentesco= $parentesco;
    $this->comunidad= $comunidad;

  }

  public function registrarEst($idEst){
    $db= DataBase::getInstance();    
    $this->id= $idEst;
    $consulta=$db->prepare("INSERT INTO estudiantes (id_estudiante,id_representante,parentesco,fecha_nacimiento,edad,id_comunidad) VALUES (:id_estudiante, :id_representante, :parentesco, :fecha_nacimiento, :edad, :id_comunidad)");
    $consulta->bindParam(':id_estudiante', $this->id);
    $consulta->bindParam(':id_representante', $this->representante);
    $consulta->bindParam(':parentesco', $this->parentesco);
    $consulta->bindParam(':fecha_nacimiento', $this->fecha_nacimiento);
    $consulta->bindParam(':edad', $this->edad);
    $consulta->bindParam(':id_comunidad', $this->comunidad);
    $r=$consulta->execute();
    if ($r) {
      return 'exito';
    }else{
      return 'fracaso';
    }    
  }

  public static function asignarMatricula($idEst,$cuadratura)
  {
    $db= DataBase::getInstance();   
    $consultar= $db->prepare("SELECT id_matricula FROM matricula WHERE id_estudiante='$idEst' AND id_cuadratura='$cuadratura'");
    // $consultar->bindParam(':id_estudiante',$idEst);
    // $consultar->bindParam(':id_cuadratura',$cuadratura);
    $consultar->execute();
    $validar= $consultar->rowCount();
    if ($validar > 0) {
      return 'existente';
    }else{
      $sql="INSERT INTO matricula (id_estudiante,id_cuadratura) VALUES ($idEst, $cuadratura)";
     $resultado= $consulta= $db->query($sql);
      if ($resultado){
        return 'exito';
      }else {
        return 'fracaso';
      }
    }

  }

  public static function consultar(){
    $db= DataBase::getInstance();
    $sql= "SELECT *FROM vista_estudiantes";
    $consulta= $db->prepare($sql);
    $resultado= $consulta->execute();
    if ($resultado)
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    else
      return null;
  }

  public static function listar($anio,$mencion){
    $db= DataBase::getInstance();

    $sql= "SELECT *FROM vista_matricula WHERE anio='$anio' AND mencion='$mencion'";
    $consulta= $db->prepare($sql);
    $resultado= $consulta->execute();
    if ($resultado)
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    else
      return null;
  }

  public static function encontrar($id)
  {
     $db = DataBase::getInstance();
     $consulta=$db->prepare("SELECT * FROM vista_estudiantes WHERE id_estudiante= '$id'");
     $resultado= $consulta->execute();

     return $consulta->fetch(PDO::FETCH_ASSOC); 
  }

  public function consultar2(){
      $db= DataBase::getInstance();
      //$consulta= $db->prepare("SELECT * FROM ver_estudiante");
      //$resultado= $consulta->execute();
      $sql= "SELECT *FROM vista_matricula";
      $resultado=$db->query($sql);
      if($resultado->rowCount()>0)
        return $resultado->fetchAll();
      else
        return null;

  }

  public function setId($id)
  {
    $this->id=$id;
  }
  public function setCuadratura($c)
  {
    $this->cuadratura=$c;
  }
}



?>
