<?php
require_once('../modelo/Estado.php');
require_once('../modelo/Comunidad.php');


if(isset($_REQUEST['opcion'])){
	$op=$_REQUEST['opcion'];

	switch($op){
	 	case 'listarEstado':
			$e=new estados();
			$respuesta['respuesta']=$e->listar();
			$respuesta['mensaje']='Listado de estados';
			$respuesta=json_encode($respuesta);

			echo $respuesta;
			break;
		case 'listarMunicipio':

			$codigo_estado=$_REQUEST['codigo'];
			$nombre_estado=$_REQUEST['nombre'];

			$e=new estados($codigo_estado,$nombre_estado);

			$m=new municipios();
			$m->asignarEstado($e);
			$respuesta['respuesta']=$m->buscarxEstado();
			$respuesta['mensaje']='Listado de estados';
			$respuesta=json_encode($respuesta);
			
			echo $respuesta;
			break;

		case 'listarParroquia':
			$codigo_municipio=$_REQUEST['codigo'];
			$nombre_municipio=$_REQUEST['nombre'];
			$m=new municipios($codigo_municipio,$nombre_municipio);

			$p=new parroquias();
			$p->asignarMunicipio($m);
			$respuesta['respuesta']=$p->buscarxMunicipio();
			$respuesta['mensaje']='Listado de municipios';
			$respuesta=json_encode($respuesta);
			echo $respuesta;
			break;

		case 'listarComunidad':
			$codigo_parroquia=$_REQUEST['codigo'];
			$nombre_parroquia=$_REQUEST['nombre'];
			$m=new parroquias($codigo_parroquia,$nombre_parroquia);

			$p=new comunidades();
			$p->asignarParroquia($m);
			$respuesta['respuesta']=$p->buscarxParroquia();
			$respuesta['mensaje']='Listado de parroquias';
			$respuesta=json_encode($respuesta);
			echo $respuesta;
			break;

	 	default:
			$respuesta['respuesta']="deberia mostrar alguna interfaz";
			$respuesta['mensaje']="deberia mostrar alguna interfaz";
			echo json_encode($respuesta);
			break;

	 }//fin switch
}
