<?php
session_start();
require_once('../../../modelo/m_personas.php');
if (isset($_SESSION['user_id'])) {    
  $user= personas::comprobarUsuario($_SESSION['user_id']);
}else{
  header('Location: /PASANTIAS_2019/vista/pages/v_users/login.php');
}

  require_once('../../../modelo/m_historial_academico.php');
  $resultado= historial_academico::consultar();
  $resultado2= historial_academico::consultar2();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Listar</title>

  <link rel="stylesheet" href="../../dist/toastr-master/build/toastr.min.css">
  <?php include ("../include/head.php");?>
  <link rel="stylesheet" href="../../plugins/alertify/css/alertify.min.css">
  <link rel="stylesheet" href="../../plugins/alertify/css/themes/bootstrap.min.css">
  <link rel="stylesheet" href="../../bower_components/datable/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../../bower_components/datable/buttons.bootstrap.min.css">
  <link rel="stylesheet" href="../../dist/css/estilos.css">
  <script src="../../bower_components/jquery/dist/jquery.min.js"></script>

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
        <i class="fa fa-graduation-cap"></i> Docentes.
        <small>Listar <i class="fa fa-list"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Personas</a></li>
        <li class="">Tutor Academico.</li>
        <li class="active">Listar.</li>
      </ol>
    </section>

    <!-- Main content -->

    <section class="content">

      <!-- Default box -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Listado de docentes y tutores academicos: </h3>
          <div class="pull-right hidden-xs">
            <?php include ("../include/periodo.php"); ?>
          </div>

        </div>
  <div class="box-body">

		<ul class="nav nav-tabs">
			<li class="active"><a href="#docentes" data-toggle="tab">Docentes</a></li>
			<li><a href="#tutor_academico" data-toggle="tab">Tutores academicos</a></li>
		</ul>

<div class="tab-content">
	<div id="docentes" class="tab-pane fade in active">


	       <div class="pull-left hidden-xs col-md-offset-">
           <h5><strong>Agregar nuevo</strong> <button type="button" onclick="window.location.href='agregar.php'" class="btn btn-success btn-sm"><span class="  glyphicon glyphicon-plus"></span></button></h5>
       </div>

	<div class="panel-body">
      <table class="table table-hover table-bordered" id="example">

          <thead>
            <th class="col-md-1">N°</th>
            <th class="">Cedula</th>
            <th class="">Nombres</th>
            <th class="">Apellidos</th>
            <th class="">Estatus</th>

            <th class="col-md-3 text-center">Acciones</th>

          </thead>

             <tbody>
              <?php for ($i=0; $i <count($resultado) ; $i++) { ?>
            <tr>
               <td><?php echo $i+1?></td>
              <td><?php echo $resultado[$i]['nacionalidad'].$resultado[$i]['cedula']; ?></td>
              <td><?php echo $resultado[$i]['nombre']; ?></td>
              <td><?php echo $resultado[$i]['apellido']; ?></td>
              <td><?php echo $resultado[$i]['estatus_docente']; ?></td>

              <td>
               <button type="button" title="Perfil" onClick="window.location.href='perfil.php<?php echo '?id='?><?php echo $resultado[$i]['id_docente']?>'" class="btn btn-sm btn-success btn-sm"><span class="fa fa-eye"></span></button>

                <button title="Modificar Registro" type="button" onClick="window.location.href='modificar.php<?php echo '?id='?><?php echo $resultado[$i]['id_docente']?>'" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span></button>

                <a href="javascript:preguntar(<?php echo $resultado[$i]['id_docente']?>,'eliminar')" class="btn btn-sm btn-danger" title="Eliminar registro"><span class="glyphicon glyphicon-trash"></span></a>
              </td>
            </tr>

          <?php  } ?>

          </tbody>

        </table>
  </div>

			</div>


