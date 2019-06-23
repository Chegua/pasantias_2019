<?php 
session_start();
require_once('../../../modelo/m_personas.php');
if (isset($_SESSION['user_id'])) {    
  $user= personas::comprobarUsuario($_SESSION['user_id']);
}else{
  header('Location: /PASANTIAS_2019/vista/pages/v_users/login.php');
}

  require_once('../../../modelo/m_estudiantes.php');

  $id=$_REQUEST['id'];

  $resultado=estudiantes::encontrar($id);
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Agregar</title>
	<?php include ("../include/head.php"); ?>
  <link rel="stylesheet" href="../../dist/css/perfil.css">
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

    <div class="box box-warning">
       <div class="box-header with-border">
           <h3 class="" align="center"><i class="fa fa-user"></i> <strong>Datos del estudiante.</strong></h3>
           <p class="info" align="center"><i class="fa fa-eye"></i> En esta sección del sistema se puede visualizar el perfil de un estudiante.</p>
       </div>
       <br>

<form action="../../../controlador/c_estudiante.php" method="post">

    <div class="row">

      <article class="col-xl-9 col-lg-9 col-md-10 col-sm-9 col-xs-12 col-md-offset-1">

          <div class="form-row">
            <div class="sombra">
            </div>
<br>
  <div class="sombra form-group col-md-12">
      <h4 class="" align=""><i class="fa fa-book"></i> <strong>Estudiante.</strong></h4>
 </div>   
            <div class="form-group col-md-12 col-md-offset-">
              <label for="nacionalidad">Foto:</label>
              <?php echo '<img src="../../imagen_estudiantes/'.$resultado[0]['foto'].'" class="img-rounded" width="150" heigth="50" alt="Foto del estudiante">' ?>
            </div>

            <div class="form-group col-md-6">
              <label for="nacionalidad">Nombre:</label>
              <?php echo $resultado[0]['nombre_estudiante']; ?>
            </div>
    

            <div class="form-group col-md-6">
              <label for="nacionalidad">Apellido:</label>
              <?php echo $resultado[0]['apellido_estudiante']; ?>
            </div>

       <div class="form-group col-md-6">
              <label for="nacionalidad">Cedula:</label>
              <?php echo $resultado[0]['cedula_estudiante']; ?>
            </div>

             <div class="form-group col-md-6">
              <label for="nacionalidad">Sexo:</label>
              <?php echo $resultado[0]['sexo_estudiante']; ?>
            </div>
             

            <div class="form-group col-md-6">
              <label for="nacionalidad">Telefono:</label>
              <?php echo $resultado[0]['telefono_estudiante']; ?>
            </div>


            <div class="form-group col-md-6">
              <label for="nacionalidad">Correo:</label>
              <?php echo $resultado[0]['correo_estudiante']; ?>
            </div>


         <div class="form-group col-md-12">
              <label for="nacionalidad">Fecha de nacimiento:</label>
              <?php echo $resultado[0]['fecha_nacimiento']; ?>
         </div>

  <div class="sombra form-group col-md-12"> 
      <h4 class=""><i class="fa fa-users"></i> <strong>Representante.</strong></h4>
  </div>
<br>
          <div class="form-group col-md-6">
              <label for="nacionalidad">Nombre:</label>
              <?php echo $resultado[0]['nombre_representante']; ?>
            </div>

            <div class="form-group col-md-6">
              <label for="nacionalidad">Apellido:</label>
              <?php echo $resultado[0]['apellido_representante']; ?>
            </div>

             <div class="form-group col-md-6">
              <label for="nacionalidad">Cedula:</label>
              <?php echo $resultado[0]['cedula_representante']; ?>
            </div>

            <div class="form-group col-md-6">
              <label for="nacionalidad">Telefono:</label>
              <?php echo $resultado[0]['telefono_representante']; ?>
            </div>

            <div class="form-group col-md-6">
              <label for="nacionalidad">Correo:</label>
              <?php echo $resultado[0]['correo_representante']; ?>
            </div>

            <div class="form-group col-md-6">
              <label for="nacionalidad">Parentesco:</label>
              <?php echo $resultado[0]['parentesco']; ?>
            </div>





     </div>  
    </article>
    </div>
<hr>


    <div class="row">
      <div class="col-md-12 col-sm-offset-1">

        <a href="mostrar.php" type="button" class="btn btn-flat btn-md btn-primary"><strong><i class="fa fa-server"></i> Listar</strong></a>
      </div>
    </div>
    <br>
</form>
 <div id="tabla"></div>

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
  <script src="../../dist/js/departamento/grillaAgregar.js"></script>
	<script src="../../dist/js/dire.js"></script>



</body>
</html>
