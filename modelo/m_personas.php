<?php
require_once('DataBase.php');

class personas{
  //ATRIBUTOS DE PERSONA
  protected $id;
  protected $tipo;
  protected $nombre;
  protected $apellido;
  protected $nacionalidad;
  protected $cedula;
  protected $correo;
  protected $sexo;
  protected $telefono;
  protected $clave;


  //CONTRUCTOR personas
  function __construct($nacionalidad,$cedula,$nombre,$apellido,$sexo,$telefono,$correo)
  {
    $this->nacionalidad = $nacionalidad;
    $this->cedula= $cedula;
		$this->nombre = $nombre;
    $this->apellido= $apellido;
    $this->sexo= $sexo;
    $this->telefono= $telefono;
    $this->correo= $correo;
  }

  public function registrarUser()
  {
    $db = Database::getInstance();
    $sql= "INSERT INTO personas (nacionalidad,cedula,nombre,apellido,sexo,telefono,correo,tipo,clave) VALUES (:nacionalidad,:cedula,:nombre,:apellido,:sexo,:telefono,:correo,:tipo,:clave)";
    try {
      $consulta= $db->prepare($sql);
      $consulta->bindParam(':nacionalidad', $this->nacionalidad);
      $consulta->bindParam(':cedula', $this->cedula);
      $consulta->bindParam(':nombre', $this->nombre);
      $consulta->bindParam(':apellido', $this->apellido);
      $consulta->bindParam(':sexo', $this->sexo);
      $consulta->bindParam(':telefono', $this->telefono);
      $consulta->bindParam(':correo', $this->correo);
      $consulta->bindParam(':tipo', $this->tipo);
      $consulta->bindParam(':clave', $this->clave);
      $resultado= $consulta->execute();
      // if ($resultado) 
      //   return $db->lastInsertId(); 
    } catch (Exception $e){      
      throw new Exception("El usuario ya se encuentra registrado");
    }
    return $resultado;
  }

  public function asignarClave($token)
  {
    $resultado= false;
    $db= Database::getInstance();
    $sql= "UPDATE personas SET clave=:clave WHERE cedula=:cedula AND token=:token";

    try {
      
      $consulta2= $db->prepare($sql);
      $consulta2->bindParam(':cedula', $this->cedula);     
      $consulta2->bindParam(':clave', $this->clave);
      $consulta2->bindParam(':token', $token);
      $resultado= $consulta2->execute();
      if ($consulta2->rowCount()==0) {
        throw new Exception("Error: Algunos de los datos ingresados son incorrectos");        
      }

    } catch (Exception $e){  
      $resultado= false;
      throw new Exception($e->getMessage());
    }
    return $resultado;
  }

  public function login()
  {
      $resultado= false;
      try {
          $db= DataBase::getInstance();
          $consulta= $db->prepare("SELECT * FROM personas WHERE cedula= :cedula");
          $consulta->bindParam(':cedula',$this->cedula);
          $consulta->execute();
          $resultado= $consulta->fetchAll(PDO::FETCH_ASSOC);
          //$consulta->closeCursor();
          if (count($resultado)>0){
              if ($resultado[0]['clave']==NULL) {
                throw new Exception("Debe asignar una contraseña");                
              }
              if (password_verify($this->clave,$resultado[0]['clave'])){
                  $this->id= $resultado[0]['id_persona'];
                  session_start();
                  $_SESSION['user_id'] = $resultado[0]['id_persona'];
                  $_SESSION['user_tipo'] = $resultado[0]['tipo'];                    
              }                    
              else
                  throw new Exception("Contraseña incorrecta");
          }   
          else
              throw new Exception("Usuario no registrado");                
                      
      } catch (Exception $e) {
          $resultado= false; 
          throw new Exception ('Error: '.$e->getMessage());
      }
      return $resultado;
  }

  public static function comprobarUsuario($id)
  {
      $db= DataBase::getInstance();
      $consulta= $db->prepare("SELECT * FROM personas WHERE id_persona= :id_persona ");
      $consulta->bindParam(':id_persona',$id);
      $resultado= $consulta->execute();
      if ($resultado)
          return $consulta->fetch(PDO::FETCH_ASSOC);
      else
          return null;
  }

  //METODOS personas
  public function registrarP(){
    $db = Database::getInstance();
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

  public static function buscarAdm()
  {
    $tipo= 'Administrador';
    $db = Database::getInstance();
    $sql="SELECT * FROM personas WHERE tipo= :tipo";
    $consulta= $db->prepare($sql);
    $consulta->bindParam(':tipo',$tipo);
    $consulta->execute();
    $resultado= $consulta->fetchAll(PDO::FETCH_ASSOC);
    if(count($resultado) >0)
      return $resultado;
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

  public function generarToken()
  {
    $token= bin2hex(random_bytes(20));
    return $token;        
  }

  public function getCodigo(){
		return $this->id;
  }
  
  public function setTipo($t){
    $this->tipo= $t;
  }

  public function setClave($c){
    $this->clave= $c;
  }

}

?>
