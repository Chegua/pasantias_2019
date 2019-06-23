<?php
session_start();
require_once('../../../modelo/m_personas.php');
if (isset($_SESSION['user_id'])) {    
  $user= personas::comprobarUsuario($_SESSION['user_id']);
}else{
  header('Location: /PASANTIAS_2019/vista/pages/v_users/login.php');
}

require_once('../../../modelo/m_cargos.php');
require_once('../../../modelo/m_empresas.php');
// require_once('../../../modelo/m_personas.php');

$cargos= new cargos();
$resultado= $cargos->consultar();

$empresa= new empresas();
$resultado2= $empresa->consultar2();

$resultado3= personas::consultar();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Agregar</title>
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
        <i class="fa fa-graduation-cap "></i> Tutor empresarial.
        <small>Registrar <i class="fa fa-plus"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Personas</a></li>
        <li class="">Tutor empresarial.</li>
        <li class="active">Agregar Nuevo.</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="box box-warning">


       <div class="box-header with-border">
          <h3 class="box-title">Datos del tutor: </h3>       
          <div class="pull-right hidden-xs">
             <?php include ("../include/periodo.php"); ?>
           </div>
       </div>
       <br>

<form name="form_cargo" id="form_cargo" action="../../../controlador/c_tutores_empresariales.php">

    <div class="row box-body">
      <article class="col-xl-9 col-lg-10 col-md-12 col-sm-9 col-xs-12 col-md-offset-">
        <div class="form-row">

              <div class="form-group col-md-2">
              <label for="nacionalidad">Nac.</label>
              <select name="nacionalidad" class="form-control form-control-sm" id="nacionalidad" required>
                <option value="V">V- </option>
                <option value="E">E- </option>
              </select>
            </div>

            <div class="form-group col-md-3">
              <label for="cedula">Cedula: </label>
                <div class="input-group">
                  <input type="text" required class="form-control" name="cedula" id="cedula" autocomplete="off"  placeholder="Ingrese la cedula" maxlength="8"  data-inputmask='"mask": "99999999"' data-mask>
                  <span class="input-group-btn">
                    <!---<a href="javascript:void(0);" name="buscar" id="buscar" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-search"></i> </a>-->
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


          <div class="col-md-12">
            <button type="button" name="buscar_emp" class="btn btn-info" data-toggle="modal" data-target="#emp_modal"> <strong>Empresa</strong> <i class="fa fa-search-plus"></i> </button>

          </div>

           <div class="form-group col-md-4">
             <label>Empresas: </label>
            <input type="text" name="emp" id="emp" class="form-control" disabled>
           </div>

           <div class="form-group col-md-4">
             <label>RIF:</label>
             <input type="text" name="rif" id="rif" class="form-control" disabled>
           </div>

           <div class="form-group col-md-4">
             <label for="">Areas</label>
             <select class="form-control" name="area" id="area">

             </select>
           </div>
            <div class="form-group col-md-6">
              <label for="cargo">Cargo: *</label>
                <select name="cargo" id="cargo" class="form-control">
                  <option value="">Seleccione...</option>
                  <?php for ($i=0; $i <count($resultado); $i++) { ?>
                    <option value="<?php echo $resultado[$i]['id_cargo']?>"> <?php echo $resultado[$i]['cargo']?></option>
                 <?php }?>
                </select>
            </div>


        <div class="form-group col-md-6">
          <label for="estatus">Estatus:</label>
            <select name="estatus" id="estatus" class="form-control">
               <option value="Activo">Activo</option>
              <option value="Inactivo">Inactivo</option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label>Fecha Inicio:</label>
              <div class="input-group">
                <div class="input-group-addon">
                   <i class="fa fa-calendar"></i>
                </div>
                  <input type="date" class="form-control" name="fecha_ini" id="fecha_ini">
              </div>
        </div>

        <div class="form-group col-md-6">
            <label>Fecha Final:</label>
             <div class="input-group">
               <div class="input-group-addon">
                 <i class="fa fa-calendar"></i>
                </div>
                    <input type="date" class="form-control" name="fecha_fin" id="fecha_fin">
             </div>
                <!-- /.input group -->
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
 <div id="tabla" col-md-12></div>


