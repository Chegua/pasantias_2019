<?php
require_once('../modelo/m_personas.php');
require_once('../modelo/m_personaladm.php');

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
if (isset($_REQUEST['departamento'])) {
  $departamento = $_REQUEST['departamento'];
}
if (isset($_REQUEST['cargo'])) {
  $cargo = $_REQUEST['cargo'];
}
if (isset($_REQUEST['fecha_inicio'])) {
  $fecha_inicio = $_REQUEST['fecha_inicio'];
}
if (isset($_REQUEST['fecha_fin'])) {
  $fecha_fin = $_REQUEST['fecha_fin'];
}
if (isset($_REQUEST['estatus'])) {
  $estatus = $_REQUEST['estatus'];
}

switch($_REQUEST['opcion'])
{

	case 'registrar':
    $nombre= ucwords(strtolower($nombre)); //convierte la primera letra a mayuscula
    $nombre=trim($nombre);//elimina los espacios del inicio y el final de cada cadnea

    $apellido= ucwords(strtolower($apellido)); //convierte la primera letra a mayuscula
    $apellido=trim($apellido);//elimina los espacios del inicio y el final de cada cadnea

		$per_adm = new personal_administrativo($nacionalidad,$cedula,$nombre,$apellido,$sexo,$telefono,$correo,$departamento,$cargo,$fecha_inicio,$fecha_fin,$estatus);
		$resultado = $per_adm->registrar();
		$resultado= json_encode($resultado);
		echo $resultado;
		break;

	case 'buscar':
		$cedula = $_REQUEST['cedula'];
		$estudiante = new personal_administrativo($cedula);
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

		$estudiante = new personal_administrativo($cedula,$nombre, $fn, $edad, $sexo, $direccion, $telefono, $correo, $parentesco);
		$resultado = $estudiante->modificar();
		//require_once('../vista/salida.php');
		break;

    case 'eliminar':
    $cedula = $_REQUEST['cedula'];
    $estudiante = new personal_administrativo($cedula);
    $resultado= $estudiante->eliminar();
      break;

}

//require_once('../vista/salida.php')SALIDA DE INFORMACION


?>
