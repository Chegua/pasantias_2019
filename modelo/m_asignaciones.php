<?php
require_once 'DataBase.php';
/**
 *
 */
class asignaciones
{
  private $id_matricula;
  private $id_hist;
  private $fecha_inicio;
  private $fecha_fin;

  function __construct($matricula=0,$id_hist=0,$fi='',$ff='')
  {
    $this->id_matricula= $matricula;
    $this->id_hist= $id_hist;
    $this->fecha_inicio= $fi;
    $this->fecha_fin= $ff;
  }

  public function asignarEmp()
  {

    $resultado= null;
    $db= DataBase::getInstance();
    $consultar= $db->prepare("SELECT * FROM asignar_empresa WHERE id_matricula= :id_matricula AND id_hist_emp= :id_hist_emp");
    $consultar->bindParam(':id_matricula', $this->id_matricula);
    $consultar->bindParam(':id_hist_emp', $this->id_hist_emp);
    $consultar->execute();
    $existe= $consultar->rowCount();
    $consultar->closeCursor();
    if ($existe>0) {
      return $resultado;
    }else {
      $sql= "INSERT INTO asignar_empresa (id_matricula, id_hist_emp) VALUES (:id_matricula, :id_hist_emp)";
      $consulta= $db->prepare($sql);
      $consulta->bindParam(':id_matricula', $this->id_matricula);
      $consulta->bindParam(':id_hist_emp', $this->id_hist_emp);
      $resultado= $consulta->execute();
      $consulta->closeCursor();
      if ($resultado) {
        return $resultado;
      }
      else {
        $resultado= null;
        return $resultado;
      }
    }

  }

  public function asignarDep()
  {
    $resultado=false;
    try {
      $db= DataBase::getInstance();
      $consultar= $db->prepare("SELECT * FROM asignar_departamento WHERE id_matricula= :id_matricula AND id_hist_dpto= :id_hist_dpto");
      $consultar->bindParam(':id_matricula', $this->id_matricula);
      $consultar->bindParam(':id_hist_dpto', $this->id_hist);
      $consultar->execute();
      $existe= $consultar->rowCount();
      $consultar->closeCursor();
      if ($existe>0) {
        throw new Exception("El estudiante ya se encuentra asignado");      
      }else {
        $sql= "INSERT INTO asignar_departamento (id_matricula,id_hist_dpto,fecha_inicio,fecha_fin) VALUES (:id_matricula,:id_hist_dpto,:fecha_inicio,:fecha_fin)";
        $consulta= $db->prepare($sql);
        $consulta->bindParam(':id_matricula', $this->id_matricula);
        $consulta->bindParam(':id_hist_dpto', $this->id_hist);
        $consulta->bindParam(':fecha_inicio', $this->fecha_inicio);
        $consulta->bindParam(':fecha_fin', $this->fecha_fin);
        $resultado= $consulta->execute();
        $consulta->closeCursor();      
      }      
    } catch (Exception $e) {
      $resultado= false;
      throw new Exception("Error: ".$e->getMessage());      
    }
    return $resultado;
    
  }

  public static function consultar_asignados_empresa()
  {
    $db = DataBase::getInstance();
		$sql= "SELECT *FROM vista_asignar_empresa";
		$resultado=$db->query($sql);
		if($resultado->rowCount() >0)
			return $resultado->fetchAll();
		else
			return null;
  }

  public static function lista_asignados_empresa($empresa)
  {
    $db= DataBase::getInstance();
    $sql= "SELECT * FROM vista_asignar_empresa WHERE empresa='$empresa'";
    $consulta= $db->prepare($sql);
    $resultado= $consulta->execute();
    if ($resultado)
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    else
      return null;
  }

  public static function encontrar_asignar_empresa($id)
  {
    $db= DataBase::getInstance();
    $sql= "SELECT * FROM vista_asignar_empresa WHERE id_asignar_empresa='$id'";
    $consulta= $db->prepare($sql);
    $resultado= $consulta->execute();
    if ($resultado)
        return $consulta->fetch(PDO::FETCH_ASSOC);
    else
      return null;
  }

}



?>
