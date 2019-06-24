<?php
session_start();
require_once('../../../modelo/m_personas.php');
if (isset($_SESSION['user_id'])) {    
  $user= personas::comprobarUsuario($_SESSION['user_id']);
}else{
  header('Location: /PASANTIAS_2019/vista/pages/v_users/login.php');
}

  require_once('../../../modelo/Comunidad.php');
  $comunidad= new comunidades();

  $resultado= $comunidad->listar();

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
      <h1>
        <i class="fa fa-map"></i> Comunidad.
        <small>Listar <i class="fa fa-list"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Sistema</a></li>
        <li class="active">Agregar Nuevo.</li>
      </ol>
    </section>

    <section class="content container-fluid">

    <div class="box box-warning">
    <div class="box-header with-border">
          <h3 class="box-title">Listado de comunidades: </h3>           <div class="pull-right hidden-xs">
      <?php include ("../include/periodo.php"); ?>
             </div>

        </div>

       <?php
      require_once('../../../modelo/m_cargos.php');
      $cargo = new cargos();
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
<div class="panel panel-default">
          <div class="panel-heading">
            <h5> <strong>Agregar nuevo</strong><button type="button" onclick="window.location.href='agregar.php'" class="btn btn-success btn-sm"><span class="  glyphicon glyphicon-plus"></span></button></h5>

          </div>

            <div class="panel-body">
              <table class="table table-hover table-bordered" id="example">

          <thead>
            <th class="">N°</th>
            <th class="">Comunidades</th>
            <th class="">Parroquia</th>
            <th class="">Municipio</th>
            <th class="">Estado</th>
            <th class="text-center">Acciones</th>

          </thead>

          <tbody>
               <?php for ($i=0; $i <count($resultado) ; $i++): ?>
                <tr>
                  <td> <?php echo $i+1; ?></td>                  
                  <td><?php echo $resultado[$i]['nombre_comunidad']; ?></td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>

                  <td class="text-center">
                    <button title="Modificar Registro" type="button" onClick="window.location.href='modificar.php<?php echo '?id='?><?php echo $resultado[$i]['id_comunidad']?>'" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span></button>
                    <button title="Eliminar" class="btn btn-danger btn-sm eliminar" value="<?php echo $resultado[$i]['id_comunidad']?>"><span class="glyphicon glyphicon-trash"></button>
                  </td>
                  
                  
                </tr>
              <?php endfor; ?>
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
  <!-- <script src="../../dist/js/demo.js"></script> -->

  <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="../../plugins/alertify/alertify.min.js"></script>
  <script src="../../dist/js/comunidades/eliminar.js"></script>
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
