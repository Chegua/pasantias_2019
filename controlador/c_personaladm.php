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

if (isset($_REQUEST['id_hist_dpto'])) {
  $id_hist_dpto = $_REQUEST['id_hist_dpto'];
}
if (isset($_REQUEST['id_personal_administrativo'])) {
  $id_personal_administrativo = $_REQUEST['id_personal_administrativo'];
}

switch($_REQUEST['opcion'])
{

	case 'registrar':
    $nombre= ucwords(strtolower($nombre)); //convierte la primera letra a mayuscula
    $nombre=trim($nombre);//elimina los espacios del inicio y el final de cada cadnea

    $apellido= ucwords(strtolower($apellido)); //convierte la primera letra a mayuscula
    $apellido=trim($apellido);//elimina los espacios del inicio y el final de cada cadnea

		$per_adm = new personal_administrativo($nacionalidad,$cedula,$nombre,$apellido,$sexo,$telefono,$correo,$departamento,$cargo,$fecha_inicio,$fecha_fin,$estatus);
		$per_adm->setTipo('Administrativo');
		$idP = $per_adm->registrarP();
		if ($idP=='existente') {
			$encontrado= $per_adm->buscar();
			$idP= $encontrado['id_persona'];
		}
		$resultado= $per_adm->crearHistorial($idP);
    switch ($resultado){
			case 'existente':
				Header("Location: ../vista/pages/v_personaladm/mostrar.php?respuesta1= existente");
				break;
			case 'exito':
				Header("Location: ../vista/pages/v_personaladm/mostrar.php?respuesta2= exito");
				break;
		}
		break;

	case 'buscar':
		$cedula = $_REQUEST['cedula'];
		$estudiante = new personal_administrativo($cedula);
    	$resultado = $estudiante->buscar();
		//require_once('../vista/salida.php');
		break;

    case 'modificar':
      $nombre= ucwords(strtolower($nombre)); //convierte la primera letra a mayuscula
      $nombre=trim($nombre);//elimina los espacios del inicio y el final de cada cadnea

      $apellido= ucwords(strtolower($apellido)); //convierte la primera letra a mayuscula
      $apellido=trim($apellido);//elimina los espacios del inicio y el final de cada cadnea

  		$per_adm = new personal_administrativo($nacionalidad,$cedula,$nombre,$apellido,$sexo,$telefono,$correo,$departamento,$cargo,$fecha_inicio,$fecha_fin,$estatus);
  		$resultado = $per_adm->modificar($id_hist_dpto,$id_personal_administrativo);
      switch ($resultado){
  			case 'existente':
  				Header("Location: ../vista/pages/v_personaladm/mostrar.php?respuesta1= existente");
  				break;
  			case 'exito':
  				Header("Location: ../vista/pages/v_personaladm/mostrar.php?respuesta2= exito");
  				break;
  		}
  		break;

    case 'eliminar':
      $id = $_REQUEST['id'];
      $resultado = personal_administrativo::eliminar($id);
      switch ($resultado) {
  				case 'exito':
  				header("location: ../vista/pages/v_personaladm/mostrar.php?respuesta2= extio");
  				break;
  				case 'fracaso':
  				header("location: ../vista/pages/v_personaladm/mostrar.php?respuesta3= fracaso");
  				break;
  				case 'ojo':
  				header("location: ../vista/pages/v_personaladm/mostrar.php?respuesta4= ojo");
  				break;
  			}
      break;
}

?>
