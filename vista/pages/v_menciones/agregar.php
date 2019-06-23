<?php
session_start();
require_once('../../../modelo/m_personas.php');
if (isset($_SESSION['user_id'])) {    
  $user= personas::comprobarUsuario($_SESSION['user_id']);
}else{
  header('Location: /PASANTIAS_2019/vista/pages/v_users/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Agregar</title>
	<?php include ("../include/head.php"); ?>
 <link rel="stylesheet" href="../../dist/css/estilos.css">
  <link rel="stylesheet" href="../../dist/css/icono_css.css">
  <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
</head>

<body>
	
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">
   	<?php include ("../include/header.php"); ?>
  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
       	<?php include ("../include/sidebar.php"); ?>
  </aside>



  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
        <i class="fa fa-pencil "></i> Menciones.
        <small>Registrar <i class="fa fa-plus"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Mantenimiento</a></li>
        <li><a href="#">Mencioness</a></li>
        <li><a href="#" class="active">Agregar Nuevo</a></li>
     </ol>
    </section>

    <!-- Main content -->
<section class="content container-fluid">

<div class="box box-warning">
       <div class="box-header with-border">
       <h3 class="box-title">Datos de la Mención: </h3>           <div class="pull-right hidden-xs">
      <?php include ("../include/periodo.php"); ?>
             </div>
       </div>
       <br>

<form name="form_cargo" id="form_cargo" action="../../../controlador/c_mencion.php">

    <div class="row">
        <div class="form-group ">
          <div class="col-md-10 col-md-offset-1">       
              <label for="mencion">Mencion:</label>
               <input type="text" name="mencion" id="mencion" class="form-control" autocomplete="off">
              
            </div>
          </div>
    </div>

<hr>


    <div class="row">
      <div class="col-md-12 col-sm-offset-3">

        <button type="submit" name="opcion" id="btnvalidar" value="registrar" class="btn btn-primary btn-flat margin"><i class="fa fa-save"></i> <strong>Registrar</strong></button>

        <button type="button" class="btn btn-primary btn-flat margin"><strong><i class="fa  fa-spinner"></i> Limpiar</strong></button>
        

        <a href="mostrar.php" type="button" class="btn btn-md btn-primary"><strong><i class="fa fa-server"></i> Listar</strong></a>


      </div>
    </div>
</form>
 <!----<div id="filtrar" col-md-12></div>-->
 <div id="tabla" col-md-12></div>


</div>


  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
      	<?php include ("../include/footer.php"); ?>
  </footer>

  
</div>
<!-- ./wrapper -->


   	<?php include ("../include/plugins.php"); ?>
  <!-- <script src="../../dist/js/menciones/expresionregular.js"></script> -->
 <script src="../../dist/js/menciones/validacion.js"></script>
  <script src="../../dist/js/menciones/grillaAgregar.js"></script>


</body>
</html>