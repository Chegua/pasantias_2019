<?php
require_once ('../modelo/m_asignaciones.php');

if (isset($_REQUEST['id_matricula']))
    $id_matricula = $_REQUEST['id_matricula'];
  
if (isset($_REQUEST['id_hist'])) 
    $id_hist = $_REQUEST['id_hist'];
  
if (isset($_REQUEST['fecha_inicio'])) 
    $fecha_inicio = $_REQUEST['fecha_inicio'];
  
if (isset($_REQUEST['fecha_fin'])) 
    $fecha_fin = $_REQUEST['fecha_fin'];


switch ($_REQUEST['opcion']) {
    case 'asignarDpto':
        $asignacion= new asignaciones($id_matricula,$id_hist,$fecha_inicio,$fecha_fin);
        try {
            $resultado= $asignacion->asignarDep();
            $resultado= json_encode($resultado);
            echo $resultado;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
        break;
    
    default:
        # code...
        break;
}
  