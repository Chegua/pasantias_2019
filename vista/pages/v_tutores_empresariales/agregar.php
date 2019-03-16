<?php
require_once('../../../modelo/m_cargos.php');
require_once('../../../modelo/m_empresas.php');

require_once('../../../modelo/m_personas.php');

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
  <?php include ("../include/head.php"); ?>
  <link rel="stylesheet" href="../../dist/css/estilos.css">
  <link rel="stylesheet" href="../../dist/css/icono_css.css">
  <link rel="stylesheet" href="../../bower_components/datable/dataTables.bootstrap.min.css">

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
           <h3 class="" align="center"><i class="fa fa-save"></i> <strong>Tutores Empresariales.</strong></h3>
       <p class="info" align="center"><i class="fa fa-eye"></i>
        Todos los campos marcados con un (*) son obligatorios.</p>
       </div>
       <br>

<form name="form_cargo" id="form_cargo" action="../../../controlador/c_tutores_empresariales.php">

    <div class="row">
      <article class="col-xl-9 col-lg-10 col-md-10 col-sm-9 col-xs-12 col-md-offset-1">
        <div class="form-row">

  <div class="panel panel-info">
    <div class="panel-heading">
      <h5><i class="fa fa-user"></i> <strong>Datos personales.</strong></h5>
    </div>

    <div class="panel-body">

      <div class="form-group col-md-2">
              <label for="nacionalidad">Nac.</label>
              <select name="nacionalidad" class="form-control form-control-sm" id="nacionalidad" required>
                <option value="V-">V- </option>
                <option value="E-">E- </option>
              </select>
            </div>

            <div class="form-group col-md-4">
              <label for="cedula">Cedula: *</label>
                <div class="input-group">

                  <input type="text" required class="form-control" name="cedula" id="cedula" autocomplete="off"  placeholder="Ingrese la cedula" maxlength="8" >
                  <span class="input-group-btn"><a href="javascript:void(0);" name="buscar" id="buscar" class="btn btn-info" data-toggle="modal" data-target="#per"><i class="fa fa-search"></i> </a></span>
                </div>
                <span class="help-block">(No se permiten letras ni simbolos.)</span>
            </div>

            <div class="form-group col-md-4">
                  <label for="nombre">Nombres: *</label>
                  <input type="text" name="nombre" id="nombre" class="form-control form-control-sm" placeholder="Ingrese el nombre" autocomplete="off" required>
                  <span class="help-block">(No se permiten numeros ni simbolos.)</span>
            </div>

             <div class="form-group col-md-4">
                  <label for="apellido">Apellidos: *</label>
                  <input type="text" name="apellido" id="apellido" class="form-control form-control-sm" placeholder="Ingrese el apellido" autocomplete="off" required>
                 <span class="help-block">(No se permiten numeros ni simbolos.)</span>
            </div>

            <div class="form-group col-md-6">
              <label for="sexo">Sexo: *</label><br>
                <input type="radio" name="sexo" id="sexo" value="Masculino" class="minimal" checked> Masculino
                <input type="radio" name="sexo" id="sexo" value="Femenino" class="minimal-red"> Femenino
                <span class="help-block">(Selecciononado.)</span>
            </div>

            <table class="table table-bordered" id="grilla">
              <thead>
                <tr>
                  <th>Cedula</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Tutor</th>
                  <th>Estatus</th>
                </tr>
              </thead>
              <tbody id="filtrar"></tbody>
            </table>

    </div>
  </div>


  <div class="panel panel-info">
    <div class="panel-heading">
      <h5><i class="fa fa-user"></i> <strong> Contacto</strong></h5>
    </div>
    <div class="panel-body">

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

    </div>
  </div>

    <div class="panel panel-info">
      <div class="panel-heading">
        <h5><i class="fa fa-user"></i> <strong> Datos empresariales</strong></h5>
      </div>
        <div class="panel-body">

          <div class="col-md-12">
            <button type="button" name="buscar_emp" class="btn btn-info" data-toggle="modal" data-target="#emp_modal">Buscar empresa <i class="fa fa-search-plus"></i> </button>

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
              <span class="help-block">(Seleccione por favor.)</span>
            </div>

        <div class="form-group col-md-12">
            <label for="Estatus">Estatus:  </label>
              <input type="radio" name="estatus" id="estatus1" class="flat-red" value="Activo"  >Activo
               <input type="radio" name="estatus" id="estatus2" class="flat-red" value="Inactivo"   >Inactivo
               <span class="help-block">(Opcional.)</span>
        </div>

        <div class="form-group col-md-4">
            <label>Fecha Inicio:</label>
              <div class="input-group">
                <div class="input-group-addon">
                   <i class="fa fa-calendar"></i>
                </div>
                  <input type="date" class="form-control" name="fecha_ini" id="fecha_ini">
              </div>
                  <span class="help-block">(Opcional.)</span>
        </div>

        <div class="form-group col-md-4">
            <label>Fecha Final:</label>
             <div class="input-group">
               <div class="input-group-addon">
                 <i class="fa fa-calendar"></i>
                </div>
                    <input type="date" class="form-control" name="fecha_fin" id="fecha_fin">
             </div>
                    <span class="help-block">(Opcional.)</span>
                <!-- /.input group -->
        </div>
    </div>
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
