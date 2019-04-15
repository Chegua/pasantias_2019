<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Fe y Alegria</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="vista/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vista/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="vista/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vista/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="vista/dist/css/skins/skin-blue.min.css">


  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->

      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>S.C.P.P</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->

              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"></span>
            </a>

            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="vista/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>

                  <small></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="vista/pages/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>fe y alegria san luis</p>
          <!-- Status -->
        </div>
      </div>
<hr>
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">

        <li class="header" align="center">MENU</li>
        <!-- Optionally, you can add icons to the links -->
          <li class="treeview">
          <a href="#"><i class="fa fa-group"></i> <span>Personas</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="vista/pages/v_estudiante/mostrar.php">Estudiantes </a></li>
            <li><a href="vista/pages/v_personaladm/mostrar.php">Personal Adminisrativo </a></li>
            <li><a href="vista/pages/v_tutoracademico/mostrar.php">Tutores Academicos </a></li>
            <li><a href="vista/pages/v_tutores_empresariales/mostrar.php">Tutores Empresariales </a></li>
        </ul>
      </li>

      <li><a href="vista/pages/v_empresas/mostrar.php"><i class="fa fa-industry"></i> <span>Empresas</span></a></li>
      <li><a href="vista/pages/v_estudiante/asignar_matricula.php"><i class="fa fa-check"></i> <span>Asignaciones</span></a></li>

      <li class="treeview">
          <a href="#"><i class="fa fa-wrench"></i> <span>Mantenimiento</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="vista/pages/v_departamentos/mostrar.php">Departamentos </a></li>
            <li><a href="vista/pages/v_cargos/mostrar.php">Cargos </a></li>
            <li><a href="vista/pages/v_menciones/mostrar.php">Menciones </a></li>
            <li><a href="vista/pages/v_anios/mostrar.php">Año/Grado </a></li>
            <li><a href="vista/pages/v_periodos/mostrar.php">Periodos </a></li>
            <li><a href="vista/pages/v_cuadratura/mostrar.php">Cuadratura </a></li>
            <li><a href="vista/pages/v_items/mostrar.php">Items </a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-map-marker"></i> <span>Localidades</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="vista/pages/v_estados/mostrar.php">Estados </a></li>
            <li><a href="vista/pages/v_municipios/mostrar.php">Municipios </a></li>
            <li><a href="vista/pages/v_parroquias/mostrar.php">Parroquias </a></li>
            <li><a href="vista/pages/v_comunidades/mostrar.php">Comunidades </a></li>
          </ul>
        </li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>

        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">


      <!--------------------------
        | Your Page Content Here |
        -------------------------->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong>Universidad Politecnica Territorial Del Oeste de Sucre</strong>
  </footer>


  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="vista/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="vista/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="vista/dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
