<?php
require_once('../modelo/Comunidad.php');

//$nombre= strtoupper($string);

switch($_REQUEST['opcion'])
{

	case 'registrar':

		$n= $_REQUEST['comunidad'];
		$parroquia= $_REQUEST['parroquia'];
		$nombre = strtoupper($n);
		$comunidad = new comunidades(0, $nombre);
		$resultado = $comunidad->registrar($parroquia);

		switch ($resultado){
			case 'existente':
			header("location: ../vista/pages/v_comunidades/mostrar.php?respuesta1= existente");
			break;
			case 'exito':
			header("location: ../vista/pages/v_comunidades/mostrar.php?respuesta2= exito");

		}

		break;

	case 'modificar':
		$nombre= $_REQUEST['comunidad'];
		$id=$_REQUEST['id'];
		$comunidad = new comunidades($nombre);
		$update = $comunidad->actualizar($id);

		switch ($update) {			
			case 'exito':
			header("location: ../vista/pages/v_comunidades/mostrar.php?respuesta2=extio");
			break;
			case 'fracaso':
			header("location: ../vista/pages/v_comunidades/mostrar.php?respuesta3=fracaso");
			break;
		}
   		break;

	case 'eliminar':
		$id = $_REQUEST['id'];
		$comunidad = new comunidades();
		try {
			$resultado= $comunidad->eliminar($id);
			$resultado= json_encode($resultado);
			echo $resultado;
		} catch (Exception $e) {
			die ($e->getMessage());
		}		
		break;
}
?>
