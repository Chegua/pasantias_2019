<?php
  require_once('../../../modelo/m_tutores_empresariales.php');
  $resultado= tutores_empresariales::consultar();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
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
    <h3>holaa</h3>

    </section>

    <!-- Main content -->
    <section class="content container-fluid">
  <?php include ("../include/periodo.php"); ?>

    <div class="box box-warning">
       <div class="box-header with-border">
           <h3 class="" align="center"><strong><i class="fa fa-server"></i> Empresas.</strong></h3>
           <p class="info" align="center"><i class="fa fa-eye"></i> En esta sección del sistema se visualiza una lista de registros.</p>
       </div>

       <?php
      // require_once('../../../modelo/m_tutores_empresariales.php');
      // $tutores_empresariales = new tutores_empresariales();
      if (isset($_GET['respuesta1']) == 'existente') {
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
<div class="panel panel-primary">
          <div class="panel-heading">
            <h5> <strong>Agregar nuevo</strong><button type="button" onclick="window.location.href='agregar.php'" class="btn btn-success btn-sm"><span class="  glyphicon glyphicon-plus"></span></button></h5>

          </div>

            <div class="panel-body">
              <table class="table table-hover table-bordered" id="example">

          <thead>
            <tr>
              <!-- <th class="col-md-1">N°</th> -->
              <th class="">Cedula</th>
              <th class="">Nombre</th>
              <th class="">Apellido</th>
              <th class="">Sexo</th>
              <th class="">Empresas</th>
              <th class="">RIF</th>
              <th class="">Area</th>
              <th class="">Dirección</th>

              <th class="text-center">Acciones</th>
            </tr>

          </thead>

          <tbody>
            <?php if (count($resultado)>0): ?>
               <?php foreach ($resultado as $key): ?>
                 <tr>
                   <td><?php echo $key->cedula; ?></td>
                   <td><?php echo $key->nombre; ?></td>
                   <td><?php echo $key->apellido; ?></td>
                   <td><?php echo $key->sexo; ?></td>
                   <td><?php echo $key->empresa; ?></td>
                   <td><?php echo $key->tipo."-".$key->rif; ?></td>
                   <td><?php echo $key->mencion; ?></td>
                   <td><?php echo "Comunidad: ".$key->nombre_comunidad?></td>
                   <td class="text-center"><button title="Modificar Registro" type="button" onClick="window.location.href='modificar.php<?php echo '?id='?><?php echo $key->id_hist_emp?>'" class="btn btn-sm btn-warning"><span class="fa fa-pencil"></span></button>
                     <a href="javascript:preguntar(<?php echo $key->id_hist_emp?>,'eliminar')" class="btn btn-sm btn-danger"><span class="fa fa-trash"></a>

                   </td>
                 </tr>

               <?php endforeach; ?>
             <?php endif; ?>


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
 <script src="../../dist/toastr-master/build/toastr.min.js"></script>
  <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
  <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="../../plugins/alertify/alertify.min.js"></script>
  <script src="../../dist/js/tutores_empresariales/eliminar2.js"></script>
  <script src="../../bower_components/datable/dataTables.bootstrap.min.js"></script>
  <script src="../../bower_components/datable/dataTables.buttons.min.js"></script>
  <script src="../../bower_components/datable/buttons.bootstrap.min.js"></script>
  <script src="../../bower_components/datable/jszip.min.js"></script>
  <script src="../../bower_components/datable/pdfmake.min.js"></script>
  <script src="../../bower_components/datable/vfs_fonts.js"></script>
  <script src="../../bower_components/datable/buttons.html5.min.js"></script>
  <script src="../../bower_components/datable/buttons.print.min.js"></script>
 <script src="../../bower_components/datable/buttons.colVis.min.js"></script>

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
