<?php
require_once('../../../modelo/m_menciones.php');

$mencion= new menciones();
$resultado= $mencion->consultar();
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
        <i class="fa fa-institution "></i> Empresas.
        <small>Registrar <i class="fa fa-plus"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Empresas</a></li>
        <li class="active">Agregar Nuevo.</li>
      </ol>
    </section>

    <!-- Main content -->
    <form name="form_cargo" id="form_cargo" action="../../../controlador/c_empresa.php">

    <section class="content">

      <!-- Default box -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Datos de la empresa: </h3>           <div class="pull-right hidden-xs">
      <?php include ("../include/periodo.php"); ?>
             </div>

        </div>
  <div class="box-body">


    <article class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12 col-md-offset-">

        <div class="form-row">

              <div class="form-group col-md-2">
                <label for="tipo">Tipo: </label>
                <select name="tipo" class="form-control form-control-sm" id="tipo" required>
                  <option value="J">J</option>
                  <option value="G">G</option>
                  <option value="O">O</option>
                </select>
              </div>

              <div class="form-group col-md-4">
                <label for="rif">RIF: </label>
                <input type="text" name="rif" id="rif" class="form-control form-control-sm" placeholder="Ingrese el rif" autocomplete="off"
                data-inputmask='"mask":"99999999-9"'  data-mask maxlength="11" required
                onkeypress="return solonumeros(event)" onpaste="return false">


              <span class="help-block">(No se permiten numeros ni simbolos.)</span>
              </div>

                <div class="form-group col-md-6">

                  <label for="rif">Nombre: </label>
                  <div class="input-group">

                    <input type="text" class="form-control" name="nombre" id="nombre" autocomplete="off"  placeholder="Ingrese nombre de la empresa"  required
                    onkeypress="return soloLetras(event)" onpaste="return false">


                    <span class="input-group-btn"><button type="button" name="buscar" id="buscar" class="btn btn-info"><i class="fa fa-search"></i> </button></span>
                  </div>
                 <span class="help-block">(No se permiten letras ni simbolos.)</span>

                </div>
                <div id="grilla">
                     <p>Resultados que coinciden:</p>
                     <hr>
                     <table class="table table-bordered" id="">

                       <thead>
                         <tr>
                           <th>Empresa</th>
                           <th>RIF</th>
                         </tr>
                       </thead>
                       <tbody id="filtrar"></tbody>
                     </table>
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


             <div class="form-group col-md-12">
              <label for="especialidad">Areas/Especialidades:  </label>

                <select class="form-control select2" multiple="multiple" data-placeholder="Seleccione..." name="mencion[]" required>
                  <?php for ($i=0; $i < count($resultado); $i++): ?>
                    <option value="<?php echo $resultado[$i]['id_mencion'];?>"> <?php echo $resultado[$i]['mencion']; ?></option>
                  <?php endfor; ?>

                </select>
              </div>


              <div class="form-group col-md-3">
                <label for="estado">Estados:</label>
                <select name="estado" class="form-control form-control-sm select2" id="estado" required>
                  <option value="">Seleccione...</option>
                </select>
              </div>

              <div class="form-group col-md-3">
                <label for="municipio">Municipios:</label>
                <select name="municipio" class="form-control form-control-sm select2" id="municipio" required>
                  <option value="">Seleccione...</option>
                </select>
              </div>

              <div class="form-group col-md-3">
                <label for="parroquia">Parroquias:</label>
                <select name="parroquia" class="form-control form-control-sm select2" id="parroquia" required>
                  <option value="">Seleccione...</option>
                </select>
              </div>

              <div class="form-group col-md-3">
                <label for="comunidad">Comunidad:</label>
                <select name="comunidad" class="form-control form-control-sm select2" id="comunidad" required>
                  <option value="">Seleccione...</option>
                </select>
              </div>

</div>
      </article>
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
<script src="../../dist/js/empresas/expresionregular.js"></script>
<script src="../../dist/js/empresas/validacion.js"></script>
<script src="../../dist/js/empresas/validar2.js"></script>

<script src="../../dist/js/empresas/filtrado.js"></script>
<script src="../../dist/js/dire.js"></script>

</body>
</html>