<div id="tutor_academico" class="tab-pane fade">


			<div class="pull-left hidden-xs col-md-offset-">
           <h5><strong>Agregar nuevo</strong> <button type="button" onclick="window.location.href='agregar.php'" class="btn btn-success btn-sm"><span class="  glyphicon glyphicon-plus"></span></button></h5>
       </div>

	<div class="panel-body">
      <table class="table table-hover table-bordered" id="example">

          <thead>
            <th class="col-md-1">N°</th>
            <th class="">Cedula</th>
            <th class="">Nombres</th>
            <th class="">Apellidos</th>
            <th class="">Estatus</th>

            <th class="col-md-3 text-center">Acciones</th>

          </thead>

             <tbody>
              <?php for ($i=0; $i <count($resultado2) ; $i++): ?>
            <tr>
               <td><?php echo $i+1?></td>
              <td><?php echo $resultado2[$i]['nacionalidad'].$resultado2[$i]['cedula']; ?></td>
              <td><?php echo $resultado2[$i]['nombre']; ?></td>
              <td><?php echo $resultado2[$i]['apellido']; ?></td>
              <td><?php echo $resultado2[$i]['estatus_tutor']; ?></td>

              <td>
               <button type="button" title="Perfil" onClick="window.location.href='perfil2.php<?php echo '?id='?><?php echo $resultado2[$i]['id_tutor_aca']?>'" class="btn btn-sm btn-success btn-sm"><span class="fa fa-eye"></span></button>

                <button title="Modificar Registro" type="button" onClick="window.location.href='modificar.php<?php echo '?id='?><?php echo $resultado2[$i]['id_tutor_aca']?>'" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span></button>

                <a href="javascript:preguntar(<?php echo $resultado2[$i]['id_tutor_aca']?>,'eliminar')" class="btn btn-sm btn-danger" title="Eliminar registro"><span class="glyphicon glyphicon-trash"></span></a>
              </td>
            </tr>

          <?php  endfor; ?>

          </tbody>

        </table>
  </div>

			</div>


			</div>
		</div>
  </div>


        <!-- /.box-body -->
  <div class="box-footer" >


  </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
        <?php include ("../include/footer.php"); ?>
  </footer>


  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- ./wrapper -->
  <?php include ("../include/plugins.php"); ?>
 <script src="../../dist/toastr-master/build/toastr.min.js"></script>
  <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
  <!-- <script src="../../dist/js/demo.js"></script> -->

  <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="../../plugins/alertify/alertify.min.js"></script>
  <script src="../../dist/js/tutor_academico/eliminar2.js"></script>
  <script src="../../bower_components/datable/dataTables.bootstrap.min.js"></script>
  <script src="../../bower_components/datable/dataTables.buttons.min.js"></script>
  <script src="../../bower_components/datable/buttons.bootstrap.min.js"></script>
  <script src="../../bower_components/datable/jszip.min.js"></script>
  <script src="../../bower_components/datable/pdfmake.min.js"></script>
  <script src="../../bower_components/datable/vfs_fonts.js"></script>
  <script src="../../bower_components/datable/buttons.html5.min.js"></script>
  <script src="../../bower_components/datable/buttons.print.min.js"></script>
 <script src="../../bower_components/datable/buttons.colVis.min.js"></script>

 <?php

   if (isset($_GET['respuesta1'])=='existente') {
     echo '<script>
           $(document).ready(function(){

         toastr.warning ( " El registro ya existe! ", "Advertencia.",{
         "progressBar": true,
         "positionClass": "toast-bottom-right" });
         });
       </script>';
   }
   if (isset($_GET['respuesta2']) == 'exito') {
     echo '<script>
           $(document).ready(function(){

         toastr.success ( "¡Realizada Exitosamente! ", "Operacion.",{
         "progressBar": true,
         "positionClass": "toast-bottom-right" });
         });
       </script>';
   }
   if (isset($_GET['respuesta4']) == 'ojo') {
      echo '<script>
           $(document).ready(function(){

         toastr.error ( "¡No se ah podido eliminar, asegurese de que este cargo no estee asignado a otro registro! ", "Error.",{
         "progressBar": true,
         "positionClass": "toast-bottom-right" });
         });
       </script>';
   }
   ?>

<script type="text/javascript">
 $(document).ready(function(){
   $('#example').DataTable({
     dom: 'frtip',
     buttons:[
       'copyHtml5',
       'excelHtml5',
       'csvHtml5',
       'pdfHtml5'
       //'colvis'
     ],
     'paging': true,
     'lengthChange': false,
     'searching': true,
     'ordering': true,
     'info': false,
     'autoWidth': false,
     'scrollX': false,
     "language":{
       "url":"../../bower_components/datatables.net/js/Spanish.json"
     }

   });
 });
 </script>
</body>
</html>
