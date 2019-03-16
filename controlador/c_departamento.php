<?php
require_once('../modelo/m_departamentos.php');

//$nombre= strtoupper($string);

switch($_REQUEST['opcion'])
{

	case 'registrar':
		$nombre= $_REQUEST['departamento'];
		$departamento = new departamentos($nombre);
		$resultado = $departamento->registrar();

		switch ($resultado){
			case 'existente':
			header("location: ../vista/pages/v_departamentos/mostrar.php?respuesta1= existente");
			break;
			case 'exito':
			header("location: ../vista/pages/v_departamentos/mostrar.php?respuesta2= exito");

		}

		break;

	case 'modificar':
		$nombre= $_REQUEST['departamento'];
		$id=$_REQUEST['id'];
		$departamento = new departamentos($nombre);
		$update = $departamento->actualizar($id);

	switch ($update) {
		case 'existente':
		header("location: ../vista/pages/v_departamentos/mostrar.php?respuesta1=existente");
		break;
		case 'exito':
		header("location: ../vista/pages/v_departamentos/mostrar.php?respuesta2=extio");
		break;
		case 'fracaso':
		header("location: ../vista/pages/v_departamentos/mostrar.php?respuesta3=fracaso");
		break;
	}
   break;

	case 'eliminar':
		$id = $_REQUEST['id'];

		$departamento = new departamentos();
		$resultado= $departamento->eliminar($id);

switch ($resultado) {
		case 'exito':
		header("location: ../vista/pages/v_departamentos/mostrar.php?respuesta2= extio");
		break;
		case 'fracaso':
		header("location: ../vista/pages/v_departamentos/mostrar.php?respuesta3= fracaso");
		break;
		case 'ojo':
		header("location: ../vista/pages/v_departamentos/mostrar.php?respuesta4= ojo");
		break;
	}
	break;
}
?>
