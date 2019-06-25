<?php
session_start();
require_once('../../../modelo/m_personas.php');
if (isset($_SESSION['user_id'])) {    
  $user= personas::comprobarUsuario($_SESSION['user_id']);
}else{
  header('Location: /PASANTIAS_2019/vista/pages/v_users/login.php');
}
// require_once('../../../modelo/m_personas.php');
require_once('../../../modelo/m_cuadratura.php');


$resultado= personas::consultar_noEstudiante();
$cuadratura= new cuadratura();
$resultado2= $cuadratura->consultar();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agregar</title>
 <?php include ("../include/head.php"); ?>
   <link rel="stylesheet" href="../../bower_components/datable/dataTables.bootstrap.min.css">
   <link rel="stylesheet" href="../../bower_components/datable/buttons.bootstrap.min.css">
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
        <i class="fa fa-check "></i>Asignar Departamentos.
        <small>Registrar <i class="fa fa-plus"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="">Asignar departamento.</li>
        <li class="active">Agregar Nuevo.</li>
      </ol>
    </section>

    <!-- Main content -->
    <form name="form_cargo" id="form_cargo" action="../../../controlador/c_estudiante.php">

    <section class="content">

      <!-- Default box -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Seleccione los datos por favor: </h3>   <div class="pull-right hidden-xs">
      <?php include ("../include/periodo.php"); ?>
             </div>

        </div>
  <div class="box-body">


    <article class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12 col-md-offset-">

        <div class="form-row">
<h4><strong>Estudiante:</strong></h4>
        <div class="form-group col-md-2">
              <label for="nacionalidad">Nac.</label>
              <select name="nacionalidad" class="form-control form-control-sm" id="nacionalidad" required disabled>
                <option value="V">V- </option>
                <option value="E">E- </option>
              </select>
            </div>

            <div class="form-group col-md-5">
              <label for="cedula">Cedula: </label>
                <div class="input-group">

                  <input type="text" disabled required class="form-control" name="cedula" id="cedula" autocomplete="off"  placeholder="Seleccione" maxlength="8"  data-inputmask='"mask": "99999999"' data-mask>
                  <span class="input-group-btn">
                    <a href="javascript:void(0);" name="buscar" id="buscar" class="btn btn-info" data-toggle="modal" data-target="#modal_repre"><i class="fa fa-search"></i> </a></span>
                </div>
                <span class="">(Presione la lupa para buscar)</span>
            </div>

            <div class="form-group col-md-6">
                  <label for="nombre">Nombres: </label>
                  <input type="text" disabled name="nombre" id="nombre" class="form-control form-control-sm"  autocomplete="off" required>
                  <span class="help-block"></span>
            </div>

             <div class="form-group col-md-6">
                  <label for="apellido">Apellidos: </label>
                  <input type="text" disabled name="apellido" id="apellido" class="form-control form-control-sm"  autocomplete="off" required>
                 <span class="help-block"></span>
            </div>


          <div class="form-group col-md-6">
              <label for="telefono">Año:</label>
              <input type="text" disabled name="anio" id="anio" class="form-control form-control-sm"  autocomplete="off" maxlength="15">
              <span class="help-block">(Opcional.)</span>
          </div>

          <div class="form-group col-md-6">
                <label for="correo">Mencion:</label>
                <input type="text" disabled name="mencion" id="mencion" class="form-control form-control-sm"   autocomplete="off">
                <span class="help-block">(Opcional.)</span>
          </div>

          <div class="col-md-12">
            <label for="">Asignar Departamento:</label>
            <button type="button" name="cua dratura" class="btn btn-primary" data-toggle="modal" data-target="#modal_cuadratura"><i class="fa fa-user-plus"></i> </button>
          </div>
          <input type="hidden" name="cuadratura" id="cuadratura">


          <div class="form-group col-md-4">
            <label for="departamento"> Departamento:</label>
            <input type="text" name="departamento" id="departamento" class="form-control" disabled>
          </div>
          <div class="form-group col-md-4">
            <label for="mencion">Fecha de inicio</label>
            <input type="date" name="mencion" id="mencion" class="form-control">
          </div>
          <div class="form-group col-md-4">
            <label for="periodo">Fecha final</label>
            <input type="date" name="periodo" id="periodo" class="form-control">
          </div>

          <h4 class="col-md-12"><label for="">Tutor academico:</label> </h4>

          <div class="form-group col-md-4">
            <label for="cedulaD">Cedula:</label>
            <input type="text" name="cedulaD" id="cedulaD" class="form-control" disabled>
          </div>
          <div class="form-group col-md-4">
            <label for="nombreD">Nombre:</label>
            <input type="text" name="nombreD" id="nombreD" class="form-control" disabled>
          </div>
          <div class="form-group col-md-4">
            <label for="apellidoD">Apellido:</label>
            <input type="text" name="apellidoD" id="apellidoD" class="form-control" disabled>
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

<!-----------------------------------------------MODAL PARA EL BOTON BUSCAR REPRESENTANTE -------------------------------------------------->

