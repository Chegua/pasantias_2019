<?php
require_once('../modelo/m_estudiantes.php');
require_once('../modelo/m_representantes.php');

if (isset($_REQUEST['id_estudiante'])) 
	$id_estudiante= $_REQUEST['id_estudiante'];

if(isset($_REQUEST['nacionalidad'])){
	$nacionalidad=$_REQUEST['nacionalidad'];
}
if(isset($_REQUEST['cedula'])){
	$cedula=$_REQUEST['cedula'];
}
if(isset($_REQUEST['nombre'])){
	$nombre=$_REQUEST['nombre'];
}
if(isset($_REQUEST['apellido'])){
	$apellido=$_REQUEST['apellido'];
}
if(isset($_REQUEST['sexo'])){
	$sexo=$_REQUEST['sexo'];
}
if(isset($_REQUEST['fecha_nacimiento'])){
	$fecha_nacimiento=$_REQUEST['fecha_nacimiento'];
}
if(isset($_REQUEST['edad'])){
	$edad=$_REQUEST['edad'];
}
if(isset($_REQUEST['telefono'])){
	$telefono=$_REQUEST['telefono'];
}
if(isset($_REQUEST['correo'])){
	$correo=$_REQUEST['correo'];
}
if(isset($_REQUEST['representante'])){
	$representante=$_REQUEST['representante'];
}
if(isset($_REQUEST['parentesco'])){
	$parentesco=$_REQUEST['parentesco'];
}
if(isset($_REQUEST['cuadratura'])){
	$cuadratura=$_REQUEST['cuadratura'];
}
if(isset($_REQUEST['comunidad'])){
	$comunidad=$_REQUEST['comunidad'];
}

$opcion = $_REQUEST['opcion'];

switch($opcion)
{
	case 'registrar':

		$nombre= ucwords(strtolower($nombre)); //convierte la primera letra a mayuscula
		$nombre=trim($nombre);//elimina los espacios del inicio y el final de cada cadnea

		$apellido= ucwords(strtolower($apellido)); //convierte la primera letra a mayuscula
		$apellido=trim($apellido);//elimina los espacios del inicio y el final de cada cadnea

		$r= representantes::registrar2($representante);

		if ($r=='fracaso') {
			header("location: ../vista/pages/v_estudiante/mostrar.php?respuesta3=fracaso");
		}else {
			$estudiante = new estudiantes($nacionalidad,$cedula,$nombre,$apellido,$sexo,$telefono,$correo,$fecha_nacimiento,$edad,$representante,$parentesco,$comunidad);
			$estudiante->setTipo('Estudiante');
			$idEst = $estudiante->registrarP();
			if ($id=='existente') {
				header("location: ../vista/pages/v_estudiante/mostrar.php?respuesta1=existente");
			}
			$resultado= $estudiante->registrarEst($idEst);
			switch ($resultado) {
				case 'existente':
					header("location: ../vista/pages/v_estudiante/mostrar.php?respuesta1=existente");
				break;
				case 'exito':
					header("location: ../vista/pages/v_estudiante/mostrar.php?respuesta2=exito");
				break;
			}
		}
		break;

	case 'asignarMatricula':
		$resultado= estudiantes::asignarMatricula($id_estudiante,$cuadratura);
		switch ($resultado){
			case 'existente':
				Header("Location: ../vista/pages/v_asignar_seccion/mostrar.php?respuesta1= existente");
				break;
			case 'exito':
				Header("Location: ../vista/pages/v_asignar_seccion/mostrar.php?respuesta2= exito");
				break;
		}
		break;

	case 'encontrar':
    
    $resultado = estudiantes::encontrar($id_estudiante);
		$resultado= json_encode($resultado);
		echo $resultado;
		break;

	case 'listar':
		$resultado = estudiantes::consultar();
		$resultado= json_encode($resultado);
		echo $resultado;
		break;

		case 'actualizar_lista':
			if(isset($_REQUEST['anio'])){
				$anio=$_REQUEST['anio'];
			}
			if(isset($_REQUEST['mencion'])){
				$mencion=$_REQUEST['mencion'];
			}

			if ((!empty($anio)) && (!empty($mencion)) ) {
				// $centinela= 'busqueda1';
				$resultado = estudiantes::listar($anio,$mencion);
				$resultado= json_encode($resultado);
				echo $resultado;
			}
			// if (((!empty($anio)) && (empty($mencion))) || ((empty($anio)) && (!empty($mencion)))) {
			// 	$centinela= 'busqueda2';
			// 	$resultado = estudiantes::listar($anio,$mencion,$centinela);
			// 	$resultado= json_encode($resultado);
			// 	echo $resultado;
			// }

			break;

	case 'modificar':
		
		$estudiante = new estudiantes($cedula,$nombre, $apellido, $fecha_nacimiento, $edad, $sexo, $direccion, $telefono, $correo, $parentesco);
		$resultado = $estudiante->modificar();
		//require_once('../vista/salida.php');
		break;

    case 'eliminar':
			$id= $_REQUEST['id'];
			$estudiante = new estudiantes($cedula,$nombre,$telefono,$correo,$sexo,$parroquia,$sector,$fecha_nacimiento,$edad,$parentesco);
			$resultado = $estudiante->eliminar($id);
			$resultado=json_encode($resultado);
			echo $resultado;
    break;


}

//require_once('../vista/salida.php')SALIDA DE INFORMACION


?>
