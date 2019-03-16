<?php
require_once('../modelo/m_personas.php');
require_once('../modelo/m_representantes.php');




$opcion = $_REQUEST['opcion'];

switch($opcion)
{

	case 'registrar':
		$nacionalidad = $_REQUEST['nacionalidad'];
		$cedula = $_REQUEST['cedula'];
		$nombre = $_REQUEST['nombre'];
		$apellido= $_REQUEST['apellido'];
		$sexo= $_REQUEST['sexo'];
		$telefono= $_REQUEST['telefono'];
		$correo= $_REQUEST['correo'];

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

			case 'encontrar':
				$id= $_REQUEST['id'];
				$resultado = representantes::encontrar($id);
				$resultado= json_encode($resultado);
				echo $resultado;
				break;
}

?>
