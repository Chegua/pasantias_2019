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
}//fin clase


//METODOS estados
/*--------------------------------------------*/
//   public function guardar($nombre){
//     $db= DataBase::getInstance();
//
//     $consulta1=$db->prepare("SELECT id_estado FROM estados WHERE nombre='$nombre'");
//
//     $consulta1->execute();
//     $resultado1= $consulta1->rowCount();
//
//     if ($resultado1>0) {
//       return 'existente';
//     }else{
//
//       $consulta = $db->prepare("INSERT INTO estados (nombre) VALUES (:estados)");
//       $consulta->bindParam(':estados',$nombre);
//
//         $resultado=$consulta->execute();
//         if ($resultado) {
//           return 'exito';
//         }
//         else{
//          return 'fracaso';
//         }
//     }
// }
//
//    public function encontrar($id_estado)
//   {
//      $db = DataBase::getInstance();
//
//      $sql="SELECT * FROM estados WHERE id_estado= '$id_estado'";
//
//      $resultado= $db->query($sql);
//
//       if($resultado->rowCount() >0)
//          return $resultado->fetchAll();
//       else
//          return null;
//   }
//
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
//   public function actualizar($id_estado,$nombre){
//
//     $db = DataBase::getInstance();
//     $consulta1= $db->prepare("SELECT id_estado FROM estados WHERE id_estado!='".$id_estado." AND 'nombre='$nombre'");
//
//     $consulta1->execute();
//     $resultado1= $consulta1->rowCount();
//
//     if ($resultado1>0) {
//       return 'existente';
//     }
//     else{
//       $sql = "UPDATE estados SET nombre_estados='$nombre' WHERE id_estado='$id_estado'";
//
//      $resultado= $db->query($sql);
//
//       if ($resultado) {
//         return 'exito';
//       }
//       else{
//         return 'fracaso';
//       }
//     }
// }
//
// public function eliminar($id_estado){
//   $db= DataBase::getInstance();
//   $consulta= $db->prepare("SELECT id_estado_estados FROM estados WHERE id_estado_estados='".$id_estado."'");
//   $consulta->execute();
//   $resultado= $consulta->rowCount();
//
//   if ($resultado>0) {
//     $sql="DELETE FROM estados WHERE id_estado_estados='".$id_estado."'";
//
//     $resultado2 = $db->query($sql);
//       if ($resultado2) {
//         return 'exito';
//       }else{
//         return 'fracaso';
//       }
//         return 'malo';
//     }
//   }

