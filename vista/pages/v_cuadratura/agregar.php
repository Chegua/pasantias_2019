<?php
session_start();
require_once('../../../modelo/m_personas.php');
if (isset($_SESSION['user_id'])) {    
  $user= personas::comprobarUsuario($_SESSION['user_id']);
}else{
  header('Location: /PASANTIAS_2019/vista/pages/v_users/login.php');
}

require_once('../../../modelo/m_menciones.php');
require_once('../../../modelo/m_anios.php');
require_once('../../../modelo/m_periodos.php');

require_once('../../../modelo/m_historial_academico.php');


$anio= new anios();
$resultado= $anio->consultar();

$mencion= new menciones();
$resultado2= $mencion->consultar();
$periodo= new periodos();
$resultado3= $periodo->encontrar();

$resultado4= historial_academico::consultar();

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
                    <i class="fa fa-graduation-cap "></i> Cuadratura.
                    <small>Registrar <i class="fa fa-plus"></i></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <li><a href="#">Personas</a></li>
                    <li class="">Cuadratura.</li>
                    <li class="active">Agregar Nuevo.</li>
                </ol>
            </section>

            <!-- Main content -->
            <form name="form_cargo" id="form_cargo" action="../../../controlador/c_cuadratura.php">

                <section class="content">

                    <!-- Default box -->
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Datos del estudiante: </h3>
                            <div class="pull-right hidden-xs">
                                <?php include ("../include/periodo.php"); ?>
                            </div>

                        </div>
                        <div class="box-body">


                            <article class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12 col-md-offset-">

                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="anio">Año: </label>
                                        <select class="form-control" name="anio" required>
                                            <option value="">Seleccione...</option>
                                            <?php for ($i=0; $i < count($resultado); $i++): ?>
                                            <option value="<?php echo $resultado[$i]['id_anio'];?>">
                                                <?php echo $resultado[$i]['anio']; ?></option>
                                            <?php endfor; ?>

                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="mencion">Mención: </label>
                                        <select class="form-control" name="mencion" required>
                                            <option value="">Seleccione...</option>
                                            <?php for ($i=0; $i < count($resultado2); $i++): ?>
                                            <option value="<?php echo $resultado2[$i]['id_mencion'];?>">
                                                <?php echo $resultado2[$i]['mencion']; ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>

                                    <input type="hidden" name="periodo"
                                        value="<?php echo $resultado3['id_periodo']; ?>">

                                    <div class="form-group col-md-4">
                                        <label for="mostrar_periodo">Periodo escolar: </label>
                                        <input type="text" name="mostrar_periodo"
                                            value="<?php echo $resultado3['periodo']; ?>" class="form-control" disabled>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="">Docente Guia:</label>
                                        <button type="button" name="docente" class="btn btn-primary" data-toggle="modal"
                                            data-target="#modal_doc"><i class="fa fa-user-plus"></i> </button>
                                    </div>

                                    <input type="hidden" name="docente" id="docente" required>

                                    <div class="form-group col-md-4">
                                        <label for="cedulaD">Cedula:</label>
                                        <input type="text" name="cedulaD" id="cedulaD" class="form-control" readonly
                                            required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="nombreD">Nombre:</label>
                                        <input type="text" name="nombreD" id="nombreD" class="form-control" readonly
                                            required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="apellidoD">Apellido</label>
                                        <input type="text" name="apellidoD" id="apellidoD" class="form-control" readonly
                                            required>
                                    </div>

                            </article>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">

                            <div class="row">
                                <div class="col-md-12 col-sm-offset-3">

                                    <button type="submit" name="opcion" id="btnvalidar" value="registrar"
                                        class="btn btn-primary btn-flat margin"><i class="fa fa-save"></i>
                                        <strong>Registrar</strong></button>

                                    <button type="button" class="btn btn-primary btn-flat margin"><strong><i
                                                class="fa  fa-spinner"></i> Limpiar</strong></button>


                                    <a href="mostrar.php" type="button" class="btn btn-md btn-primary"><strong><i
                                                class="fa fa-server"></i> Listar</strong></a>

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


    <!-----------------------------------------------MODAL PARA EL BOTON BUSCAR DOCENTE -------------------------------------------------->

    <div class="modal fade bs-example-modal-lg" id="modal_doc" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><strong>Seleccione un docente.</strong></h4>
                </div>
                <div class="modal-body">

                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <h4>Docentes disponibles:</h4>
                        </div>

                        <div class="panel-body">
                            <table class="table table-hover table-bordered" id="example2">
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
                                    <?php for ($i=0; $i < count($resultado4) ; $i++):?>
                                    <tr>
                                        <td><?php echo $resultado4[$i]['cedula']; ?></td>
                                        <td><?php echo $resultado4[$i]['nombre']; ?></td>
                                        <td><?php echo $resultado4[$i]['apellido']; ?></td>
                                        <td><?php echo $resultado4[$i]['sexo']; ?></td>
                                        <td><?php echo $resultado4[$i]['telefono']; ?></td>
                                        <td><?php echo $resultado4[$i]['correo']; ?></td>
                                        <td><button type="button" name="selecionar_docente"
                                                class="btn btn-sm btn-success" data-dismiss="modal"
                                                onclick="elegir_docente(<?php echo $resultado4[$i]['id_docente']?>);"><i
                                                    class="fa fa-check-square-o"></i> </button> </td>

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
    <script src="../../dist/js/tutor_academico/validacion.js"></script>

    <script src="../../dist/js/tutor_academico/grillaAgregar.js"></script>
    <script src="../../dist/js/estudiantes/seleccion_modales.js"></script>
    <script src="../../dist/js/dire.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#fecha_nacimiento').change(function() {
            $.ajax({
                type: "POST",
                data: "fecha=" + $('#fecha_nacimiento').val(),
                url: "../../../modelo/calcularEdad.php",
                success: function(r) {
                    $('#edadCalculada').val(r);
                }
            });
        });
    });
    </script>
    <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': false,
            'autoWidth': true,
            'scrollX': false,
            "language": {
                "url": "../../bower_components/datatables.net/js/Spanish.json"
            }

        });
    });

    $(document).ready(function() {
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': false,
            'autoWidth': true,
            'scrollX': false,
            "language": {
                "url": "../../bower_components/datatables.net/js/Spanish.json"
            }

        });
    });
    </script>

</body>

</html>