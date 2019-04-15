<?php
// require_once('../modelo/m_departamentos.php');
require_once('../modelo/m_empresas.php');
require_once('../modelo/m_tutores_empresariales.php');
require_once('../modelo/m_personaladm.php');



if (isset($_REQUEST['mencion'])) {
  $mencion= $_REQUEST['mencion'];
}
if (isset($_REQUEST['id_empresa_mencion'])) {
  $id_empresa_mencion= $_REQUEST['id_empresa_mencion'];
}

if (isset($_REQUEST['id_matricula'])) {
  $id_matricula= $_REQUEST['id_matricula'];
}

if (isset($_REQUEST['id_hist_emp'])) {
  $id_hist_emp= $_REQUEST['id_hist_emp'];
}

switch ($_REQUEST['opcion']) {
  case 'listar_empresas':
    $resultado = empresas::lista_empresas_disponibles($mencion);
    $resultado= json_encode($resultado);
    echo $resultado;
    break;

  case 'listar_departamentos':
    $resultado = personal_administrativo::consultar();
    $resultado= json_encode($resultado);
    echo $resultado;
    break;

  case 'lista_tutorxempresa':
    $resultado = tutores_empresariales::lista_tutorxempresa($id_empresa_mencion);
    $resultado= json_encode($resultado);
    echo $resultado;
    break;

  case 'asignar_emp':
    $obj_asignacion= new asignaciones($id_matricula, $id_hist_emp);
    $resultado= $obj_asignacion->asignarEmp();
    $resultado= json_encode($resultado);
    echo $resultado;
    break;

  default:
    // code...
    break;
}
?>
