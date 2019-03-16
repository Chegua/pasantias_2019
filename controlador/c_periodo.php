<?php
require_once('../modelo/m_periodos.php');

switch($_REQUEST['opcion'])
{

	case 'registrar':
  	$PE= $_REQUEST['periodo'];
    $periodo = new periodos($PE);
	  $resultado = $periodo->registrar();
    switch ($resultado) {
    		case 'existente':
    			header("location: ../vista/pages/v_periodos/mostrar.php?respuesta1=existente");
    		break;
    		case 'exito':
    			header("location: ../vista/pages/v_periodos/mostrar.php?respuesta2=exito");
    		break;
      }

    break;
  }


?>
