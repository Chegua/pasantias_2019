<?php
session_start();
require_once('../../../modelo/m_personas.php');
if (isset($_SESSION['user_id'])) {    
  $user= personas::comprobarUsuario($_SESSION['user_id']);
}else{
  header('Location: /PASANTIAS_2019/vista/pages/v_users/login.php');
}

require_once('../../../modelo/m_cargos.php');
// require_once('../../../modelo/m_personas.php');

$cargos= new cargos();
$resultado= $cargos->consultar_academicos();


$resultado2= personas::consultar();
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
        <i class="fa fa-graduation-cap "></i> Docentes.
        <small>Registrar <i class="fa fa-plus"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Personas</a></li>
        <li class="">Docentes.</li>
        <li class="active">Agregar Nuevo.</li>
      </ol>
    </section>

    <!-- Main content -->
    <form name="form_cargo" id="form_cargo" action="../../../controlador/c_historial_academico.php">

    <section class="content">

      <!-- Default box -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Datos del docente: </h3>           <div class="pull-right hidden-xs">
      <?php include ("../include/periodo.php"); ?>
             </div>

        </div>
  <div class="box-body">


    <article class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12 col-md-offset-">

        <div class="form-row">

              <div class="form-group col-md-2">
              <label for="nacionalidad">Nac.</label>
              <select name="nacionalidad" class="form-control form-control-sm" id="nacionalidad" required>
                <option value="V">V</option>
                <option value="E">E</option>
              </select>
            </div>

            <div class="form-group col-md-3">
              <label for="cedula">Cedula: </label>
                <div class="input-group">
                  <input type="text" required class="form-control" name="cedula" id="cedula" autocomplete="off"  placeholder="Ingrese la cedula" maxlength="8"  data-inputmask='"mask": "99999999"' data-mask>
                  <span class="input-group-btn">
                    <a href="javascript:void(0);" name="buscar" id="buscar" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-search"></i> </a>
                  </span>
                </div>
                <span class="help-block"></span>
            </div>

            <div class="form-group col-md-3">
                  <label for="nombre">Nombres: </label>
                  <input type="text" name="nombre" id="nombre" class="form-control form-control-sm" placeholder="Ingrese el nombre" autocomplete="off" required>
                  <span class="help-block"></span>
            </div>

             <div class="form-group col-md-4">
                  <label for="apellido">Apellidos: </label>
                  <input type="text" name="apellido" id="apellido" class="form-control form-control-sm" placeholder="Ingrese el apellido" autocomplete="off" required>
                 <span class="help-block"></span>
            </div>


          <div class="form-group col-md-4">
                <label for="telefono">Telefono:</label>
                <input type="text" name="telefono" id="telefono" class="form-control form-control-sm" placeholder="Ingrese el numero" data-inputmask='"mask": "(9999) 999-9999"' data-mask autocomplete="off" maxlength="15">
            </div>

            <div class="form-group col-md-4">
              <label for="sexo">Sexo: </label><br>
                <select name="sexo" id="sexo" class="form-control">
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino">Femenino</option>
                </select>
            </div>


          <div class="form-group col-md-4">
                <label for="correo">Correo:</label>
                <input type="text" name="correo" id="correo" class="form-control form-control-sm" placeholder="Ingrese el correo"  autocomplete="off">
               <span class="help-block"></span>
          </div>


          <div class="form-group col-md-4">
              <label for="">Estatus de docente: </label>
              <select class="form-control" name="estatus_docente" id="estatus_docente" required>
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
                  <input type="date" class="form-control" name="fecha_ini_d" id="fecha_ini_d" >
              </div>
                  <span class="help-block"></span>
        </div>

        <div class="form-group col-md-4">
            <label>Fecha Final:</label>
              <div class="input-group">
                <div class="input-group-addon">
                   <i class="fa fa-calendar"></i>
                </div>
                  <input type="date" class="form-control" name="fecha_fin_d" id="fecha_fin_d" >
              </div>
                  <span class="help-block"></span>
        </div>

<div class="with-border">
          <h4 class="box-title">Datos de Tutor: </h4>
</div>
        <div class="form-group col-md-4">
              <label for="">Estatus de tutor: </label>
              <select class="form-control" name="estatus_tutor" id="estatus_tutor" required>
                <option value="">Selecione...</option>
                <option value="Si">Tutor</option>
                <option value="No">No aplica</option>
              </select>
        </div>


        <div class="form-group col-md-4">
          <label for="estatus">Estatus:</label>
            <select name="estatus" id="estatus" class="form-control" disabled="">
              <option value="Seleccione">...</option>
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
                  <input type="date" class="form-control" name="fecha_ini" id="fecha_ini" disabled>
              </div>
                  <span class="help-block"></span>
        </div>

        <div class="form-group col-md-4">
            <label>Fecha Final:</label>
              <div class="input-group">
                <div class="input-group-addon">
                   <i class="fa fa-calendar"></i>
                </div>
                  <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" disabled>
              </div>
                  <span class="help-block"></span>
        </div>


      </article>
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
<!-- ./wrapper -->
    <?php include ("../include/plugins.php"); ?>
  <!---<script src="../../dist/js/cargos/filtrado.js"></script>-->
  <script src="../../dist/js/tutor_academico/expresionregular.js"></script>
  <script src="../../dist/js/tutor_academico/validacion.js"></script>

  <script src="../../dist/js/tutor_academico/grillaAgregar.js"></script>
  <script src="../../dist/js/dire.js"></script>
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
     'scrollX': true,
     "language":{
       "url":"../../bower_components/datatables.net/js/Spanish.json"
     }

   });
 });
 </script>

</body>
</html>
