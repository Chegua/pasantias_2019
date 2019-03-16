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
        <i class="fa fa-thumb-tack"></i> Comunidad.
        <small>Registrar <i class="fa fa-plus"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Sistema</a></li>
        <li class="active">Agregar Nuevo.</li>
      </ol>
    </section>

    <!-- Main content -->
    <form name="form_cargo" id="form_cargo" action="../../../controlador/c_comunidad.php">

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
            <div class="col-md-3">
              <label for="estado">Estados:</label>
              <select name="estado" class="form-control form-control-sm select2" id="estado" required>
                <option value="">Seleccione...</option>
              </select>
            </div>

            <div class="col-md-3">
              <label for="municipio">Municipios:</label>
              <select name="municipio" class="form-control form-control-sm select2" id="municipio" required>
                <option value="">Seleccione...</option>
              </select>
            </div>

            <div class="col-md-3">
              <label for="parroquia">Parroquias:</label>
              <select name="parroquia" class="form-control form-control-sm select2" id="parroquia" required>
                <option value="">Seleccione...</option>
              </select>
            </div>

            <div class="col-md-3">
                <label for="comunidad">Comunidad:</label>
                    <input type="text" name="comunidad" id="comunidad" class="form-control" autocomplete="off" placeholder="Introduzca la comunidad">
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

        <button type="button" class="btn btn-primary btn-flat margin"><strong><i class="fa  fa-spinner"></i> Limpiar</strong></button>


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
  <script src="../../dist/js/dire.js"></script>


</body>
</html>
