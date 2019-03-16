<?php
 require_once('../modelo/m_personas.php');

require_once('../modelo/m_historial_academico.php');


$opcion = $_REQUEST['opcion'];
switch($opcion)
{

	case 'registrar':
//DATOS PARA EL DOCENTE
	    $nacionalidad=$_REQUEST['nacionalidad'];
		$cedula = $_REQUEST['cedula'];
		$nombre = $_REQUEST['nombre'];
		$apellido= $_REQUEST['apellido'];
		$sexo= $_REQUEST['sexo'];
		$telefono= $_REQUEST['telefono'];
		$correo= $_REQUEST['correo'];

		$estatus_docente= $_REQUEST['estatus_docente'];
		$fecha_ini_d= $_REQUEST['fecha_ini_d'];
		$fecha_fin_d= $_REQUEST['fecha_fin_d'];

//DATOS PARA EL TUTOR
		$estatus_tutor= $_REQUEST['estatus_tutor'];//indicador si es o no es tutor.
		$estatus= $_REQUEST['estatus']; // ACTIVO O INACTIVO
		$fecha_ini= $_REQUEST['fecha_ini'];
		$fecha_fin= $_REQUEST['fecha_fin'];

		$tutor_academico = new historial_academico($nacionalidad,$cedula,$nombre,$apellido,$sexo,$telefono,$correo,$estatus_docente,$fecha_ini_d,$fecha_fin_d,$estatus_tutor,$estatus,$fecha_ini,$fecha_fin);

		$resultado = $tutor_academico->registrar();

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
		$id=$_REQUEST['id'];
		$nacionalidad=$_REQUEST['nacionalidad'];
		$cedula = $_REQUEST['cedula'];
		$nombre = $_REQUEST['nombre'];
		$apellido= $_REQUEST['apellido'];
		$sexo= $_REQUEST['sexo'];
		$telefono= $_REQUEST['telefono'];
		$correo= $_REQUEST['correo'];
		$cargo= $_REQUEST['cargo'];
		$estatus_tutor= $_REQUEST['estatus_tutor'];
		$estatus= $_REQUEST['estatus'];
	    $fecha_ini= $_REQUEST['fecha_ini'];
		$fecha_fin= $_REQUEST['fecha_fin'];

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
