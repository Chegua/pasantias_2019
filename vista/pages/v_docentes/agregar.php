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
  <meta charset="UTF-8">
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

    </section>

    <!-- Main content -->
    <section class="content container-fluid">
  <?php include ("../include/periodo.php"); ?>

    <div class="box box-warning">
       <div class="box-header with-border">
           <h3 class="" align="center"><i class="fa fa-save"></i> <strong>Nuevo Docentos.</strong></h3>
       <p class="info" align="center"><i class="fa fa-eye"></i>
        Todos los campos marcados con un (*) son obligatorios.</p>
       </div>
       <br>

<form name="form_cargo" id="form_cargo" action="../../../controlador/c_personaladm.php">

    <div class="row">
      <article class="col-xl-9 col-lg-9 col-md-10 col-sm-9 col-xs-12 col-md-offset-1">
        <div class="form-row">

            <div class="form-group col-md-2">
              <label for="nacionalidad">Nac.</label>
              <select name="nacionalidad" disabled class="form-control form-control-sm" id="nacionalidad" required>
                <option value="V">V- </option>
              </select>
            </div>

            <div class="form-group col-md-6">

              <label for="cedula">Cedula: *</label>
              <div class="input-group">

                <input type="text" class="form-control" name="cedula" id="cedula" autocomplete="off"  placeholder="Ingrese la cedula" maxlength="8" required>
                <span class="input-group-btn"><button type="button" name="buscar" id="buscar" class="btn btn-info"><i class="fa fa-search"></i> </button></span>
              </div>
             <span class="help-block">(No se permiten letras ni simbolos.)</span>

            </div>

            <div class="form-group col-md-6">
              <label for="nombre">Nombres: *</label>
              <input type="text" name="nombre" id="nombre" class="form-control form-control-sm" placeholder="Ingrese el nombre" autocomplete="off" required>
            <span class="help-block">(No se permiten numeros ni simbolos.)</span>
            </div>

             <div class="form-group col-md-6">
              <label for="apellido">Apellidos: *</label>
              <input type="text" name="apellido" id="apellido" class="form-control form-control-sm" placeholder="Ingrese el apellido" autocomplete="off" required>
            <span class="help-block">(No se permiten numeros ni simbolos.)</span>
            </div>

            <div class="form-group col-md-12">
              <label for="sexo">Sexo: </label>
                <input type="radio" name="sexo" id="sexo" value="Masculino" class="minimal" checked> Masculino
                <input type="radio" name="sexo" id="sexo" value="Femenino" class="minimal-red"> Femenino
                <span class="help-block">(Seleccione por favor.)</span>
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
              <label for="">Estatus de tutor</label>
              <select class="form-control" name="estatus_tutor">
                <option value="">Selecione...</option>
                <option value="tutor">Tutor</option>
                <option value="no_aplica">No aplica</option>
              </select>

            </div>

            <div class="form-group col-md-8">
                <label>Fecha laboral:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservation" readonly>
                </div>
                <!-- /.input group -->
              </div>

              <div class="form-group col-md-4">
                <label for="" class="">Estatus: </label>
                <div class="">
                  <input type="radio" name="estatus" value="Activo" class="flat-red" checked>Activo
                  <input type="radio" name="estatus" value="Inactivo" class="flat-red">Inactivo
                </div>
              </div>

</div>
      </article>
</div>


<hr>
    <div class="row">
      <div class="col-md-12 col-sm-offset-3">

        <button type="submit" name="opcion" id="btnvalidar" value="registrar" class="btn btn-primary btn-flat margin"><i class="fa fa-save"></i> <strong>Registrar</strong></button>

        <button type="button" class="btn btn-primary btn-flat margin"><strong><i class="fa  fa-spinner"></i> Limpiar</strong></button>

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
  <!---<script src="../../dist/js/cargos/filtrado.js"></script>-->
<script src="../../dist/js/personaladm/expresionregular.js"></script>
<script src="../../dist/js/personaladm/validacion.js"></script>
<script src="../../dist/js/personaladm/grillaAgregar.js"></script>

</body>
</html>
