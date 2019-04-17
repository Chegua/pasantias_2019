<?php
require_once 'DataBase.php';
/**
 *
 */
class asignaciones
{
  private $id_matricula;
  private $id_hist_emp;
  private $id_hist_dpto;
  function __construct($matricula, $id_hist_emp)
  {
    $this->id_matricula= $matricula;
    $this->id_hist_emp= $id_hist_emp;
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
    $resultado= null;
    $db= DataBase::getInstance();
    $consultar= $db->prepare("SELECT * FROM asignar_departamento WHERE id_matricula= :id_matricula AND id_hist_dpto= :id_hist_dpto");
    $consultar->bindParam(':id_matricula', $this->id_matricula);
    $consultar->bindParam(':id_hist_dpto', $this->id_hist_dpto);
    $consultar->execute();
    $existe= $consultar->rowCount();
    $consultar->closeCursor();
    if ($existe>0) {
      return $resultado;
    }else {
      $sql= "INSERT INTO asignar_departamento (id_matricula, id_hist_dpto) VALUES (:id_matricula, :id_hist_dpto)";
      $consulta= $db->prepare($sql);
      $consulta->bindParam(':id_matricula', $this->id_matricula);
      $consulta->bindParam(':id_hist_dpto', $this->id_hist_dpto);
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
}



?>
