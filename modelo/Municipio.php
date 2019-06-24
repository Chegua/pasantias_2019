<?php
// require_once('DataBase.php');
require_once('Estado.php');

class municipios{
  //ATRIBUTOS ESTADO
  private $_codigo;
  private $_nombre;
  private $_estado;

  //CONSTRUCTOR
  public function __construct($c=0,$n=""){
    $this->_codigo=$c;
    $this->_nombre=$n;
  }

  //------------------METODOS GOLLO-------------------------
  public function getCodigo(){
    return $this->_codigo;
  }

  public function asignarEstado(estados $e){
		$this->_estado=$e;
	}

	public function buscarxEstado(){
		$resultado=false;
		try{
      $bd=DataBase::getInstance();
      $x= $this->_estado->getCodigo();
      $consulta = $bd->prepare("SELECT *FROM municipios WHERE id_estado = :codigoestado");
      $consulta->bindParam(':codigoestado', $x);
      $resultado= $consulta->execute();
      // $x= $this->_estado->getCodigo();
      // $sql="SELECT * FROM municipio WHERE estado_id ='$x'";
      // $resultado = $bd->query($sql);
      if ($resultado) {
      	$resultado = $consulta->fetchAll();
      }
      $consulta->closeCursor();
	   	}catch(Exception $a){
		   $resultado = false;
		   throw new Exception($a->getMessage(), $a->getCode());

		   }

		return $resultado;
	}//fin buscar
	public function buscar(){
		$resultado=false;
		try{

       		$bd=DataBase::getInstance();
       	  $consulta = $bd->prepare("SELECT * FROM municipios WHERE id_municipio = :id");
       		$consulta->bindParam(':id', $this->_codigo);
       		$resultado= $consulta->execute();
         	if ($resultado) {
            	$resultado = $consulta->fetch();
       		 }
       		$consulta->closeCursor();
	   	}catch(Exception $a){
		   $resultado = false;
		   throw new Exception($a->getMessage(), $a->getCode());

		}

		return $resultado;
	}//fin buscar

    public function listar (){
		$resultado=false;
		try{
       		$bd=DataBase::getInstance();
       		$consulta = $bd->prepare('SELECT * FROM vista_estado_municipio');
        	$consulta->execute();
        	$resultado = $consulta->fetchAll();
        	$consulta->closeCursor();
       }catch(Exception $a){
		  $resultado=false;
		  throw new Exception($a->getMessage(), $a->getCode());

		}
		return $resultado;
    }//fin Mostrar

//METODOS ESTADO
/*--------------------------------------------*/
  public function guardar($nombre,$estado){
    $db= DataBase::getInstance();

    $consulta1=$db->prepare("SELECT id_municipio FROM municipios WHERE nombre_municipio='".$nombre."' and id_estado='".$estado."'");

    $consulta1->execute();
    $resultado1= $consulta1->rowCount();

    if ($resultado1>0) {
      return 'existente';
    }else{

      $consulta = $db->prepare("INSERT INTO municipios (nombre_municipio,id_estado) VALUES (:municipio, :id_estado)");

      $consulta->bindParam(':municipio',$nombre);
      $consulta->bindParam(':id_estado',$estado);

        $resultado=$consulta->execute();
        if ($resultado) {
          return 'exito';
        }
        else{
         return 'fracaso';
        }
    }
}

   public function encontrar($id)
  {
     $db = Database::getInstance();

     $sql="SELECT * FROM municipios WHERE id_municipio= '$id'";

     $resultado= $db->query($sql);

      if($resultado->rowCount() >0)
         return $resultado->fetchAll();
      else
         return null;
  }

/*--------------------------------------------*/

    public function consultar($valor)
  {
    $db = Database::getInstance();
    $sql="SELECT * FROM municipios WHERE nombre_municipio LIKE '%".$valor."%'";
    $resultado=$db->query($sql);
  return $resultado;
  }

     public function consultar2()
  {
    $db = Database::getInstance();
    $sql="SELECT *FROM municipios";

    $resultado=$db->query($sql);

    if($resultado->rowCount() >0)
      return $resultado->fetchAll();
    else
      return null;
  }

  public function listarAnidados($caja,$estado){
  	$db = Database::getInstance();

  	$sql="SELECT * FROM municipios,estados WHERE municipios.id_estado = estados.id_estado  and nombre_municipio LIKE '%".$caja."%'";

	$resultado= $db->query($sql);

		return $resultado;
	}

  public function actualizar($id,$nombre){

    $db = Database::getInstance();
    $consulta1= $db->prepare("SELECT id_municipio FROM municipios WHERE id_municipio!='".$id."' and nombre_municipio='$nombre'");

    $consulta1->execute();
    $resultado1= $consulta1->rowCount();

    if ($resultado1>0) {
      return 'existente';
    }
    else{
      $sql = "UPDATE municipios SET nombre_municipio='$nombre' WHERE id_municipio='$id'";

     $resultado= $db->query($sql);

      if ($resultado) {
        return 'exito';
      }
      else{
        return 'fracaso';
      }
    }
}

public function eliminar($id){
  $db= DataBase::getInstance();
  $consulta= $db->prepare("SELECT id_municipio FROM municipios WHERE id_municipio='".$id."'");
  $consulta->execute();
  $resultado= $consulta->rowCount();

  if ($resultado>0) {
    $sql="DELETE FROM municipios WHERE id_municipio='".$id."'";

    $resultado2 = $db->query($sql);
      if ($resultado2) {
        return 'exito';
      }else{
        return 'fracaso';
      }
        return 'malo';
    }
  }

}//fin clase