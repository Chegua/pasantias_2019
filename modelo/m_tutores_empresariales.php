<?php
require_once('m_personas.php');

class tutores_empresariales extends personas
{
  //ATRIBUTOS
  public $cargo;
  public $empresa_mencion;
  public $fecha_inicio;
  public $fecha_fin;
  public $estatus;

  //METODOS
  function __construct($nacionalidad,$cedula,$nombre,$apellido,$sexo,$telefono,$correo,$cargo,$empresa_mencion,$fecha_inicio,$fecha_fin,$estatus)
  {
    parent::__construct($nacionalidad,$cedula,$nombre,$apellido,$sexo,$telefono,$correo);
    $this->cargo= $cargo;
    $this->empresa_mencion= $empresa_mencion;
    $this->fecha_inicio= $fecha_inicio;
    $this->fecha_fin= $fecha_fin;
    $this->estatus= $estatus;

  }

  public function crearHistorial($id_per){
    $db= DataBase::getInstance(); 
    $this->id= $id_per;
    $validar= $db->prepare("SELECT * FROM historial_empresas WHERE estatus='Activo' AND id_tutor_empresarial='$this->id'");
    $validar->execute();
    $respuesta= $validar->rowCount();
    if ($respuesta>0){
      return 'existente';
    }else{
      $consulta=$db->prepare("INSERT INTO historial_empresas (id_tutor_empresarial, id_empresa_mencion, id_cargo, fecha_inicio, fecha_fin, estatus) VALUES (:tutor_emp,:emp_men, :cargo, :f_inicio, :f_fin, :estatus)");
      $consulta->bindParam(':tutor_emp', $this->id);
      $consulta->bindParam(':emp_men', $this->empresa_mencion);
      $consulta->bindParam(':cargo', $this->cargo);
      $consulta->bindParam(':f_inicio', $this->fecha_inicio);
      $consulta->bindParam(':f_fin', $this->fecha_fin);
      $consulta->bindParam(':estatus', $this->estatus);
      $resultado=$consulta->execute();
      if ($resultado)
        return 'exito';
      else
        return 'fracaso'; 
    }    
  }

  public static function consultar(){
    $db= DataBase::getInstance();
    $sql= "SELECT * FROM vista_historial_empresarial";
    $resultado=$db->query($sql);
    // if($resultado->rowCount()>0)
      return $resultado->fetchAll(PDO::FETCH_OBJ);
   
  }

  public static function encontrar($id){
    $db= DataBase::getInstance();
    $sql= "SELECT * FROM vista_historial_empresarial WHERE id_hist_emp='$id'";
    $resultado=$db->query($sql);
    if($resultado->rowCount()>0)
      return $resultado->fetch(PDO::FETCH_ASSOC);
    else
      return null;
  }

  public static function lista_empresarial($mencion){
    $db= DataBase::getInstance();
    $sql= "SELECT * FROM vista_historial_empresarial WHERE mencion='$mencion'";
    $resultado=$db->query($sql);
    if($resultado->rowCount()>0)
      return $resultado->fetchAll(PDO::FETCH_ASSOC);
    else
      return null;
  }

  public static function lista_tutorxempresa($id_empresa_mencion){
    $db= DataBase::getInstance();
    $sql= "SELECT * FROM vista_historial_empresarial WHERE id_empresa_mencion='$id_empresa_mencion'";
    $resultado=$db->query($sql);
    if($resultado->rowCount()>0)
      return $resultado->fetchAll(PDO::FETCH_ASSOC);
    else
      return null;
  }

  public static function eliminar($id)
  {
    $db= DataBase::getInstance();
    $sql= "DELETE FROM historial_empresas WHERE  id_hist_emp= '$id'";
    // $sql2="DELETE FROM empresas WHERE  id_empresa= '$id'";
    $resultado=$db->query($sql);
    // $resultado2=$db->query($sql2);

    if ($resultado) {
      return 'exito';
    }else{
      return 'fracaso';
    }
      return 'malo';
  }

}

?>
