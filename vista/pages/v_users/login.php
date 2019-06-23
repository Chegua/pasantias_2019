<?php
session_start();
  if (isset($_SESSION['user_id'])) {
    header('Location: /PASANTIAS_2019');
  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inicio de sesion</title>
    <?php include ("../include/head.php"); ?>
    <link rel="stylesheet" href="../../plugins/alertify/css/alertify.min.css">
    <link rel="stylesheet" href="../../plugins/alertify/css/themes/bootstrap.min.css">
    <link rel="stylesheet" href="../../dist/css/estilos.css">
    <link rel="stylesheet" href="../../dist/css/icono_css.css">
    
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Sistema de pasantias</b></a>
  </div>
  
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Inicio de sesion</p>

    <form id="loginForm">
      <!-- <div class="form-group col-md-4">
        <select name="nacionalidad" class="form-control form-control-sm" id="nacionalidad" required>
          <option value="V">V</option>
          <option value="E">E</option>
        </select>
      </div> -->
      <div class="form-group">
        <label for="cedula">Cedula <i class="fa fa-user"></i></label>
        <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Ingrese la cedula">
      </div>
      <div class="form-group">
        <label for="clave">Contraseña <i class="fa fa-lock"></i></label>
        <input type="password" class="form-control" id="clave" name="clave" placeholder="Ingrese la contraseña">
      </div>
      <div class="row">
   
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar Sesion</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <br>
    <a href="register.php" class="text-center btn btn-link">Registrarse</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<?php include ("../include/plugins.php"); ?>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<script src="../../dist/js/usuarios/appUsuarios.js"></script>
</body>
</html>
