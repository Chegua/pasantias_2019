<?php
require_once('DataBase.php');
class estados{
  //ATRIBUTOS estados
  private $_codigo;
  private $_nombre;
  //CONSTRUCTOR
  public function __construct($c=0,$n=""){
    $this->_codigo=$c;
    $this->_nombre=$n;
  }

  //metodos gollo
  public function getCodigo(){
		return $this->_codigo;
	}

	public function buscar(){
		$resultado=false;
		try{
       		$bd=DataBase::getInstance();
       	   $consulta = $bd->prepare("SELECT * FROM estados WHERE id_estado = :codigo");
       		$consulta->bindParam(':codigo', $this->_codigo);
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
       		$consulta = $bd->prepare('SELECT * FROM estados');
        	$consulta->execute();
        	$resultado = $consulta->fetchAll();
        	$consulta->closeCursor();
          
       }catch(Exception $a){
		  $resultado=false;
		  throw new Exception($a->getMessage(), $a->getCode());
		}
		return $resultado;
  }//fin Mostrar


  	public function registrar(){

		$db= DataBase::getInstance();
		$sql="SELECT id_estado FROM estados WHERE nombre_estado='$this->_nombre'";
		$consulta1=$db->prepare($sql);
		$consulta1->execute();
		$resultado1= $consulta1->rowCount();
		if ($resultado1>0) {
			return 'existente';
		}else{
			$consulta = $db->prepare("INSERT INTO estados (nombre_estado) VALUES (:estado)");
			$consulta->bindParam(':estado',$this->_nombre);
			
			$resultado=$consulta->execute();
			if ($resultado) {
			return 'exito';
			}
			else{
			return 'fracaso';
			}
		}
	}

	public function eliminar($id)
	{
			$resultado= false;
			$db= DataBase::getInstance();
			$sql="DELETE FROM estados WHERE id_estado= :id_estado";
			try {
				$consulta= $db->prepare($sql);
				$consulta->bindParam(':id_estado', $id);
				$resultado= $consulta->execute();
			} catch (Exception $e) {
				$resultado=false;
				throw new Exception("Error al eliminar. Puede que el registro este siendo usado");
				
			}
			return $resultado;
		
	}
	  

}//fin clase


//METODOS estados
/*--------------------------------------------*/


// /*--------------------------------------------*/
//
//     public function consultar($valor)
//     {
//       $db = DataBase::getInstance();
//       $sql="SELECT * FROM estados WHERE nombre LIKE '%".$valor."%'";
//       $resultado=$db->query($sql);
//       return $resultado;
//     }
//
//      public function consultar2()
//      {
//        $db = DataBase::getInstance();
//        $sql="SELECT *FROM estados";
//
//        $resultado=$db->query($sql);
//        if($resultado->rowCount() >0)
//           return $resultado->fetchAll();
//        else
//           return null
//       }
//



