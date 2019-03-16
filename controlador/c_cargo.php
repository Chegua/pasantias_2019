<?php
require_once('../modelo/m_cargos.php');

switch($_REQUEST['opcion'])
{

	case 'registrar':
	$nombre= $_REQUEST['cargo'];
	$tipo= $_REQUEST['tipo'];
	$cargo = new cargos($nombre,$tipo);
	$resultado = $cargo->registrar();

	switch ($resultado) {
		case 'existente':
			header("location: ../vista/pages/v_cargos/mostrar.php?respuesta1=existente");
		break;
		case 'exito':
			header("location: ../vista/pages/v_cargos/mostrar.php?respuesta2=exito");	}
		break;

	case 'modificar':
		$nombre= $_REQUEST['cargo'];
		$id=$_REQUEST['id'];
		$cargo = new cargos($nombre);
		$update = $cargo->actualizar($id);

	switch ($update) {
		case 'existente':
		header("location: ../vista/pages/v_cargos/mostrar.php?respuesta1= existente");
		break;
		case 'exito':
		header("location: ../vista/pages/v_cargos/mostrar.php?respuesta2= extio");
		break;
		case 'fracaso':
		header("location: ../vista/pages/v_cargos/mostrar.php?respuesta3= fracaso");
		break;
	}
	break;

	case 'eliminar':
	
		$id = $_REQUEST['id'];

		$cargo = new cargos();
		$resultado= $cargo->eliminar($id);

switch ($resultado) {
		case 'exito':
		header("location: ../vista/pages/v_cargos/mostrar.php?respuesta2= extio");
		break;
		case 'fracaso':
		header("location: ../vista/pages/v_cargos/mostrar.php?respuesta3= fracaso");
		break;
		case 'ojo':
		header("location: ../vista/pages/v_cargos/mostrar.php?respuesta4= ojo");
		break;
	}

		break;

	case 'filtrar':
		$valor = $_REQUEST['valor'];
		$cargo = new cargos();

		if (!empty($valor)) {
			$resultado= $cargo->filtrar($valor);
			$resultado=json_encode($resultado);
			echo $resultado;
		}

		break;
}
?>
