<?php
require_once('m_personas.php');

class per_adm extends personas
{
  //ATRIBUTOS
  public $cargo;

  //METODOS
  function __construct($nombres,$apellidos,$cedula,$correo, $sexo,$telefono,$cargo)
  {
    parent::__construct($nombres,$apellidos,$cedula,$correo, $sexo,$telefono);
    $this->cargo= $cargo;
  }

  public function registrar(){
    $db= DataBase::getInstance();

    parent::registrarP($db);
    $p=parent::buscar();
    $this->id= $p[0]['id_persona'];
    $consulta=$db->prepare("INSERT INTO personal_administrativo (id_personal_administrativo, id_cargos) VALUES (:id, :cargo)");

    $consulta->bindParam(':id', $this->id);
    $consulta->bindParam(':cargo', $this->cargo);

    $r=$consulta->execute();
    if ($r) {
      return 1;
    }else{
      return 0;
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
