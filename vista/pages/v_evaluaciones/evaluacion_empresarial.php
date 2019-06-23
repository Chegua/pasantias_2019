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
        <i class="fa fa-graduation-cap"></i> Evaluaciones.
        <small>Listar <i class="fa fa-list"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Evaluacion</a></li>
        <li class="">Empresarial.</li>
        <li class="active">Listar.</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="box box-warning">
       <div class="box-header with-border">
       <h3 class="box-title">Evaluacion Empresarial.</h3>     
         <div class="pull-right hidden-xs">
           <?php include ("../include/periodo.php"); ?>
         </div>
       </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          

 <!-------------------------------------BOTONES DE NAVEGACION ------------------------------>
          <ul class="nav nav-tabs">
            <li><a href="#datos_evaluacion_item" data-toggle="tab">Evaluar</a></li>
            <li><a href="#asignados_empresa" data-toggle="tab">Pasantes y empresas</a></li>
      		</ul>

        </div>
        <div class="panel-body">
          <div class="tab-content">

<!-------------------------------------SESION DE EMPRESAS ------------------------------>
            <div id="datos_evaluacion_item" class="tab-pane fade in active">
              
              <div class="row">
                <div class="col-md-8">
                <h4>Pasante:</h4>
                <span id="datos_asignar_empresa">Debe buscar al pasante por empresa</span>
                </div> 

                <div class="col-md-4 text-right">
                  <button type="button" name="item" id="item" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_item"><i class="fa fa-list"></i> Listar items</button>
                </div>
              </div>

              <input type="hidden" id="id_asignar_empresa" name="id_asignar_empresa">
              <input type="hidden" id="id_evaluacion_item" name="id_evaluacion_item">
              

              <br><br>
                          
               
              <div class="col-md-3">
              <label for="">Porcentaje a evaluar</label>
                <input type="text" readonly class="form-control" id="porcentaje_eva">
              </div>

           

              <div class="col-md-3 col-md-offset-6">
                <label for="">Total:</label>
                <input type="text" class="form-control" value="0%" readonly id="total">
              </div>

              <table class="table table-hover table-bordered" id="tabla_evaEmp">

                <thead>
                  <tr>
                    <th>Items</th>
                    <th>Descripcions</th>
                    <th>Puntaje</th>                                       
                  </tr>
                </thead>
                <tbody id="lista_evaEmp" >

                </tbody>
              </table>

            </div>            
<!----------------------------------------SESION ASIGNADOS A EMPRESAS ------------------------------>
            <div id="asignados_empresa" class="tab-pane fade">
            <table class="table table-hover table-bordered" id="tabla_empresarial">
              <thead>
                <tr>
                  <th>Estudiantes Asignados</th>
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
  <!-- -------------------------------MODAL PARA EL BOTON ESTUDIANTES ASIGNADOS A EMPRESAS-------------------------------------------------->

  <div class="modal fade bs-example-modal-lg" id="ver_estudiantes_asignados" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h3 class="modal-title" id="myModalLabel">Estudiantes asignados: </h3>
        </div>

        <div class="modal-body">

          <div class="panel panel-default" id="">
              <div class="panel-heading">
              <h3>Lista de estudiantes y tutores</h3>

              </div>
                     <div class="panel-body">

                     <table class="table table-hover table-bordered" id="tabla_asignar_empresa">
                       <thead>
                         <tr>
                           <th>Seleccionar</th>
                           <th>Cedula</th>
                           <th>Aperllido y Nombre</th>
                           <th>Año</th>
                           <th>Mención</th>
                           <th>Periodo</th>
                           <th>Tutor de empresa</th>
                           <th>Cargo</th>
                         </tr>
                       </thead>
                       <tbody id="lista_asignar_empresa" >
                       </tbody>
                     </table>
                    </div>
           </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fa fa-close"></i></button>
        </div>
      </div>
    </div>
  </div>

  <!-----------------------------------------------CIERRE MODAL-------------------------------------------------->
 
   <!-- ---------------------------------MODAL PARA EL BOTON LISTAR ITEMS -------------------------------------------------->

   <div class="modal fade bs-example-modal-md" id="modal_item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h3 class="modal-title" id="myModalLabel">Items: </h3>
        </div>

        <div class="modal-body">

          <div class="panel panel-default" id="">
              <div class="panel-heading">
              <h3>Lista de items disponibles</h3>

              </div>
                     <div class="panel-body">

                     <table class="table table-hover table-bordered" id="tabla_items">
                       <thead>
                         <tr>
                           <th>Asignar</th>
                           <th>Item</th>
                           <th>Descripción</th>
                         </tr>
                       </thead>
                       <tbody id="lista_items" >
                       </tbody>
                     </table>
                    </div>
           </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fa fa-close"></i></button>
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

 <script src="../../dist/js/evaluaciones/evaluar.js"></script>

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