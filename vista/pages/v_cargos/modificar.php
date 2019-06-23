<?php
  session_start();
  require_once('../../../modelo/m_personas.php');
  if (isset($_SESSION['user_id'])) {    
    $user= personas::comprobarUsuario($_SESSION['user_id']);
  }else{
    header('Location: /PASANTIAS_2019/vista/pages/v_users/login.php');
  }
  
  require_once('../../../modelo/m_cargos.php');
   $id=$_REQUEST['id'];

  $cargo= new cargos();
  $resultado2= $cargo->consultartiposcargos();

  $resultado=$cargo->encontrar($id);
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
                        <i class="fa fa-briefcase"></i> Cargos.
                        <small>Modificar <i class="fa fa-pencil"></i></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                        <li><a href="#">Mantenimiento</a></li>
                        <li><a href="#">Cargos</a></li>
                        <li class="active">Modificar</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content container-fluid">
                    <form action="../../../controlador/c_cargo.php" method="get">

                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h3 class="box-title">Introduzca los datos: </h3>
                                <div class="pull-right hidden-xs">
                                    <?php include ("../include/periodo.php"); ?>
                                </div>
                            </div>
                            
                            <input type="hidden" value="<?php  echo $resultado[0]['id_cargo'] ?>" name="id">


                            <div class="row">

                                <div class="form-group">
                                    <div class="col-md-5 col-md-offset-1">
                                        <label for="tipo">Tipo</label>

                                        <select name="tipo" id="tipo" class="form-control">
                                            <option value="">Seleccione..</option>
                                            <?php  
                     for ($i=0; $i<count($resultado2) ; $i++){?>
                                            <option value="<?php echo $resultado2[$i]['id_tipo_cargo']?>" <?php if ($resultado2[$i]['id_tipo_cargo'] == $resultado[0]['id_tipo_cargo']){
                              echo "selected"; ?> <?php } ?>><?php echo $resultado2[$i]['tipo_cargo']?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                        <span class="help-block">(Seleccione por favor.)</span>
                                    </div>


                                    <div class="col-md-5">
                                        <label for="cargo">Cargo:</label>

                                        <input type="text" name="cargo" id="cargo" class="form-control"
                                            value="<?php echo $resultado[0]['cargo']; ?>" autocomplete="off">

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
        <script src="../../dist/js/cargos/grillaActualizar.js"></script>

        <!------<script src="../../dist/js/cargos/expresionregular.js"></script>
  <script src="../../dist/js/cargos/validacion.js"></script>
    -->








    </body>

</html>