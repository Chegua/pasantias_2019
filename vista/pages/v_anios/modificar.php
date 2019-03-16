<?php   //include('modales.php');
  require_once('../../../modelo/m_anios.php');
   $id=$_REQUEST['id'];

  $anio= new anios();

  $resultado=$anio->encontrar($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Modificar</title>
	<?php include ("../include/head.php"); ?>
  <link rel="stylesheet" href="../../plugins/alertify/css/alertify.min.css">
  <link rel="stylesheet" href="../../plugins/alertify/css/themes/bootstrap.min.css">
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

 <form action="../../../controlador/c_anios.php" method="get">
    <div class="box box-warning">
       <div class="box-header with-border">
           <h3 class="" align="center"><i class="fa fa-edit"></i> <strong>Modificar año.</strong></h3>
           <p class="info" align="center"><i class="fa fa-eye"></i> En esta sección del sistema se puede realizar la modificación de un registro.</p>
       </div>
       <br>


    <input type="hidden" value="<?php  echo $resultado[0]['id_anio'] ?>" name="id">


     <div class="row">
        <div class="form-group ">
          <div class="col-md-10 col-md-offset-1">
              <label for="anio">Año:</label>
               <input type="text" name="anio" id="anio" value="<?php  echo $resultado[0]['anio'] ?>" class="form-control" autocomplete="off">
               <span class="help-block"></span>
            </div>
          </div>
    </div>

<hr>
    <div class="row">
      <div class="col-md-12 col-sm-offset-3">






        <button type="submit" name="opcion" value="modificar" class="btn btn-primary btn-flat margin"><i class="fa fa-edit"></i> <strong>Modificar</strong></button>

        <button type="button" class="btn btn-primary btn-flat margin"><strong><i class="fa  fa-spinner"></i> Limpiar</strong></button>

          <a href="mostrar.php" type="button" class="btn btn-md btn-primary"><strong><i class="fa fa-server"></i> Listar</strong></a>

      </div>
    </div>

    <div id="tabla"></div>

    </div>

  </form>

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
  <script src="../../dist/js/anios/grillaActualizar.js"></script>
  <script src="../../dist/js/anios/expresionregular.js"></script>
  <script src="../../dist/js/anios/validacion.js"></script>








</body>
</html>
