<?php
  require_once('../../../modelo/m_estudiantes.php');

  $resultado = estudiantes::consultar();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Listar</title>
	<?php include ("../include/head.php"); ?>
  <link rel="stylesheet" href="../../plugins/alertify/css/alertify.min.css">
  <link rel="stylesheet" href="../../plugins/alertify/css/themes/bootstrap.min.css">
  <link rel="stylesheet" href="../../bower_components/datable/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../../bower_components/datable/buttons.bootstrap.min.css">
  <link rel="stylesheet" href="../../dist/css/estilos.css">
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
        <i class="fa fa-graduation-cap"></i> Estudiante.
        <small>Listar <i class="fa fa-list"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Personas</a></li>
        <li class="">Estudiante.</li>
        <li class="active">Listar.</li>
      </ol>

    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="box box-warning">
       <div class="box-header with-border">
         <h3 class="box-title">Listado de estudiantes: </h3>
         <div class="pull-right hidden-xs">
           <?php include ("../include/periodo.php"); ?>
         </div>
       </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h5><strong>Agregar nuevo</strong> <button type="button" onclick="window.location.href='agregar.php'" class="btn btn-success btn-sm"><span class="  glyphicon glyphicon-plus"></span></button></h5>

        </div>
        <div class="panel-body">
          <table class="table table-hover table-bordered" id="example">

            <thead>
              <th class="">N°</th>
              <th class="">Cedula</th>
              <th class="">Nombre</th>
              <th class="">Apellido</th>
              <th class="">Telefono</th>
              <th class="">Correo</th>
              <th class="text-center">Acciones</th>
            </thead>

            <tbody>
              <?php for ($i=0; $i <count($resultado) ; $i++): ?>
                <tr>
                  <td><?php echo $i+1?></td>
                  <td><?php echo $resultado[$i]['nacionalidad_estudiante'].$resultado[$i]['cedula_estudiante']; ?></td>
                  <td><?php echo $resultado[$i]['nombre_estudiante']; ?></td>
                  <td><?php echo $resultado[$i]['apellido_estudiante']; ?></td>
                  <td><?php echo $resultado[$i]['telefono_estudiante']; ?></td>
                  <td><?php echo $resultado[$i]['correo_estudiante']; ?></td>

                  <td>
                   <button type="button" title="Perfil" onClick="window.location.href='perfil2.php<?php echo '?id='?><?php echo $resultado[$i]['id_matricula']?>'" class="btn btn-sm btn-success btn-sm"><span class="fa fa-eye"></span></button>

                    <button title="Modificar Registro" type="button" onClick="window.location.href='modificar.php<?php echo '?id='?><?php echo $resultado[$i]['id_matricula']?>'" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span></button>

                    <a href="javascript:preguntar(<?php echo $resultado[$i]['id_matricula']?>,'eliminar')" class="btn btn-sm btn-danger" title="Eliminar registro"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>

              <?php  endfor; ?>
            </tbody>
          </table>
        </div>

      </div>


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
  <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
  <!-- <script src="../../dist/js/demo.js"></script> -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

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
     dom: 'Bfrtip',
     buttons:[
       'copyHtml5',
       'excelHtml5',
       'csvHtml5',
       'pdfHtml5',
       'colvis'
     ],
     'paging': true,
     'lengthChange': false,
     'searching': true,
     'ordering': true,
     'info': true,
     'autoWidth': false,
     'scrollX': true,
     "language":{
       "url":"../../bower_components/datatables.net/js/Spanish.json"
     }

   });
 });
 </script>



</body>
</html>
