<?php
require_once('../../../modelo/m_departamentos.php');
require_once('../../../modelo/m_cargos.php');

$departamento= new departamentos();
$resultadodep= $departamento->consultar();

$cargo= new cargos();
$resultadocarg= $cargo->consultar();

 ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Agregar</title>
  <?php include ("../include/head.php"); ?>
  <link rel="stylesheet" href="../../plugins/alertify/css/alertify.min.css">
  <link rel="stylesheet" href="../../plugins/alertify/css/themes/bootstrap.min.css">
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
        <i class="fa fa-graduation-cap "></i> Personal adm.
        <small>Registrar <i class="fa fa-plus"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Personas</a></li>
        <li class="">Personal adm.</li>
        <li class="active">Agregar Nuevo.</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <!-- <div class="box box-warning">
       <div class="box-header with-border">
           <h3 class="" align="center"><i class="fa fa-save"></i> <strong>Nuevo Personal administrativo.</strong></h3>
       <p class="info" align="center"><i class="fa fa-eye"></i>
        Todos los campos marcados con un (*) son obligatorios.</p>
       </div>
       <br> -->

       <!-- Default box -->
       <div class="box box-warning">
         <div class="box-header with-border">
           <h3 class="box-title">Datos del administrativo: </h3>   <div class="pull-right hidden-xs">
       <?php include ("../include/periodo.php"); ?>
              </div>

         </div>
     <div class="box-body">

<form name="registrar_adm" id="registrar_adm" method="post" action="../../../controlador/c_personaladm.php">


    <div class="row">
      <article class="col-xl-9 col-lg-9 col-md-10 col-sm-9 col-xs-12 col-md-offset-1">
        <div class="form-row">

            <div class="form-group col-md-2">
              <label for="nacionalidad">Nac.</label>
              <select name="nacionalidad" class="form-control form-control-sm" id="nacionalidad" required>
                <option value="V">V</option>
                <option value="E">E</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label for="cedula">Cedula: *</label>
              <input type="text" class="form-control form-control-sm" name="cedula" id="cedula" autocomplete="off"  placeholder="Ingrese la cedula" maxlength="8">
            <span class="help-block">(No se permiten letras ni simbolos.)</span>
            </div>



            <div class="form-group col-md-6">
              <label for="nombre">Nombres: *</label>
              <input type="text" name="nombre" id="nombre" class="form-control form-control-sm" placeholder="Ingrese el nombre" autocomplete="off" required>
            <span class="help-block">(No se permiten numeros ni simbolos.)</span>
            </div>

             <div class="form-group col-md-6">
              <label for="apellido">Apellidos: *</label>
              <input type="text" name="apellido" id="apellido" class="form-control form-control-sm" placeholder="Ingrese el nombre" autocomplete="off" required>
            <span class="help-block">(No se permiten numeros ni simbolos.)</span>
            </div>


            <div class="form-group col-md-12">
              <label for="sexo">Sexo: *</label><br>
                <input type="radio" name="sexo" id="sexo" value="Masculino" class="minimal" checked> Masculino
                <input type="radio" name="sexo" id="sexo" value="Femenino" class="minimal-red"> Femenino
                <span class="help-block">(Selecciononado.)</span>
            </div>


            <div class="form-group col-md-6">
                <label for="telefono">Telefono:</label>
                <input type="text" name="telefono" id="telefono" class="form-control form-control-sm" placeholder="Ingrese el numero" data-inputmask='"mask": "(9999) 999-9999"' data-mask autocomplete="off" maxlength="15">
                <span class="help-block">(Opcional.)</span>
            </div>

            <div class="form-group col-md-6">
                  <label for="correo">Correo:</label>
                  <input type="text" name="correo" id="correo" class="form-control form-control-sm" placeholder="Ingrese el correo"  autocomplete="off">
                  <span class="help-block">(Opcional.)</span>
            </div>


            <div class="form-group col-md-6">
              <label for="departamento">Departamento: *</label>
              <select name="departamento" class="form-control form-control-sm" id="departamento" required>
                <option value="">Seleccione...</option>
                <?php for ($i=0; $i < count($resultadodep); $i++): ?>
                  <option value="<?php echo $resultadodep[$i]['id_departamento']; ?>"><?php echo $resultadodep[$i]['departamento'];?></option>
                <?php endfor; ?>
              </select>
            <span class="help-block">(Seleccione por favor.)</span>
            </div>


            <div class="form-group col-md-6">
              <label for="cargo">Cargo: *</label>
              <select name="cargo" class="form-control form-control-sm" id="cargo" required>
                <option value="">Seleccione...</option>
                <?php for ($i=0; $i < count($resultadocarg); $i++): ?>
                  <option value="<?php echo $resultadocarg[$i]['id_cargo']; ?>"><?php echo $resultadocarg[$i]['cargo']; ?></option>
                <?php endfor; ?>
              </select>
            <span class="help-block">(Seleccione por favor.)</span>
            </div>

            <div class="form-group col-md-4">
                <label for="">Estatus: </label>
                <select class="form-control" name="estatus_docente" id="estatus" required>
                  <option value="Activo">Activo</option>
                  <option value="Inactivo">Inactivo</option>
                </select>
          </div>

          <div class="form-group col-md-4">
              <label>Fecha Inicio:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-calendar"></i>
                  </div>
                    <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" >
                </div>
                    <span class="help-block"></span>
          </div>

          <div class="form-group col-md-4">
              <label>Fecha Final:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-calendar"></i>
                  </div>
                    <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" >
                </div>
                    <span class="help-block"></span>
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
  <!---<script src="../../dist/js/cargos/filtrado.js"></script>-->
<!-- <script src="../../dist/js/personaladm/expresionregular.js"></script>
<script src="../../dist/js/personaladm/validacion.js"></script> -->
<!-- <script src="../../dist/js/personaladm/grillaAgregar.js"></script> -->
<!-- <script src="../../dist/js/personaladm/app.js"></script> -->

</body>
</html>
