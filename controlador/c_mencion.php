<?php
require_once('../modelo/m_menciones.php');

switch($_REQUEST['opcion'])
{

	case 'registrar':
		$nombre= $_REQUEST['mencion'];
		$mencion = new menciones($nombre);
		$resultado = $mencion->registrar();

		switch ($resultado) {
			case 'existente':
			header("location: ../vista/pages/v_menciones/mostrar.php?respuesta1= existente");
			break;
			case 'exito':
			header("location: ../vista/pages/v_menciones/mostrar.php?respuesta2= exito");

		}

		break;

	case 'listar':
		$mencion = new menciones();
		$resultado = $mencion->consultar();
		$resultado= json_encode($resultado);
		echo $resultado;
		break;

	case 'modificar':
		$nombre= $_REQUEST['mencion'];
		$id=$_REQUEST['id'];
		$mencion = new menciones($nombre);
		$update = $mencion->actualizar($id);

	switch ($update) {
		case 'existente':
		header("location: ../vista/pages/v_menciones/mostrar.php?respuesta1=existente");
		break;
		case 'exito':
		header("location: ../vista/pages/v_menciones/mostrar.php?respuesta2=extio");
		break;
		case 'fracaso':
		header("location: ../vista/pages/v_menciones/mostrar.php?respuesta3=fracaso");
		break;
	}
   break;

	case 'eliminar':
		$id = $_REQUEST['id'];
		$mencion = new menciones();
		$resultado= $mencion->eliminar($id);

switch ($resultado) {
		case 'exito':
		header("location: ../vista/pages/v_menciones/mostrar.php?respuesta2= extio");
		break;
		case 'fracaso':
		header("location: ../vista/pages/v_menciones/mostrar.php?respuesta3= fracaso");
		break;
		case 'ojo':
		header("location: ../vista/pages/v_menciones/mostrar.php?respuesta4= ojo");
		break;
	}


	break;
}
?>
