<?php
require_once('m_personas.php');//Incluyo la clase padre

class historial_academico extends personas//Inicio la clase, señalando que es hija de personas.
{
  //Declaro los atributos de la clase hija
  public $id_persona;                   //Public
  public $estatus_docente;           //Public
  public $fecha_ini_d;               //Public
  public $fecha_fin_d;               //Public

  public $estatus_tutor;//indica si guardo o no
  public $estatus;
  public $fecha_ini;
  public $fecha_fin;

  //Metodos o acciones que puede realizar la calse.
  function __construct($nacionalidad,$cedula,$nombres,$apellidos,$sexo,$telefono='000000',$correo='No',$estatus_docente,$fecha_ini_d,$fecha_fin_d='Laborando',$estatus_tutor,$estatus,$fecha_ini,$fecha_fin='Laborando') //Constructor de la clase hija.
  {
    //Constructor de la lase padre.
    parent::__construct($nacionalidad,$cedula,$nombres,$apellidos,$sexo,$telefono,$correo);

   //Asigno valores a los elementos del constructor
    $this->estatus_docente= $estatus_docente;
    $this->fecha_ini_d= $fecha_ini_d;
    $this->fecha_fin_d= $fecha_fin_d;

    $this->estatus_tutor= $estatus_tutor; //me indica que lo que porfin

    $this->estatus= $estatus;
    $this->fecha_ini= $fecha_ini;
    $this->fecha_fin= $fecha_fin;
  }

//Metodo registrar datos de la clase hija
  public function crearHistorial($id_per){

    $db= DataBase::getInstance();//Conexion
    $this->id= $id_per;
    //Preparo la consulta
    $consulta=$db->prepare("INSERT INTO docentes (id_persona , estatus_docente, fecha_inicio_d, fecha_fin_d) VALUES (:id_persona, :estatus_docente, :fecha_inicio_d, :fecha_fin_d)");

    //Le asigno valores mediante el constructor, a los values.
    $consulta->bindParam(':id_persona', $this->id);
    $consulta->bindParam(':estatus_docente', $this->estatus_docente);
    $consulta->bindParam(':fecha_inicio_d', $this->fecha_ini_d);
    $consulta->bindParam(':fecha_fin_d', $this->fecha_fin_d);

    //Ejecuto la consulta
    $r=$consulta->execute();
    //Si la consulta se realiza, devuelve exito, sino, fracaso.
    if ($r) {
      $decidir=$this->estatus_tutor;
      if ($decidir== 'No') {
        return 'exito';
      }else{
        $consulta2=$db->prepare("INSERT INTO tutor_academico (id_tutor , estatus_tutor, fecha_inicio_t, fecha_fin_t) VALUES (:id_persona, :estatus_tutor, :fecha_inicio_t, :fecha_fin_t)");
        $consulta2->bindParam(':id_persona', $this->id);
        $consulta2->bindParam(':estatus_tutor', $this->estatus);
        $consulta2->bindParam(':fecha_inicio_t', $this->fecha_ini);
        $consulta2->bindParam(':fecha_fin_t', $this->fecha_fin);
        $resultado=$consulta2->execute();
        if ($resultado) {
         return 'exito';
        }
      }
    }else{
      return 'fracaso';
    }
}

//Metodo consultar datos de la base de datos.
   public static function consultar(){
    $db= DataBase::getInstance(); //Conexion a la base de datos mediante pdo
    $sql= "SELECT * FROM vista_docentes"; //Preparo la consulta
    $resultado=$db->query($sql);  //Ejecuto la consulta

    //Si encuentra mas de 0 resultados, devuelve todas las filas en un arreglo.
      return $resultado->fetchAll();
   
  }

     public static function consultar2(){
    $db= DataBase::getInstance(); //Conexion a la base de datos mediante pdo
    $sql= "SELECT * FROM vista_tutor_academico"; //Preparo la consulta
    $resultado=$db->query($sql);  //Ejecuto la consulta
    return $resultado->fetchAll();
    ;
  }

//Metodo actualizar datos de la clase hija.
  public function actualizar($id)
  {
    $db = Database::getInstance(); //Conexion

    parent::modificar($db); // Metodo modificar de la clase padre.
    $this->id= $p[0]['id_persona']; //Busco el ID de una persona en la clase padre.

    //Peraro la consulta
     $sql = "UPDATE historial_academicos SET  id_cargo='$this->cargo', estatus_tutor='$this->estatus', estatus_activo='$this->estatus', fecha_inicio='$this->fecha_ini', fecha_fin='$this->fecha_fin' WHERE id_tutor_aca='$id'";

      $resultado= $db->query($sql); // Eejecuto la consulta

    //Si logra actualizar, devuelve exito, sino fracaso.
      if ($resultado) {
        return 'exito';
      }
      else{
        return 'fracaso';
      }
  }

//Metodo eliminar datos de la base de datos.
  public static function eliminar($id){
  $db= DataBase::getInstance(); //Conexion

  //Preparo la consulta
  $consulta= $db->prepare("SELECT id_hist_aca FROM historial_academicos WHERE id_hist_aca='".$id."'");
  $consulta->execute();  // Ejecuto la consulta
  $resultado= $consulta->rowCount(); //Cuento  si se econtro el registro

  //Si encuentra el registro, lo elimina, sino no.
  if ($resultado>0) {
    $sql="DELETE FROM historial_academicos WHERE id_hist_aca='".$id."'";

    $resultado2 = $db->query($sql);
      if ($resultado2) {
        return 'exito';
      }else{
        return 'fracaso';
      }
        return 'malo';
    }
  }

//Metodo encontrar datos en la bse de datos.
    public static function encontrar($id)
  {
     $db = DataBase::getInstance();//Conexion

     //Prepario la consulta
     $sql=$db->prepare("SELECT * FROM vista_docentes WHERE id_docente='$id'");
     $resultado= $sql->execute(); //Ejecuto la consulta

      if($resultado>0) //Si encuentra el registro, lo devuelve en un array.
         return $resultado= $sql->fetchAll();
      else
         return null;
  }

  public static function encontrar2($id)
  {
     $db = DataBase::getInstance();//Conexion

     //Prepario la consulta
     $sql=$db->prepare("SELECT * FROM vista_tutor_academico WHERE id_tutor_aca='$id'");
     $resultado= $sql->execute(); //Ejecuto la consulta

      if($resultado>0) //Si encuentra el registro, lo devuelve en un array.
         return $resultado= $sql->fetchAll();
      else
         return null;
  }

} //Fin de la clase.

?>
