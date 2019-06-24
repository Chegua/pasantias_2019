<?php
require_once('../modelo/Estado.php');

switch ($_REQUEST['opcion']) {
    case 'registrar':
        $n= $_REQUEST['estado'];
        $nombre = strtoupper($n);
		$estado = new estados(0, $nombre);
		$resultado = $estado->registrar();
		switch ($resultado){
			case 'existente':
			header("location: ../vista/pages/v_estados/mostrar.php?respuesta1= existente");
		    case 'eliminar':
	break;
			case 'exito':
			header("location: ../vista/pages/v_estados/mostrar.php?respuesta2= exito");
		}
        break;
    
    case 'eliminar':
		$id = $_REQUEST['id'];
		$comunidad = new estados();
		try {
			$resultado= $comunidad->eliminar($id);
			$resultado= json_encode($resultado);
			echo $resultado;
		} catch (Exception $e) {
			die ($e->getMessage());
		}		
		break;
    
    default:
        # code...
        break;
}