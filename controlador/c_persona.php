<?php
require_once('../modelo/m_personas.php');

if (isset($_REQUEST['tipo']))
	$tipo = $_REQUEST['tipo'];

if (isset($_REQUEST['nacionalidad']))
    $nacionalidad = $_REQUEST['nacionalidad'];
    
if (isset($_REQUEST['cedula']))
    $cedula = $_REQUEST['cedula'];

if (isset($_REQUEST['nombre']))
    $nombre = $_REQUEST['nombre'];
    
if (isset($_REQUEST['apellido']))
    $apellido = $_REQUEST['apellido'];

if (isset($_REQUEST['sexo']))
    $sexo = $_REQUEST['sexo'];
    
if (isset($_REQUEST['telefono']))
    $telefono = $_REQUEST['telefono'];
    
if (isset($_REQUEST['correo']))
    $correo = $_REQUEST['correo'];
    
if (isset($_REQUEST['clave']))
    $clave = $_REQUEST['clave'];

if (isset($_REQUEST['token']))
    $token = $_REQUEST['token'];
    
switch ($_REQUEST['opcion']) {
    case 'iniciarSesion':
        $persona= new personas('',$cedula,'','','','','');
        $persona->setClave($clave);
        try {            
            $resultado= $persona->login();
            $resultado= json_encode($resultado);
            echo $resultado;
        } catch (Exception $e) {
            die ($e->getMessage());
        }
        break;
    
    case 'asignarClave':
        $persona= new personas('',$cedula,'','','','','');
        $clave= password_hash($clave,PASSWORD_BCRYPT);
        $persona->setClave($clave);
        try{            
            $resultado= $persona->asignarClave($token);
            $resultado= json_encode($resultado);
            echo $resultado;
        } catch (Exception $e) {
            die ($e->getMessage());
        }
        break;

    case 'registrar':
        $persona= new personas($nacionalidad,$cedula,$nombre,$apellido,$sexo,$telefono,$correo);
        $clave= password_hash($clave,PASSWORD_BCRYPT);
        $persona->setClave($clave);
        $persona->setTipo($tipo);
        try {            
            $resultado= $persona->registrarUser();
            $resultado= json_encode($resultado);
            echo $resultado;
        } catch (Exception $e) {
            die ($e->getMessage());
        }
        break;
    
    default:
        # code...
        break;
}