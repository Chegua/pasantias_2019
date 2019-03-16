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
          <div class="row">
            <div class="col-md-12">
              <spam class="h4">Listar matricula</spam><button type="button" name="matricula" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_matricula"><i class="fa fa-search"></i> </button>

            </div>
          </div>

        </div>
        <div class="panel-body">


          <form class="" id="asignar-form" method="post">
            <div class="col-md-12">
              <h4>Estudiante</h4>
              <input type="hidden" name="id_matricula" id="id_matricula">
              <span id="datos_estudiante"></span>
            </div>

            <div class="col-md-12">
              <h4>Tutor empresarial</h4>
              <input type="hidden" name="id_hist_emp" id="id_hist_emp">
              <span id="datos_hist_emp"></span>
            </div>

            <div class="col-md-12 text-center">
              <button type="submit" name="asignar" class="btn btn-success">Asignar <i class="fa fa-save"></i> </button>
            </div>

            <!-- <input type="text" name="confirmar_dataTable" id="confirmar_dataTable" value="0"> -->
          </form>

          <table class="table table-hover table-bordered" id="tabla_empresarial">

            <thead>
              <tr>
                <th>Tutores disponibles</th>
                <th class="">Empresa</th>
                <th class="">RIF</th>

              </tr>
            </thead>
            <tbody id="lista_empresarial" >

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
  <!-----------------------------------------------MODAL PARA EL BOTON LISTAR MATRICULA -------------------------------------------------->

  <div class="modal fade bs-example-modal-lg" id="modal_matricula" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h3 class="modal-title" id="myModalLabel">Matricula: </h3>
        </div>

        <div class="modal-body">


          <div class="panel panel-default" id="infoMatricula">
              <div class="panel-heading">
                <div class="row">
                  <div class="form-group col-md-3">
                    <label for="anio">Año:</label>
                    <select class="form-control select2_modal" name="anio" id="anio">
                      <option value="">Seleccione...</option>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="mencion">Mención:</label>
                    <select class="form-control select2_modal" name="mencion" id="mencion">
                      <option value="">Seleccione...</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <h4 class="col-md-12">Docente guia: <span id="docente"></span> </h4>
                  </div>
                </div>

              </div>

                     <div class="panel-body">


                       <table class="table table-hover table-bordered" id="listaMatri">

                         <thead>
                           <tr>
                             <th>Seleccione</th>
                             <th class="">Cedula</th>
                             <th class="">Nombre</th>
                             <th class="">Apellido</th>

                             <!-- <th class="">Telefono</th>
                             <th class="">Correo</th> -->
                             <!-- <th class="text-center">Acciones</th> -->
                           </tr>
                         </thead>
                         <tbody id="listar" >

                         </tbody>
                       </table>

               </div>
           </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <!----<button type="button" class="btn btn-primary" onclick="validarContacto();">Registrar</button>--->
        </div>
      </div>
    </div>
  </div>

  <!-----------------------------------------------CIERRE MODAL-------------------------------------------------->

  <!-----------------------------------------------MODAL PARA EL BOTON LISTAR TUTORES -------------------------------------------------->

  <div class="modal fade bs-example-modal-lg" id="modal_tutorEmp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h3 class="modal-title" id="myModalLabel">Tutores: </h3>
        </div>

        <div class="modal-body">


          <div class="panel panel-default" id="info_tutorEmp">
              <div class="panel-heading">


              </div>

                     <div class="panel-body">


                       <table class="table table-hover table-bordered" id="lista_tutorxempresa">

                         <thead>
                           <tr>
                             <th>Seleccione</th>
                             <th class="">Cedula</th>
                             <th class="">Nombre</th>
                             <th class="">Apellido</th>
                             <th class="">Cargo</th>

                           </tr>
                         </thead>
                         <tbody id="listar" >

                         </tbody>
                       </table>

               </div>
           </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <!----<button type="button" class="btn btn-primary" onclick="validarContacto();">Registrar</button>--->
        </div>
      </div>
    </div>
  </div>

  <!-----------------------------------------------CIERRE MODAL-------------------------------------------------->

</div>
<!-- ./wrapper -->



  <?php include ("../include/plugins.php"); ?>
  <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
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

 <script src="../../dist/js/estudiantes/listar.js"></script>



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

 });
 </script>

</body>
</html>
