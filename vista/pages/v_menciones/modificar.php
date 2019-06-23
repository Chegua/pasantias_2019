<?php
session_start();
require_once('../../../modelo/m_personas.php');
if (isset($_SESSION['user_id'])) {    
  $user= personas::comprobarUsuario($_SESSION['user_id']);
}else{
  header('Location: /PASANTIAS_2019/vista/pages/v_users/login.php');
}

  require_once('../../../modelo/m_menciones.php');
   $id=$_REQUEST['id'];

  $mencion= new menciones();

  $resultado=$mencion->encontrar($id);
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
                        <i class="fa  fa-flag "></i> Menciones.
                        <small>Modificar <i class="fa fa-pencil"></i></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                        <li><a href="#">Mantenimiento</a></li>
                        <li><a href="#">Mencioness</a></li>
                        <li><a href="#" class="active">Modificar</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content container-fluid">
                    <form action="../../../controlador/c_mencion.php" method="get">
                        <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Datos de la Mención: </h3>
                            <div class="pull-right hidden-xs">
                                <?php include ("../include/periodo.php"); ?>
                            </div>
                        </div>
                            <br>


                            <input type="hidden" value="<?php  echo $resultado[0]['id_mencion'] ?>" name="id">


                            <div class="row">
                                <div class="form-group ">
                                    <div class="col-md-10 col-md-offset-1">
                                        <label for="mencion">Mencion:</label>
                                        <input type="text" name="mencion" id="mencion"
                                            value="<?php  echo $resultado[0]['mencion'] ?>" class="form-control"
                                            autocomplete="off">
                                        <span class="help-block">Ingrese el texto sin caracteres especiales</span>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-md-12 col-sm-offset-3">






                                    <button type="submit" name="opcion" value="modificar"
                                        class="btn btn-primary btn-flat margin"><i class="fa fa-edit"></i>
                                        <strong>Modificar</strong></button>

                                    <button type="button" class="btn btn-primary btn-flat margin"><strong><i
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
        <script src="../../dist/js/menciones/grillaActualizar.js"></script>
        <script src="../../dist/js/menciones/expresionregular.js"></script>
        <script src="../../dist/js/menciones/validacion.js"></script>

    </body>

</html>