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

  public function registrar(){
    $db= DataBase::getInstance();

    // parent::registrarP($db);
    $consulta=  $db->prepare("SELECT id_persona FROM personas WHERE cedula= '$this->cedula'");
    $consulta->execute();
    $resultado= $consulta->rowCount();

    if ($resultado>0) {
      return 'existente';
    }else {
      $consulta2= $db->prepare("INSERT INTO personas (nombre,apellido,nacionalidad,cedula,correo,sexo,telefono) VALUES (:nombre,:apellido,:nacionalidad,:cedula,:correo,:sexo,:telefono)");
       $consulta2->bindParam(':nombre', $this->nombre);
       $consulta2->bindParam(':apellido', $this->apellido);
       $consulta2->bindParam(':nacionalidad', $this->nacionalidad);
       $consulta2->bindParam(':cedula', $this->cedula);
       $consulta2->bindParam(':correo', $this->correo);
       $consulta2->bindParam(':sexo', $this->sexo);
       $consulta2->bindParam(':telefono', $this->telefono);

       $resultado2= $consulta2->execute();
     }

      if ($resultado2){
        $p=parent::buscar();
        $this->id= $p[0]['id_persona'];
        $consulta3=$db->prepare("INSERT INTO historial_empresas (id_tutor_empresarial, id_empresa_mencion, id_cargo, fecha_inicio, fecha_fin, estatus) VALUES (:tutor_emp,:emp_men, :cargo, :f_inicio, :f_fin, :estatus)");
        $consulta3->bindParam(':tutor_emp', $this->id);
        $consulta3->bindParam(':emp_men', $this->empresa_mencion);
        $consulta3->bindParam(':cargo', $this->cargo);
        $consulta3->bindParam(':f_inicio', $this->fecha_inicio);
        $consulta3->bindParam(':f_fin', $this->fecha_fin);
        $consulta3->bindParam(':estatus', $this->estatus);

        $resultado3=$consulta3->execute();

        if ($resultado3)
          return 'exito';
        else
         return 'fracaso';
      }
      else{
        return 'fracaso';
      }

  }

  public static function consultar(){
    $db= DataBase::getInstance();
    $sql= "SELECT * FROM vista_historial_empresarial";
    $resultado=$db->query($sql);
    if($resultado->rowCount()>0)
      return $resultado->fetchAll(PDO::FETCH_OBJ);
    else
      return null;
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
