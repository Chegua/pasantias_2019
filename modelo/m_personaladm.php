<?php
require_once('m_personas.php');

class personal_administrativo extends personas
{
  //ATRIBUTOS
  public $id_per_adm;
  public $cargo;
  public $departamento;
  public $fecha_inicio;
  public $fecha_fin;
  public $estatus;

  //METODOS
  function __construct($nacionalidad,$cedula,$nombre,$apellido,$sexo,$telefono,$correo,$cargo,$departamento,$fecha_inicio,$fecha_fin,$estatus)
  {
    parent::__construct($nacionalidad,$cedula,$nombre,$apellido,$sexo,$telefono,$correo);
    $this->cargo= $cargo;
    $this->departamento= $departamento;
    $this->fecha_inicio= $fecha_inicio;
    $this->fecha_fin= $fecha_fin;
    $this->estatus= $estatus;
  }

  public function registrar(){
    $db= DataBase::getInstance();
    // $per=parent::registrarP($db);
    $validarPer=  $db->prepare("SELECT id_persona FROM personas WHERE cedula= '$this->cedula'");
    $validarPer->execute();
    $resultadoPer= $validarPer->rowCount();

    if ($resultadoPer>0) {
      return $validarPer;
    }else {
    $consultaPer= $db->prepare("INSERT INTO personas (nacionalidad,cedula,nombre,apellido,sexo,telefono,correo) VALUES (:nacionalidad,:cedula,:nombre,:apellido,:sexo,:telefono,:correo)");
       $consultaPer->bindParam(':nacionalidad', $this->nacionalidad);
       $consultaPer->bindParam(':cedula', $this->cedula);
       $consultaPer->bindParam(':nombre', $this->nombre);
       $consultaPer->bindParam(':apellido', $this->apellido);
       $consultaPer->bindParam(':sexo', $this->sexo);
       $consultaPer->bindParam(':telefono', $this->telefono);
       $consultaPer->bindParam(':correo', $this->correo);
       $resultadoPer= $consultaPer->execute();
      // if ($resultadoPer)
      //   return 'exito';
      // else
      //  return 'fracaso';
    }
    $p=parent::buscar();
    $this->id_per_adm= $p[0]['id_persona'];
    $validar= $db->prepare("SELECT * FROM historial_departamentos WHERE estatus='activo' AND id_personal_administrativo='$this->id_per_adm'");
    $validar->execute();
    $respuesta= $validar->rowCount();
    if ($respuesta>0) {
      return $validar;
    }else {
      $consulta=$db->prepare("INSERT INTO historial_departamentos (id_personal_administrativo,id_cargo,id_departamento,fecha_inicio,fecha_fin,estatus) VALUES (:id_per_adm,:cargo,:departamento,:fecha_inicio,:fecha_fin,:estatus)");
      $consulta->bindParam(':id_per_adm', $this->id_per_adm);
      $consulta->bindParam(':cargo', $this->cargo);
      $consulta->bindParam(':departamento', $this->departamento);
      $consulta->bindParam(':fecha_inicio', $this->fecha_inicio);
      $consulta->bindParam(':fecha_fin', $this->fecha_fin);
      $consulta->bindParam(':estatus', $this->estatus);
      $r= $consulta->execute();
      return $r;
    }
  }

  public static function consultar(){
    $db= DataBase::getInstance();
    $sql= "SELECT * FROM vista_per_adm";
    $resultado=$db->query($sql);
    if($resultado->rowCount()>0)
      return $resultado->fetchAll();
    else
      return null;
  }

}

?>
