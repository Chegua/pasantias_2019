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
  /*-------------------------------------------------------*/
  public function registrar(){
    $db= DataBase::getInstance();
    $per=parent::registrarP($db);

    $p=parent::buscar();
    $this->id_per_adm= $p[0]['id_persona'];
    $validar= $db->prepare("SELECT * FROM historial_departamentos WHERE estatus='Activo' AND id_personal_administrativo='$this->id_per_adm'");
    $validar->execute();
    $respuesta= $validar->rowCount();
    if ($respuesta>0){
      return 'existente';
    }else {
      $consulta=$db->prepare("INSERT INTO historial_departamentos (id_personal_administrativo,id_departamento,id_cargo,fecha_inicio,fecha_fin,estatus) VALUES (:id_per_adm,:departamento,:cargo,:fecha_inicio,:fecha_fin,:estatus)");
      $consulta->bindParam(':id_per_adm', $this->id_per_adm);
      $consulta->bindParam(':departamento', $this->departamento);
      $consulta->bindParam(':cargo', $this->cargo);
      $consulta->bindParam(':fecha_inicio', $this->fecha_inicio);
      $consulta->bindParam(':fecha_fin', $this->fecha_fin);
      $consulta->bindParam(':estatus', $this->estatus);
      $r= $consulta->execute();
      if ($r)
        return 'exito';
      else
       return 'fracaso';
    }
  }
  /*-------------------------------------------------------*/
  public static function consultar(){
    $db= DataBase::getInstance();
    $sql= "SELECT * FROM vista_historial_departamentos";
    $resultado=$db->query($sql);
    if($resultado->rowCount()>0)
      return $resultado->fetchAll();
    else
      return null;
  }
  /*-------------------------------------------------------*/

  public static function eliminar($id)
  {
    $db= DataBase::getInstance();
    $consulta= $db->prepare("SELECT id_hist_dpto FROM historial_departamentos WHERE id_hist_dpto='".$id."'");
    $consulta->execute();

    $resultado= $consulta->rowCount();
    if ($resultado>0) {
      $sql="DELETE FROM historial_departamentos WHERE id_hist_dpto='".$id."'";

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

  public static function encontrar($id)
  {
     $db = Database::getInstance();

     $sql="SELECT * FROM vista_historial_departamentos WHERE id_hist_dpto= '$id'";

     $resultado= $db->query($sql);

      if($resultado->rowCount() >0)
         return $resultado->fetch();
      else
         return null;
  }
/*-------------------------------------------------------*/

public function modificar($id_hist_dpto,$id_personal_administrativo){
  $db= DataBase::getInstance();
  $this->id_per_adm= $id_personal_administrativo;
  $per=parent::modificarP($db,$id_personal_administrativo);

  $consulta=$db->prepare("UPDATE historial_departamentos SET id_departamento= :departamento, id_cargo= :cargo,fecha_inicio= :fecha_inicio, fecha_fin= :fecha_fin,estatus= :estatus WHERE id_hist_dpto= '$id_hist_dpto'");
  // $consulta->bindParam(':id_per_adm', $this->id_per_adm);
  $consulta->bindParam(':departamento', $this->departamento);
  $consulta->bindParam(':cargo', $this->cargo);
  $consulta->bindParam(':fecha_inicio', $this->fecha_inicio);
  $consulta->bindParam(':fecha_fin', $this->fecha_fin);
  $consulta->bindParam(':estatus', $this->estatus);
  $r= $consulta->execute();
  if ($r)
    return 'exito';
  else
   return 'fracaso';
}
/*-------------------------------------------------------*/


}

?>
