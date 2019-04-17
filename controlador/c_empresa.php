<?php
require_once('../modelo/m_empresas.php');

switch($_REQUEST['opcion'])
{

	case 'registrar':
		$nombre= $_REQUEST['nombre'];
		$tipo= $_REQUEST['tipo'];
		$rif= $_REQUEST['rif'];
		$telefono= $_REQUEST['telefono'];
		$correo= $_REQUEST['correo'];
		$comunidad= $_REQUEST['comunidad'];
		$mencion= $_REQUEST['mencion'];

		$empresa = new empresas($nombre, $tipo, $rif, $telefono,$correo, $comunidad);

		$resultado = $empresa->registrar();

		switch ($resultado){
			case 'existente':
				header("location: ../vista/pages/v_empresas/mostrar.php?respuesta1= existente");
			break;
			case 'exito':

				$valor= $empresa->getId();
				$empresa->setId($valor->id_empresa);
				foreach ($mencion as $id_m) {
					$resultado2 = $empresa->registrar2($id_m);
				}

				header("location: ../vista/pages/v_empresas/mostrar.php?respuesta2= exito");
		}

		break;
	case 'filtrar':
				$valor= $_REQUEST['valor'];
				// $estudiante = new estudiantes($cedula,$nombre,$telefono,$correo,$sexo,$parroquia,$sector,$fn,$representante,$parentesco);
				if (!empty($valor)) {
					$resultado= empresas::filtrar($valor);
					$resultado=json_encode($resultado);
					echo $resultado;
				}

			break;

	case 'modificar':
		$id= $_REQUEST['id'];
		$nombre= $_REQUEST['nombre'];
		$tipo= $_REQUEST['tipo'];
		$rif= $_REQUEST['rif'];
		$telefono= $_REQUEST['telefono'];
		$correo= $_REQUEST['correo'];
		$comunidad= $_REQUEST['comunidad'];

		$empresa = new empresas($nombre, $tipo, $rif, $telefono,$correo, $comunidad);
		$update = $empresa->actualizar($id);

	switch ($update) {
		case 'existente':
		header("location: ../vista/pages/v_empresas/mostrar.php?respuesta1=existente");
		break;
		case 'exito':
		header("location: ../vista/pages/v_empresas/mostrar.php?respuesta2=extio");
		break;
		case 'fracaso':
		header("location: ../vista/pages/v_empresas/mostrar.php?respuesta3=fracaso");
		break;
	}

		break;

	case 'eliminar':
		$id = $_REQUEST['id'];
		$empresa = new empresas();

		$resultado = $empresa->eliminar($id);

		switch ($resultado) {
				case 'exito':
				header("location: ../vista/pages/v_empresas/mostrar.php?respuesta2= extio");
				break;
				case 'fracaso':
				header("location: ../vista/pages/v_empresas/mostrar.php?respuesta3= fracaso");
				break;
				case 'ojo':
				header("location: ../vista/pages/v_empresas/mostrar.php?respuesta4= ojo");
				break;
			}

		break;

		case 'empresa_mencion':
					$id1=$_REQUEST['empresa'];
					$id2=$_REQUEST['mencion'];

					$empresa = new empresas();
					$resultado = $empresa->registrar2($id1,$id2);
					$resultado= json_encode($resultado);
					echo $resultado;

					break;

		case 'emp_TE':
			$emp_men= $_REQUEST['emp_men'];
			$TE= $_REQUEST['TE'];
			$empresa= new empresas();

			$resultado = $empresa->crear_historial($emp_men, $TE);
			$resultado= json_encode($resultado);
			echo $resultado;
			break;

		case 'asginar_empresa':
			$hist_emp= $_REQUEST['his_emp'];
			$matricula= $_REQUEST['matricula'];

			$empresa= new empresas();
			$resultado = $empresa->asignar_empresa($hist_emp, $matricula);
			$resultado= json_encode($resultado);
			echo $resultado;
			break;

		case 'encontrar':
			$id= $_REQUEST['id'];
			$empresa= new empresas();
			$resultado = $empresa->encontrar_empresa_mencion($id);
			$resultado= json_encode($resultado);
			echo $resultado;
			break;


}

?>
