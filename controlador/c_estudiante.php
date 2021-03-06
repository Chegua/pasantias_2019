<?php
require_once('../modelo/m_estudiantes.php');
require_once('../modelo/m_representantes.php');

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
			$estudinate = new estudiantes($nacionalidad,$cedula,$nombre,$apellido,$sexo,$telefono,$correo,$fecha_nacimiento,$edad,$representante,$parentesco,$cuadratura,$comunidad);
			$resultado = $estudinate->registrar();
			switch ($resultado) {
				case 'existente':
					header("location: ../vista/pages/v_estudiante/mostrar.php?respuesta1=existente");
				break;
				case 'exito':
					header("location: ../vista/pages/v_estudiante/agregar.php?respuesta2=exito");
				break;
			}
		}
		break;

	case 'encontrar':
    if (isset($_REQUEST['id_matricula'])) {
    	$id_matricula= $_REQUEST['id_matricula'];
    }


    $resultado = estudiantes::encontrar($id_matricula);
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
		$cedula = $_REQUEST['cedula'];
		$nombre = $_REQUEST['nombre'];
		$apellido= $_REQUEST['apellido'];
		$fecha_nacimiento= $_REQUEST['fecha_nacimiento'];
		$edad= $_REQUEST['edad'];
		$sexo= $_REQUEST['sexo'];
		$direccion= $_REQUEST['direccion'];
		$telefono= $_REQUEST['telefono'];
		$correo= $_REQUEST['correo'];
    $parentesco= $_REQUEST['parentesco'];

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