</div>
</section>
</div>
<footer class="main-footer">
        <?php include ("../include/footer.php"); ?>
</footer>
</div>

<!-----------------------------------------------MODAL PARA EL BOTON BUSCAR PERSONA -------------------------------------------------->

<div class="modal fade bs-example-modal-lg" id="per" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                  <th class="col-md-1">N°</th>
                  <th class="col-md-1">Cedula</th>
                  <th class="col-md-1">Nombres</th>
                  <th class="col-md-1">Apellidos</th>
                  <th class="col-md-1">Sexo</th>
                  <th class="col-md-1">Correo</th>
                  <th class="col-md-1">Telefono</th>
                  <th class="col-md-1">Acciones</th>
                </thead>

                   <tbody>
                    <?php for ($i=0; $i <count($resultado3) ; $i++) { ?>
                     <tr>
                        <td><?php echo $i+1?></td>
                        <td><?php echo $resultado3[$i]['cedula']; ?></td>
                        <td><?php echo $resultado3[$i]['nombre']; ?></td>
                        <td><?php echo $resultado3[$i]['apellido']; ?></td>
                        <td><?php echo $resultado3[$i]['sexo']; ?></td>
                        <td><?php echo $resultado3[$i]['correo']; ?></td>
                        <td><?php echo $resultado3[$i]['telefono']; ?></td>
                        <td>
                         <button type="button" title="Perfil" onClick="window.location.href='perfil.php<?php echo '?id='?><?php echo $key->id_estudiante?>'" class="btn btn-sm btn-success btn-sm"><span class="fa fa-check"></span></button>
                        </td>
                  </tr>
                <?php  } ?>
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

<!-----------------------------------------------MODAL PARA EL BOTON BUSCAR EMPRESA -------------------------------------------------->

<div class="modal fade bs-example-modal-lg" id="emp_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      <h4 class="modal-title" id="myModalLabel">Buscar datos</h4>
      </div>
      <div class="modal-body">
        <div class="panel panel-primary">
            <div class="panel-heading">
              <h4>Elija la empresa en que labora</h4>
            </div>
            <div class="panel-body">
                 <table class="table table-hover table-bordered" id="example2">
                   <thead>
                     <tr>
                       <th class="">Nombre</th>
                       <th class="">RIF</th>
                       <th>Seleccionar</th>
                     </tr>
                   </thead>
                   <tbody>
                     <?php $compara=null;
                     for ($i=0; $i < count($resultado2) ; $i++):?>
                     <?php if ($resultado2[$i]['id_empresa']!=$compara):?>
                     <tr>
                        <td><?php echo $resultado2[$i]['empresa'];?></td>
                        <td><?php echo $resultado2[$i]['tipo']."-".$resultado2[$i]['rif']; ?></td>

                        <td><button type="button" name="selecionar_empresa" class="btn btn-sm btn-success" data-dismiss="modal" onclick="elegir_empresa(<?php echo $resultado2[$i]['id_empresa']?>);" ><i class="fa fa-check-square-o"></i> </button> </td>
                      </tr>
                      <?php endif;
                      $compara= $resultado2[$i]['id_empresa']; ?>
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
  <!-- <script src="../../dist/js/tutor_academico/filtrado.js"></script>
  <script src="../../dist/js/tutor_academico/expresionregular.js"></script>
  <script src="../../dist/js/tutor_academico/validacion.js"></script> -->
  <script src="../../dist/js/tutores_empresariales/modales.js"></script>
  <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
 $(document).ready(function(){
   $('#example').DataTable({
     'paging': true,
     'lengthChange': true,
     'searching': true,
     'ordering': true,
     'info': false,
     'autoWidth': true,
     'scrollX': true,
     "language":{
       "url":"../../bower_components/datatables.net/js/Spanish.json"
     }
   });

   $('#example2').DataTable({
     'paging': true,
     'lengthChange': true,
     'searching': true,
     'ordering': true,
     'info': false,
     'autoWidth': true,

     "language":{
       "url":"../../bower_components/datatables.net/js/Spanish.json"
     }
   });

 });
 </script>



</body>
</html>
