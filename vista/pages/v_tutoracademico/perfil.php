<?php 
session_start();
require_once('../../../modelo/m_personas.php');
if (isset($_SESSION['user_id'])) {    
  $user= personas::comprobarUsuario($_SESSION['user_id']);
}else{
  header('Location: /PASANTIAS_2019/vista/pages/v_users/login.php');
}

  require_once('../../../modelo/m_historial_academico.php');

  $id=$_REQUEST['id'];

  $resultado=historial_academico::encontrar($id);
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Perfil</title>
  <?php include ("../include/head.php"); ?>
  <link rel="stylesheet" href="../../dist/css/perfil.css">
</head>
<body class="sidebar-mini wysihtml5-supported skin-blue">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
          <?php include ("../include/header.php"); ?>
   </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
      <?php include ("../include/sidebar.php"); ?>
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-graduation-cap"></i> Docente.
        <small>Perfil <i class="fa fa-user"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Personal Academico</a></li>
        <li class="active">Perfil</li>
      </ol>
    </section>

    <!-- Main content -->
    <form name="form_cargo" id="form_cargo" action="../../../controlador/c_cargo.php">

    <section class="content">

      <!-- Default box -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Datos como docente: </h3>           <div class="pull-right hidden-xs">
      <?php include ("../include/periodo.php"); ?>
             </div>

        </div>
  <div class="box-body">



<article class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12 col-md-offset-">

          <div class="form-row">  

            <div class="form-group col-md-6">
              <label for="nacionalidad">Nombre:</label>
              <?php echo $resultado[0]['nombre']; ?>
            </div>
    

            <div class="form-group col-md-6">
              <label for="nacionalidad">Apellido:</label>
              <?php echo $resultado[0]['apellido']; ?>
            </div>

       <div class="form-group col-md-6">
              <label for="nacionalidad">Cedula:</label>
              <?php echo $resultado[0]['nacionalidad'].$resultado[0]['cedula']; ?>
            </div>

             <div class="form-group col-md-6">
              <label for="nacionalidad">Sexo:</label>
              <?php echo $resultado[0]['sexo']; ?>
            </div>
             

            <div class="form-group col-md-6">
              <label for="nacionalidad">Telefono:</label>
              <?php echo $resultado[0]['telefono']; ?>
            </div>


            <div class="form-group col-md-6">
              <label for="nacionalidad">Correo:</label>
              <?php echo $resultado[0]['correo']; ?>
            </div>


          <div class="form-group col-md-6">
              <label for="fecha inicio">Estatus:</label>
              <?php echo $resultado[0]['estatus_docente']; ?>
         </div>

         <div class="form-group col-md-6">
              <label for="fecha inicio">Fecha inicio:</label>
              <?php echo $resultado[0]['fecha_inicio_d']; ?>
         </div>

         <div class="form-group col-md-6">
              <label for="fecha inicio">Fecha final:</label>
              <?php echo $resultado[0]['fecha_fin_d']; ?>
         </div>

     </div>  
    </article>
        </div>
        <!-- /.box-body -->
  <div class="box-footer" >
        <a href="mostrar.php" type="button" class="btn btn-md btn-primary"><strong><i class="fa fa-server"></i> Listar</strong></a>

        <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"> Impirimir</i> </a>

    </div>
  </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
  </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
        <?php include ("../include/footer.php"); ?>
  </footer>


  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

  <?php include ("../include/plugins.php"); ?>
  <!---<script src="../../dist/js/cargos/filtrado.js"></script>-->

  <!------<script src="../../dist/js/cargos/expresionregular.js"></script>
  <script src="../../dist/js/cargos/validacion.js"></script>
    -->
  <script src="../../dist/js/cargos/grillaAgregar.js"></script>

</body>
</html>
