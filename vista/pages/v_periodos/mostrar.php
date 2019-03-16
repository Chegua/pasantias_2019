<?php
require_once '../../../modelo/m_periodos.php';
$periodo= new periodos();
$resultado= $periodo->consultar();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agregar</title>
  <link rel="stylesheet" href="../../dist/toastr-master/build/toastr.min.css">
 <?php include ("../include/head.php"); ?>
  <link rel="stylesheet" href="../../dist/css/estilos.css">
  <link rel="stylesheet" href="../../dist/css/icono_css.css">
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
        <i class="fa fa-graduation-cap "></i> Periodo escolar.
        <small>Registrar <i class="fa fa-plus"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Mantenimiento</a></li>
        <li class="">Periodo escolar.</li>
        <li class="active">Agregar Nuevo.</li>
      </ol>
    </section>


    <!-- Main content -->
    <form id="form_cargo" action="../../../controlador/c_periodo.php" method="post">

    <section class="content">
      <?php
      if (isset($_GET['respuesta1']) == 'existente') {
      echo '<script>
             $(document).ready(function(){

           toastr.warning ( " El periodo ya se encuentra activo! ", "Advertencia.",{
           "progressBar": true,
           "positionClass": "toast-bottom-right" });
           });
         </script>';
      }
      if (isset($_GET['respuesta2']) == 'exito') {
       echo '<script>
             $(document).ready(function(){

           toastr.success ( "¡Realizada exitosamente!", "Operacion.",{
           "progressBar": true,
           "positionClass": "toast-bottom-right" });
           });
         </script>';
      }
      if (isset($_GET['respuesta3']) == 'fracaso') {
       echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong><i class="fas fa-exclamation-circle"></i> Actualizacion cancelada ha ocurrido un problema</strong>, no se logro actualizar el registro en la base de datos, comuniquese con el administrador!</div>';
      }
      if (isset($_GET['respuesta4']) == 'ojo') {
        echo '<script>
             $(document).ready(function(){

           toastr.error ( " ¡Exitosamente! ", "Eliminado.",{
           "progressBar": true,
           "positionClass": "toast-bottom-right" });
           });
         </script>';
      }
      ?>
      <!-- Default box -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Periodos escolares: </h3>
          <div class="pull-right hidden-xs">
            <?php include ("../include/periodo.php"); ?>
          </div>

        </div>
  <div class="box-body">

    <article class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12 col-md-offset-">

        <div class="form-row">

           <div class="row">
             <div class="form-group col-md-4">
                <label for="periodo">Iniciar nuevo periodo escolar: </label>
                  <div class="input-group">
                    <input type="text" name="periodo" value="<?php echo $time2.'-'.$periodo;?>" class="form-control" readonly>
                    <span class="input-group-btn">
                      <button type="submit" name="opcion" id="btnvalidar" value="registrar" class="btn btn-success btn-block btn-flat"><i class="fa fa-plus"></i></button>
                    </span>
                  </div>
              </div>
              <div class="form-group col-md-8">
                <table class="table table-hover" id="example">
                  <thead>
                    <tr>
                      <th>Periodo</th>
                      <th>Estatus</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (count($resultado)>0): ?>
                      <?php foreach ($resultado as $value): ?>
                        <tr>
                          <td><?php echo $value->periodo; ?></td>
                          <td><?php echo $value->estatus; ?></td>
                        </tr>
                      <?php endforeach; ?>
                    <?php endif; ?>

                  </tbody>
                </table>
              </div>
           </div>

      </article>
  </div>
        <!-- /.box-body -->
  <div class="box-footer" >

          <div class="row">
      <div class="col-md-12 col-sm-offset-3">

      </div>
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

<!-- ./wrapper -->
    <?php include ("../include/plugins.php"); ?>


  <script src="../../dist/toastr-master/build/toastr.min.js"></script>

  <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
 $(document).ready(function(){
   $('#example').DataTable({
     'paging': true,
     'lengthChange': false,
     'searching': true,
     'ordering': true,
     'info': false,
     'autoWidth': true,
     'scrollX': false,
     "language":{
       "url":"../../bower_components/datatables.net/js/Spanish.json"
     }

   });
 });

 </script>

</body>
</html>
