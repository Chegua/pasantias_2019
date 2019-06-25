<?php
require_once('../modelo/m_personas.php');

require_once('../modelo/m_historial_academico.php');

//DATOS PARA EL DOCENTE
if (isset($_REQUEST['id']))
	$id=$_REQUEST['id'];

if (isset($_REQUEST['nacionalidad']))
	$nacionalidad=$_REQUEST['nacionalidad'];

if (isset($_REQUEST['cedula']))
	$cedula = $_REQUEST['cedula'];
	
if (isset($_REQUEST['nombre']))
	$nombre = $_REQUEST['nombre'];

if (isset($_REQUEST['apellido']))
	$apellido= $_REQUEST['apellido'];

if (isset($_REQUEST['sexo']))
	$sexo= $_REQUEST['sexo'];

if (isset($_REQUEST['telefono']))
	$telefono= $_REQUEST['telefono'];

if (isset($_REQUEST['correo']))
	$correo= $_REQUEST['correo'];

if (isset($_REQUEST['estatus_docente']))
	$estatus_docente= $_REQUEST['estatus_docente'];

if (isset($_REQUEST['fecha_ini_d']))
	$fecha_ini_d= $_REQUEST['fecha_ini_d'];

if (isset($_REQUEST['fecha_fin_d']))
	$fecha_fin_d= $_REQUEST['fecha_fin_d'];

//DATOS PARA EL TUTOR
if (isset($_REQUEST['estatus_tutor']))
	$estatus_tutor= $_REQUEST['estatus_tutor'];//indicador si es o no es tutor.

if (isset($_REQUEST['estatus']))
	$estatus= $_REQUEST['estatus']; // ACTIVO O INACTIVO

if (isset($_REQUEST['fecha_ini']))
	$fecha_ini= $_REQUEST['fecha_ini'];

if (isset($_REQUEST['fecha_fin']))
	$fecha_fin= $_REQUEST['fecha_fin'];

switch($_REQUEST['opcion'])
{
	case 'registrar':

		if($estatus_tutor=='No'){ 
			$tutor_academico = new historial_academico($nacionalidad,$cedula,$nombre,$apellido,$sexo,$telefono,$correo,$estatus_docente,$fecha_ini_d,$fecha_fin_d,$estatus_tutor,'','','');
			$tutor_academico->setTipo('');
		}else{
			$tutor_academico = new historial_academico($nacionalidad,$cedula,$nombre,$apellido,$sexo,$telefono,$correo,$estatus_docente,$fecha_ini_d,$fecha_fin_d,$estatus_tutor,$estatus,$fecha_ini,$fecha_fin);
			$tutor_academico->setTipo('Tutor Academico');
		}
		
		$idP = $tutor_academico->registrarP();
		if ($idP=='existente') {
			$encontrado= $tutor_academico->buscar();
			$idP= $encontrado['id_persona'];
		}

		$resultado= $tutor_academico->crearHistorial($idP);

		switch ($resultado) {
		case 'existente':
			header("location: ../vista/pages/v_tutoracademico/mostrar.php?respuesta1=existente");
		break;
		case 'exito':
			header("location: ../vista/pages/v_tutoracademico/mostrar.php?respuesta2=exito");
		}
		break;

	case 'buscar':
		$cedula = $_REQUEST['cedula'];
		$estudiante = new per_adm($cedula);
    	$resultado = $estudiante->buscar();
		//require_once('../vista/salida.php');
		break;

	case 'modificar':
		
		$tutor_academico = new historial_academico($nacionalidad,$cedula,$nombre,$apellido,$sexo,$telefono,$correo,$cargo,$estatus_tutor,$estatus,$fecha_ini,$fecha_fin);

		$resultado = $tutor_academico->actualizar($id);

		switch ($resultado) {
		case 'existente':
			header("location: ../vista/pages/v_tutoracademico/mostrar.php?respuesta1=existente");
		break;
		case 'exito':
			header("location: ../vista/pages/v_tutoracademico/mostrar.php?respuesta2=exito");
			break;
		}
	break;


	case 'eliminar':
		$id = $_REQUEST['id'];
		$resultado= historial_academico::eliminar($id);

    switch ($resultado) {
    		case 'exito':
    		header("location: ../vista/pages/v_tutoracademico/mostrar.php?respuesta2= extio");
    		break;
    		case 'fracaso':
    		header("location: ../vista/pages/v_tutoracademico/mostrar.php?respuesta3= fracaso");
    		break;
    		case 'ojo':
    		header("location: ../vista/pages/v_tutoracademico/mostrar.php?respuesta4= ojo");
    		break;
	  }
    break;

  case 'encontrar':
      $id= $_REQUEST['id'];
      $resultado = historial_academico::encontrar($id);
      $resultado= json_encode($resultado);
      echo $resultado;
      break;
    /*case 'filtrar':
			$valor= $_REQUEST['valor'];
			// $estudiante = new estudiantes($cedula,$nombre,$telefono,$correo,$sexo,$parroquia,$sector,$fn,$representante,$parentesco);
			if (!empty($valor)) {
				$resultado= historial_academico::filtrar($valor);
				$resultado=json_encode($resultado);
				echo $resultado;
			}
		break;*/
}
?>
