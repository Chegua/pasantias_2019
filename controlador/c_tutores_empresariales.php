<?php
require_once('../modelo/m_personas.php');
require_once('../modelo/m_tutores_empresariales.php');

if (isset($_REQUEST['nacionalidad'])) {
	$nacionalidad = $_REQUEST['nacionalidad'];
}
if (isset($_REQUEST['cedula'])) {
	$cedula = $_REQUEST['cedula'];
}
if (isset($_REQUEST['nombre'])) {
	$nombre = $_REQUEST['nombre'];
}
if (isset($_REQUEST['apellido'])) {
	$apellido = $_REQUEST['apellido'];
}
if (isset($_REQUEST['sexo'])) {
	$sexo = $_REQUEST['sexo'];
}
if (isset($_REQUEST['telefono'])) {
	$telefono = $_REQUEST['telefono'];
}
if (isset($_REQUEST['correo'])) {
	$correo = $_REQUEST['correo'];
}
if (isset($_REQUEST['cargo'])) {
	$cargo = $_REQUEST['cargo'];
}

if (isset($_REQUEST['area'])) {
	$empresa_mencion= $_REQUEST['area'];
}
if (isset($_REQUEST['fecha_ini'])) {
	$fecha_inicio= $_REQUEST['fecha_ini'];
}
if (isset($_REQUEST['fecha_fin'])) {
	$fecha_fin= $_REQUEST['fecha_fin'];
}
if (isset($_REQUEST['estatus'])) {
	$estatus= $_REQUEST['estatus'];
}

if (isset($_REQUEST['id_hist_emp'])) {
	$id_hist_emp= $_REQUEST['id_hist_emp'];
}

switch($_REQUEST['opcion'])
{

	case 'registrar':
		$tutor_empresarial = new tutores_empresariales($nacionalidad,$cedula,$nombre,$apellido,$correo,$sexo,$telefono,$cargo,$empresa_mencion,$fecha_inicio,$fecha_fin,$estatus);

		$resultado = $tutor_empresarial->registrar();

		switch ($resultado){
			case 'existente':
				Header("Location: ../vista/pages/v_tutores_empresariales/mostrar.php?respuesta1= existente");
				break;
			case 'exito':
				Header("Location: ../vista/pages/v_tutores_empresariales/mostrar.php?respuesta2= exito");
				break;
		}
		break;

	case 'buscar':
		$cedula = $_REQUEST['cedula'];
		$estudiante = new tutores_empresariales($cedula);
    	$resultado = $estudiante->buscar();
		//require_once('../vista/salida.php');
		break;

	case 'encontrar':
		$resultado = tutores_empresariales::encontrar($id_hist_emp);
		$resultado= json_encode($resultado);
		echo $resultado;
		break;

	case 'modificar':
		$cedula = $_REQUEST['cedula'];
		$nombre = $_REQUEST['nombre'];
		$apellido= $_REQUEST['apellido'];
		$fn= $_REQUEST['fn'];
		$edad= $_REQUEST['edad'];
		$sexo= $_REQUEST['sexo'];
		$direccion= $_REQUEST['direccion'];
		$telefono= $_REQUEST['telefono'];
		$correo= $_REQUEST['correo'];
    	$parentesco= $_REQUEST['parentesco'];

		$estudiante = new tutores_empresariales($cedula,$nombre, $fn, $edad, $sexo, $direccion, $telefono, $correo, $parentesco);
		$resultado = $estudiante->modificar();
		//require_once('../vista/salida.php');
		break;

		case 'eliminar':
			$id = $_REQUEST['id'];

			$resultado = tutores_empresariales::eliminar($id);

			switch ($resultado) {
					case 'exito':
					header("location: ../vista/pages/v_tutores_empresariales/mostrar.php?respuesta2= extio");
					break;
					case 'fracaso':
					header("location: ../vista/pages/v_tutores_empresariales/mostrar.php?respuesta3= fracaso");
					break;
					case 'ojo':
					header("location: ../vista/pages/v_tutores_empresariales/mostrar.php?respuesta4= ojo");
					break;
				}

			break;
}

?>
