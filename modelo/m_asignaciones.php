<?php
require 'DataBase.php';
/**
 *
 */
class asignaciones
{
  private $id_matricula;
  private $id_hist_emp
  function __construct($matricula, $id_hist_emp)
  {
    $this->id_matricula= $matricula;
    $this->$id_hist_emp= $id_hist_emp;
  }

  public function asignarEmp()
  {
    $db= DataBase::getInstance();
    $consultar= $db->prepare("SELECT * FROM asignar_empresa WHERE id_matricula= :id_matricula AND id_hist_emp= :id_hist_emp");
    $consultar->bindParam(':id_matricula', $this->id_matricula);
    $consultar->bindParam(':id_hist_emp', $this->id_hist_emp);
    $resultado= $consultar->execute();
    if ($resultado) {
      return false;
    }else {
      $sql= "INSERT INTO asignar_empresa (id_matricula, id_hist_emp)VALUES (:id_matricula, id_hist_emp)";
      $consulta= $db->prepare($sql);
      $consulta->bindParam(':id_matricula', $this->id_matricula);
      $consulta->bindParam(':id_hist_emp', $this->id_hist_emp);
      $resultado= $consulta->execute();
      if ($resultado) {
        return $resultado;
      }
      else {
        return false;
      }
    }

  }


}



?>
