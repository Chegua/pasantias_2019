<?php
  require_once('../../../modelo/m_cargos.php');

  $cargo= new cargos();
  $resultado= $cargo->consultartiposcargos();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agregar</title>
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
        <i class="fa fa-thumb-tack"></i> Cargos.
        <small>Registrar <i class="fa fa-plus"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Mantenimiento</a></li>
        <li class="active">Agregar Nuevo.</li>
      </ol>
    </section>

    <!-- Main content -->
    <form name="form_cargo" id="form_cargo" action="../../../controlador/c_cargo.php">

    <section class="content">

      <!-- Default box -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Introduzca los datos: </h3>           <div class="pull-right hidden-xs">
      <?php include ("../include/periodo.php"); ?>
             </div>

        </div>
  <div class="box-body">



  <div class="row">

      <div class="form-group">
          <div class="col-md-5 col-md-offset-1">
              <label for="tipo">Tipo:</label>
              <select name="tipo" id="tipo" class="form-control">
                <option value="">Seleciione..</option>
                  <?php for ($i=0; $i <count($resultado) ; $i++) { ?>
                      <option value="<?php echo $resultado[$i]['id_tipo_cargo'];?>"><?php echo $resultado[$i]['tipo_cargo'];?> </option>
                 <?php } ?>
              </select>
               <span class="help-block"></span>
          </div>

            <div class="col-md-5">
                <label for="cargo">Nombre:</label>
                    <input type="text" name="cargo" id="cargo" class="form-control" autocomplete="off" placeholder="Introduzca el nombre de un cargo">
                 <span class="help-block"></span>
            </div>
      </div>
  </div>
        </div>
        <!-- /.box-body -->
  <div class="box-footer" >

          <div class="row">
      <div class="col-md-12 col-sm-offset-3">

        <button type="submit" name="opcion" id="btnvalidar" value="registrar" class="btn btn-primary btn-flat margin"><i class="fa fa-save"></i> <strong>Registrar</strong></button>

        <button type="reset" class="btn btn-primary btn-flat margin"><strong><i class="fa  fa-spinner"></i> Limpiar</strong></button>


        <a href="mostrar.php" type="button" class="btn btn-md btn-primary"><strong><i class="fa fa-server"></i> Listar</strong></a>


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

  <?php include ("../include/plugins.php"); ?>
  <!---<script src="../../dist/js/cargos/filtrado.js"></script>-->

  <!------<script src="../../dist/js/cargos/expresionregular.js"></script>
  <script src="../../dist/js/cargos/validacion.js"></script>
    -->
  <script src="../../dist/js/cargos/grillaAgregar.js"></script>

</body>
</html>
