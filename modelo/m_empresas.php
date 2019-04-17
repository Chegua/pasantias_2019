<?php
require_once 'DataBase.php';

class empresas{
  //ATRIBUTOS empresa
  private $id_empresa;
  public $empresa;
  private $tipo;
  private $rif;
  private $telefono;
  private $correo;
  private $comunidad;

  //CONSTRUCTOR
  public function __construct($n='', $t='', $rif='', $tel='',$correo='', $comunidad='')
  {
    $this->empresa= $n;
    $this->tipo= $t;
    $this->rif= $rif;
    $this->telefono= $tel;
    $this->correo= $correo;
    $this->comunidad= $comunidad;
  }

  public function getId(){
    $db= DataBase::getInstance();
    $sql= "SELECT id_empresa FROM empresas WHERE rif= '$this->rif'";
    $consulta= $db->prepare($sql);
    $resultado= $consulta->execute();
    if ($resultado)
      return $resultado= $consulta->fetch(PDO::FETCH_OBJ);
    else
      return null;
  }

  public function setId($id){
    $this->id_empresa=$id;
  }

  //METODOS empresa
  public function registrar()
  {
    $db= DataBase::getInstance();
    $emp= ucwords(strtolower($this->empresa)); //convierte la primera letra a mayuscula
    $empresa=trim($emp);//elimina los espacios del inicio y el final de cada cadnea

    $consulta1=$db->prepare("SELECT id_empresa FROM empresas WHERE empresa='$empresa'");

    $consulta1->execute();
    $resultado1= $consulta1->rowCount();

    if ($resultado1>0) {
      return 'existente';
    }else{
      $sql= "INSERT INTO empresas(id_comunidad,tipo,rif,empresa,telefono,correo) VALUES (:id_comu,:tipo,:rif,:emp,:tlf,:correo)";
      $consulta= $db->prepare($sql);
      $consulta->bindParam(':id_comu',$this->comunidad);
      $consulta->bindParam(':tipo',$this->tipo);
      $consulta->bindParam(':rif',$this->rif);
      $consulta->bindParam(':emp',$empresa);
      $consulta->bindParam(':tlf',$this->telefono);
      $consulta->bindParam(':correo',$this->correo);

      $resultado=$consulta->execute();
      if ($resultado) {
        return 'exito';
      }
      else{
       return 'fracaso';
      }
    }
  }

  public function consultar()
  {
    $db= DataBase::getInstance();
    $sql= "SELECT *FROM vista_empresas";
    $consulta= $db->prepare($sql);
    $resultado= $consulta->execute();
    if ($resultado)
        return $resultado= $consulta->fetchAll(PDO::FETCH_OBJ);
    else
      return null;
  }
  public function consultar2()
  {
    $db= DataBase::getInstance();
    $sql= "SELECT *FROM vista_empresas_menciones";
    $consulta= $db->prepare($sql);
    $resultado= $consulta->execute();
    if ($resultado)
        return $resultado= $consulta->fetchAll(PDO::FETCH_ASSOC);
    else
      return null;
  }

  public static function filtrar($valor){
    try {
      $db= DataBase::getInstance();
      $sql= "SELECT *FROM vista_empresas WHERE empresa LIKE '".$valor."%'";
      $consulta= $db->prepare($sql);
      $resultado= $consulta->execute();
      if($resultado){
        $json=array();
        while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
          $json[]= array(
            'empresa' => $row['empresa'],
            'tipo' => $row['tipo'],
            'rif' => $row['rif']
           );
        }
        return $json;
      }
    } catch (\Exception $e) {
      $resultado=null;
      throw new Exception($e->getMessage(), $e->getCode());
    }
  }

  public function encontrar($id)
  {
     $db = Database::getInstance();
     $sql="SELECT * FROM vista_empresas_menciones WHERE id_empresa= '$id'";
     $resultado= $db->query($sql);
      if($resultado->rowCount() >0)
         return $resultado->fetch(PDO::FETCH_OBJ);
      else
         return null;
  }

  public function encontrar_empresa_mencion($id)
  {
     $db = Database::getInstance();
     $sql="SELECT * FROM vista_empresas_menciones WHERE id_empresa= '$id'";
     $resultado= $db->query($sql);
      if($resultado->rowCount() >0)
         return $resultado->fetchAll(PDO::FETCH_ASSOC);
      else
         return null;
  }

  public function actualizar($id){
    $emp= ucwords(strtolower($this->empresa)); //convierte la primera letra a mayuscula
    $empresa=trim($emp);//elimina los espacios del inicio y el final de cada cadnea

    $db = Database::getInstance();
    $sql="UPDATE empresas SET empresa=:emp, tipo= :tipo, rif= :rif, telefono= :tlf, correo= :correo, id_comunidad= :comu WHERE id_empresa='$id'";
    $consulta= $db->prepare($sql);

    $consulta->bindParam(':comu',$this->comunidad);
    $consulta->bindParam(':tipo',$this->tipo);
    $consulta->bindParam(':rif',$this->rif);
    $consulta->bindParam(':emp',$empresa);
    $consulta->bindParam(':tlf',$this->telefono);
    $consulta->bindParam(':correo',$this->correo);

    $resultado= $consulta->execute();

    if ($resultado) {
        return 'exito';
    }
      else{
        return 'fracaso';
      }
  }

  public function eliminar($id)
  {
    $db= DataBase::getInstance();
    $sql= "DELETE FROM empresas_menciones WHERE  id_empresa= '$id'";
    $sql2="DELETE FROM empresas WHERE  id_empresa= '$id'";
    $resultado=$db->query($sql);
    $resultado2=$db->query($sql2);

    if ($resultado2) {
      return 'exito';
    }else{
      return 'fracaso';
    }
      return 'malo';
  }

  public function registrar2($codmen)
  {
    $db= DataBase::getInstance();

    $consulta1=$db->prepare("SELECT id_empresa_mencion FROM empresas_menciones WHERE id_empresa='$this->id_empresa' AND id_mencion='$codmen'");

    $consulta1->execute();
    $resultado1= $consulta1->rowCount();

    if ($resultado1>0) {
      return 'existente';
    }else{

      $consulta = $db->prepare("INSERT INTO empresas_menciones (id_empresa,id_mencion) VALUES (:emp,:cod_me)");
      $consulta->bindParam(':emp',$this->id_empresa);
      $consulta->bindParam(':cod_me',$codmen);


        $resultado=$consulta->execute();
        if ($resultado) {
          return 'exito';
        }
        else{
         return 'fracaso';
        }
    }
  }

  public function mostrar_asignarMen($rif)
 	{
   	$db = Database::getInstance();

    $sql="SELECT * FROM vista_empresas_menciones WHERE rif = $rif";

		$resultado=$db->query($sql);
		if($resultado->rowCount() >0)
			return $resultado->fetchAll();
		else
			return null;
	}

  public static function lista_empresas_disponibles($mencion)
  {
    $db= DataBase::getInstance();
    $sql= "SELECT *FROM vista_empresas_menciones WHERE mencion='$mencion'";
    $consulta= $db->prepare($sql);
    $resultado= $consulta->execute();
    if ($resultado)
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    else
      return null;
  }




}

?>
