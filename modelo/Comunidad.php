<?php
require_once('Parroquia.php');
class comunidades{
  //ATRIBUTOS PARROQUIA
  private $_codigo;
  private $_nombre;
  private $_parroquia;

  //CONSTRUCTOR
  public function __construct($c=0,$n=""){
    $this->_codigo=$c;
    $this->_nombre=$n;
  }

  //------------------METODOS GOLLO-------------------------
  public function asignarParroquia(parroquias $p){
		$this->_parroquia=$p;
	}

	public function buscarxParroquia(){
		$resultado=false;
		try{

       		$bd=Database::getInstance();
          $x= $this->_parroquia->getCodigo();
       	  $consulta = $bd->prepare("SELECT * FROM comunidades WHERE id_parroquia = :codigoparroquia");
       		$consulta->bindParam(':codigoparroquia', $x);
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
       	  $consulta = $bd->prepare("SELECT * FROM comunidades WHERE id_comunidad = :id");
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
       		$consulta = $bd->prepare('SELECT * FROM comunidades');
        	$consulta->execute();
        	$resultado = $consulta->fetchAll();
        	$consulta->closeCursor();
       }catch(Exception $a){
		  $resultado=false;
		  throw new Exception($a->getMessage(), $a->getCode());

		}
		return $resultado;
    }//fin Mostrar

    public function registrar($id){
      $db= DataBase::getInstance();

      $consulta1=$db->prepare("SELECT id_comunidad FROM comunidades WHERE nombre_comunidad='$this->_nombre' AND id_parroquia= '$id'");

      $consulta1->execute();
      $resultado1= $consulta1->rowCount();

      if ($resultado1>0) {
        return 'existente';
      }else{

        $consulta = $db->prepare("INSERT INTO comunidades (nombre_comunidad, id_parroquia) VALUES (:comunidad, :id)");
        $consulta->bindParam(':comunidad',$this->_nombre);
        $consulta->bindParam(':id',$id);

          $resultado=$consulta->execute();
          if ($resultado) {
            return 'exito';
          }
          else{
           return 'fracaso';
          }
      }
		}

		public function acutualizar()
		{
			$db= DataBase::getInstance();
			$sql= "UPDATE comunidades SET nombre_comunidad= :nombre_comunidad, id_parroquia= :id_parroquia WHERE id_comunidad= :id_comunidad";
			$consulta->prepare($sql);
			$consulta->bindParam(':nombre_comunidad', $this->_nombre);
			$consulta->bindParam(':id_parroquia', $this->_parroquia);
			$consulta->bindParam(':id_comunidad', $this->_codigo);
			$resultado= $consulta->execute();
			
			if ($resultado) {
				return 'exito';
			}
			else{
			 return 'fracaso';
			}

		}		

}

?>
