<?php
require_once('../modelo/m_anios.php');



//$nombre= strtoupper($string);


switch($_REQUEST['opcion'])
{

	case 'registrar':
		$nombre= $_REQUEST['anio'];
		$anio = new anios($nombre);
		$resultado = $anio->registrar();

		switch ($resultado) {
			case 'existente':
			header("location: ../vista/pages/v_anios/mostrar.php?respuesta1= existente");
			break;
			case 'exito':
			header("location: ../vista/pages/v_anios/mostrar.php?respuesta2= exito");

		}

		break;

	case 'listar':
			$anio = new anios();
			$resultado = $anio->consultar();
			$resultado= json_encode($resultado);
			echo $resultado;
		break;

	// case 'encontrar':
	// 	$anio = new anios();
	// 	$resultado = $anio->consultar();
	// 	$resultado= json_encode($resultado);
	// 	echo $resultado;
	// 	break;

	case 'modificar':
		$nombre= $_REQUEST['anio'];
		$id= $_REQUEST['id'];
		$anio = new anios($nombre);
		$update = $anio->actualizar($id);

	switch ($update) {
		case 'existente':
		header("location: ../vista/pages/v_anios/mostrar.php?respuesta1=existente");
		break;
		case 'exito':
		header("location: ../vista/pages/v_anios/mostrar.php?respuesta2=extio");
		break;
		case 'fracaso':
		header("location: ../vista/pages/v_anios/mostrar.php?respuesta3=fracaso");
		break;
	}
   break;

	case 'eliminar':
		$id = $_REQUEST['id'];

		$anio = new anios();
		$resultado= $anio->eliminar($id);

switch ($resultado) {
		case 'exito':
		header("location: ../vista/pages/v_anios/mostrar.php?respuesta2= extio");
		break;
		case 'fracaso':
		header("location: ../vista/pages/v_anios/mostrar.php?respuesta3= fracaso");
		break;
		case 'ojo':
		header("location: ../vista/pages/v_anios/mostrar.php?respuesta4= ojo");
		break;
	}
}
?>
