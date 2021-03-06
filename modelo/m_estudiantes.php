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
  function __construct($nacionalidad,$cedula,$nombre,$apellido,$sexo,$telefono,$correo,$fecha_nacimiento,$edad,$representante,$parentesco,$cuadratura,$comunidad)
  {
    parent::__construct($nacionalidad,$cedula,$nombre,$apellido,$sexo,$telefono,$correo);
    $this->fecha_nacimiento= $fecha_nacimiento;
    $this->edad= $edad;
    $this->representante= $representante;
    $this->parentesco= $parentesco;
    $this->cuadratura= $cuadratura;
    $this->comunidad= $comunidad;

  }

  public function registrar(){
    $db= DataBase::getInstance();

    parent::registrarP($db);
    $p=parent::buscar();
    $this->id= $p[0]['id_persona'];
    $consulta=$db->prepare("INSERT INTO estudiantes (id_estudiante, id_representante, parentesco, fecha_nacimiento, edad, id_comunidad) VALUES (:id_estudiante, :id_representante, :parentesco, :fecha_nacimiento, :edad, :id_comunidad)");
    $consulta->bindParam(':id_estudiante', $this->id);
    $consulta->bindParam(':id_representante', $this->representante);
    $consulta->bindParam(':parentesco', $this->parentesco);
    $consulta->bindParam(':fecha_nacimiento', $this->fecha_nacimiento);
    $consulta->bindParam(':edad', $this->edad);
    $consulta->bindParam(':id_comunidad', $this->comunidad);
    $r=$consulta->execute();

    if ($r){
      $consulta2= $db->prepare("INSERT INTO matricula (id_cuadratura,id_estudiante) VALUES (:id_cuadratura,:id_estudiante)");
      $consulta2->bindParam(':id_cuadratura', $this->cuadratura);
      $consulta2->bindParam(':id_estudiante', $this->id);
      $r_matricula=$consulta2->execute();
      if ($r_matricula) {
        return 'exito';
      }else {
        return 'fracaso';
      }

    }else{
      return 'fracaso';
    }

  }

  public static function consultar(){
    $db= DataBase::getInstance();

    $sql= "SELECT *FROM vista_matricula";
    $consulta= $db->prepare($sql);
    $resultado= $consulta->execute();
    if ($resultado)
        return $resultado= $consulta->fetchAll(PDO::FETCH_ASSOC);
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

     $consulta=$db->prepare("SELECT * FROM vista_matricula WHERE id_matricula= '$id'");

     $resultado= $consulta->execute();

      if($resultado>0)
         return $consulta->fetch(PDO::FETCH_ASSOC);
      else
         return null;
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
}

?>
