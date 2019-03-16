<?php
require_once('../modelo/m_cuadratura.php');

//$nombre= strtoupper($string);

switch($_REQUEST['opcion'])
{

	case 'registrar':
		$anio= $_REQUEST['anio'];
    $mencion= $_REQUEST['mencion'];
    $periodo= $_REQUEST['periodo'];
		$docente= $_REQUEST['docente'];

		$cuadratura = new cuadratura($anio,$mencion,$periodo,$docente);
		$resultado = $cuadratura->registrar();
			switch ($resultado) {
				case 'existente':
					header("location: ../vista/pages/v_cuadratura/mostrar.php?respuesta1=existente");
				break;
				case 'exito':
					header("location: ../vista/pages/v_cuadratura/mostrar.php?respuesta2=exito");	}
				break;

		break;

	case 'encontrar':
		$id= $_REQUEST['id'];
		$cuadratura= new cuadratura();
		$resultado = $cuadratura->encontrar($id);
		$resultado= json_encode($resultado);
		echo $resultado;
		break;
}
?>
