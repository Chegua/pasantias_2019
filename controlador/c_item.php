<?php
require_once('../modelo/m_items.php');

if (isset($_REQUEST['item'])) {
	$item=$_REQUEST['item'];
}

if (isset($_REQUEST['descripcion'])) {
	$descripcion=$_REQUEST['descripcion'];
}

switch($_REQUEST['opcion'])
{

	case 'registrar':
		$item = new items($item,$descripcion);
		$resultado = $item->registrar();

		switch ($resultado){
			case 'existente':
			header("location: ../vista/pages/v_items/mostrar.php?respuesta1= existente");
			break;
			case 'exito':
			header("location: ../vista/pages/v_items/mostrar.php?respuesta2= exito");
		}
	break;

	case 'consultar':
		$item= new items('','');
		$resultado= $item->consultar();
		$resultado= json_encode($resultado);
		echo $resultado;
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

		$items = new items();
		$resultado= $items->eliminar($id);

		switch ($resultado) {
				case 'exito':
				header("location: ../vista/pages/v_items/mostrar.php?respuesta2= extio");
				break;
				case 'fracaso':
				header("location: ../vista/pages/v_items/mostrar.php?respuesta3= fracaso");
				break;
				case 'ojo':
				header("location: ../vista/pages/v_items/mostrar.php?respuesta4= ojo");
				break;
		}
		break;
}
?>
