<?php
require_once('../modelo/m_evaluacion.php');

if (isset($_REQUEST['id_evaluacion'])) {
	$id_evaluacion=$_REQUEST['id_evaluacion'];
}

if (isset($_REQUEST['id_item'])) {
	$id_item=$_REQUEST['id_item'];
}

if (isset($_REQUEST['evaluacion'])) {
	$evaluacion=$_REQUEST['evaluacion'];
}

if (isset($_REQUEST['tipo_evaluacion'])) {
	$tipo_evaluacion=$_REQUEST['tipo_evaluacion'];
}

if (isset($_REQUEST['porcentaje'])) {
	$porcentaje=$_REQUEST['porcentaje'];
}

switch($_REQUEST['opcion'])
{

	case 'registrar':
		$evaluacion = new evaluaciones($evaluacion,$tipo_evaluacion,$porcentaje);
		$resultado = $evaluacion->registrar();

		switch ($resultado){
			case 'existente':
			header("location: ../vista/pages/v_evaluaciones/mostrar.php?respuesta1= existente");
			break;
			case 'exito':
			header("location: ../vista/pages/v_evaluaciones/mostrar.php?respuesta2= exito");
		}
	break;

	case 'asignar_evaluacion_item':
		$resultado= evaluaciones::asignar_evaluacion_item($id_evaluacion,$id_item);
		$resultado= json_encode($resultado);
		echo $resultado;
		break;

	case 'modificar':
		$nombre= $_REQUEST['evaluacion'];
		$id=$_REQUEST['id'];
		$evaluacion = new evaluaciones($nombre);
		$update = $evaluacion->actualizar($id);

	switch ($update) {
		case 'existente':
		header("location: ../vista/pages/v_evaluaciones/mostrar.php?respuesta1=existente");
		break;
		case 'exito':
		header("location: ../vista/pages/v_evaluaciones/mostrar.php?respuesta2=extio");
		break;
		case 'fracaso':
		header("location: ../vista/pages/v_evaluaciones/mostrar.php?respuesta3=fracaso");
		break;
	}
   break;

	case 'eliminar':
		$id = $_REQUEST['id'];

		$evaluacion = new evaluaciones();
		$resultado= $evaluacion->eliminar($id);

		switch ($resultado) {
				case 'exito':
				header("location: ../vista/pages/v_evaluaciones/mostrar.php?respuesta2= extio");
				break;
				case 'fracaso':
				header("location: ../vista/pages/v_evaluaciones/mostrar.php?respuesta3= fracaso");
				break;
				case 'ojo':
				header("location: ../vista/pages/v_evaluaciones/mostrar.php?respuesta4= ojo");
				break;
			}
		break;
	
	case 'consultar_evaluacion_item':
			$resultado= evaluaciones::consultar_evaluacion_item($id_evaluacion);
			$resultado= json_encode($resultado);
			echo $resultado;
			break;

	case 'consultar_items_disponibles':
			$resultado= evaluaciones::consultar_items_disponibles($id_evaluacion);
			$resultado= json_encode($resultado);
			echo $resultado;
			break; 
			
	case 'consultar':
		$resultado= evaluaciones::consultar();
		$resultado= json_encode($resultado);
		echo $resultado;
		break;
}
?>
