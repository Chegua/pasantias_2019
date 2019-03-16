<?php
  require_once('../../../modelo/m_empresas.php');
  require_once('../../../modelo/m_menciones.php');

  $id=$_REQUEST['id'];

  $mencion= new menciones();
  $resultado2= $mencion->consultar();

  $empresa= new empresas();
  $resultado= $empresa->encontrar($id);

  $mostrar= $empresa->mostrar_asignarMen($resultado->rif);

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
      require_once('../../../modelo/m_empresas.php');
      $empresas = new empresas();
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

      <form action="../../../controlador/c_empresa.php">

          <div class="row">

            <div class="col-md-4 col-md-offset-">
              <div class="form-group">
                <label for="nombre">Nombre</label>
                 <input disabled type="text" name="" value="<?php echo $resultado->empresa?>" class="form-control" autocomplete="off">
              </div>
            </div>


            <div class="col-md-4 col-md-offset-">
              <div class="form-group">
                <label for="rif">Rif</label>
                 <input disabled type="text" name=""value="<?php echo $resultado->tipo."-".$resultado->rif ?>" class="form-control" autocomplete="off">
              </div>
            </div>

      <input type="hidden" name="empresa" id='empresa'value="<?php echo $resultado->id_empresa; ?>">



          </div>
      <br>
      <div class="row">
        <div class="box-header with-border">
            <h3 class="" align="center"><i class="fa fa-check-circle"></i> <strong>Menciones.</strong></h3>
        </div>


              <div class="col-md-9 col-md-offset-1">

              <select name="mencion" id="mencion" class="form-control" style="width: 100%;">
                <?php for ($i=0; $i < count($resultado2); $i++): ?>
                  <option value="<?php echo $resultado2[$i]['id_mencion'];?>"> <?php echo $resultado2[$i]['mencion']; ?></option>
                <?php endfor; ?>
              </select>
              </div>



                <button type="button" name="opcion" id="registrar2" value="registrar2"
                onclick="asignarMen();" class="btn btn-success" title="Agregar"><i class="fa fa-plus"></i> Asignar</button>

      </div>

      <br><br>

      <div class="panel panel-primary">
                <div class="panel-heading">
                  <h5> <strong>Menciones asignadas a la empresa</strong></h5>

                </div>
      <div class="panel panel-primary">

      <div class="panel-body">
        <table class="table table-hover table-bordered" id="example">

          <thead>
          <th class="col-md-1">N°</th>
          <th class="col-md-5">Menciones</th>

          <hr>
          <th class="col-md-3 text-center">Acciones</th>

          </thead>

          <tbody>
             <?php for ($i=0; $i <count($mostrar) ; $i++): ?>
              <tr>
                <td> <?php echo $i+1; ?></td>
                <td><?php echo $mostrar[$i]['mencion']; ?></td>

                <td>
                 <button type="button" id="eliminar" onClick= "confirmar_eliminar(<?php echo $mostrar[$i]['cod_dep']?>);" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash" title="Eliminar"></span></button>
                </td>
              </tr>
            <?php endfor; ?>
          </tbody>

        </table>
      </div>

          <!-- /.content -->
        </div >

              <div class="row">
                <div class="cold-md-4 col-md-offset-1">
                  <a href="mostrar.php" class="btn btn-primary"> <i class="fa fa-server"></i> <strong>Listar Empresas</strong></a>

                </div>

              </div>
      <br>
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
  <script src="../../dist/js/empresas/eliminar2.js"></script>
  <script src="../../dist/js/empresas/empresa_mencion.js"> </script>
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
