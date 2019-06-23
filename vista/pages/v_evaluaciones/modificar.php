<?php
session_start();
require_once('../../../modelo/m_personas.php');
if (isset($_SESSION['user_id'])) {    
  $user= personas::comprobarUsuario($_SESSION['user_id']);
}else{
  header('Location: /PASANTIAS_2019/vista/pages/v_users/login.php');
}

  require_once('../../../modelo/m_departamentos.php');
   $id=$_REQUEST['id'];

  $departamento= new departamentos();

  $resultado=$departamento->encontrar($id);
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
                    <h1>
                        <i class="fa fa-copy"></i> Evaluaciones.
                        <small>Modificar <i class="fa fa-pencil"></i></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                        <li><a href="#">Mantenimiento</a></li>
                        <li class="active">Evaluaciones.</li>
                        <li class="active">Modificar.</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content container-fluid">

                    <form action="../../../controlador/c_departamento.php" method="get">
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h3 class="box-title">Datos de la evaluacion: </h3>
                                <div class="pull-right hidden-xs">
                                    <?php include ("../include/periodo.php"); ?>
                                </div>

                            </div>
                            <br>


                            <input type="hidden" value="<?php  echo $resultado[0]['id_departamento'] ?>" name="id">


                            <div class="row">
                                <article class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12 col-md-offset-">

                                    <div class="form-group ">
                                        <div class="col-md-4">
                                            <label for="evaluacion">Evaluacion:</label>
                                            <input type="text" name="evaluacion" id="evaluacion" class="form-control"
                                                autocomplete="off">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="tipo_evaluacion">Tipo de evaluacion:</label>
                                            <select name="tipo_evaluacion" id="tipo_evaluacion" class="form-control">
                                                <option value="Pasantia">Pasantia</option>
                                                <option value="Pre-pasantia">Pre-pasantia</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="porcentaje">Porcentaje:</label>
                                            <input type="number" name="porcentaje" id="porcentaje" class="form-control"
                                                autocomplete="off" placeholder="%%" min="1" max="100" require>
                                        </div>
                                    </div>

                                </article>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-md-12 col-sm-offset-3">






                                    <button type="submit" name="opcion" value="modificar"
                                        class="btn btn-primary btn-flat margin"><i class="fa fa-edit"></i>
                                        <strong>Modificar</strong></button>

                                    <button type="reset" class="btn btn-primary btn-flat margin"><strong><i
                                                class="fa  fa-spinner"></i> Limpiar</strong></button>

                                    <a href="mostrar.php" type="button" class="btn btn-md btn-primary"><strong><i
                                                class="fa fa-server"></i> Listar</strong></a>

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
        <!-- <script src="../../dist/js/departamentos/grillaActualizar.js"></script>
        <script src="../../dist/js/departamentos/expresionregular.js"></script>
        <script src="../../dist/js/departamentos/validacion.js"></script> -->








    </body>

</html>