<div class="modal fade bs-example-modal-lg" id="modal_repre" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      <h4 class="modal-title" id="myModalLabel">Buscar datos</h4>
      </div>
      <div class="modal-body">

<div class="panel panel-info">
    <div class="panel-heading">
         </div>

           <div class="panel-body">
              <table class="table table-hover table-bordered" id="example">

                <thead>
                  <tr>
                    <th class="">Cedula</th>
                    <th class="">Nombres</th>
                    <th class="">Apellidos</th>
                    <th class="">Sexo</th>
                    <th class="">Telefono</th>
                    <th class="">Correo</th>
                    <th class="">Acciones</th>
                  </tr>
                </thead>

                <tbody>
                  <?php foreach ($resultado as $value): ?>
                    <tr>
                      <td><?php echo $value->nacionalidad."-".$value->cedula; ?></td>
                      <td><?php echo $value->nombre; ?></td>
                      <td><?php echo $value->apellido; ?></td>
                      <td><?php echo $value->sexo; ?></td>
                      <td><?php echo $value->telefono; ?></td>
                      <td><?php echo $value->correo; ?></td>
                      <td><button type="button" name="selecionar_representante" class="btn btn-sm btn-success" data-dismiss="modal" onclick="elegir_representante(<?php echo $value->id_persona?>);" ><i class="fa fa-check-square-o"></i> </button> </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
         </table>
     </div>
 </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <!----<button type="button" class="btn btn-primary" onclick="validarContacto();">Registrar</button>--->
      </div>
    </div>
  </div>
</div>

<!-----------------------------------------------CIERRE MODAL-------------------------------------------------->


<!-----------------------------------------------MODAL PARA EL BOTON BUSCAR CUADRATURA -------------------------------------------------->

<div class="modal fade bs-example-modal-lg" id="modal_cuadratura" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      <h4 class="modal-title" id="myModalLabel">Buscar datos</h4>
      </div>
      <div class="modal-body">

<div class="panel panel-info">
    <div class="panel-heading">
         </div>

           <div class="panel-body">
              <table class="table table-hover table-bordered" id="example2">
                <thead>
                  <tr>
                    <th>Año</th>
                    <th>Mencion</th>
                    <th>Periodo</th>
                    <th class="">Cedula</th>
                    <th class="">Nombres</th>
                    <th class="">Apellidos</th>
                    <th>Seleccione</th>

                  </tr>
                </thead>
                <tbody>
                  <?php for ($i=0; $i < count($resultado2) ; $i++):?>
                    <tr>
                      <td><?php echo $resultado2[$i]['anio']; ?></td>
                      <td><?php echo $resultado2[$i]['mencion']; ?></td>
                      <td><?php echo $resultado2[$i]['periodo']; ?></td>
                      <td><?php echo $resultado2[$i]['cedula']; ?></td>
                      <td><?php echo $resultado2[$i]['nombre']; ?></td>
                      <td><?php echo $resultado2[$i]['apellido']; ?></td>

                      <td><button type="button" name="selecionar_docente" class="btn btn-sm btn-success" data-dismiss="modal" onclick="elegir_cuadratura(<?php echo $resultado2[$i]['id_cuadratura']?>);" ><i class="fa fa-check-square-o"></i> </button> </td>

                    </tr>
                  <?php endfor; ?>
                </tbody>
         </table>
     </div>
 </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <!----<button type="button" class="btn btn-primary" onclick="validarContacto();">Registrar</button>--->
      </div>
    </div>
  </div>
</div>

<!-----------------------------------------------CIERRE MODAL-------------------------------------------------->


<!-- ./wrapper -->
    <?php include ("../include/plugins.php"); ?>
  <!---<script src="../../dist/js/cargos/filtrado.js"></script>-->
  <script src="../../dist/js/tutor_academico/expresionregular.js"></script>
  <script src="../../dist/js/estudiantes/validacion.js"></script>
  <script src="../../dist/js/tutor_academico/grillaAgregar.js"></script>

  <script src="../../dist/js/estudiantes/seleccion_modales.js"></script>
  <script src="../../dist/js/dire.js"></script>
  <script type="text/javascript">
  	$(document).ready(function(){
  		$('#fecha_nacimiento').change(function(){
  			$.ajax({
  				type:"POST",
  				data:"fecha=" + $('#fecha_nacimiento').val(),
  				url:"../../../modelo/calcularEdad.php",
  				success:function(r){
  					$('#edadCalculada').val(r);
  				}
  			});
  		});
  	});
  </script>
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
     'scrollX': false,
     "language":{
       "url":"../../bower_components/datatables.net/js/Spanish.json"
     }

   });

   $('#example2').DataTable({
     'paging': true,
     'lengthChange': false,
     'searching': true,
     'ordering': true,
     'info': false,
     'autoWidth': true,
     'scrollX': false,
     "language":{
       "url":"../../bower_components/datatables.net/js/Spanish.json"
     }

   });
 });
 </script>

</body>
</html>
