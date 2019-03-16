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
           <h3 class="" align="center"><i class="fa fa-save"></i> <strong>Nuevo Personal administrativo.</strong></h3>
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


            <div class="form-group col-md-6">
              <label for="sexo">Sexo: *</label>
              <select name="sexo" class="form-control form-control-sm" id="sexo" required>
                <option value="">Seleccione...</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
              </select>
            <span class="help-block">(Seleccione por favor.)</span>

            </div>


            <div class="form-group col-md-6">
              <label for="telefono">Telefono:</label>
              <input type="text" name="telefono" id="telefono" class="form-control form-control-sm" placeholder="Ingrese el numero" autocomplete="off" maxlength="11">
            <span class="help-block">(Opcional.)</span>
            </div>

            <div class="form-group col-md-12">
              <label for="correo">Correo:</label>
              <input type="text" name="correo" id="correo" class="form-control form-control-sm" placeholder="Ingrese el correo"  autocomplete="off">
            <span class="help-block">(Opcional.)</span>
            </div>

     
            <div class="form-group col-md-6">
              <label for="departamento">Departamento: *</label>
              <select name="departamento" class="form-control form-control-sm" id="departamento" required>
                <option value="">Seleccione...</option>
                <?php for ($i=0; $i < count($resultadodep); $i++): ?>
                  <option value="<?php echo $resultadodep[$i]['id_departamento']; ?>"><?php echo $resultadodep[$i]['nombre_departamento'];?></option>
                <?php endfor; ?>
              </select>
            <span class="help-block">(Seleccione por favor.)</span>
            </div>


            <div class="form-group col-md-6">
              <label for="cargo">Cargo: *</label>
              <select name="cargo" class="form-control form-control-sm" id="cargo" required>
                <option value="">Seleccione...</option>
                <?php for ($i=0; $i < count($resultadocarg); $i++): ?>
                  <option value="<?php echo $resultadocarg[$i]['id_cargos']; ?>"><?php echo $resultadocarg[$i]['cargo']; ?></option>
                <?php endfor; ?>
              </select>
            <span class="help-block">(Seleccione por favor.)</span>
            </div>


          <div class="form-group col-md-4">
              <label for="estado">Estado: *</label>
              <select name="estado" class="form-control form-control-sm" id="estado" required>
                <option value="">Seleccione...</option>
              </select>
            <span class="help-block">(Seleccione por favor.)</span>
            </div>

            <div class="form-group col-md-4">
              <label for="municipio">Municipio: *</label>
              <select name="municipio" class="form-control form-control-sm" id="municipio" required>
                <option value="">Seleccione...</option>
              </select>
              <span class="help-block">(Seleccione por favor.)</span>
            </div>

            <div class="form-group col-md-4">
              <label for="parroquia">Parroquia: *</label>
              <select name="parroquia" class="form-control form-control-sm" id="parroquia" required>
                <option value="">Seleccione...</option>
              </select>
              <span class="help-block">(Seleccione por favor.)</span>
            </div>

            <div class="form-group col-md-12">
              <label for="direccion">Dirección: *</label>
              <input type="text" name="direccion" id="direccion" class="form-control form-control-sm" placeholder="Ingrese la direccion" autocomplete="off" required>
              <span class="help-block">(Ingrese una direccion por favor)</span>
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
<script src="../../dist/js/dire.js"></script>




</body>
</html>