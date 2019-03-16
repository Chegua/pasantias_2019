<?php
 require_once('../modelo/m_personas.php');

require_once('../modelo/m_personaladm.php');

$cedula = $_REQUEST['nacionalidad']."-".$_REQUEST['cedula'];
$nombre = $_REQUEST['nombres'];
$apellido= $_REQUEST['apellidos'];
$sexo= $_REQUEST['sexo'];
$telefono= $_REQUEST['telefono'];
$correo= $_REQUEST['correo'];
$parroquia= $_REQUEST['parroquia'];
$sector= $_REQUEST['sector'];
$cargo= $_REQUEST['cargo'];


$opcion = $_REQUEST['opcion'];

switch($opcion)
{

	case 'registrar':
		$PA = new per_adm($parroquia,$nombre,$apellido,$cedula,$correo,$sector,$sexo,$telefono,$cargo);

		$resultado = $PA->registrar();

		echo $r;

		Header("Location: ../vista/pages/v_personaladm/agregar.php");
		break;

	case 'buscar':
		$cedula = $_REQUEST['cedula'];
		$estudiante = new per_adm($cedula);
    	$resultado = $estudiante->buscar();
		//require_once('../vista/salida.php');
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

		$estudiante = new per_adm($cedula,$nombre, $fn, $edad, $sexo, $direccion, $telefono, $correo, $parentesco);
		$resultado = $estudiante->modificar();
		//require_once('../vista/salida.php');
		break;

    case 'eliminar':
    $cedula = $_REQUEST['cedula'];
    $estudiante = new per_adm($cedula);
    $resultado= $estudiante->eliminar();
      break;

}

//require_once('../vista/salida.php')SALIDA DE INFORMACION


?>
