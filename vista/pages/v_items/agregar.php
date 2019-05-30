<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agregar</title>
 <?php include ("../include/head.php"); ?>
  <link rel="stylesheet" href="../../dist/css/estilos.css">
  <link rel="stylesheet" href="../../dist/css/icono_css.css">
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
        <i class="fa fa-pencil "></i> Items.
        <small>Registrar <i class="fa fa-plus"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Mantenimiento</a></li>
        <li class="active">Agregar Nuevo.</li>
      </ol>
    </section>

    <!-- Main content -->
<section class="content container-fluid">

<div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Datos del item: </h3>           <div class="pull-right hidden-xs">
      <?php include ("../include/periodo.php"); ?>
             </div>

        </div>
       <br>

<form name="form_cargo" id="form_cargo" action="../../../controlador/c_item.php">

    <div class="row">
    <article class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12 col-md-offset-">

        <div class="form-group ">
          <div class="col-md-6">
              <label for="item">Item:</label>
               <input type="text" name="item" id="item" class="form-control" autocomplete="off">
            </div>
          </div>

       <div class="form-group ">
          <div class="col-md-6">
               <textarea rows="5" cols="50"  name="descripcion" placeholder="Descripción" autocomplete="off"></textarea>
            </div> 
          </div>

    </article>
  </div>


<hr>


    <div class="row">
      <div class="col-md-12 col-sm-offset-3">

        <button type="submit" name="opcion" id="btnvalidar" value="registrar" class="btn btn-primary btn-flat margin"><i class="fa fa-save"></i> <strong>Registrar</strong></button>

        <button type="reset" class="btn btn-primary btn-flat margin"><strong><i class="fa  fa-spinner"></i> Limpiar</strong></button>


        <a href="mostrar.php" type="button" class="btn btn-md btn-primary"><strong><i class="fa fa-server"></i> Listar</strong></a>


      </div>
    </div>
</form>
 <!----<div id="filtrar" col-md-12></div>-->
 <div id="tabla" col-md-12></div>


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
  <!----<script src="../../dist/js/departamentos/grillaAgregar.js"></script>-->


</body>
</html>
