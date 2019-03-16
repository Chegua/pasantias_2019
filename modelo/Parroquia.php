<?php
require_once('Municipio.php');
class parroquias{
  //ATRIBUTOS PARROQUIA
  private $_codigo;
  private $_nombre;
  private $_municipio;

  //CONSTRUCTOR
  public function __construct($c=0,$n=""){
    $this->_codigo=$c;
    $this->_nombre=$n;
  }

  //------------------METODOS GOLLO-------------------------
  public function getCodigo(){
    return $this->_codigo;
  }

  public function asignarMunicipio(municipios $m){
		$this->_municipio=$m;
	}

	public function buscarxMunicipio(){
		$resultado=false;
		try{

       		$bd=Database::getInstance();
          $x= $this->_municipio->getCodigo();
       	  $consulta = $bd->prepare("SELECT * FROM parroquias WHERE id_municipio = :codigomunicipio");
       		$consulta->bindParam(':codigomunicipio', $x);
       		$resultado= $consulta->execute();
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
       	  $consulta = $bd->prepare("SELECT * FROM parroquias WHERE id_parroquia = :id");
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

    public function listar(){
		$resultado=false;
		try{
       		$bd=DataBase::getInstance();
       		$consulta = $bd->prepare('SELECT * FROM parroquias');
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
      public function guardar($nombres,$municipio){
        $db= DataBase::getInstance();

        $no= ucwords(strtolower($nombres));
        $nombre=trim($no);

        $consulta1=$db->prepare("SELECT id_parroquia FROM parroquias WHERE id_municipio='$municipio' and nombre_parroquia='$nombre'");

        $consulta1->execute();
        $resultado1= $consulta1->rowCount();

        if ($resultado1>0) {
          return 'existente';
        }else{

          $consulta = $db->prepare("INSERT INTO parroquias (id_municipio, nombre_parroquia) VALUES (:municipio,:parroquia)");

          $consulta->bindParam(':municipio',$municipio);
          $consulta->bindParam(':parroquia',$nombre);

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

         $sql="SELECT * FROM estados WHERE id_estado= '$id'";

         $resultado= $db->query($sql);

          if($resultado->rowCount() >0)
             return $resultado->fetchAll();
          else
             return null;
      }

    /*--------------------------------------------*/

        public function consultar($valores)
      {
        $db = Database::getInstance();
        $va= ucwords(strtolower($valores)); //convierte la primera letra a mayuscula
        $valor=trim($va);//elimina los espacios del inicio y el final de cada cadena

        $sql="SELECT * FROM estados WHERE nombre_estado LIKE '%".$valor."%'";
        $resultado=$db->query($sql);
      return $resultado;
      }

         public function consultar2()
      {
        $db = DataBase::getInstance();
        $sql="SELECT *FROM parroquia";

        $resultado=$db->query($sql);

        if($resultado->rowCount() >0)
          return $resultado->fetchAll();
        else
          return null;
      }

      public function actualizar($id,$nombres){

        $db = Database::getInstance();

        $no= ucwords(strtolower($nombres)); //convierte la primera letra a mayuscula
        $nombre=trim($no);//elimina los espacios del inicio y el final de cada cadena
        $consulta1= $db->prepare("SELECT id_estado FROM estados WHERE id_estado!='".$id."' and nombre_estado='$nombre'");

        $consulta1->execute();
        $resultado1= $consulta1->rowCount();

        if ($resultado1>0) {
          return 'existente';
        }
        else{
          $sql = "UPDATE estados SET nombre_estado='$nombre' WHERE id_estado='$id'";

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
      $consulta= $db->prepare("SELECT id_estado FROM estados WHERE id_estado='".$id."'");
      $consulta->execute();
      $resultado= $consulta->rowCount();

      if ($resultado>0) {
        $sql="DELETE FROM estados WHERE id_estado='".$id."'";

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

?>
